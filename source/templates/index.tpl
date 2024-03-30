<h1>Colin Furze Music</h1>
<p>There's a lot of really excellent music throughout <a target="_blank" href="https://www.youtube.com/user/colinfurze">Colin Furze</a>'s videos. I decided to put it all in one place, so more people can enjoy it. Colin lists some of the music on his site, but it's a little out of date. I hope you find something that you like!</p>
<hr />
<table data-sortable class="sortable-theme-light main-table"> {* class theme name needs to match css file in wrapper *}
	<thead>
		<tr>
			<th>Video Title</th>
			<th class="nowrap" data-sorted="true" data-sorted-direction="descending">Upload Date</th>
			<th>Song</th>
			<th>Artist</th>
			<th>Track #</th>
			<th data-sortable="false">Links</th>
		</tr>
	</thead>
	<tbody>
		{foreach from=$songs item='song'}
			{$episode=$song->getEpisode()}
			<tr>
				<td><a target="_blank" href="https://youtube.com/watch?v={$episode->getId()}">{$episode->getTitle()}</a></td>
				<td>{$episode->getUploadedDatetime('Y-m-d')}</td>
				<td>{$song->getTitle()}</td>
				<td>{$song->getArtist()}</td>
				<td>{$song->getTrackNumber()}</td>
				<td>
					{foreach from=$song->getSongLinks() item='link'}
						{* note to self: make sure there is 1 image per title entry in the db *}
						{assign var='title' value=$link->getTitle()}
						{* a few overrides.. ublock will block youtube.png facebook.png etc. need to hide it a bit *}
						{assign var='image' value=$title|strtolower}
						{if 'youtube' == $image}
							{assign var='image' value='yt'}
						{elseif 'facebook' == $image}
							{assign var='image' value='fb'}
						{elseif 'instagram' == $image}
							{assign var='image' value='ig'}
						{elseif 'twitter' == $image}
							{assign var='image' value='tw'}
						{/if}
						{* ublock also blocks youtube, facebook, etc links. bounce through us first i guess. *} 
						<a target="_blank" class="link" href="out?id={$link->getTag()}">
							<img class="link-img" src="/images/links/{$image}.png" alt="{$title}" title="{$title}" />
						</a>
					{/foreach}
				</td>
			</tr>
		{/foreach}
	</tbody>
</table>
<hr />
<footer>
	<a href="mailto:info@colinfurzemusic.com">Contact</a>
</footer>