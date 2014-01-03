<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

// Geo Tools
// 
// The Geocoder() method returns an object that has the latitude and longitude of an address.
// The Geodistance() method returns an object that has the distance and duration between two addresses.
// The information is retrieved from Google Maps.

class GeoCode {
    public $lat;
    public $long;
}

class GeoDistance {
    public $distance_text;
    public $distance_value;
    public $duration_text;
    public $duration_value;
}

function Geocoder($address)
{
    $geocode = @file_get_contents('http://maps.google.com/maps/api/geocode/json?address=' . urlencode($address) . '&sensor=false');

    $output = json_decode($geocode);

    $info = new GeoCode();

    if( $output->status == 'OK' ) {
        $info->lat  = $output->results[0]->geometry->location->lat;
        $info->long = $output->results[0]->geometry->location->lng;
    } else {
        $info->lat  = 0;
        $info->long = 0;
    }

    return $info;
}

function Geodistance($address1, $address2)
{
    $geoaddress = @file_get_contents('http://maps.googleapis.com/maps/api/distancematrix/json?origins=' . urlencode($address1) . '&destinations=' . urlencode($address2) . '&mode=driving&language=en-EN&sensor=false');

    $output = json_decode($geoaddress);

    $info = new GeoDistance();

    if( $output->status == 'OK' ) {
        $info->distance_text  = $output->rows[0]->elements[0]->distance->text;
        $info->distance_value = $output->rows[0]->elements[0]->distance->value;
        $info->duration_text  = $output->rows[0]->elements[0]->duration->text;
        $info->duration_value = $output->rows[0]->elements[0]->duration->value;
    } else {
        $info->distance_text  = 0;
        $info->distance_value = 0;
        $info->duration_text  = 0;
        $info->duration_value = 0;
    }

    return $info;
}

/* End of file geotools_helper.php */
/* Location: ./application/helpers/geotools_helper.php */