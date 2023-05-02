SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

CREATE TABLE `medico` (
  `ID_Medico` int(11) NOT NULL,
  `CRM` varchar(15) NOT NULL,
  `Nome` varchar(100) NOT NULL,
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `Usuario` (
  `ID_Usuario` int(11) NOT NULL,
  `Nome` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `Celular` varchar(20) COLLATE latin1_general_ci NOT NULL,
  `Login` varchar(50) COLLATE latin1_general_ci DEFAULT NULL,
  `Senha` varchar(40) COLLATE latin1_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

CREATE TABLE `Personal` (
  `ID_Personal` int(11) NOT NULL,
  `Nome` varchar(100) NOT NULL,
  `Gênero` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `Cref` varchar(15) NOT NULL,
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `Nutricionista` (
  `ID_Nutricionista` int(11) NOT NULL,
  `Nome` varchar(100) NOT NULL,
  `Gênero` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `Crn` varchar(15) NOT NULL,
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `Aluno` (
  `ID_Aluno` int(11) NOT NULL
  `Nome` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `Gênero` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `Email` varchar(50) COLLATE latin1_general_ci DEFAULT NULL,
  'Altura' double(11) NOT NULL,
  'Peso' int(200) NOT NULL,
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

