<?php
if(Yii::app()->user->checkAccess('tester')){ 
$this->menu=array(
  array('label'=>'Registrar Paciente', 'url'=>array('create')),
  array('label'=>'Lista Paciente', 'url'=>array('index')),
  array('label'=>'Administrar Paciente', 'url'=>array('admin')),
);
}
?>


<link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/themes/semantic/packaged/css/tabla.css">

<body>
<br/>
<div class="ui black ribbon label">
<h1 class="ui huge header add icon"> &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp;
Urgencias Nacionales - Medula(s) </h1>
</div>
<hr class="style-two ">

<?php 

              $medulas = Yii::app()->db->createCommand()
            ->select('p.id, p.nombre, p.apellido, org.nombreMedula, nu.grado_urgencia ,nu.fecha')
            ->from('paciente p, necesidad_medula nu, medula org ')
            ->where('p.id=nu.id_paciente AND nu.id_medula=org.idMedula ORDER BY nu.grado_urgencia="Alto" 
              DESC, nu.grado_urgencia="Medio" DESC,nu.grado_urgencia="Bajo" DESC, nu.fecha ASC')
            ->queryAll();



                
 ?>

<div>
  <div class="ui grid">
  <div class="one wide column"></div>
    <div class="twelve wide column">
<table class="ui sortable table segment ">
  <thead>
    <tr>
    <th>N°</th>
    <th>Nombre</th>
    <th>Apellido</th>
    <th>Necesidad</th>
    <th>G.Urgencia</th>
    <th>Fecha Solicitud</th>
    <th>Detalle</th>
  </tr></thead>


<?php $i=1; foreach ($medulas as $pa) { ?>


  <tbody>
    <tr>
      <td><?php echo $i++; ?></td> 
      <td><?php echo $pa['nombre'] ?></td>
      <td><?php echo $pa['apellido'] ?></td>
      <td><?php echo $pa['nombreMedula'] ?></td>
      <td><?php echo $pa['grado_urgencia'] ?></td>
      <td><?php echo $pa['fecha'] ?></td>
      <td><?php echo CHtml::link(CHtml::encode("Ver"), array('view', 'id'=>$pa['id'])); ?></td>
    </tr>
  </tbody>

<?php }?>

</table>
</div>
</div>
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