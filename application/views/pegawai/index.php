<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Customer</h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
              <div class="breadcrumb-item">Pegawai</div>
            </div>
        </div>

        <div class="section-body">
            <h2 class="section-title"><?= $_title ?></h2>
            <p class="section-lead">Daftar seluruh Pegawai.</p>

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <!-- <div class="col-md-6">
                                    <h4 class="h3 font-weight-bold"><?= $_title ?></h4>
                                </div> -->
                                <div class="pull-right col-md-12">
                                    <a class="btn btn-rounded btn-sm btn-primary float-right" href="<?= base_url('pegawai/add') ?>"><i class="fa fa-plus mr-1"></i> Tambah Data</a>
                                </div>
                            </div>
                            <br>
                            <hr>
                            <div class="table-responsive">
                                <table id="table-data" class="table table-bordered nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                    <thead>
                                        <tr>
                                            <th class="text-center" style="vertical-align: middle !important;width: 5%">No</th>
                                            <th>Nama</th>
                                            <th>No Absen</th>
                                            <th>NIK</th>
                                            <th>Jenis Kelamin</th>
                                            <th>NPWP</th>
                                            <th>No HP</th>
                                            <th class="text-center">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>