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

$userName = check_input($_POST['nameByUser'], "Name field is mandatory");

$email    = check_input($_POST['emailByUser']);
$domainOfEmail = strstr($email, '@');

if (!preg_match("/([\w\-]+\@[\w\-]+\.[\w\-]+)/", $email))
{
    displayErrorMsg("E-mail address not valid");
}

if ($domainOfEmail !="@husky.neu.edu") {
    displayErrorMsg("only husky email address allowed");
   }

   $hour  = check_input($_POST['hour'], "Hour field is mandatory");


   function check_input($data, $problem='')
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    if ($problem && strlen($data) == 0)
    {
        displayErrorMsg($problem);
    }
    return $data;
}

function displayErrorMsg($myError)
{
?>
    <html>
    <body>

    <b>Please fix the following errors</b><br />
    <?php echo $myError; ?>

    </body>
    </html>
<?php
exit();
}

// Set the database access information as constants:
 
 //local
DEFINE ('DB_NAME', 'paldatabase'); // or connect without specifying a database
DEFINE ('DB_USER', 'root');
DEFINE ('DB_PASSWORD', 'root');
DEFINE ('DB_HOST', 'localhost');

// Make the connection:
$link = mysql_connect (DB_HOST, DB_USER, DB_PASSWORD);
if (!link){
	die('Could not connect to MySQL: ' . mysql_error() );
}





//Godaddy
// DEFINE ('DB_NAME', 'paldatabase'); // or connect without specifying a database
// DEFINE ('DB_USER', 'paldatabase');
// DEFINE ('DB_PASSWORD', 'Nopassword@1');
// DEFINE ('DB_HOST', 'paldatabase.db.11389844.hostedresource.com');

// $link = mysql_connect (DB_HOST, DB_USER, DB_PASSWORD);
// if (!$link) { 
//     die('Could not connect: ' . mysql_error()); 
// } 

mysql_select_db(DB_NAME, $link);

$sql = "INSERT INTO user (name, email, date_event, hour, sport, skill)
VALUES ('$_POST[nameByUser]','$_POST[emailByUser]','$_POST[dateByUser]','$_POST[hour]','$_POST[sport]','$_POST[skill]')";


mysql_query($sql, $link);
mysql_close($link);

$msgFromEmail = <<<EMAIL

<html>
<head>
  <title>Pal Finder</title>
</head>
<body style="background-color:skyblue">
<h1><span style="color:red">Hello From Pal Finder</span></h1> 
<p style="color:red">Hello  $_POST[nameByUser], </p>
<p style="color:red">We have received the following request from You </p>
<p>Sports : $_POST[sport]</p>
<p>Skill : $_POST[skill]</p>
<p>Hour : $_POST[hour]</p>
<p style="color:red">One of our representative will get back to you within 24 hours</p>
<p style="color:red">Have a fun time with your Pal</p>
<a href="cs4550.krinjalinc.com/PalFinder/">PalFinder</a>

</body>
</html>

EMAIL;
$headers = "From: PalFinder@palfinder.com\r\n"; 
$headers .= "Reply-to: query@palfinder.com\r\n"; 
$headers .= 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

$subject= "Confirmation from Pal Finder";

mail($email, $subject, $msgFromEmail,$headers);



?>
<div style="margin:0 auto;width:75%;text-align:center">
<h1>Your submission has been successfully recorded</h1>
<h4>Name: <?php echo $_POST["nameByUser"]; ?></h4><br>
<h4>Date: <?php echo $_POST["dateByUser"]; ?></h4></br>
<h4>Hour: <?php echo $_POST["hour"]; ?></h4></br>
<h4>Sport: <?php echo $_POST["sport"]; ?></h4></br>
<h4>Skill: <?php echo $_POST["skill"]; ?></h4></br>
Email Address is not shown here for security reason
</div>


</body>
</html>