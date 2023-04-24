SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

CREATE TABLE `academia` (
  `ID_Gym` int(11) NOT NULL,
  `Nome_Gym` varchar(100) NOT NULL,
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `profissional` (
  `ID_Pro` int(11) NOT NULL,
  `Nome_Pro` varchar(100) NOT NULL,
  `Descricao` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `profissional` (`ID_Pro`, `Nome_Pro`, `Descricao`) VALUES
(1, 'Personal Trainer', 'Avalia suas necessidades físicas e te recomenda uma sequência de atividades físicas de acordo com a sua vontade'),
(2, 'Nutricionista','O profissional responsável por te guiar a fazer uma dieta balanceada para queima de gordura, ganho de massa muscular, entre outras variedades');

CREATE TABLE `personal` (
  `ID_Personal` int(11) NOT NULL,
  `Nome` varchar(100) NOT NULL,
  `ID_Pro` int(11) NOT NULL,
  `Dt_Nasc` date DEFAULT NULL,
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `nutricionista` (
  `ID_Nutricionista` int(11) NOT NULL,
  `Nome` varchar(100) NOT NULL,
  `ID_Pro` int(11) NOT NULL,
  `Dt_Nasc` date DEFAULT NULL,
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `cliente` (
  `ID_Cliente` int(11) NOT NULL,
  `Nome` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `Celular` varchar(20) COLLATE latin1_general_ci NOT NULL,
  `Login` varchar(50) COLLATE latin1_general_ci DEFAULT NULL,
  `Senha` varchar(40) COLLATE latin1_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;