<!DOCTYPE html>
<html lang="en">
<head>
  <title>Blog Site Template</title>
  <!-- Meta -->
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="Blog Site Template">
  <meta name="author" content="https://youtube.com/FollowAndrew">
  <link rel="shortcut icon" href="images/logo.png">
  <?php wp_head() ?>
</head>

  <div class="movie-archive">
    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
      <h1><a href="<?php echo get_permalink(get_the_ID()) ?>"><?php the_title(); ?></a></h1>
      <?php if (has_post_thumbnail()) : ?>
        <div class="movie-cover">
          <?php the_post_thumbnail('large'); ?>
        </div>
      <?php endif; ?>
      <p>
        Rating:
        <span><?php the_field('movie_rating'); ?> Star</span>
      </p>
      <p> Post Type: <?php echo get_post_type() ?></p>
      <p> GET ID: <?php echo get_the_ID() ?></p>
      <p> Taxonomy:</p>
      <ul>
        <?php
        $genres = get_the_terms(get_the_ID(), 'movie-genre');
        if ($genres) : ?>
          <?php foreach ($genres as $genre) : ?>
            <li><a href="<?php echo get_term_link($genre) ?>"><?php echo esc_html($genre->name); ?> </a></li>
          <?php endforeach; ?>
        <?php else: ?>
          <li>No genres assigned.</li>
        <?php endif; ?>
      </ul>
      <div class="movie-content">
        <p><strong>Info:</strong></p>
        <?php the_content(); ?>
      </div>

    <?php endwhile; else : ?>
      <p>No Movie found.</p>
    <?php endif; ?>
  </div>


</body>
</html>