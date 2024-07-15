<?php
class AG {
    public $num_crommosom ; //jumlah kromosom awal yang dibangkitkan
    protected $waktu = array(); //data waaktu
    protected $ruang = array(); //data ruang
    protected $kuliah = array(); //data kuliah
    protected $generation = 0; //generasi ke....
    public $max_generation = 2;
    protected $crommosom = array(); //array kromosom sesuai $num_cromosom 
    protected $per_sks = 40; // menit per sks
    protected $success = false; //keadaan jika sudah ada sulosi terbaik
    public $debug = true; //menampilkan debug jika diset true;    
    protected $fitness = array(); //nilai fitness setiap kromosom
    protected $console = ""; //menyimpan proses algoritma 
    protected $total_fitness = 0; //menyimpan total fitness untuk masing-masing kromosom
    protected $probability  = array(); //menyimpan probabilitas fitness masing-masing kromosom
    protected $com_pro = array(); //menyimpan fitness komulatif untuk masing masing kromosom
    protected $rand = array(); //menyimpan bilangan rand())
    protected $parent = array(); //menyimpan parent saat crossover
    
    protected $best_fitness = 0; //menyimpan nilai fitness tertinggi
    protected $best_cromossom = array(); //menyimpan kromosom dengan fitness tertinggi 
    
    public $crossover_rate = 75; //prosentase kromosom yang akan dipindah silang
    public $mutation_rate = 25; //prosentase kromosom yang akan dimutasi
    
    protected $_strtotime = array(); //menyimpan nilai strtotime sehingga bisa dipanggil lagi
    protected $_timeclash = array(); //menyimpan bentrok sehinggal bisa dipanggil lagi
    
    protected $time_start; //menyimpan waktu mulai proses algotitma
    protected $time_end; //menyimpan waktu selesai proses algoritma

    protected $tabu_list;
    protected $tabu_fitness;
    protected $tabu_max = 25;
    
    /**
     * konstruktor ketika pertama kali memanggil class AG
     * inputan waktu, ruang, dan kuliah 
     */
    function __construct($waktu, $ruang, $kuliah) {
        foreach($waktu as $row){
            $this->waktu[$row->kode_waktu] = $row;
        }
 
        foreach($ruang as $row){
            $this->ruang[$row->kode_ruang] = $row;
        }

        foreach($kuliah as $row){
            $this->kuliah[$row->kode_kuliah] = $row;  
            $this->kuliah[$row->kode_kuliah]->hari = explode(',', $row->hari);
        }
    }      
    
    /**
     * mulai memproses algoritma     
     */
    function generate(){
        global $db;
        
        $this->time_start = microtime(true); //seting watu awal eksekusi
        
        $this->generate_crommosom();
        
        /**
         * proses algoritma akan diulang sampai memperoleh nilai 1
         * atau sudah mencapai maksimum generasi (sesuai yang diinputkan)
         */                        
        while(($this->generation < $this->max_generation) && $this->success == false){       
            $this->generation++;         
            $this->console.= "<h4>Generasi ke-$this->generation</h4>";
            $this->show_crommosom();
            $this->calculate_all_fitness();
            $this->show_fitness();
                        
            if(!$this->success) { //jika fitness terbaik belum mencapai 1, dilanjutkan ke proses seleksi
                $this->get_com_pro();
                $this->selection();
                $this->show_crommosom();            
                $this->show_fitness();
            }
            if(!$this->success) { //jika fitness terbaik belum mencapai 1, dilanjutkan ke proses crossover
                $this->crossover();
                $this->show_crommosom();
                $this->show_fitness(); 
            }
            
            if(!$this->success) { //jika fitness terbaik belum mencapai 1, dilanjutkan ke proses mutasi
                $this->mutation();
                $this->show_crommosom();
                $this->show_fitness();
            }                        
        }        
        $this->save_result(); //menyimpan jadwal hasil AG
        
        $this->time_end = microtime(true); //seting waktu akhir eksekusi
        
        $time = $this->time_end - $this->time_start;
        
        /**
         * menampilan hasil algoritma
         */
        echo "<pre style='font-size:0.8em'>\r\nFITNESS TERBAIK: $this->best_fitness";
        echo "\r\nExecution Time: $time seconds";
        echo "\r\nMemory Usage: " . memory_get_usage() / 1024 . ' kilo bytes';
        echo "\r\nGENERASI: $this->generation";
        echo "\r\nCROMOSSOM TERBAIK:  " . $this->print_cros($this->best_cromossom) . "</pre>"; 
        
        //menampilkan proses algoritma                             
        $this->get_debug();                                   
    }
    
