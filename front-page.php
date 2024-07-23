<?php get_header();?>

<section class="page-wrap">
    <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <?php for ($i = 0; $i < 3; $i++): ?>
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="<?php echo $i; ?>" class="<?php echo $i === 0 ? 'active' : ''; ?>" aria-current="true" aria-label="Slide <?php echo $i + 1; ?>"></button>
            <?php endfor; ?>
        </div>
        <div class="carousel-inner">
            <?php for ($i = 1; $i <= 3; $i++): ?>
                <?php
                $active_class = $i === 1 ? 'active' : '';
                $image_url = esc_url(get_theme_mod("carousel_image_$i"));
                $title = esc_html(get_theme_mod("carousel_title_$i", __("Title $i", 'yourtheme')));
                $text = esc_html(get_theme_mod("carousel_text_$i", __("Text $i", 'yourtheme')));
                $button_link_slug = get_theme_mod("carousel_button_link_$i", '');
                $button_link = $button_link_slug ? esc_url(home_url('/' . $button_link_slug)) : '';
                $button_text = esc_html(get_theme_mod("carousel_button_text_$i", __('Learn More', 'yourtheme')));
                $display_button = get_theme_mod("display_carousel_button_$i", true);
                ?>
                <div class="carousel-item <?php echo $active_class; ?>">
                    <?php if ($image_url): ?>
                        <img src="<?php echo $image_url; ?>" class="d-block w-100 carousel-image" alt="Slide <?php echo $i; ?>">
                    <?php endif; ?>
                    <div class="carousel-caption">
                        <h5><?php echo $title; ?></h5>
                        <p><?php echo $text; ?></p>
                        <?php if ($display_button && $button_link): ?>
                            <p><a href="<?php echo $button_link; ?>"><?php echo $button_text; ?></a></p>
                        <?php endif; ?>
                    </div>
                </div>
            <?php endfor; ?>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
</section>

 <!-- --------------------------------
    Next Event Section 
-------------------------------------->

<section class="next-event">
    <div class="container">
        <p>
            <span class="Nächster">Nächster Termin:&nbsp;</span>
            <?php 
            if ( class_exists( 'Tribe__Events__Main' ) ) {
                $events = tribe_get_events( array(
                    'posts_per_page' => 1,
                    'start_date' => current_time( 'Y-m-d H:i:s' ),
                    'orderby' => 'event_date',
                    'order' => 'ASC',
                ) );

                if ( empty( $events ) ) {
                    $events = tribe_get_events( array(
                        'posts_per_page' => 1,
                        'end_date' => current_time( 'Y-m-d H:i:s' ),
                        'orderby' => 'event_date',
                        'order' => 'DESC',
                    ) );
                }

                if ( $events ) {
                    $event = $events[0];
                    $event_title = get_the_title( $event );
                    $event_date = tribe_get_start_date( $event, false, 'd.m.Y' );
                    echo '<span class="Eisstockschießen">' . $event_title . ' am </span>';
                    echo $event_date;
                } else {
                    echo 'Kein bevorstehendes oder vergangenes Ereignis gefunden';
                }
            } else {
                // Fallback if Tribe Events Calendar plugin is not active
                $event_date = get_theme_mod('event_date', '2024-04-22');
                echo date('d.m.Y', strtotime($event_date)); 
            }
            ?>
        </p>
    </div>
</section>


 <!-- --------------------------------
    Archive Post Section 
-------------------------------------->

<section class="page-wrap">
    <div class="resent-post">
        <h2>Letzten Beiträge</h2>
    </div>

    <div class="container">

        <div class="post-list">
            <?php
            $args = array(
                'post_type' => 'post',
                'posts_per_page' => 5,
            );
            $query = new WP_Query($args);
            if ($query->have_posts()) :
                while ($query->have_posts()) : $query->the_post(); ?>
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
                <?php endwhile;
                wp_reset_postdata();
            else : ?>
                <p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
            <?php endif; ?>
        </div><!-- .post-list -->


        <div class="all-post">
            <a href="<?php echo esc_url(home_url(get_theme_mod('custom_blog_link', '/category/blog'))); ?>" class="alle-Beitrage">alle Beiträge</a>
        </div>

    </div>
</section>

 <!-- --------------------------------
    Just a  Section 
-------------------------------------->


<?php get_footer();?>