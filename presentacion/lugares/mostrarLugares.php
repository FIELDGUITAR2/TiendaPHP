<table>
    <tr>
        <td>Id</td>
        <td>Nombre</td>
        <td>Descripción</td>
        <td>Ubicación</td>
    </tr>
    <?php
    require_once('logica/Ciudad.php');
    
    foreach ($lugares as $lugar) {
        echo "<tr>";
        echo "<td>" . htmlspecialchars($lugar->obtenerId()) . "</td>";
        echo "<td>" . htmlspecialchars($lugar->obtenerNombre()) . "</td>";
        echo "<td>" . htmlspecialchars($lugar->obtenerDescripcion()) . "</td>";
        echo "<td>" . htmlspecialchars($lugar->obtenerUbicacion()) . "</td>";
        echo "</tr>";
    }
    ?>
</table>