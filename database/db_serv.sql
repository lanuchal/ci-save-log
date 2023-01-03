-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 03, 2023 at 11:02 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_serv`
--

-- --------------------------------------------------------

--
-- Table structure for table `serv_node`
--

CREATE TABLE `serv_node` (
  `node_id` int(11) NOT NULL,
  `node_ip` varchar(20) NOT NULL COMMENT 'ip address ของ server',
  `node_name` varchar(100) NOT NULL COMMENT 'ชื่อ server',
  `node_detail` varchar(255) DEFAULT NULL COMMENT 'รายละเอียด server',
  `node_status` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'สถานะ server ( 0online 1offline)',
  `create_by` varchar(50) DEFAULT NULL,
  `create_time` datetime DEFAULT NULL,
  `update_by` varchar(50) DEFAULT NULL,
  `update_time` datetime DEFAULT NULL,
  `deleted` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='ตารางข้อมูล server';

--
-- Dumping data for table `serv_node`
--

INSERT INTO `serv_node` (`node_id`, `node_ip`, `node_name`, `node_detail`, `node_status`, `create_by`, `create_time`, `update_by`, `update_time`, `deleted`) VALUES
(1, '10.23.23.253', 'test', '465465', 1, '11', '2022-11-29 11:28:30', '1', '2022-11-29 11:28:54', 0),
(2, '1', '1', '1', 0, '1', '2022-11-29 11:55:29', '1', '0000-00-00 00:00:00', 0),
(3, '1', '1', '1', 0, '1', NULL, '1', NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `serv_permission`
--

CREATE TABLE `serv_permission` (
  `permission_id` int(11) NOT NULL,
  `permission_name` varchar(100) NOT NULL COMMENT 'ชื่อ permission เช่น SP_ADMIN ,ADMIN,USER',
  `permission_detail` varchar(255) DEFAULT NULL COMMENT 'รายละเอียด permission เช่น แก้ไขไฟล์โปรเจคได้ , เพิ่มไฟล์โปรเจคได้',
  `create_by` varchar(50) DEFAULT NULL,
  `create_time` datetime DEFAULT NULL,
  `update_by` varchar(50) DEFAULT NULL,
  `update_time` datetime DEFAULT NULL,
  `deleted` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='ตารางกำหนด permission ';

-- --------------------------------------------------------

--
-- Table structure for table `serv_request`
--

CREATE TABLE `serv_request` (
  `req_id` int(11) NOT NULL,
  `node_id` int(11) NOT NULL COMMENT 'เลือก server ที่ต้องการเข้า',
  `req_title_id` int(11) NOT NULL COMMENT 'เลือกหัวข้อที่ต้องการเข้า',
  `req_detial` varchar(255) DEFAULT NULL COMMENT 'รายละเอียดที่ตรงการเข้า server',
  `req_approve_by` varchar(50) DEFAULT NULL,
  `create_by` varchar(50) NOT NULL,
  `create_time` datetime DEFAULT NULL,
  `update_by` varchar(50) DEFAULT NULL,
  `update_time` datetime DEFAULT NULL,
  `deleted` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `serv_title_status`
--

CREATE TABLE `serv_title_status` (
  `req_title_id` int(11) NOT NULL,
  `req_title_name` varchar(100) NOT NULL COMMENT 'ชื่อหัวข้อ เช่น อัปโหลดไฟล์ , แก้ไขโปรเจ็ค , เพิ่มฟิลล์ กฟะฟิฟหำ',
  `req_title_detail` varchar(255) DEFAULT NULL COMMENT 'รายละเอียดของหัวข้อ',
  `create_by` varchar(50) DEFAULT NULL,
  `create_time` datetime DEFAULT NULL,
  `update_by` varchar(50) DEFAULT NULL,
  `update_time` datetime DEFAULT NULL,
  `deleted` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `serv_use`
--

CREATE TABLE `serv_use` (
  `use_id` int(11) NOT NULL,
  `use_remark` varchar(255) DEFAULT NULL COMMENT 'รายละเอียด user ',
  `NUM_OT` varchar(20) NOT NULL COMMENT 'รหัสพนักงาน',
  `permission_id` varchar(20) NOT NULL COMMENT ' permission ของuser',
  `create_by` varchar(50) DEFAULT NULL,
  `create_time` datetime DEFAULT NULL,
  `update_by` varchar(50) DEFAULT NULL,
  `update_time` datetime DEFAULT NULL,
  `deleted` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tb_nuser`
