<?php
/*
Template Name: About Page
*/
	function sortPositions($a, $b) {
		$positionA = esc_attr( get_the_author_meta( 'position', $a->ID ) );
		$positionB = esc_attr( get_the_author_meta( 'position', $b->ID ) );

		$priorities = array(
			'Executive',
			'Founder',
			'Assistant Director',
			'Senior',
			'Lead Web',
			'Lead'
		);

		// Check for priorities first
		foreach($priorities as $priority) {
			if(strpos($positionA, $priority) !== false) return -1;
			if(strpos($positionB, $priority) !== false) return 1;
		}

		if ($positionA == $positionB) return 0;
	    return ($positionA < $positionB) ? -1 : 1;
	}

	$ranks = $wpdb->get_col("SELECT meta_value FROM $wpdb->usermeta WHERE meta_key = 'rank' GROUP BY meta_value ORDER BY umeta_id" );
	sort ( $ranks );

	foreach( $ranks as $rank ) {
		$sectionOutput = array();

		$people = get_users(array(
			'meta_key' => 'rank',
			'meta_value' => $rank
		));

		usort($people, 'sortPositions');

		$sectionOutput['title'] = ucwords(str_replace('_',' ',$rank));
		if($rank == 'director') $sectionOutput['title'] .= 's';

		$count = 0;
		foreach( $people as $person ) {
			$count++;

			$user_info = get_userdata( $person->ID );

			$sectionOutput['people'][] = array(
				'name' => $person->data->display_name,
				'position' => esc_attr( get_the_author_meta( 'position', $person->ID ) ),
				'url' => esc_attr( get_the_author_meta( 'url', $person->ID ) ),
				'bio' => $user_info->user_description,
				'avatar' => get_avatar( $person->ID, 150 )
			);
		}

		$output[] = $sectionOutput;
		unset($output[0]); // quick fix hack to remove a stubborn array bug - appropriate fix should be made
	}
?>

<?php get_header(); ?>

<div class="container">
	<?php while(have_posts()): the_post(); the_content(); endwhile; ?>
	<h2>The Crew</h2>

	<?php foreach( $output as $section ) : ?>
		<section>
			<h3 class="section-title"><?= $section['title']; ?></h3>
			<?php foreach( $section['people'] as $person ) : ?>
				<div class="person">
					<?= $person['avatar']; ?>
					<h4 class="name">
						<?php if($person['url']): ?>
							<a href="<?= $person['url']; ?>"><?= $person['name']; ?></a>
						<?php else: ?>
							<?= $person['name']; ?>
						<?php endif; ?>
					</h4>
					<h5 class="position"><?= $person['position']; ?></h5>
					<!-- <div class="bio"><?= $person['bio']; ?></div> -->
				</div>
			<?php endforeach; ?>
		</section>
	<?php endforeach; ?>
</div>

<?php get_footer(); ?>