<?php
$this->menu=array(
  array('label'=>'Registrar Paciente', 'url'=>array('create')),
  array('label'=>'Lista Paciente', 'url'=>array('index')),
  array('label'=>'Administrar Paciente', 'url'=>array('admin')),
);
?>


<link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/themes/semantic/packaged/css/tabla.css">

<body>
<br/>
<div class="ui black ribbon label">
<h1 class="ui huge header add icon"> &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp;
Urgencias Nacionales </h1>
</div>
<hr class="style-two ">

<div>
<table class="ui sortable table segment">
  <thead>
    <tr><th>Nombre</th>
    <th>Apellido</th>
    <th>Urgencia</th>
    <th>Necesidad</th>
  </tr></thead>

<?php

foreach($dataProvider->getData() as $datos) {

?>

  <tbody>
    <tr>
      <td><?php echo $datos->nombre; ?></td>
      <td><?php echo $datos->apellido; ?></td>
      <td><?php echo $datos->grado_urgencia; ?></td>
      <td><?php echo $organo[$datos->necesidad_transplante-1]->nombreOrgano; ?></td>
    </tr>
  </tbody>

<?php }?>

</table>
<hr class="style-two ">

</div>

<script type="text/javascript">

  $(function() {

    var table = $('<table></table>');
    table.append('<thead><tr><th class="number">Number</th></tr></thead>');
    var tbody = $('<tbody></tbody>');
    for(var i = 0; i<100; i++) {
      tbody.append('<tr><td>' + Math.floor(Math.random() * 100) + '</td></tr>');
    }
    table.append(tbody);
    $('.example.ex-2').append(table);

    $('table').tablesort().data('tablesort');

    $('thead th.number').data('sortBy', function(th, td, sorter) {
      return parseInt(td.text(), 10);
    });

  });
</script>

</body>