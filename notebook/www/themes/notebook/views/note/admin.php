<?php
/* @var $this NoteController */
/* @var $model Note */

$this->pageTitle='Справочник';

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#note-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>
<div class="container">
	<div class="form form-signin">
		<?php $form=$this->beginWidget('CActiveForm', array(
			'id'=>'note-form',
			// Please note: When you enable ajax validation, make sure the corresponding
			// controller action is handling ajax validation correctly.
			// There is a call to performAjaxValidation() commented in generated controller code.
			// See class documentation of CActiveForm for details on this.
			'enableAjaxValidation'=>false,
			'action'=>$this->createUrl('//notebook/create'),
			'htmlOptions'=>array(
				'class'=>"form-signin"	
		    ),
		)); ?>
	
		<?php echo $form->errorSummary($model,array('class'=>'alert alert-danger')); ?>
	
	    <div class="row mt-5">
			<div class="col-md-4">
				<div class="row">
					<div class="col-md-3"><?php echo $form->labelEx($model,'name'); ?></div>
					<div class="col-md-9"><?php echo $form->textField($model,'name',array('class'=>'form-control mb-4','size'=>56,'maxlength'=>256)); ?></div>					
				</div>
			</div>
			
	        <div class="col-md-3">
	        	<div class="row">
		        	<div class="col-md-5"><?php echo $form->labelEx($model,'phone');?></div>
		        	<div class="col-md-7"><?php echo $form->textField($model,'phone',array('class'=>'form-control mb-4','size'=>50,'maxlength'=>50)); ?></div>
	        	</div>
	        </div>

			<div class="col-md-3">
				<div class="row">
					<div class="col-md-4"><?php echo $form->labelEx($model,'email'); ?></div>
					<div class="col-md-8"><?php echo $form->textField($model,'email',array('class'=>'form-control mb-4','size'=>60,'maxlength'=>256)); ?></div>
				</div>
			</div>

			<div class="col-md-2">
				<div class="buttons">
					<?php echo CHtml::submitButton('Сохранить',array('class'=>'btn btn-lg btn-primary btn-block')); ?>
				</div>
			</div>
		</div>
		
	
	<?php $this->endWidget(); ?>
	
	</div>
	
    <div class="table-responsive">
		<?php $this->widget('zii.widgets.grid.CGridView', array(
			'id'=>'note-grid',
			'dataProvider'=>$model->search(),
		    'summaryText' => '',
			'itemsCssClass' => 'table table-striped table-sm',
		    'htmlOptions'=>array(
		    	'class'=>'',
		    ),
			'columns'=>array(
				array(
					'name'=>'name',
					'value'=>'$data->name',
					'headerHtmlOptions'=>array(
					),
				),

				'phone',
				'email',
				array(
					'class'=>'CButtonColumn',
					'template'=>'{update}{delete}',
		            'deleteButtonImageUrl'=>false,
		            'updateButtonImageUrl'=>false,
				    'buttons'=>array(
				        'update' => array(
				            'label'=>'Изменить',
				            'url'=>'Yii::app()->createUrl("/notebook/update",array("id"=>$data->id))',
				        ),
				        'delete' => array
				        (
				            'label'=>'Удалить',
				            'options'=>array(
				            	'class'=>'pl-2',
				            ),				            
				            'url'=>'Yii::app()->createUrl("/notebook/delete",array("id"=>$data->id))',
				        ),
				    ),					
				),
			),
		)); ?>
	</div>
</div>