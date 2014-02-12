
              <?php //echo $form->errorSummary($model); ?>

               <div class="row">


                   <div class="col-lg-6">


                       <ul class="padded separate-sections">

                           <li>
                               <i class="icon-suitcase"></i>
                               <?php
                               echo $form->labelEx($model,'idcategoria');
                               $categorias = Categoria::model()->findAll(array('select'=>'idnw_categoria, nombre', 'order'=>'nombre'));
                               $list = CHtml::listData($categorias, 'idnw_categoria', 'nombre');
                               echo $form->dropDownList($model, 'idcategoria',  $list,
                                   array(

                                       'ajax'=>array(
                                           'type'=>'POST',
                                           'url'=>CController::createUrl('afiliado/selectespecialidades'),
                                           'update'=>'#'. CHtml::activeId($model,'idespecialidad'),
                                           'beforeSend' => 'function(){
                                                 $("#ajaxloader").show();
                                                }',
                                           'complete' => 'function(){
                                                $("#ajaxloader").hide();
                                                }',

                                       ),

                                       'prompt' => 'Selecione una categoría'));
                               ?>
                           </li>
                        </ul>



                   </div>
                   <div class="col-lg-6">

                       <ul class="padded separate-sections">


                           <li>
                               <?php echo $form->labelEx($model,'idespecialidad');
                               $idcategoria = intval($model->idcategoria);
                               $especialidades = Especialidad::model()->findAll(array('condition'=>"idcategoria = $idcategoria",'order'=>'nombre'));
                               $list = CHtml::listData($especialidades,'idnw_especialidad','nombre');

                               echo $form->dropDownList($model, 'idespecialidad',  $list,
                                   array('prompt' => 'Seleccione una especialidad'));
                               ?>
                           </li>




                       </ul>

                   </div>

               </div>


              <div class="row">
                  <div class="col-lg-12">
                      <ul class="padded separate-sections">
                          <li class="input">
                              <i class="icon-book"></i>
                              <?php echo $form->labelEx($model,'biografia'); ?>
                              <?php echo $form->textArea($model,'biografia',array('rows' => 4)); ?>

                              <?php echo $form->error($model,'biografia'); ?>
                          </li>
                      </ul>
                  </div>
              </div>









