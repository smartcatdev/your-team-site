<?php
/**
 * The sidebar widget area for beneath the Featured Listings.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Your_Team_Real_Estate
 */

if ( ! is_active_sidebar( 'sidebar-featured-listings' ) ) {
    return;
}
?>

<aside id="secondary" class="widget-area" role="complementary">
    <div class="row">
        <?php dynamic_sidebar( 'sidebar-featured-listings' ); ?>
    </div>
</aside><!-- #secondary -->
