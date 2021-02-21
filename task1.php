<?php
#Generate airtime recharge cards for a telco
#An airtime card has a unique set of numbers
#At least 200 pins are needed
#Let the pins be a 15 number set
function makePins($p){
    $rechargePins = [];
    $r = 0;
    while($r < $p){
        $pincomplete = rand(100000000000000,999999999999999);
        array_push($rechargePins,$pincomplete);
        echo "<br>15 digit recharge pin number ". $r+1 ." is $pincomplete";
        $r++;
    }
    return $rechargePins;
}
$pins = makePins(300);
?>