SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";
SET NAMES utf8mb4;

CREATE DATABASE IF NOT EXISTS `coreclass_db`;
USE `coreclass_db`;

CREATE TABLE `usuario` (
  `id_usuario` int(11) NOT NULL AUTO_INCREMENT,
  `dni` varchar(15) NOT NULL,
  `primer_nombre` varchar(50) NOT NULL,
  `segundo_nombre` varchar(50) DEFAULT NULL,
  `apellido_paterno` varchar(50) NOT NULL,
  `apellido_materno` varchar(50) NOT NULL,
  `usuario` varchar(50) NOT NULL,
  `correo` varchar(100) NOT NULL,
  `contrasena` varchar(255) NOT NULL,
  `telefono` varchar(15) DEFAULT NULL,
  `rol` enum('administrador','docente','estudiante') NOT NULL,
  `estado` tinyint(1) DEFAULT 1,
  `fecha_registro` datetime DEFAULT current_timestamp(),
  PRIMARY KEY (`id_usuario`),
  UNIQUE KEY `dni` (`dni`),
  UNIQUE KEY `usuario` (`usuario`),
  UNIQUE KEY `correo` (`correo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `usuario` (`id_usuario`, `dni`, `primer_nombre`, `segundo_nombre`, `apellido_paterno`, `apellido_materno`, `usuario`, `correo`, `contrasena`, `telefono`, `rol`, `estado`, `fecha_registro`) VALUES
(1, '12345678', 'Steven', 'Mike', 'Tyre', 'Spy', 'admin', 'administrador@coreclass.edu', '123456', NULL, 'administrador', 1, '2025-10-23 08:36:59'),
(3, '11223344', 'Monica', '', 'Quill', 'Lype', 'monica', 'estudiante@coreclass.edu', '123456', '', 'estudiante', 1, '2025-10-23 08:36:59'),
(4, '87654321', 'Antony', 'Howard', 'Tre', 'Spy', 'Anthony', 'docente@coreclass.edu', '123456', '', 'docente', 1, '2025-10-23 14:29:10'),
(5, '12341234', 'Paul', '', 'Smith', 'Lau', 'paul', 'paul@coreclass.edu', 'paul1234', '', 'docente', 1, '2025-10-23 15:26:09'),
(6, '123123123123', 'Mike', '', 'Smith', 'Ells', 'sdsvd', 'eee@coreclass.edu', '12345', '123123123123', 'estudiante', 1, '2025-10-24 08:42:45');

CREATE TABLE `administrador` (
  `id_admin` int(11) NOT NULL AUTO_INCREMENT,
  `id_usuario` int(11) NOT NULL,
  `cargo` varchar(50) DEFAULT NULL,
  `permisos` text DEFAULT NULL,
  PRIMARY KEY (`id_admin`),
  KEY `id_usuario` (`id_usuario`),
  FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `administrador` VALUES (1, 1, 'Administrador General', 'Gestión total');

CREATE TABLE `programa_estudio` (
  `id_programa` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) NOT NULL,
  `descripcion` text DEFAULT NULL,
  PRIMARY KEY (`id_programa`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `programa_estudio` VALUES
(1, 'Enfermería', NULL),
(2, 'APSTI', NULL),
(3, 'Industrias Alimentarias', NULL),
(4, 'Contabilidad', NULL),
(5, 'Producción Agropecuaria', NULL);

CREATE TABLE `docente` (
  `id_docente` int(11) NOT NULL AUTO_INCREMENT,
  `id_usuario` int(11) NOT NULL,
  `especialidad` varchar(100) DEFAULT NULL,
  `grado_academico` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id_docente`),
  KEY `id_usuario` (`id_usuario`),
  FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `docente` VALUES
(4, 4, 'web', 'alto'),
(5, 5, 'web', 'web1');

CREATE TABLE `curso` (
  `id_curso` int(11) NOT NULL AUTO_INCREMENT,
  `id_programa` int(11) NOT NULL,
  `id_docente` int(11) DEFAULT NULL,
  `nombre` varchar(100) NOT NULL,
  `descripcion` text DEFAULT NULL,
  `creditos` int(11) DEFAULT NULL,
  `semestre` varchar(10) NOT NULL,
  `fecha_inicio` date DEFAULT NULL,
  `fecha_fin` date DEFAULT NULL,
  PRIMARY KEY (`id_curso`),
  KEY `id_programa` (`id_programa`),
  KEY `id_docente` (`id_docente`),
  FOREIGN KEY (`id_programa`) REFERENCES `programa_estudio` (`id_programa`) ON DELETE CASCADE ON UPDATE CASCADE,
  FOREIGN KEY (`id_docente`) REFERENCES `docente` (`id_docente`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `curso` VALUES
(1, 2, 4, 'Administracion web', '0', 4, 'I', '2025-10-01', '2025-10-31'),
(2, 2, 4, 'Base de datos', '', 2, 'I', '2025-10-01', '2025-10-31'),
(4, 3, 4, 'arroz', '', 2, 'V', '2025-10-01', '2025-10-09');

CREATE TABLE `estudiante` (
  `id_estudiante` int(11) NOT NULL AUTO_INCREMENT,
  `id_usuario` int(11) NOT NULL,
  `codigo_estudiante` varchar(20) NOT NULL,
  `fecha_ingreso` date NOT NULL,
  PRIMARY KEY (`id_estudiante`),
  UNIQUE KEY `codigo_estudiante` (`codigo_estudiante`),
  KEY `id_usuario` (`id_usuario`),
  FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `estudiante` VALUES
(1, 3, 'J26-24-002', '2025-03-01'),
(2, 6, '2342k3nlk2n', '2025-10-03');

CREATE TABLE `matricula` (
  `id_matricula` int(11) NOT NULL AUTO_INCREMENT,
  `id_estudiante` int(11) NOT NULL,
  `id_programa` int(11) NOT NULL,
  `semestre` varchar(10) NOT NULL,
  `fecha_matricula` date DEFAULT curdate(),
  `estado` enum('Activo','Retirado','Egresado') DEFAULT 'Activo',
  PRIMARY KEY (`id_matricula`),
  UNIQUE KEY `unique_matricula` (`id_estudiante`,`id_programa`,`semestre`),
  FOREIGN KEY (`id_estudiante`) REFERENCES `estudiante` (`id_estudiante`) ON DELETE CASCADE ON UPDATE CASCADE,
  FOREIGN KEY (`id_programa`) REFERENCES `programa_estudio` (`id_programa`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `matricula` VALUES
(1, 1, 2, 'I', '2025-10-23', 'Activo'),
(11, 2, 2, 'I', '2025-10-24', 'Activo');

CREATE TABLE `matricula_curso` (
  `id_matricula_curso` int(11) NOT NULL AUTO_INCREMENT,
  `id_matricula` int(11) NOT NULL,
  `id_curso` int(11) NOT NULL,
  PRIMARY KEY (`id_matricula_curso`),
  FOREIGN KEY (`id_matricula`) REFERENCES `matricula` (`id_matricula`) ON DELETE CASCADE ON UPDATE CASCADE,
  FOREIGN KEY (`id_curso`) REFERENCES `curso` (`id_curso`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `matricula_curso` VALUES (1, 1, 1);

CREATE TABLE `asistencia` (
  `id_asistencia` int(11) NOT NULL AUTO_INCREMENT,
  `id_matricula_curso` int(11) NOT NULL,
  `fecha` date NOT NULL DEFAULT curdate(),
  `id_docente` int(11) NOT NULL,
  `observaciones` text DEFAULT NULL,
  PRIMARY KEY (`id_asistencia`),
  FOREIGN KEY (`id_matricula_curso`) REFERENCES `matricula_curso` (`id_matricula_curso`) ON DELETE CASCADE ON UPDATE CASCADE,
  FOREIGN KEY (`id_docente`) REFERENCES `docente` (`id_docente`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `asistencia` VALUES (1, 1, '2025-10-20', 4, NULL);

CREATE TABLE `detalle_asistencia` (
  `id_detalle` int(11) NOT NULL AUTO_INCREMENT,
  `id_asistencia` int(11) NOT NULL,
  `id_estudiante` int(11) NOT NULL,
  `estado` enum('-','P','F','T','J') DEFAULT '-',
  `hora_marcada` time DEFAULT curtime(),
  `observacion` text DEFAULT NULL,
  PRIMARY KEY (`id_detalle`),
  FOREIGN KEY (`id_asistencia`) REFERENCES `asistencia` (`id_asistencia`) ON DELETE CASCADE ON UPDATE CASCADE,
  FOREIGN KEY (`id_estudiante`) REFERENCES `estudiante` (`id_estudiante`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `detalle_asistencia` VALUES (1, 1, 1, 'P', '08:04:52', NULL);

COMMIT;
