<?php
	if (in_array($_SERVER['SERVER_NAME'], ['0.0.0.0', 'localhost', '127.0.0.1']))
		$mode = 'development';
	else
		$mode = 'production';

	$page = basename($_SERVER['REQUEST_URI']) ?: 'index';
	$file = '../html/' . $page . '.html';

	if (!file_exists($file)) {
		$page = 404;
		$file = '../html/404.html';
		http_response_code(404);
	}
?>
<!doctype html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">

		<title>Chameleoid</title>

		<style>html, body { background: #2e3436 }</style>
		<?php if ($mode == 'development') : ?>
		<script>_pageInit=<?=date('U') + 1;?></script>
		<script async src="/js/_auto-refresh.js"></script>
		<?php endif; ?>
	</head>
	<body>
		<div class="content-wrapper">
			<header>
				<a href="/">Chameleoid</a>
			</header>

			<div id="menu">
				<span id="chameleoid"></span>

				<a href="/"<?=$page == 'index' ? ' class="active"' : '';?>><span>Home</span><span></span></a>
				<a href="/privacy"<?=$page == 'privacy' ? ' class="active"' : '';?>><span>Privacy Policy</span><span></span></a>
				<!--<a href="/dmca"<?=$page == 'dmca' ? ' class="active"' : '';?>><span>DMCA</span><span></span></a>-->
			</div>

			<div class="content"><?=file_get_contents($file);?></div>

			<footer>
				&copy;2009-<?=date('Y');?> <a href="/">Chameleoid</a>, All rights reserved.
			</footer>
		</div>

		<link rel="stylesheet" href="/css/chameleoid.css<?=$mode == 'development' ? '?' : '';?>">
		<link rel="stylesheet" href="/css/fonts.css<?=$mode == 'development' ? '?' : '';?>">
	</body>
</html>
