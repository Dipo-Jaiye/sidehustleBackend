<?php
#Generate airtime recharge cards for a telco
#An airtime card has a unique set of numbers
#At least 200 pins are needed
#Let the pins be a 15 number set
$rechargePins = [];
$r = 0;
while($r < 300){
    $pincomplete = "";
    for ($i=0; $i < 3; $i++) { 
        $pin = rand(10000,99999);
        $pincomplete.=$pin;
    }
    array_push($rechargePins,$pincomplete);
    echo "<br>15 digit recharge pin number ". $r+1 ." is $pincomplete";
    $r++;
}


































?>