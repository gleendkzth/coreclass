CREATE DATABASE IF NOT EXISTS coreclass_db;
USE coreclass_db;

CREATE TABLE administrador (
  id_admin INT(11) NOT NULL AUTO_INCREMENT,
  id_usuario INT(11) NOT NULL,
  cargo VARCHAR(50) DEFAULT NULL,
  permisos TEXT DEFAULT NULL,
  PRIMARY KEY (id_admin),
  KEY id_usuario (id_usuario)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO administrador (id_admin, id_usuario, cargo, permisos) VALUES
(1, 1, 'Administrador General', 'Gestión total');

CREATE TABLE asistencia (
  id_asistencia INT(11) NOT NULL AUTO_INCREMENT,
  id_matricula_curso INT(11) NOT NULL,
  fecha DATE NOT NULL DEFAULT CURDATE(),
  id_docente INT(11) NOT NULL,
  observaciones TEXT DEFAULT NULL,
  PRIMARY KEY (id_asistencia),
  KEY id_matricula_curso (id_matricula_curso),
  KEY id_docente (id_docente)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO asistencia VALUES (1, 1, '2025-10-20', 4, NULL);

CREATE TABLE bitacora (
  id_bitacora INT(11) NOT NULL AUTO_INCREMENT,
  id_usuario INT(11) DEFAULT NULL,
  accion TEXT NOT NULL,
  fecha DATETIME DEFAULT CURRENT_TIMESTAMP(),
  PRIMARY KEY (id_bitacora),
  KEY id_usuario (id_usuario)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE curso (
  id_curso INT(11) NOT NULL AUTO_INCREMENT,
  id_programa INT(11) NOT NULL,
  id_docente INT(11) DEFAULT NULL,
  nombre VARCHAR(100) NOT NULL,
  descripcion TEXT DEFAULT NULL,
  creditos INT(11) DEFAULT NULL,
  semestre VARCHAR(10) NOT NULL,
  fecha_inicio DATE DEFAULT NULL,
  fecha_fin DATE DEFAULT NULL,
  PRIMARY KEY (id_curso),
  KEY id_programa (id_programa),
  KEY id_docente (id_docente)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO curso VALUES
(1, 2, 4, 'Administracion web', '0', 4, 'I', '2025-10-01', '2025-10-31'),
(2, 2, 4, 'Base de datos', '', 2, 'I', '2025-10-01', '2025-10-31'),
(4, 3, 4, 'arroz', '', 2, 'V', '2025-10-01', '2025-10-09'),
(5, 13, 6, 'Introducción al Software', '', 4, 'I', '2026-04-13', '2027-06-23');

CREATE TABLE detalle_asistencia (
  id_detalle INT(11) NOT NULL AUTO_INCREMENT,
  id_asistencia INT(11) NOT NULL,
  id_estudiante INT(11) NOT NULL,
  estado ENUM('-','P','F','T','J') DEFAULT '-',
  hora_marcada TIME DEFAULT CURTIME(),
  observacion TEXT DEFAULT NULL,
  PRIMARY KEY (id_detalle),
  KEY id_asistencia (id_asistencia),
  KEY id_estudiante (id_estudiante)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO detalle_asistencia VALUES (1, 1, 1, 'P', '08:04:52', NULL);

CREATE TABLE docente (
  id_docente INT(11) NOT NULL AUTO_INCREMENT,
  id_usuario INT(11) NOT NULL,
  especialidad VARCHAR(100) DEFAULT NULL,
  grado_academico VARCHAR(100) DEFAULT NULL,
  PRIMARY KEY (id_docente),
  KEY id_usuario (id_usuario)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO docente VALUES
(4, 4, 'web', 'alto'),
(5, 5, 'web', 'web1'),
(6, 7, 'Ing.Sistemas', '5');

CREATE TABLE docente_asignacion (
  id_asignacion INT(11) NOT NULL AUTO_INCREMENT,
  id_docente INT(11) NOT NULL,
  id_curso INT(11) NOT NULL,
  id_programa INT(11) NOT NULL,
  seccion VARCHAR(10) DEFAULT NULL,
  PRIMARY KEY (id_asignacion),
  KEY id_docente (id_docente),
  KEY id_curso (id_curso),
  KEY id_programa (id_programa)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE estudiante (
  id_estudiante INT(11) NOT NULL AUTO_INCREMENT,
  id_usuario INT(11) NOT NULL,
  codigo_estudiante VARCHAR(20) NOT NULL,
  fecha_ingreso DATE NOT NULL,
  PRIMARY KEY (id_estudiante),
  UNIQUE KEY codigo_estudiante (codigo_estudiante),
  KEY id_usuario (id_usuario)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO estudiante VALUES
(1, 3, 'J26-24-002', '2025-03-01'),
(2, 6, '2342k3nlk2n', '2025-10-03'),
(3, 8, 'J24-26-085', '2025-10-01');

CREATE TABLE horario (
  id_horario INT(11) NOT NULL AUTO_INCREMENT,
  id_curso INT(11) NOT NULL,
  dia_semana VARCHAR(15) DEFAULT NULL,
  hora_inicio TIME DEFAULT NULL,
  hora_fin TIME DEFAULT NULL,
  aula VARCHAR(30) DEFAULT NULL,
  PRIMARY KEY (id_horario),
  KEY id_curso (id_curso)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE material (
  id_material INT(11) NOT NULL AUTO_INCREMENT,
  id_curso INT(11) NOT NULL,
  titulo VARCHAR(150) DEFAULT NULL,
  descripcion TEXT DEFAULT NULL,
  tipo VARCHAR(50) DEFAULT NULL,
  archivo VARCHAR(255) DEFAULT NULL,
  fecha_subida DATETIME DEFAULT CURRENT_TIMESTAMP(),
  PRIMARY KEY (id_material),
  KEY id_curso (id_curso)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE matricula (
  id_matricula INT(11) NOT NULL AUTO_INCREMENT,
  id_estudiante INT(11) NOT NULL,
  id_programa INT(11) NOT NULL,
  semestre VARCHAR(10) NOT NULL,
  fecha_matricula DATE DEFAULT CURDATE(),
  estado ENUM('Activo','Retirado','Egresado') DEFAULT 'Activo',
  PRIMARY KEY (id_matricula),
  UNIQUE KEY uniq_matricula (id_estudiante, id_programa, semestre),
  KEY id_programa (id_programa)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO matricula VALUES
(1, 1, 2, 'I', '2025-10-23', 'Activo'),
(11, 2, 2, 'I', '2025-10-24', 'Activo'),
(12, 3, 13, 'I', '2025-10-26', 'Activo');

CREATE TABLE matricula_curso (
  id_matricula_curso INT(11) NOT NULL AUTO_INCREMENT,
  id_matricula INT(11) NOT NULL,
  id_curso INT(11) NOT NULL,
  PRIMARY KEY (id_matricula_curso),
  KEY id_matricula (id_matricula),
  KEY id_curso (id_curso)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO matricula_curso VALUES (1, 1, 1);

CREATE TABLE notas (
  id_calificacion INT(11) NOT NULL AUTO_INCREMENT,
  id_estudiante INT(11) NOT NULL,
  id_curso INT(11) NOT NULL,
  nombre_nota VARCHAR(20) NOT NULL,
  valor_nota DECIMAL(4,2) DEFAULT NULL,
  fecha_registro TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP() ON UPDATE CURRENT_TIMESTAMP(),
  PRIMARY KEY (id_calificacion),
  UNIQUE KEY idx_unica_nota (id_estudiante, id_curso, nombre_nota),
  KEY id_curso (id_curso)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE programa_estudio (
  id_programa INT(11) NOT NULL AUTO_INCREMENT,
  nombre VARCHAR(100) NOT NULL,
  descripcion TEXT DEFAULT NULL,
  PRIMARY KEY (id_programa)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO programa_estudio VALUES
(1, 'Enfermería', NULL),
(2, 'APSTI', NULL),
(3, 'Industrias Alimentarias', NULL),
(4, 'Contabilidad', NULL),
(5, 'Producción Agropecuaria', NULL),
(13, 'Sistemas de Sofware ', '');

CREATE TABLE semestre (
  id_semestre INT(11) NOT NULL AUTO_INCREMENT,
  nombre VARCHAR(10) NOT NULL,
  fecha_inicio DATE DEFAULT NULL,
  fecha_fin DATE DEFAULT NULL,
  estado ENUM('Activo','Finalizado','Pendiente') DEFAULT 'Activo',
  PRIMARY KEY (id_semestre)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE usuario (
  id_usuario INT(11) NOT NULL AUTO_INCREMENT,
  dni VARCHAR(15) NOT NULL,
  primer_nombre VARCHAR(50) NOT NULL,
  segundo_nombre VARCHAR(50) DEFAULT NULL,
  apellido_paterno VARCHAR(50) NOT NULL,
  apellido_materno VARCHAR(50) NOT NULL,
  usuario VARCHAR(50) NOT NULL,
  correo VARCHAR(100) NOT NULL,
  contrasena VARCHAR(255) NOT NULL,
  telefono VARCHAR(15) DEFAULT NULL,
  rol ENUM('administrador','docente','estudiante') NOT NULL,
  estado TINYINT(1) DEFAULT 1,
  fecha_registro DATETIME DEFAULT CURRENT_TIMESTAMP(),
  PRIMARY KEY (id_usuario),
  UNIQUE KEY dni (dni),
  UNIQUE KEY usuario (usuario),
  UNIQUE KEY correo (correo)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO usuario VALUES
(1, '12345678', 'Elver', 'Fedver', 'Calcina', 'Condori', 'admin', 'administrador@coreclass.edu', '123456', NULL, 'administrador', 1, '2025-10-23 08:36:59'),
(3, '11223344', 'Monica', '', 'Quill', 'Lype', 'monica', 'estudiante@coreclass.edu', '123456', '', 'estudiante', 1, '2025-10-23 08:36:59'),
(4, '87654321', 'Antony', 'Howard', 'Tre', 'Spy', 'Anthony', 'docente@coreclass.edu', '123456', '', 'docente', 1, '2025-10-23 14:29:10'),
(5, '12341234', 'Paul', '', 'Smith', 'Lau', 'paul', 'paul@coreclass.edu', 'paul1234', '', 'docente', 1, '2025-10-23 15:26:09'),
(6, '123123123123', 'Mike', '', 'Smith', 'Ells', 'sdsvd', 'eee@coreclass.edu', '12345', '123123123123', 'estudiante', 1, '2025-10-24 08:42:45'),
(7, '74964742', 'mirian', '', 'Paucar', 'Hualpa', 'MIRIAN ESMERALDA PAUCAR HUALPA', 'mia@gmail.com', '54321', '123456', 'docente', 1, '2025-10-26 16:18:30'),
(8, '02296987', 'Enrique', 'Robert', 'Delgado', 'Coasaca', 'Enrrique', 'erdelco007@gmail.com', '123456', '977170735', 'estudiante', 1, '2025-10-26 16:22:52');

ALTER TABLE administrador
  ADD CONSTRAINT administrador_fk FOREIGN KEY (id_usuario) REFERENCES usuario (id_usuario) ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE asistencia
  ADD CONSTRAINT asistencia_matricula_fk FOREIGN KEY (id_matricula_curso) REFERENCES matricula_curso (id_matricula_curso) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT asistencia_docente_fk FOREIGN KEY (id_docente) REFERENCES docente (id_docente) ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE bitacora
  ADD CONSTRAINT bitacora_usuario_fk FOREIGN KEY (id_usuario) REFERENCES usuario (id_usuario) ON DELETE SET NULL;

ALTER TABLE curso
  ADD CONSTRAINT curso_programa_fk FOREIGN KEY (id_programa) REFERENCES programa_estudio (id_programa) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT curso_docente_fk FOREIGN KEY (id_docente) REFERENCES docente (id_docente) ON DELETE SET NULL ON UPDATE CASCADE;

ALTER TABLE detalle_asistencia
  ADD CONSTRAINT detalle_asistencia_asistencia_fk FOREIGN KEY (id_asistencia) REFERENCES asistencia (id_asistencia) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT detalle_asistencia_estudiante_fk FOREIGN KEY (id_estudiante) REFERENCES estudiante (id_estudiante) ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE docente
  ADD CONSTRAINT docente_usuario_fk FOREIGN KEY (id_usuario) REFERENCES usuario (id_usuario) ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE docente_asignacion
  ADD CONSTRAINT docente_asignacion_docente_fk FOREIGN KEY (id_docente) REFERENCES docente (id_docente) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT docente_asignacion_curso_fk FOREIGN KEY (id_curso) REFERENCES curso (id_curso) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT docente_asignacion_programa_fk FOREIGN KEY (id_programa) REFERENCES programa_estudio (id_programa) ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE estudiante
  ADD CONSTRAINT estudiante_usuario_fk FOREIGN KEY (id_usuario) REFERENCES usuario (id_usuario) ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE horario
  ADD CONSTRAINT horario_curso_fk FOREIGN KEY (id_curso) REFERENCES curso (id_curso) ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE material
  ADD CONSTRAINT material_curso_fk FOREIGN KEY (id_curso) REFERENCES curso (id_curso) ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE matricula
  ADD CONSTRAINT matricula_estudiante_fk FOREIGN KEY (id_estudiante) REFERENCES estudiante (id_estudiante) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT matricula_programa_fk FOREIGN KEY (id_programa) REFERENCES programa_estudio (id_programa) ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE matricula_curso
  ADD CONSTRAINT matricula_curso_matricula_fk FOREIGN KEY (id_matricula) REFERENCES matricula (id_matricula) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT matricula_curso_curso_fk FOREIGN KEY (id_curso) REFERENCES curso (id_curso) ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE notas
  ADD CONSTRAINT notas_estudiante_fk FOREIGN KEY (id_estudiante) REFERENCES estudiante (id_estudiante) ON DELETE CASCADE,
  ADD CONSTRAINT notas_curso_fk FOREIGN KEY (id_curso) REFERENCES curso (id_curso) ON DELETE CASCADE;
