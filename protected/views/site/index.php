<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name;


Yii::app()->clientScript->registerScript(
    'indexInit',
    '$("#linkingresar").addClass("active");
     $("body").addClass("fondo1");

    '
);

?>



<style>
    .tit {
        font-size: 2.5em;
        line-height: 1em;
    }
    .texto {
        font-size: 16px;
        color: #4d4d4d;
        text-align: justify;

    }

img { 
  max-width: 100%;
}


}

#logo {
        -webkit-transition: -webkit-transform 3s ease-in-out 0.5s;

    }


#logo:hover {
        -webkit-transform: perspective(500px) rotate3d(0,1,0,360deg);
    }

</style>


<script>
    $(function() {
        $( ".draggable" ).draggable();
    });

</script>




<div class="row">
      <div class="col-md-12">
      	<div class="col-md-6">
            <div class="ui-widget-content sombratransparente" style="margin-top: 20%;">
	      	    <img   id="logo" class=" element-animation  " src="<?php echo Yii::app()->theme->baseUrl; ?>/images/logo2.png"  />
            </div>
        </div>

          <br>

      </div>
    </div>

    <br><br>
    
    


    <br><br>








