<?php
/* @var $this SiteController */
/* @var $model LoginForm */
/* @var $form CActiveForm  */

$this->pageTitle=Yii::app()->name . ' - Регистрация';
?>

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'signup-form',
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

  <h1 class="h3 mb-3 font-weight-normal">Регистрация</h1>

  <?php echo $form->labelEx($model,'email',array('class'=>'sr-only')); ?>
  <?php echo $form->emailField($model,'email',array('class'=>'form-control mb-4','placeholder'=>'Логин')); ?>
  <?php echo $form->error($model,'email'); ?>
  
  <?php echo $form->labelEx($model,'password',array('class'=>'sr-only')); ?>
  <?php echo $form->passwordField($model,'password',array('class'=>'form-control mb-4','placeholder'=>'Пароль')); ?>
  <?php echo $form->error($model,'password'); ?>
  
  <?php echo $form->labelEx($model,'confirmed_password',array('class'=>'sr-only')); ?>
  <?php echo $form->passwordField($model,'confirmed_password',array('class'=>'form-control mb-4','placeholder'=>'Пароль еще раз')); ?>
  <?php echo $form->error($model,'confirmed_password'); ?>
  
  <button class="btn btn-lg btn-primary btn-block" type="submit">Создать</button>
  
  <p class="mt-5 mb-3"><a href="<?=$this->createUrl('user/login');?>">Уже есть аккаунт</a></p>
  
  <p class="mt-5 mb-3 text-muted">&copy; 2017-2020</p>

<?php $this->endWidget(); ?>
