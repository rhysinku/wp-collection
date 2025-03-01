<?php get_header();

$s = get_search_query();
$args = array(
  's' => $s
);
$search_query = new WP_Query($args);

?>
  <div class="container pt-5 pb-5">
    <h3 class="search-title">Search Result for: <strong><?php echo esc_html($s); ?></strong></h3>
    <?php get_search_form(); ?>

    <?php if ($search_query->have_posts()) : ?>
      <div class="mt-5">
        <?php while ($search_query->have_posts()) : $search_query->the_post();
          $search_data = get_post(); ?>
          <div class="card mb-3">
            <div class="card-header">
              <a
                href="<?php echo esc_url(get_post_type_archive_link(get_post_type())); ?>"><?php echo strtoupper(get_post_type()); ?></a>
            </div>
            <div class="card-body">
              <h5 class="card-title"><?php echo $search_data->post_title ?></h5>
              <p class="card-text"><?php echo $search_data->post_excerpt ?></p>
              <a href="<?php echo the_permalink(); ?>" class="btn btn-primary">Visit Page</a>
            </div>
          </div>
        <?php endwhile; ?>
      </div>
    <?php else : ?>
      <p>There is no result for <?php echo esc_html($s); ?></p>
    <?php endif; ?>
  </div>

<?php get_footer(); ?>