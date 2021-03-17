(function(A) {

	if (!Array.prototype.forEach)
		A.forEach = A.forEach || function(action, that) {
			for (var i = 0, l = this.length; i < l; i++)
				if (i in this)
					action.call(that, this[i], i, this);
			};

		})(Array.prototype);

		var
		mapObject,
		markers = [],
		markersData = {
			'Marker': [
			{	
				location_latitude: 48.866024, 
				location_longitude: 2.340041,
				locationURL: 'single-listing-1.html',
				locationImg: 'https://via.placeholder.com/1200x800',
				propertyprice: '$220',
				propertytype: 'Hotel',
				propertyname: '2014 Bastin Drive, USA',
				propertytime: 'Person'
			},
			{
				location_latitude: 48.868560,
				location_longitude: 2.349427,
				locationURL: 'single-listing-1.html',
				locationImg: 'https://via.placeholder.com/1200x800',
				propertyprice: '$920',
				propertytype: 'Wedding',
				propertyname: 'Mangalam Wedding Panner',
				propertytime: 'We'
			},
			{
				location_latitude: 48.870824, 
				location_longitude: 2.333005,
				locationURL: 'single-listing-1.html',
				locationImg: 'https://via.placeholder.com/1200x800',
				propertyprice: '$280',
				propertytype: 'Spa',
				propertyname: 'Shruthi Spa & Massage',
				propertytime: 'Person'
			},
			{
				location_latitude: 48.864642,
				location_longitude: 2.345837,
				locationURL: 'single-listing-1.html',
				locationImg: 'https://via.placeholder.com/1200x800',
				propertyprice: '$240',
				propertytype: 'Food',
				propertyname: 'Netshafe Pizza Housey',
				propertytime: 'mo'
			},
			{
				location_latitude: 48.861753, 
				location_longitude: 2.338402,
				locationURL: 'single-listing-1.html',
				locationImg: 'https://via.placeholder.com/1200x800',
				propertyprice: '$820',
				propertytype: 'Life Style',
				propertyname: 'Blue Rare Night Bar',
				propertytime: 'Night'
			},
			{
				location_latitude: 48.872111,
				location_longitude: 2.345151,
				locationURL: 'single-listing-1.html',
				locationImg: 'https://via.placeholder.com/1200x800',
				propertyprice: '$260',
				propertytype: 'Music',
				propertyname: 'Muskan Music & Light Sound',
				propertytime: 'mo'
			},
			
			{
				location_latitude: 48.865881, 
				location_longitude: 2.341507,
				locationURL: 'single-listing-1.html',
				locationImg: 'https://via.placeholder.com/1200x800',
				propertyprice: '$320',
				propertytype: 'Hotel',
				propertyname: '2014 Bastin Drive, USA',
				propertytime: 'mo'
			},
			{
				location_latitude: 48.867236, 
				location_longitude: 2.343610, 
				locationURL: 'single-listing-1.html',
				locationImg: 'https://via.placeholder.com/1200x800',
				propertyprice: '$150',
				propertytype: 'Wedding',
				propertyname: 'Mangalam Wedding Panner',
				propertytime: 'Booking'
			}
			
			]

		};

			var mapOptions = {
				zoom:15,
				center: new google.maps.LatLng(48.867236, 2.343610),
				mapTypeId: google.maps.MapTypeId.satellite,

				mapTypeControl: false,
				mapTypeControlOptions: {
					style: google.maps.MapTypeControlStyle.DROPDOWN_MENU,
					position: google.maps.ControlPosition.LEFT_CENTER
				},
				panControl: false,
				panControlOptions: {
					position: google.maps.ControlPosition.TOP_RIGHT
				},
				zoomControl: true,
				zoomControlOptions: {
					position: google.maps.ControlPosition.RIGHT_BOTTOM
				},
				scrollwheel: false,
				scaleControl: false,
				scaleControlOptions: {
					position: google.maps.ControlPosition.TOP_LEFT
				},
				streetViewControl: true,
				streetViewControlOptions: {
					position: google.maps.ControlPosition.LEFT_TOP
				}
				
			};
			var marker;
			mapObject = new google.maps.Map(document.getElementById('map'), mapOptions);
			for (var key in markersData)
				markersData[key].forEach(function (item) {
					marker = new google.maps.Marker({
						position: new google.maps.LatLng(item.location_latitude, item.location_longitude),
						map: mapObject,
						icon: 'assets/img/marker.png',
					});

					if ('undefined' === typeof markers[key])
						markers[key] = [];
					markers[key].push(marker);
					google.maps.event.addListener(marker, 'click', (function () {
				  closeInfoBox();
				  getInfoBox(item).open(mapObject, this);
				  mapObject.setCenter(new google.maps.LatLng(item.location_latitude, item.location_longitude));
				 }));

	});

	new MarkerClusterer(mapObject, markers[key]);
	
		function hideAllMarkers () {
			for (var key in markers)
				markers[key].forEach(function (marker) {
					marker.setMap(null);
				});
		};
	
	

		function closeInfoBox() {
			$('div.infoBox').remove();
		};

		function getInfoBox(item) {
			return new InfoBox({
				content:'<div class="map-popup-wrap"><div class="map-popup"><div class="Reveal-adventure-grid property-2"><div class="Reveal-adventure-wrap"><div class="list-single-img"><a href="' + item.locationURL + '"><img src="' + item.locationImg + '" class="img-fluid mx-auto" alt="" /></a></div><span class="property-type">' + item.propertytype + '</span></div><div class="Reveal-adventure-detail pb-0"><div class="Reveal-adventure-detail-min"><h4 class="listing-name"><a href="' + item.locationURL + '">' + item.propertyname + '</a><i class="list-status ti-check"></i></h4></div></div><div class="price-features-wrapper"><div class="listing-price-fx"><h6 class="listing-card-info-price price-prefix">' + item.propertyprice + '<span class="price-suffix">/' + item.propertytime + '</span></h6></div></div></div></div></div>',
				disableAutoPan: false,
				maxWidth: 0,
				pixelOffset: new google.maps.Size(10, 92),
				closeBoxMargin: '',
				closeBoxURL:'assets/img/small-close.png',
				isHidden: false,
				alignBottom: true,
				pane: 'floatPane',
				enableEventPropagation: true
			});
		};
		function onHtmlClick(location_type, key){
			 google.maps.event.trigger(markers[location_type][key], "click");
		}