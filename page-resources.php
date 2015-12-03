<?php
// Template Name: Resources
    get_header();
?>

  <!-- MAIN CONTENT
================================================== -->

  <div id="content" class="site-content">
    <section class="resources" id="resources">
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

        <!-- RESOURCES -->
        <!-- Use Custom Post Type resources for the following loop -->
        <?php $loop = new WP_Query( array('post_type' => 'resource', 'order_by' => 'post_id', 'order' => 'ASC') ); ?>

      <div class="row">
        <?php while($loop->have_posts()) : $loop->the_post(); ?>

          <?php
            $resource_image   = get_field('resource_image');
            $resource_url      = get_field('resource_url');
            $button_text      = get_field('button_text');
          ?>

          <div class="col-lg-4 col-sm-4 focus-box" data-scrollreveal="enter left after 0.15s over 1s">

            <div class="service-icon">
              <a href="<?php echo $resource_url; ?>"><i class="pixeden" style="background:url(<?php echo $resource_image['url']; ?>) no-repeat center; width:100%; height:100%;"></i> <!-- FOCUS ICON--></a>
            </div><!-- service-icon -->

            <!-- RESOURCE HEADING -->
            <h3 class="red-border-bottom"><?php the_title(); ?></h3>
            <p>
              <?php the_content(); ?>
            </p>

            <!-- RESOURCE BUTTON -->
            <?php if( !empty($button_text)) : ?>
              <a href="<?php echo $resource_url; ?>" class="btn btn-primary custom-btn green-btn" data-scrollreveal="enter left after 0.15s over 1s"><?php echo $button_text; ?></a>
            <?php endif; ?>

          </div><!-- focus-box -->

        <?php endwhile; wp_reset_query();?>
      </div><!-- /.row -->

      </div><!-- container -->
    </section><!-- /.resources #resources-->
  </div><!-- content -->

<?php get_footer(); ?>
