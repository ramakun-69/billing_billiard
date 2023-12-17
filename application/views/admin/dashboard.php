<style>
    .coba {
        border: 2px solid;
        border-color: skyblue;
        border-radius: 30px;
        background-image: url('assets/snooker.jpg');
        background-size: contain;
        background-position: center;
        background-repeat: no-repeat;
        color: black;
        padding: 5px;
        text-align: center;
        height: 250px;
        width: 500px;
        margin: 5px;
        /* margin: 1px; */
    }
</style>
<div class="container-fluid page-body-wrapper">
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="page-header">
                <h3 class="page-title">

                </h3>
            </div>

            <div class="row">
                <div class="col-md-8 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <div class="row" id="chanelll">
                                <?php foreach ($ddt as $t) {
                                    $sql_member = "SELECT * FROM member WHERE id_chanel='$t->id_chanel' AND status='Y' ";
                                    $wher = $this->db->query($sql_member)->result();
                                    $row = $this->db->query($sql_member)->num_rows();

                                ?>
                                    <div class="col-md-3 coba">
                                        <div class="sat text-warning"><b><?= strtoupper($t->nama_chanel); ?></b></div>
                                        <?php if ($t->status == 'N') { ?>
                                            <h3 class="">READY</h3>
                                        <?php } else { ?>
                                            <h3 class="text-success">ON GOING</h3>
                                        <?php } ?>

                                        <?php if ($row == 0) { ?>
                                            <b class=""> 00:00:00</b>
                                            <p>MEMBER</p>
                                        <?php } else { ?>
                                            <?php
                                            error_reporting(0);
                                            date_default_timezone_set('Asia/Jakarta');
                                            $no = 1;
                                            foreach ($wher as $k) {
                                                $awal  = date_create($k->tgl_mulai);
                                                $akhir = date_create(date('Y-m-d H:i:s')); // waktu sekarang
                                                $diff  = date_diff($awal, $akhir);
                                                $thn = $diff->y . ' Tahun, ';
                                                $bln = $diff->m . ' Bulan, ';
                                                $hr = $diff->d . ' Hari, ';
                                                $jamm =  $diff->h;
                                                $mnt =  $diff->i;
                                                $dtk =  $diff->s;
                                                if ($thn != 0) {
                                                    $thn1 = $thn;
                                                } else {
                                                    $thn1 = "";
                                                }
                                                if ($bln != 0) {
                                                    $bln1 = $bln;
                                                } else {
                                                    $bln1 = "";
                                                }

                                                if ($hr != 0) {
                                                    $hr1 = $hr;
                                                } else {
                                                    $hr1 = "";
                                                }

                                                if ($jamm >= 10) {
                                                    $jamm1 = $jamm;
                                                } else {
                                                    $jamm1 = "0" . $jamm;
                                                }

                                                if ($mnt >= 10) {
                                                    $mnt1 = $mnt;
                                                } else {
                                                    $mnt1 = "0" . $mnt;
                                                }

                                                if ($dtk >= 10) {
                                                    $dtk1 = $dtk;
                                                } else {
                                                    $dtk1 = "0" . $dtk;
                                                }
                                                $timestampg =  $thn1 . $bln1 . $hr1 .  $jamm1 .  ":" . $mnt1 . ":" . $dtk1;
                                                $idm =  $k->id_member;
                                                $ddt = $k->tgl_mulai;
                                            ?>
                                                <input type="hidden" name="jjm" id="jjm" value="<?= $no; ?>">
                                                <h1 id="jamServer<?= $t->id_chanel ?>"><?= $timestampg; ?> </h1>

                                                <script>
                                                    var serverClock = jQuery("#jamServer" + '<?= $t->id_chanel ?>');
                                                    if (serverClock.length > 0) {
                                                        showServerTime(serverClock, serverClock.text());
                                                    }

                                                    function showServerTime(obj, time) {
                                                        var parts = time.split(":"),
                                                            newTime = new Date('<?= $k->tgl_mulai ?>');

                                                        newTime.setHours(parseInt(parts[0], 10));
                                                        newTime.setMinutes(parseInt(parts[1], 10));
                                                        newTime.setSeconds(parseInt(parts[2], 10));

                                                        var timeDifference = new Date().getTime() - newTime.getTime();

                                                        var methods = {
                                                            displayTime: function() {
                                                                var now = new Date(new Date().getTime() - timeDifference);
                                                                obj.text([
                                                                    methods.leadZeros(now.getHours(), 2),
                                                                    methods.leadZeros(now.getMinutes(), 2),
                                                                    methods.leadZeros(now.getSeconds(), 2)
                                                                ].join(":"));
                                                                setTimeout(methods.displayTime, 500);
                                                            },

                                                            leadZeros: function(time, width) {
                                                                while (String(time).length < width) {
                                                                    time = "0" + time;
                                                                }
                                                                return time;
                                                            }
                                                        }
                                                        methods.displayTime();
                                                    }
                                                </script>
                                                <p><?= $k->nama_member; ?></p>
                                            <?php   } ?>
                                        <?php } ?>
                                        <?php if ($t->status == 'N') { ?>
                                            <button type="button" data-nm="<?= $t->nama_chanel; ?>" data-id="<?= $t->id_chanel; ?>" class="btn btn-success btn-sm btn_star" data-toggle="modal" data-target="#exampleModal-3">START <i class="fa fa-play-circle ml-1"></i></button>
                                        <?php } else { ?>
                                            <button data-nm="<?= $t->nama_chanel; ?>" data-idc="<?= $t->id_chanel; ?>" data-idm="<?= $idm; ?>" class="btn  btn-info btn-sm btn_stop"> STOP <i class="fa fa-stop ml-1"></i></button>
                                            <a href="" data-nm="<?= $t->nama_chanel; ?>" data-idc="<?= $t->id_chanel; ?>" data-idm="<?= $idm; ?>" class="btn text-danger btn_hapus"><i class="fa fa-trash"></i></a>
                                        <?php } ?>
                                    </div>
                                <?php   } ?>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-4 grid-margin stretch-card">

                    <div class="card">
                        <?= $this->session->flashdata('test'); ?>
                        <div class="card-body">
                            <h4 class="card-title">FORM PEMBAYARAN</h4>
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th width="30%">Atas Nama</th>
                                        <th id="nma"></th>
                                    </tr>
                                    <tr>
                                        <th>Lama Sewa</th>
                                        <th id="lama"></th>
                                    </tr>

                                    <tr>
                                        <th>Total</th>
                                        <th id="tl_rp"></th>
                                    </tr>
                                </thead>
                            </table>
                            <hr>
                            <style>
                                .berr {
                                    font-size: 20pt;
                                    font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
                                }

                                .kecc {
                                    font-size: 12pt;
                                    color: red;
                                    font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
                                }
                            </style>
                            <form class="forms-sample" method="POST" action="<?= base_url('dashboard/bayar'); ?>">
                                <div class="row">

                                    <div class="col-md-8">
                                        <input type="hidden" name="id_m" id="id_m">
                                        <input type="hidden" name="sewa" id="sewa">
                                        <input type="hidden" name="total" id="total">
                                        <input type="hidden" name="by" id="by">
                                        <input type="text" class="form-control berr" name="dbyr" id="dbyr" placeholder=" Rp. 0" autofocus>
                                        <input type="text" class="form-control kecc" name="kemd" id="kemd" placeholder="Kembali Rp. 0" readonly>
                                    </div>
                                    <div class="col-md-4 text-center">
                                        <button type="submit" class=" btn-block btn-lg btn btn-primary mr-14 ">

                                            <i class="fa fa-save font-weight-bold icon-lg"></i><br>
                                            <br>
                                            SAVE
                                        </button>
                                        <style>
                                            span.km {
                                                font-size: 8pt;
                                                color: red;
                                            }
                                        </style>
                                        <span class="km "> <?php
                                                            $sql = "SELECT * FROM harga";
                                                            $w = $this->db->query($sql)->row();
                                                            echo "Harga Per " . $w->menit . " : Rp. " . number_format($w->harga, 0, ",", ".");
                                                            ?></span>
                                        <input type="hidden" name="hargac" id="" value="Harga Rp.  <?= number_format($w->harga, 0, ",", "."); ?> Per <?= $w->menit; ?> Menit">
                                    </div>
                                </div>
                            </form>

                        </div>
                        <div class="card-body">
                            <style>
                                table.tab,
                                .tab2 {
                                    width: 100%;
                                    font-size: 10pt;
                                }

                                .tab th {
                                    padding: 5px;
                                    border: 1px solid;
                                    border-color: #000000;
                                }

                                .tab2 td {
                                    padding: 2px;
                                    border: 1px solid;
                                    border-color: #000000;
                                }

                                #lebar {
                                    width: 100%;
                                    height: 300px;
                                    overflow-y: scroll;
                                    border: 1px solid;
                                    border-color: #000000;

                                }


                                #lebar::-webkit-scrollbar {
                                    display: none;
                                }

                                /* Sembunyikan scrollbar untuk IE, Edge dan Firefox */
                                #lebar {
                                    -ms-overflow-style: none;

                                    scrollbar-width: none;

                                }
                                .tab {
        width: 100%;
    }
