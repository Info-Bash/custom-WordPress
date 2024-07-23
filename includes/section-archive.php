<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

    <div class="post-card">
        <?php if (has_post_thumbnail()) : ?>
            <div class="post-thumbnail">
                <img src="<?php the_post_thumbnail_url('blog-small'); ?>" alt="<?php the_title_attribute(); ?>" class="post-image">
            </div>
        <?php endif; ?>

        <div class="post-content">
            <h2 class="post-title"><?php the_title(); ?></h2>
            <p class="entry-meta"><?php echo get_the_date('d.m.y'); ?></p>
            <div class="post-excerpt">
                <?php the_excerpt(); ?>
            </div>
            <a href="<?php the_permalink(); ?>" class="read-more-btn">Weiterlesen</a>
        </div>
    </div>

<?php endwhile; else : ?>
    <p><?php esc_html_e('Sorry, no posts matched your criteria.'); ?></p>
<?php endif; ?>
