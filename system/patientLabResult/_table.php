	<?php 
	$currentMonth = date('F');
    $currentYear  = date('Y');
    $currentDay  = date('D');

    
	function appointmentCalender($currentMonth,$currentYear){
	switch ($currentMonth) {
    	case 'January':
    		$currentMonth = 1;
    		break;
    	case 'February':
    		$currentMonth = 2;
    		break;
    	case 'March':
    		$currentMonth = 3;
    		break;
		case 'April':
			$currentMonth = 4;
			break;
		case 'May':
			$currentMonth = 5;
			break;
		case 'June':
			$currentMonth = 6;
			break;
		case 'July':
			$currentMonth = 7;
			break;
		case 'August':
			$currentMonth = 8;
			break;
		case 'September':
			$currentMonth = 9;
			break;
		case 'October':
			$currentMonth = 10;
			break;
		case 'November':
			$currentMonth = 11;
			break;
		case 'December':
			$currentMonth = 12;
			break;
    	default:
    		break;
    }
	$calendar = '<table class="calendar" align="center">';

	$headings = array('Sunday','Monday','Tuesday','Wednesday','Thursday','Friday','Saturday');
	$calendar.= '<tr class="calendar-row"><td class="calendar-day-head">'.implode('</td><td class="calendar-day-head">',$headings).'</td></tr>';

	$running_day = date('w',mktime(0,0,0,$currentMonth,1,$currentYear));
	$days_in_month = date('t',mktime(0,0,0,$currentMonth,1,$currentYear));
	$days_in_this_week = 1;
	$day_counter = 0;
	$dates_array = array();

	$calendar.= '<tr class="calendar-row">';

	/* print "blank" days until the first of the current week */
	for($x = 0; $x < $running_day; $x++):
		$calendar.= '<td class="calendar-day-np"> </td>';
		$days_in_this_week++;
	endfor;

	/* keep going with days.... */
	for($list_day = 1; $list_day <= $days_in_month; $list_day++):
		$calendar.= '<td class="calendar-day">';
			/* add in the day number */
			$calendar.= '<div class="day-number">'.$list_day.'</div>';

			/** QUERY THE DATABASE FOR AN ENTRY FOR THIS DAY !!  IF MATCHES FOUND, PRINT THEM !! **/
			$calendar.= str_repeat('<p> </p>',2);
			
		$calendar.= '</td>';
		if($running_day == 6):
			$calendar.= '</tr>';
			if(($day_counter+1) != $days_in_month):
				$calendar.= '<tr class="calendar-row">';
			endif;
			$running_day = -1;
			$days_in_this_week = 0;
		endif;
		$days_in_this_week++; $running_day++; $day_counter++;
	endfor;

	/* finish the rest of the days in the week */
	if($days_in_this_week < 8):
		for($x = 1; $x <= (8 - $days_in_this_week); $x++):
			$calendar.= '<td class="calendar-day-np"> </td>';
		endfor;
	endif;

	/* final row */
	$calendar.= '</tr>';

	/* end the table */
	$calendar.= '</table>';
	
	/* all done, return result */
	return $calendar;
}

?>
<h2><?php echo $currentMonth ,' ', $currentYear; ?></h2>
<?php
echo appointmentCalender($currentMonth,$currentYear);
	 ?>