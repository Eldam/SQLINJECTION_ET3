-- phpMyAdmin SQL Dump
-- version 4.6.6deb4
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Oct 20, 2017 at 10:08 AM
-- Server version: 10.1.26-MariaDB-0+deb9u1
-- PHP Version: 7.0.19-1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `IUET32017`
--
-- jrodeiro - 7/10/2017
-- script de creación de la bd, usuario, asignación de privilegios a ese usuario sobre la bd
-- creación de tabla e insert sobre la misma.
--
-- CREAR LA BD BORRANDOLA SI YA EXISTIESE
--
DROP DATABASE IF EXISTS `IUET32017`;
CREATE DATABASE `IUET32017` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
--
-- SELECCIONAMOS PARA USAR
--
USE `IUET32017`;
--
-- DAMOS PERMISO USO Y BORRAMOS EL USUARIO QUE QUEREMOS CREAR POR SI EXISTE
--
GRANT USAGE ON * . * TO `userET3`@`localhost`;
	DROP USER `userET3`@`localhost`;
--
-- CREAMOS EL USUARIO Y LE DAMOS PASSWORD,DAMOS PERMISO DE USO Y DAMOS PERMISOS SOBRE LA BASE DE DATOS.
--
CREATE USER IF NOT EXISTS `userET3`@`localhost` IDENTIFIED BY 'passET3';
GRANT USAGE ON *.* TO `userET3`@`localhost` REQUIRE NONE WITH MAX_QUERIES_PER_HOUR 0 MAX_CONNECTIONS_PER_HOUR 0 MAX_UPDATES_PER_HOUR 0 MAX_USER_CONNECTIONS 0;
GRANT ALL PRIVILEGES ON `IUET32017`.* TO `userET3`@`localhost` WITH GRANT OPTION;
-- --------------------------------------------------------
-- --------------------------------------------------------
--
-- Table structure for table `PERMISO`
--

