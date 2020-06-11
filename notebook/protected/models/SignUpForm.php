<?php

class SignUpForm extends CFormModel
{
	const ERROR_PASSWORD_CONFIRMATION=3;
	const ERROR_USER_DUBPLICATION=4;
	
	public $email;
	public $password;
	public $confirmed_password;
	public $rememberMe;

	private $_identity;

	/**
	 * Declares the validation rules.
	 * The rules state that username and password are required,
	 * and password needs to be authenticated.
	 */
	public function rules()
	{
		return array(
			// username and password are required
			array('email, password,confirmed_password', 'required'),
			// rememberMe needs to be a boolean
			array('rememberMe', 'boolean'),
		);
	}

	/**
	 * Declares attribute labels.
	 */
	public function attributeLabels()
	{
		return array(
			'rememberMe'=>'Remember me next time',
		);
	}

	/**
	 * Authenticates the password.
	 * This is the 'authenticate' validator as declared in rules().
	 * @param string $attribute the name of the attribute to be validated.
	 * @param array $params additional parameters passed with rule when being executed.
	 */
	public function authenticate($attribute,$params)
	{
	    var_dump($attribute,$params);
	    
		if(!$this->hasErrors())
		{
			$this->_identity=new UserIdentity($this->email,$this->password);
			if(!$this->_identity->authenticate())
				$this->addError('confirmed_password','Неверное имя пользователя или пароль.');
		}
	}

	/**
	 * Logs in the user using the given username and password in the model.
	 * @return boolean whether login is successful
	 */
	public function login()
	{
		if($this->_identity===null)
		{
			$this->_identity=new UserIdentity($this->email,$this->password);
			$this->_identity->authenticate();
		}
		if($this->_identity->errorCode===UserIdentity::ERROR_NONE)
		{
			$duration=$this->rememberMe ? 3600*24*30 : 0; // 30 days
			Yii::app()->user->login($this->_identity,$duration);
			return true;
		}
		else
			return false;
	}
	
	public function register()
	{
        $email=strtolower($this->email);
        $user=User::model()->find('LOWER(email)=?',array($email));
        
        if($user!==null){
            $this->addError('email','Данный адрес уже используется!');
            return false;
        }
        
        if($this->password!==$this->confirmed_password){
            $this->addError('password','Пароли не совпадают!');
            $this->addError('confirmed_password','Пароли не совпадают!');
            return false;
        }
        
        $user=new User;
        $user->email=$this->email;
        $user->password=CPasswordHelper::hashPassword($this->password);
        $user->status='1';

        $user->save();

        return true;
	}
}
