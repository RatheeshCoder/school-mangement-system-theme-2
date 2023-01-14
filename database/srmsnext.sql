

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";

SET AUTOCOMMIT = 0; 

START TRANSACTION;

SET time_zone = "+00:00";

-- Database: `srmsnext`
-- Table structure for table `admin_login`

CREATE TABLE `admin_login` (
  `userid` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT; 


-- Inserting data for table `admin_login`

INSERT INTO `admin_login` (`userid`, `password`) VALUES
('admin', '123');

-- Table structure for table `class`

CREATE TABLE `class` (
  `name` varchar(30) NOT NULL,
  `id` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Table structure for table `result`

CREATE TABLE `result` (
  `name` varchar(30) NOT NULL,
  `rno` int(3) NOT NULL,
  `class` varchar(30) NOT NULL,
  `p1` int(3) NOT NULL,
  `p2` int(3) NOT NULL,
  `p3` int(3) NOT NULL,
  `p4` int(3) NOT NULL,
  `p5` int(3) NOT NULL,
  `marks` int(3) NOT NULL,
  `percentage` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Table structure for table `students`

CREATE TABLE `students` (
  `name` varchar(30) NOT NULL,
  `rno` int(3) NOT NULL,
  `class_name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


-- Indexes for tables

-- Indexes for table `admin_login`

ALTER TABLE `admin_login`
  ADD PRIMARY KEY (`userid`);


-- Indexes for table `class`

ALTER TABLE `class`
  ADD PRIMARY KEY (`name`),
  ADD UNIQUE KEY `id` (`id`);


-- Indexes for table `result`

ALTER TABLE `result`
  ADD KEY `class` (`class`),
  ADD KEY `name` (`name`,`rno`);


-- Indexes for table `students`

ALTER TABLE `students`
  ADD PRIMARY KEY (`name`,`rno`),
  ADD KEY `class_name` (`class_name`);

-- Adding Constraints to `result` and `students` tables
-- Constraints for table `result`

ALTER TABLE `result`
  ADD CONSTRAINT `result_ibfk_1` FOREIGN KEY (`class`) REFERENCES `class` (`name`),
  ADD CONSTRAINT `result_ibfk_2` FOREIGN KEY (`name`,`rno`) REFERENCES `students` (`name`, `rno`);

-- Constraints for table `students`

ALTER TABLE `students`
  ADD CONSTRAINT `students_ibfk_1` FOREIGN KEY (`class_name`) REFERENCES `class` (`name`);

-- Commiting all the changes to database
COMMIT;
