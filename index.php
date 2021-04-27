<?php
include 'functions.php';
startHTML('Travel Co.', 'Home of travel for a newcastle travel agent');
require 'header.php';

echo "<section>
  <ul id='countrySlider'>
    <li class='tint'>
      <a href='#'>
        <h1 class='countryName'>Hawaii</h1>
        <img src='https://i2-prod.mirror.co.uk/incoming/article13555103.ece/ALTERNATES/s615/0_Perfect-beach-view-Summer-holiday-and-vacation-design-Inspirational-tropical-beach-palm-trees-and.jpg'/>
      </a>
    </li>
    <li>
      <a href='#'>
        <h1 class='countryName'>Maldeves</h1>
        <img src='https://cdn.content.tuigroup.com/adamtui/2019_3/22_17/40f03d19-c938-42df-8bb6-aa18012749e4/LOC_000548_shutterstock_750119359WebOriginalCompressed.jpg?i10c=img.resize(width:1080);img.crop(width:1080,height:608)'/>
      </a>
    </li>
    <li>
      <a href='#'>
        <h1 class='countryName'>Iceland</h1>
      <img src='https://www.nationalgeographic.com/content/dam/travel/Guide-Pages/europe/Iceland/iceland_NationalGeographic_2168279.adapt.1900.1.jpg'/>
      </a>
    </li>
    <li>
      <a href='#'>
        <h1 class='countryName'>Another Country</h1>
        <img src='https://www.flytap.com/-/media/Flytap/destinations/images/Lead/Espanha_1920x1036.jpg?h=1036&w=1920&la=en&hash=F63109DF58B44DB533C4862F76701259D85F61A5'/>
      </a>
    </li>
    <li>
      <a href='#'>
        <h1 class='countryName'>Final Country</h1>
        <img src='https://www.nationalgeographic.com/content/dam/travel/Guide-Pages/europe/Iceland/iceland_NationalGeographic_2168279.adapt.1900.1.jpg'/>
      </a>
    </li>
  </ul>
</section>
<main>
  <!-- 1 large 1 small holiday example-->
  <h1 class='cAlign'><br>Top holiday picks</h1>
  <div class='widthWrap splitCol'>
    <!-- small featured holiday -->
    <div class='smallHoliday'>
      <img src='https://a.loveholidays.com/images/holidays/26667165c6c6070107047d269ff250259185a663/holidays/united-arab-emirates/dubai/the-palm-jumeirah/dukes-the-palm-a-royal-hideaway-hotel-0.jpg?auto=webp&fit=crop&height=576&width=880&quality=60'/>
      <h1>Hotel Name</h1>
      <h2>Hotel Location</h2>
      <div class='splitCol'>
        <div class='rating'><img src='img/ratingPlaceholder.jpg'/></div>
        <span class='price'><p>From</p><h2>425pp</h2></span>
      </div>
    </div>
    <!-- large featured holiday -->
    <div class='largeHoliday'>
      <img src='https://a.loveholidays.com/images/holidays/26667165c6c6070107047d269ff250259185a663/holidays/united-arab-emirates/dubai/the-palm-jumeirah/dukes-the-palm-a-royal-hideaway-hotel-0.jpg?auto=webp&fit=crop&height=576&width=880&quality=60'/>
      <div class='splitCol'>
        <div>
          <div class='rating'><img src='img/ratingPlaceholder.jpg'/></div>
          <h1>Hotel Name</h1>
          <h2>Hotel Location</h2>
        </div>
        <span class='price'><p>From</p><h2>425pp</h2></span>
      </div>
    </div>
  </div><!-- end 1 large 1 small holiday -->

  <!-- 4 Small basic holiday suggestions -->
  <h1 class='cAlign'><br>A title for this section</h1>
  <section class='widthWrap splitCol'>
    <!-- small Basic holiday -->
    <div class='basicHoliday'>
      <img src='https://a.loveholidays.com/images/holidays/26667165c6c6070107047d269ff250259185a663/holidays/united-arab-emirates/dubai/the-palm-jumeirah/dukes-the-palm-a-royal-hideaway-hotel-0.jpg?auto=webp&fit=crop&height=576&width=880&quality=60'/>
      <h2 class='accent'>Hotel Country, and City</h2>
      <div class='rating'><img src='img/ratingPlaceholder.jpg'/></div>
      <span class='price'><p>From</p><h2>425pp</h2></span>
    </div>
    <!-- small Basic holiday -->
    <div class='basicHoliday'>
      <img src='https://a.loveholidays.com/images/holidays/26667165c6c6070107047d269ff250259185a663/holidays/united-arab-emirates/dubai/the-palm-jumeirah/dukes-the-palm-a-royal-hideaway-hotel-0.jpg?auto=webp&fit=crop&height=576&width=880&quality=60'/>
      <h2 class='accent'>Hotel Country, and City</h2>
      <div class='rating'><img src='img/ratingPlaceholder.jpg'/></div>
      <span class='price'><p>From</p><h2>425pp</h2></span>
    </div>
    <!-- small Basic holiday -->
    <div class='basicHoliday'>
      <img src='https://a.loveholidays.com/images/holidays/26667165c6c6070107047d269ff250259185a663/holidays/united-arab-emirates/dubai/the-palm-jumeirah/dukes-the-palm-a-royal-hideaway-hotel-0.jpg?auto=webp&fit=crop&height=576&width=880&quality=60'/>
      <h2 class='accent'>Hotel Country, and City</h2>
      <div class='rating'><img src='img/ratingPlaceholder.jpg'/></div>
      <span class='price'><p>From</p><h2>425pp</h2></span>
    </div>
    <!-- small Basic holiday -->
    <div class='basicHoliday'>
      <img src='https://a.loveholidays.com/images/holidays/26667165c6c6070107047d269ff250259185a663/holidays/united-arab-emirates/dubai/the-palm-jumeirah/dukes-the-palm-a-royal-hideaway-hotel-0.jpg?auto=webp&fit=crop&height=576&width=880&quality=60'/>
      <h2 class='accent'>Hotel Country, and City</h2>
      <div class='rating'><img src='img/ratingPlaceholder.jpg'/></div>
      <span class='price'><p>From</p><h2>425pp</h2></span>
    </div>
  </section>

</main>";

echo "<script type='text/javascript'>
  $(document).ready(function() {
    $('#countrySlider').lightSlider({
      controls: true,
      item: 3,
      pager: false,
      enableTouch: true,
      auto: true,
      loop: true,
      pauseOnHover: true,
    });
    $('#holidaySlider').lightSlider({
      controls: true,
      item: 2.8,
      pager: true,
      enableTouch: true,
    });
  });
</script>";

makeFooter();
endHTML();
