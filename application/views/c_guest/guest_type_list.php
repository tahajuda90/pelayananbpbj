<div class="card">
    <div class="card-header">
        <h3 class="card-title">Daftar Jenis Tamu</h3>
    </div>
    <div class="card-body">
        <div class="row" style="margin-bottom: 10px">
            <div class="col-md-4">
                <?php echo anchor(site_url('C_Guest/create'),'Create', 'class="btn btn-primary"'); ?>
            </div>
            <div class="col-md-4 text-center">
                <div style="margin-top: 8px" id="message">
                    <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                </div>
            </div>
            <div class="col-md-1 text-right">
            </div>
            <div class="col-md-3 text-right">
                <form action="<?php echo site_url('C_Guest/index'); ?>" class="form-inline" method="get">
                    <div class="input-group">
                        <input type="text" class="form-control" name="q" value="<?php echo $q; ?>">
                        <span class="input-group-btn">
                            <?php 
                                if ($q <> '')
                                {
                                    ?>
                                    <a href="<?php echo site_url('C_Guest'); ?>" class="btn btn-default">Reset</a>
                                    <?php
                                }
                            ?>
                          <button class="btn btn-primary" type="submit">Search</button>
                        </span>
                    </div>
                </form>
            </div>
        </div>
        <table class="table table-bordered" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>Jenis Tamu</th>
		<th>Jenis Identitas</th>
		<th>Surat Tugas</th>
		<th>Action</th>
            </tr><?php
            foreach ($c_guest_data as $c_guest)
            {
                ?>
                <tr>
			<td width="80px"><?php echo ++$start ?></td>
			<td><?php echo $c_guest->jenis_tamu ?></td>
			<td><?php echo $c_guest->identitas ?></td>
			<td><?php echo ($c_guest->srt == 1? 'Butuh':'Tidak Butuh') ?></td>
			<td style="text-align:center" width="200px">
				<?php 
				echo anchor(site_url('C_Guest/update/'.$c_guest->id_role),'Update'); 
                                if($c_guest->jumlah == 0){
                                    echo ' | '; 
                                    echo anchor(site_url('C_Guest/delete/'.$c_guest->id_role),'Delete','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
                                }                                
				?>
			</td>
		</tr>
                <?php
            }
            ?>
        </table>
        <div class="row">
            <div class="col-md-6">
                <a href="#" class="btn btn-primary">Total Record : <?php echo $total_rows ?></a>
	    </div>
            <div class="col-md-6 text-right">
                <?php echo $pagination ?>
            </div>
        </div>
    </div>
</div>
