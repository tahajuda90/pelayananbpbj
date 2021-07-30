<div class="container-fluid">
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title"><?=$title?></h3>
        </div>
        
        <?php echo form_open(uri_string());?>
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <?php
      if($identity_column!=='email') {
          echo '<div class="form-group">';
          echo '<label>'.lang('create_user_identity_label', 'identity').'</label>';
          echo form_error('identity');
          echo form_input($identity);
          echo '</div>';
      }
      ?>            
                    <div class="form-group">
                        <label><?php echo lang('create_user_email_label', 'email');?> </label>
                        <?php echo form_input($email);?>
                    </div>
                    <div class="form-group">
                        <label><?php echo lang('edit_user_fname_label', 'first_name');?></label>
                        <?php echo form_input($first_name);?>
                    </div>
                    <div class="form-group">
                        <label><?php echo lang('edit_user_lname_label', 'last_name');?></label>
                        <?php echo form_input($last_name);?>
                    </div>                    
                    <div class="form-group">
                        <label><?php echo lang('edit_user_phone_label', 'phone');?> </label>
                        <?php echo form_input($phone);?>
                    </div>
                </div>
                <div class="col-md-6">
                    
                    
                    <div class="form-group">
                        <label><?php echo lang('edit_user_company_label', 'company');?></label>
                        <?php echo form_input($company);?>
                    </div>
                    
                        <?php if ($this->ion_auth->is_admin() && isset($groups)): ?>
                    <div class="form-group">
          <?php foreach ($groups as $group):?>
                        <div class="form-check">
              <?php
                  $gID=$group['id'];
                  $checked = null;
                  $item = null;
                  if(isset($currentGroups)){
                  foreach($currentGroups as $grp) {
                      if ($gID == $grp->id) {
                          $checked= ' checked="checked"';
                      break;
                      }
                  }}
              ?>
              <input type="checkbox" class="form-check-input" name="groups[]" value="<?php echo $group['id'];?>"<?php echo $checked;?>>
              <label class="form-check-label" for="exampleCheck1">
                  <?php echo htmlspecialchars($group['name'],ENT_QUOTES,'UTF-8');?>
              </label>
                        </div>
          <?php endforeach?>
                    </div>
      <?php endif ?>
                    <div class="form-group">
                        <label><?php echo lang('edit_user_password_label', 'password');?> </label>
                        <?php echo form_input($password);?>
                    </div>
                    <div class="form-group">
                        <label><?php echo lang('edit_user_password_confirm_label', 'password_confirm');?></label>
                        <?php echo form_input($password_confirm);?>
                    </div>
                    <?php if(isset($user)){echo form_hidden('id', $user->id);}?>
                    <?php if(isset($csrf)){echo form_hidden($csrf);} ?>

                    <?php echo form_submit('submit', 'simpan','class="btn btn-primary"');?>
                </div>
            </div>
        </div>
        
        <?php echo form_close();?>
    </div>
</div>


<div id="infoMessage"><?php echo $message;?></div>

