<html>
<head>
    <title>Pal Finder</title>
    <link rel='stylesheet' type='text/css' href='../stylesheet/stylesheet.css'/>

</head>
<body>
<div class="wrapper bg">
    <div class="navigation ">
        <span class="navItem"><a href="../index.html">Home |</a> </span>
        <Span class="navItem"><a href="../page/pal.html">Pals |</a> </Span>
        <Span class="navItem"><a href="../page/book.html">Book |</a> </Span>
        <Span class="navItem"><a href="../page/reference.html">Reference |</a> </Span>
        <Span class="navItem"><a href="../page/contact.html">Contact |</a> </Span>
        <Span class="navItem"><a href="https://github.com/kshitijlohani/PalFinder">Source Code |</a> </Span>
    </div>
</div>

<div class="wrapper">
    <div class="colorDeepSkyBlue title ">
        <span>Pal Finder</span>
    </div>
</div>


<?php

echo "ID -- Name -- Sport -- Skill -- Hour"."</br>";
echo "</br";
$connection = mysql_connect('paldatabase.db.11389844.hostedresource.com', 'paldatabase', 'Nopassword@1'); 
mysql_select_db('paldatabase');

$query = "SELECT * FROM user"; 
$result = mysql_query($query);

echo "<table>"; 

while($row = mysql_fetch_array($result)){   
echo  $row['ID'] . " -- ".$row['name'] . " -- " . $row['sport'] ." -- " . $row['skill'] ." -- ". $row['hour']."</br>" ;  

}

echo "</table>"; 

mysql_close(); 


?>

</body>
</html>