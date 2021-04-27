$(document).ready(function() {
  $("#countrySlider").lightSlider({
    controls: true,
    item: 3,
    pager: false,
    enableTouch: true,
    auto: true,
    loop: true,
    pauseOnHover: true,
  });
  $("#holidaySlider").lightSlider({
    controls: true,
    item: 2.8,
    pager: true,
    enableTouch: true,
  });
});
