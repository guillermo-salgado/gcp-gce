<?php
$servername = "localhost";
$username = "admin";
$password = "Password1";
$db = 'honduras';
$db_port = '3306';

$conn = mysqli_connect($servername, $username, $password, $db, $db_port);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
} else {
    $departments = mysqli_query($conn, "SELECT * FROM departamento");

    echo "<ul>";
    while ($row = $departments->fetch_assoc())
    {
        echo "<li>";

        $value = utf8_encode($row['departamento']);
        echo "<span>$value</span>";

        // Municipalities
        $idDepartment = $row['id_departamento'];
        $municipalities = mysqli_query($conn, "SELECT * FROM municipio WHERE id_departamento = $idDepartment");

        echo "<ul>";
        while ($municipalitiesRow = $municipalities->fetch_assoc())
        {
            echo "<li>";
            $municipalitiesValue = utf8_encode($municipalitiesRow['municipio']);
            echo "<span>$municipalitiesValue</span>";
            echo "</li>";
        }
        echo "</ul>";

        // Municipalities
        echo "</li>";
    }
    echo "</ul>";
}
?>