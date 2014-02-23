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
$connection = mysql_connect('paldatabase.db.11389844.hostedresource.com', 'paldatabase', 'Nopassword@1'); //The Blank string is the password
mysql_select_db('paldatabase');

$query = "SELECT * FROM user"; //You don't need a ; like you do in SQL
$result = mysql_query($query);

echo "<table>"; // start a table tag in the HTML

while($row = mysql_fetch_array($result)){   //Creates a loop to loop through results
// echo $row['name'],'|',$row['sport'];  //$row['index'] the index here is a field name
//echo "<tr><td>" . $row['name'] . " | "."</td><td>" . $row['sport'] ." | " . "</td></tr>". $row['skill'] ." | " . "</td></tr>";  //$row['index'] the index here is a field name
echo  $row['ID'] . " -- ".$row['name'] . " -- " . $row['sport'] ." -- " . $row['skill'] ." -- ". $row['hour']."</br>" ;  //$row['index'] the index here is a field name




}

echo "</table>"; //Close the table in HTML

mysql_close(); //Make sure to close out the database connection


?>

</body>
</html>