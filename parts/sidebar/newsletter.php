<?php
/**
 * Newsletter template for sidebar
 *
 * @package Smashing Magazine/Parts/Sidebar
 */

$smnl_url = get_template_directory_uri() . '/assets/images/smnl.png';
$mccounter_url = get_template_directory_uri() . '/assets/images/mc-counter.svg';
?>

<?php if ( ! is_page( 'the-smashing-newsletter' ) ) : ?>
<section class="sf wg">
  <h3>
    <a href="<?php echo home_url( '/the-smashing-newsletter/' ); ?>">
      <img src="<?php echo esc_url( $smnl_url ); ?>" alt="198,064 fine folks have signed up to our Newsletter already, when will you?" />
      Smashing Newsletter
    </a>
  </h3>
  <p>Subscribe to our email newsletter for useful tips and valuable resources, sent out every second Tuesday.</p>
  <div id="mc_embed_signup" class="mcf">
    <form action="//smashingmagazine.us1.list-manage.com/subscribe/post?u=16b832d9ad4b28edf261f34df&amp;id=a1666656e0" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate">
      <label for="mcer-EMAIL" class="sr">Please provide us with your email address:</label>
      <input id="mcer-EMAIL" name="EMAIL" type="text" placeholder="email address" />
      <button id="mc-embedded-subscribe" name="subscribe" class="submit" type="submit">Subscribe</button>
    </form>
    <a href="<?php echo home_url( '/the-smashing-newsletter/' ); ?>"><img class="mcc" src="<?php echo esc_url( $mccounter_url ); ?>" alt="Currently, we have 191728 subscribers to our newsletter" /></a>
  </div>
</section>
<?php endif; ?>
