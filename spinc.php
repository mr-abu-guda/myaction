<?php
// SpInclude file.
$Uname=$me['first_name'];
$Ufullname=$me['name'];
$appname=ShortCodes($appname);
$wallpub=ShortCodes($wallpub);
$walllink=ShortCodes($walllink);

function ShortCodes($inline){
	global $Uname,$appname, $Ufullname;
	$scoreline="'+params.score+'";
	
	$inline = str_replace("{fname}", $Uname, $inline);
	$inline = str_replace("{name}", $Ufullname, $inline);
	$inline = str_replace("{title}", $appname, $inline);
	Return $inline;
}

?>