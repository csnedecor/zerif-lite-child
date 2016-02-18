<?php
// Template Name: Website Maintenance Packages
    get_header();
?>

<?php
  $first_cta        = get_field('first_cta');
  $first_cta_button_text  = get_field('first_cta_button_text');
  $second_cta     = get_field('second_cta');
  $second_cta_button_text = get_field('second_cta_button_text');
  $contact_form     = get_field('contact_form');
?>

  <!-- MAIN CONTENT
================================================== -->

<div id="content" class="site-content">
  <section class="maintenance-packages" id="maintenance-packages">
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
    </div><!-- /.container -->

      <!-- ================================================= -->
      <!-- FIRST CALL TO ACTION BUTTON -->
      <!-- ================================================= -->

      <section class="purchase-now" id="ribbon-right">
        <div class="container">
          <div class="row">
            <div class="col-md-9" data-scrollreveal="enter left after 0s over 1s">
              <h3 class="white-text">
                <?php echo $first_cta ?>
              </h3><!-- /.white-text -->
            </div><!-- /.col-md-9 -->
            <div class="col-md-3" data-scrollreveal="enter right after 0s over 1s">
              <a class="btn btn-primary custom-button red-btn" data-toggle="modal" data-target="#requestQuote"><?php echo $first_cta_button_text ?></a>
            </div><!-- /.col-md-3 -->
          </div><!-- /.row -->
        </div><!-- /.container -->
      </section><!-- /#ribbon-right.purchase-now -->

      <!-- ================================================== -->
      <!-- CONTACT FORM MODAL -->
      <!-- ================================================== -->

      <div id="requestQuote" class="modal fade" tabindex="-1">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <p>
                <button class="close" type="button" data-dismiss="modal">×</button>
              </p>
              <h4 id="request-quote" class="modal-title"><?php echo $second_cta_button_text ?></h4>
            </div>
            <div class="modal-body">
              <div class="request-quote">
                <?php echo $contact_form ?>
              </div>
            </div>
            <div class="modal-footer">
              <button class="btn btn-default" type="button" data-dismiss="modal">Close</button>
            </div>
          </div>
        </div>
      </div>

      <!-- ================================================= -->
      <!-- PACKAGES -->
      <!-- ================================================= -->

    <div class="container">
      <div class="row row-eq-height maintenance-box">
        <!-- Use Custom Post Type Design Packages for the following loop -->
        <?php $loop = new WP_Query( array('post_type' => 'maintenance_package', 'order_by' => 'post_id', 'order' => 'ASC') ); ?>

        <?php while($loop->have_posts()) : $loop->the_post(); ?>

          <?php
            $package_price   = get_field('package_price');
            $package_subtitle = get_field('package_subtitle');
          ?>

          <div class="col-lg-4 col-sm-4 design-package-box" data-scrollreveal="enter bottom after 0.15s over 1s">

            <div class="package-title">
              <h3><?php the_title(); ?></h3>

              <?php if(!empty($package_subtitle)) : ?>
                <h4><?php echo $package_subtitle ?></h4>
              <?php endif; ?>
            </div><!-- /.package-title -->

            <h3 class="package-price"><?php echo $package_price; ?></h3>
            <div class="package-content">
              <?php the_content(); ?>
            </div><!-- /.package-content -->

          </div><!-- design-package-box -->

        <?php endwhile; wp_reset_query();?>
      </div><!-- /.row -->
    </div><!-- /.container -->
  </section><!-- /#maintenance-packages.maintenance-packages -->

  <!-- =================================================== -->
  <!-- SECOND CALL TO ACTION BUTTON -->
  <!-- =================================================== -->

  <section id="ribbon-bottom" class="separator-one">
    <div class="color-overlay">
      <h3 class="container text" data-scrollreveal="enter left after 0s over 1s">
        <?php echo $second_cta ?>
      </h3>
      <div data-scrollreveal="enter right after 0s over 1s">
        <a class="btn btn-primary custom-button green-btn" data-toggle="modal" data-target="#requestQuote">
          <?php echo $second_cta_button_text ?>
        </a>
      </div>
    </div>
  </section>

<?php get_footer(); ?>
