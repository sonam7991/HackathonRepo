<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class CommonModel extends CI_Model{
	function __construct(){
        parent::__construct();
    }
    //method to insert into mentioned table
     function do_insert($table,$data){
        $this->db->insert($table,$data);
        return $this->db->insert_id();
    }
   
   //get user details
    function getusers(){
       $query =$this->db->query("SELECT IF(s.`Role_Id` IS NULL,'User',t.`Role_Name`) role,s.`Full_Name`,s.`Email_Id`,s.`Contact_No`,s.`Id`,d.`Designaiton`,dep.`Department`,c.`Company_Name` FROM staff_tbl s LEFT JOIN `company_tbl` c ON c.`Id`=s.`Company_Id` LEFT JOIN `designation_tbl` d ON d.`Id`=s.`Designation_Id` LEFT JOIN `department_tbl` dep ON dep.`Id`=s.`Department_Id` LEFT JOIN role_tbl t ON t.`Id`=s.`Role_Id` WHERE s.`Company_Id`= '".$this->session->userdata('companyId')."'")->result_array();
        return $query;
    }

    //generated file number
    function getregNo(){
        $comp_dept =$this->db->query("SELECT dep.`Department_short`,c.`Company_Shortname` FROM staff_tbl s LEFT JOIN `company_tbl` c ON c.`Id`=s.`Company_Id` LEFT JOIN `department_tbl` dep ON dep.`Id`=s.`Department_Id` WHERE s.`Id`='".$this->session->userdata('Id')."' ");
        $finalREgNo="";
        $finalval="0";
        if ($comp_dept->num_rows() > 0){
            $Sequence_Type=$comp_dept->row()->Company_Shortname.'/'.$comp_dept->row()->Department_short;
            $query =$this->db->get_where('application_sequence', array('Sequence_Type'=>$Sequence_Type));
            if ($query->num_rows() > 0){
                $finalval=$query->row()->Last_Sequence+1;
                $data['Last_Sequence']=$finalval;
                $this->db->where('Sequence_Type', $Sequence_Type);
                $this->db->update('application_sequence', $data);
            }
            else{
                $finalval=1;
                $data['Last_Sequence']=$finalval;
                $data['Sequence_Type']=$Sequence_Type;
                $this->db->insert('application_sequence',$data);
            }
            $finalREgNo=$Sequence_Type.'/'.date('Y').'/'.$finalval;
            return $finalREgNo;
        }
        else{
            return "NotData";
        }
    }
    //method to get users
    function getverifier($pe=""){
        $query =$this->db->query(" SELECT s.Id,s.`Full_Name`,s.`Email_Id`,s.`Role_Id` FROM `staff_tbl` s WHERE s.`Company_Id`='".$this->session->userdata('companyId')."' AND s.Id <> '".$this->session->userdata('Id')."'")->result_array();
        return $query;
       
    }
    function getAllApplicationSubmitted($type=""){
        if($type=="group"){
         $query =$this->db->query("SELECT s.`Full_Name`,d.`Designaiton`,ap.`Application_Number`,ap.`Message`,ap.`Subject`,ap.`Application_Date` FROM `application_assign_tbl` a LEFT JOIN `application_tbl` ap ON a.`Application_Number`=ap.`Application_Number` LEFT JOIN `staff_tbl` s ON s.`Id`=ap.`Submitted_Id` LEFT JOIN `designation_tbl` d ON d.`Id`=s.`Designation_Id` WHERE ap.`Status_Id` IN (1,2) AND a.`User_Id` IN ('".$this->session->userdata('Id')."')")->result_array();
        }
        else if($type=="my"){
             $query =$this->db->query("SELECT s.`Full_Name`,d.`Designaiton`,ap.`Application_Number`,ap.`Message`,ap.`Subject`,ap.`Application_Date` FROM `application_assign_tbl` a LEFT JOIN `application_tbl` ap ON a.`Application_Number`=ap.`Application_Number` LEFT JOIN `staff_tbl` s ON s.`Id`=ap.`Submitted_Id` LEFT JOIN `designation_tbl` d ON d.`Id`=s.`Designation_Id` WHERE ap.`Status_Id` =4 AND a.`User_Id` IN ('".$this->session->userdata('Id')."')")->result_array();
        }
        else if($type=="myApproved"){
             $query =$this->db->query("SELECT s.`Full_Name`,d.`Designaiton`,ap.`Application_Number`,ap.`Message`,ap.`Subject`,ap.`Application_Date` FROM `application_assign_tbl` a LEFT JOIN `application_tbl` ap ON a.`Application_Number`=ap.`Application_Number` LEFT JOIN `staff_tbl` s ON s.`Id`=ap.`Submitted_Id` LEFT JOIN `designation_tbl` d ON d.`Id`=s.`Designation_Id` WHERE ap.`Status_Id` =6 AND ap.`Submitted_Id` IN ('".$this->session->userdata('Id')."')")->result_array();
        }
        else{
            $query =$this->db->query("SELECT s.`Full_Name`,d.`Designaiton`,ap.`Application_Number`,ap.`Message`,ap.`Subject`,ap.`Application_Date` FROM `application_assign_tbl` a LEFT JOIN `application_tbl` ap ON a.`Application_Number`=ap.`Application_Number` LEFT JOIN `staff_tbl` s ON s.`Id`=ap.`Submitted_Id` LEFT JOIN `designation_tbl` d ON d.`Id`=s.`Designation_Id` WHERE ap.`Status_Id` =5 AND ap.`Submitted_Id` IN ('".$this->session->userdata('Id')."') GROUP BY ap.`Application_Number` ")->result_array();
        }
        return $query;
        
    }
    function getApplicaionDetails($type="",$appNo=""){
        if($type=="claim"){
            $data['Status_Id']=4;
            $data['Last_Action_By']=$this->session->userdata('Id');            
            $this->db->where('Application_Number', $appNo);
            $this->db->update('application_tbl', $data);

            $data1['Status_Id']=4;
            $array=array('Application_Number'=> $appNo,'User_Id'=>$this->session->userdata('Id'));
            $this->db->where($array);
            $this->db->update('application_assign_tbl', $data1);
        }
        if($type=="rejected"){
            $query =$this->db->query("SELECT a.`Subject`,a.`Application_Number`,a.`Application_Date`,a.`Message`,s.`Full_Name`,s.`Email_Id`,s.`Designation_Id`,ass.`Remarks`,ass.`Action_Date`,ass.`User_Id` User_IdTochagsfa FROM `application_tbl` a LEFT JOIN `application_assign_tbl` ap ON ap.`Application_Number`=a.`Application_Number` LEFT JOIN staff_tbl s ON s.`Id`=a.`Submitted_Id` LEFT JOIN `application_assign_tbl` ass ON ass.`User_Id`=a.`Last_Action_By` WHERE a.`Application_Number`='".$appNo."' AND a.`Status_Id`=5 AND ass.`Remarks` IS NOT NULL GROUP BY ass.`User_Id` ")->row();
        }
        else if($type=="finalapproved"){
           $query =$this->db->query("SELECT a.Id,a.`Subject`,a.`Application_Number`,a.`Application_Date`,a.`Message`,s.`Full_Name`,s.`Email_Id`,s.`Designation_Id`,ass.`Remarks`,ass.`Action_Date`,ass.`User_Id` User_IdTochagsfa FROM `application_tbl` a LEFT JOIN `application_assign_tbl` ap ON ap.`Application_Number`=a.`Application_Number` LEFT JOIN staff_tbl s ON s.`Id`=a.`Submitted_Id` LEFT JOIN `application_assign_tbl` ass ON ass.`User_Id`=a.`Last_Action_By` WHERE a.`Application_Number`='".$appNo."' AND a.`Status_Id`=6 AND ass.`Remarks` IS NOT NULL GROUP BY ass.`User_Id` ")->row();
        }
        else if($type=="finalReport"){
            $query =$this->db->query("SELECT a.`Subject`,a.`Application_Number`,a.`Application_Date`,a.`Message`,s.`Full_Name`,s.`Email_Id`,s.`Designation_Id`,d.`Designaiton` FROM `approved_application_tbl` a LEFT JOIN staff_tbl s ON s.`Id`=a.`Submitted_Id` LEFT JOIN `designation_tbl` d ON d.`Id`=s.`Designation_Id` WHERE a.`Id`='".$appNo."' ")->row();
        }
        else{
            $query =$this->db->query("SELECT a.`Subject`,a.`Application_Number`,a.`Application_Date`,a.`Message`,s.`Full_Name`,s.`Email_Id`,s.`Designation_Id`,ap.`Remarks`,ap.`Action_Date`,a.`Status_Id` FROM `application_tbl` a LEFT JOIN `application_assign_tbl` ap ON ap.`Application_Number`=a.`Application_Number` LEFT JOIN staff_tbl s ON s.`Id`=a.`Submitted_Id` WHERE a.`Application_Number`='".$appNo."'")->row();
        }
        
         return $query;

    }
    function release($appNo=""){
        if($this->session->userdata('Role_Id')!="2"){
            $data['Status_Id']=1;
        }else{
           $data['Status_Id']=2; 
        }
        $this->db->where('Application_Number', $appNo);
        $this->db->update('application_tbl', $data);
    }
    function getApplicaionDetailsINFinalTbl($appNo=""){
         $query="INSERT INTO approved_application_tbl (Application_Date,Application_Number,Approved_Date,Last_Action_By,Message,Status_Id,SUBJECT,Submitted_Id) SELECT Application_Date,Application_Number,CURRENT_DATE,Last_Action_By,Message,Status_Id,SUBJECT,Submitted_Id FROM application_tbl WHERE  Application_Number='".$appNo."'";
            $this->db->query($query);
        
    }
    function getappdetailsforreport($ppNo=""){
        $query =$this->db->query("SELECT f.`Id`,f.`Subject`,f.`Application_Number`,f.`Message`,s.`Full_Name`,d.`Designaiton`,f.`Application_Date` FROM `approved_application_tbl` f LEFT JOIN `staff_tbl` s ON f.`Submitted_Id`=s.`Id` LEFT JOIN `designation_tbl` d ON s.`Designation_Id`=d.`Id` WHERE f.`Submitted_Id`='".$ppNo."'")->result_array();
        return $query;
    }
   
     
}