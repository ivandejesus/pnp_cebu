<?php
	$this->load->view('admin/header');
?>		
		<div class="right-container">
			<div class="uk-grid uk-grid-small">
				<div class="uk-width-1">
					<div class="right-cont-header">
						<!-- <span><?php echo $head_title; ?></span> -->
					</div>
					<div class="right-cont-header">
						<span>SMS PowerGroup</span>
					</div>
					<hr />
					
			</div>
			
					
				<?php echo $this->session->flashdata('message'); ?>
				
				<div class="uk-width-1 uk-margin">
					<?php $att = array('class'=> 'uk-form uk-form-horizontal', 'id' => 'formvalidate');
					 echo form_open('admin/smspowergrouplog/powergroup_log', $att);?>
					 	
					 
                        	
					 	<div class="uk-form-row">
					 		<?php if(isset($read_registration)) : foreach ($read_registration as $row): ?>
							<label class="uk-form-label">Group Msisdn:</label>
							<div class="uk-form-controls">
							
								<input readonly="" required type="text" placeholder="..." name="grp_msisdn_log" value="<?php echo $row->group_msisdn; ?>">

							<?php endforeach; endif; ?>		 
                       
							</div>
						</div> 



						<div class="uk-form-row">
						<?php if(isset($read_registration)) : foreach ($read_registration as $row): ?>
							<label class="uk-form-label">Moderator Msisdn:</label>
							<div class="uk-form-controls">
								<input readonly=""  type="text" placeholder="..." name="mod_msisdn_log" 
								value="<?php echo $row->moderator_msisdn; ?>">

								<?php endforeach; endif; ?>
							</div>
						</div>

						<div class="uk-form-row">
						<?php if(isset($read_registration)) : foreach ($read_registration as $row): ?>
							<label class="uk-form-label">Group Name:</label>
							<div class="uk-form-controls">
								<input readonly=""  type="text" placeholder="..." name="groupname_log" 
								value="<?php echo $row->group_name; ?>">
								<?php endforeach; endif; ?>
							</div>
						</div>

						<div class="uk-form-row">
						<?php if(isset($read_registration)) : foreach ($read_registration as $row): ?>
							<label class="uk-form-label">Moderator Pin:</label>
							<div class="uk-form-controls">
								<input readonly="" type="text" placeholder="..." name="moderatorpin_log" 
								value="<?php echo $row->moderator_pin; ?>">
								<?php endforeach; endif; ?>
							</div>
						</div>
						
								
						<div class="uk-form-row">
							<label class="uk-form-label">Message:</label>
							<div class="uk-form-controls">
								<textarea cols="30" rows="5" name="message" placeholder="Enter Your Message Here!"></textarea>
							</div>
						</div>
						<input hidden="" type="text" name="status" value="<?php echo $this->session->flashdata('message'); ?>">
						</div>	
						<div class="uk-form-row">
							<input name="send" type="submit" value="Send" class="vcbtn-ad">
						</div>
					</div>
						<?php echo form_close(); ?>
						<hr/>






						<!-- viewing of data -->

					<div class="uk-width-1">
					<table class="uk-table uk-table-striped custom-head-course">
						<thead>


							<tr>
								<th>Sender</th>
								<th>Message</th>
								<th>time</th>
								<th style="width:10%;">Status</th>
							</tr>
						</thead>
						<tbody>
						<?php       if(isset($read_log)) : foreach($read_log as $row): ?>
						
							<tr>
								<td><?php echo $row->sender; ?></td>
								<td><?php echo $row->message; ?></td>
								<td><?php echo $row->time; ?></td>
								<td><?php echo $row->status; ?></td>
							</tr>
						<?php      endforeach; endif;   ?>

						</tbody>
						
						</div>
					</div>
				</div>
			</div>

		</div>
</body>
</html>