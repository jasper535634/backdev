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
    $startWeekend = strtotime("next friday 22:00:00");
    $endWeekend = strtotime("next monday 07:00:00");
    echo $date;
    if($date > $startWeekend && $date < $endWeekend) {
        return true;
    } else {
        return false;
    }
}

function calclateTaxiPrice(){
// form velden ophalen
$dateAndTime = $_REQUEST['date'];
$totalkm = $_REQUEST['km'];
$kmtarief = 1;
$minDriveCost = 0.25;
$highDriveCost = 0.45;

// var_dump(isweekend($dateAndTime));

//form velden bewerken
$splitDateAndTime = preg_split("/T/", $dateAndTime);
$date= $splitDateAndTime[0];
$time = strtotime($splitDateAndTime[1]);

$startTime = strtotime('08:00:00');
$endTime = strtotime('16:00:00');
// var_dump($startTime);
// var_dump($endTime);

// subtotal = km * kmtarief
$subtotal = $totalkm * $kmtarief;
$minutesDiven = ($totalkm / 60) * 60;

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

if(isweekend($dateAndTime) === true){
    return "<br> De prijs voor u taxi rit is " .$totalcost * 1.15." euro";
}else{
    return "<br> De prijs voor u taxi rit is " .$totalcost. " euro";
}

// subtotaalkosten = subtotaalkms * hoog/laag tarief

};



?>