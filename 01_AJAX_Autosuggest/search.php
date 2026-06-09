<?php

include "db.php";

$mode = $_GET['mode'] ?? '';

if($mode == '')
{
    exit;
}

$mode = mysqli_real_escape_string($conn, $mode);

$sql = "SELECT * FROM internship
        WHERE mode='$mode'
        ORDER BY stud_name
        LIMIT 10";

$result = mysqli_query($conn, $sql);

if(mysqli_num_rows($result) > 0)
{
    echo "<div class='result-container'>";

    while($row = mysqli_fetch_assoc($result))
    {
        echo "
        <div class='card'>
            <h3>".$row['stud_name']."</h3>

            <p><b>Email :</b> ".$row['email']."</p>

            <p><b>Contact :</b> ".$row['contact']."</p>

            <p><b>Mode :</b> ".$row['mode']."</p>
        </div>
        ";
    }

    echo "</div>";
}
else
{
    echo "No Records Found";
}

mysqli_close($conn);

?>
