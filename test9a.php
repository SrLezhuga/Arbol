<?php

for ($i = 1; $i < 10; $i++) {
  for ($o = 1; $o < 18; $o++) {
    if ($i <= 9) {
      $a = "0" . $i;
    } else {
      $a = $i;
    }
    if ($o <= 9) {
      $b = "0" . $o;
    } else {
      $b = $o;
    }
    echo "G04-N3-0Q-" . $b . "-" . $a;
    echo "<br>";
  }
}
