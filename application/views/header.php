<!DOCTYPE html>
<html>
    <head>
        <title><?php echo $title; ?></title>
        <link rel="stylesheet" href="<?= base_url('assets/css/uikit.min.css')?>" />
         <link rel="stylesheet" href="<?= base_url('assets/components/tooltip.min.css')?>" />
        <link rel="stylesheet" href="<?= base_url('assets/css/style.css') ?>" />
        <link rel="stylesheet" href="<?= base_url('assets/css/normalize.css') ?>" />
        <script src="<?= base_url('assets/js/jquery-1.11.2.min.js') ?>"></script>
        <script src="<?= base_url('assets/js/components/slider.js') ?>"></script>
        <script src="<?= base_url('assets/js/uikit.min.js') ?>"></script>
        <script src="<?= base_url('assets/js/core/modal.min.js') ?>"></script> 
         <script src="<?= base_url('assets/js/components/tooltip.min.js') ?>"></script> 
         
         <script>
             
             
            var site_url = "<?php echo base_url('resource/wanted/images')."/"; ?>";
            var edit_wanted = "<?php echo base_url('pnp/update_most_wanted').'/'; ?>";  
            var delete_wanted = "<?php echo base_url('pnp/delete_most_wanted').'/'; ?>";
            var rank = "<?php echo "Rank"; ?>";
            var edit_view_name = "";
            var sample = "";
            var accounttype = 1;
            <?php if($this->session->userdata['account_type'] == 0 ): ?> 
              edit_view_name = "<?php echo "Edit/View"; ?>";
              accounttype = 0;
            <?php else: ?>
              edit_view_name = "<?php echo "View"?>";
            <?php endif; ?>
                
             var ctrlr_func = function(ctrlr_function){
                 var site_url = "<?php echo base_url(); ?>";
                 return site_url + "/" + ctrlr_function;
             };
          
         </script>
        
        <link href='https://fonts.googleapis.com/css?family=Lato:400,500,700,900' rel='stylesheet' type='text/css'>
        <link href='https://fonts.googleapis.com/css?family=Raleway:400,500,700,900' rel='stylesheet' type='text/css'>
        
        
    </head>
    <body>
        <header>
            <img src="<?= base_url('assets/image/header.jpg')?>">
        </header>
        
        <div class="uk-container uk-container-center">
            <?php
                if($this->session->userdata['is_police_logged_in'])
                {
                    ?>
                        <nav class="uk-navbar">
                           <!--<a class="uk-navbar-brand" href="index.php"></a>-->
                               <ul class="uk-navbar-nav uk-navbar uk-visible-large">
                               <li class="uk-active"><a href="<?php echo base_url('pnp/home') ?>">Home</a></li>
                               <li class="about-us-active"><a href="<?php echo  base_url('pnp/view_wanted');?>">Directory</a></li>
                               <!--<li class="index-active"><a href="<?php echo base_url('') ?>">Accomplishment</a></li>-->
                               <?php if($this->session->userdata['account_type'] == 0 ): ?> 
                               <li class="about-us-active"><a href="<?php echo  base_url('pnp/view_add_users');?>">Create User Accounts</a></li>
                               <?php endif; ?>
<?php if($this->session->userdata['account_type'] == 0 ): ?>       
                               <li class="about-us-active"><a href="<?php echo base_url('pnp/view_users') ?>">Logs</a></li>
<?php endif; ?>
                               <li class="about-us-active">&nbsp;&nbsp;Welcome <?= $this->session->userdata['name'] ?></li>
                               </ul>

                                <div class="uk-navbar-flip"> 
                                   <?= form_open('pnp/log_out') ?>
                                   <button class="logout">Logout</button>
                                   <?= form_close() ?>
                               </div>
                           <a href="#offcanvas-1" class="uk-navbar-toggle uk-hidden-large" data-uk-offcanvas=""></a>
                   </nav>

                   <div id="offcanvas-1" class="uk-offcanvas" aria-hidden="true">
                       <div class="uk-offcanvas-bar">
                           <ul class="uk-navbar-nav uk-navbar uk-visible-large">
                               <li class="uk-active"><a href="index.php">Home</a></li>
                               <li class="about-us-active"><a href="record.php">Directory</a></li>
                               <li class="index-active"><a href="index.php">View Record</a></li>
                               <li class="about-us-active"><a href="users.php">Users</a></li>
                           </ul>
                       </div>
                   </div>

                    <?php
                }
            ?>