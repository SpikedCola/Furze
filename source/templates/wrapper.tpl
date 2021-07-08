{* if production, use strip to remove whitespace *}
<html>
	<head>
		<title>Colin Furze Music</title>
		{foreach $_css as $css}
			<link rel="stylesheet" href="/css/{$css}" />
		{/foreach}
		<link rel="canonical" href="https://www.colinfurzemusic.com" />
		<meta name="description" content="A complete list of all the music used in Colin Furze's videos" />
	</head>
	<body>
		{include file=$_content}
		{foreach $_js as $js}
			<script src="/js/{$js}"></script>
		{/foreach}
	</body>
</html>