<?php 
function generate_calendar($mon)
{

$empty=date('N',mktime(0, 0, 0,$mon, 1))+1;
$days_in_month=  date('t', mktime(0,0,0,$mon,1,date("Y")));    
$calendar_html="";
$temp_day=1;
$months = array('Styczeń','Luty','Marzec','Kwiecień','Maj','Czerwiec','Lipiec','Sierpień','Wrzesień','Październik','Listopad','Grudzień' );
$week=1;


for($i=0;$i<$days_in_month+$empty;$i++)
{
    
  if($i==0)
  {
    $calendar_html.="<tr>";
  }
  if($i%7==0 && $i!=0)
  {
    $calendar_html.="</tr><tr>";
    $temp_day=1;
    //echo $week_id=date("Y")."_".date("F")."_".$week."<br>";
    $week++;
  }
  if($i<$empty)
  {
       $calendar_html.="<td></td>";
  }
  else
  {
        $day=$i+1-$empty;
        $calendar_html.="<td><input type='checkbox'class='calendar_checkbox' name='school_days[]' value='$day'></input> Dzień tygodnia : $temp_day dzień: $day</td><br><br>";
  }
 $temp_day++;
}
}
 generate_calendar(11);
generate_calendar(12);
?>