CREATE TABLE `PERMISO` (
  `IdGrupo` varchar(6) COLLATE latin1_spanish_ci NOT NULL,  
  `IdFuncionalidad` varchar(6) COLLATE latin1_spanish_ci NOT NULL,
  `IdAccion` varchar(6) COLLATE latin1_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Table structure for table `FUNC_ACCION`
--

CREATE TABLE `FUNC_ACCION` (
  `IdFuncionalidad` varchar(6) COLLATE latin1_spanish_ci NOT NULL,
  `IdAccion` varchar(6) COLLATE latin1_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;


--
-- Table structure for table `USUARIO_GRUPO`
--

CREATE TABLE `USU_GRUPO` (
  `login` varchar(9) COLLATE latin1_spanish_ci NOT NULL,
  `IdGrupo` varchar(6) COLLATE latin1_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Table structure for table `ACCION`
--

CREATE TABLE `ACCION` (
  `IdAccion` varchar(6) COLLATE latin1_spanish_ci NOT NULL,
  `NombreAccion` varchar(60) COLLATE latin1_spanish_ci NOT NULL,
  `DescripAccion` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `FUNCIONALIDAD`
--

CREATE TABLE `FUNCIONALIDAD` (
  `IdFuncionalidad` varchar(6) COLLATE latin1_spanish_ci NOT NULL,
  `NombreFuncionalidad` varchar(60) COLLATE latin1_spanish_ci NOT NULL,
  `DescripFuncionalidad` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

-- --------------------------------------------------------
--
-- Table structure for table `GRUPO`
--

CREATE TABLE `GRUPO` (
  `IdGrupo` varchar(6) COLLATE latin1_spanish_ci NOT NULL,
  `NombreGrupo` varchar(60) COLLATE latin1_spanish_ci NOT NULL,
  `DescripGrupo` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `TRABAJO`
--

CREATE TABLE `TRABAJO` (
  `IdTrabajo` varchar(6) COLLATE latin1_spanish_ci NOT NULL,
  `NombreTrabajo` varchar(60) COLLATE latin1_spanish_ci NOT NULL,
  `FechaIniTrabajo` date NOT NULL,
  `FechaFinTrabajo` date NOT NULL,
  `PorcentajeNota` decimal(2,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;


-- --------------------------------------------------------

--
-- Table structure for table `EVALUACION`
--
-- OK : indicación de si esta correcta o no la QA (1 correcto, 0 Incorrecto)
-- CorrectoP : Indicación de si esta correcta la historia de la ET
-- CorrectoA : evaluación de la historia por parte del alumno evaluador de esa historia de esa ET

CREATE TABLE `EVALUACION` (
  `IdTrabajo` varchar(6) COLLATE latin1_spanish_ci NOT NULL,
  `LoginEvaluador` varchar(9) COLLATE latin1_spanish_ci NOT NULL,
  `AliasEvaluado` varchar(6) COLLATE latin1_spanish_ci NOT NULL,
  `IdHistoria` int(2) NOT NULL,
  `CorrectoA` tinyint(1) NOT NULL,
  `ComenIncorrectoA` varchar(300) COLLATE latin1_spanish_ci NOT NULL,
  `CorrectoP` tinyint(1) NOT NULL,
  `ComentIncorrectoP` varchar(300) COLLATE latin1_spanish_ci NOT NULL,
  `OK` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `HISTORIA`
--

CREATE TABLE `HISTORIA` (
  `IdTrabajo` varchar(6) COLLATE latin1_spanish_ci NOT NULL,
  `IdHistoria` int(2) NOT NULL,
  `TextoHistoria` varchar(300) COLLATE latin1_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;



-- --------------------------------------------------------

--
-- Table structure for table `NOTASTRABAJO`
--

CREATE TABLE `NOTA_TRABAJO` (
  `login` varchar(9) COLLATE latin1_spanish_ci NOT NULL,
  `IdTrabajo` varchar(6) COLLATE latin1_spanish_ci NOT NULL,
  `NotaTrabajo` decimal(4,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `QA`
--

CREATE TABLE `ASIGNAC_QA` (
  `IdTrabajo` varchar(6) COLLATE latin1_spanish_ci NOT NULL,
  `LoginEvaluador` varchar(9) COLLATE latin1_spanish_ci NOT NULL,
  `LoginEvaluado` varchar(9) COLLATE latin1_spanish_ci NOT NULL,
  `AliasEvaluado` varchar(6) COLLATE latin1_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ENTREGA`
--

CREATE TABLE `ENTREGA` (
  `login` varchar(9) COLLATE latin1_spanish_ci NOT NULL,
  `IdTrabajo` varchar(6) COLLATE latin1_spanish_ci NOT NULL,
  `Alias` varchar(6) COLLATE latin1_spanish_ci NOT NULL,
  `Horas` int(2) DEFAULT NULL,
  `Ruta` varchar(60) COLLATE latin1_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;



-- --------------------------------------------------------

--
-- Table structure for table `USUARIO`
--

CREATE TABLE `USUARIO` (
  `login` varchar(9) COLLATE latin1_spanish_ci NOT NULL,
  `password` varchar(128) COLLATE latin1_spanish_ci NOT NULL,
  `DNI` varchar(9) COLLATE latin1_spanish_ci NOT NULL,
  `Nombre` varchar(30) COLLATE latin1_spanish_ci NOT NULL,
  `Apellidos` varchar(50) COLLATE latin1_spanish_ci NOT NULL,
  `Correo` varchar(40) COLLATE latin1_spanish_ci NOT NULL,
  `Direccion` varchar(60) COLLATE latin1_spanish_ci NOT NULL,
  `Telefono` varchar(11) COLLATE latin1_spanish_ci NOT NULL
  ) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Indexes for table `TRABAJO`
--
ALTER TABLE `TRABAJO`
  ADD PRIMARY KEY (`IdTrabajo`);

--
-- Indexes for table `EVALUACION`
--
ALTER TABLE `EVALUACION`
  ADD PRIMARY KEY (`IdTrabajo`,`AliasEvaluado`,`LoginEvaluador`,`IdHistoria`);

--
-- Indexes for table `HISTORIA`
--
ALTER TABLE `HISTORIA`
  ADD PRIMARY KEY (`IdTrabajo`,`IdHistoria`);

--
-- Indexes for table `NOTASTRABAJO`
--
ALTER TABLE `NOTA_TRABAJO`
  ADD PRIMARY KEY (`login`,`IdTrabajo`);

--
-- Indexes for table `QA`
--
ALTER TABLE `ASIGNAC_QA`
  ADD PRIMARY KEY (`IdTrabajo`,`LoginEvaluador`,`AliasEvaluado`);

--
-- Indexes for table `ENTREGA`
--
ALTER TABLE `ENTREGA`
  ADD PRIMARY KEY (`login`,`IdTrabajo`);

--
-- Indexes for table `USUARIO`
--
ALTER TABLE `USUARIO`
  ADD PRIMARY KEY (`login`);

--
-- Indexes for table `GRUPO`
--
ALTER TABLE `GRUPO`
  ADD PRIMARY KEY (`IdGrupo`);

--
-- Indexes for table `FUNCIONALIDAD`
--
ALTER TABLE `FUNCIONALIDAD`
  ADD PRIMARY KEY (`IdFuncionalidad`);

--
-- Indexes for table `ACCION`
--
ALTER TABLE `ACCION`
  ADD PRIMARY KEY (`IdAccion`);

--
-- Indexes for table `USUARIO_GRUPO`
--
ALTER TABLE `USU_GRUPO`
  ADD PRIMARY KEY (`login`,`IdGrupo`);

--
-- Indexes for table `FUNC_ACCION`
--
ALTER TABLE `FUNC_ACCION`
  ADD PRIMARY KEY (`IdFuncionalidad`,`IdAccion`);

--
-- Indexes for table `PERMISO`
--
ALTER TABLE `PERMISO`
  ADD PRIMARY KEY (`IdGrupo`,`IdFuncionalidad`,`IdAccion`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;




/*
#Insert USUARIO
INSERT INTO `USUARIO` (`login`, `password`, `DNI`, `Nombre`, `Apellidos`, `Correo`, `Direccion`, `Telefono`) VALUES
('admin', '21232f297a57a5a743894a0e4a801fc3', '87654321X', 'Administrator', 'Admin Admin', 'admin@admin.com', 'here', '66666666');
INSERT INTO `USUARIO` (`login`, `password`, `DNI`, `Nombre`, `Apellidos`, `Correo`, `Direccion`, `Telefono`) VALUES
('alumno', 'c6865cf98b133f1f3de596a4a2894630', '88888888Y', 'User', 'User User', 'user@user.com', 'there', '66666666');

#Insert GRUPO
INSERT INTO `GRUPO`(`IdGrupo`, `NombreGrupo`, `DescripGrupo`) VALUES ("ADMINS","Grupo de Aministradores",
"Permite todas las funcionalidades del sitema");
INSERT INTO `GRUPO`(`IdGrupo`, `NombreGrupo`, `DescripGrupo`) VALUES ("ALUMNS","Grupo de Alumnos",
"Permite las funcionalidades del basicas del sitema");
INSERT INTO `GRUPO`(`IdGrupo`, `NombreGrupo`, `DescripGrupo`) VALUES ("MAXCAR","Grupo de CHARS",
"Permite las funcionalidades del basicas del sitema,Permite las funcionalidades del basicas de sitema");
INSERT INTO `GRUPO`(`IdGrupo`, `NombreGrupo`, `DescripGrupo`) VALUES ("TEST","Grupo de testers",
"Permite las funcionalidades del basicas del sitema,Permite las funcionalidades del basicas de sitema");


#Insert USU_GRUPO
INSERT INTO `USU_GRUPO`(`login`, `IdGrupo`) VALUES ("admin","ADMINS");
INSERT INTO `USU_GRUPO`(`login`, `IdGrupo`) VALUES ("alumno","ALUMNS");


#Insert FUNCIONALIDAD
INSERT INTO `FUNCIONALIDAD`(`IdFuncionalidad`, `NombreFuncionalidad`, `DescripFuncionalidad`) VALUES ("USERS","GESTIONAR USUARIOS","Permite admisistrar a los difentes usuarios del sistema");
INSERT INTO `FUNCIONALIDAD`(`IdFuncionalidad`, `NombreFuncionalidad`, `DescripFuncionalidad`) VALUES ("GROUPS","GESTIONAR GRUPOS","Permite admisistrar a los difentes grupos de usuarios del sistema");
INSERT INTO `FUNCIONALIDAD`(`IdFuncionalidad`, `NombreFuncionalidad`, `DescripFuncionalidad`) VALUES ("PERMIS","GESTIONAR PERMISOS","Permite admisistrar a los difentes permisos del sistema");
INSERT INTO `FUNCIONALIDAD`(`IdFuncionalidad`, `NombreFuncionalidad`, `DescripFuncionalidad`) VALUES ("WORK","GESTIONAR TRABAJOS","Permite admisistrar a los difentes trabajo existentes en el sistema");
INSERT INTO `FUNCIONALIDAD`(`IdFuncionalidad`, `NombreFuncionalidad`, `DescripFuncionalidad`) VALUES ("SCORE","GESTIONAR NOTAS","Permite admisistrar a las notas");



#Insert ACCION
INSERT INTO `ACCION`(`IdAccion`, `NombreAccion`, `DescripAccion`) VALUES ("ADD","Añadir","Privilegios de añadir nuevos elementos");
INSERT INTO `ACCION`(`IdAccion`, `NombreAccion`, `DescripAccion`) VALUES ("ACESS","Ver todos","Privilegios de ver a todos los elementos");
INSERT INTO `ACCION`(`IdAccion`, `NombreAccion`, `DescripAccion`) VALUES ("EDIT","Modificar","Privilegios de modificar los elementos existentes");
INSERT INTO `ACCION`(`IdAccion`, `NombreAccion`, `DescripAccion`) VALUES ("DELETE","Borrar","Privilegios de borrar los elementos existentes");
INSERT INTO `ACCION`(`IdAccion`, `NombreAccion`, `DescripAccion`) VALUES ("SEARCH","Buscar","Privilegios de buscar los elementos existentes");
INSERT INTO `ACCION`(`IdAccion`, `NombreAccion`, `DescripAccion`) VALUES ("ASSING","Gestionar Grupo",
"Privilegios de ver, asignar o eliminar de un grupo existente a un usuario");


#Indica que acciones possee cada funcionalidad
#Insert FUNC_ACCION
INSERT INTO `FUNC_ACCION`(`IdFuncionalidad`, `IdAccion`) VALUES ("USERS","ADD");
INSERT INTO `FUNC_ACCION`(`IdFuncionalidad`, `IdAccion`) VALUES ("USERS","ACESS");
INSERT INTO `FUNC_ACCION`(`IdFuncionalidad`, `IdAccion`) VALUES ("USERS","EDIT");
INSERT INTO `FUNC_ACCION`(`IdFuncionalidad`, `IdAccion`) VALUES ("USERS","DELETE");
INSERT INTO `FUNC_ACCION`(`IdFuncionalidad`, `IdAccion`) VALUES ("USERS","SEARCH");
INSERT INTO `FUNC_ACCION`(`IdFuncionalidad`, `IdAccion`) VALUES ("USERS","ASSING");

INSERT INTO `FUNC_ACCION`(`IdFuncionalidad`, `IdAccion`) VALUES ("GROUPS","ADD");
INSERT INTO `FUNC_ACCION`(`IdFuncionalidad`, `IdAccion`) VALUES ("GROUPS","ACESS");
INSERT INTO `FUNC_ACCION`(`IdFuncionalidad`, `IdAccion`) VALUES ("GROUPS","EDIT");
INSERT INTO `FUNC_ACCION`(`IdFuncionalidad`, `IdAccion`) VALUES ("GROUPS","DELETE");
INSERT INTO `FUNC_ACCION`(`IdFuncionalidad`, `IdAccion`) VALUES ("GROUPS","SEARCH");

INSERT INTO `FUNC_ACCION`(`IdFuncionalidad`, `IdAccion`) VALUES ("PERMIS","ACESS");
INSERT INTO `FUNC_ACCION`(`IdFuncionalidad`, `IdAccion`) VALUES ("PERMIS","SEARCH");

INSERT INTO `FUNC_ACCION`(`IdFuncionalidad`, `IdAccion`) VALUES ("WORK","ADD");
INSERT INTO `FUNC_ACCION`(`IdFuncionalidad`, `IdAccion`) VALUES ("WORK","ACESS");
INSERT INTO `FUNC_ACCION`(`IdFuncionalidad`, `IdAccion`) VALUES ("WORK","EDIT");
INSERT INTO `FUNC_ACCION`(`IdFuncionalidad`, `IdAccion`) VALUES ("WORK","DELETE");
INSERT INTO `FUNC_ACCION`(`IdFuncionalidad`, `IdAccion`) VALUES ("WORK","SEARCH");

INSERT INTO `FUNC_ACCION`(`IdFuncionalidad`, `IdAccion`) VALUES ("SCORE","ADD");
INSERT INTO `FUNC_ACCION`(`IdFuncionalidad`, `IdAccion`) VALUES ("SCORE","ACESS");
INSERT INTO `FUNC_ACCION`(`IdFuncionalidad`, `IdAccion`) VALUES ("SCORE","EDIT");
INSERT INTO `FUNC_ACCION`(`IdFuncionalidad`, `IdAccion`) VALUES ("SCORE","DELETE");
INSERT INTO `FUNC_ACCION`(`IdFuncionalidad`, `IdAccion`) VALUES ("SCORE","SEARCH");




#Insert PERMISO
INSERT INTO `PERMISO`(`IdGrupo`, `IdFuncionalidad`, `IdAccion`) VALUES ("ADMINS","USERS","ADD");
INSERT INTO `PERMISO`(`IdGrupo`, `IdFuncionalidad`, `IdAccion`) VALUES ("ADMINS","USERS","ACESS");
INSERT INTO `PERMISO`(`IdGrupo`, `IdFuncionalidad`, `IdAccion`) VALUES ("ADMINS","USERS","EDIT");
INSERT INTO `PERMISO`(`IdGrupo`, `IdFuncionalidad`, `IdAccion`) VALUES ("ADMINS","USERS","DELETE");
INSERT INTO `PERMISO`(`IdGrupo`, `IdFuncionalidad`, `IdAccion`) VALUES ("ADMINS","USERS","SEARCH");
INSERT INTO `PERMISO`(`IdGrupo`, `IdFuncionalidad`, `IdAccion`) VALUES ("ADMINS","USERS","ASSING");

INSERT INTO `PERMISO`(`IdGrupo`, `IdFuncionalidad`, `IdAccion`) VALUES ("ADMINS","GROUPS","ADD");
INSERT INTO `PERMISO`(`IdGrupo`, `IdFuncionalidad`, `IdAccion`) VALUES ("ADMINS","GROUPS","ACESS");
INSERT INTO `PERMISO`(`IdGrupo`, `IdFuncionalidad`, `IdAccion`) VALUES ("ADMINS","GROUPS","EDIT");
INSERT INTO `PERMISO`(`IdGrupo`, `IdFuncionalidad`, `IdAccion`) VALUES ("ADMINS","GROUPS","DELETE");
INSERT INTO `PERMISO`(`IdGrupo`, `IdFuncionalidad`, `IdAccion`) VALUES ("ADMINS","GROUPS ","SEARCH");


INSERT INTO `PERMISO`(`IdGrupo`, `IdFuncionalidad`, `IdAccion`) VALUES ("ADMINS","PERMIS","ACESS");
INSERT INTO `PERMISO`(`IdGrupo`, `IdFuncionalidad`, `IdAccion`) VALUES ("ADMINS","PERMIS ","SEARCH");

*/





