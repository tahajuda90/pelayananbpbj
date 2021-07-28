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
        <h2 style="margin-top:0px">Guest_type Read</h2>
        <table class="table">
	    <tr><td>Jenis Tamu</td><td><?php echo $jenis_tamu; ?></td></tr>
	    <tr><td>Identitas</td><td><?php echo $identitas; ?></td></tr>
	    <tr><td>Srt</td><td><?php echo $srt; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('c_guest') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
</html>