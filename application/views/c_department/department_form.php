<div class="card">
    <div class="card-header">
        <h2 style="margin-top:0px"> <?php echo $button ?> Department </h2>
    </div>
    <div class="card-body">
        <form action="<?php echo $action; ?>" method="post">
	<div class="form-group">
            <label for="varchar">Nama Departemen <?php echo form_error('nama_dprt') ?></label>
            <input type="text" class="form-control" name="nama_dprt" id="nama_dprt" value="<?php echo $nama_dprt; ?>" />
        </div>
        <div class="form-group">
            <label for="varchar">Link Survei</label>
            <input type="text" class="form-control" name="link" value="<?php echo $link; ?>" />
        </div>
	    <input type="hidden" name="id_dprtm" value="<?php echo $id_dprtm; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('c_department') ?>" class="btn btn-default">Cancel</a>
	</form>
    </div>
</div>
