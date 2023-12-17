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
                        <?= $this->session->flashdata('test'); ?>
                        <div class="card-body">
                            <h4 class="card-title">DATA HARGA PERMENIT</h4>
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <td width="10%">NO</td>
                                        <td>JML MENIT</td>
                                        <td>HARGA PERMENIT</td>
                                        <td width="24%">OPSI</td>
                                    </tr>
                                </thead>
                                <tbody id="eddt">
                                    <?php
                                    $no = 1;
                                    foreach ($ddt as $t) { ?>
                                        <tr>
                                            <td><?= $no++; ?></td>
                                            <td><?= $t->menit; ?></td>
                                            <td><?= $t->harga; ?></td>
                                            <td class="text-center">
                                                <a href="" data-toggle="modal" data-target="#exampleModal<?= $t->id_harga; ?>" class="btn btn-sm btn-primary"><i class="fa fa-edit"></i> Edit</a>

                                            </td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>


            </div>


        </div>
        <?php foreach ($ddt as $t) { ?>
            <div class="modal fade" id="exampleModal<?= $t->id_harga; ?>" role="dialog" aria-labelledby="exampleModalLabel-3" aria-hidden="true">
                <div class="modal-dialog modal-md" role="document">
                    <div class="modal-content">
                        <form action="<?= base_url('setting/edit_harga'); ?>" method="POST">
                            <div class="modal-body">
                                <h4 id="cen" class="text-center"></h4>
                                <input type="hidden" name="id" id="id" value="<?= $t->id_harga; ?>">
                                <div class="form-group row">
                                    <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Jml Menit</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="menit" id="menit" value="<?= $t->menit; ?>">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Harga permenit</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="harga" id="harga" value="<?= $t->harga; ?>">
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