</style>

<div id="lebar">
    <table class="tab">
        <thead>
            <tr style="background-color:#000000; color:ghostwhite;">
                <th class="text-center">Nama Paket</th>
                <th class="text-center">LAMA SEWA</th>
                <th>TANGGAL MULAI</th>
                <th>TANGGAL STOP</th>
                <th class="text-center">TOTAL</th>
                <th class="text-center">DIBAYAR</th>
                <th class="text-center">HAPUS</th>
            </tr>
        </thead>
        <tbody>
            <?php
            date_default_timezone_set('Asia/Jakarta');
            $tgll = date('d');
            $bulan = date('m');
            $tahun = date('Y');
            $member_sql = "SELECT * FROM member WHERE month(tgl_stop)='$bulan' and year(tgl_stop) ='$tahun' AND day(tgl_stop) ='$tgll' AND status='N' ORDER BY id_member DESC";
            $whil = $this->db->query($member_sql)->result();
            $tot = 0;
            foreach ($whil as $f) {
            
            ?>
                <tr>
                    <td><?= $f->nama_member; ?></td>
                    <td class="text-center"><?= $f->lama_sewa; ?></td>
                    <td><?= format_indo($f->tgl_mulai); ?></td>
                    <td><?= format_indo($f->tgl_stop); ?></td>
                    <td class="text-right"><?= "Rp. " . number_format($f->total, 0, ",", "."); ?></td>
                    <td class="text-right"><?= "Rp. " . number_format($f->dibayar, 0, ",", "."); ?></td>
                    <td class="text-center">
                        <button data-nm="<?= $f->nama_member; ?>" data-id="<?= $f->id_member; ?>" class="btn_ubah"><i class="text-success fa fa-edit"></i></button>
                        <button data-nm="<?= $f->nama_member; ?>" data-id="<?= $f->id_member; ?>" class="btn_hapus"><i class="text-danger fa fa-trash"></i></button>
                    </td>
                </tr>
            <?php } ?>
            </tr>
        </tbody>
    </table>
