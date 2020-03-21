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

/*Table structure for table `t_month_master` */

DROP TABLE IF EXISTS `t_month_master`;

CREATE TABLE `t_month_master` (
  `Id` int(5) NOT NULL auto_increment,
  `Month` varchar(200) default NULL,
  PRIMARY KEY  (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

/*Data for the table `t_month_master` */

insert  into `t_month_master`(`Id`,`Month`) values (1,'January'),(2,'Febarury'),(3,'March'),(4,'April'),(5,'May'),(6,'June'),(7,'July'),(8,'August'),(9,'September'),(10,'October'),(11,'November'),(12,'December ');

/*Table structure for table `t_revenue_arpu_main` */

DROP TABLE IF EXISTS `t_revenue_arpu_main`;

CREATE TABLE `t_revenue_arpu_main` (
  `Id` int(5) NOT NULL auto_increment,
  `Year` int(5) default NULL,
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
  `Year` int(5) default NULL,
  `Month` int(2) default NULL,
  `Service_Revenue_Id` varchar(200) default NULL,
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

/*Table structure for table `t_revenue_financial_excel_before` */

DROP TABLE IF EXISTS `t_revenue_financial_excel_before`;

CREATE TABLE `t_revenue_financial_excel_before` (
  `Id` int(5) NOT NULL auto_increment,
  `Year` int(5) default NULL,
  `Month` int(2) default NULL,
  `Service_Revenue_Id` varchar(200) default NULL,
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

/*Data for the table `t_revenue_financial_excel_before` */

/*Table structure for table `t_revenue_fixed_line_main` */

DROP TABLE IF EXISTS `t_revenue_fixed_line_main`;

CREATE TABLE `t_revenue_fixed_line_main` (
  `Id` int(5) NOT NULL auto_increment,
  `Year` int(5) default NULL,
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
  `Year` int(5) default NULL,
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
  `Year` int(5) default NULL,
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
  `Year` int(5) default NULL,
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
  `Year` int(5) default NULL,
  `Month` int(2) default NULL,
  `Grand_Total` varchar(10) default NULL,
  `User_Id` int(2) default NULL,
  `Added_Date` date default NULL,
  PRIMARY KEY  (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

/*Data for the table `t_revenue_overall_main` */

insert  into `t_revenue_overall_main`(`Id`,`Year`,`Month`,`Grand_Total`,`User_Id`,`Added_Date`) values (1,2020,1,'23',NULL,NULL),(2,2020,2,'200',12,NULL),(3,2020,3,'100',12,NULL),(4,2020,4,'52',11,NULL),(5,2019,1,'29',NULL,NULL),(6,2019,2,'36',NULL,NULL),(7,2019,9,'45',NULL,NULL);

/*Table structure for table `t_role_master` */

DROP TABLE IF EXISTS `t_role_master`;

CREATE TABLE `t_role_master` (
  `Id` int(5) NOT NULL auto_increment,
  `Role_Name` varchar(200) default NULL,
  `Role_Status` char(1) default 'Y',
  PRIMARY KEY  (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `t_role_master` */

insert  into `t_role_master`(`Id`,`Role_Name`,`Role_Status`) values (1,'Admin','Y'),(2,'Marketing','Y'),(3,'Boss','Y');

/*Table structure for table `t_sub_category_master` */

DROP TABLE IF EXISTS `t_sub_category_master`;

CREATE TABLE `t_sub_category_master` (
  `Id` int(5) NOT NULL auto_increment,
  `Category_Id` int(5) default NULL,
  `Sub_Category_Name` varchar(200) default NULL,
  `Active_Status` char(1) default 'Y',
  PRIMARY KEY  (`Id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `t_sub_category_master` */

/*Table structure for table `t_subscriber_base_disconnect_excel` */

DROP TABLE IF EXISTS `t_subscriber_base_disconnect_excel`;

CREATE TABLE `t_subscriber_base_disconnect_excel` (
  `Id` int(5) NOT NULL auto_increment,
  `Year` int(5) default NULL,
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
  `User_Id` int(5) default NULL,
  `Added_Date` date default NULL,
  PRIMARY KEY  (`Id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `t_subscriber_base_disconnect_excel` */

/*Table structure for table `t_subscriber_bb_postpaid_isp_excel` */

DROP TABLE IF EXISTS `t_subscriber_bb_postpaid_isp_excel`;

CREATE TABLE `t_subscriber_bb_postpaid_isp_excel` (
  `Id` int(5) NOT NULL auto_increment,
  `Year` int(5) default NULL,
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
  `Year` int(5) default NULL,
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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `t_subscriber_bmobile_excel` */

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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `t_subscriber_bmobile_main` */

insert  into `t_subscriber_bmobile_main`(`Id`,`Year`,`Month`,`Prepaid_Active`,`Prepaid_Passive`,`Prepaid_Total`,`Post_Active`,`Post_Passive`,`Post_Total`,`Total_Active`,`Total_Registered`,`Disconnected`,`Churn_Rate`,`HLR`,`HLR_Attachment`,`Added_Date`,`User_Id`) values (1,2020,1,NULL,NULL,NULL,NULL,NULL,NULL,'2000',NULL,NULL,NULL,NULL,NULL,NULL,NULL),(2,2029,2,NULL,NULL,NULL,NULL,NULL,NULL,'6521',NULL,NULL,NULL,NULL,NULL,NULL,NULL);

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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `t_subscriber_fixed_line_main` */

insert  into `t_subscriber_fixed_line_main`(`Id`,`Year`,`Month`,`Subscriber`,`User_Id`,`Added_On`) values (1,2019,1,'23',NULL,NULL),(2,2020,2,'56',NULL,NULL);

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
  `Year` int(5) default NULL,
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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `t_subscriber_isp_main` */

insert  into `t_subscriber_isp_main`(`Id`,`Year`,`Month`,`Broad_Band_count`,`LTE_Broad_Band_count`,`Lease_Line_Count`,`Data_Center_Count`,`Contact_Center_Count`,`ERP_Service_Count`,`Fleet_Management_Count`,`User_Id`,`Added_Date`) values (1,2020,1,'20','100','300','500','40','25','14',11,'2020-03-12');

/*Table structure for table `t_subscriber_leaseline_isp_excel` */

DROP TABLE IF EXISTS `t_subscriber_leaseline_isp_excel`;

CREATE TABLE `t_subscriber_leaseline_isp_excel` (
  `Id` int(5) NOT NULL auto_increment,
  `Year` int(5) default NULL,
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
  `Month` int(2) default NULL,
  `Year` int(4) default NULL,
  `User_Id` int(5) default NULL,
  `Added_Date` date default NULL,
  PRIMARY KEY  (`Id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `t_subscriber_mobile_data_user_main` */

/*Table structure for table `t_subscriber_vas_main` */

DROP TABLE IF EXISTS `t_subscriber_vas_main`;

CREATE TABLE `t_subscriber_vas_main` (
  `Id` int(5) NOT NULL auto_increment,
  `Year` int(5) default NULL,
  `Month` int(2) default NULL,
  `B_Wallet_New` varchar(10) default NULL,
  `B_Wallet_Total` varchar(10) default NULL,
  `B_Wallet_Towa` varchar(10) default NULL,
  `User_Id` int(2) default NULL,
  `Added_Date` date default NULL,
  PRIMARY KEY  (`Id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `t_subscriber_vas_main` */

/*Table structure for table `t_target` */

DROP TABLE IF EXISTS `t_target`;

CREATE TABLE `t_target` (
  `Id` int(50) NOT NULL auto_increment,
  `Year` year(4) default NULL,
  `Revenue` varchar(250) default NULL,
  `Arpu_post` varchar(200) default NULL,
  `Arpu_pre` varchar(200) default NULL,
  `Active_user` varchar(200) default NULL,
  `Vivophone` varchar(200) default NULL,
  `m_revenue` varchar(200) default NULL,
  `Month` varchar(200) default NULL,
  PRIMARY KEY  (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

/*Data for the table `t_target` */

insert  into `t_target`(`Id`,`Year`,`Revenue`,`Arpu_post`,`Arpu_pre`,`Active_user`,`Vivophone`,`m_revenue`,`Month`) values (1,2020,'4500','31431','15918','423753','10000','375','1'),(9,2011,'123123','123123123','123123123','123123123','12312312',NULL,NULL);

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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `t_user_details` */

insert  into `t_user_details`(`Id`,`User_Id`,`Password`,`User_Status`,`CID`,`Full_Name`,`Contact_Number`,`Role_Id`,`Image_Name`) values (1,'admin','admin','Y','11704001413','Sonam Dorji','17458669',1,NULL),(2,'pema@bt.bt','123','Y','111223','pema ','145666',2,NULL),(3,'ceo@bt.bt','123','Y','4556525','ceo','17566566',3,NULL);

/*Table structure for table `t_vivo_achievement` */

DROP TABLE IF EXISTS `t_vivo_achievement`;

CREATE TABLE `t_vivo_achievement` (
  `Id` int(11) NOT NULL auto_increment,
  `Year` varchar(10) default NULL,
  `Month` varchar(10) default NULL,
  `Achievement` varchar(11) default NULL,
  `Update_by` varchar(100) default NULL,
  `Updated_On` varchar(100) default NULL,
  PRIMARY KEY  (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `t_vivo_achievement` */

insert  into `t_vivo_achievement`(`Id`,`Year`,`Month`,`Achievement`,`Update_by`,`Updated_On`) values (1,'2020','1','30000','Sonam Dorji','2020-03-21'),(2,'2020','2','2000','Sonam Dorji','2020-03-21'),(3,'2020','03','20003','Sonam Dorji','2020-03-21');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
