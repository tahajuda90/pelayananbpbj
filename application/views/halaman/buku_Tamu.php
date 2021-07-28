                            <form class="form-horizontal" action="<?php echo $action; ?>" method="post">
                                <fieldset>
                                    <legend>Masukan Data Diri dan Keperluan</legend>
                                    <div class="form-group">
                                        <label class="col-md-2 control-label" >Email <?php echo form_error('email') ?></label>
                                        <div class="col-md-7">
                                            <input type="text" class="form-control" name="email" id="email" value="<?php echo $email; ?>" />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-2 control-label" ><?php echo $unik;?> <?php echo form_error('no_identitas') ?></label>
                                        <div class="col-md-7">
                                            <input type="text" class="form-control" name="no_identitas" value="<?php echo $no_identitas; ?>" />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-2 control-label" for="text-field">Nama <?php echo form_error('nama') ?></label>
                                        <div class="col-md-8">
                                            <input type="text" class="form-control" name="nama" value="<?php echo $nama; ?>" />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-2 control-label">Jenis Kelamin <?php echo form_error('kelamin') ?></label>
                                        <div class="col-md-10">
                                            <label class="radio radio-inline">Laki-Laki 
                                                <input class="form-check-input" name="kelamin" type="radio" value="L">
                                            </label>
                                            <label class="radio radio-inline">Perempuan 
                                                <input class="form-check-input" name="kelamin" type="radio" value="P">
                                            </label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-2 control-label" >No Telepon <?php echo form_error('telepon') ?></label>
                                        <div class="col-md-4">
                                            <input type="text" class="form-control" name="telepon" value="<?php echo $telepon; ?>" />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-2 control-label" for="text-field">Asal Instansi <?php echo form_error('instansi') ?></label>
                                        <div class="col-md-4">
                                            <input type="text" class="form-control" name="instansi" value="<?php echo $instansi; ?>" />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-2 control-label" for="select-1">Keperluan <?php echo form_error('keperluan') ?></label>
                                        <div class="col-md-4">
                                            <select class="form-control" name="keperluan" id="select-1">
                                                <option>Pilih Pelayanan</option>
                                                <?php
                                                if(isset($srv)){
                                                    foreach ($srv as $serv){ ?>
                                                        
                                                <option value='{"id_serv":"<?=$serv->id_serv?>","id_dprtm":"<?=$serv->id_dprtm?>"}'><?=$serv->service?></option>
                                                <?php    }
                                                }
                                                ?>
                                            </select> 

                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-2 control-label">Keterangan <?php echo form_error('keterangan') ?></label>
                                        <div class="col-md-10">
                                            <textarea class="form-control" name="keterangan" rows="4"><?php echo $keterangan; ?></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-2 control-label">Scurity Code</label>
                                        <div class="col-md-4">
                                            <?php echo $img; ?>
                                            <input type="text" name="security_code" class="form-control">
                                        </div>
                                    </div>
                                    <input type="hidden" name="id_visit" value="<?php echo $id_visit; ?>" /> 
                                    <input type="hidden" name="role" value="<?php echo $role; ?>" />
                                    <input type="hidden" name="unik" value="<?php echo $unik; ?>" />
                                    <div class="form-group">
                                        <div class="col-sm-offset-2 col-sm-10">
                                            <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i>
											Submit</button>
                                        </div>
                                    </div>
                                </fieldset>
                            </form>

