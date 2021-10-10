<?php

declare(strict_types=1);

error_reporting(E_ALL);
ini_set('display_errors', '1');

function dump($var)
{
  echo '
  </br>
  <div 
    style="
      display: inline-block;
      background-color: lightgray;
      padding: 5px 10px;
      border: 1px solid black;
      margin-top: 1px;
    "
  >
  <pre>';
  print_r($var);
  echo '</pre>
  </div>
  </br>';
}
