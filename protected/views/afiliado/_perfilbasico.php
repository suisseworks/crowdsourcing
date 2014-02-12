


             <div class="row">


                 <div class="col-lg-4">
                     <ul class="padded separate-sections">
                         <li class="input">
                             <?php echo $form->labelEx($model,'nombre'); ?>
                             <?php echo $form->textField($model,'nombre'); ?>
                             <?php echo $form->error($model,'nombre'); ?>
                             <div class="underline" align="right">
                             <a href="<?php echo Yii::app()->request->baseUrl; ?>/site/login">Modificar Clave</a>
                             </div>
                         </li>
                     </ul>
                 </div>
                 <div class="col-lg-4">
                    <ul class="padded separate-sections">
                         <li class="input">
                             <?php echo $form->labelEx($model,'apellido'); ?>
                             <?php echo $form->textField($model,'apellido'); ?>
                             <?php echo $form->error($model,'apellido'); ?>
                         </li>
                     </ul>

                 </div>
                 <div class="col-lg-4">
                     <ul class="padded separate-sections">
                         <li class="input">
                             <?php echo $form->labelEx($model,'genero'); ?>
                             <?php
                                 echo $form->dropDownList($model, 'genero',array('Masculino'=>'Masculino','Femenino'=>'Femenino'),
                                     array('prompt' => 'Seleccionar género'));


                             ?>

                             <?php echo $form->error($model,'genero'); ?>
                         </li>
                    </ul>
                 </div>



             </div>



              <div class="row">

                  <div class="col-lg-6">

                      <ul class="padded separate-sections">
                          <li class="input">
                              <?php echo $form->labelEx($model,'usuario'); ?>
                              <?php echo $form->textField($model,'usuario'); ?>
                              <?php echo $form->error($model,'usuario'); ?>
                          </li>
                          <li class="input">
                              <?php echo $form->labelEx($model,'email'); ?>
                              <?php echo $form->textField($model,'email'); ?>
                              <?php echo $form->error($model,'email'); ?>
                          </li>


                       <!--   <li class="input">
                              Avatar
                              <input type="file" name="img">
                          </li>
-->
                      </ul>


                  </div>

                  <div class="col-lg-6">
                      <ul class="padded separate-sections">

                          <li class="input">
                              <i class="icon-facebook"></i>
                              <?php echo $form->labelEx($model,'link_facebook'); ?>
                              <?php echo $form->textField($model,'link_facebook');  ?>
                              <?php echo $form->error($model,'link_facebook'); ?>
                          </li>
                          <li class="input">
                              <i class="icon-linkedin"></i>
                              <?php echo $form->labelEx($model,'link_linkedin'); ?>
                              <?php echo $form->textField($model,'link_linkedin'); ?>
                              <?php echo $form->error($model,'link_linkedin'); ?>
                          </li>


                      </ul>


                  </div>





              </div>


