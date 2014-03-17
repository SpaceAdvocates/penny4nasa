<?php
/**
 * Template Name: Missions Page
 *
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
 */

get_header(); ?>

<div class="container">
	<?php get_sidebar(); ?>
	<div class="content">
		<h1 class="page-header">
			<?php the_title(); ?>
		</h1>
		<?php
			// Start the Loop.
			while ( have_posts() ) : the_post();

				// Include the page content template.
				get_template_part( 'content', 'notice' );

			endwhile;
		?>
	</div>
<?php
get_footer();
