<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title><?= @$_title ?> | Monitoring dan Evaluasi Coaching Merdeka Belajar</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Monitoring dan Evaluasi Coaching Merdeka Belajar Tahun 2021 | Kementerian Pendidikan, Kebudayaan, Riset, dan Teknologi Republik Indonesia" />
    <meta name="keywords" content="Kemdikbudristek" />
    <meta name="author" content="Kemdikbudristek" />
    <link rel="shortcut icon" href="<?= base_url('images/custom/logo_kemdikbud.png') ?>">

    <link rel="stylesheet" href="<?= $this->theme ?>assets/libs/twitter-bootstrap-wizard/prettify.css">
    <link href="<?= $this->theme ?>assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <link href="<?= $this->theme ?>assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <link href="<?= $this->theme ?>assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" />

    <link href="<?= $this->theme ?>assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />
    <link href="<?= $this->theme ?>assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    <link href="<?= $this->theme ?>assets/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />
    <link href="<?= $this->theme ?>assets/libs/select2/css/select2.min.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="https://codeseven.github.io/toastr/toastr.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A==" crossorigin="" />
    <link href="https://ministry.phicos.co.id/sekolah_penggerak/assets-tambah/css/custom.css" rel="stylesheet" type="text/css" />

    <style type="text/css">
        .input-container input {
            border: none;
            box-sizing: border-box;
            outline: 0;
            padding: .75rem;
            position: relative;
            width: 100%;
        }

        input[type="date"]::-webkit-calendar-picker-indicator {
            background: transparent;
            bottom: 0;
            color: transparent;
            cursor: pointer;
            height: 29px;
            left: -9px;
            position: absolute;
            right: 15px;
            top: 28px;
            width: auto;
        }

        input[type="file"] {
            height: 40px;
        }

        .select2-container--default .select2-selection--single {
            background-color: #fff;
            border: 1px solid #aaa;
            border-radius: 4px;
            border: 1px solid #ced4da;
            height: 34px;
        }

        .select2-container--default .select2-selection--single .select2-selection__rendered {
            font-size: 14px !important;
            font-weight: 400;
            line-height: 34px;
            margin-left: 3px;
            color: #495057;
            font-family: -apple-system, system-ui, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol";
        }

        .select2-container--default .select2-selection--single .select2-selection__arrow {
            height: 33px;
        }

        .select2-container--default .select2-selection--single .select2-selection__placeholder {
            font-size: 14px;
        }

        #toast-container>.toast-success {
            background-color: #556ee6 !important;
            border-color: #556ee6 !important;
            box-shadow: 0 0 12px #556ee6 !important;
        }

        .form-control:disabled,
        .form-control[readonly] {
            background-color: #eee !important;
        }

        .vmiddle {
            vertical-align: middle !important;
        }

        .logo {
            color: white;
            font-weight: 600;
            font-size: 20px;
            font-family: monospace;
        }
    </style>
    <?php isset($cssExtra) ? $this->load->view($cssExtra) : ''; ?>
</head>

<body data-sidebar="dark">