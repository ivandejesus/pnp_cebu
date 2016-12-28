<?php include_once('header.php'); ?>
<title><?php echo $title; ?></title>
             <div class="content"> 
                 <?php echo $this->session->flashdata('message'); ?>
                <table class="uk-table uk-table-striped">
                    <thead>
                    <tr>
                      <th>Name</th>
                      <th>Username</th>
                      <th>Email</th>
                      <th>Account Type</th>
                      <th>Action</th>
                    </tr>
                    </thead>
                     <tbody>
                       
                  <?php       if(isset($user_records)) : foreach($user_records as $row): ?>

                      <tr>
                      <td><?php echo $row->name; ?></td>
                      <td><?php echo $row->username; ?></td>
                      <td><?php echo $row->emailaddress; ?></td>
                      <td><?php echo $row->account_type; ?></td>
                      <td><ul><a href="<?php echo base_url('pnp/delete_user').'/'.$row->user_id; ?>" onclick="return confirm('Are you sure you want to DELETE this?')" class="uk-button btn-del" >Delete</a></ul><td>
                      </tr>

                       
                        
                          <?php      endforeach; endif;   ?>
                      
                     </tbody>
                      
                </table>
                 
                 <?php form_close(); ?>
        </div>

        </div>

 <?php include_once('footer.php');