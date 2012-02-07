<?php //SVN: $Id: pda-option.php 336951 2011-01-25 12:06:35Z imthiaz $?>
<?php 
if ( !empty($_POST ) ) : ?>
<div id="message" class="updated fade"><p><strong><?php _e('Options saved.') ?></strong></p></div>
<?php endif; ?>
<div class="wrap">
	<h2><?php _e('PDA Plugin Options'); ?></h2>
	<form action="" method="post">
		<h3><label for="key"><?php _e('Browser Agents'); ?></label></h3>
		<p><textarea name="pda_browser_agents" cols="80" rows="5"><?php echo get_option('pda_browser_agents'); ?></textarea> </p>
		<p>If you like to add more mobile agents please enter the same at the end seperated by commas.</p>
		<p class="submit"><input type="submit" name="submit" value="<?php _e('Update options &raquo;'); ?>" /></p>
	</form>
	<h3><?php _e('Donations'); ?></h3>
	<p>If you really like the plugin and if you want to help you can contribute some dollars. </p>
	<p>
		<form action="https://www.paypal.com/cgi-bin/webscr" method="post">
			<input type="hidden" name="cmd" value="_s-xclick">
			<input type="image" src="https://www.paypal.com/en_US/i/btn/btn_donate_SM.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
			<img alt="" border="0" src="https://www.paypal.com/en_US/i/scr/pixel.gif" width="1" height="1">
			<input type="hidden" name="encrypted" value="-----BEGIN PKCS7-----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-----END PKCS7-----">
		</form>
	</p>
	<p>Thanks to <hr />
	<p>Peterson Media ($10)</a></p>
	<p>Soenke Nippel ($10)</p>
	<p><a href="http://sekano.net/" target="_blank">Sekano.Net ($5)</a></p>
	<p><a href="http://relaxationtunes.com/" target="_blank">Herve Billiet ($5)</a></p>
	<p><a href="http://gruntdoc.com/" target="_blank">Allen Roberts ($50)</a></p>
	<p><a href="http://incontrolhome.com/" target="_blank">InControl ($20)</a></p>
	<p><a href="http://chuckbrown.com/" target="_blank">Chuck Brown ($10)</a></p>
	<p><a href="http://blog.martindiessner.com/" target="_blank">Martin Diessner ($50)</a></p>
	<p>Yah Ming Yang ($30)</p>
	<p><a href="http://www.temperatures.com/" target="_blank">Ray Peacock ($25)</a></p>
	<p>Shihua Zhang ($10)</p>
	<p><a href="http://www.wtnet.de/" target="_blank">Jan Petersen ($5)</a></p>
</div>
