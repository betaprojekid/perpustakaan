    <!-- Main Sidebar Container -->
    <aside class="main-sidebar elevation-4 sidebar-dark-danger">
      <!-- Brand Logo -->
      <a href="#" class="brand-link text-center">
        <span class="brand-text">Perpustakaan</span>
      </a>

      <!-- Sidebar -->
      <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="mt-3 pb-3 mb-3 d-flex justify-content-center">
          <div class="image">
            <img src="<?= base_url()?>/assets/img/user.png" class="img-circle elevation-2" alt="User Image">
          </div>
        </div>
        <div class="info text-center">
          <h4 class="text-white"><?= $_SESSION['user']['nama']?></h4>
        </div>
        <hr>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column nav-flat" data-widget="treeview" role="menu"
            data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
            <li class="nav-item">
              <a href="<?=base_url()?>/admin" class="nav-link">
                <i class="nav-icon fas fa-laptop"></i>
                <p>Home</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?=base_url()?>/admin/anggota" class="nav-link">
                <i class="nav-icon fas fa-users"></i>
                <p>Data Anggota</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?=base_url()?>/admin/buku" class="nav-link">
                <i class="nav-icon fas fa-book"></i>
                <p>Data Buku</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?=base_url()?>/admin/transaksi" class="nav-link">
                <i class="nav-icon fas fa-table"></i>
                <p>Transaksi</p>
              </a>
            </li><li class="nav-item">
              <a href="<?=base_url()?>/admin/kunjungan" class="nav-link">
                <i class="nav-icon fas fa-map-marker-alt"></i>
                <p>Kunjungan</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?=base_url()?>/admin/laporan" class="nav-link">
                <i class="nav-icon far fa-chart-bar"></i>
                <p>Laporan</p>
              </a>
            </li>

            <li class="nav-item has-treeview">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-cog"></i>
                <p>
                  Pengaturan
                  <i class="fas fa-angle-left right"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="<?=base_url()?>/admin/prodi" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Program Studi</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="<?=base_url()?>/admin/lokasi" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Lokasi/Rak</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="<?=base_url()?>/admin/kategori" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Kategori Buku</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="<?=base_url()?>/admin/pengguna" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Pengguna</p>
                  </a>
                </li>
              </ul>
            </li>

          </ul>
        </nav>
        <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
    </aside>