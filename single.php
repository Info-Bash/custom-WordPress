<?php get_header(); ?>

<section class="single-blog">
    <div class="container">
        <?php if (has_post_thumbnail()) : ?>
            <div class="featured-image mb-4">
                <img src="<?php the_post_thumbnail_url('blog-large'); ?>" alt="<?php the_title_attribute(); ?>" class="img-fluid">
            </div>
        <?php endif; ?>

        <div class="entry-header">
            <h2 class="entry-title"><?php the_title(); ?></h2>
        </div>

        <div class="entry-content">
            <?php get_template_part('includes/section', 'blogcontent'); ?>
        </div>
    </div>
</section>

<?php get_footer(); ?>
