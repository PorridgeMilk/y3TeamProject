<?php
include 'functions.php';
startHTML('Travel Co.', 'Home of travel for a newcastle travel agent');
require 'header.php';


$hotelID = filter_has_var(INPUT_GET, 'hotelID') ? $_GET['hotelID'] : null;
$userID = 1;//PLACEHOLDER UNTILL SESSIONS IMPLEMENTED
$dbConn = getConnection();

echo "<div class='widthWrap splitCol'>";
echo "<form class='reviewForm' action='processReview.php' method='POST' enctype='multipart/form-data'>
  <h1>Review Form</h1>
  <div class='splitCol'>
    <p><b>Overall: </b></p>
    </br>
    <div id='checkboxes'>
      <div class='checkboxgroup'>
        <label for='1overall'>1</label>
        <input type='radio' name='overall' id='1overall' value='1'/>
      </div>
      <div class='checkboxgroup'>
        <label for='2overall'>2</label>
        <input type='radio' name='overall' id='2overall' value='2'/>
      </div>
      <div class='checkboxgroup'>
        <label for='3overall'>3</label>
        <input type='radio' name='overall' id='3overall' value='3'/>
      </div>
      <div class='checkboxgroup'>
        <label for='4overall'>4</label>
        <input type='radio' name='overall' id='4overall' value='4'/>
      </div>
      <div class='checkboxgroup'>
        <label for='5overall'>5</label>
        <input type='radio' name='overall' id='5overall' value='5'/>
      </div>
    </div>
  </div>
  <div class='splitCol'>
    <p><b>Location: </b></p>
    </br>
    <div id='checkboxes'>
      <div class='checkboxgroup'>
        <label for='1location'>1</label>
        <input type='radio' name='location-radio' id='1location' value='1'/>
      </div>
      <div class='checkboxgroup'>
        <label for='2location'>2</label>
        <input type='radio' name='location-radio' id='2location' value='2'/>
      </div>
      <div class='checkboxgroup'>
        <label for='3location'>3</label>
        <input type='radio' name='location-radio' id='3location' value='3'/>
      </div>
      <div class='checkboxgroup'>
        <label for='4location'>4</label>
        <input type='radio' name='location-radio' id='4location' value='4'/>
      </div>
      <div class='checkboxgroup'>
        <label for='5location'>5</label>
        <input type='radio' name='location-radio' id='5location' value='5'/>
      </div>
    </div>
  </div>
  <div class='splitCol'>
    <p><b>Room: </b></p>
    </br>
    <div id='checkboxes'>
      <div class='checkboxgroup'>
        <label for='1room'>1</label>
        <input type='radio' name='room-radio' id='1room' value='1'/>
      </div>
      <div class='checkboxgroup'>
        <label for='2room'>2</label>
        <input type='radio' name='room-radio' id='2room' value='2'/>
      </div>
      <div class='checkboxgroup'>
        <label for='3room'>3</label>
        <input type='radio' name='room-radio' id='3room' value='3'/>
      </div>
      <div class='checkboxgroup'>
        <label for='4room'>4</label>
        <input type='radio' name='room-radio' id='4room' value='4'/>
      </div>
      <div class='checkboxgroup'>
        <label for='5room'>5</label>
        <input type='radio' name='room-radio' id='5room' value='5'/>
      </div>
    </div>
  </div>
  <div class='splitCol'>
    <p><b>Cleanliness: </b></p>
    </br>
    <div id='checkboxes'>
      <div class='checkboxgroup'>
        <label for='1clean'>1</label>
        <input type='radio' name='clean-radio' id='1clean' value='1'/>
      </div>
      <div class='checkboxgroup'>
        <label for='2clean'>2</label>
        <input type='radio' name='clean-radio' id='2clean' value='2'/>
      </div>
      <div class='checkboxgroup'>
        <label for='3clean'>3</label>
        <input type='radio' name='clean-radio' id='3clean' value='3'/>
      </div>
      <div class='checkboxgroup'>
        <label for='4clean'>4</label>
        <input type='radio' name='clean-radio' id='4clean' value='4'/>
      </div>
      <div class='checkboxgroup'>
        <label for='5clean'>5</label>
        <input type='radio' name='clean-radio' id='5clean' value='5'/>
      </div>
    </div>
  </div>
  <div class='splitCol'>
    <p><b>Service: </b></p>
    </br>
    <div id='checkboxes'>
      <div class='checkboxgroup'>
        <label for='1service'>1</label>
        <input type='radio' name='service-radio' id='1service' value='1'/>
      </div>
      <div class='checkboxgroup'>
        <label for='2service'>2</label>
        <input type='radio' name='service-radio' id='2service' value='2'/>
      </div>
      <div class='checkboxgroup'>
        <label for='3service'>3</label>
        <input type='radio' name='service-radio' id='3service' value='3'/>
      </div>
      <div class='checkboxgroup'>
        <label for='4service'>4</label>
        <input type='radio' name='service-radio' id='4service' value='4'/>
      </div>
      <div class='checkboxgroup'>
        <label for='5service'>5</label>
        <input type='radio' name='service-radio' id='5service' value='5'/>
      </div>
    </div>
  </div>
  <p><b>Review:</b></p>
  <input type='hidden' name='hotelID' value='$hotelID'>
  <input type='hidden' name='userID' value='$userID'>
  <input type='text' name='reviewTitle' placeholder='Title of review'/>
  <textarea placeholder='Review message here' name='reviewText'></textarea><br><br>
  <input class='viewBtn' type='submit' value='Submit Review'>
</form>";



echo "</div>";
makeFooter();
endHTML();
