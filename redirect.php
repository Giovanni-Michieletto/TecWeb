<?php
	session_start();

    $table = $_POST['table'];

    if(isset($_POST['Nuovo'])) {
    	$_SESSION['action'] = 'Nuovo';
    	header('Location: buildForm.php?table='.$table,TRUE);
    }
    else if(isset($_POST['Modifica'])) {
    	$_SESSION['action'] = 'Modifica';
    	header('Location: view.php?table='.$table,TRUE);
    }
    else if(isset($_POST['Elimina'])) {
    	$_SESSION['action'] = 'Elimina';
    	header('Location: view.php?table='.$table,TRUE);
    }

?>