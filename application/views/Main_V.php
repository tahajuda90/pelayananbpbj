<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Buku Tamu BPBJ</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <link rel="stylesheet" href="<?= base_url()?>/assets/plugins/fontawesome-free/css/all.min.css">
        <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
        <link rel="stylesheet" href="<?= base_url()?>/assets/dist/css/adminlte.min.css">
        <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
        <link rel="stylesheet" href="<?= base_url()?>/assets/plugins/select2/css/select2.min.css">
        <link rel="stylesheet" href="<?= base_url()?>/assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
        <link rel="stylesheet" href="<?= base_url()?>/assets/plugins/toastr/toastr.min.css">
        <link rel="stylesheet" href="<?= base_url()?>/assets/plugins/datatables-bs4/css/dataTables.bootstrap4.css">
        
        <link rel="stylesheet" href="<?php echo base_url('assets/datatables/dataTables.bootstrap.css') ?>"/>
        <link rel="stylesheet" href="<?php echo base_url('assets/datatables/dataTables.bootstrap.css') ?>"/>
        
    </head>
    <body class="hold-transition sidebar-mini">
        <script src="<?= base_url()?>/assets/plugins/jquery/jquery.min.js"></script>
        <div class="wrapper">
            <?php $this->load->view('halaman/navbar')?>
            <div class="content-wrapper">
                <section class="content-header">
                    
                </section>
                <section class="content">
                    <?php $this->load->view($page)?>
                </section>
            </div>
        </div>
        
        <script src="<?= base_url()?>/assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="<?= base_url()?>/assets/dist/js/adminlte.min.js"></script>
        <script src="<?= base_url()?>/assets/dist/js/demo.js"></script>
        <script src="<?= base_url()?>/assets/plugins/select2/js/select2.full.min.js"></script>
        <script src="<?=base_url()?>assets/plugins/ckeditor/ckeditor.js"></script>
        <script src="<?=base_url()?>assets/plugins/toastr/toastr.min.js"></script>
        <script src="<?=base_url()?>assets/plugins/datatables/jquery.dataTables.js"></script>
        <script src="<?=base_url()?>assets/plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>
    </body>
</html>

