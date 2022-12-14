<style type="text/css">
    @media screen and (max-width: 600px) {

    }
</style>

<div class="dasbor-utama">
    <div class="row">
        <div class="col-md-12">
            <div class="page-title-box d-flex align-items-center justify-content-between">
                <h4 class="mb-0 font-size-18"></h4>
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="#">Beranda</a></li>
                        <li class="breadcrumb-item active">Dasbor <span class="d-md-inline d-none ml-md-1">Program Coaching</span></li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <!-- Data Instrumen Start -->
            <div class="row">
                <div class="col-md-12">
                    <div class="alert alert-primary" role="alert">
                       <h2 class="text-center text-primary">Selamat Datang di Program Coaching Merdeka Belajar</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="card mini-stats-wid">
                        <div class="card-body">
                            <div class="media">
                                <div class="media-body">
                                    <h4 class="text-muted font-weight-medium mb-1">Guru Belum Plotting</h4>
                                    <h3 class="mb-0">
                                        <?= $guru->total - $plotting->jml ?>
                                    </h3>
                                </div>

                                <div class="mini-stat-icon avatar-sm rounded-circle bg-primary align-self-center">
                                    <span class="avatar-title bg-danger">
                                        <i class="bx bx-user-x font-size-24"></i>
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
                                    <h4 class="text-muted font-weight-medium mb-1">Guru Sudah Plotting</h4>
                                    <h3 class="mb-0"><?= @$plotting->jml ?></h3>
                                </div>

                                <div class="mini-stat-icon avatar-sm rounded-circle bg-primary align-self-center">
                                    <span class="avatar-title bg-success">
                                        <i class="bx bx-user-check font-size-24"></i>
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
                                    <h4 class="text-muted font-weight-medium mb-1">Total Guru</h4>
                                    <h3 class="mb-0"><?= $guru->total ?></h3>
                                </div>

                                <div class="mini-stat-icon avatar-sm rounded-circle bg-primary align-self-center">
                                    <span class="avatar-title bg-primary">
                                        <i class="bx bx-user font-size-24"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="card mini-stats-wid">
                        <div class="card-body">
                            <div class="media">
                                <div class="media-body">
                                    <h4 class="text-muted font-weight-medium mb-1">Coach Belum Plotting</h4>
                                    <h3 class="mb-0">
                                        <?= $coach->total - $plotting_coach->jml ?>
                                    </h3>
                                </div>

                                <div class="mini-stat-icon avatar-sm rounded-circle bg-primary align-self-center">
                                    <span class="avatar-title bg-danger">
                                        <i class="bx bx-user-x font-size-24"></i>
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
                                    <h4 class="text-muted font-weight-medium mb-1">Coach Sudah Plotting</h4>
                                    <h3 class="mb-0"><?= @$plotting_coach->jml ?></h3>
                                </div>

                                <div class="mini-stat-icon avatar-sm rounded-circle bg-primary align-self-center">
                                    <span class="avatar-title bg-success">
                                        <i class="bx bx-user-check font-size-24"></i>
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
                                    <h4 class="text-muted font-weight-medium mb-1">Total Coach</h4>
                                    <h3 class="mb-0"><?= $coach->total ?></h3>
                                </div>

                                <div class="mini-stat-icon avatar-sm rounded-circle bg-primary align-self-center">
                                    <span class="avatar-title bg-primary">
                                        <i class="bx bx-user font-size-24"></i>
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
</div>