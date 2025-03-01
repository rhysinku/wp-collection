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
    <div class="book-cover mb-2">
      <?php the_post_thumbnail('large'); ?>
    </div>
  <?php endif; ?>

  <p> Post Type: <?php echo get_post_type() ?></p>
  <p> Book Alias: <?php echo get_field('book_alias', get_the_ID() ) ?></p>
  <p> Book Rating: <?php echo get_post_meta(get_the_ID(), 'bookstore_rating_meta_key', true); ?></p>
  <p> GET ID: <?php echo get_the_ID() ?></p>
  <p>Genre</p>
  <ul>
    <?php $book_genre = get_the_terms(get_the_ID(), 'book-genre');
    if ($book_genre) : ?>
      <?php foreach ($book_genre as $genre) : ?>
        <li><a href="<?php echo get_term_link($genre) ?>"><?php echo esc_html($genre->name); ?></a></li>
      <?php endforeach; ?>
    <?php endif ?>
  </ul>
  <p>Reading Book Level:</p>
  <ul>
    <?php $book_levels = get_the_terms(get_the_ID(), 'book-reading-level');
    if ($book_levels) : ?>
      <?php foreach ($book_levels as $book_level) : ?>
        <li><a href="<?php echo get_term_link($book_level) ?>"><?php echo esc_html($book_level->name); ?></a></li>
      <?php endforeach; ?>
    <?php else : ?>
      <li>No Genre assigned</li>
    <?php endif; ?>
  </ul>

  <div class="book-content">
    <p><strong>Info:</strong></p>
    <?php the_content(); ?>
  </div>
</div>