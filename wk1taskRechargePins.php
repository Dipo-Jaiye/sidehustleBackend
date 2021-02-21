<?php
#Generate airtime recharge cards for a telco
#An airtime card has a unique set of numbers
#At least 200 pins are needed
#Let the pins be a 15 number set
function makePins($p){
    $rechargePins = [];
    for($i=0;$i<$p;$i++){
        $pincomplete = rand(100000000000000,999999999999999);
        array_push($rechargePins,$pincomplete);
        echo "<br>15 digit recharge pin number ". $i+1 ." is $pincomplete";
    }
    return $rechargePins;
}
$pins = makePins(300);
?>
