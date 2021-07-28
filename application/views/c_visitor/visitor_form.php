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
        <h2 style="margin-top:0px">Visitor <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="varchar">Email <?php echo form_error('email') ?></label>
            <input type="text" class="form-control" name="email" id="email" placeholder="Email" value="<?php echo $email; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Unik <?php echo form_error('unik') ?></label>
            <input type="text" class="form-control" name="unik" id="unik" placeholder="Unik" value="<?php echo $unik; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Role <?php echo form_error('role') ?></label>
            <input type="text" class="form-control" name="role" id="role" placeholder="Role" value="<?php echo $role; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">No Identitas <?php echo form_error('no_identitas') ?></label>
            <input type="text" class="form-control" name="no_identitas" id="no_identitas" placeholder="No Identitas" value="<?php echo $no_identitas; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Nama <?php echo form_error('nama') ?></label>
            <input type="text" class="form-control" name="nama" id="nama" placeholder="Nama" value="<?php echo $nama; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Kelamin <?php echo form_error('kelamin') ?></label>
            <input type="text" class="form-control" name="kelamin" id="kelamin" placeholder="Kelamin" value="<?php echo $kelamin; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Instansi <?php echo form_error('instansi') ?></label>
            <input type="text" class="form-control" name="instansi" id="instansi" placeholder="Instansi" value="<?php echo $instansi; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Telepon <?php echo form_error('telepon') ?></label>
            <input type="text" class="form-control" name="telepon" id="telepon" placeholder="Telepon" value="<?php echo $telepon; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Keperluan <?php echo form_error('keperluan') ?></label>
            <input type="text" class="form-control" name="keperluan" id="keperluan" placeholder="Keperluan" value="<?php echo $keperluan; ?>" />
        </div>
	    <div class="form-group">
            <label for="keterangan">Keterangan <?php echo form_error('keterangan') ?></label>
            <textarea class="form-control" rows="3" name="keterangan" id="keterangan" placeholder="Keterangan"><?php echo $keterangan; ?></textarea>
        </div>
	    <div class="form-group">
            <label for="varchar">Surat Tugas <?php echo form_error('surat_tugas') ?></label>
            <input type="text" class="form-control" name="surat_tugas" id="surat_tugas" placeholder="Surat Tugas" value="<?php echo $surat_tugas; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Wajah <?php echo form_error('wajah') ?></label>
            <input type="text" class="form-control" name="wajah" id="wajah" placeholder="Wajah" value="<?php echo $wajah; ?>" />
        </div>
	    <div class="form-group">
            <label for="timestamp">Created Date <?php echo form_error('created_date') ?></label>
            <input type="text" class="form-control" name="created_date" id="created_date" placeholder="Created Date" value="<?php echo $created_date; ?>" />
        </div>
	    <div class="form-group">
            <label for="timestamp">Updated Date <?php echo form_error('updated_date') ?></label>
            <input type="text" class="form-control" name="updated_date" id="updated_date" placeholder="Updated Date" value="<?php echo $updated_date; ?>" />
        </div>
	    <input type="hidden" name="id_visit" value="<?php echo $id_visit; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('c_visitor') ?>" class="btn btn-default">Cancel</a>
	</form>
    </body>
</html>