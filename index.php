<?php
// appsource
require_once 'facebook.php';

require_once 'appinclude.php';
    if (isset($_GET['code'])){
        header("Location: " . $canvasPage);
        exit;
    }

$fb = new Facebook(array(
	'appId' => $appid,
	'secret' => $appsecret,
	'cookie' => true
));

$me = null;
 $user = $fb->getUser();

if($user) {
	try {
		$me = $fb->api('/me');
	} catch(FacebookApiException $e) {
		error_log($e);
	}
}

if($me) {}
else {

	$loginUrl = $fb->getLoginUrl(array(
        'scope' => ''
	));
		echo "
		<script type='text/javascript'>
		window.top.location.href = '$loginUrl';
		</script>
	";	
	exit;
}


if(isset($_GET['signed_request'])) {
	$fb_args = "signed_request=" . $_REQUEST['signed_request'];
}


include 'spinc.php';


function ae_detect_ie(){
    if (isset($_SERVER['HTTP_USER_AGENT']) &&
	(strpos($_SERVER['HTTP_USER_AGENT'], 'MSIE') !== false))
	        return true;    
	else        
		return false;}


?>

<html xmlns="http://www.w3.org/1999/xhtml" xmlns:og="http://opengraphprotocol.org/schema/" xmlns:fb="http://www.facebook.com/2008/fbml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="cache-control" content="max-age=0">
<meta http-equiv="pragma" content="no-cache">
<meta http-equiv="expires" content="0">
<meta http-equiv="imagetoolbar" content="no">
<title><?=$appname?></title>
</head>
<body {overflow:hidden;}>
<div id="fb-root"></div>
    <script src="https://connect.facebook.net/en_US/all.js"></script>
    <script>
      window.fbAsyncInit = function() {
        FB.init({
          appId : '<?=$appid?>', //Your facebook APP here
          cookie : true // enable cookies to allow the server to access the session
        });
      }

      window.onload = function() {
        FB.Canvas.setAutoGrow(91);
      }
   
  (function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/all.js#xfbml=1&appId=<?=$appid?>";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));
    </script>
<style>
.submitButton {
	border-top: 1px solid #D4DBE7;
	border-left: 1px solid #D4DBE7;
	border-bottom: 1px solid #0A1850;
	border-right: 1px solid #0A1850;
	background: #314E8E;
	color: #fff;
	font-size: 1em;
	padding: 2px 15px 2px 15px;
	cursor: pointer;
	cursor: hand;

}
</style>
<?php
@include 'ads/topads.php';



$invitecontent=ShortCodes($invitecontent);
$Genericdetail=ShortCodes($Genericdetail);
$GenericTitle=ShortCodes($GenericTitle);
$GenericCaption=ShortCodes($GenericCaption);

if ($_GET['m'] == 1)

{
// Invite code


$invitecontent=ShortCodes($invitecontent);

         $message = $invitecontent;

         $requests_url = "https://www.facebook.com/dialog/apprequests?app_id=" 
                . $appid . "&redirect_uri=" . urlencode($canvasPage)
                . "&message=" . $message;

         if (empty($_REQUEST["request_ids"])) {
            echo("<script> top.location.href='" . $requests_url . "'</script>");
         } else {
            echo "Request Ids: ";
            print_r($_REQUEST["request_ids"]);
         }



@include 'ads/bottomads.php';
exit;

}
else
{
if ($appimagename=='')
	{
		$appimagename='appimage.jpg';
	}
$textsize = '3';
?>
	<div id="fb_items" style="margin-bottom:5px;">
	<div class="fb-like" data-href="<?php echo $canvasURL; ?>" data-send="true" data-layout="button_count" data-width="450" data-show-faces="true" data-font="trebuchet ms"></div>
	</div>
<BR>
<center><IFRAME SRC="<?php echo $canvasURL.$appcontent;?>" WIDTH=<?=$appcontentwidth;?> HEIGHT=<?=$appcontentheight;?> scrolling="no" border="no" frameborder="0"></IFRAME></center>

<center><font size="-1">
<FORM><INPUT TYPE=BUTTON OnClick="publishStream();" VALUE="Post to Wall" class="submitButton"><INPUT TYPE="BUTTON" VALUE="Invite Friends" ONCLICK="top.location.href='<?php echo $canvasPage;?>?m=1'" class="submitButton"></FORM>
</font></center>

<?php
@include 'ads/bottomads.php';

}

?>
<script>
function streamPublish(name, description, caption, hrefLink, message){
		 FB.ui(     {         
		 method: 'feed',
		 <?php if (ae_detect_ie()){echo "display: 'popup',";}?>         
		 name: name,
		 description: description,
		 link: hrefLink,
		 message: message,
		 picture: '<?php echo $canvasURL.$appimagename;?>',
		 caption: caption
		 },
		 function(response) {      }); } 
		 

function publishStream(){
     streamPublish("<?php echo $GenericTitle;?>", '<?php echo $Genericdetail;?>', '<?php echo $GenericCaption;?>', '<?php echo $canvasPage;?> ', "");
	 } 

</script>

</body>

