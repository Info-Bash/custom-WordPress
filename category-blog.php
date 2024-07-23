<?php get_header();?>

<section class="page-wrap mb-3 mt-3">

    <div class="container">
        <?php get_template_part('includes/section', 'archive'); ?>

        <div class="pagination-wrapper">

        <div class="pagination">
            <?php 
            global $wp_query;

            $big = 999999999;

            echo paginate_links( array(
                'base' => str_replace($big, '%#%', esc_url( get_pagenum_link($big))),
                'format' => '?paged=%#%',
                'current' => max(1, get_query_var('paged')),
                'total' => $wp_query->max_num_pages,
                'prev_text' => __('&laquo; Prev'),
                'next_text' => __('Next &raquo;'),
            ));
            ?>
        </div>

        </div>

    </div>
</section>

<?php get_footer();?>