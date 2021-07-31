<div class="container-fluid">
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title"><?= ucfirst($user->last_name).' '. ucfirst($user->last_name) ?></h3>
        </div>
        <div class="card-body">
            <form action="<?=$action?>" method="post">
                <input type="hidden" name="userid" value="<?=$user->id?>">
                <div class="form-group">
                    <?php foreach ($departemen as $dep):?>
                    <div class="form-check">
                        <?php if(in_array($dep->id_dprtm, $currgr)){
                            echo '<input type="checkbox" checked="true" class="form-check-input" name="department[]" value="'. $dep->id_dprtm.'">';
                        }else{
                            echo '<input type="checkbox" class="form-check-input" name="department[]" value="'.$dep->id_dprtm.'">';
                        } ?>
                            
                    <label class="form-check-label" for="exampleCheck1"><?= $dep->nama_dprt?></label>
                    </div>
                    <?php endforeach?>
                </div>
                <button type="submit" class="btn btn-primary">Update</button> 
            </form>
        </div>
    </div>
</div>