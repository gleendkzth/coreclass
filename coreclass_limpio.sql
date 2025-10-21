CREATE DATABASE IF NOT EXISTS coreclass_db;
USE coreclass_db;

-- Tabla: usuario
CREATE TABLE usuario (
  id_usuario INT AUTO_INCREMENT PRIMARY KEY,
  nombre VARCHAR(100) NOT NULL,
  apellido VARCHAR(100) NOT NULL,
  correo VARCHAR(100) NOT NULL UNIQUE,
  contrasena VARCHAR(255) NOT NULL,
  rol ENUM('administrador', 'docente', 'estudiante') NOT NULL,
  estado TINYINT(1) DEFAULT 1,
  fecha_registro DATETIME DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO usuario (id_usuario, nombre, apellido, correo, contrasena, rol, estado, fecha_registro) VALUES
(1, 'Mark', 'Stan', 'admin@coreclass.edu', '123456', 'administrador', 1, '2025-10-18 21:29:17'),
(2, 'Anthony', 'Main', 'docente@coreclass.edu', '123456', 'docente', 1, '2025-10-18 21:29:17'),
(3, 'Monica', 'Lye', 'estudiante@coreclass.edu', '123456', 'estudiante', 1, '2025-10-18 21:29:17'),
(4, 'prueba', 'eee', 'prueba@coreclass.edu', '123456', 'estudiante', 1, '2025-10-19 09:00:31'),
(5, 'prueba', 'Tom', 'tom@coreclass.edu', '123456', 'docente', 1, '2025-10-19 09:01:58');

-- Tabla: administrador
CREATE TABLE administrador (
  id_admin INT AUTO_INCREMENT PRIMARY KEY,
  id_usuario INT NOT NULL,
  cargo VARCHAR(50),
  permisos TEXT,
  FOREIGN KEY (id_usuario) REFERENCES usuario(id_usuario) ON DELETE CASCADE ON UPDATE CASCADE
);

INSERT INTO administrador (id_admin, id_usuario, cargo, permisos) VALUES
(1, 1, 'Administrador General', 'Gestión total');

-- Tabla: docente
CREATE TABLE docente (
  id_docente INT AUTO_INCREMENT PRIMARY KEY,
  id_usuario INT NOT NULL,
  especialidad VARCHAR(100),
  grado_academico VARCHAR(100),
  FOREIGN KEY (id_usuario) REFERENCES usuario(id_usuario) ON DELETE CASCADE ON UPDATE CASCADE
);

INSERT INTO docente (id_docente, id_usuario, especialidad, grado_academico) VALUES
(1, 2, 'Desarrollo Web', 'Licenciado en Programación'),
(2, 5, 'Web', 'Licenciado');

-- Tabla: estudiante
CREATE TABLE estudiante (
  id_estudiante INT AUTO_INCREMENT PRIMARY KEY,
  id_usuario INT NOT NULL,
  codigo_estudiante VARCHAR(20) NOT NULL UNIQUE,
  fecha_ingreso DATE NOT NULL,
  FOREIGN KEY (id_usuario) REFERENCES usuario(id_usuario) ON DELETE CASCADE ON UPDATE CASCADE
);

INSERT INTO estudiante (id_estudiante, id_usuario, codigo_estudiante, fecha_ingreso) VALUES
(1, 3, 'J26-24-002', '2025-03-01'),
(2, 4, 'j26-24-003', '2025-10-19');

-- Tabla: programa_estudio
CREATE TABLE programa_estudio (
  id_programa INT AUTO_INCREMENT PRIMARY KEY,
  nombre VARCHAR(100) NOT NULL,
  descripcion TEXT
);

INSERT INTO programa_estudio (id_programa, nombre, descripcion) VALUES
(1, 'Enfermería', NULL),
(2, 'APSTI', NULL),
(3, 'Industrias Alimentarias', NULL),
(4, 'Contabilidad', NULL),
(5, 'Producción Agropecuaria', NULL);

-- Tabla: curso
CREATE TABLE curso (
  id_curso INT AUTO_INCREMENT PRIMARY KEY,
  id_programa INT NOT NULL,
  id_docente INT,
  nombre VARCHAR(100) NOT NULL,
  descripcion TEXT,
  creditos INT,
  semestre VARCHAR(10) NOT NULL,
  fecha_inicio DATE,
  fecha_fin DATE,
  FOREIGN KEY (id_programa) REFERENCES programa_estudio(id_programa) ON DELETE CASCADE ON UPDATE CASCADE,
  FOREIGN KEY (id_docente) REFERENCES docente(id_docente) ON DELETE SET NULL ON UPDATE CASCADE
);

INSERT INTO curso (id_curso, id_programa, id_docente, nombre, descripcion, creditos, semestre, fecha_inicio, fecha_fin) VALUES
(1, 2, 1, 'Diseño', NULL, 4, 'I', NULL, NULL);

-- Tabla: horario
CREATE TABLE horario (
  id_horario INT AUTO_INCREMENT PRIMARY KEY,
  id_curso INT NOT NULL,
  dia_semana VARCHAR(15),
  hora_inicio TIME,
  hora_fin TIME,
  aula VARCHAR(30),
  FOREIGN KEY (id_curso) REFERENCES curso(id_curso) ON DELETE CASCADE ON UPDATE CASCADE
);

-- Tabla: material
CREATE TABLE material (
  id_material INT AUTO_INCREMENT PRIMARY KEY,
  id_curso INT NOT NULL,
  titulo VARCHAR(150),
  descripcion TEXT,
  tipo VARCHAR(50),
  archivo VARCHAR(255),
  fecha_subida DATETIME DEFAULT CURRENT_TIMESTAMP,
  FOREIGN KEY (id_curso) REFERENCES curso(id_curso) ON DELETE CASCADE ON UPDATE CASCADE
);

-- Tabla: matricula
CREATE TABLE matricula (
  id_matricula INT AUTO_INCREMENT PRIMARY KEY,
  id_estudiante INT NOT NULL,
  id_programa INT NOT NULL,
  semestre VARCHAR(10) NOT NULL,
  fecha_matricula DATE DEFAULT CURDATE(),
  estado ENUM('Activo', 'Retirado', 'Egresado') DEFAULT 'Activo',
  UNIQUE KEY (id_estudiante, id_programa, semestre),
  FOREIGN KEY (id_estudiante) REFERENCES estudiante(id_estudiante) ON DELETE CASCADE ON UPDATE CASCADE,
  FOREIGN KEY (id_programa) REFERENCES programa_estudio(id_programa) ON DELETE CASCADE ON UPDATE CASCADE
);

INSERT INTO matricula (id_matricula, id_estudiante, id_programa, semestre, fecha_matricula, estado) VALUES
(1, 1, 2, 'IV', '2025-10-19', 'Activo'),
(2, 2, 2, 'I', '2025-10-19', 'Activo');

-- Tabla: matricula_curso
CREATE TABLE matricula_curso (
  id_matricula_curso INT AUTO_INCREMENT PRIMARY KEY,
  id_matricula INT NOT NULL,
  id_curso INT NOT NULL,
  FOREIGN KEY (id_matricula) REFERENCES matricula(id_matricula) ON DELETE CASCADE ON UPDATE CASCADE,
  FOREIGN KEY (id_curso) REFERENCES curso(id_curso) ON DELETE CASCADE ON UPDATE CASCADE
);

-- Tabla: asistencia
CREATE TABLE asistencia (
  id_asistencia INT AUTO_INCREMENT PRIMARY KEY,
  id_matricula_curso INT NOT NULL,
  fecha DATE DEFAULT CURDATE(),
  estado ENUM('Presente', 'Tarde', 'Ausente') DEFAULT 'Presente',
  observacion TEXT,
  FOREIGN KEY (id_matricula_curso) REFERENCES matricula_curso(id_matricula_curso) ON DELETE CASCADE ON UPDATE CASCADE
);

-- Tabla: nota
CREATE TABLE nota (
  id_nota INT AUTO_INCREMENT PRIMARY KEY,
  id_matricula_curso INT NOT NULL,
  evaluacion VARCHAR(50),
  puntaje DECIMAL(5,2),
  ponderacion DECIMAL(5,2),
  fecha DATE DEFAULT CURDATE(),
  observacion TEXT,
  FOREIGN KEY (id_matricula_curso) REFERENCES matricula_curso(id_matricula_curso) ON DELETE CASCADE ON UPDATE CASCADE
);
