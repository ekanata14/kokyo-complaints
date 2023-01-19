<h1>Login</h1>
<form action="<?= BASE_URL ?>/auth/loginUser" method="POST">
    <input type="number" name="nik" placeholder="NIK">
    <input type="password" name="password" placeholder="Password">
    <button type="submit">Login</button>
</form>