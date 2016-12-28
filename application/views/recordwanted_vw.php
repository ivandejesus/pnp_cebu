<?php include_once('header.php'); ?>
<title><?php echo $title; ?></title>
              <div class="content">
                  <?php echo $this->session->flashdata('message'); ?>
                <div class="uk-grid">
                    <div class="uk-width-medium-1-1">
                        <h2 class="content-title">Most Wanted Information</h2>
                        

    <?php if($this->session->userdata['account_type'] == 0 ): ?>                                         
    <?php 
    if( ! isset($most_wanted_id)) 
    {
        
        echo "<h3>ADD INFORMATION</h3>";
        
    } else {
        echo "<h3>EDIT INFORMATION</h3>";
    }
    ?>     
    <?php endif; ?>    
    <?php   
    $attributes = array('class' => 'uk-form uk-form-horizontal');
    if (!isset($most_wanted_id)){
        echo form_open_multipart('pnp/create_most_wanted', $attributes);
    }else
    {
        echo form_open_multipart('pnp/most_wanted_update/'.$most_wanted_id, $attributes);
    }
    ?>   
                        
                        <?php if($this->session->userdata['account_type'] == 0 ):?>
                        <div class="uk-form-row">      
                                <label class="uk-form-label">First Name</label>
                                <div class="uk-form-controls"><input name ="wanted_first_name" type="text" class="uk-form-width-large" value="<?php echo isset($most_wanted_records['first_name'])?$most_wanted_records['first_name']:''; ?>" required/></div></div>                                
                           <?php else: ?>
                        
                        <?php 
                                        if (isset ($most_wanted_id)) 
                                            {
                                                ?> 
                        
                         <div class="uk-form-row">      
                                <label class="uk-form-label">First Name</label>
                                <div class="uk-form-controls"><input name ="wanted_first_name" type="text" class="uk-form-width-large" value="<?php echo isset($most_wanted_records['first_name'])?$most_wanted_records['first_name']:'';?>" disabled="" required/></div></div>
                                
                                <?php                      
                                        }
                                    
                                    ?>
                        
                       <?php endif; ?>
                                
                                
                         <?php if($this->session->userdata['account_type'] == 0 ):?>
                        <div class="uk-form-row">      
                                <label class="uk-form-label">Last Name</label>
                                <div class="uk-form-controls"><input name ="wanted_last_name" type="text" class="uk-form-width-large" value="<?php echo isset($most_wanted_records['last_name'])?$most_wanted_records['last_name']:''; ?>" required/></div></div>                                
                           <?php else: ?>
                        
                        <?php 
                                        if (isset ($most_wanted_id)) 
                                            {
                                                ?> 
                        
                         <div class="uk-form-row">      
                                <label class="uk-form-label">Last Name</label>
                                <div class="uk-form-controls"><input name ="wanted_last_name" type="text" class="uk-form-width-large" value="<?php echo isset($most_wanted_records['last_name'])?$most_wanted_records['last_name']:'';?>" disabled="" required/></div></div>
                                
                                <?php                      
                                        }
                                    
                                    ?>
                        
                       <?php endif; ?>
                        

                              
                              <?php if($this->session->userdata['account_type'] == 0 ):?>
                        <div class="uk-form-row">      
                                <label class="uk-form-label">Middle Name</label>
                                <div class="uk-form-controls"><input name ="wanted_middle_name" type="text" class="uk-form-width-large" value="<?php echo isset($most_wanted_records['middle_name'])?$most_wanted_records['middle_name']:''; ?>" required/></div></div>                                
                           <?php else: ?>
                        
                        <?php 
                                        if (isset ($most_wanted_id)) 
                                            {
                                                ?> 
                        
                         <div class="uk-form-row">      
                                <label class="uk-form-label">Middle Name</label>
                                <div class="uk-form-controls"><input name ="wanted_middle_name" type="text" class="uk-form-width-large" value="<?php echo isset($most_wanted_records['middle_name'])?$most_wanted_records['middle_name']:'';?>" disabled="" required/></div></div>
                                
                                <?php                      
                                        }
                                    
                                    ?>
                        
                       <?php endif; ?>
                        
                        
                        
                  <?php if($this->session->userdata['account_type'] == 0 ):?>
                        <div class="uk-form-row">      
                                <label class="uk-form-label">Alias</label>
                                <div class="uk-form-controls"><input name ="wanted_alias" type="text" class="uk-form-width-large" value="<?php echo isset($most_wanted_records['alias'])?$most_wanted_records['alias']:''; ?>" required/></div></div>                                
                           <?php else: ?>
                        
                        <?php 
                                        if (isset ($most_wanted_id)) 
                                            {
                                                ?> 
                        
                         <div class="uk-form-row">      
                                <label class="uk-form-label">Alias</label>
                                <div class="uk-form-controls"><input name ="wanted_alias" type="text" class="uk-form-width-large" value="<?php echo isset($most_wanted_records['alias'])?$most_wanted_records['alias']:'';?>" disabled="" required/></div></div>
                                
                                <?php                      
                                        }
                                    
                                    ?>
                        
                       <?php endif; ?>
                              

                    <?php if($this->session->userdata['account_type'] == 0 ):?>
                        <div class="uk-form-row">      
                                <label class="uk-form-label">District</label>
                                <div class="uk-form-controls"><input name ="wanted_district" type="text" class="uk-form-width-large" value="<?php echo isset($most_wanted_records['district'])?$most_wanted_records['district']:''; ?>" required/></div></div>                                
                           <?php else: ?>
                        
                        <?php 
                                        if (isset ($most_wanted_id)) 
                                            {
                                                ?> 
                        
                         <div class="uk-form-row">      
                                <label class="uk-form-label">District</label>
                                <div class="uk-form-controls"><input name ="wanted_district" type="text" class="uk-form-width-large" value="<?php echo isset($most_wanted_records['district'])?$most_wanted_records['district']:'';?>" disabled="" required/></div></div>
                                
                                <?php                      
                                        }
                                    
                                    ?>
                        
                       <?php endif; ?>
                        

                          <?php if($this->session->userdata['account_type'] == 0 ):?>
                        <div class="uk-form-row">      
                                <label class="uk-form-label">Rank</label>
                               <div class="uk-form-controls">
                                   <select name="wanted_rank">
                                       <option>Select Rank</option>
                                    
                                    <?php 
                                    $ranks = array(
                                        '1',
                                        '2',
                                        '3',
                                        '4',
                                        '5',
                                        '6',
                                        '7',
                                        '8',
                                        '9',
                                        '10',
                                    );
                                    
                                    foreach ($ranks as $rank):
                                        
                                        if(isset($most_wanted_records['rank']) &&($most_wanted_records['rank'] == $rank) ):
                                    ?>
                                    <option value="<?php echo $rank; ?>" selected="selected"><?php echo $rank; ?></option>
                                    <?php else: ?>
                                    <option value="<?php echo $rank;?>"><?php echo $rank;?></option>
                                    
                                  <?php  endif;  endforeach;  ?>  
                                </select>
                               </div><br />
                           <?php else: ?>
                        
                        <?php 
                                        if (isset ($most_wanted_id)) 
                                            {
                                                ?> 
                        
                         <div class="uk-form-row">      
                                <label class="uk-form-label">Rank</label>
                                <div class="uk-form-controls"><input name ="wanted_rank" type="text" class="uk-form-width-large" value="<?php echo isset($most_wanted_records['rank'])?$most_wanted_records['rank']:'';?>" disabled="" required/></div></div>
                                
                                <?php                      
                                        }
                                    
                                    ?>
                        
                       <?php endif; ?>
                        
                        
                       <?php if($this->session->userdata['account_type'] == 0 ):?>
                        <div class="uk-form-row">      
                                <label class="uk-form-label">Location</label>
                                <div class="uk-form-controls"><input name ="wanted_location" type="text" class="uk-form-width-large" value="<?php echo isset($most_wanted_records['location'])?$most_wanted_records['location']:''; ?>" required/></div></div>                                
                           <?php else: ?>
                        
                        <?php 
                                        if (isset ($most_wanted_id)) 
                                            {
                                                ?> 
                        
                         <div class="uk-form-row">      
                                <label class="uk-form-label">Location</label>
                                <div class="uk-form-controls"><input name ="wanted_location" type="text" class="uk-form-width-large" value="<?php echo isset($most_wanted_records['location'])?$most_wanted_records['location']:'';?>" disabled="" required/></div></div>
                                
                                <?php                      
                                        }
                                    
                                    ?>
                        
                       <?php endif; ?>
                        
                        
                        <?php if($this->session->userdata['account_type'] == 0 ):?>
                        <div class="uk-form-row">      
                                <label class="uk-form-label">Station</label>
                                <!--<div class="uk-form-controls"><input name ="wanted_station" type="text" class="uk-form-width-large" value="<?php echo isset($most_wanted_records['station'])?$most_wanted_records['station']:''; ?>" required/></div></div>-->                                
                         <div class="uk-form-controls">
                             <select name="wanted_station">
                            <option>Select Station</option>    
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
                               if(isset($most_wanted_records['station']) && ($most_wanted_records['station'] == $station) ):
                           
                           ?>
                           <option value="<?php echo $station; ?>" selected="selected"> <?php echo $station; ?></option>
                           <?php else: ?>
                           <option value="<?php echo $station; ?>"><?php echo $station; ?></option>
                           
                           <?php endif;  endforeach; ?>
                       </select>
                       </div><br />
                                    
                                    <?php else: ?>
                        
                        <?php 
                                        if (isset ($most_wanted_id)) 
                                            {
                                                ?> 
                        
                         <div class="uk-form-row">      
                                <label class="uk-form-label">Station</label>
                                <div class="uk-form-controls"><input name ="wanted_station" type="text" class="uk-form-width-large" value="<?php echo isset($most_wanted_records['station'])?$most_wanted_records['station']:'';?>" disabled="" required/></div></div>
                                
                                <?php                      
                                        }
                                    
                                    ?>
                        
                       <?php endif; ?>

                        <?php if($this->session->userdata['account_type'] == 0 ):?>
                        <div class="uk-form-row">      
                                <label class="uk-form-label">Offense</label>
                                <div class="uk-form-controls"><input name ="wanted_offense" type="text" class="uk-form-width-large" value="<?php echo isset($most_wanted_records['offense'])?$most_wanted_records['offense']:''; ?>" required/></div></div>                                
                           <?php else: ?>
                        
                        <?php 
                                        if (isset ($most_wanted_id)) 
                                            {
                                                ?> 
                        
                         <div class="uk-form-row">      
                                <label class="uk-form-label">Offense</label>
                                <div class="uk-form-controls"><input name ="wanted_offense" type="text" class="uk-form-width-large" value="<?php echo isset($most_wanted_records['offense'])?$most_wanted_records['offense']:'';?>" disabled="" required/></div></div>
                                
                                <?php                      
                                        }
                                    
                                    ?>
                        
                       <?php endif; ?>






                    <?php if($this->session->userdata['account_type'] == 0 ):?>
                        <div class="uk-form-row">      
                                <label class="uk-form-label">Date</label>
                                <div class="uk-form-controls"><input name ="wanted_date" type="date" class="uk-form-width-large" value="<?php echo isset($most_wanted_records['date'])?$most_wanted_records['date']:''; ?>" required/></div></div>                                
                           <?php else: ?>
                        
                        <?php 
                                        if (isset ($most_wanted_id)) 
                                            {
                                                ?> 
                        
                         <div class="uk-form-row">      
                                <label class="uk-form-label">Date</label>
                                <div class="uk-form-controls"><input name ="wanted_date" type="date" class="uk-form-width-large" value="<?php echo isset($most_wanted_records['date'])?$most_wanted_records['date']:'';?>" disabled="" required/></div></div>
                                
                                <?php                      
                                        }
                                    
                                    ?>
                        
                       <?php endif; ?>




                    <?php if($this->session->userdata['account_type'] == 0 ):?>
                        <div class="uk-form-row">      
                                <label class="uk-form-label">Status</label>
                                <div class="uk-form-controls"><input name ="wanted_status" type="text" class="uk-form-width-large" value="<?php echo isset($most_wanted_records['status'])?$most_wanted_records['status']:''; ?>" required/></div></div>                                
                           <?php else: ?>
                        
                        <?php 
                                        if (isset ($most_wanted_id)) 
                                            {
                                                ?> 
                        
                         <div class="uk-form-row">      
                                <label class="uk-form-label">Status</label>
                                <div class="uk-form-controls"><input name ="wanted_status" type="text" class="uk-form-width-large" value="<?php echo isset($most_wanted_records['status'])?$most_wanted_records['status']:'';?>" disabled="" required/></div></div>
                                
                                <?php                      
                                        }
                                    
                                    ?>
                        
                       <?php endif; ?>




