-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 08, 2022 at 03:56 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `labdata`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `addUser` (IN `name` VARCHAR(150), IN `dgn` INT(11), IN `pwd` VARCHAR(150), IN `emil` VARCHAR(150), IN `idcd` BIGINT(20), IN `nmbr` BIGINT(20))  BEGIN
    INSERT INTO `tb_emp` ( `e_name`, `e_designation`, `e_password`, `e_email`, `e_cnic`, `e_contact`) VALUES (name, dgn,pwd, emil,idcd,nmbr);
    END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `approved` ()  BEGIN
SELECT * from tb_prd left join tb_tester on tb_tester.t_prod = tb_prd.p_id where tb_tester.t_status = 'Passed';
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `delItem` (IN `id` INT(11))  BEGIN
DELETE FROM tb_prd WHERE tb_prd.p_id=id;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `delUser` (IN `id` INT(10))  DELETE FROM tb_emp WHERE tb_emp.e_id=id$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `editUser` (IN `id` INT(11), IN `name` VARCHAR(150), IN `dgn` INT(11), IN `pwd` VARCHAR(150), IN `emil` VARCHAR(150), IN `idcd` BIGINT(20), IN `nmbr` BIGINT(20))  UPDATE tb_emp SET e_name = name , e_designation = dgn , e_password = pwd , e_email = emil , e_cnic = idcd , e_contact = nmbr WHERE tb_emp.e_id = id$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `getItem` ()  BEGIN
SELECT * from tb_prd left join tb_tester on tb_tester.t_prod = tb_prd.p_id where tb_tester.t_prod is null;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `gettest` ()  BEGIN

SELECT p_name,p_img,p_sku,e_name,ts_name,
t_prod,t_status,t_test,t_date,t_reason from tb_prd join tb_tester on tb_prd.p_id = tb_tester.t_prod join tb_emp on tb_tester.t_emp = tb_emp.e_id 
join tb_testcategory on tb_tester.t_test = tb_testcategory.ts_id  ;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `getUser` ()  BEGIN
SELECT e_id, e_name, e_password, e_email, e_cnic, e_contact, d_name AS e_designation from tb_dest join tb_emp on d_id = e_designation WHERE d_id!=1003;
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `pndcount` ()  BEGIN
SELECT count(p_id)  Pending from tb_prd left join tb_tester on tb_tester.t_prod = tb_prd.p_id where tb_tester.t_prod is null;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `selUser` (IN `eid` INT(11))  SELECT * FROM tb_emp WHERE tb_emp.e_id=eid$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `tb_dest`
--

