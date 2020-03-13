{if $ep}
	<h1>{$ep->getTitle()}</h1>
	<hr />
	{* nofilter to allow mark/html *}
	<pre>{$desc nofilter}</pre>
	<hr />
	<form method="post">
		<input type="hidden" name="id" value="{$ep->getId()}" />
		<textarea name="music" style="height: 300px; width: 500px;"></textarea>
		<button type="submit" style="vertical-align: top;">Save</button>
	</form>
{else}
	Done!
{/if}