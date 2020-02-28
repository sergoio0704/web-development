<?php 
  function getGetParametr(string $pass):?string 
  {
      return isset($_GET[$pass]) ? (string)$_GET[$pass] : null;
  }

  $pass = getGetParametr('password');
  $passArray = str_split($pass);
  $repeatArray = array_count_values($passArray);
  $numOfUpper = 0;
  $numOfDigit = 0;
  $numOfLower = 0;
  $security = 0;
  $passLength= strlen($pass);
  foreach ($passArray as $elArray) 
  {
    if ($elArray === '0' || $elArray === '1' || $elArray === '2' || $elArray === '3' || $elArray === '4' || $elArray === '5' || $elArray === '6' || $elArray === '7' || $elArray === '8' || $elArray === '9' )
    {
        $numOfDigit = $numOfDigit + 1;
    }
    if (ctype_upper($elArray))
    {
        $numOfUpper = $numOfUpper + 1;

    }
    if (ctype_lower($elArray))
    {
        $numOfLower= $numOfLower + 1;

    }  
  }
    
  $security  = $security  + 4*$passLength + $numOfDigit + (($passLength-$numOfUpper)*2) + (($passLength-$numOfLower)*2) ;

  if (preg_match("/^[a-zA-Z]+$/", $pass))
  {
      $security = $security - $passLength;
  }

  if (preg_match("/^[1-9]+$/", $pass))
  {
      $security = $security - $passLength;
  }

  foreach ($repeatArray as $elArray) 
  {
      if ($elArray !== 1)
      {
          $security = $security - $elArray;
      }
    
  }

  header("Content-Type: text/plain");
  
  
  if (preg_match("/^[А-Яа-я\-.]+$/", $pass) || $pass == null)
  {
    echo "Неккоректный пароль";
  }
  else
  {
    echo "Надежность пароля: ", $security;
  }
  

  
 