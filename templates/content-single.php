<?php
use Roots\Sage\Extras;
?>

<?php while (have_posts()) : the_post(); ?>
  <?php Extras\featured_image(); ?>

  <article <?php post_class(); ?>>
    <header>
      <h1 class="entry-title"><?php the_title(); ?></h1>
      <?php get_template_part('templates/entry-meta'); ?>
    </header>
    <div class="entry-content">
      <?php the_content(); ?>
    </div>
    <footer>
      <p><a href="<?php echo get_post_type_archive_link(get_post_type()) ?>"><i class="fa fa-chevron-left" aria-hidden="true"></i> Back</a></p>
      <?php wp_link_pages(['before' => '<nav class="page-nav"><p>' . __('Pages:', 'sage'), 'after' => '</p></nav>']); ?>
    </footer>
    <?php comments_template('/templates/comments.php'); ?>
  </article>
<?php endwhile; ?>
