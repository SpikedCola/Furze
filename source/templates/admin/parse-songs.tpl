{if $ep}
	<progress style="width: 100%;" max="{$totalEps}" value="{$completeEps}"></progress>

	<h1>{$ep->getTitle()}</h1>
	<hr />
	<pre>{$ep->getMusic()}</pre>
	<hr />
	<form method="post">
		<input type="hidden" name="id" value="{$ep->getId()}" />
		<table>
			<tr>
				<th></th>
				<th>Title</th>
				<th>Artist</th>
				<th>Notes</th>
				{foreach from=$linkPlaces item='place'}
					<th>
						{$place}
					</th>
				{/foreach}
			</tr>
			{for $idx=0 to 5}
				<tr>
					<td>
						<input type="hidden" name="songs[{$idx}][track]" value="{$idx+1}" />
						{$idx+1}
					</td>
					<td>
						<input type="text" name="songs[{$idx}][title]" />
					</td>
					<td>
						<input type="text" name="songs[{$idx}][artist]" />
					</td>
					<td>
						<input type="text" name="songs[{$idx}][notes]" />
					</td>
					{foreach from=$linkPlaces item='place'}
						<td>
							<input type="text" name="songs[{$idx}][{$place}]" />
						</td>
					{/foreach}
				</tr>
			{/for}
		</table>
		<hr />
		<button type="submit" style="vertical-align: top;">Save</button>
	</form>
{else}
	Done!
{/if}