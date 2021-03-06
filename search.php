<?php
/**
 * The template for displaying search results pages.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package Your_Team_Real_Estate
 */

get_header(); ?>

<div id="search-results-wrapper">

    <div id="single-title-box" class="container">
                    
        <div class="row">

            <div class="col-sm-12">
                <h2 class="entry-title"><?php printf( esc_html__( 'Search Results for: %s', 'ytre' ), '<span>' . get_search_query() . '</span>' ); ?></h2>
            </div>

        </div>

    </div>

    <div class="container">

        <div class="row">

            <div class="col-sm-12">

                <section id="primary" class="content-area">
                    
                    <main id="main" class="site-main" role="main">

                        <?php
                        if ( have_posts() ) : ?>

                            <?php
                            /* Start the Loop */
                            while ( have_posts() ) : the_post();

                                    /**
                                     * Run the loop for the search to output the results.
                                     * If you want to overload this in a child theme then include a file
                                     * called content-search.php and that will be used instead.
                                     */
                                    get_template_part( 'template-parts/content', 'search' );

                            endwhile;

                            the_posts_navigation();

                        else :

                            get_template_part( 'template-parts/content', 'none' );

                        endif; ?>

                    </main><!-- #main -->
                    
                </section><!-- #primary -->

            </div>

        </div>
        
    </div>

</div>
                
<?php
get_footer();
