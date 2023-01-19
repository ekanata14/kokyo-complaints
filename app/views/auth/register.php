<h1>Register</h1>
<h1>Test</h1>
<form action="<?= BASE_URL ?>/auth/regisUser" method="POST">
    <input type="number" name="nik" placeholder="NIK">
    <input type="text" name="nama" placeholder="Nama">
    <input type="text" name="username" placeholder="Username">
    <input type="password" name="password" placeholder="Password">
    <input type="number" name="telp" placeholder="Telp">
    <button type="submit">Register</button>
</form>