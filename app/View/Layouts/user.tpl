<!DOCTYPE html>
<html lang="jp">
<head>
	{$this->Html->charset()}
	<title>{$title_for_layout}</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<meta name="author" content="">
	<!-- Le styles -->
	{$this->Html->css('bootstrap.min')}
	<style>
	body {
		padding-top: 60px; /* 60px to make the container go all the way to the bottom of the topbar */
	}
	</style>
	<!-- Placed at the end of the document so the pages load faster -->
	<script type="text/javascript" src="js/jquery-2.1.4.min.js" charset="utf-8"></script>
	{$this->Html->script('bootstrap.min')}
	{$this->Html->script('jquery.dependent-selects')}
	{$this->fetch('script')}
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.2.6/jquery.min.js"></script>
	<!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
	<!--[if lt IE 9]>
	<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->

	<!-- Le fav and touch icons -->
	<!--
	<link rel="shortcut icon" href="/ico/favicon.ico">
	<link rel="apple-touch-icon-precomposed" sizes="144x144" href="/ico/apple-touch-icon-144-precomposed.png">
	<link rel="apple-touch-icon-precomposed" sizes="114x114" href="/ico/apple-touch-icon-114-precomposed.png">
	<link rel="apple-touch-icon-precomposed" sizes="72x72" href="/ico/apple-touch-icon-72-precomposed.png">
	<link rel="apple-touch-icon-precomposed" href="/ico/apple-touch-icon-57-precomposed.png">
	-->
<link rel="stylesheet" href="css/prettyPopin.css" type="text/css" media="screen" charset="utf-8" />
<link type="text/css" href="css/shadowbox.css" rel="stylesheet" media="all" />

</head>

<body>
	<div class="navbar navbar-fixed-top">
		{$this->element('Layouts/navbar')}
	</div>
	<div class="container">
		<h1>Bootstrap starter template</h1>
		{$this->fetch('content')}
		{$this->element('sql_dump')}
	</div> <!-- /container -->

	<!-- Le javascript
    ================================================== -->
</body>
</html>
