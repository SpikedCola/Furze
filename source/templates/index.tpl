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
			{*<th>Links</th>*}
		</tr>
	</thead>
	<tbody>
		{foreach from=$songs item='song'}
			<tr>
				<td><a target="_blank" href="https://youtube.com/watch?v={$song->getEpisode()->getId()}">{$song->getEpisode()->getTitle()}</a></td>
				<td>{$song->getEpisode()->getUploadDate('Y-m-d')}</td>
				<td>{$song->getTitle()}</td>
				<td>{$song->getArtist()}</td>
				<td>{$song->getTrackNumber()}</td>
				{*<td></td>*}
				{*<td><a href="https://revengeofthepsychotronicman.bandcamp.com" target="_blank">Bandcamp</a>, link2, link3</td>*}
			</tr>
		{/foreach}
	</tbody>
</table>
<hr />
<footer>
	<a href="mailto:info@colinfurzemusic.com">Contact</a>
</footer>