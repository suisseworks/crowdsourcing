
<script>
    $(document).ready(function()
    {

      $('#btn-upload, #miavatar').click(function(e){
            e.preventDefault();
            $('#Afiliado_avatar').click();

      });

     $('#Afiliado_avatar').change(function()
     {
         //alert( $('#Afiliado_avatar').val());


         var input = document.getElementById("Afiliado_avatar");
         var fReader = new FileReader();
         fReader.readAsDataURL(input.files[0]);
         fReader.onloadend = function(event){
             var img = document.getElementById("miavatar");

             img.src = event.target.result;
         }
     })


    });


</script>

<?php

    //$miavatar = Yii::app()->myhelper->myAvatarURL();
    /*
    $miavatar = Yii::app()->request->baseUrl . "/uploads/avatars/";
    if ($model->avatar == null or $model->avatar == "")
        $miavatar .= "dummy.jpg";
    else
        $miavatar .= $model->avatar;
    */
?>


             <div class="row">
                 <div class="col-lg-12">
                     <ul class="padded separate-sections">

                         <li class="input">


                             <?php //echo $form->labelEx($model,'avatar'); ?>
                             <img id="miavatar" class="element-animation2 avatar-perfil" width="240px" height="240px"
                                  src="<?php echo Yii::app()->myhelper->myAvatarURL(); ?>">
                             <?php echo CHtml::activeFileField($model,'avatar',array('class'=>'hidden')); ?>
                             <?php echo $form->textField($model,'avatar', array('class'=>'hidden')); ?>
                             <button class="btn btn-blue" id="btn-upload">Seleccionar/Cambiar Foto</button>
                             <?php echo $form->error($model,'avatar'); ?>
                         </li>

                     </ul>
                 </div>
              </div>


