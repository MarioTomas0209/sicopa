<?php 
    $id_paciente = $ruta[1];
    PatientController::removePatient($id_paciente);
    echo "<script>window.location = '" . SERVER_URL . "pacientes'</script>";