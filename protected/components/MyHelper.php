<?php

class MyHelper extends CApplicationComponent
{

    //Se usa =>  Yii::app()->myhelper->toConsole("hola");

    public function saySomething($something)
    {
        echo $something;
    }


    //Se usa =>  Yii::app()->myhelper->enviarEmail(...);
    public function enviarEmail($para, $asunto, $msg)
    {
        // Solo el Sistema manda correos a sus afiliados...
        $de = array(Yii::app()->params['networkingDaysEmail'] => 'CrowdSourcing');
        $message = new YiiMailMessage;
        $message->setFrom($de);
        $message->subject = $asunto;
        $message->setTo($para);
        $message->setBody($msg,'text/html');
        Yii::app()->mail->send($message);
    }


    //Mensaje enviado por NetworkingDays
    public function enviarMensajeSistema($idafiliado, $asunto, $msg, $tipo, $msgEmail)
    {
        $afiliado = Afiliado::model()->find(array('condition'=>"idnw_afiliado = $idafiliado"));
        if ($afiliado)
        {
            $message = new Mensaje;
            $message->de = -1;  // NetworkingDays
            $message->para = $afiliado->idnw_afiliado;
            $message->asunto = $asunto;
            $message->mensaje = $msg;
            $message->tipo = $tipo;
            $message->estado = MyGlobals::MENSAJE_ESTADO_NOLEIDO;
            $message->fecha = new CDbExpression('NOW()');
            $message->insert();

            // Revisamos las preferncias del Afiliado sobre recibir notificaciones por correo electrónico
            $preferencias = Preferencias::model()->find(array('condition'=>"idafiliado = $idafiliado"));
            // Si no existe entrada de preferencias...enviamos correo : TODO: modificar
            if (!$preferencias)
                $this->enviarEmail($afiliado->email,$asunto,$msgEmail);
            else
                if ($preferencias->notificaciones_por_correo == 1)
                    $this->enviarEmail($afiliado->email,$asunto,$msgEmail);
        }
    }








    //Yii::app()->myhelper->toConsole()
    public function toConsole( $data ) {
        if ( is_array( $data ) )
            $output = "<script>console.log( 'CrowdSourcing Console: " . implode( ',', $data) . "' );</script>";
        else
            $output = "<script>console.log( 'CrowdSourcing Console: " . $data . "' );</script>";
        echo $output;
    }


    // Yii::app()->myhelper->myAvatarURL()
    public function myAvatarURL($model = null)
    {
        $path = Yii::app()->request->baseUrl . "/uploads/avatars/";
        if ($model == null)
        {
            if (isset(Yii::app()->user->avatar) and Yii::app()->user->avatar != "")
                $path .= Yii::app()->user->avatar;
            else
                $path .= "dummy.jpg";
        }
        else
        {
            if ($model['avatar'] == null or $model['avatar'] == "")
                $path .= "dummy.jpg";
            else
                $path .= $model['avatar'];
        }
        return $path;

    }


    // Yii::app()->myhelper->proyectLogoURL()
    public function proyectLogoURL($proyecto)
    {
        $path = Yii::app()->request->baseUrl . "/uploads/logos/";
        if ($proyecto == null)
        {
                $path .= "dummy.jpg";
        }
        else
        {
            if ($proyecto['logo'] == null or $proyecto['logo'] == "")
                $path .= "dummy.jpg";
            else
                $path .= $proyecto['logo'];
        }
        return $path;

    }




    //Yii::app()->myhelper->mensajesNoLeidos()
    public function mensajesNoLeidos($id = null)
    {
        if ($id == null)
            $id = Yii::app()->user->id;

        $noleido = MyGlobals::MENSAJE_ESTADO_NOLEIDO;
        return Mensaje::model()->count(array('condition'=>"para = $id and estado = $noleido "));

    }




    public function nombreMes($date)
    {
        $mes = date("m",strtotime($date));
        switch($mes) {
            case 1: return "Enero"; break;
            case 2: return "Febrero"; break;
            case 3: return "Marzo"; break;
            case 4: return "Abril"; break;
            case 5: return "Mayo"; break;
            case 6: return "Junio"; break;
            case 7: return "Julio"; break;
            case 8: return "Agosto"; break;
            case 9: return "Septiembre"; break;
            case 10: return "Octubre"; break;
            case 11: return "Noviembre"; break;
            case 12: return "Diciembre"; break;
        }
    }




    public function esAdministrador()
    {
        if (Yii::app()->user->name == 'admin')
            return true;
        return false;
    }










}




?>