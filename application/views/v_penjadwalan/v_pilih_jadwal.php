<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
          integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />

    <title>Hello, world!</title>
</head>
<body>
<?= $this->renderSection('content') ?>

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
        crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
        crossorigin="anonymous"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
<script>
    $(function() {
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
                url : "<?php echo site_url('/jadwal/checkJadwal')?>",
                dataType : "JSON",
                data : {
                    arr : arr,
                },
                success : function (data) {
                    var i = 0;
                    var html = '<table class="table">\n' +
                        '  <thead>\n' +
                        '    <tr>\n' +
                        '      <th scope="col">#</th>\n' +
                        '      <th scope="col">Tanggal</th>\n' +
                        '      <th scope="col">Shift 1</th>\n' +
                        '      <th scope="col">Shift 2</th>\n' +
                        '      <th scope="col">Shift 3</th>\n' +
                        '      <th scope="col">Shift 4</th>\n' +
                        '    </tr>\n' +
                        '  </thead>\n' +
                        '  <tbody>';
                    for(i = 0; i<data['jadwal'].length; i++){
                        html += '<tr>\n' +
                            '      <th scope="row">' + i + '</th>\n' +
                            '      <td>' + data['jadwal'][i] + '<input type="hidden" id="custId" name="jadwal[]" value="' + data['jadwal'][i] + '"></td>\n' +
                            '      <td><div class="form-check"><input class="form-check-input" type="checkbox" value="1" id="defaultCheck1" name="shift[]"';
                        if(data['shift1'][i] == "1"){
                            html += 'disabled';
                        }
                        html += '></div></td>\n' +
                            '      <td><div class="form-check"><input class="form-check-input" type="checkbox" value="2" id="defaultCheck1" name="shift[]"';
                        if(data['shift2'][i] == '2'){
                            html += 'disabled';
                        }
                        html += '></div></td>\n' +
                            '      <td><div class="form-check"><input class="form-check-input" type="checkbox" value="3" id="defaultCheck1" name="shift[]"';
                        if(data['shift3'][i] == '3'){
                            html += 'disabled';
                        }
                        html += '></div></td>\n' +
                            '      <td><div class="form-check"><input class="form-check-input" type="checkbox" value="4" id="defaultCheck1" name="shift[]"';
                        if(data['shift4'][i] == '4'){
                            html += 'disabled';
                        }
                        html += '></div></td>\n' +
                            '    </tr>';
                    }
                    html += '</tbody>\n' +
                        '</table>' +
                        '<button type="submit" class="btn btn-primary">Submit</button>';
                    $('#apaan').html(html);
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    console.log(textStatus, errorThrown);
                }
            });
        });
    });
</script>
</body>
</html>