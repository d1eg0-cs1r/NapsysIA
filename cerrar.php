<?php

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
	
	//vaciamos los datos de la seession
	session_unset( );
		
	session_destroy();			// Destruimos los datos guardados de la sesion 
		
	header("location: http://$host/$rutaSinArchivo/Index.html");	// Nos redirigimos a la pagina principal
?>