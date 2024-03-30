var linkPlaces = {
	'bandcamp.com': 'Bandcamp',
	'facebook.com': 'Facebook',
	'instagram.com': 'Instagram',
	'music.apple.com': 'iTunes',
	'soundcloud.com': 'Soundcloud',
	'spotify.com': 'Spotify',
	'twitter.com': 'Twitter',
	'x.com': 'Twitter',
	'youtube.com': 'YouTube',
	'youtu.be': 'YouTube'
};

var currentRow = null;

// look for text between quotes, make into a link.
function processDescription() {
	var d = $('#description-raw');
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
		// same thing for urls (starting with "http(s)" or "www.")
		var links = lines[i].matchAll(/(https?:\/\/[^ ]+|www\.[^ ]+)/ig);
		for (const link of links) {
			var orig = link[0];
			var replacement = '<a href="#" class="clipboard">'+link[1]+'</a>';
			lines[i] = lines[i].replace(orig, replacement);
		}
	}
	d.hide();
	$('#description-parsed').html(lines.join("<br />"));
}
processDescription();

// highlight table row on selecting any input in that row. clear other row highlights.
$(document).on('focus', '#songs input', function() {
	// remove highlighting from any other rows
	$('#songs').find('.highlight').removeClass('highlight');
	// update currentRow var so we know which row to insert text into.
	currentRow = $(this).closest('tr');
	currentRow.addClass('highlight');
});

// toggle showing the original or parsed description.
$(document).on('click', '#show-original-btn', function() {
	$('#description-raw').toggle();
	$('#description-parsed').toggle();
});

function copyToClipboard(text) {
	if (!navigator.clipboard) {
		alert('copy to clipboard requires https');
		return;
	}
	navigator.clipboard.writeText(text).then(
		() => { }, 
		(err) => {
			alert('Failed to copy the text to clipboard: '+ err);
		}
	);
}

// on clicking a link, copy to clipboard, also try and insert directly into the correct input.
$(document).on('click', '.clipboard', function(e) {
	e.preventDefault();
	var t = $(this);
	var text = t.text();
	copyToClipboard(text);
	if (!currentRow) {
		return;
	}
	if (insertTextIntoCurrentRow(text, currentRow)) {
		// if the text was inserted, mark as such. dont delete in case we need for another track.
		t.addClass('strikethrough'); 
	}
});

function insertTextIntoCurrentRow(text, currentRow) {
	// if we have a selected row:
	var title = currentRow.find('.title');
	var artist = currentRow.find('.artist');
	// if title is empty, copy there.
	if (!title.val()) {
		title.val(text);
		// focus artist input, we will fill it in next, helpful if quotes around artist are mismatch.
		// prevent scrolling down so we dont lose our place on the page.
		artist.focus({
		    preventScroll: true
		});
		return true;
	}
	// else if artist is empty, copy there.
	if (!artist.val()) {
		artist.val(text);
		return true;
	}
	// else try to parse domain and copy to appropriate input (eg. facebook, youtube, etc.)
	for (var i in linkPlaces) {
		var target = linkPlaces[i];
		if (text.includes(i)) {
			currentRow.find('input.'+target).val(text);
			return true;
		}
	}
	return false;
}