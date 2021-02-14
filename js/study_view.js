$(document).ready(function(){
	$(".s_fav").click(function(){
		var $rel = $(this).attr("rel");

		$.ajax({
			url : './study_fav.php?num='+$rel,
			type : 'GET',
			cache : false,
			success : function(data){
				console.log(data);  //7
				$(".s_fav span").text(data);
			}
		});
		return false;
	});


	

});







var $s_location = [
  ["강남-그린램프라이브러리", "37.580093", "126.968718", "img/baseline-explore-24px.svg", "주소-01"],
  ["강남-작심스터디카페", "37.49859107334055", "127.02524494174449", "img/baseline-explore-24px.svg", "주소-01"],
  ["강남-시작스터디카페", "37.498839312999806", "127.05832324121835", "img/baseline-explore-24px.svg", "주소-01"],
  ["그린램프라이브러리", "37.570093", "126.968718", "img/baseline-explore-24px.svg", "주소-01"],
  ["작심스터디카페", "37.179605", "126.980412", "img/baseline-pets-24px.svg", "주소-02"],
  ["작심스터디", "37.538394", "126.998525", "img/baseline-verified_user-24px.svg", "주소-03"],
  ["그린램프라이브러리", "37.483858", "127.044303", "img/baseline-pets-24px.svg", "주소-04"]
];

var map;
function initMap() {
  var cur_Lo = {lat: 37.521274, lng: 126.986735}; //lat(latitude, 위도), lng(longitude, 경도)
  map = new google.maps.Map(document.getElementById('map'), {
    center: cur_Lo,
    zoom: 16,
    mapTypeId: google.maps.MapTypeId.ROADMAP
  });
  var infowindow = new google.maps.InfoWindow();
  var marker, i;
  for(i=0; i<$s_location.length; i++){
    marker = new google.maps.Marker({
      position: new google.maps.LatLng($s_location[i][1], $s_location[i][2]),
      map: map,
      icon : $s_location[i][3]
    });
    google.maps.event.addListener(marker, 'click', (function(marker, i) {
      return function() {
        infowindow.setContent($s_location[i][0]);
        infowindow.open(map, marker);
        // document.getElementById("title").innerHTML = $s_location[i][0];
        // document.getElementById("address").innerHTML = $s_location[i][4];
      }
    })(marker, i));
  }
}