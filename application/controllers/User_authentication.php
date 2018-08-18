<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class User_Authentication extends CI_Controller {
	public function __construct(){
		parent::__construct();	
    	$this->load->helper('form');
		$this->load->helper('url');
		$this->load->library('form_validation');
		$this->load->library('session');
		$this->load->model('login_database');
    }

	public function index(){
		$this->load->view('login_form');
	}

	public function user_registration_show(){ 
		$this->load->view('registration_form');
	}

	public function new_user_registration(){
		$this->form_validation->set_rules('username', 'Username', 'trim|required');
		$this->form_validation->set_rules('password', 'Password', 'trim|required');

		if ($this->form_validation->run() == FALSE) {
			$this->load->view('registration_form');
		}else{
			//If the validation is correct the new user field will be sent to the db using POST
			$data = array(
				'username' => $this->input->post('username'),
				'password' => $this->input->post('password')
			);

			$result = $this->login_database->registration_insert($data);
			
			if ($result == TRUE) {
				//When the registration is complete the user will be redirected to the login form
				$data['message_display'] = 'Registration Successfully !';
				$this->load->view('login_form', $data);
			}else{
				//In the case the user already exists the user will be notified and the page will be reloaded
				$data['message_display'] = 'Username already exist!';
				$this->load->view('registration_form', $data);
			}
		}
	}

	public function user_login_process(){
		$this->form_validation->set_rules('username', 'Username', 'trim|required');
		$this->form_validation->set_rules('password', 'Password', 'trim|required');


		if ($this->form_validation->run() == FALSE) {
			if(isset($this->session->userdata['logged_in'])){
				//When the user is already logged in, the users role is verified to load the corresponding view
				$username = $this->session->userdata['logged_in']['username'];
				$result = $this->login_database->read_user_information($username);
				$this->role_verification($result);
			}else{
				//When validation wrong, back to login page with errors
				$this->load->view('login_form');
			}
		}else{
			$data = array(
				'username' => $this->input->post('username'),
				'password' => $this->input->post('password'),
				'logindate' => $this->input->post('logindate')
			);
			//If the user is not logged in, the username and password will be checked in the DB
		
			$result = $this->login_database->login($data);
			if ($result == TRUE) {
				//If the DB return a user(True)
				$username = $this->input->post('username');
				$result = $this->login_database->read_user_information($username);
				//New password needed based on first login
				$date = date_create($result[0]->logindate);	
				
				if ($result != false) {
					//Session data from the user, join of login and employees
					$session_data = array(
					'username' => $result[0]->username,
					'logindate' => date_format($date,'H:i:s'),
					'full_name' => $result[0]->full_name,
					'first_name' => $result[0]->first_name,
					'eis_sup' => $result[0]->eis_sup,
					'first_login' => $result[0]->firstlogin
					);
					// Add user data in session
					$this->session->set_userdata('logged_in', $session_data);
					//This loads the view depending on the role
					$this->role_verification($result);
				}
			} else {
				$data = array('error_message' => 'Invalid Username or Password');
				$this->load->view('login_form', $data);
			}
		}
	}

	public function role_verification($userdata){
		$role = $userdata[0]->role;
		$first_login = $userdata[0]->firstlogin;
		
		//if this is the first login a reset password will be triggered
		if ($first_login == 1) {
			//Based on the agent role a different view will be loaded
			if ($role == "Agent"){$this->load->view('dashboard');}
			elseif ($role == "Supervisor"){$this->load->view('admin_page');}
			else{echo "This user does not exist";}
		}else{
			
			$result = $this->login_database->read_user_information($userdata[0]->username);
			//$this->first_login($result);
			$this->load->view('password_reset');
		}
		
	
	}
	
	public function first_login(){
		
		$result = $this->login_database->password_reset($this->input->post());
		
		if ($result == TRUE) {
			$this->user_login_process();
		}
		
		
	}

	public function logout(){
		$sess_array = array('username' => '');
		$this->session->unset_userdata('logged_in', $sess_array);
		$data['message_display'] = 'Successfully Logout';
		$this->load->view('login_form', $data);		
	}


}
