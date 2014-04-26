<?php

require realpath(__DIR__.'/../App/Request.php');

class TestRequest extends PHPUnit_Framework_TestCase
{
    /**
     * @var App\Request
     */ 
    private $_requesteInstance;

    public function setUp() {
        $this->_requesteInstance = new App\Request;
    }

    public function testVariavelRequeridaFoiEnviada() {
        $_POST['rua'] = true;
        $this->assertTrue(
            $this->_requesteInstance->isValidRequest(),
            'Deveria ser True'
        );

        $_POST['rua'] = false;
        $this->assertFalse(
            $this->_requesteInstance->isValidRequest(),
            'Deveria ser False'
        );
    }

    public function testIsValidStreet()
    {
        $_POST['rua'] = 'Rua panificador Silva, Sergipe, Brasil';
        $this->assertTrue(
            $this->_requesteInstance->validateStreet(),
            'Rua Válida!'
        );

        $_POST['rua'] = 'aosdoiajsdojasdhaodj asjdaiosjdoaijsd';
        $this->assertFalse(
            $this->_requesteInstance->validateStreet(),
            'Rua inválida!'
        );
    }

    public function testGetGeolocation()
    {
        $_POST['rua'] = 'Rua panificador Silva, Sergipe, Brasil';
        $this->_requesteInstance->validateStreet();
        
        $result = $this->_requesteInstance->getGeolocation();
        $this->assertEquals($result['lat'], '-10.9263805');
        $this->assertEquals($result['lng'], '-37.1070898');
    }
}
