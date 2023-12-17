<div class="container-fluid page-body-wrapper">
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="page-header">
                <h3 class="page-title">

                </h3>
            </div>
            <style>
                .berr {
                    font-size: 20pt;
                    font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
                }

                table.tab,
                .tab2 {
                    width: 100%;
                    font-size: 15pt;
                }

                .tab th {
                    padding: 5px;
                    border: 1px solid;
                    border-color: #5200E4;

                }

                .tab2 td {
                    padding: 5px;
                    border: 1px solid;
                    border-color: #5200E4;

                }

                #lebar {
                    width: 100%;
                    height: 300px;
                    overflow-y: scroll;
                    border: 1px solid;
                    border-color: #5200E4;

                }


                #lebar::-webkit-scrollbar {
                    display: none;
                }

                /* Sembunyikan scrollbar untuk IE, Edge dan Firefox */
                #lebar {
                    -ms-overflow-style: none;

                    scrollbar-width: none;

                }
            </style>
            <div class="row">
                <div class="col-md-8 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title"></h4>
                            <table class="tab">
                                <thead>
                                    <tr style="background-color:#5200E4; color:ghostwhite; text-align:center; ">
                                        <td width="5%">NO</td>
                                        <td>KETERANGAN BARANG</td>
                                        <td width="20%"> TOTAL</td>
                                        <td width="15%">OPSI</td>
                                    </tr>
                                </thead>
                            </table>
                            <div id="lebar">
                                <table class="tab2">
                                    <tbody id="eddt">
                                        <?php $no = 1; ?>
                                        <?php
                                        date_default_timezone_set('Asia/Jakarta');
                                        $bln = date('m');
                                        $thn = date('Y');
                                        $sql = "SELECT * FROM pengeluaran WHERE month(tgl_keluar)='$bln' AND year(tgl_keluar) = '$thn'  ORDER BY id_pengeluaran DESC";
                                        $qkk = $this->db->query($sql)->result();
                                        foreach ($qkk as $y) {
                                        ?>
                                            <tr>
                                                <td width="5%"><?= $no++; ?></td>
                                                <td><?= $y->keterangan; ?></td>
                                                <td width="20%">Rp. <span style="float: right;"><?= number_format($y->total, 0, ",", "."); ?></span></td>

                                                <td width="15%" class="text-center">
                                                    <button data-toggle="modal" data-target="#exampleModal<?= $y->id_pengeluaran; ?>" class="btn btn-sm btn-primary"><i class="fa fa-edit"></i></button>
                                                    <button data-nm="<?= $y->keterangan; ?> Total = <?= number_format($y->total, 0, ",", "."); ?>" data-id="<?= $y->id_pengeluaran; ?>" class="btn btn-sm btn-danger btn_hapus"><i class="fa fa-trash"></i></button>
                                                </td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-4 grid-margin stretch-card">

                    <div class="card">
                        <?= $this->session->flashdata('test'); ?>
                        <div class="card-body">
                            <h4 class="card-title">FORM PENGELUARAN</h4>


                            <form class="forms-sample" method="POST" action="<?= base_url('transaksi/pengeluaran'); ?>">


                                <div class="form-group row">
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control" name="ktr" id="ktr" placeholder="Keterangan">
                                        <small class="text-danger"><?= form_error('ktr'); ?></small>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control" name="dbyr" id="dbyr" placeholder="Total Rp. 0">
                                        <small class="text-danger"><?= form_error('dbyr'); ?></small>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-md-4 ">
                                        <button type="reset" class="btn mr-2 btn-block btn-lg">Reset</button>
                                    </div>
                                    <div class="col-md-8 ">
                                        <button type="submit" class="btn btn-primary mr-2 btn-block btn-lg"><i class="fa fa-shopping-cart"></i> Submit</button>
                                    </div>
                                </div>
                            </form>
                            <!-- <hr>
                            <div class="card card-inverse-secondary mb-5">
                                <div class="card-body">
                                    <p class="mb-4">
                                        Warning!!! <br>
                                        Pastikan data yang Anda pilih sudah benar.
                                    </p>

                                </div>
                            </div> -->


                        </div>
                    </div>
                </div>


                <div class="col-md-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="order-listing" class="table">
                                    <thead>
                                        <tr>
                                            <th>NO</th>
                                            <th>KETERANGAN</th>
                                            <th>TGL TRANSAKSI</th>
                                            <th>TOTAL</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = 1; ?>
                                        <?php
                                        date_default_timezone_set('Asia/Jakarta');
                                        $tgg = date('Y-m-d');
                                        $sql = "SELECT * FROM pengeluaran  ORDER BY id_pengeluaran DESC";
                                        $qkk = $this->db->query($sql)->result();
                                        foreach ($qkk as $y) {
                                        ?>
                                            <tr>
                                                <td><?= $no++; ?></td>
                                                <td><?= $y->keterangan; ?></td>
                                                <td><?= format_indo($y->tgl_keluar); ?></td>
                                                <td>Rp. <span style="float: right;"><?= number_format($y->total, 0, ",", "."); ?></span></td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


        </div>
        <?php foreach ($qkk as $t) { ?>
            <div class="modal fade" id="exampleModal<?= $t->id_pengeluaran; ?>" role="dialog" aria-labelledby="exampleModalLabel-3" aria-hidden="true">
                <div class="modal-dialog modal-md" role="document">
                    <div class="modal-content">
                        <form action="<?= base_url('transaksi/edit_pengeluaran'); ?>" method="POST">
                            <input type="hidden" name="id" id="id" value="<?= $t->id_pengeluaran; ?>">
                            <div class="modal-body">
                                <h4 id="cen" class="text-center"></h4>


                                <div class="form-group row">
                                    <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Keterangan</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="ktr" id="exampleInputUsername2" value="<?= $t->keterangan; ?>">
                                        <small class="text-danger"><?= form_error('ktr'); ?></small>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Total</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="tttl" id="exampleInputUsername2" value="<?= $t->total; ?>">
                                        <small class="text-danger"><?= form_error('tttl'); ?></small>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-success btn-block">EDIT</button>
                                <button type="button" class="btn btn-light" data-dismiss="modal">Cancel</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        <?php } ?>
        <script type="text/javascript">
            $(document).ready(function() {
                $('#eddt').on('click', '.btn_hapus', function() {
                    var id = $(this).attr('data-id');
                    var nm = $(this).attr('data-nm');
                    Swal.fire({
                        title: nm,
                        text: "Data akan di hapus",

                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Ya, Hapus!'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            $.ajax({
                                type: "POST",
                                url: "<?= base_url('transaksi/hapus_pengeluaran'); ?>",
                                async: true,
                                dataType: "JSON",
                                data: {
                                    id: id
                                },
                                success: function(data) {
                                    document.location.href = "<?= base_url('dashboard/pengeluaran'); ?>";
                                    // $('#bayar').modal('show')
                                }
                            });
                        }
                    })

                    return false;
                });
            })
        </script>