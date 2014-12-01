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
					  <tr><th>Tipo de Sangre</th><th>Cantidad</th><th>Fecha de Ingreso</th>
					  </tr>
					  <?php foreach ($results as $res){ ?>
						  <tr>	  
						  	<td>  <?php echo $res['tipo_sangre']; ?></td>
						    <td>  <?php echo $res['cantidad']; ?></td>
							<td>  <?php echo $res['created']; ?></td>

					  	  </tr>
					  <?php } ?>  
					</table>
				</body>

</html>
