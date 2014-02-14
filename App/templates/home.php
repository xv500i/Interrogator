<?php ob_start() ?>
		<section>
			<header>
				<h2>Last added questions</h2>
			</header>
			<?php foreach ($questions as $question): ?>
			<article>
				<h3><?php echo $question->description; ?></h3>
				<span>Available</span> <span>from 10 Aug 2014</span> <progress title="70% of time completed" value="70" max="100"></progress> <span>to 14 Aug 2014</span>
				<?php if (rand(1,100) > 50):?>
				<p>Total votes: 190235 (Last vote on 10 Aug 2014 at 14:17)</p>
				<?php endif; ?>
				
				<?php $result = rand(0,100); ?>
				<div>
					<p>
						<span>A</span>: <span>Yes</span>
						<meter value="<?php echo (floatval($result/100)) ?>" min="0" max="1" title="<?php echo ($result) ?>%"></meter>
					</p>
				</div>
				<div>
					<p>
						<span>B</span>: <span>No</span>
						<meter value="<?php echo (floatval(100-$result)/100) ?>" min="0" max="1" title="<?php echo (100-$result) ?>%"></meter>
					</p>
				</div>
			</article>
			<?php endforeach; ?>
		</section>
<?php $main = ob_get_clean() ?>
 
<?php include 'base.php' ?>