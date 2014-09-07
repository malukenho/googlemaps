<?php 
namespace Application\Map\Validate;

/**
 * Class Validate Address.
 *
 * Provide a Address validation for a {@see Application\Map\Address} Value Object.
 *
 * @package Application\Map\Validate
 */
class Address
{
    /**
     * @var \Application\Map\Address
     */
    private $address;

    /**
     * Constructor.
     *
     * @param \Application\Map\Address $address
     */
    public function __construct(\Application\Map\Address $address)
    {
        $this->address = $address;
    }

    /**
     * Getting the length value of setted address
     *
     * @internal param $address
     * @return int
     */
    public function length()
    {
        return strlen($this->address->getAddress());
    }
}