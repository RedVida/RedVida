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
					  <tr><th>Nombre</th><th>Direccion</th><th>Contacto</th><th>Director</th><th>Especialidad</th><th>Gubernamental</th>	
					  </tr>
					  <?php foreach ($results as $res){ ?>
						  <tr>	  
						  	<td>  <?php echo $res['nombre']; ?></td>
					    	<td>  <?php echo $res['direccion']; ?></td>
					    	<td>  <?php echo $res['contacto']; ?></td>
					    	<td>  <?php echo $res['director']; ?></td>
					    	<td>  <?php echo $res['especialidad']; ?></td>
					    	<td>  <?php echo $res['gubernamental']; ?></td>
					  	  </tr>
					  <?php } ?>  
					</table>
				</body>

</html>