</div>
                        </div>
                    </div>
                </div>
            </div>


        </div>
        <div class="modal fade" id="exampleModal-3" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel-3" aria-hidden="true">
            <div class="modal-dialog modal-sm" role="document">
                <div class="modal-content">
                    <form action="<?= base_url('dashboard/mulai'); ?>" method="POST">
                        <div class="modal-body">
                            <h4 id="cen" class="text-center"></h4>
                            <input type="hidden" name="id" id="id">
                            <input type="text" class="form-control" name="nama" id="nama" placeholder="Atas Nama" autofocus required>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-success btn-block">START</button>
                            <button type="button" class="btn btn-light" data-dismiss="modal">Cancel</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>


        <!-- content-wrapper ends -->
        <!-- partial:../../partials/_footer.html -->
        <script>
            $('#chanelll').on('click', '.btn_star', function() {
                var id = $(this).attr('data-id');
                var nm = $(this).attr('data-nm');
                if ($('#exampleModal-3').show()) {
                    $("#id").val(id);
                    $("#cen").html(nm);
                    $("#nama").focus();
                }
            })
        </script>


        <script type="text/javascript">
            $(document).ready(function() {

                $('#dbyr').keyup(function() {

                    var total = parseInt($('#total').val());

                    var byr = $('#dbyr').val();

                    var kode1 = "Rp. ";
                    byr = byr.replaceAll(kode1, "");
                    var kode2 = ".";
                    byr = byr.replaceAll(kode2, "");

                    var ff = parseInt(byr);
                    $("#by").val(ff);

                    var sub_total = ff - total;


                    var reverse = sub_total.toString().split('').reverse().join(''),
                        ribuan_sub_total = reverse.match(/\d{1,3}/g);
                    ribuan_sub_total = ribuan_sub_total.join(',').split('').reverse().join('');
                    if (ff >= total) {
                        $("#kemd").val("KEMBALI : Rp. " + ribuan_sub_total);
                    } else {
                        $("#kemd").val("KURANG : Rp. " + ribuan_sub_total);
                    }
                });

                $.ajax({
                    type: 'GET',
                    url: '<?php echo base_url() ?>dashboard/timefs',
                    async: true,
                    dataType: 'json',
                    success: function(data) {
                        if (data.status == "success") {
                            $("#nma").html(data.nama);
                            $("#id_m").val(data.id_member);
                            $("#tl_rp").html(data.tl_rp);
                            $("#total").val(data.total);
                            $("#lama").html(data.lama);
                            $("#sewa").val(data.lama);
                        } else {
                            $("#nma").html();
                        }
                    }
                });

                $('#chanelll').on('click', '.btn_stop', function() {
                    var idc = $(this).attr('data-idc');
                    var idm = $(this).attr('data-idm');
                    var nm = $(this).attr('data-nm');
                    Swal.fire({
                        title: nm,
                        text: "Pastikan data yang anda pilih sudah benar!",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Ya, Stop!'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            $.ajax({
                                type: "POST",
                                url: "<?= base_url('dashboard/stop'); ?>",
                                async: true,
                                dataType: "JSON",
                                data: {
                                    idc: idc,
                                    idm: idm
                                },
                                success: function(data) {
                                    document.location.href = "<?= base_url('dashboard'); ?>";
                                    // $('#bayar').modal('show')
                                }
                            });
                        }
                    })

                    return false;
                });

                $('#chanelll').on('click', '.btn_hapus', function() {
                    var idc = $(this).attr('data-idc');
                    var idm = $(this).attr('data-idm');
                    var nm = $(this).attr('data-nm');

                    const swalWithBootstrapButtons = Swal.mixin({
                        customClass: {
                            confirmButton: 'btn btn-success',
                            cancelButton: 'btn btn-danger'
                        },
                        buttonsStyling: false
                    })
                    swalWithBootstrapButtons.fire({
                        title: 'Apa kamu yakin?',
                        text: "Data yang aktif di " + nm + " akan di hapus!",
                        icon: 'question',
                        showCancelButton: true,
                        confirmButtonText: 'Ya, Hapus!',
                        cancelButtonText: 'Batal!',
                        reverseButtons: true
                    }).then((result) => {
                        if (result.isConfirmed) {
                            $.ajax({
                                type: "POST",
                                url: "<?= base_url('dashboard/hapus'); ?>",
                                async: true,
                                dataType: "JSON",
                                data: {
                                    idc: idc,
                                    idm: idm
                                },
                                success: function(data) {

                                    document.location.href = "<?= base_url('dashboard'); ?>";
                                    // $('#bayar').modal('show')
                                }
                            });
                        } else if (
                            /* Read more about handling dismissals below */
                            result.dismiss === Swal.DismissReason.cancel
                        ) {
                            swalWithBootstrapButtons.fire(
                                'Batalkan',
                                'Data tetap aktif :)',
                                'error'
                            )
                        }
                    })

                    return false;
                });

                $('#lebar').on('click', '.btn_ubah', function() {
                    var id = $(this).attr('data-id');
                    var nm = $(this).attr('data-nm');
                    Swal.fire({
                        title: 'Atas Nama ' + nm,
                        text: "Data pembayaran akan di Edit",

                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Ya, Edit!'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            $.ajax({
                                type: "POST",
                                url: "<?= base_url('dashboard/edit_bayar'); ?>",
                                async: true,
                                dataType: "JSON",
                                data: {
                                    id: id
                                },
                                success: function(data) {
                                    document.location.href = "<?= base_url('dashboard'); ?>";
                                    // $('#bayar').modal('show')
                                }
                            });
                        }
                    })

                    return false;
                });

                $('#lebar').on('click', '.btn_hapus', function() {
                    var id = $(this).attr('data-id');
                    var nm = $(this).attr('data-nm');
                    Swal.fire({
                        title: 'Atas Nama ' + nm,
                        text: "Data akan di hapus",

                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Ya, Hapus!'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            $.ajax({
                                type: "POST",
                                url: "<?= base_url('dashboard/hapus_bayar'); ?>",
                                async: true,
                                dataType: "JSON",
                                data: {
                                    id: id
                                },
                                success: function(data) {
                                    document.location.href = "<?= base_url('dashboard'); ?>";
                                    // $('#bayar').modal('show')
                                }
                            });
                        }
                    })

                    return false;
                });

            });
        </script>