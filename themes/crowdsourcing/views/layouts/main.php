<!doctype html>
<html>
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, maximum-scale=1, initial-scale=1, user-scalable=0">
    <meta name="description" content="Los Círculos de NetworkingDays son la red más grande de referidos de hispanoamérica.">

    <link rel="shortcut icon" href="<?php echo Yii::app()->request->baseUrl; ?>/favicon.ico" type="image/x-icon" />

    <!-- Always force latest IE rendering engine or request Chrome Frame -->
    <meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible">

    <title><?php echo CHtml::encode($this->pageTitle); ?></title>

    <?php $this->beginContent('//layouts/headerscripts'); ?>
    <?php $this->endContent(); ?>




</head>

<body>
<?php
    $this->beginContent('//layouts/topnav');
    $this->endContent();
?>

<?php
   $this->beginContent('//layouts/left-sidebar');
   $this->endContent();
?>


<div id="ajaxloader" class="centerscreen"></div>


<div class="main-content">
    <div id="headerbienvenida" class="container hidden">
        <div class="row">
            <div class="area-top clearfix">
                <div class="pull-left header">
                    <h3 class="title"> <i class="icon-dashboard"></i> <?php echo $this->titulo; ?> </h3>

                    <?php if (isset(Yii::app()->user->nombre) and isset(Yii::app()->user->genero) )
                        {
                            $bienvenido = (Yii::app()->user->genero == "Femenino")  ? "Bienvenida " : "Bienvenido ";
                        echo "<h5> <span>". $bienvenido . Yii::app()->user->nombre . "! </span> </h5>";
                        }
                        else
                        {
                            echo "<h5> <span>Bienvenido</span> </h5>";
                        }
                    ?>
                </div>


                <ul class="list-inline pull-right sparkline-box">

                    <li class="sparkline-row">
                        <h4 class="blue"><span>Orders</span> 847</h4>
                        <div class="sparkline big" data-color="blue"><!--23,7,27,22,11,27,29,25,22,23,27,11--></div>
                    </li>

                    <li class="sparkline-row">
                        <h4 class="green"><span>Reviews</span> 223</h4>
                        <div class="sparkline big" data-color="green"><!--19,26,12,28,14,9,5,7,24,10,3,14--></div>
                    </li>

                    <li class="sparkline-row">
                        <h4 class="red"><span>New visits</span> 7930</h4>
                        <div class="sparkline big"><!--14,5,20,12,3,8,22,18,8,17,17,13--></div>
                    </li>

                </ul>


            </div>
        </div>
     </div> <!--container -->

    <div class="container padded">
        <div class="row">

            <?php if(isset($this->breadcrumbs)):?>
                <?php $this->widget('application.components.BreadCrumb', array(
                'links'=>$this->breadcrumbs,
            )); ?><!-- breadcrumbs -->
            <?php endif?>


        </div>  <!-- row -->
    </div> <!-- container -->

        <?php echo $content; ?>

</div>




</body>
</html>
