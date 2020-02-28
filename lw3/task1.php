<?php 
  function getGetParametr(string $text):?string 
  {
      return isset($_GET[$text]) ? (string)$_GET[$text] : null;
  }

  $text = getGetParametr('text');
  $text = trim($text);
  $text = preg_replace('/\s+/', ' ', $text);
  header("Content-Type: text/plain");
  echo $text;
 