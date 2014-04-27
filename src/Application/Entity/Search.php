<?php 
namespace Application\Entity;
use Application\Validate\Search as ValidateSearch;

class Search
{
    protected $_address = '';
    /**
     * @param string $address 
     */ 
    public function setAddress($address)
    {
        $this->_address = $address;
    }

    public function getAddress()
    {
        $validate = new ValidateSearch;
        if( $validate->lengthAddress($this->_address) < 10 ) {
            throw new \Exception ('Endereço Inválido');
        }

        return $this->_address;
    }
}