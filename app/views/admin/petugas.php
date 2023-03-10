<body class="g-sidenav-show  bg-gray-100">
  <?php require_once("../app/views/templates/admin/navaside.php");?>
    <div class="container-fluid py-4">
      <div class="row">
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
          <div class="card">
            <div class="card-body p-3">
              <div class="row">
                <div class="col-8">
                  <div class="numbers">
                    <p class="text-sm mb-0 text-capitalize font-weight-bold">Total Pengaduan</p>
                    <h5 class="font-weight-bolder mb-0">
                      <?= $data['totalPengaduan']?>
                      <!-- <span class="text-success text-sm font-weight-bolder">+55%</span> -->
                    </h5>
                  </div>
                </div>
                <div class="col-4 text-end">
                  <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                    <i class="ni ni-money-coins text-lg opacity-10" aria-hidden="true"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
          <div class="card">
            <div class="card-body p-3">
              <div class="row">
                <div class="col-8">
                  <div class="numbers">
                    <p class="text-sm mb-0 text-capitalize font-weight-bold">Pengaduan Hari Ini</p>
                    <h5 class="font-weight-bolder mb-0">
                      <?=$data['totalPengaduanToday']?>
                      <!-- <span class="text-success text-sm font-weight-bolder">+3%</span> -->
                    </h5>
                  </div>
                </div>
                <div class="col-4 text-end">
                  <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                    <i class="ni ni-world text-lg opacity-10" aria-hidden="true"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
          <div class="card">
            <div class="card-body p-3">
              <div class="row">
                <div class="col-8">
                  <div class="numbers">
                    <p class="text-sm mb-0 text-capitalize font-weight-bold">Pengaduan Selesai</p>
                    <h5 class="font-weight-bolder mb-0">
                      <?= $data['totalPengaduanDitanggapi']; ?>
                      <!-- <span class="text-danger text-sm font-weight-bolder">-2%</span> -->
                    </h5>
                  </div>
                </div>
                <div class="col-4 text-end">
                  <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                    <i class="ni ni-paper-diploma text-lg opacity-10" aria-hidden="true"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div> 
        <div class="col-xl-3 col-sm-6">
          <div class="card">
            <div class="card-body p-3">
              <div class="row">
                <div class="col-8">
                  <div class="numbers">
                    <p class="text-sm mb-0 text-capitalize font-weight-bold">Belum Ditanggapi</p>
                    <h5 class="font-weight-bolder mb-0">
                      <?= $data['totalPengaduanBelumDitanggapi'] ?>
                      <!-- <span class="text-success text-sm font-weight-bolder">+5%</span> -->
                    </h5>
                  </div>
                </div>
                <div class="col-4 text-end">
                  <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                    <i class="ni ni-cart text-lg opacity-10" aria-hidden="true"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="my-3">
        <h3>Daftar Petugas</h3>
      </div>
      <?php Flasher::flash();?>
      <div class="col-xl-2 col-sm-4 mt-3">
          <div class="card">
            <div class="card-body p-3">
              <div class="row">
                <div class="col-6">
                  <div class="numbers">
                    <p class="text-sm mb-0 text-capitalize font-weight-bold">Tambah Petugas</p>
                  </div>
                </div>
                <div class="col-6 text-end">
                  <button class="border-0 bg-transparent" data-bs-toggle="modal" data-bs-target="#tambahPetugas">
                    <div class="icon icon-shape bg-gradient-info shadow text-center border-radius-md">
                      <i class="fa fa-plus text-lg" aria-hidden="true"></i>
                    </div>
                  </button>
                </div>
              </div>
            </div>
          </div>
        </div>
      <div class="row mt-4">
        <?php if(!$data['petugas']){
            echo "<h3>Data tidak ditemukan</h3>";
        } else{?>
        <div class="col-lg-12 mb-lg-0 mb-4">

            <div class="card mb-3">
                <div class="card-body p-3">
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Username</th>
                                <th>Telp</th>
                                <th>Level</th>
                            </thead>
                            <tbody>
                                <?php $i = 1?>
                                <?php foreach($data['petugas'] as $petugas):?>
                                <tr>
                                    <td><?= $i ?></td>
                                    <td><?= $petugas['nama_petugas']?></td>
                                    <td><?= $petugas['username']?></td>
                                    <td><?= $petugas['telp']?></td>
                                    <td><?= ($petugas['level'] == 0) ? 'Admin' : 'Petugas'?></td>
                                    <td class="d-flex gap-2">
                                      <button id="buttonEditPetugas" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#editPetugas" data-id="<?= $petugas['id_petugas']?>" data-nama-petugas="<?= $petugas['nama_petugas']?>" data-username="<?= $petugas['username']?>" data-telp="<?= $petugas['telp']?>" data-level="<?= $petugas['level']?>">Edit</button>
                                      <form action="<?= BASE_URL?>/admin/hapusPetugas" method="POST">
                                        <input type="hidden" name="id_petugas" value="<?= $petugas['id_petugas']?>">
                                        <button class="btn btn-danger" type="submit" onclick="return confirm('Apakah Anda yakin?')">Delete</button>
                                      </form>
                                    </td>
                                </tr>
                                <?php $i++ ?>
                                <?php endforeach?>
                            </tbody>
                        </table>
                    </div>
              </div>
            </div>
          </div>
          <?php } ?>
        </div>
     <footer class="footer pt-3  ">
        <div class="container-fluid">
          <div class="row align-items-center justify-content-lg-between">
            <div class="col-lg-6 mb-lg-0 mb-4">
              <div class="copyright text-center text-sm text-muted text-lg-start">
                ?? <script>
                  document.write(new Date().getFullYear())
                </script>,
                made with <i class="fa fa-heart"></i> by
                <a href="https://www.creative-tim.com" class="font-weight-bold" target="_blank">Creative Tim</a>
                for a better web.
              </div>
            </div>
            <div class="col-lg-6">
              <ul class="nav nav-footer justify-content-center justify-content-lg-end">
                <li class="nav-item">
                  <a href="https://www.creative-tim.com" class="nav-link text-muted" target="_blank">Creative Tim</a>
                </li>
                <li class="nav-item">
                  <a href="https://www.creative-tim.com/presentation" class="nav-link text-muted" target="_blank">About Us</a>
                </li>
                <li class="nav-item">
                  <a href="https://www.creative-tim.com/blog" class="nav-link text-muted" target="_blank">Blog</a>
                </li>
                <li class="nav-item">
                  <a href="https://www.creative-tim.com/license" class="nav-link pe-0 text-muted" target="_blank">License</a>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </footer>
    </div>
  </main>
  <div class="fixed-plugin">
    <a class="fixed-plugin-button text-dark position-fixed px-3 py-2">
      <i class="fa fa-cog py-2"> </i>
    </a>
    <div class="card shadow-lg ">
      <div class="card-header pb-0 pt-3 ">
        <div class="float-start">
          <h5 class="mt-3 mb-0">Soft UI Configurator</h5>
          <p>See our dashboard options.</p>
        </div>
        <div class="float-end mt-4">
          <button class="btn btn-link text-dark p-0 fixed-plugin-close-button">
            <i class="fa fa-close"></i>
          </button>
        </div>
        <!-- End Toggle Button -->
      </div>
      <hr class="horizontal dark my-1">
      <div class="card-body pt-sm-3 pt-0">
        <!-- Sidebar Backgrounds -->
        <div>
          <h6 class="mb-0">Sidebar Colors</h6>
        </div>
        <a href="javascript:void(0)" class="switch-trigger background-color">
          <div class="badge-colors my-2 text-start">
            <span class="badge filter bg-gradient-primary active" data-color="primary" onclick="sidebarColor(this)"></span>
            <span class="badge filter bg-gradient-dark" data-color="dark" onclick="sidebarColor(this)"></span>
            <span class="badge filter bg-gradient-info" data-color="info" onclick="sidebarColor(this)"></span>
            <span class="badge filter bg-gradient-success" data-color="success" onclick="sidebarColor(this)"></span>
            <span class="badge filter bg-gradient-warning" data-color="warning" onclick="sidebarColor(this)"></span>
            <span class="badge filter bg-gradient-danger" data-color="danger" onclick="sidebarColor(this)"></span>
          </div>
        </a>
        <!-- Sidenav Type -->
        <div class="mt-3">
          <h6 class="mb-0">Sidenav Type</h6>
          <p class="text-sm">Choose between 2 different sidenav types.</p>
        </div>
        <div class="d-flex">
          <button class="btn bg-gradient-primary w-100 px-3 mb-2 active" data-class="bg-transparent" onclick="sidebarType(this)">Transparent</button>
          <button class="btn bg-gradient-primary w-100 px-3 mb-2 ms-2" data-c   lass="bg-white" onclick="sidebarType(this)">White</button>
        </div>
        <p class="text-sm d-xl-none d-block mt-2">You can change the sidenav type just on desktop view.</p>
        <!-- Navbar Fixed -->
        <div class="mt-3">
          <h6 class="mb-0">Navbar Fixed</h6>
        </div>
        <div class="form-check form-switch ps-0">
          <input class="form-check-input mt-1 ms-auto" type="checkbox" id="navbarFixed" onclick="navbarFixed(this)">
        </div>
        <hr class="horizontal dark my-sm-4">
        <a class="btn bg-gradient-dark w-100" href="https://www.creative-tim.com/product/soft-ui-dashboard">Free Download</a>
        <a class="btn btn-outline-dark w-100" href="https://www.creative-tim.com/learning-lab/bootstrap/license/soft-ui-dashboard">View documentation</a>
        <div class="w-100 text-center">
          <a class="github-button" href="https://github.com/creativetimofficial/soft-ui-dashboard" data-icon="octicon-star" data-size="large" data-show-count="true" aria-label="Star creativetimofficial/soft-ui-dashboard on GitHub">Star</a>
          <h6 class="mt-3">Thank you for sharing!</h6>
          <a href="https://twitter.com/intent/tweet?text=Check%20Soft%20UI%20Dashboard%20made%20by%20%40CreativeTim%20%23webdesign%20%23dashboard%20%23bootstrap5&amp;url=https%3A%2F%2Fwww.creative-tim.com%2Fproduct%2Fsoft-ui-dashboard" class="btn btn-dark mb-0 me-2" target="_blank">
            <i class="fab fa-twitter me-1" aria-hidden="true"></i> Tweet
          </a>
          <a href="https://www.facebook.com/sharer/sharer.php?u=https://www.creative-tim.com/product/soft-ui-dashboard" class="btn btn-dark mb-0 me-2" target="_blank">
            <i class="fab fa-facebook-square me-1" aria-hidden="true"></i> Share
          </a>
        </div>
      </div>
    </div>
  </div>

