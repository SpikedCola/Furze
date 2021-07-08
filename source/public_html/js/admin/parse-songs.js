// highlight table row on selecting any input in that row. clear other row highlights.
$(document).on('focus', '#songs input', function() {
	// remove from any other rows
	$('#songs').find('.highlight').removeClass('highlight');
	// add to this row
	$(this).closest('tr').addClass('highlight');
});