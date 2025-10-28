-- ================================================================
-- CORRECCIÓN: Regla de negocio - Un estudiante = Un programa + Un semestre
-- ================================================================
-- Base de datos: coreclass_db
-- Fecha: 2025-10-28
-- ================================================================

USE coreclass_db;

-- ================================================================
-- PASO 1: Verificar el estado actual
-- ================================================================

-- ver si hay estudiantes con múltiples matrículas activas
SELECT 
    e.codigo_estudiante,
    CONCAT(u.primer_nombre, ' ', u.apellido_paterno) as nombre,
    COUNT(*) as total_matriculas_activas
FROM matricula m
JOIN estudiante e ON m.id_estudiante = e.id_estudiante
JOIN usuario u ON e.id_usuario = u.id_usuario
WHERE m.estado = 'Activo'
GROUP BY m.id_estudiante, e.codigo_estudiante, nombre
HAVING COUNT(*) > 1;

-- ver registros inconsistentes en matricula_curso
-- (estudiantes en cursos de otros semestres)
SELECT 
    mc.id_matricula_curso,
    e.codigo_estudiante,
    c.nombre as curso,
    c.semestre as semestre_curso,
    m.semestre as semestre_matricula,
    'INCONSISTENTE' as estado
FROM matricula_curso mc
JOIN matricula m ON mc.id_matricula = m.id_matricula
JOIN estudiante e ON m.id_estudiante = e.id_estudiante
JOIN curso c ON mc.id_curso = c.id_curso
WHERE m.semestre != c.semestre
   OR m.id_programa != c.id_programa;

-- ================================================================
-- PASO 2: Limpiar datos inconsistentes
-- ================================================================

-- eliminar registros en matricula_curso donde el semestre no coincide
DELETE mc FROM matricula_curso mc
JOIN matricula m ON mc.id_matricula = m.id_matricula
JOIN curso c ON mc.id_curso = c.id_curso
WHERE m.semestre != c.semestre
   OR m.id_programa != c.id_programa;

-- ================================================================
-- PASO 3: Crear trigger para prevenir múltiples matrículas activas
-- ================================================================

-- eliminar triggers si existen
DROP TRIGGER IF EXISTS before_insert_matricula_unica;
DROP TRIGGER IF EXISTS before_update_matricula_unica;

DELIMITER $$

-- trigger al insertar una nueva matrícula
CREATE TRIGGER before_insert_matricula_unica
BEFORE INSERT ON matricula
FOR EACH ROW
BEGIN
    -- si se intenta insertar una matrícula activa
    IF NEW.estado = 'Activo' THEN
        -- desactivar todas las matrículas activas del estudiante
        UPDATE matricula 
        SET estado = 'Retirado'
        WHERE id_estudiante = NEW.id_estudiante 
          AND estado = 'Activo';
    END IF;
END$$

-- trigger al actualizar una matrícula existente
CREATE TRIGGER before_update_matricula_unica
BEFORE UPDATE ON matricula
FOR EACH ROW
BEGIN
    -- si se actualiza a estado activo
    IF NEW.estado = 'Activo' AND OLD.estado != 'Activo' THEN
        -- desactivar todas las otras matrículas activas del estudiante
        UPDATE matricula 
        SET estado = 'Retirado'
        WHERE id_estudiante = NEW.id_estudiante 
          AND id_matricula != NEW.id_matricula
          AND estado = 'Activo';
    END IF;
END$$

DELIMITER ;

-- ================================================================
-- PASO 4: Verificar que los triggers fueron creados
-- ================================================================

SHOW TRIGGERS WHERE `Table` = 'matricula';

-- ================================================================
-- NOTAS IMPORTANTES:
-- ================================================================
-- 1. Los triggers garantizan que solo haya UNA matrícula activa por estudiante
-- 2. Al crear/activar una nueva matrícula, las anteriores se marcan como 'Retirado'
-- 3. Esto mantiene el historial pero previene duplicados activos
-- 4. La corrección en Estudiante.php complementa esta validación
-- ================================================================
