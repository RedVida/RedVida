<h1>Urgencias Nacionales</h1>

<div>
<table class="ui table segment">
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
      <td><?php echo $organo[$datos->necesidad_transplante]->nombreOrgano; ?></td>
    </tr>
  </tbody>

<?php }?>

</table>

</div>