<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class BaseController extends CI_Controller {
    public function _construct(){
        parent::_construct();
        $this->load->model('Excel_import');
        $this->load-library('excel');
    }
	public function index(){
		$this->load->view('web/index');
	}
	function loadpage($param1="",$param2=""){
		$this->load->view('web/'.$param1);
	}
    function loginuser(){
        if($this->input->post('EmailId')!="" &&  $this->input->post('password')!=""){
            $query = $this->db->get_where('t_user_details', array(
            'User_Id' => $this->input->post('EmailId')));
            if ($query->num_rows() > 0){
                $row = $query->row_array(); 
                if(password_verify($this->input->post('password'), $row['Password'])){
                    if($row['User_Status']=="N"){
                     $page_data['message']='Your user is deactivated. Please contact system administrator.';
                         $this->load->view('web/acknowledgement', $page_data); 
                    }
                    else{
                        
                        $this->session->set_userdata('User_table_id', $row['Id']);
                        $this->session->set_userdata('Role_Id', $row['Role_Id']);
                        $this->session->set_userdata('Full_Name', $row['Full_Name']);
                        $this->session->set_userdata('User_Id', $row['User_Id']);
                        $this->session->set_userdata('Contact_No', $row['Contact_Number']);
                        redirect(base_url() . 'index.php?baseController/dashboard', 'refresh');
                    }  
                }
                else{
                    $page_data['message']='Invalid email and password';
                    $this->load->view('web/acknowledgement', $page_data); 
                }
                              
            } 
            else{
                $page_data['message']='Invalid email ';
                $this->load->view('web/acknowledgement', $page_data); 
            }
        } 
        else{
            $page_data['message']='Email and password is required';
                $this->load->view('web/acknowledgement', $page_data); 
        }

    }
    function dashboard($param=""){
        $page_data['message']="";
        if ($this->session->userdata('Full_Name') == null ){
            redirect(base_url(), 'refresh');
        }
        else{
            if($param!=""){
                $year=$param;
            }
            else{
                $year=date('Y');
            }
            $page_data['Months'] =$this->CommonModel->getmonths();
            $page_data['Total_Active_User'] =$this->CommonModel->gettotalDetails('Total_Active_User',$year);
            $page_data['fixedLine'] =$this->CommonModel->gettotalDetails('fixedLine',$year);
            $page_data['isp'] =$this->CommonModel->gettotalDetails('isp',$year);

            $page_data['targetrev'] =$this->CommonModel->getmonthlyTarget('Revenue',$year);
            $page_data['achievementrev'] =$this->CommonModel->getmonthlyachievement('Revenue',$year);
            $page_data['lastachievementrev'] =$this->CommonModel->getlastmonthlyachievement('Revenue',$year);

            $page_data['targetActiveUser'] =$this->CommonModel->getmonthlyTarget('Active_user',$year);
            $page_data['achievementActiveUser'] =$this->CommonModel->getmonthlyachievement('Active_user',$year);
            $page_data['lastachieActiveUser'] =$this->CommonModel->getlastmonthlyachievement('Active_user',$year);

            $page_data['targetActiveUserprepaid'] =$this->CommonModel->getmonthlyTarget('Arpu_pre',$year);
            $page_data['achievementarpupre'] =$this->CommonModel->getmonthlyachievement('Arpu_pre',$year);
            $page_data['lastachiearpupre'] =$this->CommonModel->getlastmonthlyachievement('Arpu_pre',$year);

            $page_data['targetActivearpupostpaid'] =$this->CommonModel->getmonthlyTarget('Arpu_post',$year);
            $page_data['achievementpostarpu'] =$this->CommonModel->getmonthlyachievement('Arpu_post',$year);
            $page_data['lastachiepostarpu'] =$this->CommonModel->getlastmonthlyachievement('Arpu_post',$year);

            $page_data['targetActiveVivophone'] =$this->CommonModel->getmonthlyTarget('Vivophone',$year);
            $page_data['achievementVivophone'] =$this->CommonModel->getmonthlyachievement('Vivophone',$year);
            $page_data['lastachieVivophone'] =$this->CommonModel->getlastmonthlyachievement('Vivophone',$year);
            $page_data['yearselected'] =$year;
            $this->load->view('admin/dashboard', $page_data);
        }
    }
    function logout($param=''){  
        $this->session->unset_userdata(0);
        $this->session->sess_destroy();
        $this->session->set_flashdata('logout_notification', 'logged_out');
        redirect(base_url().'index.php?baseController/', 'refresh');
    }
}
