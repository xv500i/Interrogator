<?php ob_start() ?>
		<section>
			<header>
				<h2>Create a question</h2>
			</header>
			<div>
				<form action="debug_form.php" method="POST">
					<fieldset>
						<legend>Question</legend>
						<label for="question[desc]" >Description</label>
						<textarea required="required" autofocus="autofocus" rows="4" cols="50" name="question_desc" placeholder="The question itself"></textarea>
						<label for="question[initial_date]">Initial date</label>
						<input required="required" name="question[initial_date]" type="date" placeholder="dd/mm/yyyy hh:mm" title="The question cannot be answered before this date"/>
						<label for="question[end_date]">End date</label>
						<input required="required" name="question[end_date]" type="date" placeholder="dd/mm/yyyy hh:mm" title="The question cannot be answered after this date"/>
					</fieldset>
					<fieldset>
						<legend>Answers</legend>
						<input type="hidden" name="num_answers" id="num_answers" value="3"/>
						
						<fieldset>
							<legend>Answer 1</legend>
							<label for="answers[0][name]">Name</label>
							<input value="a" required="required" name="answers[0][name]" size="3" maxlength="3" type="date" placeholder="a" title="Your custom enumeration"/>
							<label for="answers[0][desc]">Description</label>
							<textarea rows="4" cols="50" name="answers[0][desc]" placeholder="The answer's description"></textarea>
						</fieldset>
						
						<fieldset>
							<legend>Answer 2</legend>
							<label for="answers[1][name]">Name</label>
							<input value="b" required="required" name="answers[1][name]" size="3" maxlength="3" type="date" placeholder="b" title="Your custom enumeration"/>
							<label for="answers[1][desc]">Description</label>
							<textarea rows="4" cols="50" name="answers[1][desc]" placeholder="The answer's description"></textarea>
						</fieldset>
						
						<fieldset>
							<legend>Answer 3</legend>
							<label for="answers[2][name]">Name</label>
							<input value="c" required="required" name="answers[2][name]" size="3" maxlength="3" type="date" placeholder="c" title="Your custom enumeration"/>
							<label for="answers[2][desc]">Description</label>
							<textarea rows="4" cols="50" name="answers[2][desc]" placeholder="The answer's description"></textarea>
							<button>Delete this answer</button>
						</fieldset>
						<button>Add another answer</button>
					</fieldset>
					<input type="submit" value="Create question" />
				</form>
			</div>
		</section>
<?php $main = ob_get_clean() ?>
 
<?php include 'base.php' ?>