<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v4.0.1">
    <title><?=CHtml::encode($this->pageTitle);?></title>

    <!-- Bootstrap core CSS -->
    <link href="<?=Yii::app()->theme->getBaseUrl();?>/css/bootstrap.min.css" rel="stylesheet">


    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>
  </head>
  <body>
    <div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom shadow-sm">
      <nav class="my-2 my-md-0 mr-md-3">
        <a class="p-2 text-dark" href="<?=$this->createUrl('site/index');?>">Справочник</a>
        <a class="p-2 text-dark" href="<?=$this->createUrl('notebook/create');?>">+ Добавить новый</a>
        <a class="p-2 text-dark" href="<?=$this->createUrl('site/logout');?>">Выход</a>
      </nav>
    </div>
    
    <div class="text-center">
        <?php echo $content;?>
    </div>

</body>
</html>
