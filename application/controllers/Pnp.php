<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pnp extends CI_Controller {

    function __construct() {
        parent::__construct();
        
        // load lahat ng model dito
        $this->load->model('pnp_model','pnp');
        
        
        date_default_timezone_set('Asia/Manila'); // set philippine/asia as timezone
    }
    
    public function set() // prepare is_police_logged_in para sa filtering ng header navigations
    {
        $data = array(
            'is_police_logged_in' => false
        );
        
        return $data;
    }
    
    public function index()
    {
        $data = $this->set(); // prepare is_police_logged_in para sa filtering ng header navigations
        $this->session->set_userdata($data); // save is_police_logged_in sa session
        $data['title'] = "PNP | Log in"; // ito yung title
        $this->load->view('login',$data); // i-load na yung login with $data
        
    }
    public function convert_to_hash($password)
    {
        return hash_hmac('sha256', $password, ')zb803,&*#$(Iw_QxTroPb=98$#+=@%');
    }
    
    public function prepare_userdata($username)
    {
        $result = $this->pnp->get_user_info($username); 
        
        if($result)
        {
            foreach($result as $row)
            {
                $data = array (
                    'user_id' => $row->user_id,
                    'name' => $row->name,
                    'username' => $row->username,
                    'password' => $row->password,
                    'email' => $row->email,
                    'account_type' => $row->account_type,
                    'is_police_logged_in' => true
                );
            }
            
            return $data;
        }
        else
        {
            return false;
        }
        
    }

    
    public function log_in()
    { 
        $is_btn_log_in_clicked = $this->input->post('btn_log_in');  // ilagay yung value ng btn_log_in na 1 = true
        if ( $is_btn_log_in_clicked)        
           
        { 
             
            $username = $this->input->post('txt_read_username'); 
            $password = $this->input->post('txt_read_password');
            
           
            $is_credential_valid = $this->pnp->check_credential($username, $password); // ilagay ang result ng pag check ng credential
            
            
            if($is_credential_valid)
            {
                $userdata = $this->prepare_userdata($username); // kunin lahat ng info ng user where username = $username
                $this->session->set_userdata($userdata); // ilagay lahat ng info sa session
                 
                redirect('pnp/home');
                 
            }
            else
            {
                
                $message = '<div class="uk-container uk-container-center"> <div class="uk-alert uk-alert-danger" data-uk-alert id="message_success"> <a href="" class="uk-alert-close uk-close"> </a> Username/Password incorrect.</div> </div>';
                $this->session->set_flashdata('message', $message); 
                redirect();
            }
        }
        else
        { 
            $message = '<div class="uk-container uk-container-center"> <div class="uk-alert uk-alert-danger" data-uk-alert id="message_success"> <a href="" class="uk-alert-close uk-close"> </a> Please log in.</div> </div>';
            $this->session->set_flashdata('message', $message); 
            redirect();
        }
    }
       
            
        
    public function log_out()
    {
        $message = '<div class="uk-container uk-container-center"> <div class="uk-alert uk-alert-success" data-uk-alert id="message_success"> <a href="" class="uk-alert-close uk-close"> </a> Logged Out Successfully. </div> </div>';
        $this->session->set_flashdata('message', $message); 
        redirect('');
        $this->session->sess_destroy(); 
    }
    
    public function json()
    {
        $data = $this->input->post();
        $station = $this->pnp->get_station($data['station']); 
        echo json_encode($station, TRUE);
        
    }
    
    public function home()
    {
        $this->check_state();  // check kung nakalog in, if not then redirect to log in
        //$this->load->view('index');
        
        $data['title'] = 'PNP | Most Wanted';
        //$data['wanted_id'] = '';
        //$data = array("stations"=>$this->pnp->get_all());
        $data['stations'] = $this->pnp->get_all();
        //$data['all_wanted_data_index'] = $this->pnp->read_most_wanted(); 
        //$data['search'] = $this->pnp->search_wanted();
        $this->load->view('index',$data);

    }

    
    public function check_state() // check kung nakalog in, if not then redirect to log in
    {
        if( ! $this->session->userdata['is_police_logged_in'])
        {
            redirect();
        }
    }
 
    // end code
 
    public function view_wanted()
    {
        $this->load->library('pagination'); 
        $this->load->library('table');
        
        $config['base_url'] = 'http://localhost/pnp/pnp/view_wanted';
        $config['total_rows'] = $this->pnp->read_wanted();
        $config['per_page'] = 3;
        $config['num_links'] = 3;
 
        $this->pagination->initialize($config);
        //$this->pagination->create_links($config);
        $page = $this->uri->segment(3);
        $data['title'] = 'PNP | WANTED';
        $data['wanted_records'] = $this->pnp->read_wanted($config['per_page'], $page);
        $this->load->view('directory', $data);
    }
    public function view_most_wanted()
    {
        $data['title'] = 'PNP | MOST WANTED';
        $data['all_wanteddata'] = $this->pnp->read_most_wanted();
        $this->load->view('wanted', $data);
    }
   
    public function view_wanted_form()
    {
        $data['title'] = 'PNP | MOST WANTED';
        $this->load->view('record_vw', $data); 
    }
    public function view_most_wanted_form()
    {
        $data['title'] = 'PNP | WANTED';
        $this->load->view('recordwanted_vw', $data);
    }
    

    public function upload_error()
    {
        $data['title'] = "PNP | Upload error!";
        $this->load->view('upload_error_vw',$data);
    }
    public function upload_success()
    {
        $data['title'] = "PNP | Upload error!";
        $this->load->view('upload_success_vw',$data);
    }

   
    
    
    
    // CRUD PNP
    
    public function create_wanted() // created April 4, 2016 , 00:51
    { 
        $is_submitted = $this->input->post('submit_create_wanted'); // kung galing sa user submition sa page

        if ( ! $is_submitted)
        {
            redirect('');
        }
        else // kung galing sa user submition from the page
        { 
            // ilagay muna dito lahat ng mga input galing sa view bago isave, check $data array
            $station = $this->input->post('txt_station');
            $first_name = $this->input->post('txt_first_name');
            $middle_name = $this->input->post('txt_middle_name');
            $last_name = $this->input->post('txt_last_name');
            $alias = $this->input->post('txt_alias');
            $last_known_address = $this->input->post('txt_last_known_address');
            $criminal_activity = $this->input->post('txt_criminal_activity');
            $crime_involvement = $this->input->post('txt_crime_involvement');
            $area_of_operation = $this->input->post('txt_area_of_operation');
            $criminal_case_nr = $this->input->post('txt_criminal_case_nr');
            $issuing_court = $this->input->post('txt_issuing_court');
            $remarks = $this->input->post('txt_remarks');
            $image_uploaded_date = date('Y-m-d'); // (e.g.) 2016-04-03
            $date = $this->input->post('txt_date_created');
            
            
            $files = $_FILES;
            $file_name = $files['file_wanted']['name'];
            $file_parts = pathinfo($file_name); 

            if ($file_name=='') 
            {
               $new_file_name = $file_name;
            }
            else 
            {
                $new_file_name = $file_parts['filename'].' '.substr(md5(date('YmdHis')), 0, 8).'.'.$file_parts['extension']; 
            }

            $config['upload_path'] = './resource/wanted/images/';
            $config['allowed_types'] = 'jpg|jpeg|gif|png';
            $config['max_size']	= '6144';  // size is 6mb pero nakalagay sa notice, dapat ay 5mb
            $config['remove_spaces']	= FALSE;  
            $config['file_name'] = $new_file_name;

            $this->load->library('upload', $config);
            $field_name = "file_wanted"; // name ng input tag

            
            $data = array( // dagadagan mo ng fields na isesave dito, pero kailangan mo muna i lagay yung mga input sa variables
                'station' => $station,
                'first_name' => $first_name,
                'middle_name' => $middle_name,
                'last_name' => $last_name,
                'alias' => $alias,
                'last_known_address' => $last_known_address,
                'criminal_activity' => $criminal_activity,
                'crime_involvement' => $crime_involvement,
                'area_of_operation' => $area_of_operation,
                'criminal_case_nr' => $criminal_case_nr,
                'issuing_court' => $issuing_court,
                'remarks' => $remarks,
                'image_path' => $new_file_name,
                'image_uploaded_date' => $image_uploaded_date,
                'date_created' => $date
                
            );
            
            $this->pnp->create_wanted($data);  // mag ke-create ng bago sa database 
            
            if ( ! $this->upload->do_upload($field_name))
            { 
                $message .=  '<div class="uk-container uk-container-center"> <div class="uk-alert uk-alert-danger" data-uk-alert"> <a href="" class="uk-alert-close uk-close"></a>' . $this->upload->display_errors()  .'</div> </div>';
                $this->session->set_flashdata('message', $message);    
                redirect('pnp/view_wanted');
            }
            else
            {
                $message .=  '<div class="uk-container uk-container-center"> <div class="uk-alert uk-alert-success" data-uk-alert id="message_success"> <a href="" class="uk-alert-close uk-close"></a> Successfully Added! </div> </div>';
//                echo "<script type ='text/javascript'>alert('$message');</script>";
                $this->session->set_flashdata('message', $message);   
                $file_data = $this->upload->data();
                $data['img'] = base_url(). './resource/wanted/images/' . $file_data['file_name'];  
                redirect('pnp/view_wanted');
            }   

        } 
        
    }
     
    public function create_most_wanted()
     {
        $is_submitted = $this->input->post('submit_create_most_wanted');

        if ( ! $is_submitted)
        {
            redirect('');
        }
        else // kung galing sa user submition from the page
        { 
            // ilagay muna dito lahat ng mga input galing sa view bago isave, check $data array
            $first_name = $this->input->post('wanted_first_name');
            $middle_name = $this->input->post('wanted_middle_name');
            $last_name = $this->input->post('wanted_last_name');
            $alias = $this->input->post('wanted_alias');
            $district = $this->input->post('wanted_district');
            $rank = $this->input->post('wanted_rank');
            $location = $this->input->post('wanted_location');
            $station = $this->input->post('wanted_station');
            $offense = $this->input->post('wanted_offense');
            $date = $this->input->post('wanted_date');
            $status = $this->input->post('wanted_status');
            $remarks = $this->input->post('wanted_remarks');
            
            //$image_uploaded_date = date('Y-m-d'); // (e.g.) 2016-04-03
            
            
            $files = $_FILES;
            $file_name = $files['file_most_wanted']['name'];
            $file_parts = pathinfo($file_name); 

            if ($file_name=='') 
            {
               $new_file_name = $file_name;
            }
            else 
            {
                $new_file_name = $file_parts['filename'].' '.substr(md5(date('YmdHis')), 0, 8).'.'.$file_parts['extension']; 
            }

            $config['upload_path'] = './resource/wanted/images/';
            $config['allowed_types'] = 'jpg|jpeg|gif|png';
            $config['max_size']	= '6144';  // size is 6mb pero nakalagay sa notice, dapat ay 5mb
            $config['remove_spaces']	= FALSE;  
            $config['file_name'] = $new_file_name;

            $this->load->library('upload', $config);
            $field_name = "file_most_wanted"; // name ng input tag

            
            $data = array( // dagadagan mo ng fields na isesave dito, pero kailangan mo muna i lagay yung mga input sa variables
                'first_name' => $first_name,
                'middle_name' => $middle_name,
                'last_name' => $last_name,
                'alias' => $alias,
                'district' => $district,
                'rank' => $rank,
                'location' => $location,
                'station' => $station,
                'offense' => $offense,
                'date' => $date,
                'status' => $status,
                'remarks' => $remarks,
                'image_path' => $new_file_name
              
           );
            
            $this->pnp->create_most_wanted($data);  // mag ke-create ng bago sa database 
            
            
            if ( ! $this->upload->do_upload($field_name))
            { 
                $message .=  '<div class="uk-container uk-container-center"> <div class="uk-alert uk-alert-danger" data-uk-alert"> <a href="" class="uk-alert-close uk-close"></a>' . $this->upload->display_errors()  .'</div> </div>';
                $this->session->set_flashdata('message', $message);    
                redirect('pnp/home');
            }
            else
            {
               $message .=  '<div class="uk-container uk-container-center"> <div class="uk-alert uk-alert-success" data-uk-alert id="message_success"> <a href="" class="uk-alert-close uk-close"></a> Successfully Added</div> </div>';
               $this->session->set_flashdata('message', $message);   
               $file_data = $this->upload->data();          
//             $data['img'] = base_url(). './resource/wanted/images/' . $file_data['file_name'];
               redirect('pnp/home', $file_data);
            }   
            
        }
        
     }
     
      function search_keyword()
        {
            $is_submitted = $this->input->get('txtSearch'); 
//            die(var_dump($is_submitted));
            
            if(!$is_submitted) {
                
                $message .=  '<div class="uk-container uk-container-center"> <div class="uk-alert uk-alert-danger" data-uk-alert"> <a href="" class="uk-alert-close uk-close"></a> No Records Found!</div> </div>';
                $this->session->set_flashdata('message', $message);    
                redirect('pnp/view_wanted');
            }else{
            
            $keyword = $this->input->get('txtSearch');
            $data['title'] = 'PNP | WANTED';
            $data['wanted_records'] = $this->pnp->search_wanted($keyword);
            
            if(!$data['wanted_records']){
                $message .=  '<div class="uk-container uk-container-center"> <div class="uk-alert uk-alert-danger" data-uk-alert"> <a href="" class="uk-alert-close uk-close"></a> No Records Found!</div> </div>';
                $this->session->set_flashdata('message', $message);    
                redirect('pnp/view_wanted');
            }
//          die(var_dump($data['all_data']));
            $this->load->view('directory', $data);
            }
            
        }
        
        public function get_wanted_data()
        {
            $data['all_data'] = $this->pnp->read_wanted();
            $this->load->view('directory', $data);
            
        }
        
   
        public function delete($wanted_id)
    {        
     
          if($this->pnp->delete_wanted($wanted_id))
                $message = '<div class="uk-alert uk-alert-success" data-uk-alert id="message_success"><a href="" class="uk-alert-close uk-close"></a>Successfully Deleted</div>';
          else 
                $message = '<div class="message_failed" id="message_failed">Failed to Delete</div>';

            $this->session->set_flashdata('message', $message); 
            redirect('pnp/view_wanted', $wanted_id);	
    }
    
        public function delete_most_wanted($wanted_id)
        {
            if($this->pnp->delete_most_wanted($wanted_id))
                $message .= '<div class="uk-alert uk-alert-success" data-uk-alert id="message_success"><a href="" class="uk-alert-close uk-close"></a>Successfully Deleted</div>';
          else 
                $message .= '<div class="message_failed" id="message_failed">Failed to Delete</div>';

            $this->session->set_flashdata('message', $message); 
            redirect('pnp/home', $wanted_id);	
        }
                
    
    public function update_wanted($wanted_id = false)
        
        { 
                $data['title'] = 'PNP | WANTED';
                $data['wanted_records'] = $this->pnp->get_wanted_info($wanted_id);
                $data['wanted_id'] = $wanted_id;
                $this->load->view('record_vw', $data);
        }   
       

    
     public function update_most_wanted($most_wanted_id = false)
    {
        
        
        $data['title'] = 'PNP | WANTED';
        $data['most_wanted_records'] = $this->pnp->get_most_wanted_info($most_wanted_id);
        $data['most_wanted_id'] = $most_wanted_id;
        
 
        $this->load->view('recordwanted_vw', $data);
    }
    
    
    public function wanted_update($wanted_id)
    {
        $update_wanted = $this->input->post('submit_update_wanted'); 
        
        if($update_wanted)
        {
                $station = $this->input->post('txt_station');
                $first_name = $this->input->post('txt_first_name');
                $middle_name = $this->input->post('txt_middle_name');
                $last_name = $this->input->post('txt_last_name');
                $alias = $this->input->post('txt_alias');
                $last_known_address = $this->input->post('txt_last_known_address');
                $criminal_activity = $this->input->post('txt_criminal_activity');
                $crime_involvement = $this->input->post('txt_crime_involvement');
                $area_of_operation = $this->input->post('txt_area_of_operation');
                $criminal_case_nr = $this->input->post('txt_criminal_case_nr');
                $issuing_court = $this->input->post('txt_issuing_court');
                $remarks = $this->input->post('txt_remarks');
                $date_created = $this->input->post('txt_date_created');
                
                
            
            
//            $files = $_FILES;
//            $file_name = $files['file_wanted']['name'];
//            $file_parts = pathinfo($file_name); 
//
//            if ($file_name=='') 
//            {
//               $new_file_name = $file_name;
//            }
//            else 
//            {
//                $new_file_name = $file_parts['filename'].' '.substr(md5(date('YmdHis')), 0, 8).'.'.$file_parts['extension']; 
//            }
//
//            $config['upload_path'] = './resource/wanted/images/';
//            $config['allowed_types'] = 'jpg|jpeg|gif|png';
//            $config['max_size']	= '6144';  // size is 6mb pero nakalagay sa notice, dapat ay 5mb
//            $config['remove_spaces']	= FALSE;  
//            $config['file_name'] = $new_file_name;
//
//            $this->load->library('upload', $config);
//            $field_name = "file_wanted"; // name ng input tag
                
                 $data = array(
                    'station' => $station,
                    'first_name' => $first_name,
                    'middle_name' => $middle_name,
                    'last_name' => $last_name,
                    'alias' => $alias,
                    'last_known_address' => $last_known_address,
                    'criminal_activity' => $criminal_activity,
                    'crime_involvement' => $crime_involvement,
                    'area_of_operation' => $area_of_operation,
                    'criminal_case_nr' => $criminal_case_nr,
                    'issuing_court' => $issuing_court,
                    'remarks' => $remarks,
                    'date_created' => $date_created
                    //'image_path' => $new_file_name
                );
                 
                 
            $update_wanted_result = $this->pnp->update_wanted($wanted_id , $data); 
            
//            if ( ! $this->upload->do_upload($field_name))
//            { 
//                $message =  '<div class="uk-container uk-container-center"> <div class="uk-alert uk-alert-danger" data-uk-alert"> <a href="" class="uk-alert-close uk-close"></a>' . $this->upload->display_errors()  .'</div> </div>';
//                $this->session->set_flashdata('message', $message);    
//                redirect('pnp/upload_error');
//            }
//            else
//            {
//                $message =  '<div class="uk-container uk-container-center"> <div class="uk-alert uk-alert-success" data-uk-alert id="message_success"> <a href="" class="uk-alert-close uk-close"></a> Successfully uploaded Resume </div> </div>';
//                $this->session->set_flashdata('message', $message);   
//                
//                $data['image_path'] = preg_replace('/\s+/', '_', $new_file_name);
//                $oldfile = $this->pnp->old_wanted_file($this->session->userdata('wanted_id'));
//                
//                echo $oldfile();
//                die();
//                
//                
//                unlink('resource/wanted/images/'.$oldfile);
//                $this->pnp->update_wanted($data,  $this->session->userdata('wanted_id'));
//                $data['error'] = "successfully changed";
//                $this->load->view('upload_success_vw', $data);
//            }   
              if($update_wanted_result)
                 {
                    $message = '<div class="uk-alert uk-alert-success" data-uk-alert id="message_success"><a href="" class="uk-alert-close uk-close"></a>Successfully Updated</div>';
                    $this->session->set_flashdata('message', $message);
                    
                    redirect('pnp/view_wanted');
                }
                else 
                {
                    $message = '<div class="uk-alert uk-alert-warning" data-uk-alert id="message_success"><a href="" class="uk-alert-close uk-close"></a>Saved but nothing was change.</div>';
                    $this->session->set_flashdata('message', $message);
                    redirect('pnp/view_wanted');
                    
                }  
                 
        }
    }
    
    public function most_wanted_update($most_wanted_id)
        {
         
        $update_most_wanted = $this->input->post('submit_update_most_wanted');
        
        
        
        if($update_most_wanted)
        {
            $first_name = $this->input->post('wanted_first_name');
            $middle_name = $this->input->post('wanted_middle_name');
            $last_name = $this->input->post('wanted_last_name');
            $alias = $this->input->post('wanted_alias');
            $district = $this->input->post('wanted_district');
            $rank = $this->input->post('wanted_rank');
            $station = $this->input->post('wanted_station');
            $offense = $this->input->post('wanted_offense');
            $date = $this->input->post('wanted_date');
            $status = $this->input->post('wanted_status');
            $remarks = $this->input->post('wanted_remarks');
            
            $data = array( 
                'first_name' => $first_name,
                'middle_name' => $middle_name,
                'last_name' => $last_name,
                'alias' => $alias,
                'district' => $district,
                'rank' => $rank,
                'station' => $station,
                'offense' => $offense,
                'date' => $date,
                'status' => $status,
                'remarks' => $remarks, 
           );
            
            $update_most_wanted_result = $this->pnp->update_most_wanted($most_wanted_id, $data);
            
            if($update_most_wanted_result)
                 {
                    $message = '<div class="uk-alert uk-alert-success" data-uk-alert id="message_success"><a href="" class="uk-alert-close uk-close"></a>Successfully Updated</div>';
                    $this->session->set_flashdata('message', $message);
                    
                    redirect('pnp/home');
                }
                else 
                {
                    $message = '<div class="uk-alert uk-alert-warning" data-uk-alert id="message_success"><a href="" class="uk-alert-close uk-close"></a>Saved but nothing was change.</div>';
                    $this->session->set_flashdata('message', $message);
                    redirect('pnp/home');
                    
                }  
            
            }
        
    }
    
    public function view_add_users()
    {
        $data['title'] = 'PNP | WANTED';
        $this->load->view('add_user', $data);
    }
    
    public function add_user()
    {
       
            $name = $this->input->post('txt_name');
            $user_name = $this->input->post('txt_username');
            $email = $this->input->post('txt_email');
            $password = $this->input->post('txt_password');
            $retype_password = $this->input->post('txt_retype_password'); 
            $account_type = $this->input->post('txt_account_type');

            
        if($this->pnp->check_username($user_name)){
            $message =  '<div class="uk-container uk-container-center"> <div class="uk-alert uk-alert-danger" data-uk-alert"> <a href="" class="uk-alert-close uk-close"></a>Username Already Exist!</div> </div>';
            $this->session->set_flashdata('message', $message); 
            redirect('pnp/view_add_users');
        }
        else if($this->pnp->check_email($email)){
            $message =  '<div class="uk-container uk-container-center"> <div class="uk-alert uk-alert-danger" data-uk-alert"> <a href="" class="uk-alert-close uk-close"></a>Email Address Already Used!</div> </div>';
            $this->session->set_flashdata('message', $message); 
            redirect('pnp/view_add_users');
        }
        else if ($password != $retype_password){
         $message =  '<div class="uk-container uk-container-center"> <div class="uk-alert uk-alert-danger" data-uk-alert"> <a href="" class="uk-alert-close uk-close"></a>Password did not Match!</div> </div>';   
         $this->session->set_flashdata('message', $message); 
         redirect('pnp/view_add_users');
        }
        
        else{
            $data = array(
            'name' => $name,
            'username' => $user_name,
            'password' => $this->convert_to_hash($password),
            'retypepassword' => $this->convert_to_hash($retype_password),
            'emailaddress' => $email,
            'account_type' => $account_type
           );     
            
            if($this->pnp->create_user($data))
            {
                $message = '<div class="uk-alert uk-alert-success" data-uk-alert id="message_success"><a href="" class="uk-alert-close uk-close"></a>Successfully Created New User.</div>';
                $this->session->set_flashdata('message', $message); 
                redirect('pnp/view_users');
                
            }
            else
            {
                $message = '<div class="uk-alert uk-alert-danger" data-uk-alert id="message_success"><a href="" class="uk-alert-close uk-close"></a>Failed to Create New User.</div>';
                $this->session->set_flashdata('message', $message);
                redirect('pnp/view_add_users');
            }
        }
           
    }
    
    public function view_users()
    {
        $data['title'] = 'PNP | WANTED';
        $data['user_records'] = $this->pnp->read_users();     
        $this->load->view('users', $data);
    }
    
    public function delete_user($user_id)
    {
        if($this->pnp->delete_user($user_id)){

                $message = '<div class="uk-alert uk-alert-success" data-uk-alert id="message_success"><a href="" class="uk-alert-close uk-close"></a>Successfully Deleted</div>';
                $this->session->set_flashdata('message', $message);
                redirect('pnp/view_users', $user_id);
        }else{ 
                $message = '<div class="message_failed" id="message_failed">Failed to Delete</div>';
                $this->session->set_flashdata('message', $message);   
                redirect('pnp/view_users', $user_id);
                
        }
    }
     
          
//     function home_most_wanted()
//     {
//         $is_btn_go_clicked = $this->input->post('btn_go');
//         //$is_btn_view_top_ten_clicked = $this->input->post('btn_view_top_ten'); 
//         
//         if ($is_btn_go_clicked)
//         { 
//            $station = $this->input->post('sel_station');
//            $location = $this->input->post('sel_location');
//            
//         //$data['top_ten'] = $this->pnp->get_top_ten($location, $station);
//         $data = array("stations"=>$this->pnp->get_all());
//         $data['title'] = 'PNP | WANTED';
//         $this->load->view('index',$data);
//         } 
//         elseif ($is_btn_view_top_ten_clicked)
//         {  
//             $station = $this->input->post('sel_station');
//             $location = $this->input->post('sel_location');
//         
//         $data['title'] = 'PNP | WANTED';
//         $data['all_wanteddata'] = $this->pnp->get_top_ten($location, $station);
//         $this->load->view('wanted',$data);
//             
//         }
//         else
//         {
//             redirect('');
//         }
//     }
        
}   

