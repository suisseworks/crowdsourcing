<?php
/**

 * Matthias Malek
 * Date: 1/01/14
 * Time: 10:01 AM
 */




class RecuperarClaveForm extends CFormModel
{
    public $email;


    public function rules()
    {
        return array(
            // username and password are required
            array('email', 'required'),
            array('email', 'email'),
            // rememberMe needs to be a boolean
        );
    }

    /**
     * Declares attribute labels.
     */
    public function attributeLabels()
    {
        return array(
            'email'=>'Correo Electrónico de tu cuenta registrada',
        );
    }


    public function existeCorreo($email)
    {
        return Afiliado::model()->exists(array('condition'=>"email = '$email'" ));

    }

    public static function generarClaveNueva()
    {
        $length = 10;
        $chars = array_merge(range(0,9), range('a','z'), range('A','Z'));
        shuffle($chars);
        $password = implode(array_slice($chars, 0, $length));
        return $password;
    }



}





?>