--

CREATE TABLE `tb_nuser` (
  `NUM_OT` varchar(20) NOT NULL DEFAULT '',
  `Upass` varchar(20) DEFAULT NULL,
  `ward_code` varchar(4) DEFAULT NULL,
  `pos` char(1) DEFAULT NULL,
  `PP` char(2) DEFAULT NULL,
  `status` char(1) DEFAULT NULL,
  `Utype` varchar(5) DEFAULT NULL,
  `lastdate` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=tis620 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `tb_nuser`
--

INSERT INTO `tb_nuser` (`NUM_OT`, `Upass`, `ward_code`, `pos`, `PP`, `status`, `Utype`, `lastdate`) VALUES
('64011', '5728', '0606', '7', '75', '1', NULL, NULL),
('61001', '8489', '0000', '7', '90', '1', NULL, NULL),
('somsang', 'lasik', '0101', '7', '01', '1', NULL, NULL),
('60058', '7135', '0303', '7', '58', '1', NULL, NULL),
('55007', '2930', '0000', '7', '66', '1', NULL, NULL),
('teekorn', 'sdc', '0707', '7', '01', '1', NULL, NULL),
('55012', '9868', '0404', '7', '00', '1', NULL, NULL),
('55013', '5662', '0404', '7', '00', '1', NULL, NULL),
('55015', '8618', '0101', '7', '60', '1', NULL, NULL),
('56003', '1105', '0000', '7', '61', '1', NULL, NULL),
('56004', '1627', '0101', '7', '89', '1', NULL, NULL),
('56006', '8017', '0101', '7', '89', '1', NULL, NULL),
('56007', '4731', '0101', '7', '89', '1', NULL, NULL),
('56010', '2812', '0404', '7', '00', '1', NULL, NULL),
('56011', '0696', '0404', '7', '00', '1', NULL, NULL),
('62009', '6171', '0101', '7', '57', '1', NULL, NULL),
('56016', '1220', '0000', '7', '61', '1', NULL, NULL),
('56017', '5274', '0606', '7', '00', '1', NULL, NULL),
('56018', '6333', '0202', '7', '64', '1', NULL, NULL),
('62008', '0339', '0000', '7', '75', '1', NULL, NULL),
('56020', '4061', '0202', '7', '89', '1', NULL, NULL),
('62007', '6158', '0606', '7', '74', '1', '', NULL),
('56023', '2043', '0404', '7', '00', '1', NULL, NULL),
('56025', '9635', '0303', '7', '57', '1', NULL, NULL),
('sahatya', 'ttcm', '0303', '7', '99', '1', NULL, NULL),
('57002', '0976', '0000', '7', '57', '1', NULL, NULL),
('57003', '5184', '0202', '7', '57', '1', NULL, NULL),
('57004', '3532', '0000', '7', '67', '1', NULL, NULL),
('57005', '7973', '0404', '7', '00', '1', NULL, NULL),
('57007', '4897', '0000', '7', '68', '1', NULL, NULL),
('57008', '1812', '0303', '7', '00', '1', NULL, NULL),
('57011', '0540', '0202', '7', '89', '1', NULL, NULL),
('nchotiro', '3007037', '0000', '7', '98', '1', NULL, NULL),
('61052', '9173', '0808', '7', '89', '1', NULL, NULL),
('57015', '7936', '0000', '7', '56', '1', NULL, NULL),
('57016', '0223', '0303', '7', '00', '1', NULL, NULL),
('58001', '1185', '0505', '7', '89', '1', NULL, NULL),
('58002', '6077', '0000', '7', '70', '1', NULL, NULL),
('58003', '2325', '0303', '7', '69', '1', NULL, NULL),
('58004', '2828', '0606', '7', '65', '1', NULL, NULL),
('58005', '1142', '0606', '7', '00', '1', NULL, NULL),
('58007', 'wipansa.chaitep2527', '0606', '7', '00', '1', NULL, NULL),
('58008', '8344', '0606', '7', '00', '1', NULL, NULL),
('58009', '8718', '0606', '7', '00', '1', NULL, NULL),
('62005', '9888', '0000', '7', '83', '1', NULL, NULL),
('surat', 'gmc', '0606', '7', '99', '1', NULL, NULL),
('58012', '2002', '0606', '7', '89', '1', NULL, NULL),
('58015', '1486', '1212', '7', '55', '1', NULL, NULL),
('58016', '1732', '0606', '7', '00', '1', NULL, NULL),
('58018', '4305', '0606', '7', '00', '1', NULL, NULL),
('58019', '1687', '0606', '7', '00', '1', NULL, NULL),
('58022', '8828', '0606', '7', '57', '1', NULL, NULL),
('58023', '7001', '0606', '7', '57', '1', NULL, NULL),
('58024', '0383', '0606', '7', '57', '1', NULL, NULL),
('58025', '7154', '0606', '7', '71', '1', NULL, NULL),
('58026', '3673', '0606', '7', '71', '1', NULL, NULL),
('58027', 'kamkaewkamkaew', '0000', '7', '67', '1', NULL, NULL),
('58028', '5139', '0606', '7', '72', '1', NULL, NULL),
('58029', '5931', '0606', '7', '57', '1', NULL, NULL),
('58032', '3567', '0606', '7', '57', '1', NULL, NULL),
('58034', '3365', '0606', '7', '00', '1', NULL, NULL),
('58035', '6793', '0606', '7', '57', '1', NULL, NULL),
('58037', '5806', '0606', '7', '00', '1', NULL, NULL),
('58039', '0776', '0303', '7', '57', '1', NULL, NULL),
('58040', '1149', '0303', '7', '57', '1', NULL, NULL),
('58042', '6749', '0606', '7', '75', '1', NULL, NULL),
('62003', '3698', '0000', '7', '66', '1', NULL, NULL),
('58044', '5526', '0606', '7', '68', '1', NULL, NULL),
('64010', '2827', '0606', '7', '84', '1', NULL, NULL),
('58049', '8769', '0606', '7', '89', '1', NULL, NULL),
('58050', '9438', '0606', '7', '89', '1', NULL, NULL),
('58052', '9788', '0606', '7', '57', '1', NULL, NULL),
('58053', '6139', '0606', '7', '57', '1', NULL, NULL),
('62036', '7777', '0606', '7', '89', '1', NULL, NULL),
('59003', '6991', '0606', '7', '57', '1', NULL, NULL),
('59005', '1740', '0606', '7', '57', '1', NULL, NULL),
('59006', '9357', '0606', '7', '89', '1', NULL, NULL),
('59007', '5762', '0707', '7', '89', '1', NULL, NULL),
('59008', '4756', '0606', '7', '73', '1', NULL, NULL),
('59009', '0066', '0606', '7', '89', '1', NULL, NULL),
('59010', '4934', '0606', '7', '76', '1', NULL, NULL),
('59011', '2172', '0606', '7', '00', '1', NULL, NULL),
('59012', '1461', '0606', '7', '76', '1', NULL, NULL),
('62006', '1718', '0303', '7', '58', '1', NULL, NULL),
('59014', '8324', '0606', '7', '89', '1', NULL, NULL),
('59015', '1186', '0606', '7', '76', '1', NULL, NULL),
('63028', '2091', '1717', '7', '89', '1', NULL, NULL),
('59017', '3127', '0606', '7', '76', '1', NULL, NULL),
('59018', '7323', '0606', '7', '76', '1', NULL, NULL),
('59019', '9057', '0606', '7', '76', '1', NULL, NULL),
('59020', '8925', '0606', '7', '75', '1', NULL, NULL),
('59021', '2328', '0606', '7', '89', '1', NULL, NULL),
('59022', '3887', '0606', '7', '89', '1', NULL, NULL),
('61055', '7255', '0606', '7', '73', '1', NULL, NULL),
('59024', '2882', '0606', '7', '00', '1', NULL, NULL),
('59025', '7266', '0606', '7', '76', '1', NULL, NULL),
('59027', '9486', '0606', '7', '76', '1', NULL, NULL),
('59028', '0604', '0606', '7', '76', '1', NULL, NULL),
('59029', '3680', '0606', '7', '76', '1', NULL, NULL),
('59030', '3993', '0606', '7', '76', '1', NULL, NULL),
('59031', '3784', '0606', '7', '76', '1', NULL, NULL),
('59032', '0442', '0606', '7', '76', '1', NULL, NULL),
('59034', '0270', '0606', '7', '78', '1', NULL, NULL),
('60060', '8687', '0303', '7', '43', '1', NULL, NULL),
('59038', '4558', '0606', '7', '79', '1', NULL, NULL),
('59039', '8548', '0000', '7', '70', '1', NULL, NULL),
('61054', '0581', '0303', '7', '92', '1', '', NULL),
('59043', '6584', '0000', '7', '67', '1', NULL, NULL),
('61053', '3376', '0000', '7', '68', '1', NULL, NULL),
('59045', '6218', '0606', '7', '65', '1', NULL, NULL),
('59047', '3481', '0606', '7', '89', '1', NULL, NULL),
('59048', '2478', '0606', '7', '89', '1', NULL, NULL),
('59049', '8047', '0606', '7', '89', '1', NULL, NULL),
('59050', '0084', '0606', '7', '89', '1', NULL, NULL),
('59051', '4079', '0606', '7', '89', '1', NULL, NULL),
('63029', '1791', '0808', '7', '76', '1', NULL, NULL),
('59053', '7374', '0606', '7', '76', '1', NULL, NULL),
('59054', '4551', '0606', '7', '76', '1', NULL, NULL),
('61051', '6112', '0000', '7', '71', '1', NULL, NULL),
('59056', '0901', '0606', '7', '76', '1', NULL, NULL),
('62035', '4718', '0202', '7', '89', '1', NULL, NULL),
('59060', '2853', '0606', '7', '89', '1', NULL, NULL),
('59061', '0632', '0606', '7', '76', '1', NULL, NULL),
('59062', '4202', '0606', '7', '76', '1', NULL, NULL),
('62027', '8740', '0606', '7', '97', '1', NULL, NULL),
('61049', '9969', '0000', '7', '55', '1', NULL, NULL),
('59065', '0644', '0606', '7', '79', '1', NULL, NULL),
('60001', '9360', '0202', '7', '76', '1', NULL, NULL),
('60002', '9400', '0606', '7', '81', '1', NULL, NULL),
('61048', '6857', '0606', '7', '89', '1', NULL, NULL),
('62034', '0038', '0606', '7', '47', '1', NULL, NULL),
('60005', '9859', '0000', '7', '82', '1', NULL, NULL),
('62038', '3912', '0606', '7', '76', '1', NULL, NULL),
('60008', '5135', '0606', '7', '76', '1', NULL, NULL),
('60009', '2721', '0606', '7', '76', '1', NULL, NULL),
('60010', '3455', '0606', '7', '76', '1', NULL, NULL),
('61047', '4095', '0606', '7', '85', '1', NULL, NULL),
('60012', '1347', '0606', '7', '89', '1', NULL, NULL),
('61045', '0723', '0606', '7', '66', '1', NULL, NULL),
('60016', '2381', '0606', '7', '65', '1', NULL, NULL),
('60017', '3491', '0606', '7', '47', '1', NULL, NULL),
('60018', '8541', '0000', '7', '84', '1', NULL, NULL),
('60019', '2588', '0606', '7', '72', '1', NULL, NULL),
('61044', '6583', '0303', '7', '76', '1', NULL, NULL),
('60021', '6171', '0606', '7', '55', '1', NULL, NULL),
('60023', '5475', '0000', '7', '86', '1', NULL, NULL),
('60024', '9267', '0606', '7', '68', '1', NULL, NULL),
('60025', '7982', '0707', '7', '87', '1', NULL, NULL),
('60026', '6830', '0808', '7', '89', '1', NULL, NULL),
('60027', '3589', '0000', '7', '47', '1', NULL, NULL),
('61043', '8951', '0000', '7', '65', '1', NULL, NULL),
('60029', '2579', '0303', '7', '57', '1', NULL, NULL),
('60030', '5939', '0808', '7', '89', '1', NULL, NULL),
('62040', '3890', '0808', '7', '76', '1', NULL, NULL),
('60032', '8852', '0808', '7', '89', '1', NULL, NULL),
('61041', '0914', '0000', '7', '65', '1', NULL, NULL),
('60034', '0254', '0000', '7', '88', '1', NULL, NULL),
('60035', '0679', '0404', '7', '64', '1', NULL, NULL),
('siripong', 'exc', '0606', '7', '99', '1', NULL, NULL),
('60037', '0308', '0606', '7', '76', '1', NULL, NULL),
('60038', '9990', '0606', '7', '89', '1', NULL, NULL),
('62032', '1970', '0606', '7', '89', '1', NULL, NULL),
('61039', '8974', '0000', '7', '76', '1', '', NULL),
('61038', '5324', '0606', '7', '80', '1', NULL, NULL),
('60042', '0956', '0404', '7', '76', '1', NULL, NULL),
('60043', '2330', '0000', '7', '73', '1', NULL, NULL),
('60044', '5054', '0000', '7', '73', '1', NULL, NULL),
('60045', '0431', '0000', '7', '55', '1', NULL, NULL),
('60046', '6813', '0000', '7', '66', '1', NULL, NULL),
('64008', '2126', '0808', '7', '66', '1', NULL, NULL),
('60048', '2087', '0000', '7', '55', '1', NULL, NULL),
('60049', '8137', '0000', '7', '57', '1', NULL, NULL),
('60050', '6225', '0000', '7', '57', '1', NULL, NULL),
('60051', '6940', '0000', '7', '57', '1', NULL, NULL),
('60052', '2551', '0000', '7', '57', '1', NULL, NULL),
('60053', '1855', '0000', '7', '61', '1', NULL, NULL),
('60054', '7639', '0707', '7', '87', '1', NULL, NULL),
('60055', '8299', '0707', '7', '87', '1', NULL, NULL),
('62030', '4900', '0000', '7', '68', '1', NULL, NULL),
('lsinghak', 'dawan123', '0000', '7', '00', '1', NULL, NULL),
('narisa', 'ttcm', '0303', '7', '00', '1', NULL, NULL),
('nipa', 'gmc', '0606', '7', '00', '1', NULL, NULL),
('isuksawa', 'jaew0705', '0303', '7', '00', '1', NULL, NULL),
('61036', '1780', '0000', '7', '47', '1', NULL, NULL),
('61003', '1408', '0000', '7', '91', '1', NULL, NULL),
('64013', '9191', '0000', '7', '56', '1', NULL, NULL),
('61006', '3319', '0606', '7', '75', '1', NULL, NULL),
('62029', '9548', '0606', '7', '97', '1', NULL, NULL),
('61008', '3158', '0505', '7', '89', '1', NULL, NULL),
('61035', '4066', '0000', '7', '81', '1', NULL, NULL),
('61011', '0294', '0000', '7', '84', '1', NULL, NULL),
('61012', '3671', '0606', '7', '76', '1', NULL, NULL),
('61013', '6757', '0606', '7', '76', '1', NULL, NULL),
('61015', '2065', '0606', '7', '84', '1', NULL, NULL),
('61016', '4988', '0606', '7', '89', '1', NULL, NULL),
('62028', '5947', '0000', '7', '86', '1', NULL, NULL),
('61018', '147258147258', '0000', '7', '77', '1', NULL, NULL),
('61019', '8412', '0000', '7', '72', '1', NULL, NULL),
('61020', '6240', '1212', '7', '72', '1', NULL, NULL),
('61033', '3004', '0606', '7', '89', '1', NULL, NULL),
('61022', '5317', '0404', '7', '47', '1', NULL, NULL),
('61032', '5760', '0606', '7', '55', '1', NULL, NULL),
('61024', '1801', '0000', '7', '68', '1', NULL, NULL),
('61028', '9026', '0606', '7', '89', '1', NULL, NULL),
('61026', '7237', '0404', '7', '64', '1', NULL, NULL),
('61034', '3281', '0000', '7', '70', '1', NULL, NULL),
('62039', '9950', '0606', '7', '64', '1', NULL, NULL),
('62011', '8809', '0606', '7', '89', '1', NULL, NULL),
('62025', '2358', '0606', '7', '96', '1', NULL, NULL),
('62037', '4046', '0303', '7', '89', '1', NULL, NULL),
('62014', '9225', '0000', '7', '55', '1', NULL, NULL),
('62015', '7400', '0000', '7', '72', '1', NULL, NULL),
('62016', '7481', '0000', '7', '55', '1', NULL, NULL),
('62023', '3344', '0606', '7', '76', '1', NULL, NULL),
('62018', '3181', '0000', '7', '55', '1', NULL, NULL),
('62019', '0780', '0000', '7', '72', '1', NULL, NULL),
('62020', '2401', '0606', '7', '94', '1', NULL, NULL),
('62021', '7424', '0606', '7', '95', '1', NULL, NULL),
('62022', '8768', '0303', '7', '57', '1', NULL, NULL),
('marudee', 'petct', '0404', '7', '01', '1', NULL, NULL),
('pailin', 'women', '0202', '7', '01', '1', NULL, NULL),
('62041', '4010', '0000', '7', '65', '1', NULL, NULL),
('62042', '4425', '0808', '7', '76', '1', NULL, NULL),
('62043', '0741', '0000', '7', '55', '1', NULL, NULL),
('62044', '1465', '0808', '7', '89', '1', NULL, NULL),
('64014', '0008', '0808', '7', '89', '1', NULL, NULL),
('63017', '3553', '0000', '7', '43', '1', NULL, NULL),
('63013', '3529', '0000', '7', '81', '1', NULL, NULL),
('63012', '2532', '0000', '7', '72', '1', NULL, NULL),
('63011', '3293', '0606', '7', '89', '1', NULL, NULL),
('64009', '9623', '0606', '7', '80', '1', NULL, NULL),
('63008', '8451', '0303', '7', '47', '1', NULL, NULL),
('63007', '1189', '0000', '7', '55', '1', NULL, NULL),
('63006', '1268', '0000', '7', '68', '1', NULL, NULL),
('63004', '2249', '0303', '7', '58', '1', NULL, NULL),
('63003', '5343', '0000', '7', '57', '1', NULL, NULL),
('63002', '9819', '0000', '7', '43', '1', NULL, NULL),
('63001', '2101', '0000', '7', '73', '1', NULL, NULL),
('62050', '2185', '0000', '7', '70', '1', NULL, NULL),
('62049', '4602', '0606', '7', '96', '1', NULL, NULL),
('62048', '8625', '0606', '7', '76', '1', NULL, NULL),
('62047', '8106', '0606', '7', '89', '1', NULL, NULL),
('62046', '9032', '0606', '7', '72', '1', NULL, NULL),
('62045', '9830', '0606', '7', '89', '1', NULL, NULL),
('63026', '5053', '0101', '7', '76', '1', NULL, NULL),
('63015', '1085', '0808', '7', '89', '1', NULL, NULL),
('63016', '9086', '0808', '7', '89', '1', NULL, NULL),
('63018', '7653', '0606', '7', '89', '1', NULL, NULL),
('63030', '7487', '0000', '7', '66', '1', NULL, NULL),
('63021', '6744', '0606', '7', '96', '1', NULL, NULL),
('63022', '7486', '0606', '7', '81', '1', NULL, NULL),
('63023', '8736', '0303', '7', '47', '1', NULL, NULL),
('63024', '3641', '0000', '7', '75', '1', NULL, NULL),
('63025', '8632', '0606', '7', '75', '1', NULL, NULL),
('63027', '4683', '0707', '7', '89', '1', NULL, NULL),
('63031', '2532', '1717', '7', '76', '1', NULL, NULL),
('63032', '9535', '1717', '7', '76', '1', NULL, NULL),
('63033', '2648', '0000', '7', '84', '1', NULL, NULL),
('63034', '3512', '0000', '7', '65', '1', NULL, NULL),
('63035', '1605', '1717', '7', '73', '1', NULL, NULL),
('63036', '1646', '0101', '7', '76', '1', NULL, NULL),
('20017', '6025', '0606', '7', '89', '1', NULL, NULL),
('20041', '4591', '0000', '7', '89', '1', NULL, NULL),
('63019', '3996', '1717', '7', '89', '1', NULL, NULL),
('63037', '2309', '0808', '7', '89', '1', NULL, NULL),
('63038', '4911', '0606', '7', '73', '1', NULL, NULL),
('63039', '0353', '0606', '7', '73', '1', NULL, NULL),
('64001', '6783', '0606', '7', '89', '1', NULL, NULL),
('64002', '1742', '0606', '7', '89', '1', NULL, NULL),
('64003', '2764', '0606', '7', '89', '1', NULL, NULL),
('64004', '3791', '0606', '7', '57', '1', NULL, NULL),
('64005', '1245', '0606', '7', '57', '1', NULL, NULL),
('64006', '2821', '0606', '7', '89', '1', NULL, NULL),
('64007', '0739', '0606', '7', '89', '1', NULL, NULL),
('64015', '7053', '0000', '7', '68', '1', NULL, NULL),
('64016', '2023', '0000', '7', '44', '1', NULL, NULL),
('64017', '5774', '0606', '7', '57', '1', NULL, NULL),
('64018', '8670', '1212', '7', '55', '1', NULL, NULL),
('64019', '2401', '1212', '7', '72', '1', NULL, NULL),
('64020', '3588', '1212', '7', '55', '1', NULL, NULL),
('arintaya', '147258', '0000', '7', '01', '1', NULL, NULL),
('64021', '1082', '0000', '7', '68', '1', NULL, NULL),
('64022', '0709', '0000', '7', '47', '1', NULL, NULL),
('64023', '3313', '0707', '7', '87', '1', NULL, NULL),
('64024', '9390', '0303', '7', '47', '1', NULL, NULL),
('64025', '4167', '0000', '7', '57', '1', NULL, NULL),
('64026', '1294', '0808', '7', '57', '1', NULL, NULL),
('64027', '321654321654', '0000', '7', '77', '1', NULL, NULL),
('64028', '8977', '1616', '7', '57', '1', NULL, NULL),
('64029', '8638', '1717', '7', '73', '1', NULL, NULL),
('64030', '5894', '0808', '7', '89', '1', NULL, NULL),
('64031', '9396', '0808', '7', '89', '1', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `serv_node`
--
ALTER TABLE `serv_node`
  ADD PRIMARY KEY (`node_id`);

--
-- Indexes for table `serv_permission`
--
ALTER TABLE `serv_permission`
  ADD PRIMARY KEY (`permission_id`);

--
-- Indexes for table `serv_request`
--
ALTER TABLE `serv_request`
  ADD PRIMARY KEY (`req_id`);

--
-- Indexes for table `serv_title_status`
--
ALTER TABLE `serv_title_status`
  ADD PRIMARY KEY (`req_title_id`) USING BTREE;

--
-- Indexes for table `serv_use`
--
ALTER TABLE `serv_use`
  ADD PRIMARY KEY (`use_id`);

--
-- Indexes for table `tb_nuser`
--
ALTER TABLE `tb_nuser`
  ADD PRIMARY KEY (`NUM_OT`) USING BTREE;

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `serv_node`
--
ALTER TABLE `serv_node`
  MODIFY `node_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `serv_permission`
--
ALTER TABLE `serv_permission`
  MODIFY `permission_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `serv_title_status`
--
ALTER TABLE `serv_title_status`
  MODIFY `req_title_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `serv_use`
--
ALTER TABLE `serv_use`
  MODIFY `use_id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
