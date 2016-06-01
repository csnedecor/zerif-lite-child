<?php
// Template Name: Print Design Portfolio
    get_header();
?>

  <!-- MAIN CONTENT
================================================== -->

<div id="content" class="site-content">
  <section class="our-team" id="team">
    <div class="container">

      <!-- ================================================= -->
      <!-- SECTION HEADER -->
      <!-- ================================================= -->

      <div class="section-header">

        <h2 class="dark-text">
          <?php the_title(); ?>
        </h2><!-- /.dark-text -->

        <div class="section-legend">
          <?php while( have_posts() ) : the_post(); ?>
            <?php the_content(); ?>
          <?php endwhile; ?>
        </div><!-- /.section-legend -->

      </div><!-- /.section-header -->

      <!-- ================================================= -->
      <!-- PORTFOLIO PIECES -->
      <!-- ================================================= -->
      <div class="row row-eq-height" data-scrollreveal="enter left after 0s over 0.1s">
        <div class="col-lg-3 col-sm-3 team-box">
        <!-- Use Custom Post Type Design Packages for the following loop -->
        <?php $loop = new WP_Query( array('post_type' => 'print_work', 'order_by' => 'post_id', 'order' => 'ASC') ); ?>

        <?php while($loop->have_posts()) : $loop->the_post(); ?>

          <?php
            $subtitle   = get_field('subtitle');
          ?>

          <div class="team-member">
            <figure class="profile-pic">
              <?php the_post_thumbnail('post-thumbnail-large'); ?>
            </figure><!-- /.profile-pic -->

            <div class="member-details">
              <h3 class="dark-text red-border-bottom">
                <?php the_title(); ?>
              </h3><!-- /.dark-text red-border-bottom -->

              <div class="position">
                <?php echo $subtitle; ?>
              </div><!-- /.position -->
            </div><!-- /.member-details -->
            <div class="details">
              <?php the_content(); ?>
            </div><!-- /.details -->
          </div><!-- /.team-member -->
          <?php endwhile; wp_reset_query();?>
        </div><!-- /.col-lg-3 col-sm-3 team-box -->

      </div><!-- /.row -->
    </div><!-- /.container -->
  </section><!-- /#design-packages.design-packages -->

<?php get_footer(); ?>
