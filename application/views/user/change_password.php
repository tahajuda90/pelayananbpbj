<div class="container-fluid">
    <div class="card card-primary">
        <div class="card-header">
        <h3><?php echo lang('change_password_heading');?></h3>
        </div>
         <?php echo form_open("auth/change_password");?>
    <div class="card-body">
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <?php echo lang('change_password_old_password_label', 'old_password');?> <br />
                    <?php echo form_input($old_password);?>
                </div>
                <div class="form-group">
                    <label for="new_password"><?php echo sprintf(lang('change_password_new_password_label'), $min_password_length);?></label> <br />
                    <?php echo form_input($new_password);?>
                </div>
                <div class="form-group">
                    <?php echo lang('change_password_new_password_confirm_label', 'new_password_confirm');?> <br />
                    <?php echo form_input($new_password_confirm);?>
                </div>
                <?php echo form_input($user_id);?>
                <?php echo form_submit('submit', lang('change_password_submit_btn'));?>
            </div>
        </div>
    </div>
    <?php echo form_close();?>
    </div>
   
</div>


<div id="infoMessage"><?php echo $message;?></div>
