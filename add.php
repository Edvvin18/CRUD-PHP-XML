<?php
	session_start();
	if(isset($_POST['add'])){
		//open xml file
		$pacientes = simplexml_load_file('files/pacientes.xml');
		$paciente = $pacientes->addChild('paciente');
		$paciente->addChild('id', $_POST['id']);
		$paciente->addChild('nome', $_POST['nome']);
		$paciente->addChild('sobrenome', $_POST['sobrenome']);
		$paciente->addChild('datan', $_POST['datan']);
		$paciente->addChild('email', $_POST['email']);
		$paciente->addChild('endereco', $_POST['endereco']);
		$paciente->addChild('contacto', $_POST['contacto']);

		// Save to file
		// file_put_contents('files/members.xml', $users->asXML());
		// Prettify / Format XML and save
		$dom = new DomDocument();
		$dom->preserveWhiteSpace = false;
		$dom->formatOutput = true;
		$dom->loadXML($pacientes->asXML());
		$dom->save('files/pacientes.xml');
		// Prettify / Format XML and save

		$_SESSION['message'] = 'Paciente adicionado com sucesso!';
		header('location: index.php');
	}
	else{
		$_SESSION['message'] = 'Fill up add form first';
		header('location: index.php');
	}

?>