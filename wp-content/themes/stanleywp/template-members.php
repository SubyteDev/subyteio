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
    </div>
  </div>
  

  <?php

	$wp_user_query = new WP_User_Query( array( 'role' => 'Author', 'orderby' => 'display_name', 'order' => 'ASC' ) );
	$authors = $wp_user_query->get_results();
  ?>


  <div class="row mt centered top-buffer">

<?php
if (!empty($authors)) {
    foreach ($authors as $author)
    { 
	$author_info = get_userdata($author->ID);
?>
	<!-- ONE USER -->
<div class="col-lg-3 top-buffer">

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
<?php
    }
}
?>
    


</div>



</div><!-- end of container -->


<?php get_footer(); ?>