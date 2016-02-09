<?php
// Template Name: Web Design Packages
    get_header();
?>

<?php
  $basic_features_title     = get_field('basic_features_title');
  $basic_features_caption   = get_field('basic_features_caption');
  $basic_features_column_1   = get_field('basic_features_column_1');
  $basic_features_column_2   = get_field('basic_features_column_2');
  $menus_title            = get_field('menus_title');
  $menus_caption          =get_field('menus_caption');
  $standard_menu      = get_field('standard_menu');
  $premium_menu      = get_field('premium_menu');
  $first_cta        = get_field('first_cta');
  $first_cta_button_text  = get_field('first_cta_button_text');
  $second_cta     = get_field('second_cta');
  $second_cta_button_text = get_field('second_cta_button_text');
  $contact_form     = get_field('contact_form');
?>

  <!-- MAIN CONTENT
================================================== -->

<div id="content" class="site-content">
  <section class="design-packages" id="design-packages">
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
      <!-- PACKAGES -->
      <!-- ================================================= -->

      <div class="row row-eq-height">
        <!-- Use Custom Post Type Design Packages for the following loop -->
        <?php $loop = new WP_Query( array('post_type' => 'design_package', 'order_by' => 'post_id', 'order' => 'ASC') ); ?>

        <?php while($loop->have_posts()) : $loop->the_post(); ?>

          <?php
            $package_price   = get_field('price');
            $package_subtitle = get_field('package_subtitle');
          ?>

          <div class="col-lg-4 col-sm-4 design-package-box" data-scrollreveal="enter bottom after 0.15s over 1s">

            <div class="package-title">
              <h3><?php the_title(); ?></h3>

              <?php if(!empty($package_subtitle)) : ?>
                <h4><?php echo $package_subtitle ?></h4>
              <?php endif; ?>
            </div><!-- /.package-title -->

            <h3 class="package-price">$<?php echo $package_price; ?></h3>
            <div class="package-content">
              <ul>
                <li>
                  <a data-toggle="modal" data-target="#the-basics"><?php echo $basic_features_title ?></a> plus...
                </li>
              </ul>
              <?php the_content(); ?>
            </div><!-- /.package-content -->

          </div><!-- design-package-box -->

        <?php endwhile; wp_reset_query();?>
      </div><!-- /.row -->
    </div><!-- /.container -->
  </section><!-- /#design-packages.design-packages -->

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
          <h4 id="request-quote" class="modal-title"><?php echo $first_cta_button_text ?></h4>
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

  <!-- ============================================= -->
  <!-- BASIC FEATURES MODAL -->
  <!-- ============================================== -->

  <div class="modal fade" id="the-basics" tabindex="-1" role="dialog" aria-labelledby="the-basics">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content dark-modal">
        <button type="button" class="close white-text" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>

        <section class="basic-features">
          <div class="modal-header">
            <div class="section-header">
              <h2><?php echo $basic_features_title ?></h2>
              <div class="section-legend">
                <?php echo $basic_features_caption ?>
              </div><!-- /.section-legend -->
            </div><!-- /.section-header -->
          </div><!-- /.modal-header -->

          <div class="modal-body">
            <?php if(!empty($basic_features_column_1)) : ?>
              <div class="clearfix" id="basic-features">
                <div class="col-md-6 basic-feat-1">
                  <?php echo $basic_features_column_1; ?>
                </div><!-- /.col-md-6 .basic-feat-1 -->
                <div class="col-md-6">
                  <?php echo $basic_features_column_2; ?>
                </div><!-- /.col-md-6 -->
              </div><!-- /.row .basic-features -->
            <?php endif; ?>
          </div><!-- /.modal-body -->
        </section><!-- /#basic-features.basic-features -->

      </div><!-- /.modal-content.dark-modal -->
    </div><!-- /.modal-dialog .modal-lg -->
  </div><!-- /.modal-fade #the-basics -->

  <!-- ================================================= -->
  <!-- WEB DESIGN MENUS -->
  <!-- ================================================= -->

  <section class="design-menus" id="design-menus">
    <div class="container">

      <div class="section-header">
        <h2><?php echo $menus_title ?></h2>

        <div class="section-legend">
          <?php echo $menus_caption ?>
        </div><!-- /.section-legend -->
      </div><!-- /.section-header -->

      <div class="row row-eq-height design-menu-wrap">

        <?php if(!empty($standard_menu)) : ?>
          <div class="col-md-6 design-menu-list" id="standard-menu" data-scrollreveal="enter left after 0.15s over 1s">
            <h3 class="purple-border">Standard Menu</h3>
            <?php echo $standard_menu ?>
          </div><!-- /.col-md-6 -->
        <?php endif; ?>

        <?php if(!empty($premium_menu)) : ?>
          <div class="col-md-6 design-menu-list" id="premium-menu" data-scrollreveal="enter right after 0.15s over 1s">
            <h3 class="red-border">Premium Menu</h3>
            <?php echo $premium_menu ?>
          </div><!-- /.col-md-6 -->
        <?php endif; ?>

      </div><!-- /.row row-eq-height -->
    </div><!-- container -->
  </section><!-- /.design-menus#design-menus -->

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
