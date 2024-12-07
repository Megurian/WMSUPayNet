SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

CREATE DATABASE IF NOT EXISTS `paynet` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `paynet`;

CREATE TABLE `accounts` (
  `id` int(11) NOT NULL,
  `student_id` int(11) DEFAULT NULL,
  `admin_id` int(11) DEFAULT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('Student','SuperAdmin','CollegeAdmin','OrganizationAdmin') NOT NULL,
  `college_id` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

TRUNCATE TABLE `accounts`;
INSERT INTO `accounts` (`id`, `student_id`, `admin_id`, `username`, `email`, `password`, `role`, `college_id`, `created_at`) VALUES
(2, 202201078, NULL, 'EH202201078', 'eh202201078@wmsu.edu.ph', '$argon2id$v=19$m=2048,t=4,p=2$ejQuN3dvVkZJSm91RFp6Lg$x2uPsge+VtkJ4Zl4+CfX+wHTvUagtvaemeKyXeyf+Fg', 'Student', 1, '2024-12-02 00:06:13'),
(3, NULL, NULL, 'COLLEGEADMIN', 'admin@gmail.com', 'admin', 'CollegeAdmin', 1, '2024-12-05 21:15:18'),
(4, NULL, NULL, 'ORGADMIN', 'orgadmin@gmail.com', 'admin', 'OrganizationAdmin', 1, '2024-12-05 21:15:50'),
(5, NULL, NULL, 'SUPERADMIN', 'superadmin@gmail.com', 'admin', 'SuperAdmin', NULL, '2024-12-05 21:16:22'),
(7, NULL, 7, 'CHILLADMIN', 'chilladmin@gmail.com', '$argon2id$v=19$m=2048,t=4,p=2$UDY5UTI2d05QNWVJLkEybA$yRtO6ISLtFbrZAPa86t87ssfaR2qrr4Rzr7A2yfhp5o', 'CollegeAdmin', 1, '2024-12-07 00:47:34');

CREATE TABLE `admins` (
  `admin_id` int(11) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `middle_name` varchar(20) DEFAULT NULL,
  `last_name` varchar(20) NOT NULL,
  `suffix_id` int(11) DEFAULT NULL,
  `email` varchar(50) NOT NULL,
  `college_id` int(11) NOT NULL,
  `organization_id` int(11) DEFAULT NULL,
  `org_position` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

TRUNCATE TABLE `admins`;
INSERT INTO `admins` (`admin_id`, `first_name`, `middle_name`, `last_name`, `suffix_id`, `email`, `college_id`, `organization_id`, `org_position`) VALUES
(2, 'MEG RYAN', 'VEGA', 'GOMEZ', NULL, 'okiller244@gmail.com', 1, NULL, ''),
(3, 'Meg Ryan', 'Vega', 'Gomez', NULL, 'eh202201078@wmsu.edu.ph', 1, NULL, ''),
(7, 'Fritzie', 'Dela Cruz', 'Balagosa', 5, 'chilladmin@gmail.com', 1, NULL, '');

CREATE TABLE `colleges` (
  `id` int(11) NOT NULL,
  `college` varchar(255) NOT NULL,
  `logo_directory` text NOT NULL,
  `description` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

TRUNCATE TABLE `colleges`;
INSERT INTO `colleges` (`id`, `college`, `logo_directory`, `description`, `created_at`) VALUES
(1, 'College of Computing Studies', '../../images/uploads/CCS_Logo.png', '', '2024-12-06 17:18:37');

CREATE TABLE `courses` (
  `id` int(11) NOT NULL,
  `college_id` int(11) NOT NULL,
  `course` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

TRUNCATE TABLE `courses`;
INSERT INTO `courses` (`id`, `college_id`, `course`) VALUES
(1, 1, 'Computer Science'),
(2, 1, 'Information Technology'),
(3, 1, 'Computer Technology');

CREATE TABLE `organizations` (
  `id` int(11) NOT NULL,
  `college_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `logo_directory` text NOT NULL,
  `description` text NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

TRUNCATE TABLE `organizations`;
INSERT INTO `organizations` (`id`, `college_id`, `name`, `logo_directory`, `description`, `status`, `created_at`) VALUES
(2, 1, 'Venom Publication', '../../images/uploads/VP_Logo.jpg', 'dsa', 1, '2024-12-07 04:24:45');

CREATE TABLE `religions` (
  `id` int(11) NOT NULL,
  `religion` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

TRUNCATE TABLE `religions`;
INSERT INTO `religions` (`id`, `religion`) VALUES
(1, 'Roman Catholic'),
(2, 'Islam'),
(3, 'Iglesia ni Cristo');

CREATE TABLE `students` (
  `id` int(11) NOT NULL,
  `school_id` int(11) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `middle_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) NOT NULL,
  `suffix_id` int(11) DEFAULT NULL,
  `year_level` int(11) NOT NULL,
  `religion_id` int(11) NOT NULL,
  `college_id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `is_registered` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

TRUNCATE TABLE `students`;
INSERT INTO `students` (`id`, `school_id`, `first_name`, `middle_name`, `last_name`, `suffix_id`, `year_level`, `religion_id`, `college_id`, `course_id`, `is_registered`) VALUES
(1, 202201078, 'Meg Ryan', 'Vega', 'Gomez', NULL, 3, 1, 1, 1, 1),
(6, 202201076, 'Fritzie', 'Dela Cruz', 'Balagosa', NULL, 3, 1, 1, 1, 0);

CREATE TABLE `suffixes` (
  `id` int(11) NOT NULL,
  `extension` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

TRUNCATE TABLE `suffixes`;
INSERT INTO `suffixes` (`id`, `extension`) VALUES
(2, 'Sr.'),
(3, 'III'),
(4, 'IV'),
(5, 'Jr.');


ALTER TABLE `accounts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `student_id` (`student_id`),
  ADD KEY `college_id` (`college_id`),
  ADD KEY `admin_id` (`admin_id`);

ALTER TABLE `admins`
  ADD PRIMARY KEY (`admin_id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `college_id` (`college_id`),
  ADD KEY `organization_id` (`organization_id`);

ALTER TABLE `colleges`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `college_id` (`college_id`);

ALTER TABLE `organizations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `college_id` (`college_id`);

ALTER TABLE `religions`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `students`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `school_id` (`school_id`),
  ADD KEY `suffix_id` (`suffix_id`),
  ADD KEY `religion_id` (`religion_id`),
  ADD KEY `college_id` (`college_id`),
  ADD KEY `course_id` (`course_id`);

ALTER TABLE `suffixes`
  ADD PRIMARY KEY (`id`);


ALTER TABLE `accounts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

ALTER TABLE `admins`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

ALTER TABLE `colleges`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

ALTER TABLE `courses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

ALTER TABLE `organizations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

ALTER TABLE `religions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

ALTER TABLE `students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

ALTER TABLE `suffixes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;


ALTER TABLE `accounts`
  ADD CONSTRAINT `accounts_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `students` (`school_id`),
  ADD CONSTRAINT `accounts_ibfk_2` FOREIGN KEY (`college_id`) REFERENCES `colleges` (`id`),
  ADD CONSTRAINT `accounts_ibfk_3` FOREIGN KEY (`admin_id`) REFERENCES `admins` (`admin_id`);

ALTER TABLE `admins`
  ADD CONSTRAINT `admins_ibfk_1` FOREIGN KEY (`college_id`) REFERENCES `colleges` (`id`),
  ADD CONSTRAINT `admins_ibfk_2` FOREIGN KEY (`organization_id`) REFERENCES `organizations` (`id`);

ALTER TABLE `courses`
  ADD CONSTRAINT `courses_ibfk_1` FOREIGN KEY (`college_id`) REFERENCES `colleges` (`id`);

ALTER TABLE `organizations`
  ADD CONSTRAINT `organizations_ibfk_1` FOREIGN KEY (`college_id`) REFERENCES `colleges` (`id`);

ALTER TABLE `students`
  ADD CONSTRAINT `students_ibfk_2` FOREIGN KEY (`suffix_id`) REFERENCES `suffixes` (`id`),
  ADD CONSTRAINT `students_ibfk_3` FOREIGN KEY (`religion_id`) REFERENCES `religions` (`id`),
  ADD CONSTRAINT `students_ibfk_4` FOREIGN KEY (`college_id`) REFERENCES `colleges` (`id`),
  ADD CONSTRAINT `students_ibfk_5` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
