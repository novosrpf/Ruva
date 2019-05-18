<?php
function func($arg)  {
  $result = 0;
  for($i=0; $i<$arg; $i++) {
    $result = $result + $i;
  }
  return $result;
}
echo func(5);

?>