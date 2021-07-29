<div class="card">
     <div class="card-header">
        <h2 style="margin-top:0px">Service <?php echo $button ?></h2>
     </div>
    <div class="card-body">
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="int">Departemen <?php echo form_error('id_dprtm') ?></label>
            <select name="id_dprtm" class="form-control">
                <option>Pilih Departemen</option>
                <?php
                if(isset($departemen)){
                    foreach($departemen as $dpt){
                if($dpt->id_dprtm == $id_dprtm){
                 echo '<option selected="true" value="'.$dpt->id_dprtm.'">'.$dpt->nama_dprt.'</option>'  ;   
                }else{
                 echo '<option value="'.$dpt->id_dprtm.'">'.$dpt->nama_dprt.'</option>'  ;
                }                
                    }
                }
                ?>
            </select>
            <!--<input type="text" class="form-control" name="id_dprtm" id="id_dprtm" placeholder="Id Dprtm" value="<?php echo $id_dprtm; ?>" />-->
        </div>
	    <div class="form-group">
            <label for="int">Jenis Tamu <?php echo form_error('id_role') ?></label>
            <select name="id_role" class="form-control">
                <option>Pilih Jenis Tamu</option>
                <?php
                if(isset($jenis)){
                    foreach($jenis as $jns){
                        if($jns->id_role == $id_role){
                            echo '<option selected="true" value="'.$jns->id_role.'">'.$jns->jenis_tamu.'</option>';
                        }else{
                            echo '<option value="'.$jns->id_role.'">'.$jns->jenis_tamu.'</option>';
                        }
                    }
                }
                ?>
            </select>
            <!--<input type="text" class="form-control" name="id_role" id="id_role" placeholder="Id Role" value="<?php echo $id_role; ?>" />-->
        </div>
	    <div class="form-group">
            <label for="varchar">Pelayanan <?php echo form_error('service') ?></label>
            <input type="text" class="form-control" name="service" placeholder="Service" value="<?php echo $service; ?>" />
        </div>
	    <input type="hidden" name="id_serv" value="<?php echo $id_serv; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('c_service') ?>" class="btn btn-default">Cancel</a>
	</form>
    </div>
</div>