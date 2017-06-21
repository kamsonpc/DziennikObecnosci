<?php
require_once "db_connect.php";
class Calendar{
    
    
    function genCalendar($mon,$year,$link)
    {
	$db = new database;
    $db->dbConnect();
    $mon_month_days=  date('t', mktime(0,0,0,$mon,1,$year));    
    $calendar_html="";
    $temp_day=1;
    $months = array('Styczeń','Luty','Marzec','Kwiecień','Maj','Czerwiec','Lipiec','Sierpień','Wrzesień','Październik','Listopad','Grudzień' );
    $week=1;
    $next_month=$mon+1;
    $back_month=$mon-1;
	$next_year = $year;
	$back_year = $year;
    if($mon==12)
    {
        $next_month=1;
        $back_month=11;
		$next_year=$year+1;
		
    }
    if($mon==1)
    {   $next_month=2;
        $back_month=12;
		$back_year=$year-1;
		
    }
    $back_empty=date('N',mktime(0, 0, 0,$mon, 1,$year))-1;
    $locked=7-$back_empty;
    $locked=$locked+$back_empty;
    if($back_empty==0)
    {
        $locked=0;
    }
    $back_month_days= date('t', mktime(0,0,0,$back_month,1,$year));
    $next_empty=7-(date('N',mktime(0, 0, 0,$mon,$mon_month_days,$year)));
    $next_month_days= date('t', mktime(0,0,0,$next_month,1,$year));   
    $calendar_html.="<div class='table-responsive calendar'>
                <table class='table table-bordered '>
                    <thead>
                        <tr>
                            <th class='text-center'><div><a href='$link&&calendar=".$back_month."&&year=".$back_year."'><i class='fa fa-arrow-left'></i></a><div></th>
                            <th colspan='6' class='text-center'><div class='text-center'>".$months[$mon-1]." ".$year."</div> </th>
                            <th class='text-center'><div><a href='$link&&calendar=".$next_month."&&year=".$next_year."'><i class='fa fa-arrow-right'></i></a><div></th>
                        </tr>
                        <tr>
                            <th>NR TYGODNIA</th>
                            <th>PN</th>
                            <th>WT</th>
                            <th>ŚR</th>
                            <th>CZ</th>
                            <th>PT</th>
                            <th>SO</th>
                            <th class='day-event'>ND</th>
                        </tr>
                    </thead><tbody>";
    if($mon<10)
    {
        $mon_value="0".$mon;
    }
    else
    {
        $mon_value=$mon;
    }
    for($i=0;$i<$mon_month_days+$back_empty+$next_empty;$i++)
    {
      if($i==0)
      {
         $week_number=date("W",mktime(0,0,0,$mon,1,$year));
         if($back_empty==0)
         {
                       $weeks_value=$mon_value."_".$week_number."_".$year;
             $calendar_html.="<tr><td  class='nt'><input type='hidden' name='weeks[]' value='$weeks_value'>$week_number</td>";
         }
         else
         {
             $calendar_html.="<tr><td  class='nt'>$week_number</td>";
         }

         
      }
      if($i%7==0 && $i!=0)
      {  
        $week_number=date("W",mktime(0,0,0,$mon,$i+1,$year));
        $weeks_value=$mon_value."_".$week_number."_".$year; 
        $calendar_html.="</tr><tr><td  class='nt'><input type='hidden' name='weeks[]' value='$weeks_value'>$week_number</td>";
        $temp_day=1;
        //echo $week_id=date("Y")."_".date("F")."_".$week."<br>";
        $week++;
        $value=$year."_".$mon_value."_".$week_number."_";
      }
      else
      {
          $value=$year."_".$mon_value."_".$week_number."_";
      }
      if($i<$back_empty || $i>=$mon_month_days+$back_empty)
      {     
           if($i<$back_empty)
           {
            $back_day=$back_month_days-$back_empty+$i+1;
           $calendar_html.="<td class='calendar-locked'><input type='checkbox' disabled> $back_day</td>";
           }
           else
           {
           //pierwszy przypadek    
           $next_day=$i-$mon_month_days-$back_empty+1;
           $value.= date('w',mktime(0,0,0,$mon+1,$next_day,$year));
           $calendar_html.="<td><input type='checkbox' value='$value' class='calendar_checkbox' name='school_days[]' > $next_day</td>";  
           }

      }
      else
      {
            if($i < $locked)
            {
                $day=$i-$back_empty+1;
                $calendar_html.="<td  class='calendar-locked'><input type='checkbox' disabled></input> $day</td>";
            }
            else
            {
                //drugi przypadek
                $day=$i-$back_empty+1;
    
                $value.= date('w',mktime(0,0,0,$mon,$day,$year));
                
                $calendar_html.="<td><input type='checkbox' value='$value' class='calendar_checkbox' name='school_days[]' > $day</td>"; 
            }
      }
     $temp_day++;
    }
    $calendar_html.="</tbody>
                </table>
            </div>";
    return $calendar_html;
    } 

}
?>