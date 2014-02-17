<?php ob_start() ?>
		<section>
			<header>
				<h2><?php echo $title; ?></h2>
			</header>
			<?php foreach ($questions as $question): ?>
			<?php require($_SERVER['DOCUMENT_ROOT'] . '/templates/question_base.php'); ?>
			<?php endforeach; ?>
		</section>
<?php $main = ob_get_clean() ?>
 
<?php include 'base.php' ?>