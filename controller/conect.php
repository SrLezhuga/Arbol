<?php

$contraseña = "M4n4g3r!89";
$usuario = "sa";
$nombreBaseDeDatos = "Capital_Humano";
# Puede ser 127.0.0.1 o el nombre de tu equipo; o la IP de un servidor remoto
$rutaServidor = "192.168.0.41";
try {
     $base_de_datos = new PDO("sqlsrv:server=$rutaServidor;database=$nombreBaseDeDatos", $usuario, $contraseña);
     $base_de_datos->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (Exception $e) {
     echo "Ocurrió un error con la base de datos: " . $e->getMessage();
}

$sentencia = $base_de_datos->query("select * from usuarios");
$mascotas = $sentencia->fetchAll(PDO::FETCH_OBJ);

?>

<table class="table table-bordered">
     <thead class="thead-dark">
          <tr>
               <th>ID</th>
               <th>Nombre</th>
               <th>Apellido</th>
               <th>Editar</th>
               <th>Eliminar</th>
          </tr>
     </thead>
     <tbody>
          <!--
     Atención aquí, sólo esto cambiará
     Pd: no ignores las llaves de inicio y cierre {}
     -->
          <?php foreach ($mascotas as $mascota) { ?>
               <tr>
                    <td><?php echo $mascota->idusuario ?></td>
                    <td><?php echo $mascota->nombre ?></td>
                    <td><?php echo $mascota->apellidos ?></td>
               </tr>
          <?php } ?>
     </tbody>

</table>