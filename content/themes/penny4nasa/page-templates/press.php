<?php
/**
 * Template Name: Press Page
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
		<a class="button -cta press-kit" href="/images/Penny4NASA_PressKit.pdf">Download the Press Kit</a>
		<section class="press-section">
			<h2>
				Media Contact
			</h2>
			<div class="press-contact">
				<img class="press-contact--image" src="https://s3.amazonaws.com/spaceadvocates/sumedha.png" width="200" alt="Sumedha Garud" />
				<h1 class="press-contact--name">
					Sumedha Garud
				</h1>
				<p class="press-contact--title">
					Director of Public and Media Relations
				</p>
				<p class="press-contact--email">
					sumedha@spaceadvocates.com
				</p>
				<p class="press-contact--phone">
					424.236.2787
				</p>
			</div>
		</section>
		<section class="press-section">
			<h2>
				Penny4NASA Logos
			</h2>
			<div class="press-logos">
				<a href="https://s3.amazonaws.com/spaceadvocates/icon-2048.png">
					<img src="https://s3.amazonaws.com/spaceadvocates/icon-2048.png" width="200" alt="Logo x2048" />
				</a>
				<a href="https://s3.amazonaws.com/spaceadvocates/icon-1024.png">
					<img src="https://s3.amazonaws.com/spaceadvocates/icon-1024.png" width="100" alt="Logo x1024" />
				</a>
				<a href="https://s3.amazonaws.com/spaceadvocates/icon-512.png">
					<img src="https://s3.amazonaws.com/spaceadvocates/icon-512.png" width="50" alt="Logo x512" />
				</a>
			</div>
		</section>
		<?php
			// Start the Loop.
			while ( have_posts() ) : the_post();

				// Include the page content template.
				get_template_part( 'content', 'notice' );

			endwhile;
		?>
	</div>
	<?php get_sidebar(); ?>
<?php
get_footer();
