<form action="index.php" method="post">
    <label for="name">Date</label>
    <input type="datetime-local" name="date">
<br>
    <label for="km">Aantal km:</label>
    <input type="number" name="km">
<br>
    
    <input type="submit" name="Bereken">
</form>



<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST'){
   echo calclateTaxiPrice();
};

function isweekend($date){
    $date = strtotime($date);
    $dayNum = date("N",$date);
    var_dump($dayNum);
    // $startWeekend = 5;
    // $endWeekend = 7;
    // echo"<br>";
    // echo $dayNum;
    // echo"<br>";
    // if($dayNum >= $startWeekend && $dayNum <= $endWeekend) {
    //     return "het is weekend";
    // } else {
    //     return "het is geen weekend";
    // }
}

function calclateTaxiPrice(){
// form velden ophalen
$dateAndTime = $_REQUEST['date'];
$totalkm = $_REQUEST['km'];
$kmtarief = 1;
$taxiSpeed = 70;
$minDriveCost = 0.25;
$highDriveCost = 0.45;
$weekendMultiplier = 1.15;
$minInHour = 60;

// var_dump(isweekend($dateAndTime));

//form velden bewerken
$splitDateAndTime = explode("T", $dateAndTime);
$date = $splitDateAndTime[0];
$time = strtotime($splitDateAndTime[1]);
$timetest=$splitDateAndTime[1];

if ($timetest > "08:00" && $timetest < "18:00"){
    echo "0.25 ".$timetest;
}else{
    echo "0.45 ".$timetest;
}


$startTime = strtotime('08:00:00');
$endTime = strtotime('18:00:00');
// var_dump($startTime);
// var_dump($endTime);

// subtotal = km * kmtarief
$subtotal = $totalkm * $kmtarief;
$minutesDiven = ($totalkm / $taxiSpeed) * $minInHour;

// var_dump($minutesDiven);
// controleer of de ingevoerde tijd tussen 8-18 valt
if($time > $startTime && $time < $endTime) {
    //als de tijd tussen 8-18 valt is het laag tarief
  $totalcost = $subtotal + ($minutesDiven * $minDriveCost);
//   return $totalcost;
} else {
    //als de tijd buiten 8-18 valt is het hoogtarief tarief
    $totalcost = $subtotal + ($minutesDiven * $highDriveCost);
//   return $totalcost;
}
echo isweekend($date);
//heb ook het weekend deel gedaan 
if(isweekend($dateAndTime)){
    return "<br> De prijs voor u taxi rit is " .($totalcost * $weekendMultiplier)." euro";
}else{
    return "<br> De prijs voor u taxi rit is " .$totalcost. " euro";
}

// subtotaalkosten = subtotaalkms * hoog/laag tarief

};



?>