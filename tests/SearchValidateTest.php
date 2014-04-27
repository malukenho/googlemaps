<?php 

use PHPUnit_Framework_TestCase as PHPUnit;
use Application\Validate\Search as ValidateSearch; 

class SearchValidateTest extends PHPUnit
{
    protected $_validateSearch = null;
    public function setUp()
    {
        $this->_validateSearch = new ValidateSearch;
    }

    public function testVerificaSeNaoExisteChaveAddressNoPostRecebido()
    {
        $this->assertFalse($this->_validateSearch->isAddressExist(), "Não contém o endereço");
    }

    public function testVerificaSeExisteChaveAddressNoPostRecebido()
    {
        $_POST['address'] = null;
        $this->assertFalse($this->_validateSearch->isAddressExist());
    }

    public function tearDown()
    {

    }
}