<?php
require_once("../../php/conexion.php");

$tabla="";
$query="SELECT atraccion.id_atraccion, tipo_atraccion.nom_tip_atraccion, atraccion.nom_atraccion, ubicacion.nom_ubi FROM atraccion, tipo_atraccion, ubicacion WHERE atraccion.id_tip_atraccion = tipo_atraccion.id_tip_atraccion and atraccion.id_ubi = ubicacion.id_ubi and atraccion.id_estado != 3 ";

if(isset($_POST['maquina']))
{
	$q=$conexion->real_escape_string($_POST['maquina']);
	$query="SELECT atraccion.id_atraccion, tipo_atraccion.nom_tip_atraccion, atraccion.nom_atraccion, ubicacion.nom_ubi FROM atraccion, tipo_atraccion, ubicacion WHERE atraccion.id_tip_atraccion = tipo_atraccion.id_tip_atraccion and atraccion.id_ubi = ubicacion.id_ubi and atraccion.id_estado != 3  and  tipo_atraccion.nom_tip_atraccion LIKE '%".$q."%'";
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
            <th>Ubicación</th>
            <th>Seleccionar</th>
        </tr>
    </thead>';

	while($filaAtraccion= $buscarAtraccion->fetch_array())
	{
		$tabla.=
		' <tbody>
            <tr>
                <td>'.$filaAtraccion[1].'</td>
                <td>'.$filaAtraccion[2].'</td>
                <td>'.$filaAtraccion[3].'</td>
                <td><input type="checkbox" name="atraccion[]" value='.$filaAtraccion[0].'></td>
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
