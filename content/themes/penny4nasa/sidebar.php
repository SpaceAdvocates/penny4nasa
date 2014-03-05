<?php
/**
 * The Sidebar containing the main widget area
 *
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
 */
?>
<aside class="sidebar">
	<a class="button -cta -external" href="/take-action">Take Action</a>
	<a class="button -external" href="/donate">Donate</a>
	<a class="button -external" href="/volunteer">Volunteer</a>
	<a class="button -expand" href="javascript:void(0)">Categories</a>
	<ul class="categories">
		<?php
			$categories = get_categories();
			foreach ( $categories as $category ) {
				echo "<li class=\"category\"><a href=\"" . get_category_link( $category->term_id ) . "\">" . $category->name . "</a></li>";
			}
		?>
	</ul>
	<a class="button -expand" href="javascript:void(0)">Archives</a>
	<ul class="archives">
		<?php wp_get_archives(); ?>
	</ul>
</aside>
