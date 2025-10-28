-- =====================================================
-- BASE DE DATOS: coreclass_db
-- =====================================================

CREATE DATABASE coreclass_db CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE coreclass_db;

-- =====================================================
-- TABLA: USUARIO
-- =====================================================
CREATE TABLE usuario (
  id_usuario INT AUTO_INCREMENT PRIMARY KEY,
  dni VARCHAR(15) NOT NULL UNIQUE,
  primer_nombre VARCHAR(50) NOT NULL,
  segundo_nombre VARCHAR(50),
  apellido_paterno VARCHAR(50) NOT NULL,
  apellido_materno VARCHAR(50) NOT NULL,
  usuario VARCHAR(50) NOT NULL UNIQUE,
  correo VARCHAR(100) NOT NULL UNIQUE,
  contrasena VARCHAR(255) NOT NULL,
  telefono VARCHAR(15),
  rol ENUM('administrador', 'docente', 'estudiante') NOT NULL,
  estado TINYINT(1) DEFAULT 1,
  fecha_registro DATETIME DEFAULT CURRENT_TIMESTAMP
);

-- =====================================================
-- TABLA: ADMINISTRADOR
-- =====================================================
CREATE TABLE administrador (
  id_admin INT AUTO_INCREMENT PRIMARY KEY,
  id_usuario INT NOT NULL,
  cargo VARCHAR(50),
  permisos TEXT,
  FOREIGN KEY (id_usuario) REFERENCES usuario(id_usuario) ON DELETE CASCADE ON UPDATE CASCADE
);

-- =====================================================
-- TABLA: DOCENTE
-- =====================================================
CREATE TABLE docente (
  id_docente INT AUTO_INCREMENT PRIMARY KEY,
  id_usuario INT NOT NULL,
  especialidad VARCHAR(100),
  grado_academico VARCHAR(100),
  FOREIGN KEY (id_usuario) REFERENCES usuario(id_usuario) ON DELETE CASCADE ON UPDATE CASCADE
);

-- =====================================================
-- TABLA: ESTUDIANTE
-- =====================================================
CREATE TABLE estudiante (
  id_estudiante INT AUTO_INCREMENT PRIMARY KEY,
  id_usuario INT NOT NULL,
  codigo_estudiante VARCHAR(20) NOT NULL UNIQUE,
  fecha_ingreso DATE NOT NULL,
  FOREIGN KEY (id_usuario) REFERENCES usuario(id_usuario) ON DELETE CASCADE ON UPDATE CASCADE
);

-- =====================================================
-- TABLA: PROGRAMA DE ESTUDIO
-- =====================================================
CREATE TABLE programa_estudio (
  id_programa INT AUTO_INCREMENT PRIMARY KEY,
  nombre VARCHAR(100) NOT NULL,
  descripcion TEXT
);

-- =====================================================
-- TABLA: CURSO
-- =====================================================
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

-- =====================================================
-- TABLA: HORARIO
-- =====================================================
CREATE TABLE horario (
  id_horario INT AUTO_INCREMENT PRIMARY KEY,
  id_curso INT NOT NULL,
  dia_semana VARCHAR(15),
  hora_inicio TIME,
  hora_fin TIME,
  aula VARCHAR(30),
  FOREIGN KEY (id_curso) REFERENCES curso(id_curso) ON DELETE CASCADE ON UPDATE CASCADE
);

-- =====================================================
-- TABLA: MATERIAL DE CLASE
-- =====================================================
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

-- =====================================================
-- TABLA: MATRÍCULA
-- =====================================================
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

-- =====================================================
-- TABLA: MATRÍCULA-CURSO
-- =====================================================
CREATE TABLE matricula_curso (
  id_matricula_curso INT AUTO_INCREMENT PRIMARY KEY,
  id_matricula INT NOT NULL,
  id_curso INT NOT NULL,
  FOREIGN KEY (id_matricula) REFERENCES matricula(id_matricula) ON DELETE CASCADE ON UPDATE CASCADE,
  FOREIGN KEY (id_curso) REFERENCES curso(id_curso) ON DELETE CASCADE ON UPDATE CASCADE
);

