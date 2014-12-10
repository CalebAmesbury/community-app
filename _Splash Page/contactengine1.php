<?php

include 'Akismet.class.php';

$Name = Trim(stripslashes($_POST['Name'])); 
$Email = Trim(stripslashes($_POST['Email'])); 
$Skills = Trim(stripslashes($_POST['Skills'])); 
$Message = Trim(stripslashes($_POST['Message'])); 
$url = '';

$WordPressAPIKey = '1533558d3ea4';
$MyBlogURL = 'http://www.example.com/blog/';

$akismet = new Akismet($MyBlogURL ,$WordPressAPIKey);
$akismet->setCommentAuthor($Name);
$akismet->setCommentAuthorEmail($Email);
$akismet->setCommentAuthorURL($url);
$akismet->setCommentContent($Message);
$akismet->setPermalink('http://www.example.com/blog/alex/someurl/');

if($akismet->isCommentSpam()){
	// disgard comment if spam - can make it keep it and/or send it to a different email if desired
} else {
	$EmailFrom = "info@needfeedproject.org";
	$EmailTo = "info@needfeedproject.org";
	$Subject = "Donate Time Contact Form Message";

	// validation
	$validationOK=true;
	if (!$validationOK) {
	  print "<meta http-equiv=\"refresh\" content=\"0;URL=error.htm\">";
	  exit;
	}

	// prepare email body text
	$Body = "";
	$Body .= "Name: ";
	$Body .= $Name;
	$Body .= "\n";
	$Body .= "Email: ";
	$Body .= $Email;
	$Body .= "\n";
	$Body .= "Skills: ";
	$Body .= $Skills;
	$Body .= "\n";
	$Body .= "Message: ";
	$Body .= $Message;
	$Body .= "\n";
	
	// send email 
	$success = mail($EmailTo, $Subject, $Body, "From: <$EmailFrom>");

	// redirect to success page 
	if ($success){
		print "<meta http-equiv=\"refresh\" content=\"0;URL=contactthanks.php\">";
	}
	else{
		print "<meta http-equiv=\"refresh\" content=\"0;URL=error.html\">";
	}
}
?>