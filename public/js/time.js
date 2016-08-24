function date_time(id){
	date = new Date;
	year = date.getFullYear();
	month = date.getMonth();

	months = new Array('JANUARY', 'FEBRUARY', 'MARCH', 'APRIL', 'MAY', 'JUNE', 'JULY', 'AUGUST', 'SEPTEMBER', 'OCTOBER', 'NOVEMBER', 'DECEMBER');

	d = date.getDate();
	day = date.getDay();
	days  = new Array('SUNDAY', 'MONDAY', 'TUESDAY', 'WEDNESDAY', 'THURSDAY', 'FRIDAY', 'SATURDAY');
	
	h = date.getHours();
	if (h<10){
		h = '0' + h;
	}

	m = date.getMinutes();
	if (m<10){
		m = '0' + m;
	}

	s = date.getSeconds();
	if(s<10){
		s = '0' + s;
	}

	results = days[day] + ', ' + d + ' ' + months[month] + ' ' + year + '<br>' + h + ':' + m + ':' + s + ' WIB';

	document.getElementById(id).innerHTML = results;

	setTimeout('date_time("'+id+'");', '1000');

	return true;
}