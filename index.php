<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>CMS Blog</title>

<style>
/* RESET */
body {
  margin: 0;
  font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
  background: #f4f6f9;
}

/* TOPBAR */
.topbar {
  background: #2f3e4e;
  color: white;
  padding: 15px 25px;
}

.topbar .sub {
  font-size: 12px;
  color: #ccc;
}

/* LAYOUT */
.main {
  display: flex;
}

.sidebar {
  width: 240px;
  padding: 20px;
}

.sidebar .menu-box {
  background: white;
  border-radius: 12px;
  padding: 15px;
  box-shadow: 0 2px 8px rgba(0,0,0,0.05);
}

.menu-title {
  font-size: 12px;
  color: #999;
  margin-bottom: 10px;
}

.sidebar button {
  display: flex;
  align-items: center;
  width: 100%;
  padding: 10px;
  margin-bottom: 6px;
  border: none;
  background: none;
  cursor: pointer;
  border-radius: 8px;
}

.sidebar button:hover {
  background: #e8f5e9;
}
.sidebar button.active {
  background: #e8f5e9;
  color: #2e7d32;
  font-weight: 500;
}

/* CONTENT */
.content {
  flex: 1;
  padding: 25px;
  max-width: 1000px;
  margin: auto;
}

/* TABLE */
.table-card {
  margin-top: 10px;
  background: white;
  padding: 15px;
  border-radius: 10px;
  box-shadow: 0 4px 12px rgba(0,0,0,0.08);
}

table {
  width: 100%;
  border-collapse: collapse;
  margin-top: 10px;
}

.table-header {
  display: flex;
  justify-content: space-between;
  align-items: center;
  margin-bottom: 10px;
}
th, td {
  padding: 10px;
  border-bottom: 1px solid #ddd;
  text-align: center;
  vertical-align: middle;
}

th {
  background: #f0f0f0;
}

td img {
  width: 60px;
  height: 60px;
  object-fit: cover;
  border-radius: 5px;
}

/* BUTTON */
.btn {
  padding: 8px 12px;
  border: none;
  border-radius: 5px;
  cursor: pointer;
  color: white;
}
.btn-group {
  display: flex;
  justify-content: flex-end;
  gap: 10px;
  margin-top: 10px;
}

