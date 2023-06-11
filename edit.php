<?php
	session_start();
	if(isset($_POST['edit'])){
		$pacientes = simplexml_load_file('files/pacientes.xml');
		foreach($pacientes->paciente as $paciente){
			if($paciente->id == $_POST['id']){
				$paciente->nome = $_POST['nome'];
				$paciente->sobrenome = $_POST['sobrenome'];
				$paciente->datan = $_POST['datan'];
				$paciente->email = $_POST['email'];
				$paciente->endereco = $_POST['endereco'];
				$paciente->contacto = $_POST['contacto'];
				break;
			}
		}
		file_put_contents('files/pacientes.xml', $pacientes->asXML());
		$_SESSION['message'] = 'Paciente Atualizado com sucesso!';
		header('location: index.php');
	}
	else{
		$_SESSION['message'] = 'Seleccione um paciente para Editar!';
		header('location: index.php');
	}

?>