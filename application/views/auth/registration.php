<div class="container">

    <div class="card o-hidden border-0 shadow-lg my-5">
        <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
                <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
                <div class="col-lg-7">
                    <div class="p-5">
                        <div class="text-center">
                            <h1 class="h4 text-gray-900 mb-4">Buat Sebuah Akun!</h1>
                        </div>
                        <form class="user" method="post" action="<?= base_url('auth/registration'); ?>">
                            <div class="form-group">
                                <input type="text" name="nama" id="nama" class="form-control form-control-user" placeholder="Full Name atau Nama Lengkap" value="<?= set_value('nama'); ?>">
                                <?= form_error('nama', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <div class="form-group">
                                <input type="text" name="username" id="username" class="form-control form-control-user" placeholder="Username" value="<?= set_value('username'); ?>">
                                <?= form_error('username', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <div class="form-group">
                                <input type="text" name="email" id="email" class="form-control form-control-user" placeholder="Alamat Email" value="<?= set_value('email'); ?>">
                                <?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <input type="password" name="password1" id="inputPassword" class="form-control form-control-user" placeholder="Kata Sandi">
                                    <?= form_error('password1', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                                <div class="col-sm-6">
                                    <input type="password" name="password2" id="confirmPassword" class="form-control form-control-user" placeholder="Konfirmasi Kata Sandi">
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary btn-user btn-block" href="auth/login">Register</button>
                        </form>
                        <hr>
                        <div class="text-center">
                            <a class="small" href="<?php echo site_url('auth/forgotpassword') ?>">Lupa Kata Sandi?</a>
                        </div>
                        <div class="text-center">
                            <a class="small" href="<?php echo site_url('auth') ?>">Sudah memiliki akun? Silahkan Login!</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>