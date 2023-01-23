<div class="auth-container">
    <div class="auth-wrapper bg-warning rounded">
        <div class="row">
            <div class="col-6 d-flex justify-content-center align-items-center left-side rounded">
            </div>
            <div class="col-6 right-side">
                <h2 class="mb-3">Register</h2>
                    <form action="<?= BASE_URL ?>/auth/regisUser" method="POST" class="form d-block m-auto">
        <input type="text" name="nik" placeholder="NIK" class="form-control mb-2">
        <input type="text" name="nama" placeholder="Nama" class="form-control mb-2">
        <input type="text" name="username" placeholder="Username" class="form-control mb-2">
        <input type="password" name="password" placeholder="Password" class="form-control mb-2">
        <input type="number" name="telp" placeholder="Telp" class="form-control mb-2">
        <button type="submit" class="btn btn-primary my-3">Register</button>
    </form>
 
               <a href="<?=BASE_URL?>/auth/login" class="text-white text-decoration-none">Sudah punya akun? Login!</a>    
                <br>
               <a href="<?=BASE_URL?>/home" class="text-white text-decoration-none">Kembali ke Beranda</a> 
            </div>
        </div>
    </div>
</div>