# CodeIgniter Helper: Geo Tools

**ci-geotools**

## About this helper

This CodeIgniter's helper is used to retrieve latitude and longitude of a custom address, and also to retrieve distance and duration information between two addresses. The information is retrieved from Google Maps.  
  
Its usage is recommended for CodeIgniter 2 or greater.  

## Usage

```php
$this->load->helper('geotools');

/*****/

$geocode = Geocoder('Boston, Massachusetts, United States');

$lat  = $geocode->lat;
$long = $geocode->long;

/*****/

$geodistance = Geodistance('Boston, MA', 'New York, NY');

$distance_text  = $geodistance->distance_text;
$distance_value = $geodistance->distance_value;
$duration_text  = $geodistance->duration_text;
$duration_value = $geodistance->duration_value;
```

![Ale Mohamad](http://alemohamad.com/github/logo2012am.png)
