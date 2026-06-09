<?php

$year = date("Y");

$html = '
<html>
<head>
    <title>Unicode Technolab</title>
</head>
<body>

<h1 align="center">Unicode Technolab</h1>

<hr>

<p align="center">
This is first demo paragraph...
This is first demo paragraph...
This is first demo paragraph...
This is first demo paragraph...
This is first demo paragraph...
This is first demo paragraph...
This is first demo paragraph...
</p>

</body>
</html>
';

for($i = 1; $i <= 100; $i++)
{
    $folder_name = $year . sprintf("%03d", $i);

    if(!file_exists($folder_name))
    {
        mkdir($folder_name, 0777, true);
    }

    file_put_contents(
        $folder_name . "/index.php",
        $html
    );
}

echo "100 folders and index.php files created successfully.";

?>
