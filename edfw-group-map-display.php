<?php
$lat = get_post_meta($post->ID, 'pazzey_lat',true);
$lng =  get_post_meta($post->ID, 'pazzey_lng',true);
if ( ( $lat != '' ) && ( $lng != '' ) ) {
?>
<script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?key=AIzaSyCgM6ng7sN8kVj71Av_44UQHT_3Ny2WKP8&sensor=false"></script>
<script type="text/javascript">
	function initialize() {
		var myLatlng = new google.maps.LatLng(<?php echo $lat; ?>, <?php echo $lng; ?>);
		var mapOptions = {
			center: myLatlng,
			zoom: 12,
			mapTypeId: google.maps.MapTypeId.ROADMAP
		};
		var map = new google.maps.Map(document.getElementById("map-canvas"), mapOptions);
		
		var marker = new google.maps.Marker({
			position: myLatlng,
			map: map,
			title:"<?php the_title(); ?>"
		});
		
		var infowindow = new google.maps.InfoWindow({
			content: "<?php the_title(); ?>"
		});
		
		infowindow.open(map,marker);
		
	}
	google.maps.event.addDomListener(window, 'load', initialize);
</script>
<div id="map-canvas" style="width: 100%; height: 500px;" ></div>
<?php } ?>