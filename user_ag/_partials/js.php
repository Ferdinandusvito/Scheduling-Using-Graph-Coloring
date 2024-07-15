    <script src="<?= base_url('assets/vendor/jquery/jquery.min.js') ?>"></script>
    <script src="<?= base_url('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>

    <!-- Core plugin JavaScript-->
    <script src="<?= base_url('assets/vendor/jquery-easing/jquery.easing.min.js') ?>"></script>

    <!-- Page level plugin JavaScript-->
    <script src="<?= base_url('assets/vendor/datatables/jquery.dataTables.js') ?>"></script>
    <script src="<?= base_url('assets/vendor/datatables/dataTables.bootstrap4.js') ?>"></script>

    <!-- js baru untuk date -->
    <script type="text/javascript" src="<?= base_url('assets/js/moment.min.js') ?>"></script>
    <script type="text/javascript" src="<?= base_url('assets/js/daterangepicker.min.js') ?>"></script>

    <!-- Custom scripts for all pages-->
    <script src="<?= base_url('assets/js/sb-admin.min.js') ?>"></script>
    

    <!-- Demo scripts for this page-->
    <script src="<?= base_url('assets/js/demo/datatables-demo.js') ?>"></script>

    <script src="<?= base_url('assets/vendor/jquery/jquery-confirm.js') ?>"></script>
    <script src="<?= base_url('assets/vendor/chart.js/Chart.min.js') ?>"></script>
    <script>
    $(document).ready(function(){
        var role = '<?= $this->session->userdata('user_role') ?>'
        if (role == 3) {
            var nip = '<?= $this->session->userdata('nim') ?>'
        }else if (role == 8) {
            var nip = '<?= $this->session->userdata('id_laboratorium') ?>'
        }else{
            var nip = '<?= $this->session->userdata('nip') ?>'
        }
        $.ajax({
            url  : '<?= base_url('Notifikasi/getNotif/') ?>'+nip,
            type : 'get',
            success : function(response){
                var html = ''
                $.each(response, function (key, val) {
                    var jenis = val.id_abdimas ? val.id_abdimas : val.id_penelitian
                    var controller = val.id_abdimas ? 'Abdimas/progressDetail/' : 'Penelitian/penelitianDetail/'
                    var link = '<?= base_url()?>'+ controller + jenis
                    var status = ''
                    if (val.id_abdimas) {
                        if (val.id_status_abdimas == 4) {
                            status = 'Pengajuan Abdimas Disetujui'
                        }else if (val.id_status_abdimas == 2) {
                            status = 'Pengajuan Abdimas telah dinyatakan berjalan'
                        }else if (val.id_status_abdimas == 3) {
                            status = 'Pengajuan Abdimas telah dinyatakan selesai'
                        }else if (val.id_status_abdimas == 5) {
                            status = 'Pengajuan Abdimas telah ditolak'
                        }else {
                            status = 'Pengajuan Abdimas Tidak Disetujui'
                        }
                    } else {
                        if (val.id_status_penelitian == 4) {
                            status = 'Pengajuan Penelitian Disetujui'
                        }else if (val.id_status_penelitian == 2) {
                            status = 'Pengajuan Penelitian telah dinyatakan berjalan'
                        }else if (val.id_status_penelitian == 3) {
                            status = 'Pengajuan Penelitian telah dinyatakan selesai'
                        }else if (val.id_status_penelitian == 5){
                            status = 'Pengajuan Penelitian telah ditolak'
                        }else {
                            status = 'Pengajuan Penelitian Disetujui'
                        }
                    }


                    if (val.status == 1) {
                        html += `
                            <button class='dropdown-item disabled' href='#'>${status}</button> 
                        `
                    } else {
                        html += `
                            
                            <button class='dropdown-item' data-id=${val.id_notification} data-link='${link}' id='click-notif'>${status}</button> 
                        `
                    }
                })
                $('#notification').html(html)
            }
        })

        $.ajax({
            url  : '<?= base_url('Notifikasi/countNotif/') ?>'+nip,
            type : 'get',
            success : function(response){
                $('#sumary-notif').text(response.total_notif)
            }
        })

        $(document).on('click', '#click-notif', function () {
            var id = $(this).attr('data-id')
            var link = $(this).attr('data-link')
            console.log(id)
            $.ajax({
                url : '<?= base_url('Notifikasi/readNotif/') ?>'+id,
                type: 'get',
                success: function (res) {
                    console.log(res)
                    window.location.href = link; 
                }
            })
        })
    })

