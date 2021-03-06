<?php
/**
 * The footer sidebar widget area (frontpage).
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Your_Team_Real_Estate
 */

if ( ! is_active_sidebar( 'sidebar-footer-frontpage' ) ) {
    return;
}
?>

<aside id="secondary" class="widget-area" role="complementary">
    <div class="row">
        <?php dynamic_sidebar( 'sidebar-footer-frontpage' ); ?>
    </div>
</aside><!-- #secondary -->
