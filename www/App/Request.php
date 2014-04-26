<?php
namespace App;

use GoogleMapsGeocoder;

class Request
{
	/**
	 * @var \GoogleMapsGeocoder
	 */
	private $_maps;

	private $_result;

	public function __construct()
	{
		$this->_maps = new GoogleMapsGeocoder();
	}

    public function isValidRequest()
    {
        return (isset($_POST['rua']) && $_POST['rua'] !== false) 
        	? true 
        	: false;
    }

    public function validateStreet()
    {
    	if (! $this->isValidRequest()) {
    		throw new \InvalidArgumentException('Rua não é válida!');
    	}

    	$this->_maps->setAddress($_POST['rua']);
    	$this->_result = $this->_maps->geocode();

    	return ($this->_result['status'] == 'OK') ? true : false;
    }

    public function getGeolocation()
    {
    	return isset($this->_result['results'][0]['geometry']['bounds']['northeast'])
    		? $this->_result['results'][0]['geometry']['bounds']['northeast']
    		: false;
    }
}
