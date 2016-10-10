<?php
/**
 * Single Portfolio Template
 *
 *
 * @file           single-portfolio.php
 * @package        StanleyWP 
 * @author         Brad WIlliams 
 * @copyright      2003 - 2014 Gents Themes
 * @license        license.txt
 * @version        Release: 3.0.3
 * @link           http://codex.wordpress.org/Theme_Development#Single_Post_.28single.php.29
 * @since          available since Release 1.0
 */
?>
<?php get_header(); ?>

<div id="content-project">

 <?php if (have_posts()) : ?>

 <?php while (have_posts()) : the_post(); ?>


 <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

  <!-- Portfolio Section -->
  <div class="container pt">
    <div class="row mt">
     <div class="col-lg-6 col-lg-offset-3 centered">

      <?php if( rwmb_meta( 'wtf_portfolio_top_title' ) !== '' ) { ?>
      <?php echo rwmb_meta( 'wtf_portfolio_top_title' ); ?>
      <hr>
      <?php } ?> 

      <?php the_content(); ?>

    </div>
  </div><!-- row -->

  <div class="row mt centered">  
    <div class="col-lg-8 col-lg-offset-2">
      <?php
	$images = rwmb_meta( 'thickbox', 'type=image' );
      foreach ( $images as $image ) { 
        echo "<p><img class='img-responsive' src='{$image['full_url']}' alt='{$image['alt']}' /></p>";
      } ?>
      <?php if(rwmb_meta('wtf_port_cats') == 'value1') {?>
      <p><bt><?php _e('Type','gents'); ?>: </span><?php echo get_the_term_list( get_the_ID(), 'portfolio_cats', '',', ',' ') ?></bt></p>
       <?php } ?>
<!-- AUTHORS -->
<?php $i = new CoAuthorsIterator(); ?>
<?php while( $i->iterate() ) : ?>


<!-- ONE USER -->
<div class="col-lg-3">
<?php $author_info = get_userdata( get_the_author_meta( 'ID' ) ); ?>

     <a href="<?php echo get_author_posts_url( $author_info->ID ); ?>" title="<?php echo $author_info->display_name; ?>" >
      <div class="profile-image">
      <?php mt_profile_img( $author_info->ID ); ?>
</div>
    </a>
<h3><?php echo $author_info->display_name; ?></h3>
<h5 class="member-position"><i><?php echo cimy_uef_sanitize_content(get_cimyFieldValue($author_info->ID, 'position')); ?></i></h5>
	<div class="member-contact-info">
	<?php 
		$linkedin= get_cimyFieldValue($author_info->ID, 'linkedin');
		$twitter= get_cimyFieldValue($author_info->ID, 'twitter');
		$github= get_cimyFieldValue($author_info->ID, 'github');
		$instagram= get_cimyFieldValue($author_info->ID, 'instagram');
		
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
</div> <!-- /col -->
<!-- /ONE USER-->


<?php endwhile; ?>
<!-- AUTHORS END-->
    </div><!-- col-lg-8 -->
  </div>
</div><!-- container -->      
</article><!-- end of #post-<?php the_ID(); ?> -->


<?php endwhile; ?> 

<?php else : ?>

  <div class="container">
   <article id="post-not-found" class="hentry clearfix">
    <header>
     <h1 class="title-404"><?php _e('404 &#8212; Fancy meeting you here!', 'gents'); ?></h1>
   </header>
   <section>
     <p><?php _e('Don&#39;t panic, we&#39;ll get through this together. Let&#39;s explore our options here.', 'gents'); ?></p>
   </section>
   <footer>
     <h6><?php _e( 'You can return', 'gents' ); ?> <a href="<?php echo home_url(); ?>/" title="<?php esc_attr_e( 'Home', 'gents' ); ?>"><?php _e( '&#9166; Home', 'gents' ); ?></a> <?php _e( 'or search for the page you were looking for', 'gents' ); ?></h6>
     <?php get_search_form(); ?>
   </footer>

 </article>
</div>

<?php endif; ?>  

</div><!-- end of #content -->


<?php get_footer(); ?>