			<article>
				<h3><?php echo $question->description; ?></h3>
				<?php 
				
				$result = 0;
				foreach($question->answers as $answer) {
					$result += $answer->votes;
				}
				?>
				<span>Available</span> <span>from <?php echo $question->initial_date; ?></span> <progress title="70% of time completed" value="70" max="100"></progress> <span>to <?php echo $question->ending_date; ?></span>
				<p>Total votes: <?php echo $result; ?> (Last vote on 10 Aug 2014 at 14:17)</p>
				<div class="answers-list">
				<?php foreach($question->answers as $answer): ?>
				
					<p>
						<span><?php echo $answer->name ?></span>: <span><?php echo $answer->description ?></span>
						<?php if ($result > 0): ?>
						<?php $pct = number_format((floatval($answer->votes)/$result), 2, '.', ''); ?>
						<meter value="<?php echo $pct ?>" min="0" max="1" title="<?php echo ($pct*100) ?>%"></meter>
						<?php endif; ?>
					</p>
				<?php endforeach; ?>
				</div>
			</article>