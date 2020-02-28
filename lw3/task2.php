<?php 
  function getGetParametr(string $id):?string 
  {
      return isset($_GET[$id]) ? (string)$_GET[$id] : null;
  }

  $id = getGetParametr('identifier');
  $firstSymbol = substr($id, 0 , 1);
  if (preg_grep("/(1|2|3|4|5|6|7|8|9|0|#|@|'|&|%|!|<|>|\|;|:|,)/i", array($firstSymbol)) || $id == null)
  {
      header("Content-Type: text/plain");
      echo "No - Переданная строка не является идентификатором";

  }
  else 
  {
      header("Content-Type: text/plain");
      echo "Yes - Переданная строка является идентификатором";
  }