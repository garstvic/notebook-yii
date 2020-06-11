<?php
/* @var $this NoteController */
/* @var $model Note */

$this->pageTitle=Yii::app()->name . ' - Изменить запись '.$model->id;
?>

<h1>Изменить запись <?php echo $model->id; ?></h1>

<div class="container">
    <div class="row col-md-6 offset-md-3">
        <?php $this->renderPartial('_form', array('model'=>$model)); ?>
    </div>
</div>