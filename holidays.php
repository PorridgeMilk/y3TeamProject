<?php
include 'functions.php';
setSessionPath();
startHTML('Travel Co.','Home of travel for a newcastle travel agent');
makeHeader();

//echo getcwd();



$getUsersQuery = "SELECT tc_hotels.hotelID, roomID, hotelName, hotelDescription, locationCity, locationCountry, imageRef
FROM tc_hotels INNER JOIN tc_rooms ON tc_hotels.hotelID = tc_rooms.hotelID
INNER JOIN tc_locations ON tc_hotels.hotelLocation = tc_locations.locationID
WHERE tc_hotels.hotelID IS NOT NULL";



$dbConn = getConnection();

$queryResult = $dbConn->query($getUsersQuery);

echo "<div class='widthWrap splitCol'>";

while ($rowObj = $queryResult->fetchObject()){
    echo "<div class='smallHoliday'>
        <img src='{$rowObj->imageRef}'/>

        <a href='hotel.php?hotelID={$rowObj->hotelID}'><h1>{$rowObj->hotelName}</h1></a>
        <h2>{$rowObj->locationCity}, {$rowObj->locationCountry}</h2>

        <div class='splitCol'>
          <div class='rating'><img src='img/ratingPlaceholder.jpg'/></div>
          <span class='price'><p>From</p><h2>£(min price)pp</h2></span>
        </div>
      </div>";
}

//<a href='editRecord.php?recordID={$rowObj->recordID}'>{$rowObj->recordTitle}</a>

//holidaysJs();


echo "</div>";
makeFooter();
endHTML();
?>
