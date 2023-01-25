<div class="auth-container">
    <div class="auth-wrapper bg-primary rounded">
        <div class="row">
            <div class="col-6 d-flex justify-content-center align-items-center left-side rounded">
            </div>
            <div class="col-6 right-side">
                <h2 class="mb-3">Login</h2>
                <?php Flasher::Flash()?>
                <form action="<?= BASE_URL ?>/auth/loginUser" method="POST" class="form d-block m-auto">
                    <input type="text" name="nik" placeholder="NIK" class="mb-3 form-control">
                    <input type="password" name="password" placeholder="Password" class="mb-3 form-control">
                    <button type="submit" class="btn btn-warning my-3">Login</button>
                </form>
                <div class="w-50 d-block m-auto mt-3">
                    <a href="<?=BASE_URL?>/auth/register" class="text-white text-decoration-none">Belum punya akun? Register!</a>    
                    <hr>
                  <a href="<?=BASE_URL?>/home" class="text-white text-decoration-none">Kembali ke Beranda</a>
                </div>
            </div>
        </div>
    </div>
</div>