<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AdminController extends CI_Controller {
    public function _construct(){
        parent::_construct();
        require_once APPPATH.'third_party/PHPExcel.php';
        $this->excel = new PHPExcel(); 
    }
	public function index(){
	}
    function loadTarget($page=""){
        $page_data['targetlist']= $this->db->get('t_target')->result_array();
        $this->load->view('admin/Traget/'.$page,$page_data);

    }
    function outline($page=""){
        $this->load->view('admin/outline/'.$page);
    }
    function editTargetDetails($param2=""){
        die('sdsds: '. $this->input->post('updateTagetId'));
        $data['Year']=$this->input->post('year');
        $data['Revenue']=$this->input->post('ftarget');
        $data['Arpu_post']=$this->input->post('arpupost');
        $data['Arpu_pre']=$this->input->post('arpupre');
        $data['Active_user']=$this->input->post('activeu');
        $data['Vivophone']=$this->input->post('sales');
        $this->db->where('Id',  $this->input->post('updateTagetId'));
        $this->db->update('t_target`', $data);
        $page_data['ListTarget'] = $this->db->get_where('t_target')->result_array();
        $this->load->view('admin/Target'.$param2,$page_data);

    }

    function deletetarget($targetId="",$page=""){
        $this->db->where('Id', $targetId);
        $this->db->delete('t_target');
        $page_data['targetlist'] = $this->db->get('t_target')->result_array();
        $this->load->view('admin/Target/ListTarget'.$page,$page_data);
        $this->load->view('admin/Traget/'.$page,$page_data);
    }

    function addTarget(){
        $page_data['message']="";
        $page_data['messagefail']="";
        $data['Year']=$this->input->post('year');
        $data['Revenue']=$this->input->post('ftarget');
        $data['m_revenue']=$this->input->post('mtarget');
        $data['Arpu_post']=$this->input->post('arpupost');
        $data['Arpu_pre']=$this->input->post('arpupre');
        $data['Active_user']=$this->input->post('activeu');
        $data['Vivophone']=$this->input->post('sales');
        $this->CommonModel->do_insert('t_target', $data); 
        if($this->db->affected_rows()>0){
            $page_data['message']="Target details for ".$this->input->post('year')."</b>. Thank you for using our system";
        }
        else{
            $page_data['messagefail']='Target is not able to submit. Please try again';
        }
        $this->load->view('admin/acknowledgement', $page_data);
    }
    function loadAdminPage($page=""){
        $page_data['rolelist'] = $this->db->get_where('t_role_master',array('Role_Status'=>'Y'))->result_array();
        $page_data['userList'] = $this->db->get('t_User_details')->result_array();
        $this->load->view('admin/administrator/'.$page,$page_data);
    }
    function addUser(){
        $page_data['message']="";
        $page_data['messagefail']="";
        $data['CID']=$this->input->post('CID');
        $data['Full_Name']=$this->input->post('Full_Name');
        $data['Contact_Number']=$this->input->post('Contact_Numer');
        $data['User_Id']=$this->input->post('User_Id');
        $data['Role_Id']=$this->input->post('Role_Id');
        $data['Password']=$this->input->post('Password');
        $this->CommonModel->do_insert('t_user_details', $data); 
        if($this->db->affected_rows()>0){
            $page_data['message']="User details for ".$this->input->post('Full_Name')." has beed added with user name:<b>".$this->input->post('User_Id')."</b> and password:<b>".$this->input->post('Password')."</b>. Thank you for using our system";
        }
        else{
            $page_data['messagefail']='User is not albe to submit. Please try again';
        }
        $this->load->view('admin/acknowledgement', $page_data); 
    }
	function loadPage($page="",$id=""){
        $page_data['userDetils'] =$this->CommonModel->getuserDetails($id);
		$this->load->view('common/'.$page,$page_data);
	}
    function updateUser(){
       $page_data['messagefail']="";
        $data['CID']=$this->input->post('CID');
        $data['Full_Name']=$this->input->post('Full_Name');
        $data['Contact_Number']=$this->input->post('Contact_Number');
        $data['User_Id']=$this->input->post('User_Id');
        $data['Password']=$this->input->post('Password');
        $this->db->where('Id',  $this->input->post('userId'));
        $this->db->update('t_user_details`', $data);
        $page_data['message']="Details are updated. Thank you for using the system";
        $this->load->view('admin/acknowledgement', $page_data); 
    }
	function updatestaus($iserId="",$stus=""){
        if($stus=="Yes" || $stus=="Y"){
		  $data['User_Status']='N';
        }
        else{
           $data['User_Status']='Y'; 
        }
        $this->db->where('Id',  $iserId);
        $this->db->update('t_user_details`', $data);
        $page_data['rolelist'] = $this->db->get_where('t_role_master',array('Role_Status'=>'Y'))->result_array();
        $page_data['userList'] = $this->db->get('t_User_details')->result_array();
        $this->load->view('admin/administrator/ListUser',$page_data);
	}
    //function to update role for the user by admin
	function Updaterole($page=""){
        $data['Role_Id']=$this->input->post('User_List');
        $this->db->where('Id',  $this->input->post('deleteId'));
        $this->db->update('t_user_details`', $data);
        $page_data['rolelist'] = $this->db->get_where('t_role_master',array('Role_Status'=>'Y'))->result_array();
        $page_data['userList'] = $this->db->get_where('t_User_details',array('User_Status'=>'Y'))->result_array();
		$this->load->view('admin/administrator/ListUser',$page_data);
        $page_data['messagefail']="";
        $page_data['message']="Information is updated. Thank you for using the system";
        $this->load->view('admin/acknowledgement', $page_data); 

	}
   
    function loadimportPage($page=""){
        $page_data['rolelist'] ="";
        $this->load->view('data/'.$page,$page_data);
    }


    function insertexcelData($type=""){     
        require_once APPPATH.'third_party/PHPExcel.php';
        $this->excel = new PHPExcel();  
        $file_info = pathinfo($_FILES["msubscriber"]["name"]);
        $file_directory = "uploads/attachments/".date("Y").'/'.date("M");
        if(!is_dir($file_directory)){
            mkdir($file_directory,0777,TRUE);
        }
        $new_file_name = $_FILES["msubscriber"]["name"];
        move_uploaded_file($_FILES["msubscriber"]["tmp_name"], $file_directory . $new_file_name);
        $file_type  = PHPExcel_IOFactory::identify($file_directory . $new_file_name);
        $objReader  = PHPExcel_IOFactory::createReader($file_type);
        $objPHPExcel = $objReader->load($file_directory . $new_file_name);
        $sheet_data = $objPHPExcel->getActiveSheet()->toArray(null,true,true,true);
        $Prepaid_Active_main=0;
        $Prepaid_Passive_Total=0;
        $Prepaid_Total_count=0;
        $Post_Active_count=0;
        $Post_Passive_count=0;
        $Post_Total_count=0;
        $Total_Active_total=0;
        $Total_Registered_count=0;
        $rowcount=0;
        foreach($sheet_data as $i=> $data) {
            if($i>2){
                $Prepaid_Active_main=$Prepaid_Active_main+$data['B'];
                $Prepaid_Passive_Total=$Prepaid_Passive_Total+$data['C'];
                $Prepaid_Total_count=$Prepaid_Total_count+$data['D'];
                $Post_Active_count=$Post_Active_count+$data['E'];
                $Post_Passive_count=$Post_Passive_count+$data['F'];
                $Post_Total_count=$Post_Total_count+$data['G'];
                $Total_Active_total=$Total_Active_total+$data['H']; 
                $Total_Registered_count=$Total_Registered_count+$data['J'];                    
                $rowcount++;

                $result = array(
                    'Year' => $this->input->post('Year'),
                    'Month' => $this->input->post('month'),
                    'File_Date' => $data['A'],
                    'Pre_Active' => $data['B'],
                    'Pre_Grace' => $data['C'],
                    'Pre_Total_Registered' => $data['D'],
                    'Post_Active' => $data['E'],
                    'Post_Grace' => $data['F'],
                    'Post_Total_Registered' => $data['G'],
                    'Total_Active' => $data['H'],
                    'Total_Grace' => $data['I'],
                    'User_Id' => $this->session->userdata('User_table_id'),
                    'Added_Date' => date("Y-m-d"),                    
                );
                $this->CommonModel->do_insert('t_subscriber_bmobile_excel',$result);
            }
        }

        $Prepaid_Active=$Prepaid_Active_main/ $rowcount;
        $Prepaid_Passive=$Prepaid_Passive_Total/ $rowcount;
        $Prepaid_Total=$Prepaid_Total_count/$rowcount;
        $Post_Active=$Post_Active_count/$rowcount;
        $Post_Passive=$Post_Passive_count/$rowcount;
        $Post_Total=$Post_Total_count/$rowcount;

        $Total_Active=$Total_Active_total/$rowcount;

        $Total_Registered=$Total_Registered_count/$rowcount;

        $disconnect1 = $_FILES["mpostdisconnect"]["name"];
        move_uploaded_file($_FILES["mpostdisconnect"]["tmp_name"], $file_directory . $disconnect1);
        $file_type1  = PHPExcel_IOFactory::identify($file_directory . $disconnect1);
        $objReader  = PHPExcel_IOFactory::createReader($file_type1);
        $objPHPExcel = $objReader->load($file_directory . $disconnect1);
        $disconnect_sheet_data = $objPHPExcel->getActiveSheet()->toArray(null,true,true,true);
        $Rowtotalpost=0;
        foreach($disconnect_sheet_data as $i=> $data) {
            if($i>2){
                if($this->input->post('month')==1){
                    $Rowtotalpost=$Rowtotalpost+$data['D'];
                }
                if($this->input->post('month')==2){
                    $Rowtotalpost=$Rowtotalpost+$data['E'];
                }
                if($this->input->post('month')==3){
                    $Rowtotalpost=$Rowtotalpost+$data['F'];
                }
                if($this->input->post('month')==4){
                    $Rowtotalpost=$Rowtotalpost+$data['G'];
                }
                if($this->input->post('month')==5){
                    $Rowtotalpost=$Rowtotalpost+$data['H'];
                }
                if($this->input->post('month')==6){
                    $Rowtotalpost=$Rowtotalpost+$data['I'];
                }
                if($this->input->post('month')==7){
                    $Rowtotalpost=$Rowtotalpost+$data['J'];
                }
                if($this->input->post('month')==8){
                    $Rowtotalpost=$Rowtotalpost+$data['K'];
                }
                if($this->input->post('month')==9){
                    $Rowtotalpost=$Rowtotalpost+$data['L'];
                }
                if($this->input->post('month')==10){
                    $Rowtotalpost=$Rowtotalpost+$data['M'];
                }
                if($this->input->post('month')==11){
                    $Rowtotalpost=$Rowtotalpost+$data['N'];
                }
                if($this->input->post('month')==12){
                    $Rowtotalpost=$Rowtotalpost+$data['O'];
                }
                $result = array(
                    'Year' => $this->input->post('Year'),
                    'Month' => $this->input->post('month'),
                    'File_Type' => 'POST',                    
                    'Name' => $data['B'],
                    'Jan' => $data['D'],
                    'Feb' => $data['E'],
                    'Mar' => $data['F'],
                    'Apr' => $data['G'],
                    'May' => $data['H'],
                    'June' => $data['I'],
                    'July' => $data['J'],
                    'Aug' => $data['K'],
                    'Sep' => $data['L'],
                    'Oct' => $data['M'],
                    'Nov' => $data['N'],
                    'Dec' => $data['O'],
                    'User_Id' => $this->session->userdata('User_table_id'),
                    'Added_Date' => date("Y-m-d"),                    
                );
                $this->CommonModel->do_insert('t_subscriber_base_disconnect_excel',$result);
            }
        }

        $disconnect2 = $_FILES["mpredisconnect"]["name"];
        move_uploaded_file($_FILES["mpredisconnect"]["tmp_name"], $file_directory . $disconnect2);
        $file_type2  = PHPExcel_IOFactory::identify($file_directory . $disconnect2);
        $objReader  = PHPExcel_IOFactory::createReader($file_type2);
        $objPHPExcel = $objReader->load($file_directory . $disconnect2);
        $disconnectper_sheet_data = $objPHPExcel->getActiveSheet()->toArray(null,true,true,true);
        $Rowtotalpre=0;
        foreach($disconnectper_sheet_data as $i=> $data) {
            if($i>2){
                if($this->input->post('month')==1){
                    $Rowtotalpre=$Rowtotalpre+$data['D'];
                }
                if($this->input->post('month')==2){
                    $Rowtotalpre=$Rowtotalpre+$data['E'];
                }
                if($this->input->post('month')==3){
                    $Rowtotalpre=$Rowtotalpre+$data['F'];
                }
                if($this->input->post('month')==4){
                    $Rowtotalpre=$Rowtotalpre+$data['G'];
                }
                if($this->input->post('month')==5){
                    $Rowtotalpre=$Rowtotalpre+$data['H'];
                }
                if($this->input->post('month')==6){
                    $Rowtotalpre=$Rowtotalpre+$data['I'];
                }
                if($this->input->post('month')==7){
                    $Rowtotalpre=$Rowtotalpre+$data['J'];
                }
                if($this->input->post('month')==8){
                    $Rowtotal=$Rowtotal+$data['K'];
                }
                if($this->input->post('month')==9){
                    $Rowtotalpre=$Rowtotalpre+$data['L'];
                }
                if($this->input->post('month')==10){
                    $Rowtotalpre=$Rowtotalpre+$data['M'];
                }
                if($this->input->post('month')==11){
                    $Rowtotalpre=$Rowtotalpre+$data['N'];
                }
                if($this->input->post('month')==12){
                    $Rowtotalpre=$Rowtotalpre+$data['O'];
                }
                $result = array(
                    'Year' => $this->input->post('Year'),
                    'Month' => $this->input->post('month'),
                    'File_Type' => 'PRE',                    
                    'Name' => $data['B'],
                    'Jan' => $data['D'],
                    'Feb' => $data['E'],
                    'Mar' => $data['F'],
                    'Apr' => $data['G'],
                    'May' => $data['H'],
                    'June' => $data['I'],
                    'July' => $data['J'],
                    'Aug' => $data['K'],
                    'Sep' => $data['L'],
                    'Oct' => $data['M'],
                    'Nov' => $data['N'],
                    'Dec' => $data['O'],
                    'User_Id' => $this->session->userdata('User_table_id'),
                    'Added_Date' => date("Y-m-d"),                    
                );
                $this->CommonModel->do_insert('t_subscriber_base_disconnect_excel',$result);
            }
        }

        $disconnect=$Rowtotalpre+$Rowtotalpost;
        $churn=$disconnect/$Total_Registered;
        $lhrattachment = $_FILES["lhrattachment"]["name"];
        
        move_uploaded_file($_FILES["lhrattachment"]["tmp_name"], $file_directory . $lhrattachment);
        $result = array(
            'Year' => $this->input->post('Year'),
            'Month' => $this->input->post('month'),
            'Prepaid_Active' => $Prepaid_Active,
            'Prepaid_Passive' => $Prepaid_Passive,
            'Prepaid_Total' => $Prepaid_Total,
            'Post_Active' => $Post_Active,
            'Post_Passive' => $Post_Passive,
            'Post_Total' => $Post_Total,
            'Total_Active' => $Total_Active,
            'Total_Registered' => $Total_Registered,
            'Churn_Rate' => $churn,              
            'Disconnected' => $disconnect,          
            'HLR' => $this->input->post('lhr'),
            'HLR_Attachment' =>$lhrattachment,
            'User_Id' =>  $this->input->post('User_table_id'),            
            'Added_Date' => date("Y-m-d"),                 
        );
        $this->CommonModel->do_insert('t_subscriber_bmobile_main',$result);
        $page_data['messagefail']="";
        $page_data['message']="Details are inserted. Thank you for using our system";
        $this->load->view('admin/acknowledgement', $page_data); 
    }
 
    function loadreportPage($page="",$type="",$Id="",$month="",$year="",$param1=""){
        $page_data['Details_Report'] ="";
        $page_data['year'] =$year;
        $page_data['rtype'] =$param1;
        $page_data['subtypeval'] =$Id;
        $page_data['subtype'] ="";
        $page_data['Months'] ="";
        //subsb-mobile
        $page_data['Months'] =$this->CommonModel->getmonths();
        if($type=="detailReport"){
            $page_data['header'] =$Id;
            $page_data['rtype'] =$Id;
            $page_data['year'] =$year;
            $page_data['Details_Report'] =$this->CommonModel->getReportDetails($Id,'bmobile','',$year);
            //$this->load->view('report/reportDetaisreportDetais',$page_data);
        } 
        // die($type);
        if($type=="subsb-fixedline"){
            $page_data['Details_Report'] =$this->CommonModel->getReportDetails($Id,'fixline','',$year);
            //$this->load->view('report/reportDetaisreportDetais',$page_data);
        } 
        if($type=="mobile_data_user"){
            $page_data['year'] =$Id;
            $page_data['Details_Report'] =$this->CommonModel->getReportDetails($Id,'datauser');
            //$this->load->view('report/reportDetaisreportDetais',$page_data);
        }
        if($type=="vas"){
            $page_data['Months'] =$Id;
            $page_data['year'] =$month;
            $page_data['Details_Report'] =$this->CommonModel->getReportDetails($Id,'vas',$month);
            //$this->load->view('report/reportDetaisreportDetais',$page_data);
        } 
         
         if($type=="isp"){
            $page_data['year'] =$Id;
            $page_data['Details_Report'] =$this->CommonModel->getReportDetails($Id,'isp');
            //$this->load->view('report/reportDetaisreportDetais',$page_data);
        }
        
        if($type=="t_revenue_mobile_main"){
            $page_data['subtype'] ='mobile';
            $page_data['Details_Report'] =$this->CommonModel->getReportDetails($Id,'t_revenue_mobile_main','',$year);
        }
        if($type=="t_revenue_isp_main"){
            $page_data['subtype'] ='isp';
             $page_data['Details_Report'] =$this->CommonModel->getReportDetails($Id,'t_revenue_isp_main');
            //$this->load->view('report/reportDetaisreportDetais',$page_data);
        }
         if($type=="t_revenue_fixed_line_main"){
            $page_data['subtype'] ='fixedline';
             $page_data['Details_Report'] =$this->CommonModel->getReportDetails($Id,'t_revenue_fixed_line_main');
            //$this->load->view('report/reportDetaisreportDetais',$page_data);
        }
        
        if($type=="t_revenue_arpu_main"){
            $page_data['subtype'] ='arpu';
             $page_data['Details_Report'] =$this->CommonModel->getReportDetails($Id,'t_revenue_arpu_main');
            //$this->load->view('report/reportDetaisreportDetais',$page_data);
        }
         if($type=="t_revenue_other_main"){
            $page_data['subtype'] ='overall';
             $page_data['Details_Report'] =$this->CommonModel->getReportDetails($Id,'t_revenue_other_main');
            //$this->load->view('report/reportDetaisreportDetais',$page_data);
        }
        $this->load->view('report/'.$page,$page_data);
    }

    function comparegraph($page="",$type="",$year=""){
        $page_data['Details_Report'] ="";
        $page_data['Details_post_Report'] ="";
        $page_data['Details_ta'] ="";
        $page_data['Details_td'] ="";
        $page_data['year'] =$year;
        $page_data['Months'] =$this->CommonModel->getmonths();
        if($type=="bcompare"){
            $page_data['Details_Report'] =$this->CommonModel->getCompareDetails($year,'comparebmobile');
            $page_data['Details_post_Report'] =$this->CommonModel->getCompareDetails($year,'comparepmobile');
            $page_data['Details_ta'] =$this->CommonModel->getCompareDetails($year,'compareta');
            $page_data['Details_td'] =$this->CommonModel->getCompareDetails($year,'comparetd');
        }
        $this->load->view('graphComp/'.$page,$page_data);
    
    }
    function financialtarget($page="",$type="",$year=""){
        $page_data['ftarget'] ="";
        $page_data['mtarget'] ="";
        $page_data['year']=$year;
        $page_data['Months'] =$this->CommonModel->getmonths();
        if($type=="Companytarget"){
            $page_data['ftarget'] =$this->CommonModel->getfinancialtarget($year,'companytarget');
            $page_data['mtarget'] =$this->CommonModel->getfinancialtarget($year,'monthlytarget');
        }
        $this->load->view('admin/finanical/'.$page,$page_data);
    }

    function fixedlinegraph($page="",$type="",$year=""){
         $page_data['fixedline_Report_dzongkhagWise'] ="";
         $page_data['fixedline_total'] ="";
         $page_data['year'] =$year;
        if($type=="fixedline"){
            $page_data['fixedline_Report_dzongkhagWise'] =$this->CommonModel->getfixedlineDetails($year,'getfixedlineDetails');
            $page_data['fixedline_total'] =$this->CommonModel->getfixedlinetotal($year,'getfixedlinetotal');
        }
        
        if($type=="fixedlinetotal"){
            
        }

        $this->load->view('graphComp/'.$page,$page_data);
    }
    function Subscriber_bmobile($page="",$type="",$year=""){
         $page_data['sub_bmoblie'] ="";
         $page_data['year'] =$year;
        if($type=="subscriber_b"){
            $page_data['sub_bmoblie'] =$this->CommonModel->getSubscriber_bmobileDetails($year,'getSubscriber_bmobileDetails');
            
        }
        $this->load->view('admin/'.$page,$page_data);
    }
 /**   function Erevenuexceldata($page="",$type="",$year=""){
        $page_data['Revenue_Report_all'] ="";
         $page_data['year'] =$year;
          if($type=="Revenuebefore"){
            $page_data[Revenue_Report_all] =$this->CommonModel->getRevenueallDetails($year,'getRevenueallDetails');
        }

    }**/


    function populateDependentDropDown($param1="",$param2=""){
        $allList="";
        header('Content-Type: application/json');
        $allList=$this->ApplicationModel->gettablehear($param1);
        echo json_encode($allList);
    }

/***
Fixed Line Data
****/

    function insertflexcelData($type=""){     
        require_once APPPATH.'third_party/PHPExcel.php';
        $this->excel = new PHPExcel();  
        $file_info = pathinfo($_FILES["fsubscriber"]["name"]);
        $file_directory = "uploads/attachments/".date("Y").'/'.date("M");
        if(!is_dir($file_directory)){
            mkdir($file_directory,0777,TRUE);
        }
        $new_file_name = $_FILES["fsubscriber"]["name"];
        move_uploaded_file($_FILES["fsubscriber"]["tmp_name"], $file_directory . $new_file_name);
        $file_type  = PHPExcel_IOFactory::identify($file_directory . $new_file_name);
        $objReader  = PHPExcel_IOFactory::createReader($file_type);
        $objPHPExcel = $objReader->load($file_directory . $new_file_name); 
        $sheet_data = $objPHPExcel->getActiveSheet()->toArray(null,true,true,true);    
        $Grand_Total=0;
        $rowcount=0;
        $isdata_exist=$this->CommonModel->checkdataAndDelete('t_subscriber_fl_excel',$this->input->post('Year'),$this->input->post('month'));
        foreach($sheet_data as $i=> $data) {
            if($i>4 && $i<25){
            $result = array(
                    'Year' => $this->input->post('Year'),
                    'Month' => $this->input->post('month'),
                    'Dzongkhag' => $data['B'],
                    'Jan' => $data['C'],
                    'Feb' => $data['D'],
                    'March' => $data['E'],
                    'Aprl' => $data['F'],
                    'May' => $data['G'],
                    'Jun' => $data['H'],
                    'July' => $data['I'],
                    'Aug' => $data['J'],
                    'Sep' => $data['K'],
                    'Oct' => $data['L'],
                    'Nov' => $data['M'],
                    'Dec' => $data['N'],
                    'User_Id' => $this->session->userdata('User_table_id'),
                    'Added_On' => date("Y-m-d"),                    
                );

                $this->CommonModel->do_insert('t_subscriber_fl_excel',$result);
            }
            if($i==25){ 
                if($this->input->post('month')==1){
                    $Grand_Total= $data['C'];  
                }
                if($this->input->post('month')==2){
                    $Grand_Total= $data['D']; 
                }
                if($this->input->post('month')==3){
                    $Grand_Total= $data['E']; 
                }
                if($this->input->post('month')==4){
                    $Grand_Total= $data['F']; 
                }
                if($this->input->post('month')==5){
                    $Grand_Total= $data['G']; 
                }
                if($this->input->post('month')==6){
                    $Grand_Total= $data['H']; 
                }
                if($this->input->post('month')==7){
                    $Grand_Total= $data['I']; 
                }
                if($this->input->post('month')==8){
                    $Grand_Total= $data['J']; 
                }
                if($this->input->post('month')==9){
                    $Grand_Total= $data['K']; 
                }
                if($this->input->post('month')==10){
                    $Grand_Total= $data['L']; 
                }
                if($this->input->post('month')==11){
                    $Grand_Total= $data['M']; 
                }
                if($this->input->post('month')==12){
                    $Grand_Total= $data['N']; 
                }
                 
            }
            
        }
        $result = array(
            'Year' => $this->input->post('Year'),
            'Month' => $this->input->post('month'),
            'Subscriber' => $Grand_Total,
            'User_Id' => $this->session->userdata('User_table_id'),
            'Added_On' => date("Y-m-d"),
        );
        $isdata_exist=$this->CommonModel->checkdataAndDelete('t_subscriber_fixed_line_main',$this->input->post('Year'),$this->input->post('month'));
        $this->CommonModel->do_insert('t_subscriber_fixed_line_main',$result);
        $page_data['messagefail']="";
        $page_data['message']="Details are updated.Thank you for using our system";
        $this->load->view('admin/acknowledgement', $page_data); 
        
    }

/***
Revenue
****/
function insertrevenueexcelData($type=""){   
  
        require_once APPPATH.'third_party/PHPExcel.php';
        $this->excel = new PHPExcel();  
        $file_info = pathinfo($_FILES["frevenue"]["name"]);
        $file_directory = "uploads/attachments/".date("Y").'/'.date("M");
        if(!is_dir($file_directory)){
            mkdir($file_directory,0777,TRUE);
        }
        $new_file_name = $_FILES["frevenue"]["name"];
        move_uploaded_file($_FILES["frevenue"]["tmp_name"], $file_directory . $new_file_name);
        $file_type  = PHPExcel_IOFactory::identify($file_directory . $new_file_name);
        $objReader  = PHPExcel_IOFactory::createReader($file_type);
        $objPHPExcel = $objReader->load($file_directory . $new_file_name); 
        $sheet_data = $objPHPExcel->getActiveSheet()->toArray(null,true,true,true);   
        $Grand_Total=0;
        $rowcount=0;
        $Mrc=0;
        $E_load=0;
        $In_And_Vas=0;
        $Online_App=0;
        $Inter_Connect=0;
        $International_Roming=0;
        $In_And_Vas_International=0;
        $Postpaid=0;
        $Prepaid=0;
        $Telephone_Service=0;
        $Int_ISD=0;
        $Producta=0;
        $Productb=0;
        $Other_Income=0;

        $Broad_Band=0;
        $a=0;
        $b=0;
        $c=0;
        $d=0;
        $Leased_line=0;
        $Domain_Name=0;
        $IPLC=0;
        $Domain_Name_int=0;
        $Leased_Line_int=0;
        $Contact_Center=0;
        $Data_Center=0;
        $Thuraya_Service=0;
        $EPR_Service=0;
        $Total_Revenue=0;
        $Overall_total_revenue=0;
        foreach($sheet_data as $i=> $data) {
            if($i>9){
                if($i==13){
                    if($this->input->post('month')==1){
                        $Mrc= $data['E'];  
                    }
                    if($this->input->post('month')==2){
                        $Mrc= $data['F']; 
                    }
                   if($this->input->post('month')==3){
                        $Mrc= $data['G'];  
                    }
                    if($this->input->post('month')==4){
                        $Mrc= $data['H']; 
                    }
                    if($this->input->post('month')==5){
                        $Mrc= $data['I'];  
                    }
                    if($this->input->post('month')==6){
                        $Mrc= $data['J']; 
                    }
                    if($this->input->post('month')==7){
                        $Mrc= $data['K'];  
                    }
                    if($this->input->post('month')==8){
                        $Mrc= $data['L']; 
                    }
                    if($this->input->post('month')==9){
                        $Mrc= $data['M'];  
                    }
                    if($this->input->post('month')==10){
                        $Mrc= $data['N']; 
                    }
                    if($this->input->post('month')==11){
                        $Mrc= $data['O'];  
                    }
                    if($this->input->post('month')==12){
                        $Mrc= $data['P']; 
                    }
                }
                if($i==15){
                    
                    if($this->input->post('month')==1){
                        $E_load= $data['E'];  
                    }
                    if($this->input->post('month')==2){
                        $E_load= $data['F']; 
                    }
                    
                }
                if($i==16){
                    if($this->input->post('month')==1){
                        $In_And_Vas= $data['E'];  
                    }
                    if($this->input->post('month')==2){
                        $In_And_Vas= $data['F']; 
                    }
                   
                }
                if($i==17 || $i==19 || $i==23){
                    if($this->input->post('month')==1){
                        $Online_App+= $data['E'];  
                    }
                    if($this->input->post('month')==2){
                        $Online_App+= $data['F']; 
                    }
                }
                if($i==18){
                    if($this->input->post('month')==1){
                        $Inter_Connect= $data['E'];  
                    }
                    if($this->input->post('month')==2){
                        $Inter_Connect= $data['F']; 
                    }
                }
                if($i==20){
                    if($this->input->post('month')==1){
                        $International_Roming= $data['E'];  
                    }
                    if($this->input->post('month')==2){
                        $International_Roming= $data['F']; 
                    }
                }
                if($i==21){
                    if($this->input->post('month')==1){
                        $In_And_Vas_International= $data['E'];  
                    }
                    if($this->input->post('month')==2){
                        $In_And_Vas_International= $data['F']; 
                    }
                }
                if($i==13){
                    if($this->input->post('month')==1){
                        $Postpaid= $data['E'];  
                    }
                    if($this->input->post('month')==2){
                        $Postpaid= $data['F']; 
                    }
                }
                if($i==24){
                    if($this->input->post('month')==1){
                        $Prepaid= $data['E'];  
                    }
                    if($this->input->post('month')==2){
                        $Prepaid= $data['F']; 
                    }
                }
                if($i==10){
                    if($this->input->post('month')==1){
                        $Telephone_Service= $data['E'];  
                    }
                    if($this->input->post('month')==2){
                        $Telephone_Service= $data['F']; 
                    }
                }
                if($i==11){
                    if($this->input->post('month')==1){
                        $Int_ISD= $data['E'];  
                    }
                    if($this->input->post('month')==2){
                        $Int_ISD= $data['F']; 
                    }
                }
                if($i==52){
                    if($this->input->post('month')==1){
                        $Producta= $data['E'];  
                    }
                    if($this->input->post('month')==2){
                        $Producta= $data['F']; 
                    }
                }
                if($i==55){
                    if($this->input->post('month')==1){
                        $Productb= $data['E'];  
                    }
                    if($this->input->post('month')==2){
                        $Productb= $data['F']; 
                    }
                }
                if($i==93){
                    if($this->input->post('month')==1){
                        $Other_Income= $data['E'];  
                    }
                    if($this->input->post('month')==2){
                        $Other_Income= $data['F']; 
                    }
                }
                if($i==25){
                    if($this->input->post('month')==1){
                        $a= $data['E'];  
                    }
                    if($this->input->post('month')==2){
                        $a= $data['F']; 
                    }
                }
                if($i==26){
                    if($this->input->post('month')==1){
                        $b= $data['E'];  
                    }
                    if($this->input->post('month')==2){
                        $b= $data['F']; 
                    }
                }
                if($i==34){
                    if($this->input->post('month')==1){
                        $c= $data['E'];  
                    }
                    if($this->input->post('month')==2){
                        $c= $data['F']; 
                    }
                }
                if($i==36){
                    if($this->input->post('month')==1){
                        $d= $data['E'];  
                    }
                    if($this->input->post('month')==2){
                        $d= $data['F']; 
                    }
                }
                if($i==27){
                    if($this->input->post('month')==1){
                        $Leased_line= $data['E'];  
                    }
                    if($this->input->post('month')==2){
                        $Leased_line= $data['F']; 
                    }
                }
                if($i==28){
                    if($this->input->post('month')==1){
                        $Domain_Name= $data['E'];  
                    }
                    if($this->input->post('month')==2){
                        $Domain_Name= $data['F']; 
                    }
                }
                if($i==31){
                    if($this->input->post('month')==1){
                        $IPLC= $data['E'];  
                    }
                    if($this->input->post('month')==2){
                        $IPLC= $data['F']; 
                    }
                }
                if($i==32){
                    if($this->input->post('month')==1){
                        $Domain_Name_int= $data['E'];  
                    }
                    if($this->input->post('month')==2){
                        $Domain_Name_int= $data['F']; 
                    }
                }
                if($i==33){
                    if($this->input->post('month')==1){
                        $Leased_Line_int= $data['E'];  
                    }
                    if($this->input->post('month')==2){
                        $Leased_Line_int= $data['F']; 
                    }
                }
                if($i==37){
                    if($this->input->post('month')==1){
                        $Contact_Center= $data['E'];  
                    }
                    if($this->input->post('month')==2){
                        $Contact_Center= $data['F']; 
                    }
                }
                if($i==39){
                    if($this->input->post('month')==1){
                        $Data_Center= $data['E'];  
                    }
                    if($this->input->post('month')==2){
                        $Data_Center= $data['F']; 
                    }
                }
                if($i==41){
                    if($this->input->post('month')==1){
                        $Thuraya_Service= $data['E'];  
                    }
                    if($this->input->post('month')==2){
                        $Thuraya_Service= $data['F']; 
                    }
                }
                if($i==40){
                    if($this->input->post('month')==1){
                        $EPR_Service= $data['E'];  
                    }
                    if($this->input->post('month')==2){
                        $EPR_Service= $data['F']; 
                    }
                }
                
                $crrmonth="";$currentdata="";
                if($this->input->post('month')==1){
                   $crrmonth= 'Jan'; $currentdata= $data['E'];  
                }
                if($this->input->post('month')==2){
                   $crrmonth= 'Feb'; $currentdata= $data['F']; 
                }
                $crrmonth="";$currentdata="";
                if($this->input->post('month')==3){
                   $crrmonth= 'Mar'; $currentdata= $data['G'];  
                }
                if($this->input->post('month')==4){
                   $crrmonth= 'Apr'; $currentdata= $data['H']; 
                }
                $crrmonth="";$currentdata="";
                if($this->input->post('month')==5){
                   $crrmonth= 'May'; $currentdata= $data['I'];  
                }
                if($this->input->post('month')==6){
                   $crrmonth= 'Jun'; $currentdata= $data['J']; 
                }
                $crrmonth="";$currentdata="";
                if($this->input->post('month')==7){
                   $crrmonth= 'July'; $currentdata= $data['K'];  
                }
                if($this->input->post('month')==8){
                   $crrmonth= 'Aug'; $currentdata= $data['L']; 
                }
                $crrmonth="";$currentdata="";
                if($this->input->post('month')==9){
                   $crrmonth= 'Sep'; $currentdata= $data['M'];  
                }
                if($this->input->post('month')==10){
                   $crrmonth= 'Oct'; $currentdata= $data['O']; 
                }
                $crrmonth="";$currentdata="";
                if($this->input->post('month')==11){
                   $crrmonth= 'Nov'; $currentdata= $data['P'];  
                }
                if($this->input->post('month')==12){
                   $crrmonth= 'Dec'; $currentdata= $data['Q']; 
                }
            $result = array(
                    'Year' => $this->input->post('Year'),
                    'Month' => $this->input->post('month'),
                    'Service_Revenue_Id' => $data['D'],
                    $crrmonth => $currentdata,
                    'User_Id' => $this->session->userdata('User_table_id'),
                    'Added_date' => date("Y-m-d"),                    
                );
                $this->CommonModel->do_insert('t_revenue_financial_excel',$result);
            }
        }


        $Prepaid=(int)str_replace("","",$Prepaid);
        //die($In_And_Vas_International.':'.$Postpaid.':'.$Prepaid);
          $Total_Revinueo= $Mrc+$E_load+$In_And_Vas+$Online_App+$Inter_Connect+$International_Roming+$In_And_Vas_International+$Postpaid+$Prepaid;
            $resultmo = array(
                    'Year' => $this->input->post('Year'),
                    'Month' => $this->input->post('month'),
                    'Mrc' => $Mrc,
                    'E_load' => $E_load,
                    'In_And_Vas' => $In_And_Vas,
                    'Online_App' => $Online_App,
                    'Inter_Connect' => $Inter_Connect,
                    'International_Roming' => $International_Roming,
                    'In_And_Vas_International'=>$In_And_Vas_International,
                    'Postpaid' => $Postpaid,
                    'Prepaid' => $Prepaid-$Postpaid,
                    'Total_Revinue' => $Total_Revinueo,
                    'User_Id' => $this->session->userdata('User_table_id'),
                    'Added_date' => date("Y-m-d"),                    
                );
                $this->CommonModel->do_insert('t_revenue_mobile_main',$resultmo);
                $pre_sub_mo=$this->CommonModel->mobprepaid($this->input->post('month'))->Prepaid_Total;
                $post_sub_mo=$this->CommonModel->mobprepaid($this->input->post('month'))->Post_Total;
                $ptotal= $Mrc+$E_load+$In_And_Vas+$Online_App+$In_And_Vas_International;
                $resultarpu = array(
                    'Year' => $this->input->post('Year'),
                    'Month' => $this->input->post('month'),
                    'Postpaid' => $Postpaid/($post_sub_mo-$pre_sub_mo),
                    'Prepaid' => $ptotal/$pre_sub_mo,
                    'User_Id' => $this->session->userdata('User_table_id'),
                    'Added_date' => date("Y-m-d"),                    
                );
                $this->CommonModel->do_insert('t_revenue_arpu_main',$resultarpu);


        $Total_Revenuetw= $Telephone_Service+$Int_ISD;
        $resultfixedline = array(
                    'Year' => $this->input->post('Year'),
                    'Month' => $this->input->post('month'),
                    'Telephone_Service' => $Telephone_Service,
                    'Int_ISD' => $Int_ISD,
                    'Total_Revenue' => $Total_Revenuetw,
                    'User_Id' => $this->session->userdata('User_table_id'),
                    'Added_date' => date("Y-m-d"),                    
                );
                $this->CommonModel->do_insert('t_revenue_fixed_line_main',$resultfixedline); 

        $Total_Revenuetr= $a+$b+$c+$d+$Leased_line+$Domain_Name+$IPLC+$Domain_Name_int+$Leased_Line_int+$Contact_Center+$Data_Center+$Thuraya_Service+$EPR_Service;    
        $resultispmain = array(
                    'Year' => $this->input->post('Year'),
                    'Month' => $this->input->post('month'),
                    'Broad_Band' => $a+$b+$c+$d,
                    'Leased_line' => $Leased_line,
                    'Domain_Name' => $Domain_Name,
                    'IPLC' => $IPLC,
                    'Domain_Name_int' => $Domain_Name_int,
                    'Leased_Line_int' => $Leased_Line_int,
                    'Contact_Center' => $Contact_Center,
                    'Data_Center' => $Data_Center,
                    'Thuraya_Service' => $Thuraya_Service,
                    'EPR_Service' => $EPR_Service,
                    'Total_Revenue' => $Total_Revenuetr,
                    'User_Id' => $this->session->userdata('User_table_id'),
                    'Added_date' => date("Y-m-d"),                    
                );
                $this->CommonModel->do_insert('t_revenue_isp_main',$resultispmain);

        $Other_Income=(int)str_replace(",","",$Other_Income);
        $Productb=(int)str_replace(",","",$Productb);
        
        $Total_Revenuef= $Other_Income+$Producta+$Productb;
        $resultothermain = array(
                    'Year' => $this->input->post('Year'),
                    'Month' => $this->input->post('month'),
                    'Sale_Of_Product' => $Producta+$Productb,
                    'Other_Income' => $Other_Income,
                    'Total_Revenue' => $Total_Revenuef,
                    'User_Id' => $this->session->userdata('User_table_id'),
                    'Added_date' => date("Y-m-d"),                    
                );
                $this->CommonModel->do_insert('t_revenue_other_main',$resultothermain);

        $Overall_total_revenue=$Total_Revenuef+$Total_Revenuetr+$Total_Revenuetw+$Total_Revinueo;
        $resultrevenueoverall = array(
                    'Year' => $this->input->post('Year'),
                    'Month' => $this->input->post('month'),
                    'Grand_Total' =>$Overall_total_revenue,
                    'User_Id' => $this->session->userdata('User_table_id'),
                    'Added_date' => date("Y-m-d"),                    
                );
                $this->CommonModel->do_insert('t_revenue_overall_main',$resultrevenueoverall);

        $page_data['messagefail']="";
        $page_data['message']="Details are updated.Thank you for using our system";
        $this->load->view('admin/acknowledgement', $page_data);


    }

/**
ISP insertisp bbosubscriber bbpesubscriber llsubscriber
**/
function insertisp($type=""){     
        require_once APPPATH.'third_party/PHPExcel.php';
        $this->excel = new PHPExcel();  
        $file_info = pathinfo($_FILES["bbosubscriber"]["name"]);
        $file_directory = "uploads/attachments/".date("Y").'/'.date("M");
        if(!is_dir($file_directory)){
            mkdir($file_directory,0777,TRUE);
        }
        $new_file_name = $_FILES["bbosubscriber"]["name"];
        move_uploaded_file($_FILES["bbosubscriber"]["tmp_name"], $file_directory . $new_file_name);
        $file_type  = PHPExcel_IOFactory::identify($file_directory . $new_file_name);
        $objReader  = PHPExcel_IOFactory::createReader($file_type);
        $objPHPExcel = $objReader->load($file_directory . $new_file_name);
        $sheet_data = $objPHPExcel->getActiveSheet()->toArray(null,true,true,true);
        $postpaid_cpunt=0;
        foreach($sheet_data as $i=> $data) {
            if($i>2){
                $postpaid_cpunt++;
                $result = array(
                    'Year' => $this->input->post('Year'),
                    'Month' => $this->input->post('month'),
                    'Domain' => $data['B'],
                    'Address' => $data['C'],
                    'Contact' => $data['D'],
                    'Customer_Id' => $data['E'],
                    'Service_No' => $data['F'],
                    'Status' => $data['G'],
                    'Package_Name' => $data['H'],
                    'User_Id' => $this->session->userdata('User_table_id'),
                    'Added_On' => date("Y-m-d"),                    
                );
                $this->CommonModel->do_insert('t_subscriber_bb_postpaid_isp_excel',$result);
            }
        }

        $disconnect1 = $_FILES["bbpesubscriber"]["name"];
        move_uploaded_file($_FILES["bbpesubscriber"]["tmp_name"], $file_directory . $disconnect1);
        $file_type1  = PHPExcel_IOFactory::identify($file_directory . $disconnect1);
        $objReader  = PHPExcel_IOFactory::createReader($file_type1);
        $objPHPExcel = $objReader->load($file_directory . $disconnect1);
        $disconnect_sheet_data = $objPHPExcel->getActiveSheet()->toArray(null,true,true,true);
        $prepaid_cpunt=0;
        foreach($disconnect_sheet_data as $i=> $data) {
            if($i>2){
                $prepaid_cpunt++;
                $result = array(
                    'Year' => $this->input->post('Year'),
                    'Month' => $this->input->post('month'),
                    'Name' => $data['B'],
                    'Customer_Group' => $data['C'],
                    'Domain' => $data['D'],
                    'Address' => $data['E'],
                    'Contact' => $data['F'],
                    'Service_No' => $data['G'],
                    'Status' => $data['H'],
                    'User_Id' => $this->session->userdata('User_table_id'),
                    'Added_On' => date("Y-m-d"),                    
                );                                   
                $this->CommonModel->do_insert('t_subscriber_bb_prepaid_isp_excel',$result);
            }
        }
        
        $disconnect2 = $_FILES["llsubscriber"]["name"];
        move_uploaded_file($_FILES["llsubscriber"]["tmp_name"], $file_directory . $disconnect2);
        $file_type2  = PHPExcel_IOFactory::identify($file_directory . $disconnect2);
        $objReader  = PHPExcel_IOFactory::createReader($file_type2);
        $objPHPExcel = $objReader->load($file_directory . $disconnect2);
        $disconnectper_sheet_data = $objPHPExcel->getActiveSheet()->toArray(null,true,true,true);
        $Rowtotalpre=0;
        foreach($disconnectper_sheet_data as $i=> $data) {
            if($i>2){
                               
               $result = array(
                    'Year' => $this->input->post('Year'),
                    'Month' => $this->input->post('month'),
                    'Customer_Id' => $data['A'],
                    'Customer_Code' => $data['B'],
                    'Customer_Type' => $data['C'],
                    'CS_Activated' => $data['D'],
                    'PRG_Name' => $data['E'],
                    'CC_State' => $data['F'],
                    'CC_City' => $data['G'],
                    'CC_Name' => $data['H'],
                    'CC_SMS_No' => $data['I'],
                    'User_Id' => $this->session->userdata('User_table_id'),
                    'Added_Date' => date("Y-m-d"),                    
                );
                $this->CommonModel->do_insert('t_subscriber_leaseline_isp_excel',$result);
            }
        }

        $result = array(
            'Year' => $this->input->post('Year'),
            'Month' => $this->input->post('month'),
            'Broad_Band_count' => $postpaid_cpunt+$prepaid_cpunt,
            'Lease_Line_Count' => $this->CommonModel->getcount()->lcoaunt,
            'LTE_Broad_Band_count' => $this->input->post('lte'),
            'Data_Center_Count' => $this->input->post('data'),
            'Contact_Center_Count' =>$this->input->post('contact'),
            'ERP_Service_Count' => $this->input->post('erp'),
            'Fleet_Management_Count' => $this->input->post('fleet'),
            'User_Id' => $this->session->userdata('User_table_id'),
            'Added_Date' => date("Y-m-d"),                    
        );
        $this->CommonModel->do_insert('t_subscriber_isp_main',$result);

        $page_data['messagefail']="";
        $page_data['message']="Details are inserted. Thank you for using our system";
        $this->load->view('admin/acknowledgement', $page_data); 
    }

    function insertmobile23user(){
        $file_directory = "uploads/attachments/".date("Y").'/'.date("M");
        if(!is_dir($file_directory)){
            mkdir($file_directory,0777,TRUE);
        }
        $attache2g = $_FILES["attache2g"]["name"];
        $attached4g = $_FILES["attached4g"]["name"];
         move_uploaded_file($_FILES["attache2g"]["tmp_name"], $file_directory . $attache2g);
        move_uploaded_file($_FILES["attached4g"]["tmp_name"], $file_directory . $attached4g);
        $result = array(
            'Year' => $this->input->post('Year'),
            'Month' => $this->input->post('month'),
            '2_G_User' =>  $this->input->post('twog'),
            '3_G_User' =>   $this->db->get_where('t_subscriber_bmobile_main',array('Month'=>$this->input->post('month')))->row()->Total_Registered+($this->input->post('twog')+$this->input->post('fourg')),
            '4_G_User' =>  $this->input->post('fourg'),
            'Attachment_2_G' =>$attache2g,
            'Attachment_4_G' =>$attached4g,
            'User_Id' =>  $this->session->userdata('User_table_id'),         
            'Added_Date' => date("Y-m-d"),                 
        );
        $this->CommonModel->do_insert('t_subscriber_mobile_data_user_main',$result);
        $page_data['messagefail']="";
        $page_data['message']="Details are inserted. Thank you for using our system";
        $this->load->view('admin/acknowledgement', $page_data); 
    }
    function insertvas($id=""){
         $result = array(
            'Year' => $this->input->post('Year'),
            'Month' => $this->input->post('month'),
            'B_Wallet_New' =>  $this->input->post('bnew'),
            'B_Wallet_Total' =>  $this->input->post('bwt'),
            'B_Wallet_Towa' =>$this->input->post('btwerwe'),
            'User_Id' => $this->session->userdata('User_table_id'),           
            'Added_Date' => date("Y-m-d"),                 
        );
        $this->CommonModel->do_insert('t_subscriber_vas_main',$result);
        $page_data['messagefail']="";
        $page_data['message']="Details are inserted. Thank you for using our system";
        $this->load->view('admin/acknowledgement', $page_data); 
    }

    function listVivo($param=""){
        $page_data['message']="Valid";
        if($param=="add"){
            if($this->input->post('year')!=""){
                $chekrec=$this->CommonModel->checkData($this->input->post('year'),$this->input->post('month'));
                if($chekrec==""){
                    $result = array(
                        'Year' => $this->input->post('year'),
                        'Month' => $this->input->post('month'),
                        'Achievement' =>  $this->input->post('achievement'),
                        'Update_by' =>  $this->session->userdata('Full_Name'),
                        'Updated_On' => date("Y-m-d"),                 
                    );
                    if($this->input->post('actiontype')=="add"){
                        $this->CommonModel->do_insert('t_vivo_achievement',$result);
                    }
                    else{
                        $this->db->where('Id',  $this->input->post('updateId'));
                        $this->db->update('t_vivo_achievement`', $result);
                    }
                }
                else{
                    $page_data['message']="Your record for year: ".$this->input->post('year')." and month: ".$this->input->post('month')." is already recorded" ;
                }
            }
        }   
        $page_data['vivoList']= $this->db->get('t_vivo_achievement')->result_array();
        $this->load->view('admin/Traget/vivoAchievement',$page_data);
    }
    
}

