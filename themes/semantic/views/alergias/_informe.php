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
					  <tr><th>N°</th><th>Nombre</th><th>Fecha Ingreso</th><th>Descripcion</th>	
					  </tr>
					  <?php $i=0; foreach ($results as $res){ ?>
						  <tr>
						  	<td>  <?php $i++ ; echo $i; ?></td>	 	  
						  	<td>  <?php echo $res['nombre']; ?></td>
					    	<td>  <?php echo $res['fecha_ingreso']; ?></td>
					    	<td>  <?php echo $res['descripcion']; ?></td>
					  	  </tr>
					  <?php } ?>  
					</table>
				</body>

</html>
