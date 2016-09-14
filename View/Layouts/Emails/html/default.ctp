<!DOCTYPE html public "-//w3c//dtd xhtml 1.0 transitional //en" "http://www.w3.org/tr/xhtml1/dtd/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xmlns:v="urn:schemas-microsoft-com:vml" xmlns:o="urn:schemas-microsoft-com:office:office">
	<head>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<style type="text/css">
		body, .maintable { height:100% !important; width:100% !important; margin:0; padding:0; }
		img, a img { border:0; outline:none; text-decoration:none; }
		.imagefix { display:block; }
		table, td { border-collapse:collapse; mso-table-lspace:0pt; mso-table-rspace:0pt;}
		p {margin:0; padding:0; margin-bottom:0;}
		.readmsgbody{width:100%;} .externalclass{width:100%;}
		.externalclass, .externalclass p, .externalclass span, .externalclass font, .externalclass td, .externalclass div{line-height:100%;}
		img{-ms-interpolation-mode: bicubic;}
		body, table, td, p, a, li, blockquote{-ms-text-size-adjust:100%; -webkit-text-size-adjust:100%;}
		</style>
		<style>
		table{ border-collapse: collapse; }
		@media only screen and (max-width: 600px) {
			body[yahoo] .rimg {
			max-width: 100%;
			height: auto;
			}
			body[yahoo] .rtable{
			 width: 100% !important;
			 table-layout: fixed;
			}
		}
		</style>
		<!--[if gte mso 9]>
		<xml>
			<o:officedocumentsettings>
				<o:allowpng/>
				<o:pixelsperinch>96</o:pixelsperinch>
			</o:officedocumentsettings>
		</xml>
		<![endif]-->
	</head>
	<body yahoo=fix scroll="auto" style="padding:0; margin:0; font-size: 12px; font-family: arial, helvetica, sans-serif; cursor:auto; background:#f3f3f3">
		<table class="rtable maintable" cellspacing=0 cellpadding=0 width="100%" bgcolor=#f3f3f3>
			<tr>
				<td style="font-size: 0px; height: 20px; line-height: 0">&#160;</td>
			</tr>
			<tr>
				<td valign=top>
					<table class=rtable style="width: 600px; margin: 0px auto" cellspacing=0 cellpadding=0 width=600 align=center border=0>
						<tr>
							<td style="border-top: medium none; border-right: medium none; border-bottom: medium none; padding-bottom: 1px; padding-top: 1px; padding-left: 0px; border-left: medium none; padding-right: 0px; background-color: transparent">
								<table class=rtable style="width: 100%" cellspacing=0 cellpadding=0 align=left>
									<tr style="height: 10px">
										<td style="border-top: medium none; border-right: medium none; width: 100%; vertical-align: top; border-bottom: medium none; padding-bottom: 1px; text-align: center; padding-top: 1px; padding-left: 15px; border-left: medium none; padding-right: 15px; background-color: transparent">
											<p style="margin-bottom: 1em; font-size: 10px; font-family: arial, helvetica, sans-serif; color: #7c7c7c; margin-top: 0px; line-height: 125%; background-color: transparent; mso-line-height-rule: exactly" align=center>
												Para asegurar una correcta visualizaci&#243;n de este mensaje, agrega leads@reach-latam.com a tu lista de contactos.
											</p>
										</td>
									</tr>
								</table>
							</td>
						</tr>
						<tr>
							<td style="border-top: medium none; border-right: medium none; border-bottom: medium none; padding-bottom: 0px; padding-top: 0px; padding-left: 0px; border-left: medium none; padding-right: 0px; background-color: transparent">
								<table class=rtable style="width: 100%" cellspacing=0 cellpadding=0 align=left>
									<tr style="height: 10px">
										<td style="border-top: medium none; border-right: medium none; width: 100%; vertical-align: top; border-bottom: medium none; padding-bottom: 35px; text-align: center; padding-top: 35px; padding-left: 15px; border-left: medium none; padding-right: 15px; background-color: transparent">
											<table cellspacing=0 cellpadding=0 align=center border=0>
												<tr>
													<td style="padding-bottom: 2px; padding-top: 2px; padding-left: 2px; padding-right: 2px" align=center>
														<table cellspacing=0 cellpadding=0 border=0>
															<tr>
																<td style="border-top: medium none; border-right: medium none; border-bottom: medium none; border-left: medium none; background-color: transparent">
																	<img class=rimg style="border-top: medium none; border-right: medium none; border-bottom: medium none; border-left: medium none; display: block; background-color: transparent" border=0 src="<?= $this->Html->url('/img/Email/logo_reach.png', true); ?>" width=172 height=80 hspace="0" vspace="0">
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
						<?= $this->fetch('content'); ?>
						<tr>
							<td style="border-top: medium none; border-right: medium none; border-bottom: medium none; padding-bottom: 1px; padding-top: 1px; padding-left: 0px; border-left: medium none; padding-right: 0px; background-color: transparent">
								<table class=rtable style="width: 100%" cellspacing=0 cellpadding=0 align=left>
									<tr style="height: 10px">
										<td style="border-top: medium none; border-right: medium none; width: 100%; vertical-align: top; border-bottom: medium none; padding-bottom: 1px; text-align: center; padding-top: 1px; padding-left: 15px; border-left: medium none; padding-right: 15px; background-color: transparent">
											<p style="margin-bottom: 1em; font-size: 10px; font-family: arial, helvetica, sans-serif; color: #7c7c7c; margin-top: 0px; line-height: 125%; background-color: transparent; mso-line-height-rule: exactly" align=left>
												<? if ( ! empty($lead['Formulario']['cliente_descripcion']) ) : ?>
												Te hemos enviado este correo porque eres contacto de <?= h($lead['Formulario']['cliente_descripcion']); ?><br>
												<? endif; ?>
												Si no deseas recibir este tipo de informaci&#243;n, por favor toma contacto con tu ejectivo de cuentas.
											</p>
											<p style="margin-bottom: 1em; font-size: 10px; font-family: arial, helvetica, sans-serif; color: #7c7c7c; margin-top: 0px; line-height: 125%; background-color: transparent; mso-line-height-rule: exactly" align=left>
												&#169;2016 Reach Latam&#160;- Todos los derechos reservados.
											</p>
										</td>
									</tr>
								</table>
							</td>
						</tr>
					</table>
				</td>
			</tr>
			<tr>
				<td style="font-size: 0px; height: 8px; line-height: 0">&#160;</td>
			</tr>
		</table>
	</body>
</html>
