-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 29, 2018 at 12:39 AM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gdbms`
--
CREATE DATABASE IF NOT EXISTS `gdbms` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `gdbms`;

-- --------------------------------------------------------

--
-- Table structure for table `advisors`
--

CREATE TABLE `advisors` (
  `id` char(7) COLLATE utf8_unicode_ci NOT NULL,
  `first_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `last_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `advisors`
--

INSERT INTO `advisors` (`id`, `first_name`, `last_name`, `email`) VALUES
('0001111', 'Hassan', 'Reza', 'reza@cs.und.edu'),
('0002222', 'Travis', 'Desell', 'tdesell@cs.und.edu');

-- --------------------------------------------------------

--
-- Table structure for table `assistantships`
--

CREATE TABLE `assistantships` (
  `id` int(10) UNSIGNED NOT NULL,
  `semester_id` int(10) UNSIGNED NOT NULL,
  `student_id` char(7) COLLATE utf8_unicode_ci NOT NULL,
  `position` char(3) COLLATE utf8_unicode_ci NOT NULL,
  `date_offered` date NOT NULL,
  `date_responded` date DEFAULT NULL,
  `defer_date` date DEFAULT NULL,
  `current_status_id` int(10) UNSIGNED NOT NULL,
  `corresponding_tuition_waiver_id` int(10) UNSIGNED DEFAULT NULL,
  `stipend` decimal(8,2) NOT NULL,
  `funding_source_id` int(10) UNSIGNED NOT NULL,
  `time` varchar(15) COLLATE utf8_unicode_ci NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `assistantships`
--

INSERT INTO `assistantships` (`id`, `semester_id`, `student_id`, `position`, `date_offered`, `date_responded`, `defer_date`, `current_status_id`, `corresponding_tuition_waiver_id`, `stipend`, `funding_source_id`, `time`) VALUES
(1, 5, '8881111', 'GRA', '2016-07-01', '2016-07-30', NULL, 2, 1, '10000.00', 1, '1/2 time'),
(2, 5, '8882222', 'GTA', '2016-07-01', '2016-07-30', NULL, 2, 2, '10000.00', 1, '1/4 time'),
(3, 5, '8883333', 'GTA', '2016-07-01', '2016-07-30', NULL, 2, 3, '10000.00', 1, '1/2 time'),
(4, 5, '8884444', 'GRA', '2016-07-01', '2016-07-30', NULL, 2, 4, '10000.00', 1, '1/2 time'),
(5, 6, '8881111', 'GRA', '2016-12-01', '2016-12-30', NULL, 2, 5, '10000.00', 1, '1/4 time'),
(6, 6, '8882222', 'GRA', '2016-12-01', '2016-12-30', NULL, 2, 6, '10000.00', 1, '1/2 time'),
(7, 6, '8883333', 'GTA', '2016-12-01', '2016-12-30', NULL, 2, 7, '10000.00', 1, '1/4 time'),
(8, 6, '8884444', 'GRA', '2016-12-01', '2016-12-30', NULL, 1, 8, '10000.00', 1, '1/4 time');

-- --------------------------------------------------------

--
-- Table structure for table `assistantship_statuses`
--

CREATE TABLE `assistantship_statuses` (
  `id` int(10) UNSIGNED NOT NULL,
  `description` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `assistantship_statuses`
--

INSERT INTO `assistantship_statuses` (`id`, `description`) VALUES
(1, 'Pending'),
(2, 'Accepted'),
(3, 'Declined'),
(4, 'Deferred'),
(5, 'Terminated');

-- --------------------------------------------------------

--
-- Table structure for table `funding_sources`
--

CREATE TABLE `funding_sources` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `is_grant` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `funding_sources`
--

INSERT INTO `funding_sources` (`id`, `name`, `is_grant`) VALUES
(1, 'Computer Science Department', 0),
(2, 'Travis Desell - Grant 1', 1);

-- --------------------------------------------------------

--
-- Table structure for table `gce_results`
--

CREATE TABLE `gce_results` (
  `id` int(10) UNSIGNED NOT NULL,
  `student_id` char(7) COLLATE utf8_unicode_ci NOT NULL,
  `passed` tinyint(1) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `gce_results`
--

INSERT INTO `gce_results` (`id`, `student_id`, `passed`, `date`) VALUES
(1, '8883333', 0, '2017-02-14'),
(2, '8884444', 1, '2016-09-15');

-- --------------------------------------------------------

--
-- Table structure for table `gqe_offerings`
--

CREATE TABLE `gqe_offerings` (
  `id` int(10) UNSIGNED NOT NULL,
  `gqe_section_id` int(10) UNSIGNED NOT NULL,
  `semester_id` int(10) UNSIGNED NOT NULL,
  `date` date NOT NULL,
  `cutoff_ms` double(5,2) UNSIGNED DEFAULT NULL,
  `cutoff_phd` double(5,2) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `gqe_offerings`
--

INSERT INTO `gqe_offerings` (`id`, `gqe_section_id`, `semester_id`, `date`, `cutoff_ms`, `cutoff_phd`) VALUES
(1, 1, 1, '2015-09-10', 76.88, 82.17),
(2, 2, 1, '2015-09-10', 71.50, 79.45),
(3, 3, 2, '2016-02-25', 70.92, 80.00),
(4, 4, 2, '2016-02-25', 78.11, 81.99),
(5, 1, 5, '2016-09-10', 76.88, 82.17),
(6, 2, 5, '2016-09-10', 71.50, 79.45),
(7, 3, 6, '2017-02-25', 70.92, 80.00),
(8, 4, 6, '2017-02-25', 78.11, 81.99),
(9, 1, 9, '2017-09-10', 76.88, 82.17),
(10, 2, 9, '2017-09-10', 71.50, 79.45),
(11, 3, 10, '2018-02-25', 70.92, 80.00),
(12, 4, 10, '2018-02-25', 78.11, 81.99);

--
-- Triggers `gqe_offerings`
--
DELIMITER $$
CREATE TRIGGER `after_gqe_offerings_update` AFTER UPDATE ON `gqe_offerings` FOR EACH ROW BEGIN
                UPDATE gqe_results SET pass_level_id = 1 WHERE gqe_results.offer_id = NEW.id;
            END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `gqe_results`
--

CREATE TABLE `gqe_results` (
  `student_id` char(7) COLLATE utf8_unicode_ci NOT NULL,
  `offer_id` int(10) UNSIGNED NOT NULL,
  `score` double(5,2) UNSIGNED DEFAULT NULL,
  `pass_level_id` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `gqe_results`
--

INSERT INTO `gqe_results` (`student_id`, `offer_id`, `score`, `pass_level_id`) VALUES
('8881111', 1, 84.00, 3),
('8881111', 2, 69.50, 1),
('8881111', 3, 77.00, 2),
('8881111', 4, 76.99, 1),
('8881111', 6, 70.50, 1),
('8881111', 8, NULL, NULL),
('8881111', 10, NULL, NULL),
('8882222', 1, 87.25, 3),
('8882222', 2, 81.75, 3),
('8882222', 3, 72.00, 2),
('8882222', 4, 80.00, 2);

--
-- Triggers `gqe_results`
--
DELIMITER $$
CREATE TRIGGER `before_gqe_results_insert` BEFORE INSERT ON `gqe_results` FOR EACH ROW BEGIN
                SET NEW.pass_level_id = (SELECT IF(NEW.score >= o.cutoff_phd,
                                                    3,
                                                    IF(NEW.score >= o.cutoff_ms,
                                                       2,
                                                       IF(NEW.score IS NOT NULL,
                                                          1,
                                                          NULL)))
                                        FROM gqe_offerings AS o WHERE o.id = NEW.offer_id);
            END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `before_gqe_results_update` BEFORE UPDATE ON `gqe_results` FOR EACH ROW BEGIN
                SET NEW.pass_level_id = (SELECT IF(NEW.score >= o.cutoff_phd,
                                                    3,
                                                    IF(NEW.score >= o.cutoff_ms,
                                                       2,
                                                       IF(NEW.score IS NOT NULL,
                                                          1,
                                                          NULL)))
                                        FROM gqe_offerings AS o WHERE o.id = NEW.offer_id);
            END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `gqe_sections`
--

CREATE TABLE `gqe_sections` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` char(2) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `gqe_sections`
--

