<section class="blog-content">

    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

        <article <?php post_class('post-class'); ?>>

            <?php
            $fname = get_the_author_meta('first_name');
            $lname = get_the_author_meta('last_name');
            ?>

            <header class="entry-header">
                <p class="entry-meta">Von <?php echo esc_html($fname . ' ' . $lname); ?> am <?php echo get_the_date('d.m.y'); ?></p>
            </header>

            <hr class="section-divider">

            <div class="entry-content">
                <?php the_content(); ?>
            </div>

            <footer class="entry-footer">

                <?php
                $tags = get_the_tags();
                if ($tags) :
                    ?>
                    <div class="entry-tags">
                        <?php foreach ($tags as $tag) : ?>
                            <a href="<?php echo esc_url(get_tag_link($tag->term_id)); ?>" class="badge badge-success">
                                <?php echo esc_html($tag->name); ?>
                            </a>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>

                <?php // Add the share button here ?>
                <div class="share-button">
                <div class="share-buttons">
                    <span class="share-text">Teilen über</span>
                    <a href="mailto:?subject=<?php echo urlencode(get_the_title()); ?>&body=<?php echo urlencode(get_permalink()); ?>" target="_blank" aria-label="Share via Email"><i class="bi bi-envelope"></i></a>
                    <a href="https://api.whatsapp.com/send?text=<?php echo urlencode(get_the_title() . ' ' . get_permalink()); ?>" target="_blank" aria-label="Share via WhatsApp"><i class="bi bi-whatsapp"></i></a>
                    <a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo urlencode(get_permalink()); ?>" target="_blank" aria-label="Share on Facebook"><i class="bi bi-facebook"></i></a>
                    <a href="#" id="copyLinkIcon" onclick="copyLink(event)" aria-label="Copy Link"><i class="bi bi-link-45deg"></i></a>
                </div>

                <script>
                    function copyLink(event) {
                        event.preventDefault();
                        var tempInput = document.createElement('input');
                        tempInput.value = "<?php echo get_permalink(); ?>";
                        document.body.appendChild(tempInput);
                        tempInput.select();
                        document.execCommand('copy');
                        document.body.removeChild(tempInput);
                        alert('Link copied to clipboard!');
                    }
                </script>

                <!-- <div class="entry-categories">
                    <?php
                    /* $categories = get_the_category();
                    foreach ($categories as $cat) :  */?>
                        <a href="<?php /* echo esc_url(get_category_link($cat->term_id));  */?>" class="category-link">
                            <?php /* echo esc_html($cat->name); */ ?>
                        </a>
                    <?php /* endforeach; */ ?>
                </div> -->
            </footer>

        </article>

    <?php endwhile; else : ?>

        <p><?php esc_html_e('Sorry, no posts matched your criteria.'); ?></p>

    <?php endif; ?>

</section>
