<?php
/**
 * "Editor's note" in single-templates
 *
 * @package Smashing Magazine/Parts/Ad
 */

if ( smash_is_ads_disabled() ) {
    return;
}

/** TODO: temporally disabled */
return;
?>

<div id="editors-note" class="ed-no">
  <figure><a href="http://barcelona.smashingconf.com/"><img src="https://media-mediatemple.netdna-ssl.com/wp-content/themes/smashing-magazine/assets/images/sidebar-smashingconf-barcelona.png" alt="SmashingConf Barcelona 2016"></a></figure>
  <p><strong>Hold on, Tiger! Thank you for reading the article.</strong> Did you know that we also publish <a href="<?php echo home_url( '/books/' ); ?>">printed books</a> and run <a href="<?php echo home_url( '/smashing-workshops/' ); ?>">friendly conferences</a> – crafted for pros like you? Like <a href="http://barcelona.smashingconf.com/">SmashingConf Barcelona</a>, on October 25–26, with smart design patterns and front-end techniques.</p>
</div>
