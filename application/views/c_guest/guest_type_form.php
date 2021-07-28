<div class="card">
    <div class="card-header">
<h2 style="margin-top:0px">Guest_type <?php echo $button ?></h2>
          </div>
    <div class="card-body">          
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="varchar">Jenis Tamu <?php echo form_error('jenis_tamu') ?></label>
            <input type="text" class="form-control" name="jenis_tamu" id="jenis_tamu" placeholder="Jenis Tamu" value="<?php echo $jenis_tamu; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Identitas <?php echo form_error('identitas') ?></label>
            <input type="text" class="form-control" name="identitas" id="identitas" placeholder="Jenis Identitas" value="<?php echo $identitas; ?>" />
        </div>
	    <div class="form-group">
            <label for="smallint">Surat Tugas <?php echo form_error('srt') ?></label>
            <div class="form-check">
                <input class="form-check-input" name="srt" value="1" type="checkbox">
                <label class="form-check-label">Butuh</label>
            </div>
            <!--<input type="text" class="form-control" name="srt" id="srt" placeholder="Srt" value="<?php echo $srt; ?>" />-->
        </div>
	    <input type="hidden" name="id_role" value="<?php echo $id_role; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('c_guest') ?>" class="btn btn-default">Cancel</a>
	</form>
    </div>
</div>