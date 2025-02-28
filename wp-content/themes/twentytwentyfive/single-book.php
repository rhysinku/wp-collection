<?php get_header(); ?>
  <div class="book-single">
    <h1><?php the_title(); ?></h1>
    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

      <?php if (has_post_thumbnail()) : ?>
        <div class="book-cover">
          <?php the_post_thumbnail('large'); ?>
        </div>
      <?php endif; ?>

      <p> Post Type: <?php echo get_post_type() ?></p>
      <p> GET ID: <?php echo get_the_ID() ?></p>

    <p>Taxonomy:</p>
    <ul>
      <?php $genres = get_the_terms(get_the_ID(), 'book-reading-level');
      if ($genres) : ?>
      <?php foreach($genres as $genre) :  ?>
      <li><a href="<?php echo get_term_link($genre) ?>"><?php echo esc_html($genre->name); ?></a></li>
      <?php endforeach; ?>
      <?php else : ?>
      <li>No Genre assigned</li>
      <?php endif;  ?>
    </ul>

      <div class="book-content">
        <p><strong>Info:</strong></p>
        <?php the_content(); ?>
      </div>
    <?php endwhile; else : ?>
      <p>No Book found.</p>
    <?php endif; ?>
  </div>


<?php get_footer(); ?>