<?php
/**
 * Template Name: Take Action Page
 *
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
 */

get_header(); ?>

<div class="container">
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
		<iframe src="https://www.popvox.com/services/widgets/w/account/9OYZIG77VRSYFRYS/writecongress?iframe=1&amp;ocp=3939&amp;franking=false&amp;sbg=073F6D&amp;sbg2=54B3E1&amp;sfg=ffffff&amp;lnk=073F6D&amp;bg=F1F1F1&amp;fg=404045&amp;fg2=555555" height="700" width="460" frameborder="0"></iframe>
		<p>Look at all of the people who have already sent a letter!</p>
		<iframe src="https://www.popvox.com/widgets/minimap?&amp;bill=113/x35&amp;stats=1&amp;title=1&amp;sbg=3B5998&amp;sbg2=ededed&amp;sfg=ffffff&amp;lnk=3B5998&amp;bg=ffffff&amp;fg=000000&amp;fg2=333333" height="740" width="280" frameborder="0" marginwidth="0" marginheight="0" scrolling="no"></iframe>
		<iframe src="https://www.popvox.com/services/widgets/w/account/9OYZIG77VRSYFRYS/commentstream?iframe=1&amp;bills=us/113/x35&amp;sbg=b36015&amp;sbg2=e7e4dd&amp;sfg=ffffff&amp;lnk=cc6a11&amp;bg=fafafa&amp;fg=404045&amp;fg2=555555" height="740" width="280" frameborder="0"></iframe>
	</div>
	<?php get_sidebar(); ?>
<?php
get_footer();