-- =====================================================
-- TABLA: NOTAS (Calificaciones por indicador)
-- =====================================================
CREATE TABLE notas (
    id_nota INT AUTO_INCREMENT PRIMARY KEY,
    id_estudiante INT NOT NULL,
    id_curso INT NOT NULL,
    nombre_nota VARCHAR(20) NOT NULL,
    valor_nota DECIMAL(4, 2) DEFAULT NULL,
    fecha_registro TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (id_estudiante) REFERENCES estudiante(id_estudiante) ON DELETE CASCADE,
    FOREIGN KEY (id_curso) REFERENCES curso(id_curso) ON DELETE CASCADE,
    UNIQUE KEY idx_unica_nota (id_estudiante, id_curso, nombre_nota)
);

-- =====================================================
-- DATOS DE EJEMPLO
-- =====================================================

INSERT INTO usuario (dni, primer_nombre, segundo_nombre, apellido_paterno, apellido_materno, usuario, correo, contrasena, rol)
VALUES
('12345678', 'Mark', 'E.', 'Stan', 'Vega', 'admin', 'admin@coreclass.edu', '123456', 'administrador'),
('87654321', 'Anthony', 'J.', 'Main', 'Rojas', 'anthony', 'docente@coreclass.edu', '123456', 'docente'),
('11223344', 'Monica', NULL, 'Lye', 'Santos', 'monica', 'estudiante@coreclass.edu', '123456', 'estudiante');

INSERT INTO administrador (id_usuario, cargo, permisos) VALUES (1, 'Administrador General', 'Gestión total');

INSERT INTO docente (id_usuario, especialidad, grado_academico) VALUES
(2, 'Desarrollo Web', 'Licenciado en Programación');

INSERT INTO estudiante (id_usuario, codigo_estudiante, fecha_ingreso) VALUES
(3, 'J26-24-002', '2025-03-01');

INSERT INTO programa_estudio (nombre) VALUES
('Enfermería'),
('APSTI'),
('Industrias Alimentarias'),
('Contabilidad'),
('Producción Agropecuaria');

INSERT INTO curso (id_programa, id_docente, nombre, creditos, semestre)
VALUES (2, 1, 'Diseño Web I', 4, 'I');

INSERT INTO matricula (id_estudiante, id_programa, semestre, estado)
VALUES (1, 2, 'I', 'Activo');

INSERT INTO matricula_curso (id_matricula, id_curso)
VALUES (1, 1);

-- DOCENTE_ASIGNACION
CREATE TABLE docente_asignacion (
  id_asignacion INT AUTO_INCREMENT PRIMARY KEY,
  id_docente INT NOT NULL,
  id_curso INT NOT NULL,
  id_programa INT NOT NULL,
  seccion VARCHAR(10),
  FOREIGN KEY (id_docente) REFERENCES docente(id_docente) ON DELETE CASCADE ON UPDATE CASCADE,
  FOREIGN KEY (id_curso) REFERENCES curso(id_curso) ON DELETE CASCADE ON UPDATE CASCADE,
  FOREIGN KEY (id_programa) REFERENCES programa_estudio(id_programa) ON DELETE CASCADE ON UPDATE CASCADE
);

-- BITACORA (registro de acciones)
CREATE TABLE bitacora (
  id_bitacora INT AUTO_INCREMENT PRIMARY KEY,
  id_usuario INT,
  accion TEXT NOT NULL,
  fecha DATETIME DEFAULT CURRENT_TIMESTAMP,
  FOREIGN KEY (id_usuario) REFERENCES usuario(id_usuario) ON DELETE SET NULL
);

-- SEMESTRE (control institucional)
CREATE TABLE semestre (
  id_semestre INT AUTO_INCREMENT PRIMARY KEY,
  nombre VARCHAR(10) NOT NULL,
  fecha_inicio DATE,
  fecha_fin DATE,
  estado ENUM('Activo', 'Finalizado', 'Pendiente') DEFAULT 'Activo'
);

