<?php include_once('header.php'); ?>
<title><?php echo $title; ?></title>
<div class="content">
    <?php echo $this->session->flashdata('message'); ?>
    <div class="uk-grid">
                              <?php if($this->session->userdata['account_type'] == 0 ): ?>          <div class="uk-width-medium-1-1 uk-text-right">
                                  <a href="<?php echo base_url('pnp/view_wanted_form') ?>" class="uk-button btn-save">ADD</a>
        </div><?php endif; ?>

    </div>
    <div class="uk-grid">
        <div class="uk-width-medium-1-1 uk-text-center uk-margin-large-bottom">
          
<?php
$attribute['method'] = 'get';
echo form_open('pnp/search_keyword', $attribute); 
    
?>
             <span> <input name="txtSearch" type="text" placeholder="Search" class="search-inpt" style="margin-right: -4px"/>
            
                 <button  name="btnSearch" class="search-btton"> Search</button></span>
             
<?php form_close();  ?>    
        
        </div>
    </div>
    <div class="uk-grid">
        <div class="uk-width-medium-1-1">
            <div class="uk-overflow-container">
             <table class="uk-table uk-table-striped uk-table-condensed">
              
                    <thead>
                    <tr>
                      
                      <th>Station</th>
                      <th>Wanted Image</th>
                      <th>First Name</th>
                      <th>Last Name</th>
                      <th>Middle Name</th>
                      <th>Alias</th> 
                      <th>Last Known Address</th>
                      <th>Criminal Activity</th>
                      <th>Area of Operation</th>
                      <th>Criminal Case Nr</th>
                      <th>Issuing Court</th>
                      <th>Action</th>
                    </tr>
                    </thead>
                    
                    
                     <tbody>
                            

             <?php       if(isset($wanted_records)) : foreach($wanted_records as $row): ?>
  
             
                      
                            
                         
                      <tr> 
                      <td><?php echo $row->station; ?></a></td>
                      <td><img style="width:100px;height:100px;"
                               src="<?= base_url('resource/wanted/images/'.$row->image_path);?>"></td>
                      <td><?php echo $row->first_name; ?></a></td>
                      <td><?php echo $row->last_name; ?></td>
                      <td><?php echo $row->middle_name; ?></td>
                      <td><?php echo $row->alias; ?></td>
                      <td><?php echo $row->last_known_address; ?></td>
                      <td><?php echo $row->criminal_activity; ?></td>
                      <td><?php echo $row->area_of_operation; ?></td>      
                      <td><?php echo $row->criminal_case_nr; ?></td>
                      <td><?php echo $row->issuing_court ?></td>
                      <td>
                          <ul>
                              
                              <?php if($this->session->userdata['account_type'] == 0 ): ?>    
                              <a href="<?php echo base_url('pnp/delete').'/'. $row->wanted_id; ?>" onclick="return confirm('Are you sure you want to DELETE this?')" class="uk-button btn-del"  >Delete</a>
                              <?php endif; ?>
                              
                              <?php if($this->session->userdata['account_type'] == 0 ): ?>
                              <a href="<?php echo base_url('pnp/update_wanted').'/'.$row->wanted_id; ?>" class="uk-button btn-save" >Edit/View</a>
                               <?php else: ?>
                              <a href="<?php echo base_url('pnp/update_wanted').'/'.$row->wanted_id; ?>" class="uk-button btn-save" >View</a>
                              <?php endif; ?>
                                  
                              
                          </ul>
                          
                      </td>
                      
                      
                      </tr>
                      
                      

                      
                                            
              <?php      endforeach; endif;   ?>
                      
                      
                      
                      
                      
 
            
                      </tbody>
                      
            </table>
            </div>
        </div>
    </div>

    </div>               
</div>
</div>

 <?php include_once('footer.php'); 
