<html>
	<head>
		<title>Colin Furze Music</title>
		{foreach $_css as $css}
			<link rel="stylesheet" href="{if filter_var($css, FILTER_VALIDATE_URL)}{$css}{else}{'/css/'|cat:$css|autoversion}{/if}" />
		{/foreach}
		<link rel="canonical" href="https://www.colinfurzemusic.com" />
		<meta name="description" content="A complete list of all the music used in Colin Furze's videos" />
	</head>
	<body>
		{include file=$_content}
		{* one ad at the very bottom *}
		<ins class="adsbygoogle" style="display:block" data-ad-client="{$smarty.const.GOOGLE_ADS_CLIENT_ID}" data-ad-slot="5776647693" data-ad-format="auto" data-full-width-responsive="true"></ins>
		<script>{strip}
			{if !empty($smarty.const.GA_MEASUREMENT_ID)}
				var GA_MEASUREMENT_ID = '{$smarty.const.GA_MEASUREMENT_ID}';
			{/if}
		{/strip}</script>
		{foreach from=$_js item='js'}
			<script src="{if filter_var($js, FILTER_VALIDATE_URL)}{$js}{else}{'/js/'|cat:$js|autoversion}{/if}"></script>
		{/foreach}
	</body>
</html>