<?php ob_start(); ?>
		<section>
			<header>
				<h2>Create a question</h2>
			</header>
			<div>
				<form action="/index.php/submitQuestion?action=createQuestion" method="POST">
					<fieldset>
						<legend>Question</legend>
						<label for="question[desc]">Description</label>
						<textarea required="required" autofocus="autofocus" rows="4" cols="50" name="question[desc]" placeholder="The question itself"><?php echo $question->description; ?></textarea>
						<label for="question[initial_date]">Initial date</label>
						<input required="required" name="question[initial_date]" type="date" placeholder="dd/mm/yyyy hh:mm" title="The question cannot be answered before this date" value="<?php echo $question->initial_date; ?>"/>
						<label for="question[end_date]">End date</label>
						<input required="required" name="question[end_date]" type="date" placeholder="dd/mm/yyyy hh:mm" title="The question cannot be answered after this date" value="<?php echo $question->ending_date; ?>"/>
					</fieldset>
					<fieldset id="answers">
						<legend>Answers</legend>
						<input type="hidden" name="num_answers" id="num_answers" value="<?php echo (sizeof($question->answers)); ?>"/>
						<?php foreach ($question->answers as $key => $answer): ?>
						<fieldset id="answer-<?php echo $key; ?>">
							<legend>Answer <?php echo ($key+1); ?></legend>
							<label for="answers[<?php echo $key; ?>][name]">Name</label>
							<input value="<?php echo $answer->name; ?>" required name="answers[<?php echo $key; ?>][name]" size="3" maxlength="3" type="text" placeholder="a" title="Your custom enumeration"/>
							<label for="answers[<?php echo $key; ?>][desc]">Description</label>
							<textarea required rows="4" cols="50" name="answers[<?php echo $key; ?>][desc]" placeholder="The answer's description"><?php echo $answer->description; ?></textarea>
							<?php if ($key >= 2): ?>
							<button type="button" onclick="javascript:removeQ(<?php echo $key ?>);" >Delete this answer</button>
							<?php endif; ?>
						</fieldset>
						<?php endforeach; ?>
						<button type="button" onclick="javascript:addQ();">Add another answer</button>
					</fieldset>
					<input type="submit" value="Create question" />
				</form>
			</div>
		</section>
<?php $main = ob_get_clean(); ?>
 
<?php require ($_SERVER['DOCUMENT_ROOT'] . '/templates/base.php'); ?>