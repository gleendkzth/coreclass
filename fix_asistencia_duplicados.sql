-- =====================================================
-- SCRIPT PARA CORREGIR DUPLICADOS EN ASISTENCIA
-- =====================================================
-- Este script elimina registros duplicados y agrega la clave única faltante

USE coreclass_db;

-- Paso 1: Eliminar duplicados manteniendo solo el registro más reciente
-- primero creamos una tabla temporal con los ids a mantener
CREATE TEMPORARY TABLE temp_keep_ids AS
SELECT MIN(id_detalle) as id_detalle
FROM detalle_asistencia
GROUP BY id_asistencia, id_estudiante;

-- eliminamos los duplicados
DELETE FROM detalle_asistencia
WHERE id_detalle NOT IN (SELECT id_detalle FROM temp_keep_ids);

-- eliminamos la tabla temporal
DROP TEMPORARY TABLE temp_keep_ids;

-- Paso 2: Agregar la clave única para prevenir futuros duplicados
ALTER TABLE detalle_asistencia
ADD UNIQUE KEY idx_unica_asistencia (id_asistencia, id_estudiante);

-- Verificar que no hay duplicados
SELECT 
    id_asistencia, 
    id_estudiante, 
    COUNT(*) as cantidad
FROM detalle_asistencia
GROUP BY id_asistencia, id_estudiante
HAVING COUNT(*) > 1;

-- Si el resultado está vacío, la corrección fue exitosa
