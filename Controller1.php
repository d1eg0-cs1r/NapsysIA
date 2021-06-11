
<?php
	
	require "./clases/User.php";
	require "./clases/Passw.php";
	
	// ***********************************************
	// Host URL.
	$host =  $_SERVER["HTTP_HOST"];
	// Ruta de arhcivos.
	$ruta = $_SERVER["REQUEST_URI"];	
	// Devuelve solo la ruta de carpetas sin el archivo final.
	$rutaSinArchivo = dirname( $ruta);	
	$rutaSinArchivo = ltrim( $rutaSinArchivo, '/' ); // Eliminar barras del principio.
	// ***********************************************
	session_start();

		$_SESSION['user']   = $_POST['user'] ;
		$_SESSION['passw']  = $_POST['passw'];
		$_SESSION['enviar'] = $_POST['enviar'];
	//	
	
	$fileUser = "./txt/User.txt";
	$fileUserOpen = fopen( $fileUser,"r" );
	$userContents = fread( $fileUserOpen,filesize( $fileUser ) );
	fclose($fileUserOpen);
	
	$filePassword = "./txt/Password.txt";
	$filePasswordOpen = fopen( $filePassword,"r" );
	$passwordContents = fread( $filePasswordOpen,filesize( $filePassword ) );
	fclose($filePasswordOpen);

	
	
	
	$password1 = new Password();	
	$password1->filePassword =$filePassword;
	$password1->fileOpenPassword = $filePasswordOpen;
	$password1->filePasswordContents =$passwordContents;
	
	echo $password1->ValuePassword();
	
	$user1 = new User();	
	$user1->fileUser =$fileUser;
	$user1->fileOpenUser = $fileUserOpen;
	$user1->fileUserContents =$userContents;
	
	echo $user1->ValueUser();


		
	if (isset($_SESSION['user']) ==	 $user1->ValueUser() && $_SESSION['passw'] == $password1->ValuePassword() ) {
		
			
		// form was re-submitted return false
				header("location: http://$host/$rutaSinArchivo/Index.html ");
			}else{
				header('location: http://'. $host . '/' . $rutaSinArchivo . '/ViewFailAcces.php');
			
	}	
	
?>