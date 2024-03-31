<h1>Episodes to be processed</h1>
{if $episodesToProcess|count}
	<ul>
		{foreach from=$episodesToProcess item='ep'}
			<li>{$ep->getTitle()}</li>
		{/foreach}
	</ul>
	<br />
	<a href="parse-songs" />Process</a>
{else}
	No episodes to process
{/if}