.edit { background: #2196F3; }
.hapus { background: #f44336; }
.tambah { background: #4CAF50; margin-bottom: 10px; }

.simpan { background: #4CAF50; }
.batal { background: #9e9e9e; color: white; }

.simpan:hover { background: #45a049; }
.batal:hover { background: #7e7e7e; }

/* FORM */
.form-center {
  display: flex;
  justify-content: center;
  margin-top: 20px;
}

.card-form {
  background: white;
  padding: 25px;
  border-radius: 12px;
  box-shadow: 0 4px 10px rgba(0,0,0,0.1);
  max-width: 600px;
  width: 100%;
}
.card-form label {
  color: #000;        /* hitam */
  font-weight: 500;
}

.card-form h3 {
  margin-bottom: 15px;
  
}
input::placeholder,
textarea::placeholder {
  font-family: inherit;
  font-size: 14px;
}
input,
textarea,
select,
button {
  font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
  font-size: 14px;
}

.form-group {
  margin-bottom: 15px;
}

.form-group label {
  display: block;
  margin-bottom: 6px;
  font-size: 14px;
  color: #555;
}

.form-group select,
.col select {
  width: 100%;
  padding: 10px;
  margin-top: 5px;
  margin-bottom: 12px;
  border-radius: 6px;
  border: 1px solid #ccc;
  font-size: 14px;
  font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
  box-sizing: border-box;
}

.card-form input,
.card-form textarea {
  width: 100%;
  padding: 10px;
  border: 1px solid #ccc;
  border-radius: 6px;
  box-sizing: border-box;
  margin-bottom: 10px;
}

/* row 2 kolom */
.row {
  display: flex;
  gap: 20px;
}

.col {
  flex: 1;
}
.col label {
  display: block;
  margin-bottom: 5px;
  font-size: 14px;
  color: #555;
}

.btn-group {
  display: flex;
  justify-content: flex-end;
  gap: 10px;
}
.error-box {
  display: none;
  background: #ffebee;
  color: #c62828;
  padding: 10px;
  border-radius: 6px;
  margin-bottom: 10px;
  font-size: 14px;
}
.aksi-btn {
  display: flex;
  justify-content: center;
  gap: 8px;
}

/* MODAL */
.modal-bg {
  position: fixed;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background: rgba(0,0,0,0.4);
  display: flex;
  justify-content: center;
  align-items: center;
  z-index: 999;
}

.modal-box {
  background: white;
  padding: 25px;
  border-radius: 12px;
  width: 400px;
  max-width: 90%;
  box-shadow: 0 4px 10px rgba(0,0,0,0.2);
}

.modal-box input,
.modal-box textarea {
  width: 100%;
  padding: 8px;
  margin-bottom: 10px;
  border-radius: 6px;
  border: 1px solid #ccc;
  box-sizing: border-box;
}

/* BADGE */
.badge-kategori {
  display: inline-block;
  padding: 5px 12px;
  background: #e3f2fd;
  color: #2196F3;
  border-radius: 20px;
  font-size: 13px;
}
.popup-hapus {
  border-radius: 12px;
  padding: 30px 20px;
  width: 420px !important;
}

.title-hapus {
  font-size: 24px !important;
  font-weight: 700 !important;
  color: #222 !important;
}

.text-hapus {
  font-size: 15px !important;
  color: #888 !important;
  margin-top: 10px;
}
.btn-hapus-merah:hover {
  background: #e53935;
}

.btn-batal-abu:hover {
  background: #9e9e9e;
}
.popup-hapus {
  border-radius: 20px;
  padding: 30px;
  width: 420px;
}

.icon-hapus {
  width: 70px;
  height: 70px;
  background: #ffeaea;
  border-radius: 50%;
  display: flex;
  align-items: center;
  justify-content: center;
  margin: 0 auto 20px;
}

.icon-hapus i {
  font-size: 30px;
  color: #e53935;
}

.title-hapus {
  font-size: 24px;
  font-weight: 700;
  margin-bottom: 10px;
}

.text-hapus {
  font-size: 15px;
  color: #666;
  margin-bottom: 25px;
}

.btn-hapus-merah {
  background: #e53935;
  color: white;
  border: none;
  padding: 12px 28px;
  border-radius: 10px;
  font-weight: 600;
  cursor: pointer;
}

.btn-batal-abu {
  background: #e0e0e0;
  color: #333;
  border: none;
  padding: 12px 28px;
  border-radius: 10px;
  font-weight: 600;
  cursor: pointer;
  margin-right: 10px;
}
</style>
</head>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<body>

<div class="container">

<div class="topbar">
  <div class="topbar-left">
    <strong>Sistem Manajemen Blog (CMS)</strong>
    <div class="sub">Blog Keren</div>
  </div>
</div>

<div class="main">

<!-- SIDEBAR PUTIH -->
<div class="sidebar">

  <div class="menu-box">
    <p class="menu-title">MENU UTAMA</p>

<button onclick="loadPenulis(); setActive(this)">Kelola Penulis</button>
<button onclick="loadKategori(); setActive(this)">Kelola Kategori</button>
<button onclick="loadArtikel(); setActive(this)">Kelola Artikel</button>
  </div>

</div>

<!-- CONTENT -->
  <div class="content" id="contentArea"></div>

</div>

<script>
function setActive(btn) {
// hapus active dari semua tombol
  document.querySelectorAll('.sidebar button').forEach(b => {
    b.classList.remove('active');
  });

  btn.classList.add('active');
}

// PENULIS 
function loadPenulis() {
  fetch('penulis/ambil.php')
    .then(res => res.json())
    .then(data => {

let html = `
  <div class="table-header">
    <h2>Data Penulis</h2>
    <button class="btn tambah" onclick="tampilFormTambah()">+ Tambah Penulis</button>
  </div>

  <div class="page-wrap">
    <div id="formTambah"></div>
    <div id="formEdit"></div>
  </div>

  <div class="table-card">
    <table>
      <tr>
      <th>Foto</th>
      <th>Nama</th>
      <th>Username</th>
      <th>Password</th>
      <th>Aksi</th>
      </tr>
`;

      data.forEach(d => {
        html += `
          <tr>
            <td><img src="uploads_penulis/${d.foto ? d.foto : 'default.png'}"></td>
            <td>${d.nama}</td>
            <td>${d.username}</td>
            <td>${d.password}</td>
           <td style="text-align:center;">
           <button class="btn edit" onclick="editPenulis(${d.id})">Edit</button>
           <button class="btn hapus" onclick="hapusPenulis(${d.id})">Hapus</button>
           </td>
          </tr>
        `;
      });

      html += `</table>`;

      document.getElementById('contentArea').innerHTML = html;
    });
}

function simpanPenulis() {
  let namaDepan = document.getElementById('namaDepan').value.trim();
  let namaBelakang = document.getElementById('namaBelakang').value.trim();
  let username = document.getElementById('username').value.trim();
  let password = document.getElementById('password').value.trim();

  let errorBox = document.getElementById('errorPenulis');

  if (!namaDepan || !namaBelakang || !username || !password) {
    errorBox.style.display = "block";
    errorBox.innerText = "Semua field wajib diisi!";
    return;
  }

  errorBox.style.display = "none";

  let fd = new FormData(document.getElementById('formPenulis'));

  fetch('penulis/simpan.php', {
    method: 'POST',
    body: fd
  })
  .then(res => res.json())
  .then(res => {
    if (res.status === 'sukses') {
      loadPenulis();
    } else {
      errorBox.style.display = "block";
      errorBox.innerText = res.pesan || "Gagal menyimpan";
    }
  });
}

function editPenulis(id) {
  fetch('penulis/ambil_satu.php', {
    method: 'POST',
    body: new URLSearchParams({ id: id })
  })
  .then(res => res.json())
  .then(data => {

    let form = `
    <div class="form-center">

      <div class="card-form">
        <h3>Edit Penulis</h3>

        <form id="formEditPenulis">

          <input type="hidden" name="id" value="${data.id}">

          <div class="row">
            <div class="col">
              <label>Nama Depan</label>
              <input type="text" name="nama_depan" value="${data.nama_depan}">
            </div>

            <div class="col">
              <label>Nama Belakang</label>
              <input type="text" name="nama_belakang" value="${data.nama_belakang}">
            </div>
          </div>

          <label>Username</label>
          <input type="text" name="username" value="${data.username}">

          <label>Password Baru</label>
          <input type="password" name="password">

          <label>Foto</label>
          <input type="file" name="foto">

          <div class="btn-group">
           <button type="button" class="btn simpan" onclick="updatePenulis()">Simpan Perubahan</button>
           <button type="button" class="btn batal" onclick="batalEdit()">Batal</button>
          </div>

        </form>
      </div>

    </div>
    `;

    document.getElementById('formEdit').innerHTML = form;
  });
}

function hapusPenulis(id) {
  konfirmasiHapus(function () {

    let fd = new FormData();
    fd.append('id', id);

    fetch('penulis/hapus.php', {
      method: 'POST',
      body: fd
    })
    .then(res => res.json())
    .then(res => {
      if (res.status === 'sukses') {
        loadPenulis();
      }
    });

  });
}

function updatePenulis() {
  let fd = new FormData(document.getElementById('formEditPenulis'));

  fetch('penulis/update.php', {
    method: 'POST',
    body: fd
  })
  .then(res => res.json())
  .then(res => {

    if (res.status === 'sukses') {

      Swal.fire({
        icon: 'success',
        title: 'Berhasil!',
        text: 'Data penulis berhasil diupdate',
        confirmButtonColor: '#4CAF50'
      });

      loadPenulis();

    } else {

      Swal.fire({
        icon: 'error',
        title: 'Gagal!',
        text: res.pesan || 'Terjadi kesalahan',
        confirmButtonColor: '#f44336'
      });

    }

  });
}

function batalFormPenulis() {
  document.getElementById('formTambah').innerHTML = '';
}

function tampilFormTambah() {
let form = `
  <div class="form-center">
    <div class="card-form">

      <h3>Tambah Penulis</h3>

      <div id="errorPenulis" class="error-box"></div>

      <form id="formPenulis" enctype="multipart/form-data">

        <div class="row">

          <div class="col">
            <label>Nama Depan</label>
            <input type="text" name="nama_depan" id="namaDepan" placeholder="Nama Depan">
          </div>

          <div class="col">
            <label>Nama Belakang</label>
            <input type="text" name="nama_belakang" id="namaBelakang" placeholder="Nama Belakang">
          </div>

        </div>

        <div class="form-group">
          <label>Username</label>
          <input type="text" name="username" id="username" placeholder="Username">
        </div>

        <div class="form-group">
          <label>Password</label>
          <input type="password" name="password" id="password" placeholder="Password">
        </div>

        <div class="form-group">
          <label>Foto</label>
          <input type="file" name="foto">
        </div>

        <div class="btn-group">
          <button type="button" class="btn simpan" onclick="simpanPenulis()">Simpan</button>
          <button type="button" class="btn batal" onclick="batalFormPenulis()">Batal</button>
        </div>

      </form>

    </div>
  </div>
`;

document.getElementById('formTambah').innerHTML = form;
}

function batalEdit() {
  document.getElementById('formEdit').innerHTML = '';
  document.getElementById('formTambah').innerHTML = '';
}

// KATEGORI 
function loadKategori() {
  fetch('kategori/ambil.php')
  .then(res => res.json())
  .then(data => {

let html = `
  <div class="table-header">
    <h2>Data Kategori</h2>
    <button class="btn tambah" onclick="tampilFormKategori()">+ Tambah Kategori</button>
  </div>

  <div class="page-wrap">
    <div id="formKategori"></div>
  </div>

  <div class="table-card">
    <table>
      <tr>
        <th>Nama</th>
        <th>Keterangan</th>
        <th>Aksi</th>
      </tr>
`;

data.forEach(k => {

  let nama = (k.nama || '').replace(/'/g, "\\'");
  let ket = (k.keterangan || '').replace(/'/g, "\\'");

  html += `
    <tr>
      <td><span class="badge-kategori">${k.nama}</span></td>
      <td>${k.keterangan ?? '-'}</td>
      <td>
        <button class="btn edit" onclick="editKategori(${k.id}, '${nama}', '${ket}')">Edit</button>
        <button class="btn hapus" onclick="hapusKategori(${k.id})">Hapus</button>
      </td>
    </tr>
  `;
});

html += `</table></div>`;

    document.getElementById('contentArea').innerHTML = html;
  });
}

function tambahKategori() {
  let nama = prompt("Nama kategori:");
  if (!nama) return;

  let fd = new FormData();
  fd.append('nama', nama);

  fetch('kategori/simpan.php', { method:'POST', body:fd })
    .then(res => res.json())
    .then(res => {
      if (res.status === 'sukses') {
        loadKategori();
      } else {
        alert(res.pesan || 'Gagal simpan');
      }
    })
    .catch(err => console.error(err));
}

function editKategori(id, nama, ket) {
  let form = `
    <div class="form-center">
      <div class="card-form">

        <h3>Edit Kategori</h3>

        <div id="errorKategori" class="error-box"></div>

        <div class="form-group">
          <label>Nama Kategori</label>
          <input type="text" id="editNamaKategori" value="${nama}">
        </div>

        <div class="form-group">
          <label>Keterangan</label>
          <textarea id="editKetKategori">${ket ?? ''}</textarea>
        </div>

        <div class="btn-group">
          <button type="button" class="btn simpan" onclick="updateKategori(${id})">Simpan Perubahan</button>
          <button type="button" class="btn batal" onclick="document.getElementById('formKategori').innerHTML=''">Batal</button>
        </div>

      </div>
    </div>
  `;

  document.getElementById('formKategori').innerHTML = form;
}
function simpanKategori() {
  let nama = document.getElementById('namaKategori').value.trim();
  let ket = document.getElementById('ketKategori').value.trim();
  let errorBox = document.getElementById('errorBox');

  if (!nama) {
    errorBox.style.display = "block";
    errorBox.innerText = "Nama kategori wajib diisi!";
    return;
  }

  // kalau valid, sembunyikan error
  errorBox.style.display = "none";

  let fd = new FormData();
  fd.append('nama', nama);
  fd.append('keterangan', ket);

  fetch('kategori/simpan.php', {
    method: 'POST',
    body: fd
  })
  .then(res => res.json())
  .then(res => {
    if (res.status === 'sukses') {
      loadKategori();
    }
  });
}

function updateKategori(id) {
  console.log("KEKLIK UPDATE", id);

  let nama = document.getElementById('editNamaKategori').value.trim();
  let ket = document.getElementById('editKetKategori').value.trim();
  let errorBox = document.getElementById('errorKategori');

  if (!nama) {
    errorBox.style.display = "block";
    errorBox.innerText = "Nama kategori wajib diisi!";
    return;
  }

  errorBox.style.display = "none";

  let fd = new FormData();
  fd.append('id', id);
  fd.append('nama', nama);
  fd.append('keterangan', ket);

  fetch('kategori/update.php', {
    method: 'POST',
    body: fd
  })
  .then(res => res.text())
  .then(text => {
    console.log("RESPON SERVER:", text);

    try {
      let res = JSON.parse(text);

      if (res.status === 'sukses') {
        Swal.fire({
          icon: 'success',
          title: 'Berhasil',
          text: 'Data kategori berhasil diupdate',
          timer: 1500,
          showConfirmButton: false
        });

        loadKategori();
      } else {
        errorBox.style.display = "block";
        errorBox.innerText = res.pesan || "Gagal update";
      }

    } catch (e) {
      console.error("INI ERROR ASLI DARI PHP:", text);
    }

  });
}

function hapusKategori(id) {
  konfirmasiHapus(function () {

    let fd = new FormData();
    fd.append('id', id);

    fetch('kategori/hapus.php', {
      method: 'POST',
      body: fd
    })
    .then(res => res.json())
    .then(res => {
      if (res.status === 'sukses') {
        loadKategori();
      }
    });

  });
}

function tampilFormKategori() {
let form = `
  <div class="form-center">
    <div class="card-form">

      <h3>Tambah Kategori</h3>

      <div id="errorBox" class="error-box"></div>

      <div class="form-group">
        <label>Nama Kategori</label>
        <input type="text" id="namaKategori" placeholder="Nama Kategori">
      </div>

      <div class="form-group">
        <label>Keterangan</label>
        <textarea id="ketKategori" placeholder="Keterangan"></textarea>
      </div>

      <div class="btn-group">
         <button type="button" class="btn simpan" onclick="simpanKategori()">Simpan</button>
         <button type="button" class="btn batal" onclick="document.getElementById('formKategori').innerHTML=''">Batal</button>
      </div>

    </div>
  </div>
`;

  document.getElementById('formKategori').innerHTML = form;
}

function tampilFormTambahKategori() {
  closeModal();

  document.getElementById('formTambahKategori').innerHTML = `
  
  <div style="margin-top:10px; display:flex; justify-content:center;">
    
    <div class="card-form">
      <h3>Tambah Kategori</h3>

      <form id="formKategori">
        
        <label>Nama Kategori</label>
        <input type="text" name="nama" placeholder="Nama Kategori" required>

        <label>Keterangan</label>
        <textarea name="keterangan" placeholder="Deskripsi kategori"></textarea>

        <div class="btn-group">
          <button type="button" class="btn-simpan" onclick="simpanKategori()">Simpan</button>
          <button type="button" class="btn-batal" onclick="batalFormKategori()">Batal</button>
        </div>

      </form>
    </div>

  </div>
  `;
}

function batalFormKategori() {
  document.getElementById('formTambahKategori').innerHTML = '';
}

function closeModal() {
  let modal = document.querySelector('.modal-bg');
  if (modal) modal.remove();
}

// ARTIKEL 
function loadArtikel() {
  fetch('artikel/ambil.php')
  .then(res => res.json())
  .then(data => {

    let html = `
      <div class="table-header">
        <h2>Data Artikel</h2>
        <button class="btn tambah" onclick="tampilFormArtikel()">+ Tambah Artikel</button>
      </div>

      <div class="page-wrap">
        <div id="formArtikelContainer"></div>
      </div>

      <div class="table-card">
        <table>
          <tr>
            <th>Gambar</th>
            <th>Judul</th>
            <th>Kategori</th>
            <th>Penulis</th>
            <th>Tanggal</th>
            <th>Aksi</th>
          </tr>
    `;

    data.forEach(a => {
      html += `
        <tr>
          <td><img src="uploads_artikel/${a.gambar}" width="60"></td>
          <td>${a.judul}</td>
          <td><span class="badge-kategori">${a.kategori}</span></td>
          <td>${a.penulis}</td>
          <td>${a.tanggal}</td>
        <td>
        <div class="aksi-btn">
           <button class="btn edit" onclick="editArtikel(${a.id})">Edit</button>
           <button class="btn hapus" onclick="hapusArtikel(${a.id})">Hapus</button>
        </div>
        </td>
        </tr>
      `;
    });

    html += `</table></div>`;

    document.getElementById('contentArea').innerHTML = html;
  });
}

function simpanArtikel() {
  let judul = document.getElementById('judul').value.trim();
  let isi = document.getElementById('isi').value.trim();
  let kategori = document.getElementById('kategori').value;
  let penulis = document.getElementById('penulis').value;

  let errorBox = document.getElementById('errorArtikel');

  if (!judul || !isi || !kategori || !penulis) {
    errorBox.style.display = "block";
    errorBox.innerText = "Semua field wajib diisi!";
    return;
  }

  errorBox.style.display = "none";

  let fd = new FormData(document.getElementById('formTambahArtikel'));

fetch('artikel/simpan.php', {
  method: 'POST',
  body: fd
})
.then(res => res.text())
.then(text => {
  try {
    let res = JSON.parse(text);

    if (res.status === 'sukses') {
      loadArtikel();
    } else {
      errorBox.style.display = "block";
      errorBox.innerText = res.pesan;
    }

  } catch (e) {
    console.error("INI ERROR ASLI:", text);
  }
});
}

function hapusArtikel(id) {
  konfirmasiHapus(function () {

    let fd = new FormData();
    fd.append('id', id);

    fetch('artikel/hapus.php', {
      method: 'POST',
      body: fd
    })
    .then(res => res.json())
    .then(res => {
      if (res.status === 'sukses') {
        loadArtikel();
      }
    });

  });
}
function editArtikel(id) {
  Promise.all([
    fetch('kategori/ambil.php').then(r => r.json()),
    fetch('penulis/ambil.php').then(r => r.json()),
    fetch('artikel/ambil_satu.php', {
      method: 'POST',
      body: new URLSearchParams({ id: id })
    }).then(r => r.json())
  ])
  .then(([kategori, penulis, data]) => {

//  dropdown kategori
    let optKategori = '';
    kategori.forEach(k => {
      let selected = (k.id == data.kategori_id) ? 'selected' : '';
      optKategori += `<option value="${k.id}" ${selected}>${k.nama}</option>`;
    });

// dropdown penulis
    let optPenulis = '';
    penulis.forEach(p => {
      let selected = (p.id == data.penulis_id) ? 'selected' : '';
      optPenulis += `<option value="${p.id}" ${selected}>${p.nama}</option>`;
    });

let form = `
  <div class="form-center">
    <div class="card-form">

      <h3>Edit Artikel</h3>

      <div id="errorArtikel" class="error-box"></div>

      <form id="formEditArtikel" enctype="multipart/form-data">

        <input type="hidden" name="id" value="${data.id}">

        <div class="form-group">
          <label>Judul</label>
          <input type="text" name="judul" value="${data.judul}">
        </div>

        <div class="row">

        <!-- PENULIS DI KIRI -->
          <div class="col">
            <label>Penulis</label>
            <select name="penulis_id">
              ${optPenulis}
            </select>
          </div>

        <!-- KATEGORI DI KANAN -->
          <div class="col">
            <label>Kategori</label>
            <select name="kategori_id">
              ${optKategori}
            </select>
          </div>

        </div>

        <div class="form-group">
          <label>Isi</label>
          <textarea name="isi">${data.isi}</textarea>
        </div>

        <div class="form-group">
          <label>Gambar Baru (opsional)</label>
          <input type="file" name="gambar">
        </div>

        <div class="btn-group">
          <button type="button" class="btn simpan" onclick="updateArtikel()">Simpan Perubahan</button>
          <button type="button" class="btn batal" onclick="document.getElementById('formArtikelContainer').innerHTML=''">Batal</button>
        </div>

      </form>
    </div>
  </div>
`;

    document.getElementById('formArtikelContainer').innerHTML = form;
  });
}
function updateArtikel() {
  let fd = new FormData(document.getElementById('formEditArtikel'));
  let errorBox = document.getElementById('errorArtikel');

  fetch('artikel/update.php', {
    method: 'POST',
    body: fd
  })
    .then(res => res.text()) 
    .then(text => {
      console.log("RESPON UPDATE:", text);

    try {
      let res = JSON.parse(text);

      if (res.status === 'sukses') {

        Swal.fire({
          icon: 'success',
          title: 'Berhasil',
          text: 'Artikel berhasil diupdate',
          timer: 1500,
          showConfirmButton: false
        });

        loadArtikel();

      } else {
        errorBox.style.display = "block";
        errorBox.innerText = res.pesan || "Gagal update";
      }

    } catch (e) {
      console.error("ERROR PARSE:", text);
    }
  });
}

function tampilFormArtikel() {
  Promise.all([
    fetch('kategori/ambil.php').then(res => res.json()),
    fetch('penulis/ambil.php').then(res => res.json())
  ])
  .then(([kategori, penulis]) => {

    let optKategori = `<option value="">Pilih Kategori</option>`;
  kategori.forEach(k => {
    let nama = k.nama_kategori || k.nama || 'Tidak ada nama';
    let id = k.id || k.id_kategori;

  optKategori += `<option value="${id}">${nama}</option>`;
});

    let optPenulis = `<option value="">Pilih Penulis</option>`;
  penulis.forEach(p => {
    let nama = p.nama || (p.nama_depan + ' ' + p.nama_belakang) || 'Tanpa nama';
  optPenulis += `<option value="${p.id}">${nama}</option>`;
});
    let form = `
      <div class="form-center">
        <div class="card-form">

          <h3>Tambah Artikel</h3>

          <div id="errorArtikel" class="error-box"></div>

          <form id="formTambahArtikel" enctype="multipart/form-data">

            <div class="form-group">
              <label>Judul Artikel</label>
              <input type="text" name="judul" id="judul" placeholder="Masukkan judul artikel">
            </div>

            <div class="row">
              <div class="col">
                <label>Penulis</label>
                <select name="penulis_id" id="penulis">
                  ${optPenulis}
                </select>
              </div>

              <div class="col">
                <label>Kategori</label>
                <select name="kategori_id" id="kategori">
                  ${optKategori}
                </select>
              </div>
            </div>

            <div class="form-group">
              <label>Isi Artikel</label>
              <textarea name="isi" id="isi"></textarea>
            </div>

            <div class="form-group">
              <label>Gambar</label>
              <input type="file" name="gambar">
            </div>

            <div class="btn-group">
              <button type="button" class="btn simpan" onclick="simpanArtikel()">Simpan Data</button>
              <button type="button" class="btn batal" onclick="document.getElementById('formArtikelContainer').innerHTML=''">Batal</button>
            </div>

          </form>
        </div>
      </div>
    `;

    document.getElementById('formArtikelContainer').innerHTML = form;
  });
}
function konfirmasiHapus(callback) {
  Swal.fire({
    html: `
      <div class="icon-hapus">
        <i class="fa fa-trash"></i>
      </div>
      <h2 class="title-hapus">Hapus data ini?</h2>
      <p class="text-hapus">
        Data yang dihapus tidak dapat dikembalikan.
      </p>
    `,
    showCancelButton: true,
    confirmButtonText: 'Ya, Hapus',
    cancelButtonText: 'Batal',
    reverseButtons: true,

    customClass: {
      popup: 'popup-hapus',
      confirmButton: 'btn-hapus-merah',
      cancelButton: 'btn-batal-abu'
    },

    buttonsStyling: false
  }).then((result) => {
    if (result.isConfirmed) {
      callback();
    }
  });
}
</script>

</body>
</html>