<div class="container-fluid page-body-wrapper">
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="page-header">
                <h3 class="page-title">

                </h3>
            </div>

            <div class="row">
                <div class="col-md-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">CETAK LAPORAN</h4>
                            <div class="row">
                                <div class="col-md-3">
                                    <div id="datepicker-popup" class="input-group date datepicker">
                                        <select name="data" id="data" class="form-control">
                                            <option value="">Pilih Data</option>
                                            <option value="1">Per Tanggal</option>
                                            <option value="2">Per Member</option>
                                            <option value="3">Laporan Keseluruhan</option>
                                        </select>

                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div id="datepicker-popup" class="input-group date datepicker">
                                        <input type="date" class="form-control" name="tgl1" id="tgl1">

                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div id="datepicker-popup" class="input-group date datepicker">
                                        <input type="date" class="form-control" name="tgl2" id="tgl2">

                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <button class="btn btn-lg btn-primary" id="search">CARI</button>
                                    <a id="pdf-link" href="#" class="btn btn-lg btn-info"><i class="fa fa-file-pdf"></i> SIMPAN FILE DALAM FORMAT PDF</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body tampilkan_data" id="data-print">
                            <div class="card-header loading">

                            </div>

                        </div>
                    </div>
                </div>

            </div>


        </div>
        <script type="text/javascript">
            $(document).ready(function() {
                // $('.data').load("data.php");
                $("#search").click(function() {
                    //sel_motor = $('[name="setatus"]');
                    //sel_motor = $('[name="status"]');

                    var tgl1 = $("#tgl1").val();
                    var tgl2 = $("#tgl2").val();
                    var data = $("#data").val();
                    $('#pdf-link').attr('href', 'Generate_Pdf/index/' + tgl1 + '/' + tgl2);
                    $.ajax({

                        type: 'POST',
                        url: "<?= base_url('laporan/view_laporan') ?>",
                        data: {
                            data: data,
                            tgl1: tgl1,
                            tgl2: tgl2
                        },
                        cache: false,
                        beforeSend: function() {
                            $(this).html("SEARCHING...").attr("disabled", "disabled");
                            $('.loading').html('Loading...');
                        },
                        success: function(data) {
                            $("#search").html("CARI").removeAttr("disabled");
                            $('.loading').html('');
                            $('.tampilkan_data').html(data);
                        }
                    });
                    return false;
                });
            });
        </script>