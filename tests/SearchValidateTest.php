<?php 

use PHPUnit_Framework_TestCase as PHPUnit;
use Application\Entity\Search as Search;
use Application\Validate\Search as ValidateSearch; 

class SearchValidateTest extends PHPUnit
{
    protected $_validateSearch = null;
    protected $_entitySearch = null;

    public function setUp()
    {
        $this->_entitySearch = new Search;
        $this->_validateSearch = new ValidateSearch;
    }

    public function testVerificaSeNaoExisteChaveAddressNoPostRecebido()
    {
        $this->assertFalse($this->_validateSearch->isAddressExist(), "Não contém o endereço");
    }

    public function testVerificaSeExisteChaveAddressNoPostRecebido()
    {
        $_POST['address'] = true;
        $this->assertTrue($this->_validateSearch->isAddressExist());
    }

    public function testEnderecoNaoVazio()
    {
        $this->_entitySearch->setAddress('Avenida Barão de Maruim');
        $this->assertNotEmpty($this->_entitySearch->getAddress());
    }

    public function testRetornaTamanhoStringEndereco()
    {
        $this->assertInternalType('int', $this->_validateSearch->lengthAddress('Rua'));
    }

    public function testMinimoDezCaracteresNoEndereco()
    {
        $this->_entitySearch->setAddress('Avenida Barão de Maruim');
        $this->assertGreaterThanOrEqual(10, $this->_validateSearch->lengthAddress($this->_entitySearch->getAddress()));
    }

    public function tearDown()
    {

    }
}