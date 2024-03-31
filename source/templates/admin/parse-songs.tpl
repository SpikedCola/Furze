<progress style="width: 100%;" max="{$totalEps}" value="{$completeEps}"></progress>

<h1>{$ep->getTitle()}</h1>
<h3>Uploaded {$ep->getUploadedDatetime('Y-m-d')}</h3>
<hr />
<pre id="description-raw">{$ep->getDescription()}</pre>
<div id="description-parsed"></div>
<hr />
<button id="show-original-btn">Toggle raw description</button>
<hr />
<p>
	<em>
		Instructions: Click in the "title" input to highlight a row. Click the correct "title" in the description above, 
		then "artist", then any URLs. Repeat as necessary.
	</em>
</p>
<hr />
<form method="post" id="songs">
	<input type="hidden" name="id" value="{$ep->getId()}" />
	<table>
		<tr>
			<th></th>
			<th>Title</th>
			<th>Artist</th>
			<th>Notes</th>
			{foreach $providers as $provider}
				<th>
					{$provider}
				</th>
			{/foreach}
		</tr>
		{for $idx=0 to 9}
			<tr data-id="{$idx}">
				<td>
					<input type="hidden" name="songs[{$idx}][track_number]" value="{$idx+1}" />
					{$idx+1}
				</td>
				<td>
					<input type="text" class="title" name="songs[{$idx}][title]" autocomplete="off" />
				</td>
				<td>
					<input type="text" class="artist" name="songs[{$idx}][artist]" autocomplete="off" />
				</td>
				<td>
					<input type="text" name="songs[{$idx}][notes]" />
				</td>
				{foreach $providers as $provider}
					<td>
						<input type="text" class="{$provider}" name="songs[{$idx}][{$provider}]" />
					</td>
				{/foreach}
			</tr>
		{/for}
	</table>
	<hr />
	<button type="submit" style="vertical-align: top;">Save</button>
</form>