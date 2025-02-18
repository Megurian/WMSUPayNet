SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

CREATE DATABASE IF NOT EXISTS paynet DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE paynet;

CREATE TABLE accounts (
  id int(11) NOT NULL,
  username varchar(255) NOT NULL,
  email varchar(255) NOT NULL,
  password varchar(255) NOT NULL,
  role enum('Student','SuperAdmin','CollegeAdmin','OrganizationAdmin') NOT NULL,
  college_id int(11) DEFAULT NULL,
  created_at timestamp NOT NULL DEFAULT current_timestamp(),
  updated_at timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO accounts (id, username, email, password, role, college_id, created_at, updated_at) VALUES
(9, 'EH202201078', 'eh202201078@wmsu.edu.ph', '$argon2id$v=19$m=2048,t=4,p=2$bFE1TmtWMFlNMk1OMXl5Nw$P7q1qabuDU2DpVHjEtGuexWuKEY78uZVKMpywsWqrOA', 'Student', 1, '2025-02-03 23:36:32', '2025-02-03 23:36:32'),
(10, 'SUPERADMIN', 'SuperAdmin@testing.com', 'admin', 'SuperAdmin', NULL, '2025-02-03 23:43:44', '2025-02-03 23:43:44'),
(11, 'COLLEGEADMIN', 'CollegeAdmin@testing.com', 'admin', 'CollegeAdmin', 1, '2025-02-03 23:45:16', '2025-02-03 23:45:16'),
(12, 'ORGADMIN', 'OrgAdmin@testing.com', 'admin', 'OrganizationAdmin', NULL, '2025-02-03 23:45:48', '2025-02-03 23:45:48'),
(14, 'OKILLER244', 'okiller244@gmail.com', '$argon2id$v=19$m=2048,t=4,p=2$eVNWcThvRGNoUHRZWWF4Yw$UxuQwC4OZoaB3634FJqnaJ26SbTsGYCNHW6uIMFmie8', 'CollegeAdmin', 1, '2025-02-14 01:32:05', '2025-02-14 01:32:05'),
(15, 'CRISANTO', 'crisanto@gmail.com', '$argon2id$v=19$m=2048,t=4,p=2$blNsaTgvWVc2b0VjNjNGdA$AfeGOoO6MuG/gPDPZ7UkZnTW46yNixwmwUJSPO5x45o', 'CollegeAdmin', 16, '2025-02-15 14:25:28', '2025-02-15 14:25:28'),
(16, 'MARJORIE.ROJAS', 'marjorie.rojas@email.com', '$argon2id$v=19$m=2048,t=4,p=2$YkM4Tmg1NC80SmF4VEFZMA$9Gc4L3zHBr156gVKU2z07w/M1e7dYs92fto9T7fqUO0', 'CollegeAdmin', 1, '2025-02-15 22:59:23', '2025-02-15 22:59:23');

CREATE TABLE admins (
  admin_id int(11) NOT NULL,
  account_id int(11) DEFAULT NULL,
  first_name varchar(50) NOT NULL,
  middle_name varchar(20) DEFAULT NULL,
  last_name varchar(20) NOT NULL,
  suffix_id int(11) DEFAULT NULL,
  college_id int(11) DEFAULT NULL,
  organization_id int(11) DEFAULT NULL,
  org_position varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO admins (admin_id, account_id, first_name, middle_name, last_name, suffix_id, college_id, organization_id, org_position) VALUES
(9, 14, 'Meg Ryan', 'Vega', 'Gomez', NULL, 1, NULL, ''),
(10, 15, 'Crisanto', 'Angeles', 'Perez', NULL, 16, NULL, ''),
(11, 16, 'Marjorie', NULL, 'Rojas', NULL, 1, NULL, '');

CREATE TABLE colleges (
  id int(11) NOT NULL,
  college_code varchar(10) NOT NULL,
  college varchar(255) NOT NULL,
  logo_directory text NOT NULL,
  description text DEFAULT NULL,
  created_at timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO colleges (id, college_code, college, logo_directory, description, created_at) VALUES
(1, 'CCS', 'College of Computing Studies', '../../images/uploads/CCS_Logo.png', '', '2025-02-03 22:55:10'),
(16, 'CE', 'College of Engineering', '../../images/uploads/CE_Logo.jpg', '', '2025-02-12 03:10:30'),
(17, 'CLA', 'College of Liberal Arts', '../../images/uploads/CLA_Logo.png', '', '2025-02-14 02:25:42'),
(21, 'CTE', 'College of Teacher Education', '../../images/uploads/CTE_Logo.png', '', '2025-02-15 23:13:55');

CREATE TABLE courses (
  id int(11) NOT NULL,
  college_id int(11) NOT NULL,
  course varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO courses (id, college_id, course) VALUES
(1, 1, 'Computer Science'),
(2, 1, 'Information Technology'),
(3, 1, 'Computer Technology');

CREATE TABLE organizations (
  id int(11) NOT NULL,
  college_id int(11) NOT NULL,
  name varchar(100) NOT NULL,
  logo_directory text NOT NULL,
  description text NOT NULL,
  isActive tinyint(1) NOT NULL DEFAULT 1,
  isPrimary tinyint(1) NOT NULL DEFAULT 0,
  deactivationReason text DEFAULT NULL,
  created_at timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO organizations (id, college_id, name, logo_directory, description, isActive, isPrimary, deactivationReason, created_at) VALUES
(2, 1, 'Venom Publication', '../../images/uploads/VP_Logo.jpg', 'dsa', 1, 0, NULL, '2025-02-15 23:17:11'),
(5, 1, 'College Student Council', '../../images/uploads/CSC_Logo.jpg', '', 1, 1, NULL, '2025-02-15 23:17:11');

CREATE TABLE religions (
  id int(11) NOT NULL,
  religion varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO religions (id, religion) VALUES
(1, 'Roman Catholic'),
(2, 'Islam'),
(3, 'Iglesia ni Cristo');

CREATE TABLE students (
  id int(11) NOT NULL,
  account_id int(11) DEFAULT NULL,
  school_id int(11) NOT NULL,
  first_name varchar(50) NOT NULL,
  middle_name varchar(50) DEFAULT NULL,
  last_name varchar(50) NOT NULL,
  suffix_id int(11) DEFAULT NULL,
  year_level int(11) NOT NULL,
  religion_id int(11) NOT NULL,
  college_id int(11) NOT NULL,
  course_id int(11) NOT NULL,
  is_registered tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO students (id, account_id, school_id, first_name, middle_name, last_name, suffix_id, year_level, religion_id, college_id, course_id, is_registered) VALUES
(10, 9, 202201078, 'Meg Ryan', 'Vega', 'Gomez', NULL, 4, 1, 1, 1, 1);

CREATE TABLE suffixes (
  id int(11) NOT NULL,
  extension varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO suffixes (id, extension) VALUES
(2, 'Sr.'),
(3, 'III'),
(4, 'IV'),
(5, 'Jr.');


ALTER TABLE accounts
  ADD PRIMARY KEY (id),
  ADD UNIQUE KEY username (username),
  ADD UNIQUE KEY email (email),
  ADD KEY college_id (college_id);

ALTER TABLE admins
  ADD PRIMARY KEY (admin_id),
  ADD KEY college_id (college_id),
  ADD KEY organization_id (organization_id),
  ADD KEY account_id (account_id);

ALTER TABLE colleges
  ADD PRIMARY KEY (id),
  ADD UNIQUE KEY college_code (college_code);

ALTER TABLE courses
  ADD PRIMARY KEY (id),
  ADD KEY college_id (college_id);

ALTER TABLE organizations
  ADD PRIMARY KEY (id),
  ADD KEY college_id (college_id);

ALTER TABLE religions
  ADD PRIMARY KEY (id);

ALTER TABLE students
  ADD PRIMARY KEY (id),
  ADD UNIQUE KEY school_id (school_id),
  ADD KEY suffix_id (suffix_id),
  ADD KEY religion_id (religion_id),
  ADD KEY course_id (course_id),
  ADD KEY account_id (account_id),
  ADD KEY college_id (college_id);

ALTER TABLE suffixes
  ADD PRIMARY KEY (id);


ALTER TABLE accounts
  MODIFY id int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

ALTER TABLE admins
  MODIFY admin_id int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

ALTER TABLE colleges
  MODIFY id int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

ALTER TABLE courses
  MODIFY id int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

ALTER TABLE organizations
  MODIFY id int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

ALTER TABLE religions
  MODIFY id int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

ALTER TABLE students
  MODIFY id int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

ALTER TABLE suffixes
  MODIFY id int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;


ALTER TABLE accounts
  ADD CONSTRAINT accounts_ibfk_2 FOREIGN KEY (college_id) REFERENCES colleges (id);

ALTER TABLE admins
  ADD CONSTRAINT admins_ibfk_1 FOREIGN KEY (college_id) REFERENCES colleges (id),
  ADD CONSTRAINT admins_ibfk_2 FOREIGN KEY (organization_id) REFERENCES organizations (id),
  ADD CONSTRAINT admins_ibfk_3 FOREIGN KEY (account_id) REFERENCES `accounts` (id);

ALTER TABLE courses
  ADD CONSTRAINT courses_ibfk_1 FOREIGN KEY (college_id) REFERENCES colleges (id);

ALTER TABLE organizations
  ADD CONSTRAINT organizations_ibfk_1 FOREIGN KEY (college_id) REFERENCES colleges (id);

ALTER TABLE students
  ADD CONSTRAINT students_ibfk_2 FOREIGN KEY (suffix_id) REFERENCES suffixes (id),
  ADD CONSTRAINT students_ibfk_3 FOREIGN KEY (religion_id) REFERENCES religions (id),
  ADD CONSTRAINT students_ibfk_5 FOREIGN KEY (course_id) REFERENCES courses (id),
  ADD CONSTRAINT students_ibfk_6 FOREIGN KEY (account_id) REFERENCES `accounts` (id),
  ADD CONSTRAINT students_ibfk_7 FOREIGN KEY (college_id) REFERENCES colleges (id);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
