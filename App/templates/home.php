<?php ob_start() ?>
		<section>
			<header>
				<h2>Last added questions</h2>
			</header>
			<article>
				<h3>Would you like to stop sharing your private data?</h3>
				<span>Available</span> <span>from 10 Aug 2014</span> <progress title="70% of time completed" value="70" max="100"></progress> <span>to 14 Aug 2014</span>
				<p>Total votes: 190235 (Last vote on 10 Aug 2014 at 14:17)</p>
				<div>
					<p>
						<span>A</span>: <span>Yes</span>
						<meter value="0.7" min="0" max="1" title="70%"></meter>
					</p>
				</div>
				<div>
					<p>
						<span>B</span>: <span>No</span>
						<meter value="0.3" min="0" max="1" title="30%"></meter>
					</p>
				</div>
			</article>
		</section>
<?php $main = ob_get_clean() ?>
 
<?php include 'base.php' ?>