<?php if($this->session->userdata['account_type'] == 0 ):?>
                        <div class="uk-form-row">      
                                <label class="uk-form-label">Remarks</label>
                                <div class="uk-form-controls"><textarea name="wanted_remarks" rows="4" cols="40" class="uk-form-width-large"><?php echo isset($most_wanted_records['remarks'])?$most_wanted_records['remarks']:''; ?></textarea></div></div><br />                                
                           <?php else: ?>
                        
                        <?php 
                                        if (isset ($most_wanted_id)) 
                                            {
                                                ?> 
                        
                         <div class="uk-form-row">      
                                <label class="uk-form-label">Remarks</label>
                                <div class="uk-form-controls"><textarea name="wanted_remarks" rows="4" disabled="" cols="40" class="uk-form-width-large"><?php echo isset($most_wanted_records['remarks'])?$most_wanted_records['remarks']:''; ?></textarea></div></div><br />
                                
                                <?php                      
                                        }
                                    
                                    ?>
                        
                       <?php endif; ?>


                        <?php if (isset ($most_wanted_id)) 
                                        { 
                                                ?>

                                    <div class="uk-form-row">
                                                <img class="update-img" style="width:200px;height:200px;" src="<?= base_url('resource/wanted/images/'.$most_wanted_records['image_path']);?>"/>          
                                    </div>
<?php         }
                  
                                    
                                    ?>





                                
                                <?php if($this->session->userdata['account_type'] == 0 ): ?>    
                                
                                <?php if( ! isset($most_wanted_id)): ?>
                               
                                <div class="uk-form-row">
                                    <label class="uk-form-label">Upload Photo:</label>
                                    <div class="uk-form-controls">
                                        <div class="uk-form-file">
                                            <input type="file" name="file_most_wanted" value="">
                                        </div>
                                    </div>
                                </div></br>
                             
                                <?php else: ?>
                                    
                                   
                                
                                <?php endif; ?>
                                
                                <?php endif; ?>
                        
                        <?php 
   
    if( ! isset($most_wanted_id))
    { // kung walang laman yung $id, papasok dito // or kung nasa creation process palang
?>
<input name="submit_create_most_wanted" type="submit"  class="uk-button btn-save" value="Submit">
<?php    
    }
    else
    { // papasok dito kapag galing sa edit, see update_most_wanted_function sa ctrlr/pnp.php
?>        
                              <?php if($this->session->userdata['account_type'] == 0 ): ?>    
                                    <input name="submit_update_most_wanted" type="submit" class="uk-button btn-save" value="Update">
                              <?php endif; ?>
<?php        
    }

    form_close();
?>
                        
                        </form> 
                        <br>
                    </div>  
                </div>
                </div>
            </div>
              </div>
</div>

 <?php include_once('footer.php');