-- Base de datos: coreclass_db

CREATE DATABASE IF NOT EXISTS coreclass_db CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE coreclass_db;

-- =============================
-- TABLA: Usuario
-- =============================
CREATE TABLE Usuario (
  id_usuario INT AUTO_INCREMENT PRIMARY KEY,
  nombre VARCHAR(100) NOT NULL,
  apellido VARCHAR(100) NOT NULL,
  correo VARCHAR(100) NOT NULL UNIQUE,
  contrasena VARCHAR(255) NOT NULL,
  rol ENUM('administrador','docente','estudiante') NOT NULL,
  estado TINYINT(1) DEFAULT 1,
  fecha_registro DATETIME DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO Usuario (id_usuario, nombre, apellido, correo, contrasena, rol, estado, fecha_registro) VALUES
(1, 'Mark', 'Stan', 'admin@coreclass.edu', '123456', 'administrador', 1, '2025-10-18 21:29:17'),
(2, 'Anthony', 'Main', 'docente@coreclass.edu', '123456', 'docente', 1, '2025-10-18 21:29:17'),
(3, 'Monica', 'Lye', 'estudiante@coreclass.edu', '123456', 'estudiante', 1, '2025-10-18 21:29:17'),

-- =============================
-- TABLA: Administrador
-- =============================
CREATE TABLE Administrador (
  id_admin INT AUTO_INCREMENT PRIMARY KEY,
  id_usuario INT NOT NULL,
  cargo VARCHAR(50),
  permisos TEXT,
  FOREIGN KEY (id_usuario) REFERENCES Usuario(id_usuario) ON DELETE CASCADE ON UPDATE CASCADE
);

INSERT INTO Administrador (id_admin, id_usuario, cargo, permisos) VALUES
(1, 1, 'Administrador General', 'Gestión total');

-- =============================
-- TABLA: Docente
-- =============================
CREATE TABLE Docente (
  id_docente INT AUTO_INCREMENT PRIMARY KEY,
  id_usuario INT NOT NULL,
  especialidad VARCHAR(100),
  grado_academico VARCHAR(100),
  FOREIGN KEY (id_usuario) REFERENCES Usuario(id_usuario) ON DELETE CASCADE ON UPDATE CASCADE
);

INSERT INTO Docente (id_docente, id_usuario, especialidad, grado_academico) VALUES
(1, 2, 'Desarrollo Web', 'Licenciado en Programación'),
(2, 5, 'Web', 'Licenciado');

-- =============================
-- TABLA: Estudiante
-- =============================
CREATE TABLE Estudiante (
  id_estudiante INT AUTO_INCREMENT PRIMARY KEY,
  id_usuario INT NOT NULL,
  codigo_estudiante VARCHAR(20) NOT NULL UNIQUE,
  fecha_ingreso DATE NOT NULL,
  FOREIGN KEY (id_usuario) REFERENCES Usuario(id_usuario) ON DELETE CASCADE ON UPDATE CASCADE
);

INSERT INTO Estudiante (id_estudiante, id_usuario, codigo_estudiante, fecha_ingreso) VALUES
(1, 3, 'J26-24-002', '2025-03-01'),
(2, 4, 'j26-24-003', '2025-10-19');

-- =============================
-- TABLA: ProgramaEstudio
-- =============================
CREATE TABLE ProgramaEstudio (
  id_programa INT AUTO_INCREMENT PRIMARY KEY,
  nombre VARCHAR(100) NOT NULL,
  descripcion TEXT
);

INSERT INTO ProgramaEstudio (id_programa, nombre, descripcion) VALUES
(1, 'Enfermería', NULL),
(2, 'APSTI', NULL),
(3, 'Industrias Alimentarias', NULL),
(4, 'Contabilidad', NULL),
(5, 'Producción Agropecuaria', NULL);

-- =============================
-- TABLA: Curso
-- =============================
CREATE TABLE Curso (
  id_curso INT AUTO_INCREMENT PRIMARY KEY,
  id_programa INT NOT NULL,
  id_docente INT,
  nombre VARCHAR(100) NOT NULL,
  descripcion TEXT,
  creditos INT,
  semestre VARCHAR(10) NOT NULL,
  fecha_inicio DATE,
  fecha_fin DATE,
  FOREIGN KEY (id_programa) REFERENCES ProgramaEstudio(id_programa) ON DELETE CASCADE ON UPDATE CASCADE,
  FOREIGN KEY (id_docente) REFERENCES Docente(id_docente) ON DELETE SET NULL ON UPDATE CASCADE
);

INSERT INTO Curso (id_curso, id_programa, id_docente, nombre, descripcion, creditos, semestre, fecha_inicio, fecha_fin) VALUES
(1, 2, 1, 'Diseño', NULL, 4, 'I', NULL, NULL);

-- =============================
-- TABLA: Horario
-- =============================
CREATE TABLE Horario (
  id_horario INT AUTO_INCREMENT PRIMARY KEY,
  id_curso INT NOT NULL,
  dia_semana VARCHAR(15),
  hora_inicio TIME,
  hora_fin TIME,
  aula VARCHAR(30),
  FOREIGN KEY (id_curso) REFERENCES Curso(id_curso) ON DELETE CASCADE ON UPDATE CASCADE
);

-- =============================
-- TABLA: Material
-- =============================
CREATE TABLE Material (
  id_material INT AUTO_INCREMENT PRIMARY KEY,
  id_curso INT NOT NULL,
  titulo VARCHAR(150),
  descripcion TEXT,
  tipo VARCHAR(50),
  archivo VARCHAR(255),
  fecha_subida DATETIME DEFAULT CURRENT_TIMESTAMP,
  FOREIGN KEY (id_curso) REFERENCES Curso(id_curso) ON DELETE CASCADE ON UPDATE CASCADE
);

-- =============================
-- TABLA: Matricula
-- =============================
CREATE TABLE Matricula (
  id_matricula INT AUTO_INCREMENT PRIMARY KEY,
  id_estudiante INT NOT NULL,
  id_programa INT NOT NULL,
  semestre VARCHAR(10) NOT NULL,
  fecha_matricula DATE NOT NULL DEFAULT CURDATE(),
  estado ENUM('Activo','Retirado','Egresado') DEFAULT 'Activo',
  UNIQUE KEY (id_estudiante, id_programa, semestre),
  FOREIGN KEY (id_estudiante) REFERENCES Estudiante(id_estudiante) ON DELETE CASCADE ON UPDATE CASCADE,
  FOREIGN KEY (id_programa) REFERENCES ProgramaEstudio(id_programa) ON DELETE CASCADE ON UPDATE CASCADE
);

INSERT INTO Matricula (id_matricula, id_estudiante, id_programa, semestre, fecha_matricula, estado) VALUES
(1, 1, 2, 'IV', '2025-10-19', 'Activo'),
(2, 2, 2, 'I', '2025-10-19', 'Activo');

-- =============================
-- TABLA: MatriculaCurso
-- =============================
CREATE TABLE MatriculaCurso (
  id_matricula_curso INT AUTO_INCREMENT PRIMARY KEY,
  id_matricula INT NOT NULL,
  id_curso INT NOT NULL,
  FOREIGN KEY (id_matricula) REFERENCES Matricula(id_matricula) ON DELETE CASCADE ON UPDATE CASCADE,
  FOREIGN KEY (id_curso) REFERENCES Curso(id_curso) ON DELETE CASCADE ON UPDATE CASCADE
);

-- =============================
-- TABLA: Asistencia
-- =============================
CREATE TABLE Asistencia (
  id_asistencia INT AUTO_INCREMENT PRIMARY KEY,
  id_matricula_curso INT NOT NULL,
  fecha DATE DEFAULT CURDATE(),
  estado ENUM('Presente','Tarde','Ausente') DEFAULT 'Presente',
  observacion TEXT,
  FOREIGN KEY (id_matricula_curso) REFERENCES MatriculaCurso(id_matricula_curso) ON DELETE CASCADE ON UPDATE CASCADE
);

-- =============================
-- TABLA: Nota
-- =============================
CREATE TABLE Nota (
  id_nota INT AUTO_INCREMENT PRIMARY KEY,
  id_matricula_curso INT NOT NULL,
  evaluacion VARCHAR(50),
  puntaje DECIMAL(5,2),
  ponderacion DECIMAL(5,2),
  fecha DATE DEFAULT CURDATE(),
  observacion TEXT,
  FOREIGN KEY (id_matricula_curso) REFERENCES MatriculaCurso(id_matricula_curso) ON DELETE CASCADE ON UPDATE CASCADE
);