INSERT INTO `gqe_sections` (`id`, `name`) VALUES
(1, 'DB'),
(2, 'SD'),
(3, 'TF'),
(4, 'OS');

-- --------------------------------------------------------

--
-- Table structure for table `gre_scores`
--

CREATE TABLE `gre_scores` (
  `student_id` char(255) COLLATE utf8_unicode_ci NOT NULL,
  `score` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `gre_scores`
--

INSERT INTO `gre_scores` (`student_id`, `score`) VALUES
('3331111', 280);

-- --------------------------------------------------------

--
-- Table structure for table `gta_assignments`
--

CREATE TABLE `gta_assignments` (
  `id` int(10) UNSIGNED NOT NULL,
  `assistantship_id` int(10) UNSIGNED NOT NULL,
  `instructor_id` char(7) COLLATE utf8_unicode_ci NOT NULL,
  `course` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `num_labs_or_grader` varchar(6) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `gta_assignments`
--

INSERT INTO `gta_assignments` (`id`, `assistantship_id`, `instructor_id`, `course`, `num_labs_or_grader`) VALUES
(1, 2, '0001111', 'CS455', 'Grader'),
(2, 3, '0002222', 'CS364', '4'),
(3, 7, '0001111', 'CS463', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `ielts_scores`
--

CREATE TABLE `ielts_scores` (
  `student_id` char(255) COLLATE utf8_unicode_ci NOT NULL,
  `score` double(3,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `ielts_scores`
--

INSERT INTO `ielts_scores` (`student_id`, `score`) VALUES
('3334444', 8.25);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2014_10_11_000000_create_user_roles_table', 1),
('2014_10_12_000000_create_users_table', 1),
('2014_10_12_100000_create_password_resets_table', 1),
('2017_03_12_000500_create_funding_sources_table', 1),
('2017_03_12_000550_create_yearly_budgets_table', 1),
('2017_03_12_000600_create_pass_levels_table', 1),
('2017_03_12_000700_create_semester_names', 1),
('2017_03_13_000000_create_semesters_table', 1),
('2017_03_13_000001_add_academic_year_fk_semesters_table', 1),
('2017_03_13_000002_create_programs_table', 1),
('2017_03_13_000003_create_advisors_table', 1),
('2017_03_13_000004_create_students_table', 1),
('2017_03_13_000006_create_gqe_sections_table', 1),
('2017_03_13_000007_create_gqe_offerings_table', 1),
('2017_03_13_000008_create_gqe_results_table', 1),
('2017_03_13_185113_create_gce_results_table', 1),
('2017_03_13_190000_create_prospective_students_table', 1),
('2017_03_13_190240_create_toefl_scores_table', 1),
('2017_03_13_190254_create_ielts_scores_table', 1),
('2017_03_13_190301_create_gre_scores_table', 1),
('2017_03_13_193439_create_positions_table', 1),
('2017_03_13_193500_create_assistantship_statuses_table', 1),
('2017_03_13_193535_create_tuition_waivers_table', 1),
('2017_03_13_193547_create_assistantships_table', 1),
('2017_03_31_095331_create_student_programs_table', 1),
('2017_04_04_202941_create_triggers', 1),
('2017_04_12_213421_create_gta_assignments_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pass_levels`
--

CREATE TABLE `pass_levels` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(30) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `pass_levels`
--

INSERT INTO `pass_levels` (`id`, `name`) VALUES
(1, 'Fail'),
(2, 'MS'),
(3, 'PhD');

-- --------------------------------------------------------

--
-- Table structure for table `positions`
--

CREATE TABLE `positions` (
  `name` char(3) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `positions`
--

INSERT INTO `positions` (`name`) VALUES
('GRA'),
('GSA'),
('GTA');

-- --------------------------------------------------------

--
-- Table structure for table `programs`
--

CREATE TABLE `programs` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `needs_committee` tinyint(1) NOT NULL,
  `needs_gce` tinyint(1) NOT NULL,
  `gqes_needed` int(11) NOT NULL,
  `pass_level_needed_id` int(10) UNSIGNED NOT NULL,
  `assistantship_semesters_allowed` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `programs`
--

INSERT INTO `programs` (`id`, `name`, `needs_committee`, `needs_gce`, `gqes_needed`, `pass_level_needed_id`, `assistantship_semesters_allowed`) VALUES
(1, 'Non-Degree Seeking', 0, 0, 0, 1, 0),
(2, 'MS Thesis', 1, 0, 3, 2, 4),
(3, 'MS Non-Thesis', 0, 0, 3, 2, 4),
(4, 'PhD Scientific Computing', 1, 1, 4, 3, 8);

-- --------------------------------------------------------

--
-- Table structure for table `prospective_students`
--

CREATE TABLE `prospective_students` (
  `id` char(7) COLLATE utf8_unicode_ci NOT NULL,
  `first_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `last_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `undergrad_gpa` double(4,3) NOT NULL,
  `faculty_supported` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `prospective_students`
--

INSERT INTO `prospective_students` (`id`, `first_name`, `last_name`, `email`, `undergrad_gpa`, `faculty_supported`) VALUES
('3331111', 'Malcom', 'Reynolds', 'malcom.reynolds@gmail.com', 3.250, 0),
('3332222', 'Morgan', 'Freeman', 'morgan.freeman@gmail.com', 3.925, 1),
('3333333', 'Bruce', 'Willis', 'bruce.willis@gmail.com', 3.102, 0),
('3334444', 'John', 'Malkovich', 'john.malkovich@gmail.com', 3.555, 1);

-- --------------------------------------------------------

--
-- Table structure for table `semesters`
--

CREATE TABLE `semesters` (
  `id` int(10) UNSIGNED NOT NULL,
  `name_id` int(10) UNSIGNED NOT NULL,
  `calendar_year` year(4) DEFAULT NULL,
  `academic_year` year(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `semesters`
--

INSERT INTO `semesters` (`id`, `name_id`, `calendar_year`, `academic_year`) VALUES
(1, 1, 2015, 2015),
(2, 2, 2016, 2015),
(3, 3, 2016, 2015),
(4, 4, 2016, 2015),
(5, 1, 2016, 2016),
(6, 2, 2017, 2016),
(7, 3, 2017, 2016),
(8, 4, 2017, 2016),
(9, 1, 2017, 2017),
(10, 2, 2018, 2017);

-- --------------------------------------------------------

--
-- Table structure for table `semester_names`
--

CREATE TABLE `semester_names` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(10) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `semester_names`
--

INSERT INTO `semester_names` (`id`, `name`) VALUES
(1, 'Fall'),
(2, 'Spring'),
(3, 'Summer1'),
(4, 'Summer2');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` char(7) COLLATE utf8_unicode_ci NOT NULL,
  `first_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `last_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `undergrad_gpa` double(4,3) NOT NULL,
  `faculty_supported` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `first_name`, `last_name`, `email`, `undergrad_gpa`, `faculty_supported`) VALUES
('8881111', 'Kelton', 'Karboviak', 'kelton.karboviak@und.edu', 3.250, 0),
('8882222', 'Connor', 'Bowley', 'connor.bowley@und.edu', 3.925, 1),
('8883333', 'Joe', 'Schmo', 'joe.schmo@und.edu', 3.102, 0),
('8884444', 'John', 'Smith', 'john.smith@und.edu', 3.555, 1);

-- --------------------------------------------------------

--
-- Table structure for table `student_programs`
--

CREATE TABLE `student_programs` (
  `id` int(10) UNSIGNED NOT NULL,
  `student_id` char(7) COLLATE utf8_unicode_ci NOT NULL,
  `program_id` int(10) UNSIGNED NOT NULL,
  `advisor_id` char(7) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0001111',
  `semester_started_id` int(10) UNSIGNED NOT NULL,
  `has_program_study` tinyint(1) NOT NULL DEFAULT '0',
  `is_current` tinyint(1) NOT NULL DEFAULT '1',
  `is_graduated` tinyint(1) NOT NULL DEFAULT '0',
  `has_committee` tinyint(1) NOT NULL DEFAULT '0',
  `semester_graduated_id` int(10) UNSIGNED DEFAULT NULL,
  `topic` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `student_programs`
--

INSERT INTO `student_programs` (`id`, `student_id`, `program_id`, `advisor_id`, `semester_started_id`, `has_program_study`, `is_current`, `is_graduated`, `has_committee`, `semester_graduated_id`, `topic`) VALUES
(1, '8881111', 3, '0001111', 5, 0, 1, 0, 0, NULL, 'Making NGAFID work using BigData'),
(2, '8882222', 2, '0002222', 5, 1, 1, 0, 1, NULL, 'Finding avian species in UAV imagery with CNNs'),
(3, '8883333', 4, '0002222', 1, 0, 1, 0, 0, NULL, ''),
(4, '8884444', 3, '0002222', 1, 1, 0, 1, 1, 3, 'Saving the world with BigData and Hadoop'),
(5, '8884444', 4, '0001111', 5, 1, 1, 0, 1, NULL, 'Saving the world with BigData and Hadoop (PhD version)');

-- --------------------------------------------------------

--
-- Table structure for table `toefl_scores`
--

CREATE TABLE `toefl_scores` (
  `student_id` char(255) COLLATE utf8_unicode_ci NOT NULL,
  `score` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `toefl_scores`
--

INSERT INTO `toefl_scores` (`student_id`, `score`) VALUES
('3333333', 55);

-- --------------------------------------------------------

--
-- Table structure for table `tuition_waivers`
--

CREATE TABLE `tuition_waivers` (
  `id` int(10) UNSIGNED NOT NULL,
  `semester_id` int(10) UNSIGNED NOT NULL,
  `student_id` char(7) COLLATE utf8_unicode_ci NOT NULL,
  `date_received` date DEFAULT NULL,
  `amount_received` decimal(8,2) NOT NULL,
  `credit_hours` int(10) UNSIGNED NOT NULL,
  `funding_source_id` int(10) UNSIGNED NOT NULL,
  `received` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tuition_waivers`
--

INSERT INTO `tuition_waivers` (`id`, `semester_id`, `student_id`, `date_received`, `amount_received`, `credit_hours`, `funding_source_id`, `received`) VALUES
(1, 1, '8881111', '2015-08-01', '1500.00', 6, 1, 1),
(2, 1, '8882222', '2015-08-01', '1500.00', 6, 1, 1),
(3, 1, '8883333', '2015-08-01', '2000.00', 9, 1, 1),
(4, 1, '8884444', '2015-08-01', '2000.00', 9, 1, 1),
(5, 2, '8881111', '2016-01-01', '1500.00', 6, 1, 1),
(6, 2, '8882222', '2016-01-01', '1500.00', 6, 1, 1),
(7, 2, '8883333', NULL, '2000.00', 9, 1, 0),
(8, 2, '8884444', '2016-01-01', '2000.00', 9, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `first_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `last_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL,
  `password_updated_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`email`, `first_name`, `last_name`, `password`, `role_id`, `password_updated_at`, `remember_token`, `created_at`, `updated_at`) VALUES
('christian.hansen@ndus.edu', 'Christian', 'Hansen', '$2y$10$avh5jvFq2Quuk/6NAisfoOvUbEYk3NNE0ew1l7hNi.dPVNxC8Aht2', 1, '2018-04-12 05:31:20', 'xHbnzKSkR4djSUkz80C5imvlsJCjgC95CSaJuELcJumu5XJ1buFYILz6cZ9d', NULL, '2018-04-27 06:15:09'),
('connor.bowley@und.edu', 'Connor', 'Bowley', '$2y$10$Qyo0jZ0WKS8LL6UTsepNDeGoTpffn0XE7Y0aWz5DbBTlzjSoQOCRK', 1, NULL, NULL, '2018-01-25 23:26:07', '2018-01-25 23:26:07'),
('foysalcoder@gmail.com', 'Md Nurul', 'Amin', '$2y$10$jf0DvqyVVCH3nBOVFgVhv.bp0XZXJvANaZO.GeBiTCz2IgdlQaa9q', 2, '2018-02-05 02:43:51', 'GwodHH7yqTcidyRpoYvkk94RSNSFZTMTczuSEdPf9TKlldgJgcU8dQKsVr2T', '2018-02-05 02:42:23', '2018-02-05 02:44:01'),
('kelton.karboviak@und.edu', 'Kelton', 'Karboviak', '$2y$10$8sweqBMSddq5ryc9eEatCeXdvpTW4xq.vl5323HswLMbELTclVvG6', 1, NULL, NULL, '2018-01-25 23:26:06', '2018-01-25 23:26:06'),
('kencoyjones@yahoo.com', 'Kencoy', 'Jones', '$2y$10$ZOcLJ9Et7pHvXtv7dPMyNeB476./8dgf6HLUrSXu/dKB4su9LAmOW', 1, '2018-01-25 23:32:26', '6zDjTqVTyzeqTmvdyQ4kUrFB9QoGiyOXG7SDILqx9NuVthZazrf6dSH8f9jh', '2018-01-25 23:31:48', '2018-04-12 05:30:55'),
('yangyang.zhao.1@und.edu', 'Yangyang', 'Zhao', '$2y$10$iILsGdWY1AgkVOSHlZDpt.ZoT0xdpSVAtzATofqNY.fkwOgDB2dE2', 1, '2018-01-25 23:30:58', '3Q8O9HslfGHQFqdjivcGx2QNiXzW9D21bGtp7ic2oKKErWkR1sOji1g1gb0x', '2018-01-25 23:26:07', '2018-01-25 23:32:00');

-- --------------------------------------------------------

--
-- Table structure for table `user_roles`
--

CREATE TABLE `user_roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(10) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user_roles`
--

INSERT INTO `user_roles` (`id`, `name`) VALUES
(1, 'Director'),
(2, 'Chair'),
(3, 'Secretary'),
(4, 'Faculty');

-- --------------------------------------------------------

--
-- Table structure for table `yearly_budgets`
--

CREATE TABLE `yearly_budgets` (
  `budget` decimal(9,2) NOT NULL,
  `funding_source_id` int(10) UNSIGNED NOT NULL,
  `academic_year` year(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `yearly_budgets`
--

INSERT INTO `yearly_budgets` (`budget`, `funding_source_id`, `academic_year`) VALUES
('100000.00', 1, 2015),
('100000.00', 1, 2016),
('100000.00', 1, 2017);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `advisors`
--
ALTER TABLE `advisors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `assistantships`
--
ALTER TABLE `assistantships`
  ADD PRIMARY KEY (`id`),
  ADD KEY `assistantships_semester_id_foreign` (`semester_id`),
  ADD KEY `assistantships_student_id_foreign` (`student_id`),
  ADD KEY `assistantships_position_foreign` (`position`),
  ADD KEY `assistantships_current_status_id_foreign` (`current_status_id`),
  ADD KEY `assistantships_corresponding_tuition_waiver_id_foreign` (`corresponding_tuition_waiver_id`),
  ADD KEY `assistantships_funding_source_id_foreign` (`funding_source_id`);

--
-- Indexes for table `assistantship_statuses`
--
ALTER TABLE `assistantship_statuses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `funding_sources`
--
ALTER TABLE `funding_sources`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gce_results`
--
ALTER TABLE `gce_results`
  ADD PRIMARY KEY (`id`),
  ADD KEY `gce_results_student_id_foreign` (`student_id`);

--
-- Indexes for table `gqe_offerings`
--
ALTER TABLE `gqe_offerings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `gqe_offerings_gqe_section_id_foreign` (`gqe_section_id`),
  ADD KEY `gqe_offerings_semester_id_foreign` (`semester_id`);

--
-- Indexes for table `gqe_results`
--
ALTER TABLE `gqe_results`
  ADD PRIMARY KEY (`student_id`,`offer_id`),
  ADD KEY `gqe_results_offer_id_foreign` (`offer_id`),
  ADD KEY `gqe_results_pass_level_id_foreign` (`pass_level_id`);

--
-- Indexes for table `gqe_sections`
--
ALTER TABLE `gqe_sections`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gre_scores`
--
ALTER TABLE `gre_scores`
  ADD PRIMARY KEY (`student_id`);

--
-- Indexes for table `gta_assignments`
--
ALTER TABLE `gta_assignments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `gta_assignments_assistantship_id_foreign` (`assistantship_id`),
  ADD KEY `gta_assignments_instructor_id_foreign` (`instructor_id`);

--
-- Indexes for table `ielts_scores`
--
ALTER TABLE `ielts_scores`
  ADD PRIMARY KEY (`student_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`),
  ADD KEY `password_resets_token_index` (`token`);

--
-- Indexes for table `pass_levels`
--
ALTER TABLE `pass_levels`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `positions`
--
ALTER TABLE `positions`
  ADD PRIMARY KEY (`name`);

--
-- Indexes for table `programs`
--
ALTER TABLE `programs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `programs_pass_level_needed_id_foreign` (`pass_level_needed_id`);

--
-- Indexes for table `prospective_students`
--
ALTER TABLE `prospective_students`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `semesters`
--
ALTER TABLE `semesters`
  ADD PRIMARY KEY (`id`),
  ADD KEY `semesters_name_id_foreign` (`name_id`),
  ADD KEY `semesters_academic_year_foreign` (`academic_year`);

--
-- Indexes for table `semester_names`
--
ALTER TABLE `semester_names`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `semester_names_name_unique` (`name`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student_programs`
--
ALTER TABLE `student_programs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `student_programs_student_id_foreign` (`student_id`),
  ADD KEY `student_programs_program_id_foreign` (`program_id`),
  ADD KEY `student_programs_advisor_id_foreign` (`advisor_id`),
  ADD KEY `student_programs_semester_started_id_foreign` (`semester_started_id`),
  ADD KEY `student_programs_semester_graduated_id_foreign` (`semester_graduated_id`);

--
-- Indexes for table `toefl_scores`
--
ALTER TABLE `toefl_scores`
  ADD PRIMARY KEY (`student_id`);

--
-- Indexes for table `tuition_waivers`
--
ALTER TABLE `tuition_waivers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tuition_waivers_semester_id_foreign` (`semester_id`),
  ADD KEY `tuition_waivers_student_id_foreign` (`student_id`),
  ADD KEY `tuition_waivers_funding_source_id_foreign` (`funding_source_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`email`),
  ADD KEY `users_role_id_foreign` (`role_id`);

--
-- Indexes for table `user_roles`
--
ALTER TABLE `user_roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `yearly_budgets`
--
ALTER TABLE `yearly_budgets`
  ADD PRIMARY KEY (`academic_year`),
  ADD KEY `yearly_budgets_funding_source_id_foreign` (`funding_source_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `assistantships`
--
ALTER TABLE `assistantships`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `assistantship_statuses`
--
ALTER TABLE `assistantship_statuses`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `funding_sources`
--
ALTER TABLE `funding_sources`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `gce_results`
--
ALTER TABLE `gce_results`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `gqe_offerings`
--
ALTER TABLE `gqe_offerings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `gqe_sections`
--
ALTER TABLE `gqe_sections`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `gta_assignments`
--
ALTER TABLE `gta_assignments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `pass_levels`
--
ALTER TABLE `pass_levels`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `programs`
--
ALTER TABLE `programs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `semesters`
--
ALTER TABLE `semesters`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `semester_names`
--
ALTER TABLE `semester_names`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `student_programs`
--
ALTER TABLE `student_programs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tuition_waivers`
--
ALTER TABLE `tuition_waivers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `user_roles`
--
ALTER TABLE `user_roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `assistantships`
--
ALTER TABLE `assistantships`
  ADD CONSTRAINT `assistantships_corresponding_tuition_waiver_id_foreign` FOREIGN KEY (`corresponding_tuition_waiver_id`) REFERENCES `tuition_waivers` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `assistantships_current_status_id_foreign` FOREIGN KEY (`current_status_id`) REFERENCES `assistantship_statuses` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `assistantships_funding_source_id_foreign` FOREIGN KEY (`funding_source_id`) REFERENCES `funding_sources` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `assistantships_position_foreign` FOREIGN KEY (`position`) REFERENCES `positions` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `assistantships_semester_id_foreign` FOREIGN KEY (`semester_id`) REFERENCES `semesters` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `assistantships_student_id_foreign` FOREIGN KEY (`student_id`) REFERENCES `students` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `gce_results`
--
ALTER TABLE `gce_results`
  ADD CONSTRAINT `gce_results_student_id_foreign` FOREIGN KEY (`student_id`) REFERENCES `students` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `gqe_offerings`
--
ALTER TABLE `gqe_offerings`
  ADD CONSTRAINT `gqe_offerings_gqe_section_id_foreign` FOREIGN KEY (`gqe_section_id`) REFERENCES `gqe_sections` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `gqe_offerings_semester_id_foreign` FOREIGN KEY (`semester_id`) REFERENCES `semesters` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `gqe_results`
--
ALTER TABLE `gqe_results`
  ADD CONSTRAINT `gqe_results_offer_id_foreign` FOREIGN KEY (`offer_id`) REFERENCES `gqe_offerings` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `gqe_results_pass_level_id_foreign` FOREIGN KEY (`pass_level_id`) REFERENCES `pass_levels` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `gqe_results_student_id_foreign` FOREIGN KEY (`student_id`) REFERENCES `students` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `gre_scores`
--
ALTER TABLE `gre_scores`
  ADD CONSTRAINT `gre_scores_student_id_foreign` FOREIGN KEY (`student_id`) REFERENCES `prospective_students` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `gta_assignments`
--
ALTER TABLE `gta_assignments`
  ADD CONSTRAINT `gta_assignments_assistantship_id_foreign` FOREIGN KEY (`assistantship_id`) REFERENCES `assistantships` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `gta_assignments_instructor_id_foreign` FOREIGN KEY (`instructor_id`) REFERENCES `advisors` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `ielts_scores`
--
ALTER TABLE `ielts_scores`
  ADD CONSTRAINT `ielts_scores_student_id_foreign` FOREIGN KEY (`student_id`) REFERENCES `prospective_students` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `programs`
--
ALTER TABLE `programs`
  ADD CONSTRAINT `programs_pass_level_needed_id_foreign` FOREIGN KEY (`pass_level_needed_id`) REFERENCES `pass_levels` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `semesters`
--
ALTER TABLE `semesters`
  ADD CONSTRAINT `semesters_academic_year_foreign` FOREIGN KEY (`academic_year`) REFERENCES `yearly_budgets` (`academic_year`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `semesters_name_id_foreign` FOREIGN KEY (`name_id`) REFERENCES `semester_names` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `student_programs`
--
ALTER TABLE `student_programs`
  ADD CONSTRAINT `student_programs_advisor_id_foreign` FOREIGN KEY (`advisor_id`) REFERENCES `advisors` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `student_programs_program_id_foreign` FOREIGN KEY (`program_id`) REFERENCES `programs` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `student_programs_semester_graduated_id_foreign` FOREIGN KEY (`semester_graduated_id`) REFERENCES `semesters` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `student_programs_semester_started_id_foreign` FOREIGN KEY (`semester_started_id`) REFERENCES `semesters` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `student_programs_student_id_foreign` FOREIGN KEY (`student_id`) REFERENCES `students` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `toefl_scores`
--
ALTER TABLE `toefl_scores`
  ADD CONSTRAINT `toefl_scores_student_id_foreign` FOREIGN KEY (`student_id`) REFERENCES `prospective_students` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tuition_waivers`
--
ALTER TABLE `tuition_waivers`
  ADD CONSTRAINT `tuition_waivers_funding_source_id_foreign` FOREIGN KEY (`funding_source_id`) REFERENCES `funding_sources` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tuition_waivers_semester_id_foreign` FOREIGN KEY (`semester_id`) REFERENCES `semesters` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tuition_waivers_student_id_foreign` FOREIGN KEY (`student_id`) REFERENCES `students` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `user_roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `yearly_budgets`
--
ALTER TABLE `yearly_budgets`
  ADD CONSTRAINT `yearly_budgets_funding_source_id_foreign` FOREIGN KEY (`funding_source_id`) REFERENCES `funding_sources` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
