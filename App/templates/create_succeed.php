<?php ob_start(); ?>
		<section>
			<header>
				<h2>Create a question</h2>
			</header>
			<div>
				<p>Congrats, your question has been successfully created!<p/>
			</div>
		</section>
<?php $main = ob_get_clean(); ?>
 
<?php require ($_SERVER['DOCUMENT_ROOT'] . '/templates/base.php'); ?>