 <?php include_once('header.php'); ?>
        <div class="content">
             <div class="uk-grid">
                <div class="uk-width-medium-1-2 uk-container-center uk-text-center">
<?php echo $this->session->flashdata('message') ?>
                    <form class="uk-form uk-form-horizontal" action="<?= base_url('pnp/log_in') ?>" method="POST">
                    <div class="uk-form-row">
                          <label class="uk-form-label">Username:</label>
                          <div class="uk-form-controls"><input name="txt_read_username" type="text" class="uk-form-width"/></div>
                    </div>

                    <div class="uk-form-row">
                          <label class="uk-form-label">Password:</label>
                          <div class="uk-form-controls"><input name="txt_read_password" type="password" class="uk-form-width"/></div>
                    </div>
                    <br>
                    <button name="btn_log_in" value="1" class="uk-button btn-save">Login</button>
                    <!--<p>No Account? <a href="<?php echo base_url('pnp/view_user_form');?>" class="" data-uk-modal="{target:'#my-login'}"> Register Here!</p></a>-->
                       <!--<p>No Account? <a class="" data-uk-modal="{target:'#my-login'}"> Register Here!</p></a>-->
                  </form>
                </div>
             </div>   

              <!-- This is a button toggling the modal -->
              </a>

              <!-- This is the modal -->
             


        </div>
</div>
 <?php include_once('footer.php'); ?>