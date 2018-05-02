<!DOCTYPE html>
<html>
<head>
    <title>SELECT</title>
    <style type="text/css">

        body
        {
            background-image: url("https://i.imgur.com/G95fuYj.png");
            background-repeat: :no-repeat;
            background-size: 100% 210%;
        }

        h1
        {
            text-align: center;
            color:darkcyan;
            font-family: "Impact", Charcoal, sans-serif;
            padding-bottom: 2px;
        }

        td
        {
            background-color:#F4F4FF;
        }

        th
        {
            /*border-bottom: solid .75em #D5D5FF;*/

        }

        table, td, th
        {
            /*border: solid 1px #D5D5FF;*/
            color:darkcyan;
            border-collapse: collapse;
            font-family:"Lucida Sans Unicode", "Lucida Grande", sans-serif;
            font-size:15pt;
            text-align: center;
        }

        td,th
        {
            padding: 5px;
        }

        /*tr:nth-child(2n+1) td
        {
                background-color: #fff;
        }*/



    </style>
</head>
<body>
<?php
/**
 * Created by PhpStorm.
 * User: Eduardo
 * Date: 27/04/2018
 * Time: 08:39 AM
 */
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "sistemainv";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

echo <<< HTML
<br>
 <center>

 
<br>
	<table id="encabezado">
	<tr>
			<th>Movimientos por Periodo</th>
	</tr>
	</table>
	<table id="listado">
		<tr>
			<th>Clave</th>
			<th>Categoria</th>
			<th>Hora</th>
			<th>Fecha</th>
			<th>Tipo</th>
			<th>Usuario</th>
			<th>Proyecto</th>
			
		</tr>
HTML;

$date= $_GET['selectDate'];
$sql = "SELECT Clave_Mov, Categoria_Mov, Hora_Mov, Fecha_Mov, Tipo_Mov, ID_User, ID_Proyecto FROM movimiento 
        WHERE Fecha_Mov LIKE '%$date%' ";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
    // output data of each row

    while($row = mysqli_fetch_array($result)) {
        //echo "Codigo: " . $row["Codigo"]. " | Nombre : " . $row["Nombre"]. " |Direccion:  " . $row["Direccion_Sucursal"]."<br>";
        $clave = $row[0];
        $cat = $row[1];
        $hora = $row[2];
        $fecha = $row[3];
        $tipo = $row[4];
        $user = $row[5];
        $proy = $row[6];


        echo <<< HTML
	
		<tr>
			<td>$clave</td>
			<td>$cat</td>
			<td>$hora</td>
			<td>$fecha</td>
			<td>$tipo</td>
			<td>$user</td>
			<td>$proy</td>
			
		</tr>
HTML;
    }
} else {
    echo "0 results";
}

mysqli_close($conn);
?>


</body>


<form name = "goBack" action = "inicioReal.php">
    <input type="submit" value= "Inicio" name="btnBack">
</form>
