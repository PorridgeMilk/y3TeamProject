<?php
include 'functions.php';
setSessionPath();
startHTML('Travel Co.','Home of travel for a newcastle travel agent');
makeHeader();


$hotelID = filter_has_var(INPUT_GET, 'hotelID') ? $_GET['hotelID'] : null;
//$hotelID = 1;//placeholder


$dbConn = getConnection();
$getUsersQuery = "SELECT tc_hotels.hotelID, hotelName, hotelDescription, hotelLocation, roomNo, boardType, nightRatePerPerson, occupancy, typeName, locationCity, locationCountry, imageRef

FROM tc_rooms INNER JOIN tc_roomtype on tc_rooms.typeID = tc_roomtype.typeID
              INNER JOIN tc_hotels on tc_hotels.hotelID = tc_rooms.hotelID
              INNER JOIN tc_locations on tc_hotels.hotelLocation = tc_locations.locationID
              WHERE tc_hotels.hotelID = '$hotelID'
              ORDER BY tc_hotels.hotelID";





$queryResult = $dbConn->query($getUsersQuery);



echo "<div class='widthWrap splitCol'>";

$rowObj = $queryResult->fetchObject();
    echo "<div class='widthWrap splitCol'>
      <div class='hotel'>
        <p>Hotels > {$rowObj->locationCountry} > {$rowObj->locationCity} > <b>{$rowObj->hotelName}</b></p>
        <h1>{$rowObj->hotelName}</h1>
        <h2>{$rowObj->locationCity}, {$rowObj->locationCountry}</h2>
        <div class='splitCol'>
          <p>Star rating</p>
          <span class='price'><p>From</p><h2>425pp</h2></span>
        </div>
        <img src='{$rowObj->imageRef}'/>

        <article>
          <h1>Holiday Description</h1>
          <div>
            <p>{$rowObj->hotelDescription}</p>
            <ul>
              <li>List of items example</li>
              <li>List of items example</li>
              <li>List of items example</li>
              <li>List of items example</li>
            </ul>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.</p>
          </div>
          <h1>Location</h1>
          <div>
            <p>
            Sed non urna. Donec et ante. Phasellus eu ligula. Vestibulum sit amet
            purus. Vivamus hendrerit, dolor at aliquet laoreet.<br>
            </p>
            <iframe src='https://www.google.com/maps/embed/v1/place?key=AIzaSyD-Ikb9FiJVmyXVjSUH2Wms2ot8enQbzu0&q={$rowObj->locationCity},{$rowObj->locationCountry}' width='100%' height='400' frameborder='0' style='border:0;' allowfullscreen=''></iframe>
          </div>
        </article>";

echo "<aside>
  <div class='cAlign hotelContinue'>
    <span class='price'>&#163;<h2>425pp</h2></span>
    <br>
    <span class='price'><p>Total Price &#163;</p><h2>850</h2></span>
    <h1><a class='#' href='book-holiday.php?hotelID=$hotelID'>Continue</a></h1>
  </div>
  </aside>"; //Temporary Code



$getReviews = "SELECT reviewID, reviewDate, userID, tc_users.username, reviewTitle, reviewText, overallRating, locationRating, roomRating, cleanlinessRating, serviceRating
FROM tc_reviews INNER JOIN tc_users ON tc_reviews.reviewID = tc_users.userID
WHERE hotelID = '$hotelID'";
$reviews = $dbConn->query($getReviews);


//review summary
echo "<h1>Reviews</h1>
<div class='splitCol reviewInfo reviewInfoHeader'>
  <img src='img/rating3.jpg'>
  <p>(22 reviews)</p>
</div>
<span class='splitCol reviewInfo'>
  <p>Cleanliness:</p>
  <img src='img/rating5.jpg'>
</span>
<span class='splitCol reviewInfo'>
  <p>Value:</p>
  <img src='img/rating1.jpg'>
</span>
<span class='splitCol reviewInfo'>
  <p>Service:</p>
  <img src='img/rating3.jpg'>
</span>

<a href='reviewForm.php?hotelID=$hotelID' class='buttonCust'>Leave a review</a>
<br>

<div class='fullReview'>
  <p><b>Review Title</b></p>
  <div class='splitCol'>
    <img src='img/rating5.jpg'>
    <p> 10 Jan 2020, </p>
    <p> Useraname</p>
  </div>
  <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. </p>
</div>
<div class='fullReview'>
  <p><b>Review Title</b></p>
  <div class='splitCol'>
    <img src='img/rating1.jpg'>
    <p> 10 Jan 2020, </p>
    <p> Useraname</p>
  </div>
  <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. </p>
</div>
</div>
</div>";

echo "<aside>
  <div class='cAlign hotelContinue'>
    <span class='price'>&#163;<h2>425pp</h2></span>
    <br>
    <span class='price'><p>Total Price &#163;</p><h2>850</h2></span>
    <h1><a class='#' href='book-holiday.php?hotelID=$hotelID'>Continue</a></h1>
  </div>
  </aside>";


echo "</div>";
makeFooter();
endHTML();
?>
