<?php
require_once("../../php/conexion.php");

$tabla="";
$horasM = 60;
$query="SELECT atraccion.id_atraccion, tipo_atraccion.nom_tip_atraccion, atraccion.nom_atraccion, horas_trabajo.total_h FROM atraccion,tipo_atraccion, horas_trabajo WHERE horas_trabajo.id_atraccion = atraccion.id_atraccion and horas_trabajo.total_h < $horasM ";

if(isset($_POST['maquinaH']))
{
	$q=$conexion->real_escape_string($_POST['maquinaH']);
	$query="SELECT atraccion.id_atraccion, tipo_atraccion.nom_tip_atraccion, atraccion.nom_atraccion, horas_trabajo.total_h FROM atraccion,tipo_atraccion, horas_trabajo WHERE horas_trabajo.id_atraccion = atraccion.id_atraccion and horas_trabajo.total_h < $horasM and tipo_atraccion.nom_tip_atraccion LIKE '%".$q."%'";
}

$buscarAtraccion=$conexion->query($query);
if ($buscarAtraccion->num_rows > 0)
{
	$tabla.= 
	'<div class="listaMaquina"><br>
    <table>
    <thead>
        <tr>
            <th>Tipo de atracción</th>
            <th>Nombre</th>
            <th>Horas Acumuladas</th>
            <th>Horas restantes para el mantenimiento</th>
        </tr>
    </thead>';

	while($filaAtraccion= $buscarAtraccion->fetch_array())
	{
        $horaBD = $filaAtraccion[3]; // Horas de trabajo acumuladas en bd
        $intervalo =  $horasM -$horaBD ;
		$tabla.=
		' <tbody>
            <tr>
                <td>'.$filaAtraccion[1].'</td>
                <td>'.$filaAtraccion[2].'</td>
                <td>'.$filaAtraccion[3].'</td>
                <td>'.$intervalo.' Horas</td>
            </tr>
        </tbody>
		';
	}

	$tabla.='</table></div>';
} else
	{
		$tabla="No se encontraron coincidencias con sus criterios de búsqueda.";
	}


echo $tabla;

?>
