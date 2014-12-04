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

<?php 
                $paciente= Paciente::model()->findAll();
                $array_pacientes = array();
                foreach ($paciente as $pa) {
                    $necesidad_organo=NecesidadOrgano::model()->findAll('id_paciente='.$pa->id);
                    $necesidad_medula=NecesidadMedula::model()->findAll('id_paciente='.$pa->id);
                    $bol=false;
                    foreach ($necesidad_organo as $ne) {
                      if($ne->grado_urgencia == 'Urgencia Nacional')
                        $bol=true;
                    }
                    foreach ($necesidad_medula as $ne) {
                      if($ne->grado_urgencia == 'Urgencia Nacional')
                        $bol=true;
                    }
                    
                     if($bol)$array_pacientes[]=$pa->id;
                  }
                
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
    <th>Detalle</th>
  </tr></thead>
<?php $i=1; foreach($array_pacientes as $datos) { 
 $paciente= Paciente::model()->find('id='.$datos);
 $nece_paciente = Paciente::model()->findAll('id='.$datos);
 foreach ( $nece_paciente as $pa) {
                    $necesidad_organo=NecesidadOrgano::model()->findAll('id_paciente='.$pa->id);
                    $necesidad_medula=NecesidadMedula::model()->findAll('id_paciente='.$pa->id);
                    $bol=false;
                    $array_necesidad= array();
                    foreach ($necesidad_organo as $ne) {
                      if($ne->grado_urgencia == 'Urgencia Nacional'){
                        $bol=true;
                        $organo=Organo::model()->find('idOrgano='.$ne->id_organo);
                        $array_necesidad[]=$organo->nombreOrgano;
                      }
                    }
                    foreach ($necesidad_medula as $ne) {
                      if($ne->grado_urgencia == 'Urgencia Nacional'){
                        $bol=true;
                         $array_necesidad[]='Medula Osea';
                      }
                    }
}                    

?>
  <tbody>
    <tr>
      <td><?php echo $i++; ?></td> 
      <td><?php echo $paciente->nombre; ?></td>
      <td><?php echo $paciente->apellido; ?></td>
      <td><?php echo implode(' - ',$array_necesidad); ?></td>
      <td><?php echo CHtml::link(CHtml::encode("Ver"), array('view', 'id'=>$paciente->id)); ?></td>
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