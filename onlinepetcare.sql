/*
 Navicat Premium Data Transfer

 Source Server         : onlinepetcare
 Source Server Type    : MySQL
 Source Server Version : 100424
 Source Host           : localhost:3306
 Source Schema         : onlinepetcare

 Target Server Type    : MySQL
 Target Server Version : 100424
 File Encoding         : 65001

 Date: 14/09/2022 15:52:32
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for admin
-- ----------------------------
DROP TABLE IF EXISTS `admin`;
CREATE TABLE `admin`  (
  `AID` int(10) NOT NULL,
  `adminName` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `Password` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `Conpassword` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `Email` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `Contact_num` int(10) NOT NULL
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of admin
-- ----------------------------
INSERT INTO `admin` VALUES (1, 'kushan', '111', '111', 'kush@gmail.com', 766542134);

-- ----------------------------
-- Table structure for appointment
-- ----------------------------
DROP TABLE IF EXISTS `appointment`;
CREATE TABLE `appointment`  (
  `app_ID` int(100) NOT NULL AUTO_INCREMENT,
  `Id` int(10) NOT NULL,
  `Doc_id` int(100) NOT NULL,
  `scheduleID` int(100) NOT NULL,
  `location` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `PetID` int(250) NOT NULL,
  `Petname` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `app_symptm` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `comment` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `status` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `timestamp` timestamp(0) NOT NULL DEFAULT current_timestamp() ON UPDATE CURRENT_TIMESTAMP(0),
  PRIMARY KEY (`app_ID`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 17 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of appointment
-- ----------------------------
INSERT INTO `appointment` VALUES (3, 6, 2, 3, 'colombo', 0, 'Tifi', 'sample', 'sample', 'Accepted', '2022-05-23 22:52:32');
INSERT INTO `appointment` VALUES (4, 1, 2, 4, 'colombo', 0, 'chiku', 'ssss', 'jjjj', 'Accepted', '2022-07-25 01:37:57');
INSERT INTO `appointment` VALUES (5, 1, 2, 18, 'colombo', 0, 'chiku', 'sample', 'sample', 'Rejected', '2022-07-25 10:37:00');
INSERT INTO `appointment` VALUES (6, 1, 2, 18, 'colombo', 0, 'chiku', 'sick,', 'sihsvdjnsk', 'Rejected', '2022-07-25 10:37:00');
INSERT INTO `appointment` VALUES (7, 8, 10, 21, '', 0, '', 'ddd', 'ddd', 'Accepted', '2022-09-08 16:59:36');
INSERT INTO `appointment` VALUES (8, 8, 10, 21, 'Colombo', 0, 'Viraj', 'ss', 'ssss', 'Accepted', '2022-09-08 16:59:36');
INSERT INTO `appointment` VALUES (9, 8, 10, 27, 'Colombo', 0, 'Viraj', 'sss', 'dddd', 'Accepted', '2022-09-09 17:33:08');
INSERT INTO `appointment` VALUES (10, 8, 10, 22, 'Colombo', 0, 'Viraj', 'ddd', 'ddd', 'Accepted', '2022-09-10 17:27:23');
INSERT INTO `appointment` VALUES (11, 8, 10, 22, 'Colombo', 5, 'Viraj', 'bscavhvcd', 'ddddddddddddddd', 'Accepted', '2022-09-10 17:27:23');
INSERT INTO `appointment` VALUES (12, 8, 10, 22, 'Colombo', 6, 'Sandu', 'sssss', 'sssssssssssssssssssssss', 'Accepted', '2022-09-10 17:27:23');
INSERT INTO `appointment` VALUES (13, 8, 10, 22, 'Colombo', 6, 'Sandu', 'ssss', 'today', 'Accepted', '2022-09-10 17:27:23');
INSERT INTO `appointment` VALUES (14, 8, 10, 22, 'Colombo', 18, 'chiku', 'New 01', 'New 01', 'Accepted', '2022-09-10 17:27:23');
INSERT INTO `appointment` VALUES (15, 8, 10, 22, 'Colombo', 18, 'Molly', 'New 02', 'New 02', 'Accepted', '2022-09-10 17:27:23');
INSERT INTO `appointment` VALUES (16, 8, 10, 22, 'Colombo', 18, 'chiku', 'ssssssss', 'ssssssssssss', 'Accepted', '2022-09-10 17:27:23');

-- ----------------------------
-- Table structure for doctor
-- ----------------------------
DROP TABLE IF EXISTS `doctor`;
CREATE TABLE `doctor`  (
  `Doc_id` int(100) NOT NULL AUTO_INCREMENT,
  `Doc_name` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `Doc_email` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `Jobtitle` varchar(25) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `gender` char(5) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `Contact_num` int(10) NULL DEFAULT NULL,
  `Password` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `Working_days` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `working_hours` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `location` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`Doc_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 13 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of doctor
-- ----------------------------
INSERT INTO `doctor` VALUES (9, 'Kushan', 'kush.kushanrandula@gmail.com', 'Companion Animal Veterina', 'Male', 766542134, '250cf8b51c773f3f8dc8b4be867a9a02', 'General (Moday To Friday)', 'General (08AM to 05PM)', 'Colombo');
INSERT INTO `doctor` VALUES (10, 'Kushan', 'g8801.kushan@gmail.com', 'Companion Animal Veterina', 'Male', 766542134, '202cb962ac59075b964b07152d234b70', 'General (Moday To Friday)', 'General (08AM to 05PM)', 'Colombo');
INSERT INTO `doctor` VALUES (11, 'Viraj', 'viraj@gmail.com', 'Veterinary Specialists', 'Male', 766542134, '202cb962ac59075b964b07152d234b70', 'General (Moday To Friday)', 'General (08AM to 05PM)', 'Nuwara Eliya');
INSERT INTO `doctor` VALUES (12, 'today', 'today@gmail.com', 'Veterinary Specialists', '', 766542134, '47bce5c74f589f4867dbd57e9ca9f808', 'General (Moday To Friday)', 'Normal (12PM to 10PM)', 'Kilinochchi');

-- ----------------------------
-- Table structure for doctorschedule
-- ----------------------------
DROP TABLE IF EXISTS `doctorschedule`;
CREATE TABLE `doctorschedule`  (
  `scheduleId` int(100) NOT NULL AUTO_INCREMENT,
  `scheduleDate` date NOT NULL,
  `startTime` time(0) NOT NULL,
  `endTime` time(0) NOT NULL,
  `bookAvail` char(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `Doc_id` int(10) NOT NULL,
  `Doc_email` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `location` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `Status` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`scheduleId`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 28 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of doctorschedule
-- ----------------------------
INSERT INTO `doctorschedule` VALUES (3, '2022-05-24', '14:45:00', '22:43:00', 'available', 2, '', 'colombo', 'pending');
INSERT INTO `doctorschedule` VALUES (4, '2022-07-25', '10:30:00', '20:30:00', 'available', 2, '', 'colombo', 'pending');
INSERT INTO `doctorschedule` VALUES (5, '2022-06-09', '10:30:00', '20:30:00', 'available', 2, '', 'colombo', 'pending');
INSERT INTO `doctorschedule` VALUES (6, '2022-07-26', '10:30:00', '20:30:00', 'available', 2, '', 'colombo', 'pending');
INSERT INTO `doctorschedule` VALUES (7, '2022-07-27', '08:21:00', '20:16:00', 'available', 2, '', 'colombo', 'pending');
INSERT INTO `doctorschedule` VALUES (8, '0000-00-00', '09:49:00', '22:49:00', 'available', 2, '', 'colombo', 'pending');
INSERT INTO `doctorschedule` VALUES (9, '0000-00-00', '09:52:00', '20:52:00', 'available', 2, '', 'colombo', 'pending');
INSERT INTO `doctorschedule` VALUES (10, '0000-00-00', '05:55:00', '23:55:00', 'available', 2, '', 'colombo', 'pending');
INSERT INTO `doctorschedule` VALUES (11, '0000-00-00', '09:06:00', '08:06:00', 'available', 2, '', 'colombo', 'pending');
INSERT INTO `doctorschedule` VALUES (12, '0000-00-00', '10:12:00', '22:12:00', 'available', 2, '', 'colombo', 'pending');
INSERT INTO `doctorschedule` VALUES (13, '2022-07-28', '09:16:00', '22:16:00', 'available', 2, '', 'colombo', 'pending');
INSERT INTO `doctorschedule` VALUES (14, '0000-00-00', '09:19:00', '10:19:00', 'available', 2, '', 'colombo', 'pending');
INSERT INTO `doctorschedule` VALUES (15, '0000-00-00', '08:22:00', '22:22:00', 'available', 2, '', 'colombo', 'pending');
INSERT INTO `doctorschedule` VALUES (16, '0000-00-00', '03:23:00', '20:24:00', 'available', 2, '', 'colombo', 'pending');
INSERT INTO `doctorschedule` VALUES (17, '2022-07-28', '09:25:00', '22:25:00', 'available', 2, '', 'colombo', 'pending');
INSERT INTO `doctorschedule` VALUES (18, '2022-07-28', '10:30:00', '15:33:00', 'available', 2, '', 'colombo', 'pending');
INSERT INTO `doctorschedule` VALUES (19, '2022-09-08', '15:00:00', '22:00:00', 'available', 9, '', 'l1', 'pending');
INSERT INTO `doctorschedule` VALUES (20, '2022-09-08', '15:00:00', '22:00:00', 'available', 9, 'kush.kushanrandula@gmail.com', 'l1', 'pending');
INSERT INTO `doctorschedule` VALUES (21, '2022-09-08', '13:00:00', '22:00:00', 'available', 10, 'g8801.kushan@gmail.com', 'Colombo', 'pending');
INSERT INTO `doctorschedule` VALUES (22, '2022-09-10', '08:00:00', '17:00:00', 'available', 10, 'g8801.kushan@gmail.com', 'Colombo', 'pending');
INSERT INTO `doctorschedule` VALUES (23, '2022-09-09', '17:00:00', '22:00:00', 'available', 10, 'g8801.kushan@gmail.com', 'Colombo', 'pending');
INSERT INTO `doctorschedule` VALUES (24, '2022-09-09', '17:07:00', '23:07:00', 'available', 10, 'g8801.kushan@gmail.com', 'Colombo', 'pending');
INSERT INTO `doctorschedule` VALUES (25, '2022-09-09', '18:00:00', '22:00:00', 'available', 10, 'g8801.kushan@gmail.com', 'Colombo', 'pending');
INSERT INTO `doctorschedule` VALUES (26, '2022-09-09', '18:00:00', '22:00:00', 'available', 10, 'g8801.kushan@gmail.com', 'Colombo', 'pending');
INSERT INTO `doctorschedule` VALUES (27, '2022-09-09', '18:00:00', '22:00:00', 'available', 10, 'g8801.kushan@gmail.com', 'Colombo', 'pending');

-- ----------------------------
-- Table structure for pet_cemetry
-- ----------------------------
DROP TABLE IF EXISTS `pet_cemetry`;
CREATE TABLE `pet_cemetry`  (
  `PetCemt_ID` int(11) NOT NULL,
  `PetName` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `Death_Date` date NOT NULL,
  `Death_Reason` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`PetCemt_ID`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for pet_owners
-- ----------------------------
DROP TABLE IF EXISTS `pet_owners`;
CREATE TABLE `pet_owners`  (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `email` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `gender` char(5) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `location` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `contact_num` int(10) NOT NULL,
  PRIMARY KEY (`Id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 12 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of pet_owners
-- ----------------------------
INSERT INTO `pet_owners` VALUES (1, 'PO1', '202cb962ac59075b964b07152d234b70', 'PO1@gmail.com', 'Male', 'colombo', 1111111112);
INSERT INTO `pet_owners` VALUES (6, 'demo1', '202cb962ac59075b964b07152d234b70', 'Demo1@gmail.com', 'Male', 'colombo', 123456789);
INSERT INTO `pet_owners` VALUES (7, 'demoPO1', '202cb962ac59075b964b07152d234b70', 'PO1@gmail.com', 'Male', 'Colombo', 1234567890);
INSERT INTO `pet_owners` VALUES (8, 'Randula', '202cb962ac59075b964b07152d234b70', 'Kushan@gmail.com', 'Male', 'Colombo', 766542134);
INSERT INTO `pet_owners` VALUES (9, 'Dulan', '202cb962ac59075b964b07152d234b70', 'Dulan@gmail.com', 'Male', 'Colombo', 766542134);
INSERT INTO `pet_owners` VALUES (11, 'Pubudu', '202cb962ac59075b964b07152d234b70', 'Pubudu@gmail.com', 'Male', 'Colombo', 766542134);

-- ----------------------------
-- Table structure for petcarecenter
-- ----------------------------
DROP TABLE IF EXISTS `petcarecenter`;
CREATE TABLE `petcarecenter`  (
  `PCC_id` int(10) NOT NULL AUTO_INCREMENT,
  `pet_care_center_name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `contact_num` int(10) NOT NULL,
  `Working_days` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `working_hours` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `location` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`PCC_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 12 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of petcarecenter
-- ----------------------------
INSERT INTO `petcarecenter` VALUES (1, 'PCC1', 'PCC1@gmail.com', '698d51a19d8a121ce581499d7b701668', 1111111111, 'Only Weekdays(Monday to Friday)', 'General (8AM to 05PM)', 'colombo');
INSERT INTO `petcarecenter` VALUES (2, 'Kushan', 'kushan@gmail.com', '202cb962ac59075b964b07152d234b70', 766542134, 'General (Moday To Friday)', 'General Night(After the 0430PM)', 'Gampaha');
INSERT INTO `petcarecenter` VALUES (3, 'Kushan', 'g8801.kushan@gmail.com', '202cb962ac59075b964b07152d234b70', 766542134, 'General (Moday To Friday)', 'General Night(After the 0430PM)', 'Kaluthara');
INSERT INTO `petcarecenter` VALUES (4, 'Kushan1', 'ASD@123', '202cb962ac59075b964b07152d234b70', 766542134, 'Normal (Monday To Sunday)', 'General (08AM to 05PM)', 'Mannar');
INSERT INTO `petcarecenter` VALUES (5, 'Kushan', 'wer@gmail.com', '202cb962ac59075b964b07152d234b70', 766542134, 'General (Moday To Friday)', 'General Night(After the 0430PM)', 'Nuwara Eliya');
INSERT INTO `petcarecenter` VALUES (6, 'Kushan', 'pcc1@gmail.com', '202cb962ac59075b964b07152d234b70', 766542134, 'General (Moday To Friday)', 'Emergency cases', 'Mannar');
INSERT INTO `petcarecenter` VALUES (7, 'Kushan', 'PCC@gmail.com', '202cb962ac59075b964b07152d234b70', 766542134, 'Normal (Monday To Sunday)', 'General Night(After the 0430PM)', 'Kaluthara');
INSERT INTO `petcarecenter` VALUES (8, 'today', 'today@gmail.com', '698d51a19d8a121ce581499d7b701668', 766542134, 'General (Moday To Friday)', 'General (08AM to 05PM)', 'Gampaha');
INSERT INTO `petcarecenter` VALUES (9, 'petmart', 'petmart@gmail.com', '202cb962ac59075b964b07152d234b70', 766542134, 'General (Moday To Friday)', 'General (08AM to 05PM)', 'Kandy');
INSERT INTO `petcarecenter` VALUES (10, 'petS', 'petS@gmail.com', '202cb962ac59075b964b07152d234b70', 766542134, 'General (Moday To Friday)', 'General (08AM to 05PM)', 'Colombo');
INSERT INTO `petcarecenter` VALUES (11, 'Baw', 'Baw@gmail.com', '202cb962ac59075b964b07152d234b70', 766542134, 'General (Moday To Friday)', 'General (08AM to 05PM)', 'Colombo');

-- ----------------------------
-- Table structure for pets
-- ----------------------------
DROP TABLE IF EXISTS `pets`;
CREATE TABLE `pets`  (
  `PetID` int(100) NOT NULL AUTO_INCREMENT,
  `PetName` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `OwnerName` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `contact_num` int(10) NOT NULL,
  `Type` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `breed` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `Bday` date NOT NULL,
  `ProfilePic` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`PetID`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 20 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of pets
-- ----------------------------
INSERT INTO `pets` VALUES (2, 'chiku', 'PO1', 1111111112, 'Dog', 'labrador', '2021-01-26', 'd41d8cd98f00b204e9800998ecf8427e1653030626.jpg');
INSERT INTO `pets` VALUES (3, 'Tifi', 'demo1', 123456789, 'Dog', 'Comanarian', '2022-05-18', 'd41d8cd98f00b204e9800998ecf8427e1653326445.jpg');
INSERT INTO `pets` VALUES (4, 'shady', 'PO1', 1111111112, 'Dog', 'Comanarian', '2022-07-13', 'd41d8cd98f00b204e9800998ecf8427e1658725349.jpg');
INSERT INTO `pets` VALUES (19, 'Molly', 'Randula', 766542134, 'Dog', 'labrador', '2022-09-05', 'd41d8cd98f00b204e9800998ecf8427e1662820950.jpg');

-- ----------------------------
-- Table structure for petshops
-- ----------------------------
DROP TABLE IF EXISTS `petshops`;
CREATE TABLE `petshops`  (
  `PetshopID` int(11) NOT NULL AUTO_INCREMENT,
  `shop_name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `email` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `password` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `Working_days` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `working_hours` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `contact_num` int(10) NULL DEFAULT NULL,
  `location` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`PetshopID`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 7 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of petshops
-- ----------------------------
INSERT INTO `petshops` VALUES (1, 'PS1', 'PS1@gmail.com', '698d51a19d8a121ce581499d7b701668', 'Only Weekdays(Monday to Friday)', 'General (8AM to 05PM)', 1111111111, 'colombo');
INSERT INTO `petshops` VALUES (2, 'PS2', 'PS2@gmail.com', '698d51a19d8a121ce581499d7b701668', 'Only Weekdays(Monday to Friday)', 'General (8AM to 05PM)', 1111111112, 'colombo');
INSERT INTO `petshops` VALUES (6, 'PS1', 'PSCo@gmail.com', '202cb962ac59075b964b07152d234b70', 'General (Moday To Friday)', 'General (08AM to 05PM)', 766542134, 'Colombo');

-- ----------------------------
-- Table structure for prescription
-- ----------------------------
DROP TABLE IF EXISTS `prescription`;
CREATE TABLE `prescription`  (
  `Prc_ID` int(100) NOT NULL AUTO_INCREMENT,
  `PetID` int(11) NOT NULL,
  `IssuedDate` timestamp(0) NOT NULL DEFAULT current_timestamp() ON UPDATE CURRENT_TIMESTAMP(0),
  `Image` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `Chan_DateTime` datetime(0) NOT NULL,
  `Doc_id` int(100) NOT NULL,
  `OwnerID` int(100) NOT NULL,
  PRIMARY KEY (`Prc_ID`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

SET FOREIGN_KEY_CHECKS = 1;
