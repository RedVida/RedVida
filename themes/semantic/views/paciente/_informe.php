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
					  <tr><th>N°</th><th>Nombre</th><th>Apellido</th><th>Rut</th><th>T.Sangre</th><th>Centro Medico</th>
					  	<th>Fecha Ingreso</th><th>Edad</th><th>Afiliacion</th><th>Grado Urgencia</th>
					    <th>Necesidad Trasplante</th><th>Alergia(s)</th><th>Enfermedades</th>		    		
					  </tr><?php $i=0;?>
					  <?php foreach ($results as $res){ ?>
						  <?php $centro_medico=CentroMedico::model()->find('id='.$res['id_centro_medico']);?> 
						  <tr>
						    <td>  <?php $i++ ; echo $i; ?></td>	  
						  	<td>  <?php echo $res['nombre']; ?></td>
						    <td>  <?php echo $res['apellido']; ?></td>
						    <td>  <?php echo $res['rut']; ?></td>
						    <td>  <?php echo $res['tipo_sangre']; ?></td>
					    	<td>  <?php echo $centro_medico['nombre']; ?></td>
					    	<td>  <?php echo $res['fecha_ingreso']; ?></td>
					    	<td>  <?php echo $res['edad']; ?></td>
					    	<td>  <?php echo $res['afiliacion']; ?></td>
					    	<td>  <?php echo $res['necesidad_transplante']; ?></td>
					    	<td>  <?php echo $res['grado_urgencia']; ?></td>
					    	<td><?php 
						    $length = (string)($res['nombre']);
						    $modelo = Paciente::model()->findAll(array('select'=>'id,nombre','condition'=>'nombre='."'$length'"));
						    $Criteria = new CDbCriteria();	
						    $Criteria->condition = "id_paciente =".$modelo[0]->id; 
						    $alergia= AlergiaPaciente::model()->findAll($Criteria);
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
						    $Criteria->condition = "id_paciente =".$modelo[0]->id; 
						    $enfermedad= EnfermedadPaciente::model()->findAll($Criteria);
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
