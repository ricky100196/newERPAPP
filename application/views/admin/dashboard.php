<style type="text/css">


    @media screen and (max-width: 600px) {

    }
</style>

<div class="dasbor-utama">

    <!-- <div class="row align-items-center">
        <div class="col-12">
            <div class="page-title-box d-flex align-items-center justify-content-between">
                <div class="title pl-2">
                    <h4 class="mb-0 font-size-18">Dashboard Program Coaching Merdeka Belajar</h4>
                    <p class="mb-0">Lorem ipsum dolor sit amet consectetur adipisicing elit. Dignissimos dicta odit nam laborum velit necessitatibus.</p>
                </div>    
                <div class="page-title-right">
                </div>
            </div>
        </div>
    </div> -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-flex align-items-center justify-content-between">
                <h4 class="mb-0 font-size-18"></h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="https://ministry.phicos.co.id/sekolah_penggerak/">Beranda</a></li>
                        <li class="breadcrumb-item active">Dasbor <span class="d-md-inline d-none ml-md-1">Instrumen</span></li>
                    </ol>
                </div>

            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-xl-12">
            <!-- Data Instrumen Start -->
            <div class="row">
                <div class="col-md-12">
                    <div class="alert alert-primary" role="alert">
                       <h2 class="text-center text-primary">Selamat Datang di  Program Coaching Merdeka Belajar</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="card mini-stats-wid">
                        <div class="card-body">
                            <div class="media">
                                <div class="media-body">
                                    <p class="text-muted font-weight-medium mb-1">Belum Selesai</p>
                                    <h5 class="mb-0">8 Wilayah</h5>
                                </div>

                                <div class="mini-stat-icon avatar-sm rounded-circle bg-primary align-self-center">
                                    <span class="avatar-title bg-danger">
                                        <i class="bx bx-list-ul font-size-24"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card mini-stats-wid">
                        <div class="card-body">
                            <div class="media">
                                <div class="media-body">
                                    <p class="text-muted font-weight-medium mb-1">Sudah Selesai</p>
                                    <h5 class="mb-0">7 Wilayah</h5>
                                </div>

                                <div class="mini-stat-icon avatar-sm rounded-circle bg-primary align-self-center">
                                    <span class="avatar-title bg-success">
                                        <i class="bx bx-list-check font-size-24"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card mini-stats-wid">
                        <div class="card-body">
                            <div class="media">
                                <div class="media-body">
                                    <p class="text-muted font-weight-medium mb-1">Total Sasaran</p>
                                    <h5 class="mb-0">15 Wilayah</h5>
                                </div>

                                <div class="mini-stat-icon avatar-sm rounded-circle bg-primary align-self-center">
                                    <span class="avatar-title bg-primary">
                                        <i class="bx bx-list-ol font-size-24"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Data Instrumen End -->
        </div>
    </div>


    <!-- Gatau Apa -->
    <div class="row d-none">
        <!-- <div class="col-xl-12">
            <div class="row">
                <div class="col-md-6">
                    <div class="card mini-stats-wid">
                        <div class="card-body">
                            <div class="media">
                                <div class="media-body">
                                    <p class="text-muted font-weight-medium">Responden</p>
                                    <h4 class="mb-0"><?= rupiah($total->responden) ?></h4>
                                </div>
                                <div class="mini-stat-icon avatar-sm rounded-circle bg-primary align-self-center">
                                    <span class="avatar-title">
                                        <i class="bx bx-group font-size-24"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card mini-stats-wid">
                        <div class="card-body">
                            <div class="media">
                                <div class="media-body">
                                    <p class="text-muted font-weight-medium">Selesai Mengisi</p>
                                    <h4 class="mb-0"><?= rupiah($total->done) ?></h4>
                                </div>
                                <div class="mini-stat-icon avatar-sm rounded-circle bg-primary align-self-center">
                                    <span class="avatar-title">
                                        <i class="bx bx-check font-size-24"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> -->
        <!-- <div class="col-6">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Rata-rata persentase penggunaan dana BPUP </h4>
                    <hr>
                    <div id="chart1"></div>
                </div>
            </div>
        </div>
        <div class="col-6">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Persentase skala usaha penerima dana BPUP </h4>
                    <hr>
                    <div id="chart2"></div>
                </div>
            </div>
        </div>
        <div class="col-6">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Kepuasan ketepatan waktu penyaluran BPUP</h4>
                    <hr>
                    <div id="chart3"></div>
                </div>
            </div>
        </div>
        <div class="col-6">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Kepuasan terhadap kemudahan pencairan dana</h4>
                    <hr>
                    <div id="chart4"></div>
                </div>
            </div>
        </div>
        <div class="col-6">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Persentase dampak ekonomi sekitar usaha</h4>
                    <hr>
                    <div id="chart5"></div>
                </div>
            </div>
        </div>
        <div class="col-6">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Persentase pengaruh keberlangsungan usaha </h4>
                    <hr>
                    <div id="chart6"></div>
                </div>
            </div>
        </div> -->
    </div>

</div>