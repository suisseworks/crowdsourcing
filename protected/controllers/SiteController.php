<?php

class SiteController extends Controller
{
	/**
	 * Declares class-based actions.
	 */


	public function actions()
	{
		return array(
			// captcha action renders the CAPTCHA image displayed on the contact page
			'captcha'=>array(
				'class'=>'CCaptchaAction',
				'backColor'=>0xFFFFFF,
			),
			// page action renders "static" pages stored under 'protected/views/site/pages'
			// They can be accessed via: index.php?r=site/page&view=FileName
			'page'=>array(
				'class'=>'CViewAction',
			),
		);
	}

	/**
	 * This is the default 'index' action that is invoked
	 * when an action is not explicitly requested by users.
	 */
	public function actionIndex()
	{
		// renders the view file 'protected/views/site/index.php'
		// using the default layout 'protected/views/layouts/main.php'

        if (!Yii::app()->user->isGuest)
        {
            $this->redirect(Yii::app()->request->baseUrl . "/dash");
        }
        else
        {
            $this->layout = "simple";
            $this->render("index");
        }

	}




	/**
	 * This is the action to handle external exceptions.
	 */
	public function actionError()
	{
		if($error=Yii::app()->errorHandler->error)
		{
			if(Yii::app()->request->isAjaxRequest)
				echo $error['message'];
			else
				$this->render('error', $error);
		}
	}

	/**
	 * Displays the contact page
	 */
	public function actionContact()
	{
        $this->layout = "simple";
        $model=new ContactForm;

		if(isset($_POST['ContactForm']))
		{
			$model->attributes=$_POST['ContactForm'];
			if($model->validate())
			{
				$name='=?UTF-8?B?'.base64_encode($model->name).'?=';
				$subject='=?UTF-8?B?'.base64_encode($model->subject).'?=';
				$headers="From: $name <{$model->email}>\r\n".
					"Reply-To: {$model->email}\r\n".
					"MIME-Version: 1.0\r\n".
					"Content-Type: text/plain; charset=UTF-8";

				mail(Yii::app()->params['adminEmail'],$subject,$model->body,$headers);
				Yii::app()->user->setFlash('contact','Thank you for contacting us. We will respond to you as soon as possible.');
				$this->refresh();
			}
		}
		$this->render('contact',array('model'=>$model));
	}

	/**
	 * Displays the login page
	 */
	public function actionLogin()
	{
        $this->layout = "simple";
        $model=new LoginForm;

        if (!Yii::app()->user->isGuest) {
            $this->redirect(Yii::app()->request->baseUrl . "/dash");
        }

		// if it is ajax validation request
		/*if(isset($_POST['ajax']) && $_POST['ajax']==='login-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}*/

		// collect user input data
		if(isset($_POST['LoginForm']))
		{
            Yii::app()->clientScript->registerScript('removeEffect','$("#login").removeClass(" element-animation");');
            $model->attributes=$_POST['LoginForm'];
			// validate user input and redirect to the previous page if valid
			if($model->validate() && $model->login())
            {
				// Salvamos Estadísticas de logeo en la base de datos
                $login = new Login;
                $login->idafiliado = Yii::app()->user->id;
                $login->fecha = new CDbExpression('NOW()');
                $login->insert();

                $this->redirect(Yii::app()->user->returnUrl);
            }
		}
		// display the login form
		$this->render('login',array('model'=>$model));
	}


    public function actionRecuperarClave()
    {
        $this->layout = "simple";

        $model = new RecuperarClaveForm;

        if(isset($_POST['RecuperarClaveForm']))
        {
            $model->attributes=$_POST['RecuperarClaveForm'];
            Yii::app()->clientScript->registerScript('removeEffect','$("#recuperarclave").removeClass(" element-animation");');
            if ($model->validate())
            {
                if ($model->existeCorreo($model['email']))
                {
                    Yii::app()->user->setFlash('clave_enviada','La información para recuperar tu clave a sido enviada a tu correo electrónico!' .
                    "<br> <br>
                    <h4><a href='". Yii::app()->request->baseUrl . "/site/login'>Ingresa Aquí</a></h4>"
                    );

                    $this->enviarCorreoConNuevaClave($model['email']);

                }
                else
                {
                    Yii::app()->user->setFlash('noexiste','Correo electrónico no está registrado en nuestra base de datos!');
                }
            }
        }

        $this->render('recuperarclave', array('model'=>$model));
    }


    private function enviarCorreoConNuevaClave($email)
    {
        $nuevaClave =RecuperarClaveForm::generarClaveNueva();

        $afiliado = Afiliado::model()->find(array('condition'=>"email = '$email'" ));
        $afiliado->clave = md5($nuevaClave);
        $afiliado->save();

        // Enviar Mensaje
        Yii::app()->myhelper->enviarMensajeSistema($afiliado->idnw_afiliado,
            "NetworkingDays - Recuperar Contaseña",
            "Solicitaste el envió de una contraseña nueva a tu correo electrónico",
            MyGlobals::MENSAJE_TIPO_NOTIFICACION,
            $this->renderPartial('/afiliado/mails/_recuperar-password',
                                array('nombre'=>$afiliado->nombre,'nuevaClave'=>$nuevaClave),true));

    }


	/**
	 * Logs out the current user and redirect to homepage.
	 */
	public function actionLogout()
	{
		Yii::app()->user->logout();
        Yii::app()->user->clearStates();
        $_SESSION = array();
		$this->redirect(Yii::app()->homeUrl);
	}











}