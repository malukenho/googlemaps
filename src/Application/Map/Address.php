<?php 
namespace Application\Map;

/**
 * Class Address is a Value Object implementation
 *
 * @package Application\Entity
 */
class Address
{
    /**
     * Storage the address
     *
     * @var string
     */
    protected $address;

    /**
     * Constructor.
     *
     * @param $addressInformation
     */
    public function __construct($addressInformation)
    {
        $this->address = $addressInformation;
    }

    /**
     * Return the address created here
     *
     * @return string
     */
    public function getAddress()
    {
        return $this->address;
    }
}