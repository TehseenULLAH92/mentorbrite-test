@extends('layouts.app')

@section('content')
<div class="map-content content-area container-fluid">
	<div class="row">
		<div class="col-lg-4 map-content-sidebar">
			<div class="properties-map-search">
				<div class="properties-map-search-content search-area">
					<div class="row">
					</div>
				</div>
			</div>
			<div class="map-content-separater hidden-sm hidden-xs"></div>
			<div class="clearfix"></div>
			<div class="title-area hidden-sm hidden-xs">
				<h2 class="pull-left">restaurants</h2>
				<div class="clearfix"></div>
			</div>
			<div class="fetching-properties hidden-sm hidden-xs"></div>
		</div>
		<div class="col-lg-8">
			<div class="row">
				<div id="map"></div>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">
var restaurants = {
	"data": [
		<?php foreach ($restaurants as $key => $restaurant): ?>
		{
			"id": <?=$restaurant->id?>,
			"name": "<?=$restaurant->name?>",
			"street": "<?=$restaurant->street?>",
			"city": "<?=$restaurant->city?>",
			"latitude": <?=$restaurant->latitude?>,
			"longitude": <?=$restaurant->longitude?>,
			"type_icon": "assets/img/building.png"
		},
		<?php endforeach; ?>
	]
};
function drawInfoWindow(restaurant) {
	var id = 'N/A';
	if (restaurant.id) {
		id = restaurant.id
	}
	var name = '';
	if (restaurant.name) {
		name = restaurant.name
	}
	var street = "N/A";
	if (restaurant.street) {
		street = restaurant.street
	}
	var city = "N/A";
	if (restaurant.city) {
		city = restaurant.city
	}
	var latitude = "N/A";
	if (restaurant.latitude) {
		latitude = restaurant.latitude
	}
	var longitude = "N/A";
	if (restaurant.longitude) {
		longitude = restaurant.longitude
	}
	var ibContent = '';
	ibContent =
	"<div class='map-properties'>" +
	"<div class='map-content'>" +
	"<div class='map-content-top'><h4>Name: " + name + "</h4>" +
	"<p class='address'> <i class='fa fa-map-marker metro-sign'></i>Street: " + street + " <span class='line_2'>2</span><span class='line_7'>7</span></p></div>" +
	"<p class='description'>City: " + city + "</p>" +
	"</div>";
	return ibContent;
}
function insertrestaurantToArray(restaurant, layout) {
	var name = 'N/A';
	if (restaurant.name) {
		name = restaurant.name
	}
	var street = '';
	if (restaurant.street) {
		street = restaurant.street
	}
	var city = '';
	if (restaurant.city) {
		city = restaurant.city
	}
	var latitude = '';
	if (restaurant.latitude) {
		latitude = restaurant.latitude
	}
	var longitude = '';
	if (restaurant.longitude) {
		longitude = restaurant.longitude
	}
	var element = '';
	if(layout == 'grid_layout'){
		element += '<div class="col-lg-6 col-md-6 col-sm-6">\n' +
		'                        <div class="property-box">\n' +
		'                            <div class="detail">\n' +
		'                                <h1 class="title">\n' +
		'                                    <h6>Name: '+name+'</h6>\n' +
		'                                </h1>\n' +
		'                                <div class="location">\n' +
		'                                    <a href="properties-details/'+ street +'">\n' +
		'                                        <i class="fa fa-map-marker metro-sign"></i>Street: '+street+'<span class="line_2">2</span><span class="line_7">7</span>\n' +
		'                                    </a>\n' +
		'                                </div>\n' +
		'                                <ul class="facilities-list clearfix">\n' +
		'                                    <li>\n' +
		'                                        <i class="flaticon-city"></i>City:  '+city+' Bedrooms\n' +
		'                                    </li>\n' +
		'                                </ul>\n' +
		'                            </div>\n' +
		'                        </div>\n' +
		'                    </div>';
	}
	else{
		element = '<div class="property-box-5">\n' +
		'                    <div class="row">\n' +
		'                        <div class="col-lg-7 col-md-7 align-self-center col-pad">\n' +
		'                            <div class="detail">\n' +
		'                                <h1 class="title">\n' +
		'                                    <h6> Name: '+name+'</h6>\n' +
		'                                </h1>\n' +
		'                                <p> Street: '+street+'</p>\n' +
		'                                <ul class="facilities-list clearfix">\n' +
		'                                    <li>\n' +
		'                                        <i class="flaticon-city"></i> City: '+ city +' \n' +
		'                                    </li>\n' +
		'                                </ul>\n' +
		'                            </div>\n' +
		'                        </div>\n' +
		'                    </div>\n' +
		'                </div>';
	}
	return element;
}
function animatedMarkers(map, propertiesMarkers, restaurants, layout) {
	var bounds = map.getBounds();
	var propertiesArray = [];
	$.each(propertiesMarkers, function (key, value) {
		if (bounds.contains(propertiesMarkers[key].getLatLng())) {
			propertiesArray.push(insertrestaurantToArray(restaurants.data[key], layout));
			setTimeout(function () {
				if (propertiesMarkers[key]._icon != null) {
					propertiesMarkers[key]._icon.className = 'leaflet-marker-icon leaflet-zoom-animated leaflet-clickable bounce-animation marker-loaded';
				}
			}, key * 50);
		}
		else {
			if (propertiesMarkers[key]._icon != null) {
				propertiesMarkers[key]._icon.className = 'leaflet-marker-icon leaflet-zoom-animated leaflet-clickable';
			}
		}
	});
	$('.fetching-properties').html(propertiesArray);
}
function generateMap(latitude, longitude, mapProvider, layout) {
	var map = L.map('map', {
		center: [latitude, longitude],
		zoom: 15,
		scrollWheelZoom: true
	});
	L.tileLayer.provider(mapProvider).addTo(map);
	var markers = L.markerClusterGroup({
		showCoverageOnHover: false,
		zoomToBoundsOnClick: false
	});
	var propertiesMarkers = [];
	$.each(restaurants.data, function (index, restaurant) {
		var icon = '<img src="assets/logos/logos/logo.png">';
		if (restaurant.type_icon) {
			icon = '<img src="' + restaurant.type_icon + '">';
		}
		var color = '';
		var markerContent =
		'<div class="map-marker ' + color + '">' +
		'<div class="icon">' +
		icon +
		'</div>' +
		'</div>';
		var _icon = L.divIcon({
			html: markerContent,
			iconSize: [36, 46],
			iconAnchor: [18, 32],
			popupAnchor: [130, -28],
			className: ''
		});
		var marker = L.marker(new L.LatLng(restaurant.latitude, restaurant.longitude), {
			title: restaurant.title,
			icon: _icon
		});
		propertiesMarkers.push(marker);
		marker.bindPopup(drawInfoWindow(restaurant));
		markers.addLayer(marker);
		marker.on('popupopen', function () {
			this._icon.className += ' marker-active';
		});
		marker.on('popupclose', function () {
			this._icon.className = 'leaflet-marker-icon leaflet-zoom-animated leaflet-clickable marker-loaded';
		});
	});
	map.addLayer(markers);
	animatedMarkers(map, propertiesMarkers, restaurants, layout);
	map.on('moveend', function () {
		animatedMarkers(map, propertiesMarkers, restaurants, layout);
	});
	$('.fetching-properties .item').hover(
		function () {
			propertiesMarkers[$(this).attr('id') - 1]._icon.className = 'leaflet-marker-icon leaflet-zoom-animated leaflet-clickable marker-loaded marker-active';
		},
		function () {
			propertiesMarkers[$(this).attr('id') - 1]._icon.className = 'leaflet-marker-icon leaflet-zoom-animated leaflet-clickable marker-loaded';
		}
	);
	$('.geolocation').on("click", function () {
		map.locate({setView: true})
	});
	$('#map').removeClass('fade-map');
}
</script>
@endsection
