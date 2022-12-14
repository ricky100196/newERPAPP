
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>ERP APP &mdash; Pilih Hak Akses</title>

  <!-- General CSS Files -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

  <!-- CSS Libraries -->
  <link rel="stylesheet" href="<?= base_url('assets') ?>/node_modules/bootstrap-social/bootstrap-social.css">

  <!-- Template CSS -->
  <link rel="stylesheet" href="<?= base_url('assets') ?>/css/style.css">
  <link rel="stylesheet" href="<?= base_url('assets') ?>/css/components.css">
</head>


<body>
  <div id="app">
    <div class="main-wrapper main-wrapper-2">
      <div class="navbar-bg"></div>
      
      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Role Pengguna</h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="javascript:;">Dashboard</a></div>
              <div class="breadcrumb-item">Role Pengguna</div>
            </div>
          </div>

          <div class="section-body">
            <h2 class="section-title">Hak Akses Pengguna</h2>
            <p class="section-lead">Pilih role user dibawah ini untuk mengakses menu.</p>

            <div class="row">
              <div class="col-12 col-sm-12 col-lg-10">
                <div class="card card-danger">
                  <div class="card-header">
                    <h4>Role User</h4>
                  </div>
                  <div class="card-body">
                    <div class="owl-carousel owl-theme" id="users-carousel">
                      <div class="row">
                        <?php foreach ($role as $rl) { ?>
                        <div class="col-4 col-sm-4 col-lg-4">
                          <div>
                            <div class="user-item">
                              <img alt="image" src="<?= base_url('assets/img/avatar-3.png') ?>" class="img-fluid">
                              <div class="user-details">
                                <div class="user-name"><?= $rl->group_name ?></div>
                                <div class="text-job text-muted">Akses Role User</div>
                                <div class="user-cta">
                                  <a class="btn btn-danger text-white" href="<?= base_url('login/set_role/'.encode_id($rl->group_id)) ?>">Pilih</a>
                                </div>
                              </div>  
                            </div>
                          </div>
                        </div>
                        <?php } ?>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
      </div>


      <footer class="main-footer">
        <div class="footer-left"> 
            Copyright &copy; PT. Anugerah Prima Plasindo. <?= date('Y') ?>
        </div>
        <div class="footer-right">
          
        </div>
      </footer>
    </div>
  </div>

  <!-- General JS Scripts -->
  <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
  <script src="<?= base_url('assets') ?>/js/stisla.js"></script>

  <!-- JS Libraies -->

  <!-- Template JS File -->
  <script src="<?= base_url('assets') ?>/js/scripts.js"></script>
  <script src="<?= base_url('assets') ?>/js/custom.js"></script>

  <!-- Page Specific JS File -->
</body>
</html>