<!-- Tambah Petugas Modal -->
<div class="modal fade" id="tambahPetugas" tabindex="-1" aria-labelledby="tambahPetugasLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="tambahPetugasLabel">Tambah Petugas</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="<?= BASE_URL?>/admin/tambahPetugas" method="POST">
        <div class="form-group">
          <label for="nama_petugas">Nama Petugas</label>
          <input type="text" name="nama_petugas" class="form-control">
        </div>
        <div class="form-group">
          <label for="username">Username</label>
          <input type="text" name="username" class="form-control">
        </div>
        <div class="form-group">
          <label for="password">Password</label>
          <input type="password" name="password" class="form-control">
        </div>
        <div class="form-group">
          <label for="telp">Telp</label>
          <input type="number" name="telp" class="form-control">
        </div>
        <div class="form-group">
          <label for="telp">Level</label>
          <select name="level" id="level" class="form-select">
            <option value="0">Admin</option>
            <option value="1">Petugas</option>
          </select>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
      </form>
      </div>
    </div>
  </div>
</div>

<!-- Edit Petugas Modal -->
<div class="modal fade" id="editPetugas" tabindex="-1" aria-labelledby="editPetugasLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="editPetugasLabel">Edit Petugas</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="<?= BASE_URL?>/admin/editPetugas" method="POST">
        <input type="hidden" id="idPetugas" name="id_petugas">
        <div class="form-group">
          <label for="nama_petugas">Nama Petugas</label>
          <input type="text" name="nama_petugas" class="form-control" id="namaPetugas">
        </div>
        <div class="form-group">
          <label for="username">Username</label>
          <input type="text" name="username" class="form-control" id="username">
        </div>
        <div class="form-group">
          <label for="telp">Telp</label>
          <input type="number" name="telp" class="form-control" id="telp">
        </div>
        <div class="form-group">
          <label for="telp">Level</label>
          <select name="level" id="level" class="form-select" id="level">
            <option value="0">Admin</option>
            <option value="1">Petugas</option>
          </select>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
      </form>
      </div>
    </div>
  </div>
</div>