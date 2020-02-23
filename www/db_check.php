<?php
$env = parse_ini_file("/etc/environment", true, INI_SCANNER_RAW);

$link = mysqli_connect(
    $env["DB_CONNECTION"],
    $env["DB_USERNAME"],
    $env["DB_PASSWORD"],
    $env["DB_DATABASE"]
) or die("Error: Unable to connect to MySQL." . mysqli_connect_error());

echo "Success: You are connected to MySQL!" . PHP_EOL;

mysqli_close($link);