    /**
     * proses mutasi pada AG
     * mutasi dilakukan sesuai prosentaso "Mutation Rate" yang diinputkan
     */
    function mutation(){
        $mutation = array();
        $this->console.= "<h5>Mutasi generasi ke-$this->generation</h5>";
        $gen_per_cro = count($this->kuliah);
        $total_gen = count($this->crommosom) * $gen_per_cro;
        $total_mutation = ceil($this->mutation_rate / 100 * $total_gen);
        
        for($a = 1; $a <= $total_mutation; $a++) {
            $val = rand(1, $total_gen);
            
            $cro_index = ceil($val / $gen_per_cro) - 1;
            $gen_index = ( ($val -1)  % $gen_per_cro); 
            
            $this->console.="$val : [$cro_index, $gen_index]\r\n";                        
            $this->crommosom[$cro_index][$gen_index]['ruang'] = array_rand($this->ruang);
            $this->crommosom[$cro_index][$gen_index]['waktu'] = array_rand($this->waktu);
            $this->fitness[$cro_index] = $this->calculate_fitness($cro_index);
            
            if($this->success)
                return;
        }
        return false;
    }
    
    /**
     * menghapus jadwal sebelumnya
     * menyimpan hasil jadwal yang baru
     */
    function save_result(){
        global $db;                
        $db->query("DELETE FROM tb_jadwal");
        foreach($this->best_cromossom as $key => $val){
            $db->query("INSERT INTO tb_jadwal (kuliah, ruang, waktu) 
                VALUES ('$val[kuliah]', '$val[ruang]', '$val[waktu]')");
        }
        //reset($this->best_cromossom);
    }
    
    /**
     * menampilkan semua kromosom 
     */
    function show_crommosom() { 
        $cros = $this->crommosom;
        
        $a = array();
        foreach ($cros as $key => $val) {
            $a[] =  $this->print_cros($val, $key);
        }
        
        $this->console.= implode(" \r\n", $a) . "\r\n";
    }
    
    /**
     * menampilkan satu kromosom sesuai indeks
     */
    function print_cros($val = array(), $key = 0){        
        
        $arr = array();
        foreach($val as $k => $v) {                
            $arr[] = '['. implode( ',', $v) . ']';
        }
        return "Kromosom[$key]: (". implode( ',', $arr) . ")";
    }
    
    /**
     * menghitung fitness pada semua kromosom
     */
    function calculate_all_fitness() {            
        foreach($this->crommosom as $key => $val) {                             
            $this->calculate_fitness($key);                         
        }
        //reset($this->crommosom);
    }
    
    /**
     * mengecek apakah dosen yang sama di waktu yang bentrok
     * ada kombinasi pengecekan untuk semua gen
     * misal gen 1 dan 2, 1 dan 3, 1 dan 4 dst...
     * begitu juga gen 2 dan 3, 2 dan 4 dst
     * sampai semua kombinasi
     * 
     */
    function get_clash_hari($crom = array()) {
        $clash = 0;
        foreach($crom as $key => $val){
            $hari = $this->waktu[$val['waktu']]->kode_hari;
            $arr_hari = $this->kuliah[$val['kuliah']]->hari;
            if(!in_array($hari, $arr_hari))
                $clash+=0.5;
        }
        return $clash;
    }
    /**
     * mengecek apakah dosen yang sama di waktu yang bentrok
     * ada kombinasi pengecekan untuk semua gen
     * misal gen 1 dan 2, 1 dan 3, 1 dan 4 dst...
     * begitu juga gen 2 dan 3, 2 dan 4 dst
     * sampai semua kombinasi
     * 
     */
    function get_clash_dosen($crom = array()) {
        $clash = 0;
        foreach($crom as $key => $val){
            foreach($crom as $k => $v){
                if($key!=$k){
                    $kuliah1 = $this->kuliah[$val['kuliah']];
                    $kuliah2 = $this->kuliah[$v['kuliah']];
                    if($kuliah1->kode_dosen==$kuliah2->kode_dosen) { //jika dosen sama                   
                        if($this->is_time_clash($val, $v)){ //jika waktunya bentrok         
                            $clash++;    
                        }         
                    }
                }
            }
        }
        return $clash;
    }                    
    /**
     * mengecek apakah ruang yang sama di waktu yang bentrok
     * ada kombinasi pengecekan untuk semua gen
     * misal gen 1 dan 2, 1 dan 3, 1 dan 4 dst...
     * begitu juga gen 2 dan 3, 2 dan 4 dst
     * sampai semua kombinasi
     * 
     */                
    function get_clash_ruang($crom = array()) {
        $clash = 0;
        foreach($crom as $key => $val){
            foreach($crom as $k => $v){
                if($key!=$k){
                    if($val['ruang']==$v['ruang']) { //jika ruang sama                   
                        if($this->is_time_clash($val, $v)){ //jika waktunya bentrok         
                            $clash++;    
                        }         
                    }
                }
            }
        }
        return $clash;
    }    
    
    /**
     * mengecek apakah kelas yang sama di waktu yang bentrok
     * ada kombinasi pengecekan untuk semua gen
     * misal gen 1 dan 2, 1 dan 3, 1 dan 4 dst...
     * begitu juga gen 2 dan 3, 2 dan 4 dst
     * sampai semua kombinasi
     * 
     */
    function get_clash_kelas($crom = array()) {
        $clash = 0;
        foreach($crom as $key => $val){
            foreach($crom as $k => $v){
                if($key!=$k){
                    $kuliah1 = $this->kuliah[$val['kuliah']];
                    $kuliah2 = $this->kuliah[$v['kuliah']];
                    if($kuliah1->kode_kelas==$kuliah2->kode_kelas) { //jika kelas sama                   
                        if($this->is_time_clash($val, $v)){ //jika waktunya bentrok         
                            $clash++;    
                        }         
                    }
                }
            }
        }
        return $clash;
    }    
    /**
     * menghitung fitnes pada kromosom tertentu 
     */
    function calculate_fitness($key) {
        $cro = $this->crommosom[$key];
        //dosen sama waktu sama
        $clash_dosen = $this->get_clash_dosen($cro);
        //ruang sama waktu sama
        $clash_ruang = $this->get_clash_ruang($cro);
        //kelas sama waktu sama
        $clash_kelas = $this->get_clash_kelas($cro);
        //kelas sama waktu sama
        $clash_hari = $this->get_clash_hari($cro);
        
        $f['desc'] = "1/(1+$clash_dosen+$clash_ruang+$clash_kelas+$clash_hari)";                                       
        $f['nilai'] = 1/ (1 + $clash_dosen + $clash_ruang + $clash_kelas + $clash_hari);
        
        if($f['nilai']==1) // jika sudah optimal maka berhenti
            $this->success = true;
        
        if($f['nilai'] > $this->best_fitness) {
            $this->best_fitness = $f['nilai'];
            $this->best_cromossom = $this->crommosom[$key];
        }
        
        $this->fitness[$key] = $f;
        return $f;
    }
    
    /**
     * menampilkan nilai fitnes untuk masing-masing kromosom
     */
    function show_fitness(){
        foreach($this->fitness as $key => $fit) {                                    
            $this->console.= "F[$key]: $fit[desc] = $fit[nilai] \r\n";                        
        }
        //reset($this->fitness);
        $this->get_total_fitness();
        $this->console.="Total F: ".$this->total_fitness ."\r\n"; 
    }
    
    /**
     * proses Crossover (pindah silang pada AG)
     */
    function crossover(){
        $this->console.= "<h5>Pindah silang generasi ke-$this->generation</h5>";
        $parent = array();
        
        //menentukan kromosom mana saja sebagai induks
        //jumlahnya berdasarkan crossover rate 
        foreach($this->crommosom as $key => $val) {
            $rnd = mt_rand() / mt_getrandmax();
            if($rnd <= $this->crossover_rate / 100)
                $parent[] = $key;
        }        

        foreach($parent as $key => $val){
            foreach($this->tabu_list as $k => $v){
                if($v===$this->crommosom[$val]){
                    $this->console.= "Kromosom $val sudah ada di tabu list\n";
                    unset($parent[$key]);
                    continue 2;
                }
            }
            $this->console.= "Kromosom $val dijadikan parent\n";
        }

        $parent = array_values($parent);

        //reset($this->crommosom);
        
        //menampilkan parent/induk setiap pindah silang        
        foreach($parent as $key => $val) {
            $this->console.="Parent[$key] : $val \r\n";
        }
                
        $parent = $parent;
        $c = count($parent);
        
        //mulai proses pindah silang sesai jumlah induk
        if( $c > 1 ) {
            for($a = 0; $a < $c-1; $a++) {
                $new_cro[$parent[$a]] = $this->get_crossover( $parent[$a],  $parent[$a+1]);
            }    
            $new_cro[$parent[$c-1]] = $this->get_crossover( $parent[$c-1],  $parent[0]);
            
            //menyimpan kromosom hasil pindah silang dan fitnessnya
            foreach($new_cro as $key => $val) {
                $this->crommosom[$key] = $val;
                $this->calculate_fitness($key);
            }
        }                         
    }
    
    //mencari nilai crossover dari dua induk
    function get_crossover($key1, $key2){
        $cro1 = $this->crommosom[$key1];
        $cro2 = $this->crommosom[$key2];
        
        $offspring = rand(0, count($cro1) - 2);
        $new_cro = array();
        
        for($a = 0; $a < count($cro1); $a++) {                        
            if( $a <= $offspring )
                $new_cro[] =  $cro1[$a];        
            else
                $new_cro[] =  $cro2[$a];        
        }
        
        //$this->console.= "Offspring: $offspring \r\n";
        
        return $new_cro;        
    }
    
    /**
     * menampilkan print out dari proses algoritma
     */
    function get_debug(){   
        if($this->debug)
            echo "<pre style='font-size:0.8em'>$this->console</pre>";
    }
    
    /**
     * membuat kromosom awal sesuai jumlah kromosom yang diinputkan
     */        
    function generate_crommosom() {
        $numb = 0;
        while($numb < $this->num_crommosom) { //diulang sesuai jumlah kromosom yang diinputkan
            $cro = $this->get_rand_crommosom();            
            $this->crommosom[] = $cro;       
            $this->fitness[] = 0;                                    
            $numb++;
        }                       
        //print_r($this->fitness);
    }         
    
    /**
     * membuat kromoson random(acak)
     */
    function get_rand_crommosom(){
        $result = array();
        $kuliahs = $this->kuliah;
        
        $no = 0;
        foreach($kuliahs as $key => $value){            
            $result[$no]['kuliah'] = $key;
            $result[$no]['ruang'] = array_rand($this->ruang);
            $result[$no]['waktu'] = array_rand($this->waktu);

            $no++;
        }  
        return $result;                          
    }         
    
    /**
     * mencari garis 
     */
    function get_total_fitness(){
        $this->total_fitness = 0;
        //reset($this->fitness);
        foreach($this->fitness as $val) {
            $this->total_fitness+=$val['nilai'];
        }        
        return $this->total_fitness;
    }
    
    /**
     * mencari probabilitas untuk setiap fitness
     * rumusnya adalah  fitness / total fitness
     */     
    function get_probability(){
        $this->probability = array();
        foreach($this->fitness as $key => $val) {
            $x = $val['nilai'] / $this->total_fitness;
            $this->probability[] = $x;
            //$this->console.="P[$key] : $x \r\n";
        }
        //$this->console.="Total P: " . array_sum($this->probability) . "\r\n";
        //reset($this->fitness);
        return $this->probability;
    }
    
    /**
     * mencari nilai probabilitas komulatif
     * 
     * */
    function get_com_pro(){
            
        $this->get_probability(); 
        
        $this->com_pro = array();
        $x = 0;
        foreach($this->probability as $key => $val) {
            $x+= $val;
            $this->com_pro[] = $x;
            $this->console.="PK[$key] : $x \r\n";
        }        
        //reset($this->probability);
        $this->com_pro;
    }
    
    /**
     * proses seleksi, memilih gen secara acak
     * dimana fitness yang besar mendapatkan kesempata yang lebih besar
     */
    function selection(){        
        $this->console.="<h5>Seleksi generasi ke-$this->generation</h5>";
        $this->get_rand();
        $new_cro = array();
        
        //print_r($this->rand);
        foreach ($this->rand as $key => $val) {
            $k = $this->choose_selection($val);
            $new_cro[$key] = $this->crommosom[$k];
            $this->fitness[$key] = $this->fitness[$k]; 
            $this->console.="K[$key] = K[$k] \r\n";
        } 

        $this->crommosom = $new_cro;

        foreach($this->crommosom as $key => $val){
            foreach((array) $this->tabu_list as $k => $v){
                if($v === $val){
                    //$this->console.= "Kromosom $key sudah ada di tabu list\n";
                    continue 2;
                }
            }
            $this->tabu_list[] = $val;
            //$this->console.= "Kromosom $key ditambahkan ke tabu list\n";
            $this->tabu_fitness[] = $this->fitness[$key]['nilai'];
        }

        asort($this->tabu_fitness);

        $this->tabu_fitness = array_slice($this->tabu_fitness, 0, $this->tabu_max, true);
        $this->tabu_list = array_slice($this->tabu_list, 0, $this->tabu_max, true);

        $arr = array();
        foreach($this->tabu_fitness as $key => $val){
            $arr[$key] = $this->tabu_list[$key];
        }

        $this->tabu_fitness = array_values($this->tabu_fitness);
        $this->tabu_list = array_values($this->tabu_list);

        //echo '<pre>' . print_r($this->tabu_fitness, 1)  . '</pre>';

        $this->console.= "Total Tabu List : "  . count($this->tabu_list) . " dari $this->tabu_max \n";
    }
    
    /**
     * memilih berdasarkan bilangan random yang diinputkan
     * */
    function choose_selection($rand_numb = 0) {    
        foreach($this->com_pro as $key => $val) {
            if($rand_numb <= $val)
                return $key;
        }        
    }
    
    function get_rand(){
        $this->rand = array();
        //reset($this->fitness);
        foreach($this->fitness as $key => $val) {
            $r = mt_rand() / mt_getrandmax();
            $this->rand[] = $r;
            //$this->console.="R[$key] : $r \r\n";
        }
    }
         
    /**
     * is_time_clash digunakan untuk menentukan apakah dua buah waktu itu bentrok atau tidak
     * bentrok ditentukan juga berdasarkan jumlah sks berapa meni
     * 
     */
    function is_time_clash($gen1, $gen2){
        $is_clash = 0;
                                                        
        $key1 = $gen1['waktu'].'_'.$gen1['kuliah'];
        $key2 = $gen2['waktu'].'_'.$gen2['kuliah'];
        
        /** jika belum ada di cache */
        if(!isset($this->_timeclash[$key1][$key2]))
        {
            $waktu1 = $this->waktu[$gen1['waktu']];
            $waktu2 = $this->waktu[$gen2['waktu']];
            
            /** jika waktunya sama */                        
            if($gen1['waktu']==$gen2['waktu']) {            
                $is_clash = 1;
            }
            /** jika di hari yang sama */
            else if ($waktu1->nama_hari == $waktu2->nama_hari) 
            {             
                $sks1 = $this->kuliah[$gen1['kuliah']]->sks;
                $sks2 = $this->kuliah[$gen2['kuliah']]->sks;
                
                $a_awal = $this->_strtotime($waktu1->nama_jam); //jam awal untuk gen pertama
                $a_akhir = $a_awal + $sks1 * $this->per_sks * 40; //jam akhir untuk gen pertama
                  
                $b_awal = $this->_strtotime($waktu2->nama_jam); //jam awal untuk gen kedua
                $b_akhir = $b_awal + $sks2 * $this->per_sks * 40; //jam awal untuk gen kedua
                             
                if ($a_awal == $b_awal){  //jika jam awal untuk kedua gen sama, maka jadwalnya bentrok                  
                    $is_clash = 1; 
                    //$this->console.="($a_awal == $b_awal)";           
                } else if ($a_awal > $b_awal && $a_awal< $b_akhir)   { //jika jam awal gen1 berada antara jam awal dan akhir gen2, maka jadwalnya bentrok
                    //$this->console.="($a_awal > $b_awal && $a_awal< $b_akhir)";
                    $is_clash = 1;                
                } else if ($a_akhir > $b_awal && $a_akhir < $b_akhir)   { //jika jam akhir gen1 berada antara jam awal dan akhir gen2, maka jadwalnya bentrok                    
                    //$this->console.="($a_akhir > $b_awal && $a_akhir < $b_akhir)";
                    $is_clash = 1;                
                } else if ($b_awal > $a_awal && $b_awal < $a_akhir) { //jika jam awal gen2 berada antara jam awal dan akhir gen1, maka jadwalnya bentrok                   
                    //$this->console.="($b_awal > $a_awal && $b_awal < $a_akhir)";
                    $is_clash = 1; 
                } else if ($b_akhir > $a_awal && $b_akhir < $a_akhir) { //jika jam akhir gen2 berada antara jam awal dan akhir gen2, maka jadwalnya bentrok                    
                    //$this->console.="($b_akhir > $a_awal && $b_akhir < $a_akhir)";
                    $is_clash = 1; 
                }       
            }              
        }
        /** jika sudah ada di cache */ 
        else 
        {            
            return $this->_timeclash[$key1][$key2];
        }
                                                                   
        $this->_timeclash[$key1][$key2] = $is_clash;
        $this->_timeclash[$key2][$key1] = $is_clash;
                        
        return $this->_timeclash[$key1][$key2];       
    }
    
    /**
     * mengubah string menjadi waktu
     * pada fungsi ini juga akan disimpan hasil dari strtotime sebelumnya
     * sehingga jika nanti ada yang sama tinggal dipanggil
     */
     
    function _strtotime($nama_jam)
    {
        if(!isset($this->_strtotime['s'.$nama_jam])) //jika belum ada, disimpan
            $this->_strtotime['s'.$nama_jam] = strtotime($nama_jam);
                    
        return $this->_strtotime['s'.$nama_jam];                
    }                 
}
