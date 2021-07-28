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
        <h2 style="margin-top:0px">Service Read</h2>
        <table class="table">
	    <tr><td>Id Dprtm</td><td><?php echo $id_dprtm; ?></td></tr>
	    <tr><td>Id Role</td><td><?php echo $id_role; ?></td></tr>
	    <tr><td>Service</td><td><?php echo $service; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('c_service') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
</html>