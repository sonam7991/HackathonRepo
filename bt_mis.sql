/*
SQLyog Ultimate v8.82 
MySQL - 5.0.86-community-nt : Database - bt_mis
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`bt_mis` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `bt_mis`;

/*Table structure for table `t_category_master` */

DROP TABLE IF EXISTS `t_category_master`;

CREATE TABLE `t_category_master` (
  `Id` int(5) NOT NULL auto_increment,
  `Category_Name` varchar(200) default NULL,
  `Active_Status` char(1) default 'Y',
  PRIMARY KEY  (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `t_category_master` */

insert  into `t_category_master`(`Id`,`Category_Name`,`Active_Status`) values (1,'Subscriber Front','Y'),(2,'Revenue Front','Y');

/*Table structure for table `t_revenue_arpu_main` */

DROP TABLE IF EXISTS `t_revenue_arpu_main`;

CREATE TABLE `t_revenue_arpu_main` (
  `Id` int(5) NOT NULL auto_increment,
  `Month` int(2) default NULL,
  `Prepaid` varchar(10) default NULL,
  `Postpaid` varchar(10) default NULL,
  `User_Id` int(5) default NULL,
  `Added_Date` date default NULL,
  PRIMARY KEY  (`Id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `t_revenue_arpu_main` */

/*Table structure for table `t_revenue_financial_excel` */

DROP TABLE IF EXISTS `t_revenue_financial_excel`;

CREATE TABLE `t_revenue_financial_excel` (
  `Id` int(5) NOT NULL auto_increment,
  `Month` int(2) default NULL,
  `Service_Revenue_Id` int(3) default NULL,
  `Jan` varchar(10) default NULL,
  `Feb` varchar(10) default NULL,
  `Mar` varchar(10) default NULL,
  `Apr` varchar(10) default NULL,
  `May` varchar(10) default NULL,
  `Jun` varchar(10) default NULL,
  `July` varchar(10) default NULL,
  `Aug` varchar(10) default NULL,
  `Sep` varchar(10) default NULL,
  `Oct` varchar(10) default NULL,
  `Nov` varchar(10) default NULL,
  `Dec` varchar(10) default NULL,
  `User_Id` int(2) default NULL,
  `Added_date` date default NULL,
  PRIMARY KEY  (`Id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `t_revenue_financial_excel` */

/*Table structure for table `t_revenue_fixed_line_main` */

DROP TABLE IF EXISTS `t_revenue_fixed_line_main`;

CREATE TABLE `t_revenue_fixed_line_main` (
  `Id` int(5) NOT NULL auto_increment,
  `Month` int(2) default NULL,
  `Telephone_Service` varchar(10) default NULL,
  `Int_ISD` varchar(10) default NULL,
  `Total_Revenue` varchar(10) default NULL,
  `User_Id` int(2) default NULL,
  `Added_Date` date default NULL,
  PRIMARY KEY  (`Id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `t_revenue_fixed_line_main` */

/*Table structure for table `t_revenue_isp_main` */

DROP TABLE IF EXISTS `t_revenue_isp_main`;

CREATE TABLE `t_revenue_isp_main` (
  `Id` int(5) NOT NULL auto_increment,
  `Month` int(2) default NULL,
  `Broad_Band` varchar(10) default NULL,
  `Leased_line` varchar(10) default NULL,
  `Domain_Name` varchar(10) default NULL,
  `IPLC` varchar(10) default NULL,
  `Domain_Name_int` varchar(10) default NULL,
  `Leased_Line_int` varchar(10) default NULL,
  `Contact_Center` varchar(10) default NULL,
  `Data_Center` varchar(10) default NULL,
  `Thuraya_Service` varchar(10) default NULL,
  `EPR_Service` varchar(10) default NULL,
  `Total_Revenue` varchar(10) default NULL,
  `User_Id` int(5) default NULL,
  `Added_Date` date default NULL,
  PRIMARY KEY  (`Id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `t_revenue_isp_main` */

/*Table structure for table `t_revenue_mobile_main` */

DROP TABLE IF EXISTS `t_revenue_mobile_main`;

CREATE TABLE `t_revenue_mobile_main` (
  `Id` int(5) NOT NULL auto_increment,
  `Month` int(2) default NULL,
  `Mrc` varchar(10) default NULL,
  `E_load` varchar(10) default NULL,
  `In_And_Vas` varchar(10) default NULL,
  `Online_App` varchar(10) default NULL,
  `Inter_Connect` varchar(10) default NULL,
  `International_Roming` varchar(10) default NULL,
  `In_And_Vas_International` varchar(10) default NULL,
  `Prepaid` varchar(10) default NULL,
  `Postpaid` varchar(10) default NULL,
  `Total_Revinue` varchar(10) default NULL,
  `User_Id` int(2) default NULL,
  `Added_Date` date default NULL,
  PRIMARY KEY  (`Id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `t_revenue_mobile_main` */

/*Table structure for table `t_revenue_other_main` */

DROP TABLE IF EXISTS `t_revenue_other_main`;

CREATE TABLE `t_revenue_other_main` (
  `Id` int(5) NOT NULL auto_increment,
  `Month` int(2) default NULL,
  `Sale_Of_Product` varchar(10) default NULL,
  `Other_Income` varchar(10) default NULL,
  `Total_Revenue` varchar(10) default NULL,
  `User_Id` int(5) default NULL,
  `Added_Date` date default NULL,
  PRIMARY KEY  (`Id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `t_revenue_other_main` */

/*Table structure for table `t_revenue_overall_main` */

DROP TABLE IF EXISTS `t_revenue_overall_main`;

CREATE TABLE `t_revenue_overall_main` (
  `Id` int(5) NOT NULL auto_increment,
  `Month` int(2) default NULL,
  `Grand_Total` varchar(10) default NULL,
  `User_Id` int(2) default NULL,
  `Added_Date` date default NULL,
  PRIMARY KEY  (`Id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `t_revenue_overall_main` */

/*Table structure for table `t_role_master` */

DROP TABLE IF EXISTS `t_role_master`;

CREATE TABLE `t_role_master` (
  `Id` int(5) NOT NULL auto_increment,
  `Role_Name` varchar(200) default NULL,
  `Role_Status` char(1) default 'Y',
  PRIMARY KEY  (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `t_role_master` */

insert  into `t_role_master`(`Id`,`Role_Name`,`Role_Status`) values (1,'Admin','Y'),(2,'Marketing Division','Y'),(3,'Head','Y');

/*Table structure for table `t_sub_category_master` */

DROP TABLE IF EXISTS `t_sub_category_master`;

CREATE TABLE `t_sub_category_master` (
  `Id` int(5) NOT NULL auto_increment,
  `Category_Id` int(5) default NULL,
  `Sub_Category_Name` varchar(200) default NULL,
  `Active_Status` char(1) default 'Y',
  PRIMARY KEY  (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

/*Data for the table `t_sub_category_master` */

insert  into `t_sub_category_master`(`Id`,`Category_Id`,`Sub_Category_Name`,`Active_Status`) values (1,1,'B-Mobile','Y'),(2,1,'ISP','Y'),(3,1,'VAS','Y'),(4,1,'Mobile Data User','Y'),(5,1,'Fixed Line','Y'),(6,2,'Mobile','Y'),(7,2,'ISP','Y'),(8,2,'Fixed Line','Y'),(9,2,'Others','Y'),(10,2,'ARPU','Y');

/*Table structure for table `t_subscriber_base_disconnect_excel` */

DROP TABLE IF EXISTS `t_subscriber_base_disconnect_excel`;

CREATE TABLE `t_subscriber_base_disconnect_excel` (
  `Id` int(5) NOT NULL auto_increment,
  `Month` int(2) default NULL,
  `File_Type` varchar(20) default NULL,
  `Name` varchar(200) default NULL,
  `Jan` varchar(10) default NULL,
  `Feb` varchar(10) default NULL,
  `Mar` varchar(10) default NULL,
  `Apr` varchar(10) default NULL,
  `May` varchar(10) default NULL,
  `June` varchar(10) default NULL,
  `July` varchar(10) default NULL,
  `Aug` varchar(10) default NULL,
  `Sep` varchar(10) default NULL,
  `Oct` varchar(10) default NULL,
  `Nov` varchar(10) default NULL,
  `Dec` varchar(10) default NULL,
  `UserId` int(5) default NULL,
  `Imported_Date` date default NULL,
  PRIMARY KEY  (`Id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `t_subscriber_base_disconnect_excel` */

/*Table structure for table `t_subscriber_bb_postpaid_isp_excel` */

DROP TABLE IF EXISTS `t_subscriber_bb_postpaid_isp_excel`;

CREATE TABLE `t_subscriber_bb_postpaid_isp_excel` (
  `Id` int(5) NOT NULL auto_increment,
  `Month` int(2) default NULL,
  `Domain` varchar(200) default NULL,
  `Address` tinytext,
  `Contact` varchar(100) default NULL,
  `Customer_Code` varchar(100) default NULL,
  `Customer_Id` varchar(20) default NULL,
  `Service_No` varchar(100) default NULL,
  `Status` varchar(100) default NULL,
  `Package_Name` varchar(50) default NULL,
  `User_Id` int(2) default NULL,
  `Added_On` date default NULL,
  PRIMARY KEY  (`Id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `t_subscriber_bb_postpaid_isp_excel` */

/*Table structure for table `t_subscriber_bb_prepaid_isp_excel` */

DROP TABLE IF EXISTS `t_subscriber_bb_prepaid_isp_excel`;

CREATE TABLE `t_subscriber_bb_prepaid_isp_excel` (
  `Id` int(5) NOT NULL auto_increment,
  `Month` int(2) default NULL,
  `Name` varchar(200) default NULL,
  `Customer_Group` varchar(100) default NULL,
  `Domain` varchar(100) default NULL,
  `Address` text,
  `Contact` varchar(20) default NULL,
  `Customer_Code` varchar(100) default NULL,
  `Service_No` varchar(100) default NULL,
  `Status` varchar(50) default NULL,
  `User_Id` int(2) default NULL,
  `Added_On` date default NULL,
  PRIMARY KEY  (`Id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `t_subscriber_bb_prepaid_isp_excel` */

/*Table structure for table `t_subscriber_bmobile_excel` */

DROP TABLE IF EXISTS `t_subscriber_bmobile_excel`;

CREATE TABLE `t_subscriber_bmobile_excel` (
  `Id` int(5) NOT NULL auto_increment,
  `Year` int(11) default NULL,
  `Month` int(2) default NULL,
  `File_Date` varchar(20) default NULL,
  `Pre_Active` varchar(10) default NULL,
  `Pre_Grace` varchar(10) default NULL,
  `Pre_Total_Registered` varchar(10) default NULL,
  `Post_Active` varchar(10) default NULL,
  `Post_Grace` varchar(10) default NULL,
  `Post_Total_Registered` varchar(10) default NULL,
  `Total_Active` varchar(10) default NULL,
  `Total_Grace` varchar(10) default NULL,
  `Total_Registered` varchar(10) default NULL,
  `User_Id` int(5) default NULL,
  `Added_Date` date default NULL,
  PRIMARY KEY  (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=latin1;

/*Data for the table `t_subscriber_bmobile_excel` */

insert  into `t_subscriber_bmobile_excel`(`Id`,`Year`,`Month`,`File_Date`,`Pre_Active`,`Pre_Grace`,`Pre_Total_Registered`,`Post_Active`,`Post_Grace`,`Post_Total_Registered`,`Total_Active`,`Total_Grace`,`Total_Registered`,`User_Id`,`Added_Date`) values (1,2020,1,'1-Aug-19','20000','1000','21000','1500','400','1900','21500','1400',NULL,1,'2020-02-01'),(2,2020,1,'2-Aug-19','20100','990','21090','1600','380','1980','21700','1370',NULL,1,'2020-02-01'),(3,2020,1,'3-Aug-19','20200','980','21180','1700','360','2060','21900','1340',NULL,1,'2020-02-01'),(4,2020,1,'4-Aug-19','20300','970','21270','1800','340','2140','22100','1310',NULL,1,'2020-02-01'),(5,2020,1,'5-Aug-19','20400','960','21360','1900','320','2220','22300','1280',NULL,1,'2020-02-01'),(6,2020,1,'6-Aug-19','20500','950','21450','2000','300','2300','22500','1250',NULL,1,'2020-02-01'),(7,2020,1,'7-Aug-19','20600','940','21540','2100','280','2380','22700','1220',NULL,1,'2020-02-01'),(8,2020,1,'8-Aug-19','20700','930','21630','2200','260','2460','22900','1190',NULL,1,'2020-02-01'),(9,2020,1,'9-Aug-19','20800','920','21720','2300','240','2540','23100','1160',NULL,1,'2020-02-01'),(10,2020,1,'10-Aug-19','20900','910','21810','2400','220','2620','23300','1130',NULL,1,'2020-02-01'),(11,2020,1,'11-Aug-19','21000','900','21900','2500','200','2700','23500','1100',NULL,1,'2020-02-01'),(12,2020,1,'12-Aug-19','21100','890','21990','2600','180','2780','23700','1070',NULL,1,'2020-02-01'),(13,2020,1,'13-Aug-19','21200','880','22080','2700','160','2860','23900','1040',NULL,1,'2020-02-01'),(14,2020,1,'14-Aug-19','21300','870','22170','2800','140','2940','24100','1010',NULL,1,'2020-02-01'),(15,2020,1,'15-Aug-19','21400','860','22260','2900','120','3020','24300','980',NULL,1,'2020-02-01'),(16,2020,1,'16-Aug-19','21500','850','22350','3000','100','3100','24500','950',NULL,1,'2020-02-01'),(17,2020,1,'17-Aug-19','21600','840','22440','3100','80','3180','24700','920',NULL,1,'2020-02-01'),(18,2020,1,'18-Aug-19','21700','830','22530','3200','60','3260','24900','890',NULL,1,'2020-02-01'),(19,2020,1,'19-Aug-19','21800','820','22620','3300','40','3340','25100','860',NULL,1,'2020-02-01'),(20,2020,1,'20-Aug-19','21900','810','22710','3400','20','3420','25300','830',NULL,1,'2020-02-01'),(21,2020,1,'21-Aug-19','22000','800','22800','3500','0','3500','25500','800',NULL,1,'2020-02-01'),(22,2020,1,'22-Aug-19','22100','790','22890','3600','-20','3580','25700','770',NULL,1,'2020-02-01'),(23,2020,1,'23-Aug-19','22200','780','22980','3700','-40','3660','25900','740',NULL,1,'2020-02-01'),(24,2020,1,'24-Aug-19','22300','770','23070','3800','-60','3740','26100','710',NULL,1,'2020-02-01'),(25,2020,1,'25-Aug-19','22400','760','23160','3900','-80','3820','26300','680',NULL,1,'2020-02-01'),(26,2020,1,'26-Aug-19','22500','750','23250','4000','-100','3900','26500','650',NULL,1,'2020-02-01'),(27,2020,1,'27-Aug-19','22600','740','23340','4100','-120','3980','26700','620',NULL,1,'2020-02-01'),(28,2020,1,'28-Aug-19','22700','730','23430','4200','-140','4060','26900','590',NULL,1,'2020-02-01'),(29,2020,1,'29-Aug-19','22800','720','23520','4300','-160','4140','27100','560',NULL,1,'2020-02-01'),(30,2020,1,'30-Aug-19','22900','710','23610','4400','-180','4220','27300','530',NULL,1,'2020-02-01'),(31,2020,1,'31-Aug-19','23000','700','23700','4500','-200','4300','27500','500',NULL,1,'2020-02-01');

/*Table structure for table `t_subscriber_bmobile_main` */

DROP TABLE IF EXISTS `t_subscriber_bmobile_main`;

CREATE TABLE `t_subscriber_bmobile_main` (
  `Id` int(5) NOT NULL auto_increment,
  `Year` int(5) default NULL,
  `Month` int(2) default NULL,
  `Prepaid_Active` varchar(10) default NULL,
  `Prepaid_Passive` varchar(10) default NULL,
  `Prepaid_Total` varchar(10) default NULL,
  `Post_Active` varchar(10) default NULL,
  `Post_Passive` varchar(10) default NULL,
  `Post_Total` varchar(10) default NULL,
  `Total_Active` varchar(10) default NULL,
  `Total_Registered` varchar(10) default NULL,
  `Disconnected` varchar(10) default NULL,
  `Churn_Rate` varchar(10) default NULL,
  `HLR` varchar(10) default NULL,
  `HLR_Attachment` varchar(200) default NULL,
  `Added_Date` date default NULL,
  `User_Id` int(5) default NULL,
  PRIMARY KEY  (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `t_subscriber_bmobile_main` */

insert  into `t_subscriber_bmobile_main`(`Id`,`Year`,`Month`,`Prepaid_Active`,`Prepaid_Passive`,`Prepaid_Total`,`Post_Active`,`Post_Passive`,`Post_Total`,`Total_Active`,`Total_Registered`,`Disconnected`,`Churn_Rate`,`HLR`,`HLR_Attachment`,`Added_Date`,`User_Id`) values (1,2020,1,'21500','850','22350','3000','100','3100','24500',NULL,NULL,NULL,'123',NULL,'2020-02-01',0);

/*Table structure for table `t_subscriber_fixed_line_main` */

DROP TABLE IF EXISTS `t_subscriber_fixed_line_main`;

CREATE TABLE `t_subscriber_fixed_line_main` (
  `Id` int(5) NOT NULL auto_increment,
  `Year` int(5) default NULL,
  `Month` int(2) default NULL,
  `Subscriber` varchar(100) default NULL,
  `User_Id` int(5) default NULL,
  `Added_On` date default NULL,
  PRIMARY KEY  (`Id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `t_subscriber_fixed_line_main` */

/*Table structure for table `t_subscriber_fl_excel` */

DROP TABLE IF EXISTS `t_subscriber_fl_excel`;

CREATE TABLE `t_subscriber_fl_excel` (
  `Id` int(5) NOT NULL auto_increment,
  `Year` int(5) default NULL,
  `Month` int(2) default NULL,
  `Dzongkhag` varchar(50) default NULL,
  `Jan` varchar(10) default NULL,
  `Feb` varchar(10) default NULL,
  `March` varchar(10) default NULL,
  `Aprl` varchar(10) default NULL,
  `May` varchar(10) default NULL,
  `Jun` varchar(10) default NULL,
  `July` varchar(10) default NULL,
  `Aug` varchar(10) default NULL,
  `Sep` varchar(10) default NULL,
  `Oct` varchar(10) default NULL,
  `Nov` varchar(10) default NULL,
  `Dec` varchar(10) default NULL,
  `User_Id` int(2) default NULL,
  `Added_On` date default NULL,
  PRIMARY KEY  (`Id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `t_subscriber_fl_excel` */

/*Table structure for table `t_subscriber_isp_main` */

DROP TABLE IF EXISTS `t_subscriber_isp_main`;

CREATE TABLE `t_subscriber_isp_main` (
  `Id` int(5) NOT NULL auto_increment,
  `Month` int(2) default NULL,
  `Broad_Band_count` varchar(10) default NULL,
  `LTE_Broad_Band_count` varchar(10) default NULL,
  `Lease_Line_Count` varchar(10) default NULL,
  `Data_Center_Count` varchar(10) default NULL,
  `Contact_Center_Count` varchar(10) default NULL,
  `ERP_Service_Count` varchar(10) default NULL,
  `Fleet_Management_Count` varchar(10) default NULL,
  `User_Id` int(5) default NULL,
  `Added_Date` date default NULL,
  PRIMARY KEY  (`Id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `t_subscriber_isp_main` */

/*Table structure for table `t_subscriber_leaseline_isp_excel` */

DROP TABLE IF EXISTS `t_subscriber_leaseline_isp_excel`;

CREATE TABLE `t_subscriber_leaseline_isp_excel` (
  `Id` int(5) NOT NULL auto_increment,
  `Month` int(2) default NULL,
  `Customer_Id` varchar(100) default NULL,
  `Customer_Code` varchar(100) default NULL,
  `Customer_Type` varchar(100) default NULL,
  `CS_Activated` varchar(100) default NULL,
  `PRG_Name` varchar(100) default NULL,
  `CC_State` varchar(100) default NULL,
  `CC_City` varchar(100) default NULL,
  `CC_Name` varchar(100) default NULL,
  `CC_SMS_No` varchar(100) default NULL,
  `User_Id` int(5) default NULL,
  `Added_Date` date default NULL,
  PRIMARY KEY  (`Id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `t_subscriber_leaseline_isp_excel` */

/*Table structure for table `t_subscriber_mobile_data_user_main` */

DROP TABLE IF EXISTS `t_subscriber_mobile_data_user_main`;

CREATE TABLE `t_subscriber_mobile_data_user_main` (
  `Id` int(5) NOT NULL auto_increment,
  `2_G_User` varchar(10) default NULL,
  `3_G_User` varchar(10) default NULL,
  `4_G_User` varchar(10) default NULL,
  `Attachment_2_G` varchar(200) default NULL,
  `Attachment_4_G` varchar(200) default NULL,
  `Months` int(2) default NULL,
  `User_Id` int(5) default NULL,
  `Added_Date` date default NULL,
  PRIMARY KEY  (`Id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `t_subscriber_mobile_data_user_main` */

/*Table structure for table `t_subscriber_vas_main` */

DROP TABLE IF EXISTS `t_subscriber_vas_main`;

CREATE TABLE `t_subscriber_vas_main` (
  `Id` int(5) NOT NULL auto_increment,
  `Month` int(2) default NULL,
  `B_Wallet_New` varchar(10) default NULL,
  `B_Wallet_Total` varchar(10) default NULL,
  `B_Wallet_Towa` varchar(10) default NULL,
  `User_Id` int(2) default NULL,
  `Added_Date` date default NULL,
  PRIMARY KEY  (`Id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `t_subscriber_vas_main` */

/*Table structure for table `t_user_details` */

DROP TABLE IF EXISTS `t_user_details`;

CREATE TABLE `t_user_details` (
  `Id` int(5) NOT NULL auto_increment,
  `User_Id` varchar(200) default NULL,
  `Password` varchar(200) default NULL,
  `User_Status` char(1) default 'Y',
  `CID` varchar(11) default NULL,
  `Full_Name` varchar(200) default NULL,
  `Contact_Number` varchar(8) default NULL,
  `Role_Id` int(5) default NULL,
  `Image_Name` varchar(200) default NULL,
  PRIMARY KEY  (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

/*Data for the table `t_user_details` */

insert  into `t_user_details`(`Id`,`User_Id`,`Password`,`User_Status`,`CID`,`Full_Name`,`Contact_Number`,`Role_Id`,`Image_Name`) values (1,'admin','admin','Y','12312312312','Admin Name','12312312',1,'acknowledgement.JPG'),(2,'nksdjfnb','123','Y','123123','sdkfjhg','123123',2,NULL),(8,'user','123','N','123123','Full Nmae','123123',3,NULL);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
