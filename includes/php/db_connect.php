<?php
class database 
{
    static protected $host='localhost';
    static protected $db_user='root';
    static protected $db_pass='';
    static protected $db_name='frekwencja';
    public $connection;
    
    public function dbConnect()
    {
        $connection = @new mysqli(self::$host,self::$db_user,self::$db_pass,self::$db_name);
        $this->connection=$connection;
        if($this->connection->connect_errno!=0)
        {
            echo "Error ".$this->connection->connect_errno." Opis:".$this->connection->connect_error;
            exit();
        }
        else
        {
            return $this->connection;
        }
    }
    public function insertData($table,$array)
    { $i=0;
      $sql="INSERT INTO $table VALUES(";
      foreach($array as $values)
      {
          if($i<count($array)-1)
          {
             $tempoary=$values.",";
          }
          else
          {
             $tempoary=$values;
          }
          $sql.=$tempoary;
          $i++;

      }
      $sql.=')';
      echo $sql;
      if($this->connection->query($sql))
      {
        return  true;
      }
      else
      {
        return false;
      }
    }


    public function delByid($table,$array)
    {   $success=true;
        foreach($array as $value)
        {
            $sql = "DELETE FROM $table WHERE id=$value";
            echo $sql;
            if(!$this->connection->query($sql))
            {
             $success=false;
            }
        }
        return $success;
    }

	public function calculateYear($class_year)
	{
					$present_year=intval(date("Y"));
					$class_year=intval($class_year);
					if(intval(date("M")<=7))
					{
						$class_final_year=$present_year-$class_year+1;
						return $class_final_year;
					}
					else
					{
						$class_final_year=$present_year-$class_year;
						return $class_final_year;
					}
	}

    function loginFunction($table,$login,$password)
    {
        if($login=="admin")
        {
            $sql = "SELECT * FROM $table WHERE login='$login'";
            if($result=$this->connection->query($sql))
            {
                $row = $result->fetch_assoc();
                if(password_verify($password,$row['password']))
                    {

                      return $row['id'];
                    }
                    else
                    {
                        return false;
                    }
            }
        }
        else
        {
            $sql = "SELECT * FROM $table WHERE login='$login'";
            if($result=$this->connection->query($sql))
            {
                 $row_cnt = $result->num_rows;
                 if($row_cnt>0)
                 {
                    $row = $result->fetch_assoc();
                    if(password_verify($password,$row['password']))
                    {

                      return $row['id'];
                    }
                    else
                    {
                        return false;
                    }

                 }
                 else
                 {
                     return false;
                 }
            }
            else
            {
                return false;
            }
        }
    }

}

class convert
{
    function MonToStr($mon)
    {
        $array = ['Styczen','Luty','Marzec','Kwiecień','Maj','Czerwiec','Lipiec','Sierpień','Wrzesień','Październik','Listopad','Grudzień'];
        return $array[$mon-1];
    }
}

class validator
{
    function blankTest($text)
    {
        if(strlen($text)<1)
        {
            return true;
        }
        else
        {
            return false;
        }
    }
    function loginTest($text)
    {
        if(strlen($text)<4||ctype_alnum($text)==false)
        {
            return true;
        }
        else
        {
            return false;
        }
    }
    function passTest($text)
    {
        if ((strlen($text) < 8) || (!preg_match("#[A-Z]+#", $text))||(!preg_match("#[0-9]+#", $text))||(!preg_match("#[a-z]+#", $text)))
        {
          return true;
        }
        else
        {
            return false;
        }
    }
    function repeatTest($text,$text2)
    {
        if($text!=$text2)
        {
            return true;
        }
        else
        {
            return false;
        }
    }

}
function uns($id,$letter)
{
$array_name=$id.$letter;
$array_final=Array();
$a_count=0;
foreach($_POST[$array_name] as $value)
{
   $array_final[$a_count]=$value;
    $a_count++;
}
return $array_final;  
}




?>