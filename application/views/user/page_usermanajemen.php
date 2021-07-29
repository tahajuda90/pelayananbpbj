<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Daftar Kategori</h3>
                </div>
                <div class="card-body">
                    <div class="row" style="margin-bottom: 10px">
                        <div class="col-md-4">
                            <?php echo anchor(site_url('Auth/create_user'), 'Create', 'class="btn btn-primary"'); ?>
                        </div>
                    </div>
                    <table class="table table-hover text-nowrap">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Email</th>
                                <th>Status</th>
                                <th>Group</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            $start=0;
                            foreach($user as $usr){
                                ?>
                            <tr>
                            <td width="80px"><?php echo ++$start ?></td>
                            <td><?php echo $usr->first_name ?> <?php echo $usr->last_name ?></td>
                            <td><?php echo $usr->email ?></td>
                            <td><?= ($usr->active == 1)? '<a class="btn btn-block btn-danger btn-xs" type="button" href="">Deactive</a>' : '<a class="btn btn-block btn-success btn-xs" type="button" href="'.base_url('auth/activate/'.$usr->id).'">Activate</a>' ?></td>
                            <td><?php echo $usr->group_name ?></td>
                            <td><a class="btn btn-block btn-primary btn-xs" type="button" href="<?= base_url('auth/edit_user/'.$usr->id)?>">edit</a></td>
                            </tr>
                            <?php
                            }?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>