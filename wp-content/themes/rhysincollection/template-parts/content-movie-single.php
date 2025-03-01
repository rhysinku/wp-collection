<div class="container">

  <header class="content-header">
    <div class="meta mb-3">
      <span class="date">Published <?php the_date() ?></span>
      <?php the_tags(
        '<span class="tag"><i class="fa fa-tag"></i> ',
        '</span><span class="tag"><i class="fa fa-tag"></i> ',
        '</span>'
      ) ?>
    </div>
  </header>
  <?php if (has_post_thumbnail()) : ?>
    <div class="movie-cover">
      <?php the_post_thumbnail('large'); ?>
    </div>
  <?php endif; ?>
  <p> GET ID: <?php echo get_the_ID() ?></p>
  <p> Post Type: <?php echo get_post_type() ?></p>
  <p>
    Rating:
    <span><?php the_field('movie_rating'); ?> Star</span>
  </p>
  <p>Taxonomy:</p>
  <ul>
    <?php $genres = get_the_terms(get_the_ID(), 'book-reading-level');
    if ($genres) : ?>
      <?php foreach ($genres as $genre) : ?>
        <li><a href="<?php echo get_term_link($genre) ?>"><?php echo esc_html($genre->name); ?></a></li>
      <?php endforeach; ?>
    <?php else : ?>
      <li>No Genre assigned</li>
    <?php endif; ?>
  </ul>

  <div class="movie-content">
    <p><strong>Info:</strong></p>
    <?php the_content(); ?>
  </div>
</div>