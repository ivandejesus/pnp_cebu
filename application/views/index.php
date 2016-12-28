<?php include_once('header.php'); ?>

<title><?php echo $title; ?></title>
              <div class="content">
                 
<?php echo $this->session->flashdata('message'); ?>
                <div class="uk-width-medium-1-1 uk-text-right">
                    
                    <script src="<?php echo base_url().'assets/js/jquery-1.11.2.min.js' ?>"></script>
                    <script src="<?php echo base_url().'assets/js/sample.js' ?>" ></script>
                    
<?php if($this->session->userdata['account_type'] == 0 ): ?>       
                              <a href="<?php echo base_url('pnp/view_most_wanted_form') ?>"><button class="uk-button btn-save">ADD</button></a>
       <?php endif; ?>                    
             </div>
            <div class="uk-grid">
                <div class="uk-width-medium-1-1 uk-text-center">
                    <h1 class="wanted-title">Top 10 Most Wanted</h1>
                  
                       <select name="sel_location">
                          <option value="Cebu">Cebu City</option>
                          <!--<option>Philippines</option>-->
                      </select>
                    
                       
                        <select id="select_location" name="sel_station">
                            <option>--Select Station--</option>
                         <?php foreach($stations as $station): ?>
                        <option value ="<?php echo $station->station?>"> <?php echo $station->station; ?> </option>                          
                        <?php endforeach; ?>
                        </select>
                      
          
                </div>
            </div>
                  
              
              <div id="test" class="uk-grid">
              <div class="uk-width-medium-1-5 uk-text-center">
              <div class="img-container"> 
                  
                    <img id="image" value="<?php echo base_url('resources/wanted');?>">
                    <p class="wanted-name"></p>
                    <p  class="wanted-desc"></p>
                    <p class="wanted-desc"></p>
                    <p class="wanted-desc"></p>
                   
                  </div>
              </div>            
          </div>
                      </div>
                  
                  
                  
                  
             
             
             
                
          
     
        
</div>
 <?php include_once('footer.php'); 