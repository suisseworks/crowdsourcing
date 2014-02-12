<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8" />
<title>Bienvenido</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
</head>
<body style="margin: 0; padding: 0;">
	<table border="0" cellpadding="0" cellspacing="0" width="100%">	
		<tr>
			<td style="padding: 10px 0 30px 0;">
				<table align="center" border="0" cellpadding="0" cellspacing="0" width="600" style="border: 1px solid #cccccc; border-collapse: collapse;">
					<tr>
						<td align="center" bgcolor="#70bbd9" style="padding: 40px 0 30px 0; color: #153643; font-size: 28px; font-weight: bold; font-family: Arial, sans-serif;">
							<img src="http://www.websensemble.com/networkingdays/images/logoemail.png" alt="CroudSourcing" width="567" height="230" style="display: block;" />
						</td>
					</tr>
					<tr>
						<td bgcolor="#ffffff" style="padding: 40px 30px 40px 30px;">
							<table border="0" cellpadding="0" cellspacing="0" width="100%">
								<tr>
									<td style="color: #153643; font-family: Arial, sans-serif; font-size: 24px;">
										<b>Bienvenido a bordo!</b>									</td>
								</tr>
								<tr>
									<td style="padding: 20px 0 30px 0; color: #153643; font-family: Arial, sans-serif; font-size: 16px; line-height: 20px;">
                                        <p>Estimad@ <?php echo $nombre ?>,</p>
								    <p>Este correo es para darte la más <em><strong>Cordial Bienvenida a los Círculos de Networking Days</strong></em> y para comunicarte que has quedado registrado en la Categoría
                                        <strong>
                                            <?php
                                                if ($idcategoria != -1)
                                                    echo $categoria;
                                                else
                                                    echo $nuevacategoria . "*";

                                            ?>
                                        </strong> y Especialidad
                                        <strong><?php
                                                if ($idespecialidad != -1)
                                                    echo $especialidad;
                                                else
                                                    echo $nuevaespecialidad . "**";
                                            ?>


                                        </strong>.</p>
                                    </td>
								</tr>
								<tr>
									<td>
										<table border="0" cellpadding="0" cellspacing="0" width="100%">
											<tr>
												<td width="260" valign="top">
													<table border="0" cellpadding="0" cellspacing="0" width="100%">
														<tr>
															<td>
																<img src="<?php echo MyGlobals::EMAIL_LOGO_PATH; ?>" alt="NetworkingDays" width="100%" height="140" style="display: block;" />
															</td>
														</tr>
														<tr>
															<td style="padding: 25px 0 0 0; color: #153643; font-family: Arial, sans-serif; font-size: 16px; line-height: 20px;">

                                                               <?php if ($idcirculo != -1 )
                                                                   echo
																		"<p>Además, te comentamos que a partir de este momento perteneces al Círculo <strong> $circulo </strong> <br/> <br/> Te proponemos participar activamente y a hacer crecer tu Círculo invitando a tus contactos para que sumes a profesionales, mecánicos, pequeños comerciantes y todos aquellos que creas que pueden ser referidos en los Círculos de Networking Days.</p>";
																   else
																	echo "<p>Además, te comentamos que estaremos analizando la creación del Círculo  <strong> $nuevocirculo </strong> y te avisaremos en cuanto tengamos una resolución al respecto.</p>";
                                                              ?>
                                                            </td>
														</tr>
													</table>
												</td>
												<td style="font-size: 0; line-height: 0;" width="20">&nbsp;
													
												</td>
												<td width="260" valign="top">
													<table border="0" cellpadding="0" cellspacing="0" width="100%">
														<tr>
															<td>
																<img src="http://websensemble.com/networkingdays/images/ingresa.jpg" alt="" width="100%" height="140" style="display: block;" />
															</td>
														</tr>
														<tr>
															<td style="padding: 25px 0 0 0; color: #153643; font-family: Arial, sans-serif; font-size: 16px; line-height: 20px;"><p>Ingresa y comienza a aprovechar todas las oportunidades que esta poderosa herramienta te puede brindar.
															  <p><a href="http://websensemble.com/networkingdays">Ingresa haciendo click aquí</a></p>
													        <p>Bienvenido de nuevo y mucho éxito! </p>
													        <p>&nbsp;</p>
													        <p><strong>La Gente de Networking Days</strong></p>													        </p></td>
														</tr>
													</table>
												</td>
											</tr>
                                            <tr>
                                           <td colspan="3" style="padding: 25px 0 0 0; color: #153643; font-family: Arial, sans-serif; font-size: 14px; line-height: 20px;">
                                               <p>
                                                   <?php   if ($idcategoria == -1)
                                                            echo "*Nueva Categoría sugerida : deberá ser aprobada antes" . "<br>";
                                                           if ($idespecialidad == -1)
                                                             echo "**Nueva Especialidad sugerida : deberá ser aprobada antes."
                                                   ?>

                                               </p></td>
                                            </tr>
										</table>
									</td>
								</tr>
							</table>
						</td>
					</tr>
					<tr>
						<td bgcolor="#181f25" style="padding: 30px 30px 30px 30px;">
							<table border="0" cellpadding="0" cellspacing="0" width="100%">
								<tr>
									<td style="color: #ffffff; font-family: Arial, sans-serif; font-size: 14px;" width="75%">
										&reg; NetworkingDays, Copyright (c) 2014<br/></td>
									<td align="right" width="25%">
										<table border="0" cellpadding="0" cellspacing="0">
											<tr>
												<td style="font-family: Arial, sans-serif; font-size: 12px; font-weight: bold;">
													<a href="http://www.twitter.com/" style="color: #ffffff;">
														<img src="http://websensemble.com/networkingdays/images/tw.gif" alt="Twitter" width="38" height="38" style="display: block;" border="0" />
													</a>
												</td>
												<td style="font-size: 0; line-height: 0;" width="20">&nbsp;</td>
												<td style="font-family: Arial, sans-serif; font-size: 12px; font-weight: bold;">
													<a href="http://www.facebook.com/NetworkingDays" style="color: #ffffff;">
														<img src="http://websensemble.com/networkingdays/images/fb.gif" alt="Facebook" width="38" height="38" style="display: block;" border="0" />
													</a>
												</td>
											</tr>
										</table>
									</td>
								</tr>
							</table>
						</td>
					</tr>
				</table>
			</td>
		</tr>
	</table>
</body>
</html>