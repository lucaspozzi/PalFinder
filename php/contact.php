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

$hostEmail  = "k.lohani01@gmail.com";
$userName = check_input($_POST['name'], "Name field is mandatory");

$subject  = check_input($_POST['subject'], "Subject field is mandatory");
$email    = check_input($_POST['email']);
$domainOfEmail = strstr($email, '@');

if (!preg_match("/([\w\-]+\@[\w\-]+\.[\w\-]+)/", $email))
{
	displayErrorMsg("E-mail address not valid");
}

if ($domainOfEmail !="@husky.neu.edu") {
	displayErrorMsg("only husky email address allowed");
   }

$comments = check_input($_POST['comments'], "Comments is mandatory");

$msgFromEmail = "
New comment received from $userName

$comments

--
";

$captchaOne  = check_input($_POST['userValOne'], "spam check number is mandatory");

if ($captchaOne<0||$captchaOne>5)
{
	displayErrorMsg("You did not pass spam check (number should be between 0-5)");
}
$captchaTotal  = check_input($_POST['userValTotal'], "Sum field is mandatory");

if ($captchaTotal!=$captchaOne+2)
{
	displayErrorMsg("You did not pass spam check");
}


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
?>



<div style="margin:0 auto;width:75%;text-align:center">
<h1>Your submission has been successfully recorded</h1>
<h4>Name: <?php echo $_POST["name"]; ?></h4><br>
<h4>Message: <?php echo $_POST["comments"]; ?></h4></br>
Email Address is not shown here for security reason
</div>


</body>
</html>


