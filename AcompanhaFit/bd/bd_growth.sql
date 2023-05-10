SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

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
  `CREF` varchar(15) NOT NULL,
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `Nutricionista` (
  `ID_Nutricionista` int(11) NOT NULL,
  `Nome` varchar(100) NOT NULL,
  `Gênero` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `CRN` varchar(15) NOT NULL,
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `Aluno` (
  `ID_Aluno` int(11) NOT NULL
  `Nome` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `Gênero` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `Email` varchar(50) COLLATE latin1_general_ci DEFAULT NULL,
  'Altura' double(11) NOT NULL,
  'Peso' int(200) NOT NULL,
  'Treino' varchar(800) COLLATE latin1_general_ci NOT NULL,
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

ALTER TABLE `Personal`
  ADD PRIMARY KEY (`ID_Personal`),
  ADD UNIQUE KEY `UN_CREF` (`CREF`),
  
ALTER TABLE `Nutricionista`
  ADD PRIMARY KEY (`ID_Nutricionista`),
  ADD UNIQUE KEY `UN_CRN` (`CRN`),
  
ALTER TABLE `Aluno`
  ADD PRIMARY KEY (`ID_Aluno`),
  
ALTER TABLE `Usuario`
  ADD PRIMARY KEY (`ID_Usuario`);
  
ALTER TABLE `Personal`
  MODIFY `ID_Personal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
  
ALTER TABLE `Nutricionista`
  MODIFY `ID_Nutricionista` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
  
ALTER TABLE `Aluno`
  MODIFY `ID_Aluno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
  
ALTER TABLE `Usuario`
  MODIFY `ID_Usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
  
  
  
