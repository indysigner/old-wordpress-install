<?php
/**
 * Template for mobile search
 *
 * @package Smashing Magazine/Templates
 */
?>
<div class="ms" id="ms" role="search">
  <form id="mobile-searching" class="sfm clearfix" method="get" action="<?php echo home_url( '/search-results/' ); ?>" target="_top">
    <label for="mobile-search-input">Search on Smashing Magazine</label>
    <input name="q" id="mobile-search-input" type="text" placeholder="e.g. CSS" />
    <button class="submit" type="submit">Search</button>
    <input type="hidden" name="cx" value="<?php echo SMASH_SEARCH_CX; ?>">
    <input type="hidden" name="cof" value="<?php echo SMASH_SEARCH_COF; ?>">
    <input type="hidden" name="ie" value="<?php bloginfo( 'charset' ); ?>">
  </form>
</div>
<a role="button" class="msc js-toggle-btn" href="#top" data-toggle-target="ms" title="Close the search">X</a>
