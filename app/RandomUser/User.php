<?php

namespace app\RandomUser;

/**
 *
 * Class User
 * This class defines the user, it includes constructor which required array of datas elements for create the user.
 */
class User
{

    /**
     * Persons gender
     *
     * @var string
     */
    public $_gender;

    /**
     * Persons first name
     *
     * @var string
     */
    public $_first;

    /**
     * Persons last name
     *
     * @var string
     */
    public $_last;

    /**
     * Persons location: street name
     *
     * @var string
     */
    public $_street;

    /**
     * Persons location: number of house
     *
     * @var string
     */
    protected $_number;

    /**
     * Persons location: city
     *
     * @var string
     */
    protected $_city;

    /**
     * Persons location: country
     *
     * @var string
     */
    protected $_country;

    /**
     * Persons location: postcode
     *
     * @var string
     */
    protected $_postcode;

    /**
     * Persons email address
     *
     * @var string
     */
    protected $_email;

    /**
     * Persons phone number
     *
     * @var string
     */
    protected $_phone;

    /**
     * Persons ID: type of ID
     *
     * @var string
     */
    protected $_idType;

    /**
     * Persons ID: value of ID
     *
     * @var string
     */
    protected $_value;

    /**
     * Persons photo: the link
     *
     * @var string
     */
    protected $_large;

    /**
     * Constructor method creates an object of User
     *
     * @param array $userData
     */
    public function __construct($userData)
    {
        $keyStart = '_';
        foreach (array_keys($userData) as $key) {
            $keyData = $keyStart . $key;
            if (array_key_exists($key, $userData)) {
                $this->$keyData = $userData[$key];
            }
        }
    }

    /**
     * This is a getter for the property by key
     *
     * @return string
     */
    public function getData($keyData)
    {
        if (property_exists($this, $keyData)) {
            return $this->$keyData;
        }
    }
}
