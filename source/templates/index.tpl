<h1>Colin Furze Music</h1>
<p>
	There's a lot of really excellent music throughout <a target="_blank" href="https://www.youtube.com/user/colinfurze">Colin Furze</a>'s videos. 
	I decided to put it all in one place, so more people can enjoy it. Colin lists some of the music on his site, but it's a little out of date. 
	I hope you find something that you like!
</p>
<p>
	Want a list of all the songs for yourself, along with all the links to Spotify, iTunes, etc.? <a href="/download">Click here to download the list for yourself</a>.
</p>
<p>
	Questions? Corrections? <a href="mailto:info@colinfurzemusic.com">Contact me</a>.
</p>
<hr />
{* sortable-theme-light class name must match theme's css file*}
<table data-sortable class="sortable-theme-light main-table"> 
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
						{* ublock blocks youtube, facebook, etc links. bounce through us first i guess. *} 
						{* ublock also blocks youtube.png facebook.png etc. need to hide it a bit so the images show. *}
						<a target="_blank" class="link" href="/out?id={$link->getTag()}">
							<img 
								class="link-img" 
								src="/images/links/{$link->getImage()}" 
								alt="{$link->getTitle()|htmlentities}" 
								title="{$link->getTitle()|htmlentities}" 
							/>
						</a>
					{/foreach}
				</td>
			</tr>
		{/foreach}
	</tbody>
</table>