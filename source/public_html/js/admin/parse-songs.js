// highlight table row on selecting any input in that row. clear other row highlights.
$(document).on('focus', '#songs input', function() {
	// remove from any other rows
	$('#songs').find('.highlight').removeClass('highlight');
	// add to this row
	$(this).closest('tr').addClass('highlight');
});

// look in description for text between quotes, make into a link.

var d = $('#description');

// look for quotes on a line-by-line basis.
// if there is a mismatch of quotes (and there often is)
// we wont make a link out of a a random huge chunk of text.
var lines = d.text().split("\n");
for (var i in lines) {
	// make links from quoted text
	var quotes = lines[i].matchAll(/"([^"]+)"/ig);
	for (const quote of quotes) {
		var orig = quote[0];
		var replacement = '"<a href="#" class="clipboard">'+quote[1]+'</a>"';
		lines[i] = lines[i].replace(orig, replacement);
	}
	// same thing for links
	var links = lines[i].matchAll(/(https?:\/\/[^ ]+)/ig);
	for (const link of links) {
		var orig = link[0];
		var replacement = '<a href="#" class="clipboard">'+link[1]+'</a>';
		lines[i] = lines[i].replace(orig, replacement);
	}
}
//console.log(lines.join("\n"));
d.hide();
$('#description2').html(lines.join("<br />"));

$(document).on('click', '#show-original-btn', function() {
	$('#description2').hide();
	$('#description').show();
});

/* track which element was last focused, so we know when clicking 
a .clipboard link where to put text. */
var currentFocus = null;
$(document).on('focus', 'input', function() {
	currentFocus = $(this);
});

$(document).on('click', '.clipboard', function(e) {
	console.log(e);
	e.preventDefault();
	if (!navigator.clipboard) {
		alert('copy to clipboard requires https');
		return;
	}
	var text = $(this).text();
	navigator.clipboard.writeText(text).then(() => {
		console.log('Copied to clipboard.');
	}, 
	(err) => {
		console.log('Failed to copy the text to clipboard.', err);
	});
	// if we have a selected row:
	// if we are in title or artist, copy to them.
	// otherwise try and copy based on domain.
	var hl = $('#songs').find('.highlight');
	if (hl.length) {
		if (currentFocus) {
			var title = hl.find('.title');
			var artist = hl.find('.artist');
			var notes = hl.find('.notes');
			if (currentFocus.is(title) && !title.val()) {
				// copy to title
				title.val(text);
				// select artist
				artist.trigger('focus');
			}
			else if (currentFocus.is(artist) && !artist.val()) {
				// copy to artist
				artist.val(text);
				// select notes
				notes.trigger('focus');
			}
		}
		// also check if link text contains one of our external sites,
		// if so fill in the appropriate box in the selected row.
	}
});