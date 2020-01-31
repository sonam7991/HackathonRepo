<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AdminController extends CI_Controller {
	public function index(){
	}
    //redirect to inividual pages for master and other pages.
	function loadPage($page=""){
		$page_data['Registration_number'] =$this->CommonModel->getregNo();
		$page_data['VerifierList'] =$this->CommonModel->getverifier();
		$page_data['userList'] =$this->CommonModel->getusers();
		$page_data['companyList'] = $this->db->get_where('company_tbl',array('Status'=>'Y'))->result_array();
        $page_data['departmentList'] = $this->db->get_where('department_tbl',array('Status'=>'Y'))->result_array();
        $page_data['designationList'] = $this->db->get_where('designation_tbl',array('Status'=>'Y'))->result_array();
		$page_data['rolelist'] = $this->db->get_where('role_tbl',array('Status'=>'Y'))->result_array();
		$this->load->view('admin/'.$page,$page_data);

	}
    //function to delete users
	function deleteuser($iserId="",$page=""){
		$this->db->where('Id', $iserId);
        $this->db->delete('staff_tbl');
        $page_data['rolelist'] = $this->db->get_where('role_tbl',array('Status'=>'Y'))->result_array();
        $page_data['userList'] =$this->CommonModel->getusers();
		$this->load->view('admin/'.$page,$page_data);
	}
    //function to update role for the user by admin
	function Updaterole($page=""){
        $data['Role_Id']=$this->input->post('Company_Name');
        $this->db->where('Id',  $this->input->post('deleteId'));
        $this->db->update('staff_tbl`', $data);
        $page_data['rolelist'] = $this->db->get_where('role_tbl',array('Status'=>'Y'))->result_array();
        $page_data['userList'] =$this->CommonModel->getusers();
		$this->load->view('admin/'.$page,$page_data);
	}
    //company details will be updated
	function Updatecompany($param1=""){
		$data['Company_Name']=$this->input->post('companyName');
		$data['Company_Shortname']=$this->input->post('companyshort');
        $this->db->where('Id',  $this->input->post('deleteId'));
        $this->db->update('company_tbl`', $data);
        $page_data['companyList'] = $this->db->get_where('company_tbl',array('Status'=>'Y'))->result_array();
		$this->load->view('admin/'.$param1,$page_data);
	}

    //will delete the company by admin
	function deletecompany($companyId="",$page=""){
		$this->db->where('Id', $companyId);
        $this->db->delete('company_tbl');
        $page_data['companyList'] = $this->db->get_where('company_tbl',array('Status'=>'Y'))->result_array();
  		$this->load->view('admin/'.$page,$page_data);
	}

    //function to add new company
	function addcompany($page=""){
        $data['Company_Name']=$this->input->post('companyName');
        $data['Company_Shortname']=$this->input->post('companyshort');
        $this->CommonModel->do_insert('company_tbl', $data); 
        $page_data['companyList'] = $this->db->get_where('company_tbl',array('Status'=>'Y'))->result_array();
		$this->load->view('admin/'.$page,$page_data);
	}
	//will update department details
	function Updatedepartment($param2=""){
		$data['Department']=$this->input->post('departmentName');
		$data['Department_short']=$this->input->post('departmentshort');
        $this->db->where('Id',  $this->input->post('deleteId'));
        $this->db->update('department_tbl`', $data);
        $page_data['departmentList'] = $this->db->get_where('department_tbl',array('Status'=>'Y'))->result_array();
		$this->load->view('admin/'.$param2,$page_data);
	}

    //will delete department
	function deletedepartment($departmentId="",$page=""){
		$this->db->where('Id', $departmentId);
        $this->db->delete('department_tbl');
        $page_data['departmentList'] = $this->db->get_where('department_tbl',array('Status'=>'Y'))->result_array();
  		$this->load->view('admin/'.$page,$page_data);
	}

    //add new department by admin
	function adddepartment($page=""){
        $data['Department']=$this->input->post('departmentName');
        $data['Department_short']=$this->input->post('departmentshort');
        $this->CommonModel->do_insert('department_tbl', $data); 
        $page_data['departmentList'] = $this->db->get_where('department_tbl',array('Status'=>'Y'))->result_array();
		$this->load->view('admin/'.$page,$page_data);
	}


	//udpate or edit designation
	function Updatedesignation($param3=""){
		$data['Designaiton']=$this->input->post('designationName');
        $this->db->where('Id',  $this->input->post('deleteId'));
        $this->db->update('designation_tbl', $data);
        $page_data['designationList'] = $this->db->get_where('designation_tbl',array('Status'=>'Y'))->result_array();
		$this->load->view('admin/'.$param3,$page_data);
	}

    //delete selected designation
	function deletedesignation($designationId="",$page=""){
		$this->db->where('Id', $designationId);
        $this->db->delete('designation_tbl');
        $page_data['designationList'] = $this->db->get_where('designation_tbl',array('Status'=>'Y'))->result_array();
  		$this->load->view('admin/'.$page,$page_data);
	}

    //will add new designation
	function adddesignation($page=""){
        $data['Designaiton']=$this->input->post('designationName');
        $this->CommonModel->do_insert('designation_tbl', $data); 
        $page_data['designationList'] = $this->db->get_where('designation_tbl',array('Status'=>'Y'))->result_array();
		$this->load->view('admin/'.$page,$page_data);
	}
    //function to submit and initiate application details
	function submitApplcationDetails(){
		$page_data['message']="";
        $page_data['messagefail']="";
	 	$data['Application_Number']=$this->input->post('appNo');
        $data['Subject']=$this->input->post('Subject');
        $data['Message']=$this->input->post('application_details');
        $data['Application_Date']=date('Y-m-d');
     	$data['Status_Id']=1;
     	$data['Submitted_Id']=$this->session->userdata('Id');
     	$this->CommonModel->do_insert('application_tbl', $data);    

        foreach($this->input->post('nameverifier') as $i=> $ver): 
        	$data1['Application_Number']=$this->input->post('appNo');
        	$data1['User_Id']=$ver;
        	$data1['Status_Id']=1;
        	$this->CommonModel->do_insert('application_assign_tbl', $data1); 
        endforeach;
        //$verifier=implode('#', $this->input->post('nameverifier'))
         if($this->db->affected_rows()>0){
         	$page_data['message']="Your application is submitted. Thank you for using our system";
         }
         else{
         	$page_data['messagefail']='Your application is not able to submit. Please try again';
         }
        
        $this->load->view('admin/acknowledgement', $page_data); 
         
	}	
    //open and claim applicaion to my task
	function claimopenapp($type="",$appNo=""){
		 $page_data['application_detail'] =$this->CommonModel->getApplicaionDetails($type,$this->input->post('AppNo'));
		 $page_data['VerifierList'] =$this->CommonModel->getverifier();
		$this->load->view('admin/verifyApplication',$page_data); 
	}
    //to release applcation back to group task
    function release(){
        $page_data['message']="";
        $page_data['messagefail']="";
        $this->CommonModel->release($this->input->post('AppNo'));
        if($this->db->affected_rows()>0){
            $page_data['message']="You have release the application back to group. Thank you for using our system";
         }
         else{
            $page_data['messagefail']='Not able to release. Please try again';
         }
        
        $this->load->view('admin/acknowledgement', $page_data); 
    }
    //update application details on action such as forward, reject and approve
    function updateApplicationDetails($param=""){
        $page_data['message']="";
        $page_data['messagefail']="";
        if($param=="reject"){
            $data['Status_Id']=5;
            $this->db->where('Application_Number', $this->input->post('appNo'));
            $this->db->update('application_tbl', $data);

            $data['Status_Id']=5;
            $data['Remarks']=$this->input->post('remarks');
            $data['Action_Date']=date('Y-m-d');
            $array=array('Application_Number'=> $this->input->post('appNo'),'User_Id'=>$this->session->userdata('Id'));
            $this->db->where($array);
            $this->db->update('application_assign_tbl', $data);
            if($this->db->affected_rows()>0){
                $page_data['message']="You have rejected the applicaiton (".$this->input->post('appNo').") due to ".$this->input->post('remarks');
             }
             else{
                $page_data['messagefail']='Not able to reject. Please try again';
             }
            
            $this->load->view('admin/acknowledgement', $page_data); 
        }
        else if($param=="resubmit"){
            $data['Status_Id']=4;
            $data['Subject']=$this->input->post('Subject');
            $data['Message']=$this->input->post('application_details');
            $this->db->where('Application_Number', $this->input->post('appNo'));
            $this->db->update('application_tbl', $data);

            $data1['Status_Id']=4;
            $data1['Remarks']='';
            $array=array('Application_Number'=> $this->input->post('appNo'),'User_Id'=>$this->input->post('userId'));
            $this->db->where($array);
            $this->db->update('application_assign_tbl', $data1);
            if($this->db->affected_rows()>0){
                $page_data['message']="You have resubmitted the application. Thank you for using our system ";
             }
             else{
                $page_data['messagefail']='Not able to resubmit. Please try again';
             }
            
            $this->load->view('admin/acknowledgement', $page_data); 
        }
        else if($param=="approvefinal"){
            $data['Status_Id']=6;
            $this->db->where('Application_Number', $this->input->post('appNo'));
            $this->db->update('application_tbl', $data);

            $this->CommonModel->getApplicaionDetailsINFinalTbl($this->input->post('appNo'));
            if($this->db->affected_rows()>0){
                $page_data['message']="You have Approved the application. Email notification is send to the applicant and the applicant is requested to collect the applicaiton from the office.";
            }
            else{
                $page_data['messagefail']='Not able to Approve. Please try again';
            }
            
            $this->load->view('admin/acknowledgement', $page_data); 
        }
        else{
            $namerole=explode(",", $this->input->post('nameverifier'));
            $data['Status_Id']=2;
            $this->db->where('Application_Number', $this->input->post('appNo'));
            $this->db->update('application_tbl', $data);

            $this->db->where('Application_Number', $this->input->post('appNo'));
            $this->db->delete('application_assign_tbl');
            $data1['Application_Number']=$this->input->post('appNo');
            $data1['User_Id']=$namerole[0];
            $data1['Status_Id']=2;
            $data1['Action_Date']=date('Y-m-d');
            $data1['Remarks']=$this->input->post('remarks');
            $this->CommonModel->do_insert('application_assign_tbl', $data1); 
            if($this->db->affected_rows()>0){
                $page_data['message']="You have forwarded the applicaiton.";
             }
             else{
                $page_data['messagefail']='Not able to forward. Please try again';
             }
            
            $this->load->view('admin/acknowledgement', $page_data); 

        }

    }
    //get application detail for view 
    function opentoresubmit($type){
        
        if($type=="resubmit"){
            $page_data['application_detail'] =$this->CommonModel->getApplicaionDetails('rejected',$this->input->post('AppNo'));
            $page_data['VerifierList'] =$this->CommonModel->getverifier();
            $this->load->view('admin/resubmitApplication',$page_data); 
        }
        else{
             $page_data['application_detail'] =$this->CommonModel->getApplicaionDetails('finalapproved',$this->input->post('AppNo'));
            
            $this->load->view('admin/viewApproveDetails',$page_data); 
        }
        
    }
    function searchDetails(){
       $page_data['result_list'] =$this->CommonModel->getappdetailsforreport($this->input->post('userid'));
       $this->load->view('admin/searchresult',$page_data); 
    }
    function searchDetailsgenerate($id=""){
        $page_data['application_detail'] =$this->CommonModel->getApplicaionDetails('finalReport',$id);
        $this->load->view('admin/finalreport',$page_data); 
    }
}

