			</main> <!-- .main -->
		</div> <!-- .wrapper -->

		<footer class="site-footer" role="contentinfo">
			<div class="content">
				<div class="container">
					<div class="site-footer--column">
						<h2>About</h2>
						<ul class="site-footer--links">
							<li class="site-footer--link">
								<a href="/about">About</a>
							</li>
							<li class="site-footer--link">
								<a href="/partners">Partners</a>
							</li>
							<li class="site-footer--link">
								<a href="/contact">Contact</a>
							</li>
						</ul>
					</div>
					<div class="site-footer--column">
						<h2>Resources</h2>
						<ul class="site-footer--links">
							<li class="site-footer--link">
								<a href="/faq">FAQ</a>
							</li>
							<li class="site-footer--link">
								<a href="/press">Press Room</a>
							</li>
							<li class="site-footer--link">
								<a href="/privacy-policy">Privacy Policy</a>
							</li>
						</ul>
					</div>
					<div class="site-footer--follow">
						<h2>Follow Us</h2>
						<ul class="follow-links">
							<li class="follow-link facebook">
								<a href="//www.facebook.com/PennyForNASA"></a>
							</li>
							<li class="follow-link twitter">
								<a href="//twitter.com/Penny4NASA1"></a>
							</li>
							<li class="follow-link google-plus">
								<a href="//plus.google.com/104209973472169534234/posts"></a>
							</li>
							<li class="follow-link youtube">
								<a href="//www.youtube.com/Penny4NASA"></a>
							</li>
							<li class="follow-link github">
								<a href="//github.com/SpaceAdvocates"></a>
							</li>
							<li class="follow-link rss">
								<a href="/feed"></a>
							</li>
						</ul>
					</div>
					<?php get_search_form(); ?>
					<a class="cta-link button -cta" href="/take-action">
						Take Action
					</a>
					<p class="copyright">
						&copy; 2014 Space Advocates. All rights reserved.
						<a class="contribute" href="//github.com/SpaceAdvocates">Contribute to Space Advocates Engineering!</a>
					</p>
				</div>
			</div>
		</footer>

		<?php wp_footer(); ?>

		<!-- Google Analytics: change UA-XXXXX-X to be your site's ID. -->
		<script>
			(function(b,o,i,l,e,r){b.GoogleAnalyticsObject=l;b[l]||(b[l]=
			function(){(b[l].q=b[l].q||[]).push(arguments)});b[l].l=+new Date;
			e=o.createElement(i);r=o.getElementsByTagName(i)[0];
			e.src='//www.google-analytics.com/analytics.js';
			r.parentNode.insertBefore(e,r)}(window,document,'script','ga'));
			ga('create','UA-XXXXX-X');ga('send','pageview');
		</script>

		<script src="/wp-content/themes/penny4nasa/bower_components/jquery/jquery.min.js"></script>

		<script src="http://d3js.org/d3.v3.js"></script>
		<script>
			(function ($) {
				$('.graph-budget').each(function () {
					var svg = d3.select('.graph-budget'),
						margin = {top: 20, right: 20, bottom: 30, left: 50},
						width = svg[0][0].clientWidth - margin.left - margin.right,
						height = svg[0][0].clientHeight - margin.top - margin.bottom,
						parseDate = d3.time.format('%Y').parse,
						x = d3.time.scale().range([0, width]),
						y = d3.scale.linear().range([height, 0]);

					svg = svg.attr("width", window.innerWidth).attr("height",window.innerHeight).append('g')
						.attr('class', 'graph');

					var xAxis = d3.svg.axis().scale(x).orient('bottom'),
						yAxis = d3.svg.axis().scale(y).orient('left');

					var line = d3.svg.line()
						.x(function(d) { return x(d.date); })
						.y(function(d) { return y(d.amount); });

					d3.tsv('<?php echo get_template_directory_uri(); ?>/inc/budget-data.tsv', function (error, data) {
						data.forEach(function (d) {
							d.date = parseDate(d.date);
							d.amount = parseFloat(d.amount);
						});

						x.domain(d3.extent(data, function (d) { return d.date; }));
						y.domain(d3.extent(data, function (d) { return d.amount; }));

						svg.append('g')
							.attr('class', 'x axis')
							.call(xAxis);

						svg.append('g')
							.attr('class', 'y axis')
							.call(yAxis)
							.append('text')
								.attr('class', 'y label')
								.attr('y', 6)
								.attr('dy', '.75em')
								.text('Percentage (%) of the US Federal Budget');

						svg.append('path')
							.datum(data)
							.attr('class', 'line')
							.attr('d', line);

						svg.append('line')
							.attr('class', 'goal')
							.attr('x1', 0)
							.attr('x2', width)
							.attr('y1', y(1))
							.attr('y2', y(1));
					});
				});
			})(jQuery);
		</script>
	</body>
</html>
