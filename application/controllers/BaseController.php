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
            'User_Id' => $this->input->post('EmailId'), 'Password' => $this->input->post('password')));
            if ($query->num_rows() > 0){
                $row = $query->row_array(); 
               // die($row['User_Status']);
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
            $page_data['message']='Email and password is required';
                $this->load->view('web/acknowledgement', $page_data); 
        }

    }
    function dashboard(){
        $page_data['message']="";
        if ($this->session->userdata('Full_Name') == null ){
            redirect(base_url(), 'refresh');
        }
        else{
            $page_data['Months'] =$this->CommonModel->getmonths();
            $page_data['Total_Active_User'] =$this->CommonModel->gettotalDetails('Total_Active_User');
            $page_data['fixedLine'] =$this->CommonModel->gettotalDetails('fixedLine');
            $page_data['isp'] =$this->CommonModel->gettotalDetails('isp');
            $page_data['targetrev'] =$this->CommonModel->getmonthlyTarget('Revenue');
            $page_data['achievementrev'] =$this->CommonModel->getmonthlyachievement('Revenue');
            $page_data['lastachievementrev'] =$this->CommonModel->getlastmonthlyachievement('Revenue');
            $page_data['targetActiveUser'] =$this->CommonModel->getmonthlyTarget('Active_user');
            $page_data['achievementActiveUser'] =$this->CommonModel->getmonthlyachievement('Active_user');
            $page_data['lastachieActiveUser'] =$this->CommonModel->getlastmonthlyachievement('Active_user');

            $page_data['targetActiveUserprepaid'] =$this->CommonModel->getmonthlyTarget('Arpu_pre');
            $page_data['achievementarpupre'] =$this->CommonModel->getmonthlyachievement('Arpu_pre');
            $page_data['lastachiearpupre'] =$this->CommonModel->getlastmonthlyachievement('Arpu_pre');

            $page_data['targetActivearpupostpaid'] =$this->CommonModel->getmonthlyTarget('Arpu_post');
            $page_data['achievementpostarpu'] =$this->CommonModel->getmonthlyachievement('Arpu_post');
            $page_data['lastachiepostarpu'] =$this->CommonModel->getlastmonthlyachievement('Arpu_post');

            $page_data['targetActiveVivophone'] =$this->CommonModel->getmonthlyTarget('Vivophone');
            //$page_data['achievementVivophone'] =$this->CommonModel->getmonthlyachievement('Vivophone');
            //$page_data['lastachieVivophone'] =$this->CommonModel->getlastmonthlyachievement('Vivophone');
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
