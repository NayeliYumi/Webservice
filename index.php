<?php

include 'conexion.php';
$pdo= new conexion;
if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    if (isset($_GET['cedula'])) {
        $sql = $pdo->prepare(
            "SELECT 
                e.cedula, e.nombre, e.apellido,
                a.cod_asignatura, a.nombre_asignatura,
                n.nota1, n.nota2, n.nota3, n.examen_final, n.examen_remedial
            FROM estudiantes e
            JOIN notas n ON e.cedula = n.cedula
            JOIN asignaturas a ON n.cod_asignatura = a.cod_asignatura
            WHERE e.cedula = :cedula"
        );
        $sql->bindValue(':cedula', $_GET['cedula']);
        $sql->execute();
        $sql->setFetchMode(PDO::FETCH_ASSOC);
        header("HTTP/1.1 200 OK");
        echo json_encode($sql->fetchAll());
        exit;
    } else {
        $sql = $pdo->prepare(
            "SELECT 
                e.cedula, e.nombre, e.apellido,
                a.cod_asignatura, a.nombre_asignatura,
                n.nota1, n.nota2, n.nota3, n.examen_final, n.examen_remedial
            FROM estudiantes e
            JOIN notas n ON e.cedula = n.cedula
            JOIN asignaturas a ON n.cod_asignatura = a.cod_asignatura"
        );
        $sql->execute();
        $sql->setFetchMode(PDO::FETCH_ASSOC);
        header("HTTP/1.1 200 OK");
        echo json_encode($sql->fetchAll());
        exit;
    }
}

?>