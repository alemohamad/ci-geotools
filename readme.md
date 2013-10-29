# CodeIgniter Helper: Address geocoder

**ci-geocoder**

## About this helper

This CodeIgniter's helper is used to retrieve latitude and longitude of a custom address. The information is retrieved from Google Maps.  
  
Its usage is recommended for CodeIgniter 2 or greater.  

## Usage

```php
$this->load->helper('geocoder');

$georesult = Geocoder('Boston, Massachusetts, United States');

$lat  = $georesult->lat;
$long = $georesult->long;
```

![Ale Mohamad](http://alemohamad.com/github/logo2012am.png)
