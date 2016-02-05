<?php
// Template Name: Web Design Packages
    get_header();
?>

<?php
  $basic_features_column_1   = get_field('basic_features_column_1');
  $basic_features_column_2   = get_field('basic_features_column_2');
  $standard_menu      = get_field('standard_menu');
  $premium_menu      = get_field('premium_menu');
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

        <?php if(!empty($basic_features_column_1)) : ?>
          <div class="row basic-features" id="basic-features" data-scrollreveal="enter left after 0.15s over 1s">
            <h3>Basic Features</h3>
             <div class="col-md-6 basic-feat-1">
              <?php echo $basic_features_column_1; ?>
            </div><!-- /.col-md-6 .basic-feat-1 -->
            <div class="col-md-6">
              <?php echo $basic_features_column_2; ?>
            </div><!-- /.col-md-6 -->
          </div><!-- /.row .basic-features -->
        <?php endif; ?>

        <div class="row row-eq-height">

          <!-- PACKAGE PRICING -->
          <!-- Use Custom Post Type Design Packages for the following loop -->
          <?php $loop = new WP_Query( array('post_type' => 'design_package', 'order_by' => 'post_id', 'order' => 'ASC') ); ?>

          <?php while($loop->have_posts()) : $loop->the_post(); ?>

            <?php
              $package_price   = get_field('price');
              $package_subtitle = get_field('package_subtitle')
            ?>

            <div class="col-lg-4 col-sm-4 design-package-box" data-scrollreveal="enter left after 0.15s over 1s">

              <!-- PACKAGE HEADING -->
              <div class="package-title">
                <h3><?php the_title(); ?></h3>
                <?php if(!empty($package_subtitle)) : ?>
                  <h4><?php echo $package_subtitle ?></h4>
                <?php endif; ?>
              </div><!-- /.package-title -->
              <!-- <h3 class="package-title"><?php the_title(); ?></h3>
              <h4>

              </h4> -->
              <h3 class="package-price">$<?php echo $package_price; ?></h3>
              <div class="package-content">
                <?php the_content(); ?>
              </div>

            </div><!-- focus-box -->

          <?php endwhile; wp_reset_query();?>
        </div><!-- /.row -->

      <div class="row row-eq-height design-menu-wrap">

        <?php if(!empty($standard_menu)) : ?>
          <div class="col-md-6 design-menus" id="standard-menu" data-scrollreveal="enter left after 0.15s over 1s">
            <h3>Standard Menu</h3>
            <?php echo $standard_menu ?>
          </div><!-- /.col-md-6 -->
        <?php endif; ?>

        <?php if(!empty($premium_menu)) : ?>
          <div class="col-md-6 design-menus" id="premium-menu" data-scrollreveal="enter left after 0.15s over 1s">
            <h3>Premium Menu</h3>
            <?php echo $premium_menu ?>
          </div><!-- /.col-md-6 -->
        <?php endif; ?>

      </div><!-- /.row row-eq-height -->

      </div><!-- container -->
    </section><!-- /.packages #packages-->
  </div><!-- content -->

<?php get_footer(); ?>
