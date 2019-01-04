<?php
/**
 * Template for Metadata we had in our header.php file
 *
 * @package Smashing Magazine/Templates
 */

$urls = array();
for ( $i = 1; $i < 5; $i ++ ) {
	$notification_url = 'http://notifications.buildmypinnedsite.com/';
	$feed_url         = home_url( '/feed/&amp;id=' . $i );
	$args             = array(
		'feed' => $feed_url
	);
	$urls[]           = 'polling-uri' . $i . '=' . add_query_arg( $args, $notification_url );
}
$images_url = esc_url( get_template_directory_uri() . '/assets/images/' );
?>
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<link rel="mask-icon" href="<?php echo $images_url; ?>s.svg" color="#e53b2c" sizes="any" />
<!--[if IE]><link href="<?php echo $images_url; ?>favicon.ico" rel="icon" /><![endif]-->
<link rel="icon" href="<?php echo $images_url; ?>favicon.png" />
<meta name="application-name" content="Smashing Magazine" />
<meta name="msapplication-TileColor" content="#fff" />
<meta name="msapplication-square70x70logo" content="<?php echo $images_url; ?>smashing-windows-icon-70-70.png" />
<meta name="msapplication-square150x150logo" content="<?php echo $images_url; ?>smashing-windows-icon-150-150.png" />
<meta name="msapplication-wide310x150logo" content="<?php echo $images_url; ?>smashing-windows-icon-310-150.png" />
<meta name="msapplication-square310x310logo" content="<?php echo $images_url; ?>smashing-windows-icon-310-310.png" />
<meta name="msapplication-notification" content="frequency=30;<?php echo implode( ';', $urls ); ?>;cycle=1" />
<link rel="apple-touch-icon-precomposed" href="<?php echo $images_url; ?>apple-touch-icon-precomposed.png" />
<link rel="apple-touch-icon-precomposed" sizes="57x57" href="<?php echo $images_url; ?>apple-touch-icon-57x57-precomposed.png" />
<link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?php echo $images_url; ?>apple-touch-icon-72x72-precomposed.png" />
<link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?php echo $images_url; ?>apple-touch-icon-114x114-precomposed.png" />
<link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?php echo $images_url; ?>apple-touch-icon-144x144-precomposed.png" />
