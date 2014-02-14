<?php
/**
 * Created by PhpStorm.
 * User: Francisco Quesada
 * Date: 12/01/14
 * Time: 05:24 PM
 */

//Uso
// MyGlobals::MENSAJE_TIPO_NOTIFICACION,

class MyGlobals {

    const MENSAJE_TIPO_NOTIFICACION = 1;
    const MENSAJE_TIPO_MENSAJE_AFILIADO = 2;
    const MENSAJE_TIPO_NOTICIA = 3;



    const MENSAJE_ESTADO_NOLEIDO = 1;
    const MENSAJE_ESTADO_LEIDO = 2;


    const EMAIL_LOGO_PATH = "http://www.websensemble.com/networkingdays/images/logoemail.png";


    //***ESTADOS DEL PROYECTO**//

    const ESTADO_PROYECTO_BORRADOR = 1;
    const ESTADO_PROYECTO_ENVIADO = 2;
    const ESTADO_PROYECTO_APROBADO = 3;
    const ESTADO_PROYECTO_RECHAZADO = 4;



}

?>