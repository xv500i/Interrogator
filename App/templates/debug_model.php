<!doctype html>

<html lang="en">
<head>
	<meta charset="utf-8">

	<title>The Interrogator</title>
	<meta name="description" content="The HTML5 Herald">
	<meta name="author" content="Alex Soms Batalla">

	<link rel="stylesheet" href="css/style.css">

	<!--[if lt IE 9]>
	<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
</head>
<body>
	<header>
		<h1>Debug form</h1>
	</header>
	<nav>
		<a href="#">Create a question</a> |
		<a href="#">Last added questions</a> |
		<a href="#">Available questions</a> |
		<a href="#">Finished questions</a> |
		<a href="#">Most popular questions</a>
	</nav>
	<div>
		<form action="/" method="GET">
			<label for="search-input">Search for a question</label>
			<input required="required" maxlength="50" type="text" id="search-input" name="search-input" title="Input some question's keyword" placeholder="Some keyword"/>
			<input type="submit" value="Search" />
		</form>
	</div>
	<main>
		<?php
			if(isset($models)) {
				foreach($models as $model);
				var_dump($model);
			} else {
				echo "Nothing in models";
			}
		?>
	</main>
	<footer>
		<p>2014&copy; - Alex Soms Batalla</p>
		<p>
			<a href="/">
				<img style="border:0;width:88px;height:31px"
					src="http://jigsaw.w3.org/css-validator/images/vcss"
					alt="¡CSS Válido!" />
			</a>
		</p>
	</footer>
</body>
</html>