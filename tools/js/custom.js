// custom script for quantumscientific web application

document.addEventListener("DOMContentLoaded", function(){

	//code
	$('.preloader-background').delay(400).fadeOut(400);
	//$('.preloader-wrapper').delay(250).fadeOut(500);
	$('.spinner').delay(300).fadeOut(800);

	$('.header_links').delay(700).addClass('animated fadeInLeftBig slow');
	$('#quantumstrip').delay(800).addClass('animated fadeInDown');
	$('.admin_links').delay(700).addClass('animated fadeInLeftBig slow');
	$('.contentwrap').delay(700).addClass('animated fadeInRightBig slow');

});// end: addEventListener [ DOMContentLoaded ]

$(function() {

	//code
	
// editing picture thing
function postPic(event){
		var input = event.target;
		var reader = new FileReader();
		reader.onload = function(){
			var dataURL = reader.result;
			var output = document.getElementById('img1');
			//output.src = dataURL;
			output.style.backgroundImage = "url('"+ dataURL +"')";
		};
		reader.readAsDataURL(input.files[0]);
	}
// end editing pic thing

	$('.carousel.carousel-slider').carousel({
		fullWidth: true,
		indicators: true,
	});

	$('.collapsible').collapsible();

	$('.fixed-action-btn').floatingActionButton();

	$('select').formSelect();

	$('.carousel.carousel-slider').carousel({
		fullWidth: true,
		indicators: true,
	});

	$('.aboutTabs').tabs({
		swipeable:true,
	});
	$('.tabs').tabs();

	$('.collapsibleCheckout').collapsible();

	var quantumstripV = $('#quantumstrip video');

	//console.log( quantumstripV.width() );

	$('.dropdown-trigger').dropdown({
		hover:false,
		onOpenStart:function(){
			//console.log('hi');
		},
		alignment:'right'
	});

	$('.sidenav').sidenav({
		edge:'right'
	});
	
// creating an array containing names of towns in Kenya
	var kenyaTowns = ['Nairobi','Mombasa','Kisumu','Nakuru','Eldoret','Ruiru','Kikuyu','Kangundo-Tala','Malindi','Naivasha','Kitui','Machakos','Thika','Athi River','Nyeri','Kilifi','Ngong','Limuru','Kiambu','Kitengela','Ongata Rongai','Juja','Siaya','Westlands','Langata','Kileleshwa','Karen','Kasarani','Kilimani','Buruburu','Nairobi West','Langata'];
	
	var options = '';
	
	for(var i = 0; i < kenyaTowns.length; i++){
	    options += '<option value="'+ kenyaTowns[i] +'">'+ kenyaTowns[i] +'</option>';
	    // <option>Detroit Lions</option>
	}// end for-insert-options
	
	//console.log( options );
	document.getElementById('kenya_town_list').innerHTML = options;
	
// end towns

// test geolocation

var output = document.getElementById('out');

if (!navigator.geolocation){
    output.innerHTML = "<p>Geolocation is not supported by your browser</p>";
    console.log( "Geolocation is not supported by your browser" );
    return;
  } else{
      console.log( 'Geolocation is supported by your browser' );
  }
  
  function find(){
      console.log( 'Starting find-process.' );
      alert( 'Ndio kuanza' );
  }

function geoFindMe() {

  function success(position) {
    var latitude  = position.coords.latitude;
    var longitude = position.coords.longitude;

    output.innerHTML = '<p>Latitude is ' + latitude + '° <br>Longitude is ' + longitude + '°</p>';

    var img = new Image();
    img.src = "https://maps.googleapis.com/maps/api/staticmap?center=" + latitude + "," + longitude + "&zoom=13&size=300x300&sensor=false";

    output.appendChild(img);
  }

  function error() {
    output.innerHTML = "Unable to retrieve your location";
  }

  output.innerHTML = "<p>Locating…</p>";

  navigator.geolocation.getCurrentPosition(success, error);
}

// end test

	// index_services_wrap
	/*
	$('#index_services_wrap').waypoint({
		handler: function(direction) {
			console.log(this.element.id + ' hit');
			$(this).addClass( 'animated slideInDown' );
		},
		offset:'25%',
	});*/

});// end: MAIN FUNCTION WRAP