<div class="container-fluid page-body-wrapper">
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="page-header">
                <h3 class="page-title">

                </h3>
            </div>

            <div class="row">
                <div class="col-md-4 grid-margin stretch-card">
                    <div class="card">
                        <?= $this->session->flashdata('pass'); ?>
                        <div class="card-body">
                            <h4 class="card-title">EDIT PASSWORD</h4>
                            <form class="forms-sample" method="POST" action="<?= base_url('dashboard/password'); ?>">
                                <div class="form-group row">
                                    <label for="exampleInputUsername2" class="col-sm-5 col-form-label">Username</label>
                                    <div class="col-sm-7">
                                        <input type="text" class="form-control" id="exampleInputUsername2" placeholder="<?= $user['username']; ?>" readonly>

                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="exampleInputUsername2" class="col-sm-5 col-form-label">Password Lama</label>
                                    <div class="col-sm-7">
                                        <input type="password" class="form-control" name="pass_lama" id="exampleInputUsername2" placeholder="Password Lama">
                                        <small class="text-danger"><?= form_error('pass_lama'); ?></small>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="exampleInputUsername2" class="col-sm-5 col-form-label">Password Baru</label>
                                    <div class="col-sm-7">
                                        <input type="password" class="form-control" name="password1" id="exampleInputUsername2" placeholder="Password Baru">
                                        <small class="text-danger"><?= form_error('password1'); ?></small>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="exampleInputUsername2" class="col-sm-5 col-form-label">Konfirmasi Password Baru</label>
                                    <div class="col-sm-7">
                                        <input type="password" class="form-control" name="password2" id="exampleInputUsername2" placeholder="Konfirmasi Password Baru">
                                        <small class="text-danger"><?= form_error('password2'); ?></small>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary mr-2 btn-block"><i class="fa fa-save"></i> Edit</button>

                            </form>
                        </div>
                    </div>
                </div>


            </div>


        </div>