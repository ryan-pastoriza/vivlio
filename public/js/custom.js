if (typeof jQuery === 'undefined') {
  throw new Error('jQuery is required')
}


+function ($) {
	'use strict';

	// vivlio clock
	clockTick();

}(jQuery);

function titleCase(str) {
  var newstr = str.split(" ");
  for(i=0;i<newstr.length;i++){
    if(newstr[i] == "") continue;
    var copy = newstr[i].substring(1).toLowerCase();
    newstr[i] = newstr[i][0].toUpperCase() + copy;
  }
   newstr = newstr.join(" ");
   return newstr;
}  

function clockTick () {

	var time = moment(new Date()).format('hh:mm:ss A');
	var date = moment(new Date()).format('MMMM DD, YYYY');
	var day = moment(new Date()).format('dddd')+",";

	$('#hdr-day').html(day);
	$('#hdr-date').html(date);
	$('#hdr-time').html(time);
	setTimeout(clockTick, 1000);
}