/*
SQLyog Ultimate v8.82 
MySQL - 5.5.5-10.1.35-MariaDB : Database - bt_mis
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
  `Id` int(5) NOT NULL AUTO_INCREMENT,
  `Category_Name` varchar(200) DEFAULT NULL,
  `Active_Status` char(1) DEFAULT 'Y',
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `t_category_master` */

insert  into `t_category_master`(`Id`,`Category_Name`,`Active_Status`) values (1,'Subscriber Front','Y'),(2,'Revenue Front','Y');

/*Table structure for table `t_month_master` */

DROP TABLE IF EXISTS `t_month_master`;

CREATE TABLE `t_month_master` (
  `Id` int(5) NOT NULL AUTO_INCREMENT,
  `Month` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

/*Data for the table `t_month_master` */

insert  into `t_month_master`(`Id`,`Month`) values (1,'January'),(2,'February'),(3,'March'),(4,'April'),(5,'May'),(6,'June'),(7,'July'),(8,'August'),(9,'September'),(10,'October'),(11,'November'),(12,'December');

/*Table structure for table `t_revenue_arpu_main` */

DROP TABLE IF EXISTS `t_revenue_arpu_main`;

CREATE TABLE `t_revenue_arpu_main` (
  `Id` int(5) NOT NULL AUTO_INCREMENT,
  `Year` int(5) DEFAULT NULL,
  `Month` int(2) DEFAULT NULL,
  `Prepaid` varchar(10) DEFAULT NULL,
  `Postpaid` varchar(10) DEFAULT NULL,
  `User_Id` int(5) DEFAULT NULL,
  `Added_Date` date DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `t_revenue_arpu_main` */

/*Table structure for table `t_revenue_financial_excel` */

DROP TABLE IF EXISTS `t_revenue_financial_excel`;

CREATE TABLE `t_revenue_financial_excel` (
  `Id` int(5) NOT NULL AUTO_INCREMENT,
  `Year` int(5) DEFAULT NULL,
  `Month` int(2) DEFAULT NULL,
  `Service_Revenue_Id` varchar(200) DEFAULT NULL,
  `Jan` varchar(10) DEFAULT NULL,
  `Feb` varchar(10) DEFAULT NULL,
  `Mar` varchar(10) DEFAULT NULL,
  `Apr` varchar(10) DEFAULT NULL,
  `May` varchar(10) DEFAULT NULL,
  `Jun` varchar(10) DEFAULT NULL,
  `July` varchar(10) DEFAULT NULL,
  `Aug` varchar(10) DEFAULT NULL,
  `Sep` varchar(10) DEFAULT NULL,
  `Oct` varchar(10) DEFAULT NULL,
  `Nov` varchar(10) DEFAULT NULL,
  `Dec` varchar(10) DEFAULT NULL,
  `User_Id` int(2) DEFAULT NULL,
  `Added_date` date DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `t_revenue_financial_excel` */

/*Table structure for table `t_revenue_fixed_line_main` */

DROP TABLE IF EXISTS `t_revenue_fixed_line_main`;

CREATE TABLE `t_revenue_fixed_line_main` (
  `Id` int(5) NOT NULL AUTO_INCREMENT,
  `Year` int(5) DEFAULT NULL,
  `Month` int(2) DEFAULT NULL,
  `Telephone_Service` varchar(10) DEFAULT NULL,
  `Int_ISD` varchar(10) DEFAULT NULL,
  `Total_Revenue` varchar(10) DEFAULT NULL,
  `User_Id` int(2) DEFAULT NULL,
  `Added_Date` date DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `t_revenue_fixed_line_main` */

/*Table structure for table `t_revenue_isp_main` */

DROP TABLE IF EXISTS `t_revenue_isp_main`;

CREATE TABLE `t_revenue_isp_main` (
  `Id` int(5) NOT NULL AUTO_INCREMENT,
  `Year` int(5) DEFAULT NULL,
  `Month` int(2) DEFAULT NULL,
  `Broad_Band` varchar(10) DEFAULT NULL,
  `Leased_line` varchar(10) DEFAULT NULL,
  `Domain_Name` varchar(10) DEFAULT NULL,
  `IPLC` varchar(10) DEFAULT NULL,
  `Domain_Name_int` varchar(10) DEFAULT NULL,
  `Leased_Line_int` varchar(10) DEFAULT NULL,
  `Contact_Center` varchar(10) DEFAULT NULL,
  `Data_Center` varchar(10) DEFAULT NULL,
  `Thuraya_Service` varchar(10) DEFAULT NULL,
  `EPR_Service` varchar(10) DEFAULT NULL,
  `Total_Revenue` varchar(10) DEFAULT NULL,
  `User_Id` int(5) DEFAULT NULL,
  `Added_Date` date DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `t_revenue_isp_main` */

/*Table structure for table `t_revenue_mobile_main` */

DROP TABLE IF EXISTS `t_revenue_mobile_main`;

CREATE TABLE `t_revenue_mobile_main` (
  `Id` int(5) NOT NULL AUTO_INCREMENT,
  `Year` int(5) DEFAULT NULL,
  `Month` int(2) DEFAULT NULL,
  `Mrc` varchar(10) DEFAULT NULL,
  `E_load` varchar(10) DEFAULT NULL,
  `In_And_Vas` varchar(10) DEFAULT NULL,
  `Online_App` varchar(10) DEFAULT NULL,
  `Inter_Connect` varchar(10) DEFAULT NULL,
  `International_Roming` varchar(10) DEFAULT NULL,
  `In_And_Vas_International` varchar(10) DEFAULT NULL,
  `Prepaid` varchar(10) DEFAULT NULL,
  `Postpaid` varchar(10) DEFAULT NULL,
  `Total_Revinue` varchar(10) DEFAULT NULL,
  `User_Id` int(2) DEFAULT NULL,
  `Added_Date` date DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `t_revenue_mobile_main` */

/*Table structure for table `t_revenue_other_main` */

DROP TABLE IF EXISTS `t_revenue_other_main`;

CREATE TABLE `t_revenue_other_main` (
  `Id` int(5) NOT NULL AUTO_INCREMENT,
  `Year` int(5) DEFAULT NULL,
  `Month` int(2) DEFAULT NULL,
  `Sale_Of_Product` varchar(10) DEFAULT NULL,
  `Other_Income` varchar(10) DEFAULT NULL,
  `Total_Revenue` varchar(10) DEFAULT NULL,
  `User_Id` int(5) DEFAULT NULL,
  `Added_Date` date DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `t_revenue_other_main` */

/*Table structure for table `t_revenue_overall_main` */

DROP TABLE IF EXISTS `t_revenue_overall_main`;

CREATE TABLE `t_revenue_overall_main` (
  `Id` int(5) NOT NULL AUTO_INCREMENT,
  `Year` int(5) DEFAULT NULL,
  `Month` int(2) DEFAULT NULL,
  `Grand_Total` varchar(10) DEFAULT NULL,
  `User_Id` int(2) DEFAULT NULL,
  `Added_Date` date DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `t_revenue_overall_main` */

/*Table structure for table `t_role_master` */

DROP TABLE IF EXISTS `t_role_master`;

CREATE TABLE `t_role_master` (
  `Id` int(5) NOT NULL AUTO_INCREMENT,
  `Role_Name` varchar(200) DEFAULT NULL,
  `Role_Status` char(1) DEFAULT 'Y',
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `t_role_master` */

insert  into `t_role_master`(`Id`,`Role_Name`,`Role_Status`) values (1,'Admin','Y'),(2,'Marketing Division','Y'),(3,'Head','Y');

/*Table structure for table `t_sub_category_master` */

DROP TABLE IF EXISTS `t_sub_category_master`;

CREATE TABLE `t_sub_category_master` (
  `Id` int(5) NOT NULL AUTO_INCREMENT,
  `Category_Id` int(5) DEFAULT NULL,
  `Sub_Category_Name` varchar(200) DEFAULT NULL,
  `Active_Status` char(1) DEFAULT 'Y',
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

/*Data for the table `t_sub_category_master` */

insert  into `t_sub_category_master`(`Id`,`Category_Id`,`Sub_Category_Name`,`Active_Status`) values (1,1,'B-Mobile','Y'),(2,1,'ISP','Y'),(3,1,'VAS','Y'),(4,1,'Mobile Data User','Y'),(5,1,'Fixed Line','Y'),(6,2,'Mobile','Y'),(7,2,'ISP','Y'),(8,2,'Fixed Line','Y'),(9,2,'Others','Y'),(10,2,'ARPU','Y');

/*Table structure for table `t_subscriber_base_disconnect_excel` */

DROP TABLE IF EXISTS `t_subscriber_base_disconnect_excel`;

CREATE TABLE `t_subscriber_base_disconnect_excel` (
  `Id` int(5) NOT NULL AUTO_INCREMENT,
  `Year` int(5) DEFAULT NULL,
  `Month` int(2) DEFAULT NULL,
  `File_Type` varchar(20) DEFAULT NULL,
  `Name` varchar(200) DEFAULT NULL,
  `Jan` varchar(10) DEFAULT NULL,
  `Feb` varchar(10) DEFAULT NULL,
  `Mar` varchar(10) DEFAULT NULL,
  `Apr` varchar(10) DEFAULT NULL,
  `May` varchar(10) DEFAULT NULL,
  `June` varchar(10) DEFAULT NULL,
  `July` varchar(10) DEFAULT NULL,
  `Aug` varchar(10) DEFAULT NULL,
  `Sep` varchar(10) DEFAULT NULL,
  `Oct` varchar(10) DEFAULT NULL,
  `Nov` varchar(10) DEFAULT NULL,
  `Dec` varchar(10) DEFAULT NULL,
  `User_Id` int(5) DEFAULT NULL,
  `Added_Date` date DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `t_subscriber_base_disconnect_excel` */

/*Table structure for table `t_subscriber_bb_postpaid_isp_excel` */

DROP TABLE IF EXISTS `t_subscriber_bb_postpaid_isp_excel`;

CREATE TABLE `t_subscriber_bb_postpaid_isp_excel` (
  `Id` int(5) NOT NULL AUTO_INCREMENT,
  `Year` int(5) DEFAULT NULL,
  `Month` int(2) DEFAULT NULL,
  `Domain` varchar(200) DEFAULT NULL,
  `Address` tinytext,
  `Contact` varchar(100) DEFAULT NULL,
  `Customer_Code` varchar(100) DEFAULT NULL,
  `Customer_Id` varchar(20) DEFAULT NULL,
  `Service_No` varchar(100) DEFAULT NULL,
  `Status` varchar(100) DEFAULT NULL,
  `Package_Name` varchar(50) DEFAULT NULL,
  `User_Id` int(2) DEFAULT NULL,
  `Added_On` date DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `t_subscriber_bb_postpaid_isp_excel` */

/*Table structure for table `t_subscriber_bb_prepaid_isp_excel` */

DROP TABLE IF EXISTS `t_subscriber_bb_prepaid_isp_excel`;

CREATE TABLE `t_subscriber_bb_prepaid_isp_excel` (
  `Id` int(5) NOT NULL AUTO_INCREMENT,
  `Year` int(5) DEFAULT NULL,
  `Month` int(2) DEFAULT NULL,
  `Name` varchar(200) DEFAULT NULL,
  `Customer_Group` varchar(100) DEFAULT NULL,
  `Domain` varchar(100) DEFAULT NULL,
  `Address` text,
  `Contact` varchar(20) DEFAULT NULL,
  `Customer_Code` varchar(100) DEFAULT NULL,
  `Service_No` varchar(100) DEFAULT NULL,
  `Status` varchar(50) DEFAULT NULL,
  `User_Id` int(2) DEFAULT NULL,
  `Added_On` date DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `t_subscriber_bb_prepaid_isp_excel` */

/*Table structure for table `t_subscriber_bmobile_excel` */

DROP TABLE IF EXISTS `t_subscriber_bmobile_excel`;

CREATE TABLE `t_subscriber_bmobile_excel` (
  `Id` int(5) NOT NULL AUTO_INCREMENT,
  `Year` int(11) DEFAULT NULL,
  `Month` int(2) DEFAULT NULL,
  `File_Date` varchar(20) DEFAULT NULL,
  `Pre_Active` varchar(10) DEFAULT NULL,
  `Pre_Grace` varchar(10) DEFAULT NULL,
  `Pre_Total_Registered` varchar(10) DEFAULT NULL,
  `Post_Active` varchar(10) DEFAULT NULL,
  `Post_Grace` varchar(10) DEFAULT NULL,
  `Post_Total_Registered` varchar(10) DEFAULT NULL,
  `Total_Active` varchar(10) DEFAULT NULL,
  `Total_Grace` varchar(10) DEFAULT NULL,
  `Total_Registered` varchar(10) DEFAULT NULL,
  `User_Id` int(5) DEFAULT NULL,
  `Added_Date` date DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `t_subscriber_bmobile_excel` */

/*Table structure for table `t_subscriber_bmobile_main` */

DROP TABLE IF EXISTS `t_subscriber_bmobile_main`;

CREATE TABLE `t_subscriber_bmobile_main` (
  `Id` int(5) NOT NULL AUTO_INCREMENT,
  `Year` int(5) DEFAULT NULL,
  `Month` int(2) DEFAULT NULL,
  `Prepaid_Active` varchar(10) DEFAULT NULL,
  `Prepaid_Passive` varchar(10) DEFAULT NULL,
  `Prepaid_Total` varchar(10) DEFAULT NULL,
  `Post_Active` varchar(10) DEFAULT NULL,
  `Post_Passive` varchar(10) DEFAULT NULL,
  `Post_Total` varchar(10) DEFAULT NULL,
  `Total_Active` varchar(10) DEFAULT NULL,
  `Total_Registered` varchar(10) DEFAULT NULL,
  `Disconnected` varchar(10) DEFAULT NULL,
  `Churn_Rate` varchar(10) DEFAULT NULL,
  `HLR` varchar(10) DEFAULT NULL,
  `HLR_Attachment` varchar(200) DEFAULT NULL,
  `Added_Date` date DEFAULT NULL,
  `User_Id` int(5) DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `t_subscriber_bmobile_main` */

/*Table structure for table `t_subscriber_fixed_line_main` */

DROP TABLE IF EXISTS `t_subscriber_fixed_line_main`;

CREATE TABLE `t_subscriber_fixed_line_main` (
  `Id` int(5) NOT NULL AUTO_INCREMENT,
  `Year` int(5) DEFAULT NULL,
  `Month` int(2) DEFAULT NULL,
  `Subscriber` varchar(100) DEFAULT NULL,
  `User_Id` int(5) DEFAULT NULL,
  `Added_On` date DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `t_subscriber_fixed_line_main` */

/*Table structure for table `t_subscriber_fl_excel` */

DROP TABLE IF EXISTS `t_subscriber_fl_excel`;

CREATE TABLE `t_subscriber_fl_excel` (
  `Id` int(5) NOT NULL AUTO_INCREMENT,
  `Year` int(5) DEFAULT NULL,
  `Month` int(2) DEFAULT NULL,
  `Dzongkhag` varchar(50) DEFAULT NULL,
  `Jan` varchar(10) DEFAULT NULL,
  `Feb` varchar(10) DEFAULT NULL,
  `March` varchar(10) DEFAULT NULL,
  `Aprl` varchar(10) DEFAULT NULL,
  `May` varchar(10) DEFAULT NULL,
  `Jun` varchar(10) DEFAULT NULL,
  `July` varchar(10) DEFAULT NULL,
  `Aug` varchar(10) DEFAULT NULL,
  `Sep` varchar(10) DEFAULT NULL,
  `Oct` varchar(10) DEFAULT NULL,
  `Nov` varchar(10) DEFAULT NULL,
  `Dec` varchar(10) DEFAULT NULL,
  `User_Id` int(2) DEFAULT NULL,
  `Added_On` date DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `t_subscriber_fl_excel` */

/*Table structure for table `t_subscriber_isp_main` */

DROP TABLE IF EXISTS `t_subscriber_isp_main`;

CREATE TABLE `t_subscriber_isp_main` (
  `Id` int(5) NOT NULL AUTO_INCREMENT,
  `Year` int(5) DEFAULT NULL,
  `Month` int(2) DEFAULT NULL,
  `Broad_Band_count` varchar(10) DEFAULT NULL,
  `LTE_Broad_Band_count` varchar(10) DEFAULT NULL,
  `Lease_Line_Count` varchar(10) DEFAULT NULL,
  `Data_Center_Count` varchar(10) DEFAULT NULL,
  `Contact_Center_Count` varchar(10) DEFAULT NULL,
  `ERP_Service_Count` varchar(10) DEFAULT NULL,
  `Fleet_Management_Count` varchar(10) DEFAULT NULL,
  `User_Id` int(5) DEFAULT NULL,
  `Added_Date` date DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `t_subscriber_isp_main` */

/*Table structure for table `t_subscriber_leaseline_isp_excel` */

DROP TABLE IF EXISTS `t_subscriber_leaseline_isp_excel`;

CREATE TABLE `t_subscriber_leaseline_isp_excel` (
  `Id` int(5) NOT NULL AUTO_INCREMENT,
  `Year` int(5) DEFAULT NULL,
  `Month` int(2) DEFAULT NULL,
  `Customer_Id` varchar(100) DEFAULT NULL,
  `Customer_Code` varchar(100) DEFAULT NULL,
  `Customer_Type` varchar(100) DEFAULT NULL,
  `CS_Activated` varchar(100) DEFAULT NULL,
  `PRG_Name` varchar(100) DEFAULT NULL,
  `CC_State` varchar(100) DEFAULT NULL,
  `CC_City` varchar(100) DEFAULT NULL,
  `CC_Name` varchar(100) DEFAULT NULL,
  `CC_SMS_No` varchar(100) DEFAULT NULL,
  `User_Id` int(5) DEFAULT NULL,
  `Added_Date` date DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `t_subscriber_leaseline_isp_excel` */

/*Table structure for table `t_subscriber_mobile_data_user_main` */

DROP TABLE IF EXISTS `t_subscriber_mobile_data_user_main`;

CREATE TABLE `t_subscriber_mobile_data_user_main` (
  `Id` int(5) NOT NULL AUTO_INCREMENT,
  `2_G_User` varchar(10) DEFAULT NULL,
  `3_G_User` varchar(10) DEFAULT NULL,
  `4_G_User` varchar(10) DEFAULT NULL,
  `Attachment_2_G` varchar(200) DEFAULT NULL,
  `Attachment_4_G` varchar(200) DEFAULT NULL,
  `Month` int(2) DEFAULT NULL,
  `Year` int(4) DEFAULT NULL,
  `User_Id` int(5) DEFAULT NULL,
  `Added_Date` date DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `t_subscriber_mobile_data_user_main` */

/*Table structure for table `t_subscriber_vas_main` */

DROP TABLE IF EXISTS `t_subscriber_vas_main`;

CREATE TABLE `t_subscriber_vas_main` (
  `Id` int(5) NOT NULL AUTO_INCREMENT,
  `Year` int(5) DEFAULT NULL,
  `Month` int(2) DEFAULT NULL,
  `B_Wallet_New` varchar(10) DEFAULT NULL,
  `B_Wallet_Total` varchar(10) DEFAULT NULL,
  `B_Wallet_Towa` varchar(10) DEFAULT NULL,
  `User_Id` int(2) DEFAULT NULL,
  `Added_Date` date DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `t_subscriber_vas_main` */

/*Table structure for table `t_user_details` */

DROP TABLE IF EXISTS `t_user_details`;

CREATE TABLE `t_user_details` (
  `Id` int(5) NOT NULL AUTO_INCREMENT,
  `User_Id` varchar(200) DEFAULT NULL,
  `Password` varchar(200) DEFAULT NULL,
  `User_Status` char(1) DEFAULT 'Y',
  `CID` varchar(11) DEFAULT NULL,
  `Full_Name` varchar(200) DEFAULT NULL,
  `Contact_Number` varchar(8) DEFAULT NULL,
  `Role_Id` int(5) DEFAULT NULL,
  `Image_Name` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

/*Data for the table `t_user_details` */

insert  into `t_user_details`(`Id`,`User_Id`,`Password`,`User_Status`,`CID`,`Full_Name`,`Contact_Number`,`Role_Id`,`Image_Name`) values (1,'admin','admin','Y','12312312312','Sonam Dorji','12312312',1,'acknowledgement.JPG');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
