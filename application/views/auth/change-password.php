<div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

        <div class="col-xl-10 col-lg-12 col-md-9">

            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">
                    <!-- Nested Row within Card Body -->
                    <div class="row">
                        <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
                        <div class="col-lg-6">
                            <div class="p-5">

                                <?php $reset_email = $this->session->userdata('reset_email') ?>

                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-4">Ubah Kata Sandi Untuk "<?php echo $reset_email ?>"</h1>
                                </div>

                                <?php echo $this->session->flashdata('message') ?>

                                <form class="user" method="post" action="<?= base_url('auth/changepassword') ?>">
                                    <div class="form-group">
                                        <input type="password" class="form-control form-control-user" name="password1" id="password1" placeholder="Masukan Kata Sandi Baru" autofocus="autofocus">
                                        <?= form_error('password1', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>

                                    <div class="form-group">
                                        <input type="password" class="form-control form-control-user" name="password2" id="password2" placeholder="Ulang Kata Sandi Baru" autofocus="autofocus">
                                        <?= form_error('password2', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>

                                    <button type="submit" class="btn btn-primary btn-user btn-block">Ubah Kata Sandi</button>
                                </form>

                                <hr>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>

</div>