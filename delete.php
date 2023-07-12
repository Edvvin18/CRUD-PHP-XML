<?php
	session_start();
	$id = $_GET['id'];
	$pacientes = simplexml_load_file('files/pacientes.xml');
	$index = 0;
	$i = 0;
	foreach($pacientes->paciente as $paciente){
		if($paciente->id == $id){
			$index = $i;
			break;
		}
		$i++;
	}
	unset($pacientes->paciente[$index]);
	file_put_contents('files/pacientes.xml', $pacientes->asXML());
	$_SESSION['message'] = 'Paciente removido com sucesso!';
	header('location: index.php');

?>