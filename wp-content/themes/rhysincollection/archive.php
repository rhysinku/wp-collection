<?php get_header(); ?>
  <article class="container content px-3 py-5 p-md-5">
      <?php if (have_posts()) : ?>
        <?php while (have_posts()) : the_post(); ?>
          <?php
          $single_page = [
            'movie' => 'movie',
          ];

          if (array_key_exists(get_post_type(), $single_page)) {
            get_template_part('template-parts/content', $single_page[get_post_type()] . '-archive');
          } else {
            get_template_part('template-parts/content', 'archive');
          }
          ?>

        <?php endwhile; ?>
      <?php else : ?>
        <p>No Post found.</p>
      <?php endif; ?>
  </article>
<?php get_footer() ?>