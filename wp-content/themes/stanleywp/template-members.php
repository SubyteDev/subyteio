<?php
/**
 Template Name: Members
 *
 *
 * @file           template-members.php
 * @package        StanleyWP-custom
 * @author         muvaffak onus
 * @copyright      2016
 * @license        license.txt
 * @version        Release: 3.0.3
 * @since          available since Release 1.0
 */
 ?>
 <?php get_header(); ?>

 <div class="container pt">
	<div class="row mt">
    <div class="col-lg-6 col-lg-offset-3 centered">
      <h3>MEMBERS</h3>
      <hr>


      <?php if (have_posts()) : ?>

      <?php while (have_posts()) : the_post(); ?>
      <?php the_content(); ?>
      <?php endwhile; ?> 
    <?php endif; ?> 

    </div>
  </div>
  

  <?php
  $loop = new WP_Query(array('post_type' => 'subyte_members', 'posts_per_page' => -1));
  $count =0;
  ?>


  <div class="row mt centered">

    <?php if ( $loop ) : 
    while ( $loop->have_posts() ) : $loop->the_post(); ?>

    <div class="col-lg-3">
     <?php if ( has_post_thumbnail()) : ?>
     <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" >
      <div class="profile-image">
      <?php the_post_thumbnail('profile-image'); ?>
</div>
    </a>
  <?php endif; ?>
<h4><?php the_title(); ?></h4>
<h5 class="member-position"><i><?php echo get_post_meta(get_the_ID(), 'position', true); ?></i></h5>
<div class="member-contact-info">
<?php echo get_post_meta(get_the_ID(), 'contact-links-html', true); ?>
</div> 
</div> <!-- /col -->


<?php endwhile; else: ?>
</div>


<div class="error-not-found">Sorry, no portfolio entries for while.</div>

<?php endif; ?>



</div><!-- end of container -->


<?php get_footer(); ?>