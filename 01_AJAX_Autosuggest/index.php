<!DOCTYPE html>
<html>
<head>
    <title>Internship Search</title>

    <style>
        body{
            font-family: Arial, sans-serif;
            margin: 20px;
        }

        .result-container{
            display: flex;
            flex-wrap: wrap;
            gap: 15px;
        }

        .card{
            background: #f9f9f9;
            
        }

        .card h3{
            margin: 0 0 10px;
        }

        .card p{
            margin: 5px 0;
        }
    </style>
</head>
<body>

<h1>Internship Mode Search</h1>

<select id="mode" onchange="loadData()">
    <option value="">Select Mode</option>
    <option value="Online">Online</option>
    <option value="Onsite">Onsite</option>
    <option value="Hybrid">Hybrid</option>
</select>

<br><br>

<div id="result"></div>

<script>
function loadData()
{
    var mode = document.getElementById("mode").value;

    var xhr = new XMLHttpRequest();

    xhr.open("GET","search.php?mode="+mode,true);

    xhr.onreadystatechange = function()
    {
        if(xhr.readyState==4 && xhr.status==200)
        {
            document.getElementById("result").innerHTML = xhr.responseText;
        }
    };

    xhr.send();
}
</script>

</body>
</html>
