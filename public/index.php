<?php
	date_default_timezone_set('EST');

	if (in_array($_SERVER['SERVER_NAME'], ['0.0.0.0', 'localhost', '127.0.0.1'])) {
		$mode = 'development';
	} else {
		$mode = 'production';
	}

	$page = basename($_SERVER['REQUEST_URI']) ?: 'products';
	$file = '../pages/' . $page . '.php';

	if (!file_exists($file)) {
		$page = 404;
		$file = '../pages/404.php';
		http_response_code(404);
	}
?>
<!doctype html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<meta name="viewport" content="width=800, initial-scale=1.0">

		<title>Chameleoid</title>

		<style>html, body { background: #2e3436 }</style>
		<link rel="stylesheet" href="/css/chameleoid.css<?=$mode == 'development' ? '?' : '';?>">
		<?php if ($mode == 'development') : ?>
		<script>_pageInit=<?=date('U') + 1;?></script>
		<script async src="/js/_auto-refresh.js"></script>
		<?php endif; ?>
	</head>
	<body>
		<a href="https://plus.google.com/110540074125136627580" rel="publisher"></a>
		<div class="content-wrapper">
			<header>
				<a href="/">Chameleoid</a>
			</header>

			<div id="menu">
				<span id="chameleoid"></span>

				<a href="/"<?=$page == 'products' ? ' class="active"' : '';?>>Products</a>
				<a href="/privacy"<?=$page == 'privacy' ? ' class="active"' : '';?>>Privacy Policy</a>
				<!--<a href="/dmca"<?=$page == 'dmca' ? ' class="active"' : '';?>>DMCA</a>-->
			</div>

			<div class="content"><?php include $file;?></div>

			<footer>
				<span class="social">
					<a href="https://twitter.com/chameleoidhq/">
						<i class="fa fa-twitter-square"></i>
					</a>
					<a href="https://plus.google.com/+Chameleoid">
						<i class="fa fa-google-plus-square"></i>
					</a>
					<a href="https://www.facebook.com/Chameleoid">
						<i class="fa fa-facebook-square"></i>
					</a>
					<a href="https://github.com/chameleoid/">
						<i class="fa fa-github-square"></i>
					</a>
					<a href="https://bitbucket.org/chameleoid/">
						<i class="fa fa-bitbucket-square"></i>
					</a>
				</span>

				&copy;2009-<?=date('Y');?> <a href="/">Chameleoid</a>, All rights reserved.
			</footer>
		</div>

		<link rel="stylesheet" href="/css/fonts.css<?=$mode == 'development' ? '?' : '';?>">

		<script>
			(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
			(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
			m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
			})(window,document,'script','//www.google-analytics.com/analytics.js','ga');

			ga('create', 'UA-45173569-1', 'chameleoid.com');
			ga('send', 'pageview');
		</script>
	</body>
</html>
