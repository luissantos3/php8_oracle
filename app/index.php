<?php

// Configurações de conexão com o banco de dados Oracle
$servername = getenv('SERVERNAME');
$port = getenv('PORT');
$sid = getenv('SID');
$dbname = getenv('DBNAME');
$username = getenv('USERNAME');
$password = getenv('PASSWORD');
$oracleDB = "(DESCRIPTION=(ADDRESS_LIST = (ADDRESS = (PROTOCOL = TCP)(HOST = ".$servername.")(PORT = ".$port.")))(CONNECT_DATA=(SID=".$sid.")))";

// Tenta se conectar ao banco de dados Oracle
$conn = oci_connect($username, $password, $oracleDB);

if (!$conn) {
    $error = oci_error();
    echo "Falha na conexão: " . $error['message'];
    exit();
}



echo "Conexão bem-sucedida!";

// Exemplo de consulta
$query = "SELECT table_name FROM all_tables";

$stmt = oci_parse($conn, $query);
oci_execute($stmt);

var_dump($row = oci_fetch_array($stmt, OCI_ASSOC+OCI_RETURN_NULLS));

echo "<br><br>Dados:<br>";

// Exibindo os resultados
while ($row = oci_fetch_array($stmt, OCI_ASSOC+OCI_RETURN_NULLS)) {
    foreach ($row as $item) {
        echo $item . " ";
    }
    echo "<br>";
}

// Fecha a conexão
oci_free_statement($stmt);
oci_close($conn);

?>
