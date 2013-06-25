
var activeDate; // The active/selected date from the calendar. Format: YYYY-MM-DD

$(document).ready(function(){

	// "Render" the calendar, default content
	$('.ftfcal').ftfCalendarize();

	// Bind events to stuff inside .ftfcal
	$('.ftfcal').on('click', '.ajaxLink', function(event){ // When .ajaxLinks are clicked, AJAX stuff
		event.preventDefault();

		$.ajax({
			url: $(this).attr('href'),
			data: {
				//eID: "FtfEvents",
				pluginName: "Event",
				type: 110981,
				"tx_ftfevents_event[ajax]": 1,
				"tx_ftfevents_event[active]": activeDate
			}
		}).done(function(data) {
			$('.ftfcal').ftfCalendarize(data); // Render the calendar with data from the AJAX call
		});

	}).on('click', '.event-title', function(){ // Show event description
		var t = $(this);
		if(t.hasClass('isopen')){
			t.removeClass('isopen').siblings('.event-description').hide();
		} else {
			t.addClass('isopen').siblings('.event-description').show();
		}
	}).on('click', '.close-description', function(){ // Hide event description
		$(this).parent().hide().siblings('.event-title').removeClass('isopen');
	});

});

/**
 * ftfCalendarize jQuery plugin
 */
(function($){

	/**
	 * ftfCalendarize function.
	 * 
	 * @param calContent Optionally pass some content to the calendar.
	 */
	$.fn.ftfCalendarize = function(calContent) {

		// If there is content sent along, put that into the calendar
		if(calContent){
			$('#calcontent').html(calContent); // TODO: #calcontent should be adjustable
		}

		this.each(function(){
			var cal = $(this),
					td = $(this).find('td'),
					agenda = cal.find('.agenda'),
					today = cal.find('.today');

			// Bind a click handler to all td's.
			// Every time a td is clicked change the act td and call appendDataToCal
			// This does NOT load in new data
			td.on('click', function(){	
				td.removeClass('act'); // Remove act from all td's
				$(this).addClass('act'); // Make this td the new .act

				appendDataToCal(cal, agenda, today);
			});

			// Load this once to begin with...
			appendDataToCal(cal, agenda, today);
		});

	};

	/**
	 * appendDataToCal function.
	 * 
	 * @param cal The calendar that is being worked on
	 * @param agenda The agenda element
	 * @param today The today element
	 */
	function appendDataToCal(cal, agenda, today){

		var	td = cal.find('td'),
		curTd = td.filter('.act');
		
		// Append the current date, if there is one selected
		if(curTd.length > 0){
			var time = curTd.find('time');

			today.empty(); // Remove content from today element
			time.clone().appendTo(today); // Clone the selected td's time elements content and put into today
			activeDate = time.attr('datetime'); // Set the variable activeDate to the time elements datetime attribute

			agenda.find('ul').remove(); // Remove ul from the agenda element
			curTd.find('ul').clone().appendTo(agenda); // Clone the selected td's ul and put into agenda
		}
	}

}(jQuery));
