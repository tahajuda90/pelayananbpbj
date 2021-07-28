<!doctype html>
<html>
    <head>
        <title>harviacode.com - codeigniter crud generator</title>
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
        <style>
            body{
                padding: 15px;
            }
        </style>
    </head>
    <body>
        <h2 style="margin-top:0px">Visitor Read</h2>
        <table class="table">
	    <tr><td>Email</td><td><?php echo $email; ?></td></tr>
	    <tr><td>Unik</td><td><?php echo $unik; ?></td></tr>
	    <tr><td>Role</td><td><?php echo $role; ?></td></tr>
	    <tr><td>No Identitas</td><td><?php echo $no_identitas; ?></td></tr>
	    <tr><td>Nama</td><td><?php echo $nama; ?></td></tr>
	    <tr><td>Kelamin</td><td><?php echo $kelamin; ?></td></tr>
	    <tr><td>Instansi</td><td><?php echo $instansi; ?></td></tr>
	    <tr><td>Telepon</td><td><?php echo $telepon; ?></td></tr>
	    <tr><td>Keperluan</td><td><?php echo $keperluan; ?></td></tr>
	    <tr><td>Keterangan</td><td><?php echo $keterangan; ?></td></tr>
	    <tr><td>Surat Tugas</td><td><?php echo $surat_tugas; ?></td></tr>
	    <tr><td>Wajah</td><td><?php echo $wajah; ?></td></tr>
	    <tr><td>Created Date</td><td><?php echo $created_date; ?></td></tr>
	    <tr><td>Updated Date</td><td><?php echo $updated_date; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('c_visitor') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
</html>