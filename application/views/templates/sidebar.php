<div class="main-sidebar">
        <aside id="sidebar-wrapper">
          <div style="background-color:#6777ef;" class="sidebar-brand " >
          <img alt="image" src="<?= base_url('assets') ?>/img/logoapp.png" class="rounded-circle mr-1" style="width: 65px; padding: left 10px;">
          </div>
          <div class="sidebar-brand sidebar-brand-sm " >
          <img alt="image" src="<?= base_url('assets') ?>/img/logoapp.png" class="rounded-circle mr-1" style="width: 50px ;">
          </div>
          <ul class="sidebar-menu">
              <li class="menu-header">Dashboard</li>
              <li><a class="nav-link" href="<?= base_url('dashboard') ?>"><i class="fas fa-desktop"></i> <span>Dashboard</span></a></li>
              <!-- <li class="nav-item dropdown active">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-fire"></i><span>Dashboard</span></a>
                <ul class="dropdown-menu">
                  <li class="active"><a class="nav-link" href="index-0.html">General Dashboard</a></li>
                  <li><a class="nav-link" href="index.html">Ecommerce Dashboard</a></li>
                </ul>
              </li> -->
              <li class="menu-header">PURCHASE ORDER</li>
              <li><a class="nav-link" href="<?= base_url('supplyer') ?>"><i class="fas fa-industry"></i> <span>Data Supplier</span></a></li>
              <li><a class="nav-link" href="<?= base_url('supplier_po') ?>"><i class="fas fa-desktop"></i> <span>Form PO</span></a></li>
              <li><a class="nav-link" href="<?= base_url('laporan/master_po') ?>"><i class="fas fa-desktop"></i> <span>Laporan Master PO</span></a></li>

              <li class="menu-header">Marketing</li>
              <li><a class="nav-link" href="<?= base_url('customer') ?>"><i class="fas fa-address-book"></i> <span>Data Customer</span></a></li>
              <li><a class="nav-link" href="<?= base_url('product') ?>"><i class="fas fa-clipboard"></i> <span>Data Produk</span></a></li>
              <li class="nav-item dropdown">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i> <span>Formulir</span></a>
                <ul class="dropdown-menu">
                  <li><a class="nav-link" href="<?= base_url('FRP') ?>">Rencana Produksi</a></li>
                  <li><a class="nav-link" href="layout-default.html">Tarikan Produk Baru</a></li>
                </ul>
              </li>
              <li class="menu-header">Accounting</li>
              <li><a class="nav-link" href="<?= base_url('customer') ?>"><i class="fas fa-address-book"></i> <span>Pembayaran</span></a></li>
              </li>
              <!-- <li class="menu-header">Direksi</li>
              <li><a class="nav-link" href="<?= base_url('product') ?>"><i class="fas fa-pencil-ruler"></i> <span>Data Produk</span></a></li>
              <li class="nav-item dropdown">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i> <span>Laporan</span></a>
                <ul class="dropdown-menu">
                  <li><a class="nav-link" href="layout-default.html">Laporan Bulanan</a></li>
                </ul>
              </li> -->
              <li class="menu-header">Produksi</li>
              <li><a class="nav-link" href="<?= base_url('materialUse') ?>"><i class="fas fa-columns"></i> <span>Penggunaan Material</span></a></li>
              <li><a class="nav-link" href="<?= base_url('#') ?>"><i class="fas fa-columns"></i> <span>Surat jalan</span></a></li>
              <!-- <li class="nav-item dropdown">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i> <span>Layout</span></a>
                <ul class="dropdown-menu">
                  <li><a class="nav-link" href="layout-default.html">Default Layout</a></li>
                  <li><a class="nav-link" href="layout-transparent.html">Transparent Sidebar</a></li>
                  <li><a class="nav-link" href="layout-top-navigation.html">Top Navigation</a></li>
                </ul>
              </li> -->
              <li class="menu-header">Warehouse</li>
              <!-- <li class="nav-item dropdown">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i> <span>Layout</span></a>
                <ul class="dropdown-menu">
                  <li><a class="nav-link" href="layout-default.html">Default Layout</a></li>
                  <li><a class="nav-link" href="layout-transparent.html">Transparent Sidebar</a></li>
                  <li><a class="nav-link" href="layout-top-navigation.html">Top Navigation</a></li>
                </ul>
              </li> -->
              <li><a class="nav-link" href="<?= base_url('packaging') ?>"><i class="fas fa-pencil-ruler"></i> <span>Data Packaging</span></a></li>
              <li><a class="nav-link" href="<?= base_url('material') ?>"><i class="fas fa-pencil-ruler"></i> <span>Stok Material</span></a></li>
              <li class="menu-header">HRD</li>
                <li><a class="nav-link" href="<?= base_url('pegawai') ?>"><i class="fas fa-id-badge"></i> <span>Data Pegawai</span></a></li>
              <li class="menu-header">Referensi</li>
              <li><a class="nav-link" href="<?= base_url('referensi/jenis_material') ?>"><i class="fas fa-pencil-ruler"></i> <span>Jenis Material</span></a></li>
             
            </ul>

            <div class="mt-4 mb-4 p-3 hide-sidebar-mini">
              <a href="https://getstisla.com/docs" class="btn btn-primary btn-lg btn-block btn-icon-split">
                <i class="fas fa-rocket"></i> Panduan Penggunaan Aplikasi
              </a>
            </div>
        </aside>
      </div>