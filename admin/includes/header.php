<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <!-- Menetapkan mode kompatibilitas untuk Internet Explorer -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Judul halaman web -->
    <title>Sistem Absensi dan Penggajian</title>
    <!-- Memastikan rendering yang tepat dan zoom sentuh pada perangkat seluler -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- CSS Bootstrap untuk tata letak responsif dan styling -->
    <link rel="stylesheet" href="../bower_components/bootstrap/dist/css/bootstrap.min.css">
    <!-- Font Awesome untuk ikon -->
    <link rel="stylesheet" href="../bower_components/font-awesome/css/font-awesome.min.css">
    <!-- Ionicons untuk ikon -->
    <link rel="stylesheet" href="../bower_components/Ionicons/css/ionicons.min.css">
    <!-- CSS AdminLTE untuk gaya tema -->
    <link rel="stylesheet" href="../dist/css/AdminLTE.min.css">
    <!-- CSS DataTables untuk styling tabel -->
    <link rel="stylesheet" href="../bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
    <!-- CSS Date range picker untuk memilih rentang tanggal -->
    <link rel="stylesheet" href="../bower_components/bootstrap-daterangepicker/daterangepicker.css">
    <!-- CSS Bootstrap Time Picker untuk bidang input waktu -->
    <link rel="stylesheet" href="../plugins/timepicker/bootstrap-timepicker.min.css">
    <!-- CSS Bootstrap Datepicker untuk bidang input tanggal -->
    <link rel="stylesheet" href="../bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
    <!-- CSS AdminLTE Skins untuk skema warna yang berbeda -->
    <link rel="stylesheet" href="../dist/css/skins/_all-skins.min.css">
    <!-- HTML5 Shim dan Respond.js untuk mendukung elemen HTML5 dan kueri media di IE8 -->
    <!-- PERINGATAN: Respond.js tidak berfungsi jika Anda melihat halaman melalui file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <!-- Google Font untuk font kustom -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

    <!-- Gaya CSS kustom -->
    <style type="text/css">
        /* Margin atas 20px untuk elemen dengan kelas 'mt20' */
        .mt20{
            margin-top:20px;
        }
        /* Tebal font untuk elemen dengan kelas 'bold' */
        .bold{
            font-weight:bold;
        }

        /* Gaya legend chart */
        #legend ul {
            list-style: none;
        }

        #legend ul li {
            display: inline;
            padding-left: 30px;
            position: relative;
            margin-bottom: 4px;
            border-radius: 5px;
            padding: 2px 8px 2px 28px;
            font-size: 14px;
            cursor: default;
            -webkit-transition: background-color 200ms ease-in-out;
            -moz-transition: background-color 200ms ease-in-out;
            -o-transition: background-color 200ms ease-in-out;
            transition: background-color 200ms ease-in-out;
        }

        #legend li span {
            display: block;
            position: absolute;
            left: 0;
            top: 0;
            width: 20px;
            height: 100%;
            border-radius: 5px;
        }
    </style>
</head>
