<?php
/**
 * Author Template
 *
   Template Name: Author
 *
 * @file           author.php
 * @package        StanleyWP 
 * @author         Brad Williams & Carlos Alvarez 
 * @copyright      2011 - 2014 Gents Themes
 * @license        license.txt
 * @version        Release: 3.0.3
 * @link           http://codex.wordpress.org/Templates
 * @since          available since Release 1.0
 */
   ?>
   <?php get_header(); ?>

  <!-- User Profile Section -->
  <div class="container pt">
    <div class="row mt">
     <div class="col-lg-6 col-lg-offset-3 centered">
	<div class="profile-image">
      <?php mt_profile_img( get_the_author_meta( 'ID' )); ?>
</div>
      <h3><?php the_author_meta( 'display_name' ); ?></h3>
<h5 class="member-position"><i><?php echo cimy_uef_sanitize_content(get_cimyFieldValue(get_the_author_meta( 'ID' ), 'position')); ?></i></h5>
	<div class="member-contact-info">
	<?php 
		$linkedin= get_cimyFieldValue(get_the_author_meta( 'ID' ), 'linkedin');
		$twitter= get_cimyFieldValue(get_the_author_meta( 'ID' ), 'twitter');
		$github= get_cimyFieldValue(get_the_author_meta( 'ID' ), 'github');
		$instagram= get_cimyFieldValue(get_the_author_meta( 'ID' ), 'instagram');
		
		echo "<a target=\"_blank\" href=\"mailto:" . get_the_author_meta( 'email' ) . "\"><i class=\"fa fa-envelope fa-fw fa-lg\"></i></a>";
		if ($linkedin != NULL)
			echo "<a target=\"_blank\" href=\"" . cimy_uef_sanitize_content($linkedin) . "\"><i class=\"fa fa-linkedin fa-fw fa-lg\"></i></a>";
		if ($instagram != NULL)
			echo "<a target=\"_blank\" href=\"" . cimy_uef_sanitize_content($instagram) . "\"><i class=\"fa fa-instagram fa-fw fa-lg\"></i></a>";
		if ($twitter != NULL)
			echo "<a target=\"_blank\" href=\"" . cimy_uef_sanitize_content($twitter) . "\"><i class=\"fa fa-twitter fa-fw fa-lg\"></i></a>";
		if ($github != NULL)
			echo "<a target=\"_blank\" href=\"" . cimy_uef_sanitize_content($github) . "\"><i class=\"fa fa-github fa-fw fa-lg\"></i></a>";
	?>
		
	</div> 
    </div>
  </div><!-- row -->

  
</div><!-- container -->
<!-- End User Profile Section-->

<!-- Projects Section-->
<div class="container pt" id="grey">
	<div class="row mt">
    <div class="col-lg-6 col-lg-offset-3 centered">
      <h3>PROJECTS</h3>
      <hr>


    </div>
  </div>
  

  <?php
  $loop = new WP_Query(array('post_type' => 'portfolio', 'posts_per_page' => -1, 'author_name' => get_the_author_meta( 'nickname' )));
  $count =0;
  ?>


  <div class="row mt centered">

    <?php if ( $loop ) : 
    while ( $loop->have_posts() ) : $loop->the_post(); ?>

    <div class="col-lg-4">
     <?php if ( has_post_thumbnail()) : ?>
     <a class="zoom green" href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" >
      <?php the_post_thumbnail('project-image'); ?>
    </a>
  <?php endif; ?>
  
  <?php if(bi_get_data('project_title', '1')) {?>
  <p><?php the_title(); ?></p>
  <?php } ?>
</div> <!-- /col -->


<?php endwhile; else: ?>
</div>


<div class="error-not-found">Sorry, no portfolio entries for while.</div>

<?php endif; ?>



</div><!-- end of container -->

   <?php get_footer(); ?>