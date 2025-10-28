-- =====================================================
-- SCRIPT PARA AUTO-COMPLETAR MATRICULA_CURSO
-- =====================================================
-- Este script crea automáticamente los registros en matricula_curso
-- para estudiantes que están matriculados en un programa/semestre
-- donde existe un curso, pero no tienen el registro específico del curso

USE coreclass_db;

-- Insertar en matricula_curso todos los estudiantes que están
-- matriculados en un programa/semestre donde hay cursos,
-- pero que aún no tienen registro en matricula_curso para esos cursos

INSERT INTO matricula_curso (id_matricula, id_curso)
SELECT DISTINCT m.id_matricula, c.id_curso
FROM matricula m
JOIN curso c ON m.id_programa = c.id_programa AND m.semestre = c.semestre
WHERE NOT EXISTS (
    SELECT 1 
    FROM matricula_curso mc 
    WHERE mc.id_matricula = m.id_matricula 
    AND mc.id_curso = c.id_curso
)
AND m.estado = 'Activo';

-- Verificar el resultado
SELECT 
    mc.id_matricula_curso,
    CONCAT(u.primer_nombre, ' ', u.apellido_paterno) as estudiante,
    c.nombre as curso,
    pe.nombre as programa,
    c.semestre
FROM matricula_curso mc
JOIN matricula m ON mc.id_matricula = m.id_matricula
JOIN estudiante e ON m.id_estudiante = e.id_estudiante
JOIN usuario u ON e.id_usuario = u.id_usuario
JOIN curso c ON mc.id_curso = c.id_curso
JOIN programa_estudio pe ON c.id_programa = pe.id_programa
ORDER BY estudiante, curso;
