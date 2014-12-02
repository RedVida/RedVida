<html>
				<head>
					<style>
						table { width:70%;}
						table, th, td {border: 1px solid black;border-collapse: collapse;}
						th,td {padding: 5px;text-align: left;}
						table#t01 tr:nth-child(even) {background-color: #eee;}
						table#t01 tr:nth-child(odd) {background-color:#fff;}
						table#t01 th{background-color: #2654b3;color: white;}
					</style>
				</head>
				<body>
					<br>
					<table id="t01">
					  <tr><th>N°</th><th>Trasplante de</th><th>Tipo</th><th>Centro Medico</th><th>Donante</th>
					  	<th>Rut D.</th><th>Paciente</th><th>Rut P.</th><th>Fecha De Ingreso</th>	    		
					  </tr> <?php $i=0;?>
					  <?php foreach ($results as $res){ ?>
						  <?php $centro_medico=CentroMedico::model()->find('id='.$res['id_centro_medico']);?> 
						  <?php $tipo_trasplante=TipoTrasplante::model()->find('id='.$res['id_tipo_trasplante']);?>
					      <?php 
							$donador=DonacionOrgano::model()->find('id='.$res['id_tipo_trasplante']);
							$donante=Donantes::model()->find('rut='."'$donador->rut_donante'");
							 ?>
							<?php $paciente=Paciente::model()->find('id='.$res['id_paciente']); ?>
						  <tr>

						  	<td>  <?php $i++; echo $i; ?></td>
						  	<td>  <?php echo $res['nombre']; ?></td>	  
						  	<td>  <?php echo $tipo_trasplante->nombre; ?></td>
						    <td>  <?php echo $centro_medico->nombre ?></td>
						    <td>  <?php echo $donante->nombres.' '.$donante->apellidos; ?></td>
						    <td>  <?php echo $donante->rut; ?></td>
						    <td>  <?php echo $paciente->nombre.' '.$paciente->apellido; ?></td>
						    <td>  <?php echo $paciente->rut; ?></td>
					    	<td>  <?php echo $res['created']; ?></td>
					  	  </tr>
					  	  <?php } ?>
					</table>
				</body>

</html>
