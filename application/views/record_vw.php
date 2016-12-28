<?php include_once('header.php'); ?>
<title><?php echo $title; ?></title>
              <div class="content">
<?php echo $this->session->flashdata('message'); ?>
                <div class="uk-grid">
                    <div class="uk-width-medium-1-1">
                        <h2 class="content-title">Wanted Information</h2>
 <?php if($this->session->userdata['account_type'] == 0 ): ?>   

 <?php 
    if( ! isset($wanted_id)) 
    {
        
        echo "<h3>ADD INFORMATION</h3>";
        
    } else {      
        echo "<h3>EDIT INFORMATION</h3>";
    }
    ?>  
  <?php endif; ?>                      
<?php   
    $attributes = array('class' => 'uk-form uk-form-horizontal');
    if (!isset($wanted_id)){
        echo form_open_multipart('pnp/create_wanted', $attributes);
    }else
    {
        echo form_open_multipart('pnp/wanted_update/'.$wanted_id, $attributes);
    }
?>   
                       <?php if($this->session->userdata['account_type'] == 0 ):?>
                       <div class="uk-form-row">
                       <label class="uk-form-label">Station</label> <div class="uk-form-controls">
                        <select name="txt_station">
                            <option >Select Station</option> 
                           <?php 
                           $stations = array(
                               'Cebu City',
                               'Station 1',
                               'Station 2',
                               'Station 3',
                               'Station 4',
                               'Station 5',
                               'Station 6',
                               'Station 7',
                               'Station 8',
                               'Station 9',
                               'Station 10',
                               'Station 11',
                               'Station 12'
                           );
                           
                           foreach ($stations as $station):
                               if(isset($wanted_records['station']) && ($wanted_records['station'] == $station) ):
                           
                           ?>
                           <option value="<?php echo $station; ?>" selected="selected"> <?php echo $station; ?></option>
                           <?php else: ?>
                          <option value="<?php echo $station; ?>"><?php echo $station; ?></option>
                           
                           <?php endif;  endforeach; ?>
                       </select>
                       </div><br />
                           <?php else: ?>
                        
                        <?php 
                                        if (isset ($wanted_id)) 
                                            {
                                                ?>
                        
                         <div class="uk-form-row">
                                <label class="uk-form-label">Station</label> <div class="uk-form-controls">
                                    <input name="txt_station" type="text" class="uk-form-width-large" value="<?php echo isset($wanted_records['station'])?$wanted_records['station']:'';?>" disabled required/> </div> </div>
                        
                         <?php                      
                                        }
                  
                                    
                                    ?>
                        
                       <?php endif; ?>
                                    
                       <?php if($this->session->userdata['account_type'] == 0 ):?>             
                        <div class="uk-form-row">
                                <label class="uk-form-label">First Name</label> <div class="uk-form-controls">
                                    <input name="txt_first_name" type="text" class="uk-form-width-large" value="<?php echo isset($wanted_records['first_name'])?$wanted_records['first_name']:''; ?>" required/> </div> </div>
                        <?php else: ?> 
                         <?php 
                                        if (isset ($wanted_id)) 
                                            {
                                                ?>
                        
                        <div class="uk-form-row">
                                <label class="uk-form-label">First Name</label> <div class="uk-form-controls">
                                    <input name="txt_first_name" type="text" class="uk-form-width-large" value="<?php echo isset($wanted_records['first_name'])?$wanted_records['first_name']:''; ?>" disabled="" required/> </div> </div>                      
                        <?php                                               
                                        }
  
                                    ?>
                         <?php endif; ?>           
                                    
                        
                        
                            <?php if($this->session->userdata['account_type'] == 0 ):?>             
                        <div class="uk-form-row">
                                <label class="uk-form-label">Middle Name</label> <div class="uk-form-controls">
                                    <input name="txt_middle_name" type="text" class="uk-form-width-large" value="<?php echo isset($wanted_records['middle_name'])?$wanted_records['middle_name']:''; ?>" required/> </div> </div>
                        <?php else: ?> 
                         <?php 
                                        if (isset ($wanted_id)) 
                                            {
                                                ?>
                        
                        <div class="uk-form-row">
                                <label class="uk-form-label">Middle Name</label> <div class="uk-form-controls">
                                    <input name="txt_middle_name" type="text" class="uk-form-width-large" value="<?php echo isset($wanted_records['middle_name'])?$wanted_records['middle_name']:''; ?>" disabled="" required/> </div> </div>                      
                        <?php                                               
                                        }
  
                                    ?>
                         <?php endif; ?>
                        
                        
                        
                        
                              <?php if($this->session->userdata['account_type'] == 0 ):?>             
                        <div class="uk-form-row">
                                <label class="uk-form-label">Last Name</label> <div class="uk-form-controls">
                                    <input name="txt_last_name" type="text" class="uk-form-width-large" value="<?php echo isset($wanted_records['last_name'])?$wanted_records['last_name']:''; ?>"  required/> </div> </div>
                        <?php else: ?> 
                         <?php 
                                        if (isset ($wanted_id)) 
                                            {
                                                ?>
                        
                        <div class="uk-form-row">
                                <label class="uk-form-label">Last Name</label> <div class="uk-form-controls">
                                    <input name="txt_last_name" type="text" class="uk-form-width-large" value="<?php echo isset($wanted_records['last_name'])?$wanted_records['last_name']:''; ?>" disabled="" required/> </div> </div>                      
                        <?php                                               
                                        }
  
                                    ?>
                         <?php endif; ?>
                        
                        
                                    
                            
                              <?php if($this->session->userdata['account_type'] == 0 ):?>             
                        <div class="uk-form-row">
                                <label class="uk-form-label">Alias</label> <div class="uk-form-controls">
                                    <input name="txt_alias" type="text" class="uk-form-width-large" value="<?php echo isset($wanted_records['alias'])?$wanted_records['alias']:''; ?>"  required/> </div> </div>
                        <?php else: ?> 
                         <?php 
                                        if (isset ($wanted_id)) 
                                            {
                                                ?>
                        
                        <div class="uk-form-row">
                                <label class="uk-form-label">Alias</label> <div class="uk-form-controls">
                                    <input name="txt_alias" type="text" class="uk-form-width-large" value="<?php echo isset($wanted_records['alias'])?$wanted_records['alias']:''; ?>" disabled="" required/> </div> </div>                      
                        <?php                                               
                                        }
  
                                    ?>
                         <?php endif; ?>
                                    
                                    
                                    
                              
                              <?php if($this->session->userdata['account_type'] == 0 ):?>             
                        <div class="uk-form-row">
                                <label class="uk-form-label">Last Known Address</label> <div class="uk-form-controls">
                                    <input name="txt_last_known_address" type="text" class="uk-form-width-large" value="<?php echo isset($wanted_records['last_known_address'])?$wanted_records['last_known_address']:''; ?>"  required/> </div> </div>
                        <?php else: ?> 
                         <?php 
                                        if (isset ($wanted_id)) 
                                            {
                                                ?>
                        
                        <div class="uk-form-row">
                                <label class="uk-form-label">Last Known Address</label> <div class="uk-form-controls">
                                    <input name="txt_last_known_address" type="text" class="uk-form-width-large" value="<?php echo isset($wanted_records['last_known_address'])?$wanted_records['last_known_address']:''; ?>" disabled="" required/> </div> </div>                      
                        <?php                                               
                                        }
  
                                    ?>
                         <?php endif; ?>  
                                    
                                    
                                    
                            <?php if($this->session->userdata['account_type'] == 0 ):?>             
                        <div class="uk-form-row">
                                <label class="uk-form-label">Criminal Activity</label> <div class="uk-form-controls">
                                    <input name="txt_criminal_activity" type="text" class="uk-form-width-large" value="<?php echo isset($wanted_records['criminal_activity'])?$wanted_records['criminal_activity']:''; ?>"  required/> </div> </div>
                        <?php else: ?> 
                         <?php 
                                        if (isset ($wanted_id)) 
                                            {
                                                ?>
                        
                        <div class="uk-form-row">
                                <label class="uk-form-label">Criminal Activity</label> <div class="uk-form-controls">
                                    <input name="txt_criminal_activity" type="text" class="uk-form-width-large" value="<?php echo isset($wanted_records['criminal_activity'])?$wanted_records['criminal_activity']:''; ?>" disabled="" required/> </div> </div>                      
                        <?php                                               
                                        }
  
                                    ?>
                         <?php endif; ?>  
                                    
                                    
                                    
                             <?php if($this->session->userdata['account_type'] == 0 ):?>             
                        <div class="uk-form-row">
                                <label class="uk-form-label">Crime Involvement</label> <div class="uk-form-controls">
                                    <!--<input name="txt_crime_involvement" type="text" class="uk-form-width-large" value=""  required/> </div> </div>-->
                                    <textarea name="txt_crime_involvement" rows="4" cols="40" class="uk-form-width-large"><?php echo isset($wanted_records['crime_involvement'])?$wanted_records['crime_involvement']:''; ?></textarea></div><br />
                                        
                         <?php else: ?> 
                         <?php 
                                        if (isset ($wanted_id)) 
                                            {
                                                ?>
                        
                        <div class="uk-form-row">
                                <label class="uk-form-label">Crime Involvement</label> <div class="uk-form-controls">
                                    <textarea name="txt_crime_involvement" rows="4" cols="40" class="uk-form-width-large" disabled><?php echo isset($wanted_records['crime_involvement'])?$wanted_records['crime_involvement']:''; ?></textarea></div><br />                      
                        <?php                                               
                                        }
  
                                    ?>
                         <?php endif; ?>  
                                    
                                    
                                    
                             <?php if($this->session->userdata['account_type'] == 0 ):?>             
                        <div class="uk-form-row">
                                <label class="uk-form-label">Area of Operation</label> <div class="uk-form-controls">
                                    <input name="txt_area_of_operation" type="text" class="uk-form-width-large" value="<?php echo isset($wanted_records['area_of_operation'])?$wanted_records['area_of_operation']:''; ?>"  required/> </div> </div>
                        <?php else: ?> 
                         <?php 
                                        if (isset ($wanted_id)) 
                                            {
                                                ?>
                        
                        <div class="uk-form-row">
                                <label class="uk-form-label">Area of Operation</label> <div class="uk-form-controls">
                                    <input name="txt_area_of_operation" type="text" class="uk-form-width-large" value="<?php echo isset($wanted_records['area_of_operation'])?$wanted_records['area_of_operation']:''; ?>" disabled="" required/> </div> </div>                      
                        <?php                                               
                                        }
  
                                    ?>
                         <?php endif; ?>  
                                    
                                    
                                    
                                    
                           <?php if($this->session->userdata['account_type'] == 0 ):?>             
                        <div class="uk-form-row">
                                <label class="uk-form-label">Criminal Case NR</label> <div class="uk-form-controls">
                                    <input name="txt_criminal_case_nr" type="text" class="uk-form-width-large" value="<?php echo isset($wanted_records['criminal_case_nr'])?$wanted_records['criminal_case_nr']:''; ?>"  required/> </div> </div>
                        <?php else: ?> 
                         <?php 
                                        if (isset ($wanted_id)) 
                                            {
                                                ?>
                        
                        <div class="uk-form-row">
                                <label class="uk-form-label">Criminal Case NR</label> <div class="uk-form-controls">
                                    <input name="txt_criminal_case_nr" type="text" class="uk-form-width-large" value="<?php echo isset($wanted_records['criminal_case_nr'])?$wanted_records['criminal_case_nr']:''; ?>" disabled="" required/> </div> </div>                      
                        <?php                                               
                                        }
  
                                    ?>
                         <?php endif; ?>  
                                    
                                    
                                    
                                    
                           <?php if($this->session->userdata['account_type'] == 0 ):?>             
                        <div class="uk-form-row">
                                <label class="uk-form-label">Issuing Court</label> <div class="uk-form-controls">
                                    <input name="txt_issuing_court" type="text" class="uk-form-width-large" value="<?php echo isset($wanted_records['issuing_court'])?$wanted_records['issuing_court']:''; ?>"  required/> </div> </div>
                        <?php else: ?> 
                         <?php 
                                        if (isset ($wanted_id)) 
                                            {
                                                ?>
                        
                        <div class="uk-form-row">
                                <label class="uk-form-label">Issuing Court</label> <div class="uk-form-controls">
                                    <input name="txt_issuing_court" type="text" class="uk-form-width-large" value="<?php echo isset($wanted_records['issuing_court'])?$wanted_records['issuing_court']:''; ?>" disabled="" required/> </div> </div>                      
                        <?php                                               
                                        }
  
                                    ?>
                         <?php endif; ?>   
                                    
                                    
                                    
                                    
                            <?php if($this->session->userdata['account_type'] == 0 ):?>             
                        <div class="uk-form-row">
                                <label class="uk-form-label">Remarks</label> <div class="uk-form-controls">
                                    <textarea name="txt_remarks" rows="4" cols="40" class="uk-form-width-large"><?php echo isset($wanted_records['remarks'])?$wanted_records['remarks']:''; ?></textarea></div><br />
                        <?php else: ?> 
                         <?php 
                                        if (isset ($wanted_id)) 
                                            {
                                                ?>
                        
                        <div class="uk-form-row">
                                <label class="uk-form-label">Remarks</label> <div class="uk-form-controls">
                                    <textarea name="txt_remarks" rows="4" cols="40" class="uk-form-width-large" disabled><?php echo isset($wanted_records['remarks'])?$wanted_records['remarks']:''; ?></textarea></div><br />
                        <?php                                               
                                        }
  
                                    ?>
                         <?php endif; ?>  
                        
                        
                                  
                            <?php if($this->session->userdata['account_type'] == 0 ):?>             
                        <div class="uk-form-row">
                                <label class="uk-form-label">Date Created</label> <div class="uk-form-controls">
                                    <input name="txt_date_created" type="date" class="uk-form-width-large" value="<?php echo isset($wanted_records['date_created'])?$wanted_records['date_created']:''; ?>"  required/> </div> </div>
                        <?php else: ?> 
                         <?php 
                                        if (isset ($wanted_id)) 
                                            {
                                                ?>
                        
                        <div class="uk-form-row">
                                <label class="uk-form-label">Date Created</label> <div class="uk-form-controls">
                                    <input name="txt_date_created" type="date" class="uk-form-width-large" value="<?php echo isset($wanted_records['date_created'])?$wanted_records['date_created']:''; ?>" disabled="" required/> </div> </div>                      
                        <?php                                               
                                        }
  
                                    ?>
                         <?php endif; ?>  
                                    
                         <?php 
                                        if (isset ($wanted_id)) 
                                        { 
                                                ?>

                                    <div class="uk-form-row">
                                                <img class="update-img" style="width:200px;height:200px;" src="<?= base_url('resource/wanted/images/'.$wanted_records['image_path']);?>"/>
                                    </div>
<?php
                                                
                                        }
                  
                                    
                                    ?>      
                                    
                                    
                                    
                                    
                            <?php if($this->session->userdata['account_type'] == 0 ): ?> 
                            <?php if( ! isset($wanted_id)): ?>
                            <div class="uk-form-row">
                                <label class="uk-form-label">Upload Photo:</label>
                                <div class="uk-form-controls">
                                    <div class="uk-form-file">
                                        <input type="file" name="file_wanted" value="<?php echo isset($wanted_records['image_path'])?$wanted_records['image_path']:''; ?>">
                                    </div>
                                </div>
                            </div><br>
                            <?php else: ?>
                       
                                
                                <?php endif; ?>
                                
                                <?php endif; ?>
                         
                         
                            <br>  
<?php 
    if( ! isset($wanted_id))
    { // kung walang laman yung $id, papasok dito // or kung nasa creation process palang
?>
                            <input name="submit_create_wanted" type="submit"  class="uk-button btn-save" value="Submit">
<?php    
    }
    else
    { // papasok dito kapag galing sa edit, see update_most_wanted_function sa ctrlr/pnp.php
?>        
                            <?php if($this->session->userdata['account_type'] == 0 ): ?>    
                            <input name="submit_update_wanted" type="submit" class="uk-button btn-save" value="Update">
                            <?php endif; ?>
<?php        
    }

    form_close();
?>
                        </div>  
                    </div>
                </div>
            </div>
         </div>
                    </div>
                </div>
     

 <?php include_once('footer.php'); ?>