<?php
// Template Name: Web Design Packages
    get_header();
?>

  <!-- MAIN CONTENT
================================================== -->

  <div id="content" class="site-content">
    <section class="packages" id="packages">
      <div class="container">

        <!-- SECTION HEADER -->
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

      <div class="row row-eq-height">

        <!-- PACKAGE PRICING -->
        <!-- Use Custom Post Type Design Packages for the following loop -->
        <?php $loop = new WP_Query( array('post_type' => 'design_package', 'order_by' => 'post_id', 'order' => 'ASC') ); ?>

        <?php while($loop->have_posts()) : $loop->the_post(); ?>

          <?php
            $package_price   = get_field('price');
          ?>

          <div class="col-lg-4 col-sm-4 design-package-box" data-scrollreveal="enter left after 0.15s over 1s">

            <!-- PACKAGE HEADING -->
            <h3 class="package-title"><?php the_title(); ?></h3>
            <h3 class="package-price">$<?php echo $package_price; ?></h3>
            <div class="package-content">
              <?php the_content(); ?>
            </div>

          </div><!-- focus-box -->

        <?php endwhile; wp_reset_query();?>
      </div><!-- /.row -->

      </div><!-- container -->
    </section><!-- /.packages #packages-->
  </div><!-- content -->

<?php get_footer(); ?>
