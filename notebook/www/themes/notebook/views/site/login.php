<?php
/* @var $this SiteController */
/* @var $model LoginForm */
/* @var $form CActiveForm  */

$this->pageTitle=Yii::app()->name . ' - Вход';
?>

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'login-form',
	'enableClientValidation'=>true,
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
	),
	'errorMessageCssClass'=>'alert alert-danger',
	'htmlOptions'=>array(
		'class'=>"form-signin"	
    ),
	
)); ?>

  <h1 class="h2 mb-3 font-weight-normal"><?=Yii::app()->name;?></h1>

  <h1 class="h3 mb-3 font-weight-normal">Вход</h1>

  <?php echo $form->labelEx($model,'email',array('class'=>'sr-only')); ?>
  <?php echo $form->emailField($model,'email',array('class'=>'form-control mb-4','placeholder'=>'Логин')); ?>
  <?php echo $form->error($model,'email'); ?>
  
  <?php echo $form->labelEx($model,'password',array('class'=>'sr-only')); ?>
  <?php echo $form->passwordField($model,'password',array('class'=>'form-control mb-4','placeholder'=>'Пароль')); ?>
  <?php echo $form->error($model,'password'); ?>
  
  <button class="btn btn-lg btn-primary btn-block" type="submit">Войти</button>
  
  <p class="mt-5 mb-3"><a href="<?=$this->createUrl('user/register');?>">Создать аккаунт</a></p>
  
  <p class="mt-5 mb-3 text-muted">&copy; 2017-2020</p>

<?php $this->endWidget(); ?>
