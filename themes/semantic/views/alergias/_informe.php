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
					<br>
					<table id="t01">
					  <tr><th>Nombre</th><th>Fecha Ingreso</th>	
					  </tr>
					  <?php foreach ($results as $res){ ?>
						  <tr>	  
						  	<td>  <?php echo $res['nombre']; ?></td>
					    	<td>  <?php echo $res['fecha_ingreso']; ?></td>
					  	  </tr>
					  <?php } ?>  
					</table>
				</body>

</html>
