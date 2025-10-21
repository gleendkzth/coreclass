-- ============================================
-- BASE DE DATOS: coreclass_db
-- ============================================
DROP DATABASE IF EXISTS coreclass_db;
CREATE DATABASE coreclass_db CHARACTER SET utf8mb4 COLLATE utf8mb4_uca1400_ai_ci;
USE coreclass_db;

-- ============================================
-- TABLA: Usuario
-- Contiene toda la información base de login.
-- ============================================
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

-- ============================================
-- TABLA: ProgramaEstudio
-- ============================================
CREATE TABLE ProgramaEstudio (
    id_programa INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    descripcion TEXT DEFAULT NULL
);

-- ============================================
-- TABLA: Estudiante
-- ============================================
CREATE TABLE Estudiante (
    id_estudiante INT AUTO_INCREMENT PRIMARY KEY,
    id_usuario INT NOT NULL,
    codigo_estudiante VARCHAR(20) UNIQUE NOT NULL,
    fecha_ingreso DATE NOT NULL,
    FOREIGN KEY (id_usuario) REFERENCES Usuario(id_usuario) ON DELETE CASCADE ON UPDATE CASCADE
);

-- ============================================
-- TABLA: Docente
-- ============================================
CREATE TABLE Docente (
    id_docente INT AUTO_INCREMENT PRIMARY KEY,
    id_usuario INT NOT NULL,
    especialidad VARCHAR(100),
    grado_academico VARCHAR(100),
    FOREIGN KEY (id_usuario) REFERENCES Usuario(id_usuario) ON DELETE CASCADE ON UPDATE CASCADE
);

-- ============================================
-- TABLA: Administrador
-- ============================================
CREATE TABLE Administrador (
    id_admin INT AUTO_INCREMENT PRIMARY KEY,
    id_usuario INT NOT NULL,
    cargo VARCHAR(50),
    permisos TEXT,
    FOREIGN KEY (id_usuario) REFERENCES Usuario(id_usuario) ON DELETE CASCADE ON UPDATE CASCADE
);

-- ============================================
-- TABLA: Matricula
-- Relaciona estudiante con programa y semestre
-- ============================================
CREATE TABLE Matricula (
    id_matricula INT AUTO_INCREMENT PRIMARY KEY,
    id_estudiante INT NOT NULL,
    id_programa INT NOT NULL,
    semestre VARCHAR(10) NOT NULL,
    fecha_matricula DATE NOT NULL DEFAULT (CURRENT_DATE),
    estado ENUM('Activo','Retirado','Egresado') DEFAULT 'Activo',
    UNIQUE KEY (id_estudiante, id_programa, semestre),
    FOREIGN KEY (id_estudiante) REFERENCES Estudiante(id_estudiante) ON DELETE CASCADE ON UPDATE CASCADE,
    FOREIGN KEY (id_programa) REFERENCES ProgramaEstudio(id_programa) ON DELETE CASCADE ON UPDATE CASCADE
);

-- ============================================
-- TABLA: Curso
-- ============================================
CREATE TABLE Curso (
    id_curso INT AUTO_INCREMENT PRIMARY KEY,
    id_programa INT NOT NULL,
    id_docente INT DEFAULT NULL,
    nombre VARCHAR(100) NOT NULL,
    descripcion TEXT,
    creditos INT,
    semestre VARCHAR(10) NOT NULL,
    fecha_inicio DATE DEFAULT NULL,
    fecha_fin DATE DEFAULT NULL,
    FOREIGN KEY (id_programa) REFERENCES ProgramaEstudio(id_programa) ON DELETE CASCADE ON UPDATE CASCADE,
    FOREIGN KEY (id_docente) REFERENCES Docente(id_docente) ON DELETE SET NULL ON UPDATE CASCADE
);

-- ============================================
-- TABLA: MatriculaCurso
-- Qué cursos lleva un estudiante según su matrícula
-- ============================================
CREATE TABLE MatriculaCurso (
    id_matricula_curso INT AUTO_INCREMENT PRIMARY KEY,
    id_matricula INT NOT NULL,
    id_curso INT NOT NULL,
    FOREIGN KEY (id_matricula) REFERENCES Matricula(id_matricula) ON DELETE CASCADE ON UPDATE CASCADE,
    FOREIGN KEY (id_curso) REFERENCES Curso(id_curso) ON DELETE CASCADE ON UPDATE CASCADE
);

-- ============================================
-- TABLA: Nota
-- ============================================
CREATE TABLE Nota (
    id_nota INT AUTO_INCREMENT PRIMARY KEY,
    id_matricula_curso INT NOT NULL,
    evaluacion VARCHAR(50),
    puntaje DECIMAL(5,2),
    ponderacion DECIMAL(5,2),
    fecha DATE DEFAULT (CURRENT_DATE),
    observacion TEXT,
    FOREIGN KEY (id_matricula_curso) REFERENCES MatriculaCurso(id_matricula_curso) ON DELETE CASCADE ON UPDATE CASCADE
);

-- ============================================
-- TABLA: Asistencia
-- ============================================
CREATE TABLE Asistencia (
    id_asistencia INT AUTO_INCREMENT PRIMARY KEY,
    id_matricula_curso INT NOT NULL,
    fecha DATE DEFAULT (CURRENT_DATE),
    estado ENUM('Presente','Tarde','Ausente') DEFAULT 'Presente',
    observacion TEXT,
    FOREIGN KEY (id_matricula_curso) REFERENCES MatriculaCurso(id_matricula_curso) ON DELETE CASCADE ON UPDATE CASCADE
);

-- ============================================
-- TABLA: Horario
-- ============================================
CREATE TABLE Horario (
    id_horario INT AUTO_INCREMENT PRIMARY KEY,
    id_curso INT NOT NULL,
    dia_semana VARCHAR(15),
    hora_inicio TIME,
    hora_fin TIME,
    aula VARCHAR(30),
    FOREIGN KEY (id_curso) REFERENCES Curso(id_curso) ON DELETE CASCADE ON UPDATE CASCADE
);

-- ============================================
-- TABLA: Material
-- ============================================
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

-- ============================================
-- DATOS DE PRUEBA
-- ============================================
INSERT INTO ProgramaEstudio (nombre) VALUES
('Enfermería'), ('Computación e Informática (APSTI)'), ('Industrias Alimentarias'),
('Contabilidad'), ('Producción Agropecuaria');

INSERT INTO Usuario (nombre, apellido, correo, contrasena, rol) VALUES
('Mark', 'Stan', 'admin@coreclass.edu', '123456', 'administrador'),
('Anthony', 'Main', 'docente@coreclass.edu', '123456', 'docente'),
('Monica', 'Lye', 'estudiante@coreclass.edu', '123456', 'estudiante');

INSERT INTO Administrador (id_usuario, cargo, permisos) VALUES
(1, 'Administrador General', 'Gestión total');

INSERT INTO Docente (id_usuario, especialidad, grado_academico) VALUES
(2, 'Desarrollo Web', 'Licenciado en Programación');

INSERT INTO Estudiante (id_usuario, codigo_estudiante, fecha_ingreso) VALUES
(3, 'J26-24-001', '2025-03-01');


-- Aqui iran codigo sql que se agregara ya que la base de datos ya fue creada, para nuevas mejoras o tablas o cu¿olumnas iran aqui:
