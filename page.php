<?php get_header();?>

<?php $featured_image_url = get_the_post_thumbnail_url(get_the_ID(), 'full'); ?>

<div class="page-banner" style="background-image: url('<?php echo esc_url($featured_image_url); ?>');">
  <div class="overlay"></div>
  <div class="page-content">
    <h1><?php the_title(); ?></h1>
  </div>
</div>


<div class="page-container">
  <div class="page-details">
  <?php get_template_part('includes/section', 'content'); ?>
  </div>

</div>

<?php get_footer();?>