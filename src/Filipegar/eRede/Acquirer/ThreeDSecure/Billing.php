<?php

namespace Filipegar\eRede\Acquirer\ThreeDSecure;

class Billing implements \JsonSerializable
{
    private $address;
    private $city;
    private $postalcode;
    private $state;
    private $country;
    private $emailAddress;
    private $phoneNumber;

    public static function fromJson($json)
    {
        $object = json_decode($json);

        $billing = new Billing();
        $billing->populate($object);

        return $billing;
    }

    public function populate(\stdClass $data)
    {
        if (isset($data->threeDSecure->billing)) {
            $this->address = isset($data->threeDSecure->billing->address) ? $data->threeDSecure->billing->address : null;
            $this->city = isset($data->threeDSecure->billing->city) ? $data->threeDSecure->billing->city : null;
            $this->postalcode = isset($data->threeDSecure->billing->postalcode) ? $data->threeDSecure->billing->postalcode : null;
            $this->state = isset($data->threeDSecure->billing->state) ? $data->threeDSecure->billing->state : null;
            $this->country = isset($data->threeDSecure->billing->country) ? $data->threeDSecure->billing->country : null;
            $this->emailAddress = isset($data->threeDSecure->billing->emailAddress) ? $data->threeDSecure->billing->emailAddress : null;
            $this->phoneNumber = isset($data->threeDSecure->billing->phoneNumber) ? $data->threeDSecure->billing->phoneNumber : null;
        }
    }

    public function getAddress()
    {
        return $this->address;
    }

    public function setAddress($address)
    {
        $this->address = $address;
    }

    public function getCity()
    {
        return $this->city;
    }

    public function setCity($city)
    {
        $this->city = $city;
    }

    public function getPostalcode()
    {
        return $this->postalcode;
    }

    public function setPostalcode($postalcode)
    {
        $this->postalcode = $postalcode;
    }

    public function getState()
    {
        return $this->state;
    }

    public function setState($state)
    {
        $this->state = $state;
    }

    public function getCountry()
    {
        return $this->country;
    }

    public function setCountry($country)
    {
        $this->country = $country;
    }

    public function getEmailAdress()
    {
        return $this->emailAddress;
    }

    public function setEmailAdress($emailAddress)
    {
        $this->emailAddress = $emailAddress;
    }

    public function getPhoneNumber()
    {
        return $this->phoneNumber;
    }

    public function setPhoneNumber($phoneNumber)
    {
        $this->phoneNumber = $phoneNumber;
    }

    /**
     * @return array
     */
    public function jsonSerialize()
    {
        $data = get_object_vars($this);
        foreach ($data as $key => $value) {
            if (is_null($value)) {
                unset($data[$key]);
            }
        }

        return $data;
    }
}
