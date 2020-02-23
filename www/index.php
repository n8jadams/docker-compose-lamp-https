<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Docker Compose Lamp HTTPS</title>
</head>
<body>
    <h1>Welcome to Docker Compose Lamp HTTP!</h1>
    <section>
        <h2>.env file contents</h2>
        <?php 
            $env = parse_ini_file("/etc/environment", true, INI_SCANNER_RAW);
            var_dump($env);
        ?>
    </section>
    <section>
        <h2>Services</h2>
        <ul>
            <li><a href="./php_info.php">phpinfo()</a></li>
            <li><a href="http://<?= rtrim($_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"],"/") ?>:8080">phpMyAdmin</a></li>
            <li><a href="./db_check.php">Test DB Connection</a></li>
        </ul>
    </section>
    <section>
        <h2>Drop your PHP app in /www</h2>
    </section>
</body>
</html>