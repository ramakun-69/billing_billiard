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
                            <h4 class="card-title">DATA CHANEL</h4>
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <td width="10%">NO</td>
                                        <td>NAMA CHANEL</td>
                                        <td width="24%">OPSI</td>
                                    </tr>
                                </thead>
                                <tbody id="eddt">
                                    <?php
                                    $no = 1;
                                    foreach ($ddt as $t) { ?>
                                        <tr>
                                            <td><?= $no++; ?></td>
                                            <td><?= $t->nama_chanel; ?></td>
                                            <td class="text-center">
                                                <a href="" data-toggle="modal" data-target="#exampleModal<?= $t->id_chanel; ?>" class="btn btn-sm btn-primary"><i class="fa fa-edit"></i> Edit</a>
                                                <a href="" data-nm="<?= $t->nama_chanel; ?>" data-id="<?= $t->id_chanel; ?>" class="btn btn-sm btn-danger btn_hapus"><i class="fa fa-trash"></i> Hapus</a>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="col-md-4 grid-margin stretch-card">

                    <div class="card">
                        <?= $this->session->flashdata('test'); ?>
                        <div class="card-body">
                            <h4 class="card-title">FORM INPUT CHANEL BARU</h4>


                            <form class="forms-sample" method="POST" action="<?= base_url('setting/chanel'); ?>">
                                <div class="form-group row">
                                    <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Nama Chanel</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="nama" id="exampleInputUsername2" placeholder="Nama Chanel">
                                    </div>
                                </div>


                                <button type="submit" class="btn btn-primary mr-2 btn-block"><i class="fa fa-save"></i> Simpan</button>

                            </form>




                        </div>
                    </div>
                </div>
            </div>


        </div>
        <?php foreach ($ddt as $t) { ?>
            <div class="modal fade" id="exampleModal<?= $t->id_chanel; ?>" role="dialog" aria-labelledby="exampleModalLabel-3" aria-hidden="true">
                <div class="modal-dialog modal-md" role="document">
                    <div class="modal-content">
                        <form action="<?= base_url('setting/edit'); ?>" method="POST">
                            <div class="modal-body">
                                <h4 id="cen" class="text-center"></h4>
                                <input type="hidden" name="id" id="id" value="<?= $t->id_chanel; ?>">
                                <input type="text" class="form-control" name="nama" id="nama" value="<?= $t->nama_chanel; ?>">
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
                                url: "<?= base_url('setting/hapus'); ?>",
                                async: true,
                                dataType: "JSON",
                                data: {
                                    id: id
                                },
                                success: function(data) {
                                    document.location.href = "<?= base_url('setting/chanel'); ?>";
                                    // $('#bayar').modal('show')
                                }
                            });
                        }
                    })

                    return false;
                });
            })
        </script>