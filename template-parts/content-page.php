<?php
/**
 * Template part for displaying page content in page.php.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Your_Team_Real_Estate
 */

?>
<div id="single-page-container">

    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

        <div id="single-title-box">

            <h2 class="entry-title"><?php the_title(); ?></h2>

        </div>

        <div class="container">
            
            <div class="row">

                <div class="col-sm-12">

                    <div class="entry-content">

                        <?php the_content(); ?>

                    </div><!-- .entry-content -->

                </div>

            </div>
            
        </div>
            
    </article>
        
</div>

