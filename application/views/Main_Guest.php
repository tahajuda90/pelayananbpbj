<!DOCTYPE html>
<html>
    <head>
        <title>Bagian Pengadaan Barang/Jasa</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        
        <script src="https://code.jquery.com/jquery.js"></script>
         <script src="https://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
         <link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">
        <link href="<?=base_url()?>assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link href="<?=base_url()?>assets/vendors/form-helpers/css/bootstrap-formhelpers.min.css" rel="stylesheet">
        <link href="<?=base_url()?>assets/vendors/select/bootstrap-select.min.css" rel="stylesheet">
        <link href="<?=base_url()?>assets/css/styles.css" rel="stylesheet">
        <link href="<?=base_url()?>assets/css/forms.css" rel="stylesheet">
    </head>
    <body class="login-bg">
        <div class="header">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="logo">
                            <h1><a href="<?= base_url()?>">Buku Tamu Kantor Bagian Pengadaan Barang / Jasa</a></h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="page-content container">
            <div class="row">
                <h3><?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?></h3>
            </div>
            <div class="row">
                <div class="col-md-10 col-md-offset-1">
                    <div class="content-box-large">
                        <div class="panel-body">
                            <?php $this->load->view('halaman/'.$page); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script src="<?=base_url()?>assets/bootstrap/js/bootstrap.min.js"></script>
        <script src="<?=base_url()?>assets/js/custom.js"></script>
        <script src="<?=base_url()?>assets/js/forms.js"></script>
    </body>
</html>

