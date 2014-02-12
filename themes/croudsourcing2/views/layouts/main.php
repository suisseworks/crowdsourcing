<!doctype html>
<html lang="en-us">
<head>
    <meta charset="utf-8">
    <!--<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">-->

    <title> CrowdSourcing X-Crowd </title>
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Use the correct meta names below for your web application
         Ref: http://davidbcalhoun.com/2010/viewport-metatag

    <meta name="HandheldFriendly" content="True">
    <meta name="MobileOptimized" content="320">-->

    <?php $this->beginContent('//layouts/headerscripts'); ?>
    <?php $this->endContent(); ?>


</head>

<body class="">

    <!------------>
    <!-- HEADER --->
    <!------------>
    <?php
    $this->beginContent('//layouts/header');
    $this->endContent();
    ?>

    <!------------>
    <!-- ASIDE --->
    <!------------>
    <?php
    $this->beginContent('//layouts/aside');
    $this->endContent();
    ?>


    <!-- MAIN PANEL -->
    <div id="main" role="main">

        <div id="ribbon">
            <span class="ribbon-button-alignment"> <span id="refresh" class="btn btn-ribbon" data-title="refresh"  rel="tooltip" data-placement="bottom" data-original-title="<i class='text-warning fa fa-warning'></i> Warning! This will reset all your widget settings." data-html="true"><i class="fa fa-refresh"></i></span> </span>

            <!-- breadcrumb -->
            <ol class="breadcrumb">
                <li>Home</li><li>Dashboard</li>
            </ol>
            <!-- end breadcrumb -->
        </div> <!-- end ribbon -->

        <div id="content">
            <?php echo $content; ?>
        </div>


    </div> <!-- #main! -->

    <!------------>
    <!--FOOTER --->
    <!------------>

    <?php
    $this->beginContent('//layouts/footerScripts');
    $this->endContent();
    ?>



</body>
</html>


