<?php
Class Kpi_Fetcher extends CI_Model {
    
   	public function __construct(){
		parent::__construct();		
		$config['hostname'] = 'localhost';
        $config['username'] = 'root';
        $config['password'] = '';
        $config['database'] = 'ihg';
        $config['dbdriver'] = 'mysqli';
        $config['dbprefix'] = '';
        $config['pconnect'] = FALSE;
        $config['db_debug'] = TRUE;
        $config['cache_on'] = FALSE;
        $config['cachedir'] = '';
        $config['char_set'] = 'utf8';
        $config['dbcollat'] = 'utf8_general_ci';
        $this->load->database($config);
    
    }
    public function user_verification(){
        
        if (isset($this->session->userdata['logged_in'])){
            $username = ($this->session->userdata['logged_in']['username']);
        }else{
            
        }
        $currdate = date("Ymd");
        $selected_id = $username;  // Storing Selected Value In Variable
        $dateid = $currdate.$selected_id;
        $sql = "SELECT dateid, id, date, calls, cme, poffers, res FROM test WHERE id= '$selected_id' and date = '$currdateformat'";
        $result = $conn->query($sql);
    }
    
    
}
?>