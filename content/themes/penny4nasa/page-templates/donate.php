<?php
/**
 * Template Name: Donate Page
 *
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
 */

get_header(); ?>

<div class="container">
	<?php get_sidebar(); ?>
	<div class="content">
		<h1>
			<?php the_title(); ?>
		</h1>
		<div class="donate-method">
			<h2 class="donate-method--title">via Paypal</h2>
			<div class="paypal-method">
				<h3>Once</h3>
				<form action="https://www.paypal.com/cgi-bin/webscr" method="post">
					<input type="hidden" name="cmd" value="_s-xclick" />
					<input type="hidden" name="hosted_button_id" value="FZ9RY42U8D4A2" />
					<input type="image" alt="PayPal - The safer, easier way to pay online!" name="submit" src="https://www.paypalobjects.com/en_US/i/btn/btn_donateCC_LG.gif" />
					<img alt="" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" width="0" height="0" border="0" />
				</form>
			</div>
			<div class="paypal-method">
				<h3>Recurring Donations</h3>
				<form action="https://www.paypal.com/cgi-bin/webscr" method="post">
					<select name="os0">
						<option value="$1 Monthly">$1.00 USD - Monthly</option>
						<option value="$5 Monthly">$5.00 USD - Monthly</option>
						<option value="$20 Monthly">$20.00 USD - Monthly</option>
						<option value="$30 Monthly">$30.00 USD - Monthly</option>
						<option value="$50 Monthly">$50.00 USD - Monthly</option>
						<option value="$100 Monthly">$100.00 USD - Monthly</option>
					</select>
					<input type="hidden" name="cmd" value="_s-xclick" />
					<input type="image" alt="PayPal - The safer, easier way to pay online!" name="submit" src="https://www.paypalobjects.com/en_US/i/btn/btn_donateCC_LG.gif" />
					<img alt="" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" width="0" height="0" border="0" />
					<input type="hidden" name="hosted_button_id" value="FCDZZFAR57F4N" />
					<input type="hidden" name="currency_code" value="USD" />
					<input type="hidden" name="on0" value="" />
				</form>
			</div>
		</div>
		<div class="donate-method">
			<h2 class="donate-method--title">via Snail Mail</h2>
			<small>
				We can also accept a check or money order made payable to <strong>Space Advocates</strong>. Please mail your donations to:
			</small>
			<p class="address--mail">
				Space Advocates<br>
				PO Box 2035<br>
				Corvallis, Oregon 97339-2035
			</p>
		</div>
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
