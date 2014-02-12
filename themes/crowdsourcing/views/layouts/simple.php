<!doctype html>
<html>
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, maximum-scale=1, initial-scale=1, user-scalable=0">
    <link rel="shortcut icon" href="<?php echo Yii::app()->request->baseUrl; ?>/favicon.ico" type="image/x-icon" />
    <!-- Always force latest IE rendering engine or request Chrome Frame -->
    <meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible">

    <title><?php echo CHtml::encode($this->pageTitle); ?></title>

    <?php  $this->beginContent('//layouts/headerscripts_simple'); ?>
    <?php $this->endContent(); ?>


</head>

<body>

<?php
    $this->beginContent('//layouts/topnav_simple');
    $this->endContent();
?>


<div id="ajaxloader" class="centerscreen"></div>

    <section class="main-content">
        <div class="container">
           <?php echo $content; ?>
        </div>
    </section>


<footer class="hidden" style="background-color: #f8f8f8; position: absolute; margin: 0; padding: 0; width: 100%; height: 50px;">
    <div style="margin-left: 230px;">
        Copyright © 20014 NetworkingDays.com®
    </div>
</footer>



</body>
</html>
