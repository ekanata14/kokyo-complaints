<h1>Halaman Complain</h1>
<h2>Silahkan Tulis dibawah ini</h2>
<form action="<?= BASE_URL ?>/complaints/addComplaints" method="POST" enctype="multipart/form-data">
    <input type="hidden" name="nik" value="<?= $_SESSION['nik']?>">
    <textarea name="isi_laporan" id="isi_laporan" cols="30" rows="10"></textarea>
    <h2>Jika ada gambar masukkan dibawah ini</h2>
    <input type="file" name="foto">
    <button type="submit">Kirim</button>
</form>