CREATE TABLE `tb_dest` (
  `d_id` int(11) NOT NULL,
  `d_name` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_dest`
--

INSERT INTO `tb_dest` (`d_id`, `d_name`) VALUES
(1001, 'Tester'),
(1002, 'Product Adder'),
(1003, 'Admin');

-- --------------------------------------------------------

--
-- Table structure for table `tb_emp`
--

CREATE TABLE `tb_emp` (
  `e_id` int(11) NOT NULL,
  `e_name` varchar(150) NOT NULL,
  `e_designation` int(11) DEFAULT NULL,
  `e_password` varchar(150) NOT NULL,
  `e_email` varchar(150) NOT NULL,
  `e_cnic` bigint(20) NOT NULL,
  `e_contact` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_emp`
--

INSERT INTO `tb_emp` (`e_id`, `e_name`, `e_designation`, `e_password`, `e_email`, `e_cnic`, `e_contact`) VALUES
(30, 'Master User', 1003, 'admin!123', 'admin@gmail.com', 4210185754210, 3170802260),
(35, 'Product adder', 1002, '123', 'product@gmail.com', 4101879867565, 967767678),
(37, 'New Tester', 1001, '123', 'test2@gmail.com', 4210189432223, 3412345339);

-- --------------------------------------------------------

--
-- Table structure for table `tb_mail`
--

CREATE TABLE `tb_mail` (
  `m_id` int(11) NOT NULL,
  `m_email` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_mail`
--

INSERT INTO `tb_mail` (`m_id`, `m_email`) VALUES
(9, 'taahaa.raafi@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `tb_prd`
--

CREATE TABLE `tb_prd` (
  `p_id` int(11) NOT NULL,
  `p_name` varchar(150) NOT NULL,
  `p_manufacture` date NOT NULL,
  `p_description` varchar(300) NOT NULL,
  `p_img` varchar(300) NOT NULL,
  `p_sku` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_prd`
--

INSERT INTO `tb_prd` (`p_id`, `p_name`, `p_manufacture`, `p_description`, `p_img`, `p_sku`) VALUES
(6, 'blub', '2003-05-09', 'Taha', 'posts.png', 'blb-0001'),
(15, 'Book', '2022-05-31', 'New Collection', 'saddat-e-amrohaLogo.png', 'bk-2021'),
(20, 'Server Motherboard', '2022-07-01', 'New Motherboard', 'Motherboard.jpg', 'SM-3302'),
(21, 'External Hard Drive', '2022-06-30', 'New Portable External Hard Drive', 'External-HardDrive.jpg', 'HD-0299'),
(22, 'Calculator', '2022-07-01', 'A calculator is a device that performs arithmetic operations on numbers. Basic calculators can do only addition, subtraction, multiplication and division mathematical calculations.', 'Casio_calculator_JS-20WK_in_201901_002.jpg', 'Cal-9300'),
(23, 'Radio', '2000-07-06', '1a : the wireless transmission and reception of electric impulses or signals by means of electromagnetic waves. b : the use of these waves for the wireless transmission of electric impulses into which sound is converted. 2 : a radio message. 3 : a radio receiving set. 4a : a radio transmitting stati', 'radio.png', 'Rad-001'),
(24, 'Refrigerator', '2022-07-29', 'A refrigerator is an open system that dispels heat from a closed space to a warmer area, usually a kitchen or another room.', 'refrigerator.png', 'Ref-9110'),
(25, 'Remote control', '2019-06-18', 'A remote control (RC) is a small, usually hand-held, electronic device for controlling another device, such as a television, radio or audio/video recording device.', 'remote contl.jpg', 'Rem-9001'),
(26, 'Scanner', '2008-06-06', 'A scanner is a device that captures images from photographic prints, posters, magazine pages and similar sources for computer editing and display. ', 'scanner.jpg', 'Scr-8119'),
(27, 'Speaker', '2005-07-15', 'loudspeaker, also called speaker, in sound reproduction, device for converting electrical energy into acoustical signal energy that is radiated into a room or open air', 'speaker.jpg', 'Spk-1291'),
(28, 'Television', '2015-07-17', 'an electronic system of transmitting transient images of fixed or moving objects together with sound over a wire or through space by apparatus that converts light and sound into electrical waves and reconverts them into visible light rays and audible sound. 2 : a television receiving set.', 'television.jpg', 'TV-1212'),
(29, 'Timer', '1997-08-05', 'one that times: such as. a : timepiece especially : a stopwatch for timing races. b : timekeeper. c : a device (such as a clock) that indicates by a sound the end of an interval of time or that starts or stops a device at predetermined times.', 'timer.jpg', 'Tmr-1215'),
(30, 'Torch', '1985-06-13', 'A torch is a small electric light which is powered by batteries and which you can carry in your hand. ... A torch is a long stick with burning material at one end ...', 'torch.jpg', 'Trc-0777'),
(31, 'USB', '2008-05-31', 'A Universal Serial Bus (USB) is a common interface that enables communication between devices and a host controller such as a personal computer (PC) or smartphone. It connects peripheral devices such as digital cameras, mice, keyboards, printers, scanners, media devices, external hard drives and fla', 'USB.jpg', 'USB-0001'),
(32, 'Ceiling fan', '2012-07-25', 'A ceiling fan is a fan mounted on the ceiling of a room or space, usually electrically powered, that uses hub-mounted rotating blades to circulate air. They cool people effectively by increasing air speed.', '005-scaled.jpg', 'Fan-1828'),
(33, 'Blower', '2017-07-19', 'New\r\na machine for supplying air at a moderate pressure, as to supply forced drafts or supercharge and scavenge diesel engines. snow blower.', 'blower.png', 'Blr-9938'),
(34, 'Camera', '2000-07-14', ' a device that consists of a lightproof chamber with an aperture fitted with a lens and a shutter through which the image of an object is projected onto a surface for recording (as on a photosensitive film or an electronic sensor) or for translation into electrical impulses (as for television broadc', 'camera.jpg', 'Cmr-1222'),
(35, 'Clock', '2022-05-28', 'A clock is a machine in which a device that performs regular movements in equal intervals of time is linked to a counting mechanism that records the number of movements\r\n', 'clock.png', 'Clk-0002'),
(36, 'CPU', '2004-10-13', 'A processor (CPU) is the logic circuitry that responds to and processes the basic instructions that drive a computer. The CPU is seen as the main and most crucial integrated circuitry (IC) chip in a computer, as it is responsible for interpreting most of computers commands.', 'CPU.jpg', 'CPU-1221'),
(37, 'Drill', '2018-06-15', 'an instrument with an edged or pointed end for making holes in hard substances by revolving or by a succession of blows', 'drill.jpg', 'Drl-0013'),
(38, 'Drone', '2007-01-29', 'Essentially, a drone is a flying robot that can be remotely controlled or fly autonomously using software-controlled flight plans in its embedded systems, that work in conjunction with onboard sensors and a global positioning system (GPS). UAVs were most often associated with the military.', 'drone.png', 'Drn-0034'),
(39, 'Guitar', '2008-11-10', 'New', 'guitar.jpg', 'Gtr-8881'),
(40, 'Iron', '2019-11-13', 'New brand iron', 'iron.jpg', 'Irn-9901'),
(41, 'Laptop', '2009-07-14', 'A laptop computer, sometimes called a notebook computer by manufacturers, is a battery- or AC-powered personal computer generally smaller than a briefcase that can easily be transported and conveniently used in temporary spaces such as on airplanes, in libraries, temporary offices, and at meetings.', 'laptop.jpg', 'Lpt-9994'),
(42, 'Mouse', '2009-11-18', 'A mouse is a small device that a computer user pushes across a desk surface in order to point to a place on a display screen and to select one or more actions to take from that position', 'mouse.jpg', 'Mos-1244'),
(43, 'Phone', '2022-07-07', 'New', 'phone.jpg', 'Phn-3331'),
(44, 'Projector', '2021-06-16', 'A projector is an output device that takes images generated by a computer or Blu-ray player and reproduce them by projection onto a screen, wall, or another surface.', 'projector.jpg', 'Prj-1992'),
(45, 'Smart Watch', '2001-08-10', 'New', 'smart watch.jpg', 'Smr-9997'),
(46, 'Washing Machine', '2022-06-06', 'A washing machine is a machine that washes dirty clothes. It contains a barrel into which the clothes are placed. This barrel is filled with water, and then rotated very quickly by the use of a motor to make the water remove dirt from the clothes.\r\n', 'washing machine.jpg', 'wsc-9999'),
(47, 'Web camera', '2022-07-12', 'A webcam is a small digital video camera directly or indirectly connected to a computer or a computer network', 'web came.png', 'Web-9982');

-- --------------------------------------------------------

--
-- Table structure for table `tb_testcategory`
--

CREATE TABLE `tb_testcategory` (
  `ts_id` int(11) NOT NULL,
  `ts_name` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_testcategory`
--

INSERT INTO `tb_testcategory` (`ts_id`, `ts_name`) VALUES
(1, '[Circuit Testing]'),
(2, '[Environment testing]'),
(3, '[Automated testing]'),
(4, '[Regression testing]');

-- --------------------------------------------------------

--
-- Table structure for table `tb_tester`
--

CREATE TABLE `tb_tester` (
  `t_id` int(11) NOT NULL,
  `t_prod` int(11) NOT NULL,
  `t_status` varchar(100) NOT NULL,
  `t_test` int(11) NOT NULL,
  `t_date` date NOT NULL,
  `t_reason` varchar(250) NOT NULL,
  `t_emp` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_tester`
--

INSERT INTO `tb_tester` (`t_id`, `t_prod`, `t_status`, `t_test`, `t_date`, `t_reason`, `t_emp`) VALUES
(3, 6, 'Passed', 1, '2022-07-08', 'asdad', 30),
(4, 15, 'Failed', 1, '2022-07-07', 'asdadad', 30),
(5, 20, 'Passed', 1, '2022-07-13', 'cbcvb', 30),
(6, 21, 'Passed', 1, '2022-07-07', 'vccxvcxvxcv', 30),
(7, 22, 'Passed', 1, '2022-07-01', 'sdfsfsf', 30);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_dest`
--
ALTER TABLE `tb_dest`
  ADD PRIMARY KEY (`d_id`);

--
-- Indexes for table `tb_emp`
--
ALTER TABLE `tb_emp`
  ADD PRIMARY KEY (`e_id`),
  ADD UNIQUE KEY `e_email` (`e_email`,`e_cnic`,`e_contact`),
  ADD KEY `e_designation` (`e_designation`);

--
-- Indexes for table `tb_mail`
--
ALTER TABLE `tb_mail`
  ADD PRIMARY KEY (`m_id`);

--
-- Indexes for table `tb_prd`
--
ALTER TABLE `tb_prd`
  ADD PRIMARY KEY (`p_id`);

--
-- Indexes for table `tb_testcategory`
--
ALTER TABLE `tb_testcategory`
  ADD PRIMARY KEY (`ts_id`);

--
-- Indexes for table `tb_tester`
--
ALTER TABLE `tb_tester`
  ADD PRIMARY KEY (`t_id`),
  ADD KEY `t_prod` (`t_prod`),
  ADD KEY `t_test` (`t_test`),
  ADD KEY `t_emp` (`t_emp`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_dest`
--
ALTER TABLE `tb_dest`
  MODIFY `d_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1004;

--
-- AUTO_INCREMENT for table `tb_emp`
--
ALTER TABLE `tb_emp`
  MODIFY `e_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `tb_mail`
--
ALTER TABLE `tb_mail`
  MODIFY `m_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tb_prd`
--
ALTER TABLE `tb_prd`
  MODIFY `p_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `tb_testcategory`
--
ALTER TABLE `tb_testcategory`
  MODIFY `ts_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tb_tester`
--
ALTER TABLE `tb_tester`
  MODIFY `t_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_tester`
--
ALTER TABLE `tb_tester`
  ADD CONSTRAINT `tb_tester_ibfk_1` FOREIGN KEY (`t_prod`) REFERENCES `tb_prd` (`p_id`),
  ADD CONSTRAINT `tb_tester_ibfk_2` FOREIGN KEY (`t_test`) REFERENCES `tb_testcategory` (`ts_id`),
  ADD CONSTRAINT `tb_tester_ibfk_3` FOREIGN KEY (`t_emp`) REFERENCES `tb_emp` (`e_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