-- =========================================
-- TABLA: asistencia (registro diario por curso)
-- =========================================
CREATE TABLE asistencia (
  id_asistencia INT AUTO_INCREMENT PRIMARY KEY,
  id_matricula_curso INT NOT NULL,
  fecha DATE NOT NULL DEFAULT (CURRENT_DATE),
  id_docente INT NOT NULL,
  observaciones TEXT,
  FOREIGN KEY (id_matricula_curso) REFERENCES matricula_curso(id_matricula_curso) ON DELETE CASCADE ON UPDATE CASCADE,
  FOREIGN KEY (id_docente) REFERENCES docente(id_docente) ON DELETE CASCADE ON UPDATE CASCADE
);

-- =========================================
-- TABLA: detalle_asistencia (estado por estudiante)
-- =========================================
CREATE TABLE detalle_asistencia (
  id_detalle INT AUTO_INCREMENT PRIMARY KEY,
  id_asistencia INT NOT NULL,
  id_estudiante INT NOT NULL,
  estado ENUM('-', 'P', 'F', 'T', 'J') DEFAULT '-',
  hora_marcada TIME DEFAULT CURRENT_TIME,
  observacion TEXT,
  FOREIGN KEY (id_asistencia) REFERENCES asistencia(id_asistencia) ON DELETE CASCADE ON UPDATE CASCADE,
  FOREIGN KEY (id_estudiante) REFERENCES estudiante(id_estudiante) ON DELETE CASCADE ON UPDATE CASCADE,
  UNIQUE KEY idx_unica_asistencia (id_asistencia, id_estudiante)
);

-- =====================================================
-- TABLA: TAREA
-- =====================================================
CREATE TABLE tarea (
  id_tarea INT AUTO_INCREMENT PRIMARY KEY,
  id_curso INT NOT NULL,
  id_docente INT NOT NULL,
  id_programa INT NOT NULL,
  semestre VARCHAR(10) NOT NULL,
  titulo VARCHAR(150) NOT NULL,
  instrucciones TEXT,
  archivo_apoyo VARCHAR(255),
  fecha_publicacion DATETIME DEFAULT CURRENT_TIMESTAMP,
  fecha_limite DATETIME,
  puntaje_maximo INT(11) DEFAULT 20 NOT NULL,
  FOREIGN KEY (id_curso) REFERENCES curso(id_curso) 
    ON DELETE CASCADE ON UPDATE CASCADE,
  FOREIGN KEY (id_docente) REFERENCES docente(id_docente) 
    ON DELETE CASCADE ON UPDATE CASCADE,
  FOREIGN KEY (id_programa) REFERENCES programa_estudio(id_programa) 
    ON DELETE CASCADE ON UPDATE CASCADE
);

-- =====================================================
-- TABLA: TAREA_ENTREGA
-- =====================================================
CREATE TABLE tarea_entrega (
  id_entrega INT AUTO_INCREMENT PRIMARY KEY,
  id_tarea INT NOT NULL,
  id_estudiante INT NOT NULL,
  id_programa INT NOT NULL,
  semestre VARCHAR(10) NOT NULL,
  archivo VARCHAR(255),
  comentario TEXT,
  fecha_entrega DATETIME DEFAULT CURRENT_TIMESTAMP,
  calificacion DECIMAL(5,2),
  observacion TEXT,
  FOREIGN KEY (id_tarea) REFERENCES tarea(id_tarea) 
    ON DELETE CASCADE ON UPDATE CASCADE,
  FOREIGN KEY (id_estudiante) REFERENCES estudiante(id_estudiante) 
    ON DELETE CASCADE ON UPDATE CASCADE,
  FOREIGN KEY (id_programa) REFERENCES programa_estudio(id_programa) 
    ON DELETE CASCADE ON UPDATE CASCADE
);
