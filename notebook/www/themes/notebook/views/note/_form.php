<?php
/* @var $this NoteController */
/* @var $model Note */
/* @var $form CActiveForm */
?>

<div class="form form-signin">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'note-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
	'htmlOptions'=>array(
		'class'=>"form-signin"	
    ),
)); ?>

	<?php 
	    foreach($model->getErrors() as $attribute=>$error_message){?>
	        <div class="alert alert-danger" role="alert">
                <?=array_shift($error_message);?>
            </div>
	<?php
	    }
    ?>
	
	<div class="row">
		<div class="col-md-3"><?php echo $form->labelEx($model,'name'); ?></div>
		<div class="col-md-9"><?php echo $form->textField($model,'name',array('class'=>'form-control mb-4','size'=>56,'maxlength'=>256)); ?></div>
	</div>
	
    <div class="row">
        <div class="col-md-3"><?php echo $form->labelEx($model,'phone');?></div>
        <div class="col-md-9"><?php echo $form->textField($model,'phone',array('class'=>'form-control mb-4','size'=>50,'maxlength'=>50)); ?></div>
	</div>

	<div class="row">
		<div class="col-md-3"><?php echo $form->labelEx($model,'email'); ?></div>
		<div class="col-md-9"><?php echo $form->textField($model,'email',array('class'=>'form-control mb-4','size'=>60,'maxlength'=>256)); ?></div>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Создать' : 'Сохранить',array('class'=>'btn btn-lg btn-primary btn-block')); ?>
	</div>
	

<?php $this->endWidget(); ?>

</div><!-- form -->