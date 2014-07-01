<?php

	# Set the theme for your project's web pages.
	# See the Committer Tools "Phoenix" secion in the How Do I? for list of themes
	# https://dev.eclipse.org/committers/
	$theme = "Nova";
	$App->Promotion = TRUE;
	# Define your project-wide Nav bars here.
	# Format is Link text, link URL (can be http://www.someothersite.com/), target (_self, _blank), level (1, 2 or 3)
	$documentRoot = $_SERVER['DOCUMENT_ROOT'];

	require_once ($documentRoot . "/membership/promo/promos.php");
	include_once('../downloads/content/downloadPromos.php');
	$adNo = ""; $_preview = "";
	if (isset($_GET['adNo'])) {
		$adNo = $_GET['adNo'];
	}
	if (isset($_GET['preview'])) {
		$_preview = $_GET['preview'];
	}
	$promo = chooseDownloadAd($adNo);
	if ($_SERVER['SCRIPT_FILENAME'] = '/downloads/download.php')
	{
		$Nav->setHTMLBlock(donateButtons($promo));
	}

	function donateButtons($promo){
	ob_start();
	?>	<style> form { display:inline; }</style>
			<div class="ad">
		<?php print $promo; ?>
	</div>
		<div style="padding-left:10px;">
		<h3>Give Back to Eclipse</h3>
		<form action="https://www.paypal.com/cgi-bin/webscr" method="post">
			<input type="hidden" name="cmd" value="_s-xclick">
			<input type="hidden" name="hosted_button_id" value="7577704">
			<input type="image" src="/friends/images/donate5.png" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
			<img alt="" border="0" src="https://www.paypal.com/en_US/i/scr/pixel.gif" width="1" height="1"">
		</form>
		<form action="https://www.paypal.com/cgi-bin/webscr" method="post">
			<input type="hidden" name="cmd" value="_s-xclick">
			<input type="hidden" name="hosted_button_id" value="11342083">
			<input type="image" src="/friends/images/donate15.png" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
			<img alt="" border="0" src="https://www.paypal.com/en_US/i/scr/pixel.gif" width="1" height="1">
		</form>
		<form action="https://www.paypal.com/cgi-bin/webscr" method="post">
			<input type="hidden" name="cmd" value="_s-xclick">
			<input type="hidden" name="hosted_button_id" value="11342063">
			<input type="image" src="/friends/images/donate25.png" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
			<img alt="" border="0" src="https://www.paypal.com/en_US/i/scr/pixel.gif" width="1" height="1">
		</form>
		<br/>
		<a href="/donate/">Donate $35 or more and Become a Friend of Eclipse!</a>
		<img src="/friends/images/donateHeader.png"  id="img_paypal"/>
		<p style="padding:5px 0px;font-size:10px;color:#888">The Eclipse Foundation is a not-for-profit organization, not a charitable organization, so we are unable to provide charitable tax receipts.<br>Amounts shown are in US dollars.</p>
		</div>
	<?
	return ob_get_clean();
}
?>