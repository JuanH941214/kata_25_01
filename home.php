<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Task</title>
</head>
<title>Create Task</title>

<body>

    <?php include('files/activities.php');?>

    <h1>Estudiantes</h1>
    <h2 class="loadStudent">Hei! Quina activitat vols assignar?(Introdueix la opció numèrica)</h2>

    <form method="post" action="index.php">
        <label for="taskType">Seleccione una opcion</label>
        <select id="taskType" name="taskType">
            <option value="<?php echo $activities[0] ?>">Master class</option>
            <option value="<?php echo $activities[1] ?>">Weekly shortcut</option>
        </select>
        <button type="submit" class="btn mt-3 btn-primary">enviar</button>


    </form>
    <div>
        <?php

        // var_dump($activities[0]);

        if (isset($_GET['selectedActivity'])) {
            $activityStudent = $_GET['selectedActivity'];
            
            echo "actividad: ". $activityStudent;
        } elseif (isset($error)) {
            echo $error;
            //var_dump($selectedStudent);
        }
        ?>
    </div>
    <div>
        <?php
        include('files/activities.php');
        // var_dump($activities[0]);

        if (isset($_GET['selectedStudent'])) {
            $encodedStudent = $_GET['selectedStudent'];
            $serializedStudent = urldecode($encodedStudent);
            $selectedStudent = unserialize($serializedStudent);
            echo "sera llevada acabo por el estudiante: " . $selectedStudent['nombre'] . " " . $selectedStudent['apellido'];
        } elseif (isset($error)) {
            echo $error;
            var_dump($selectedStudent);
        }
        ?>
    </div>
</body>

</html>