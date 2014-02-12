
              <?php //echo $form->errorSummary($model); ?>



              <div class="row">

                  <div class="col-lg-6">


                      <ul class="padded separate-sections">

                          <li>
                              <?php echo $form->labelEx($model,'idpais'); ?>
                              <?php $paises = Pais::model()->findAll(array('select'=>'idpais, nombre', 'order'=>'nombre')); ?>
                              <?php $list = CHtml::listData($paises, 'idpais', 'nombre'); ?>
                              <?php

                              echo $form->dropDownList($model, 'idpais',  $list,
                                  array(

                                      'ajax'=>array(
                                          'type'=>'POST',
                                          'url'=>CController::createUrl('afiliado/selectprovincias'),
                                          'update'=>'#'. CHtml::activeId($model,'idprovincia'),
                                          'beforeSend' => 'function(){
                                                 $("#ajaxloader").show();
                                                }',
                                          'complete' => 'function(){
                                                $("#ajaxloader").hide();
                                                 $("#yt1").click();
                                                }',

                                      ),

                                      'empty' => 'Selecione un país'));
                              ?>
                          </li>



                          <li>
                              <?php echo $form->labelEx($model,'idprovincia');
                              $idpais = intval($model->idpais);
                              $provincias = Provincia::model()->findAll(array('condition'=>"idpais = $idpais", 'order'=>'nombre'));
                              $list = CHtml::listData($provincias, 'idprovincia', 'nombre');

                              echo $form->dropDownList($model, 'idprovincia',  $list,
                                  array('empty' => 'Seleccione una provincia'));

                              ?>
                          </li>


                      </ul>


                  </div>

                  <div class="col-lg-6">

                      <ul class="padded separate-sections">


                          <li class="input">
                              <?php echo $form->labelEx($model,'ciudad'); ?>
                              <?php echo $form->textField($model,'ciudad'); ?>
                              <?php echo $form->error($model,'ciudad'); ?>
                          </li>




                          <li class="input">
                              <?php echo $form->labelEx($model,'domicilio'); ?>
                              <?php echo $form->textArea($model,'domicilio'); ?>
                              <?php echo $form->error($model,'domicilio'); ?>
                          </li>




                      </ul>

                  </div>


              </div>


              <div class="form-actions">
                  <?php //echo CHtml::submitButton('Salvar Cambios',array('class' => 'btn btn-blue')); ?>

                  <button type="submit" class="btn btn-blue">Salvar Cambios</button>
                  <button type="button" class="btn btn-default">Cancelar</button>
              </div>









