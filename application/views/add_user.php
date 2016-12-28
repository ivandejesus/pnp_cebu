<?php include_once('header.php'); ?>
<title><?php echo $title; ?></title></br>

<?php echo $this->session->flashdata('message'); ?>

<?php if($this->session->userdata['account_type'] == 0 ): ?>
            <div class="content">
                  <?php   
                        $attributes = array('class' => 'uk-form uk-form-horizontal');
                        echo form_open_multipart('pnp/add_user', $attributes);
                  ?>   
                  
                    <div class="uk-form-row">
                          <label class="uk-form-label">Name:</label>
                          <div class="uk-form-controls"><input name='txt_name' type="text" class="uk-form-width" required/></div>
                    </div>

                    <div class="uk-form-row">
                          <label class="uk-form-label">Username:</label>
                          <div class="uk-form-controls"><input name="txt_username" type="text" class="uk-form-width" required/></div>
                    </div>

                     <div class="uk-form-row">
                          <label class="uk-form-label">Email:</label>
                          <div class="uk-form-controls"><input name="txt_email" type="text" class="uk-form-width" required/></div>
                    </div>

                    <div class="uk-form-row">
                          <label class="uk-form-label">Password:</label>
                          <div class="uk-form-controls"><input name="txt_password" type="password" class="uk-form-width" required/></div>
                    </div>
                      
                      <div class="uk-form-row">
                          <label class="uk-form-label">Retype Password:</label>
                          <div class="uk-form-controls"><input name="txt_retype_password" type="password" class="uk-form-width" required/></div>
                    </div>
                       
                          <div class="uk-form-controls"><input name="txt_account_type" type="hidden" value="1" readonly class="uk-form-width"/></div>
                    
     
                    <br>
                     <input name="btn_register" type="submit"  class="uk-button btn-save" value="Submit">
                  </div>
                    <?php echo form_close();  ?>
                    <?php endif; ?>
                  </div>
                </div>

                  </div>
              </div>

            </div>
 <?php include_once('footer.php');