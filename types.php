<?php

echo "Request Time:" . $_SERVER["REQUEST_TIME_FLOAT"];

echo PHP_INT_SIZE;
echo '<br/>';

//
// Which is equivalent to 
//
//      7FFF,FFFF,FFFF,FFFF 64-bit
//      7FFF,FFFF 32-bit 
//
echo PHP_INT_MAX;
echo '<br/>';

echo PHP_INT_MIN;
echo '<br/>';

