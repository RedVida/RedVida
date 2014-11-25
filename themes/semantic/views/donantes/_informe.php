<html>
				<head>
					<style>
						table { width:70%;}
						table, th, td {border: 1px solid black;border-collapse: collapse;}
						th,td {padding: 5px;text-align: left;}
						table#t01 tr:nth-child(even) {background-color: #eee;}
						table#t01 tr:nth-child(odd) {background-color:#fff;}
						table#t01 th{background-color: #65686b;color: white;}
					</style>
				</head>
				<body>
					<h1><u> Informe Donante: </u></h1>
					<br>
					<table id="t01">
					  <tr><th>Nombre</th><th>Apellido</th><th>Rut</th><th>T.Sangre</th><th>N° de contacto</th		
					    ><th>Centro Medico</th><th>Fecha Ingreso</th><th>Alergia(s)</th><th>Enfermedades</th>		
					  </tr>
					  <?php foreach ($results as $res){ ?>
						  <?php $centro_medico=CentroMedico::model()->find('id='.$res['id_centro_medico']);?> 
						  <tr>	  
						  	<td>  <?php echo $res['nombres']; ?></td>
						    <td>  <?php echo $res['apellidos']; ?></td>
						    <td>  <?php echo $res['rut']; ?></td>
						    <td>  <?php echo $res['tipo_sangre']; ?></td>
						    <td>  <?php echo $res['num_contacto']; ?></td>
					    	<td>  <?php echo $centro_medico['nombre']; ?></td>
					    	<td>  <?php echo $res['fecha_ingreso']; ?></td>
					    	<td><?php 
						    $Criteria = new CDbCriteria();
						    $Criteria->condition = "id_donante =".$res['id']; 
						    $alergia= TieneAlergia::model()->findAll($Criteria);
						    if($alergia){ 
						    	foreach ($alergia as $valor){ 
						    	  $aler=Alergias::model()->find('id='.$valor->id_alergia);
						    	  echo $aler->nombre;	
						        }
						    }
						    else{ echo 'No presenta';} ?>
		                   </td>
					    	<td><?php 
						    $Criteria = new CDbCriteria();
						    $Criteria->condition = "id_donante =".$res['id']; 
						    $enfermedad= TieneEnfermedad::model()->findAll($Criteria);
						    if($enfermedad){ 
						    	foreach ($enfermedad as $valor){ 
						    	  $enfer=Enfermedades::model()->find('id='.$valor->id_enfermedad);
						    	  echo $enfer->nombre;	
						        }
						    }
						    else{ echo 'No presenta';} ?>
		                   </td>
					  	  </tr>
					  <?php } ?>  
					</table>
				</body>

</html>
