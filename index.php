<?php
function ducan($stanje = "otvoren") {
    return $stanje;
}

// "Dodatno: dućan je zatvoren na sve državne praznike i blagdane!" - možemo s tim datumima u polje?
$holidays = [
    "01-01", 
    "01-06", 
    "05-01", 
    "05-30", 
    "06-22", 
    "08-05", 
    "08-15", 
    "11-01", 
    "11-18", 
    "12-25", 
    "12-26"  
];

$currentDateTime = new DateTime();
$currentDay = $currentDateTime->format('l');        // dan
$currentYear = $currentDateTime->format('Y');       // god
$currentTime = $currentDateTime->format('H:i');     // vrijeme
$currentDate = $currentDateTime->format('m-d');     // mj

// provjera iz polja
$isHoliday = in_array($currentDate, $holidays);

//validation
if ($isHoliday) {
    $stanje = "zatvoren zbog praznika";
} elseif ($currentDay === "Sunday") {
    $stanje = "zatvoren";
} elseif ($currentDay === "Saturday") {
    if ($currentTime >= "09:00" && $currentTime <= "14:00") {
        $stanje = "otvoren";
    } else {
        $stanje = "zatvoren";
    }
} else {
    if ($currentTime >= "08:00" && $currentTime <= "20:00") {
        $stanje = "otvoren";
    } else {
        $stanje = "zatvoren";
    }
}
echo "Danas je $currentDay, $currentYear i sati je $currentTime.<br>";
echo "Dućan je " . ducan($stanje) . ".";
?>
