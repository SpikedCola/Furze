<h1>Colin Furze Music</h1>
<hr />
<table>
	<thead>
		<tr>
			<th>ID</th>
			<th class="nowrap">Upload Date</th>
			<th>Title</th>
			<th>Music</th>
		</tr>
	</thead>
	<tbody>
		{foreach from=$episodes item='episode'}
			<tr>
				<td>{$episode->getId()}</td>
				<td>{$episode->getUploadDate('Y-m-d')}</td>
				<td class="nowrap">{$episode->getTitle()}</td>
				<td><pre>{$episode->getMusic()}</pre></td>
			</tr>
		{/foreach}
	</tbody>
</table>