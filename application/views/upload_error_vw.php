<?php

/*
 * Created by: Paul Robert Martinez
 * Email:      paulrobertmartinez@gmail.com
 * Date:       April 3, 2016, 01:15
 * 
 * Edited by:      your_name
 * Edited module:  mark_up/modules/etc
 * 
 */

(defined('BASEPATH')) OR exit('No direct script access allowed');

if (!isset($_SESSION)) {
    session_start();
}
?>
<?php echo $this->session->flashdata('message'); ?>

