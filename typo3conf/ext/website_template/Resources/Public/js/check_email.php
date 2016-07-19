
<?php
	$email=$_POST[email];
	$pattern='\b[\w\.-]+@((?!yahoo|hotmail|outlook|asdfasdfmail|dfoofmail|asdooeemail|asooemail|rtotlmail|qwkcmail|mail|yandex|anaptanium|tom).)[\w\.-]+\.\w{2,4}\b';

	//$pattern=" /\@(datwyler)\.com/";

	if (!preg_match($pattern, $email)) 
	{
		echo "You are not allowed to registerd";
	}
	else
	{
		header('Location: typo3conf/ext/website_template/Resources/Private/Templates/Extensions/sr_feuser_register/RegisterHtmlTemplate.html');
		exit;
	}      
?>