</script>
<script>
   $(function() {

$('input[name="datefilter"]').daterangepicker({
    autoUpdateInput: false,
    locale: {
        cancelLabel: 'Clear'
    }
});

$('input[name="datefilter"]').on('apply.daterangepicker', function(ev, picker) {
    $(this).val(picker.startDate.format('MM/DD/YYYY') + ' - ' + picker.endDate.format('MM/DD/YYYY'));
});

$('input[name="datefilter"]').on('cancel.daterangepicker', function(ev, picker) {
    $(this).val('');
});

});
</script>
<script>
    $(function() {
        var judul = [];
        var nama_mahasiswa = [];
        var nama_pembimbing = [];
        var tanggal = [];

        $(".wawaw").click(function() {
            // $(this).toggleClass('btn-default btn-success');
            // $(event.currentTarget).text($(event.currentTarget).text() === 
            // "<input class=\"my-checkbox\" type=\"checkbox\" autocomplete=\"off\" value=\"\" checked> Terjadwal" ? 
            // "Jadwalkan" : 
            // "Terjadwal");
        });

        $('.table tbody').on('click','.wawaw',function(){
            var currow = $(this).closest('tr');
            var col1 = currow.find('td:eq(0)').text();
            for (var i=0; i < judul.length; i++) {
            // And stick the value of checked ones onto an array...
                if (judul[i] === col1) {
                    return null;
                }
            }
            judul.push(col1);
            var col2 = currow.find('td:eq(1)').text();
            nama_mahasiswa.push(col2);
            var col3 = currow.find('td:eq(2)').text();
            nama_pembimbing.push(col3);
            var col4 = currow.find('td:eq(3)').text();
            tanggal.push(col4);
        });

        // $(".checkAll").click(function () {
        //     $('input:checkbox').not(this).prop('checked', this.checked);
        //     console.log(getCheckedValues());
        // });

        $(".resetbut").click(function (){
            if($('.wawaw').hasClass('active')){
                $('.wawaw').addClass('active');
            }

            judul = [];
            nama_mahasiswa = [];
            nama_pembimbing = [];
            tanggal = [];
        });

        $(".checkbut").click(function () {

            console.log(judul);

            console.log("test?")
            // $('input:checkbox').not(this).prop('checked', this.checked);
            console.log(getCheckedValues());

            if($('.wawaw').hasClass('active')){
                $('.wawaw').addClass('active');
            }

            if(judul.length > 0){
                $.ajax({
                    type : "POST",
                    url : "<?php echo site_url('preferensi/tambahPengumuman')?>",
                    dataType : "JSON",
                    data : {
                        judul : judul,
                        nama_mahasiswa : nama_mahasiswa,
                        nama_pembimbing : nama_pembimbing,
                        tanggal : tanggal,
                    },
                    success : function (data){
                        console.log(data);
                        var alert =`<div id="my-alert" class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>Success!</strong> Jadwal sidang sudah diumumkan.
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        </div>`;
                        $('.alert-container').html(alert); /* alert container class ".alert-container" */
                        $('#my-alert').alert();
                        setTimeout(function(){ /* show the alert for 3sec and then reload the page. */
                            $('#my-alert').alert('close');
                        },3000);
                    },
                    error: function (jqXHR, textStatus, errorThrown) {
                        console.log(textStatus, errorThrown);
                    }
                });

                judul = [];
                ama_mahasiswa = [];
                nama_pembimbing = [];
                tanggal = [];
            }else{
                judul = [];
                ama_mahasiswa = [];
                nama_pembimbing = [];
                tanggal = [];
            }

            

        });

        function getCheckedValues(){
            var checkboxes = document.getElementsByClassName('my-checkbox');
            console.log(checkboxes);
            console.log(checkboxes[1]);
            var checkboxesChecked = [];
            // loop over them all
            for (var i=0; i < checkboxes.length; i++) {
            // And stick the value of checked ones onto an array...
                if (!checkboxes[i].checked) {
                    checkboxesChecked.push(checkboxes[i].value);
                }
            }
            // Return the array if it is non-empty, or null
            return checkboxesChecked.length > 0 ? checkboxesChecked : null;
        }

        $('input[name="daterange"]').daterangepicker({
            opens: 'left'
        }, function(start, end, label) {
            var diff = 0;
            var arr = [];
            var ai = 0;
            console.log("A new date selection was made: " + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD'));
            var days = Math.abs(moment(start).diff(moment(end),'d'));
            if (start && end) {
                for(var oke = moment(start); oke <= end; oke = oke + 86400000){
                    var d = new Date(oke);
                    var day = d.getDate();
                    var month = d.getMonth() + 1;
                    var year = d.getFullYear();
                    if (day < 10) {
                        day = "0" + day;
                    }
                    if (month < 10) {
                        month = "0" + month;
                    }
                    var date = day + "/" + month + "/" + year;

                    console.log("Okay the dates are : " + date);
                    arr[ai] = date;
                    ai++;
                    // $('#datesbetween').append( '<br>' + $.datepicker.formatDate( "d MM, yy", new Date(d) ) );
                }
            }
            console.log("days : " + days);
            $.ajax({
                type : "POST",
                url : "<?php echo site_url('penjadwalan/checkJadwal')?>",
                dataType : "JSON",
                data : {
                    arr : arr,
                },
                success : function (data) {
                    console.log(data);
                    var alert =`<div id="my-alert" class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Success!</strong> Jadwal sidang sudah dibuat.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    </div>`;
                    $('.alert-container').html(alert); /* alert container class ".alert-container" */
                    $('#my-alert').alert();
                    setTimeout(function(){ /* show the alert for 3sec and then reload the page. */
                        $('#my-alert').alert('close');
                    },3000);
                    // var i = 0;
                    // var html = '<table class="table">\n' +
                    //     '  <thead>\n' +
                    //     '    <tr>\n' +
                    //     '      <th scope="col">#</th>\n' +
                    //     '      <th scope="col">Tanggal</th>\n' +
                    //     '      <th scope="col">Shift 1</th>\n' +
                    //     '      <th scope="col">Shift 2</th>\n' +
                    //     '      <th scope="col">Shift 3</th>\n' +
                    //     '      <th scope="col">Shift 4</th>\n' +
                    //     '    </tr>\n' +
                    //     '  </thead>\n' +
                    //     '  <tbody>';
                    // for(i = 0; i<data['jadwal'].length; i++){
                    //     html += '<tr>\n' +
                    //         '      <th scope="row">' + i + '</th>\n' +
                    //         '      <td>' + data['jadwal'][i] + '<input type="hidden" id="custId" name="jadwal[]" value="' + data['jadwal'][i] + '"></td>\n' +
                    //         '      <td><div class="form-check"><input class="form-check-input" type="checkbox" value="1" id="defaultCheck1" name="shift[]"';
                    //     if(data['shift1'][i] == "1"){
                    //         html += 'disabled';
                    //     }
                    //     html += '></div></td>\n' +
                    //         '      <td><div class="form-check"><input class="form-check-input" type="checkbox" value="2" id="defaultCheck1" name="shift[]"';
                    //     if(data['shift2'][i] == '2'){
                    //         html += 'disabled';
                    //     }
                    //     html += '></div></td>\n' +
                    //         '      <td><div class="form-check"><input class="form-check-input" type="checkbox" value="3" id="defaultCheck1" name="shift[]"';
                    //     if(data['shift3'][i] == '3'){
                    //         html += 'disabled';
                    //     }
                    //     html += '></div></td>\n' +
                    //         '      <td><div class="form-check"><input class="form-check-input" type="checkbox" value="4" id="defaultCheck1" name="shift[]"';
                    //     if(data['shift4'][i] == '4'){
                    //         html += 'disabled';
                    //     }
                    //     html += '></div></td>\n' +
                    //         '    </tr>';
                    // }
                    // html += '</tbody>\n' +
                    //     '</table>' +
                    //     '<button type="submit" class="btn btn-primary">Submit</button>';
                    // $('#apaan').html(html);
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    console.log(textStatus, errorThrown);
                }
            });
        });
    });
</script>
