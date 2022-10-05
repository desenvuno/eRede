<?php

namespace Filipegar\eRede\Acquirer\ThreeDSecure;

class Device implements \JsonSerializable
{

    private $colorDepth;
    private $deviceType3ds;
    private $javaEnabled;
    private $language;
    private $screenHeight;
    private $screenWidth;
    private $timeZoneOffset;

    public static function fromJson($json)
    {
        $object = json_decode($json);

        $device = new Device();
        $device->populate($object);

        return $device;
    }

    public function populate(\stdClass $data)
    {
        if (isset($data->threeDSecure->device)) {
            $this->colorDepth = isset($data->threeDSecure->device->colorDepth) ? $data->threeDSecure->device->colorDepth : null;
            $this->deviceType3ds = isset($data->threeDSecure->device->deviceType3ds) ? $data->threeDSecure->device->deviceType3ds : null;
            $this->javaEnabled = isset($data->threeDSecure->device->javaEnabled) ? $data->threeDSecure->device->javaEnabled : null;
            $this->language = isset($data->threeDSecure->device->language) ? $data->threeDSecure->device->language : null;
            $this->screenHeight = isset($data->threeDSecure->device->screenHeight) ? $data->threeDSecure->device->screenHeight : null;
            $this->screenWidth = isset($data->threeDSecure->device->screenWidth) ? $data->threeDSecure->device->screenWidth : null;
            $this->timeZoneOffset = isset($data->threeDSecure->device->timeZoneOffset) ? $data->threeDSecure->device->timeZoneOffset : null;
        }
    }

    /**
     * @return int
     */
    public function getColorDepth()
    {
        return $this->colorDepth;
    }

    /**
     * @param int $colorDepth
     */
    public function setColorDepth($colorDepth)
    {
        $this->colorDepth = $colorDepth;
    }

    /**
     * @return string
     */
    public function getDeviceType3ds()
    {
        return $this->deviceType3ds;
    }

    /**
     * @param string $deviceType3ds
     */
    public function setDeviceType3ds($deviceType3ds)
    {
        $this->deviceType3ds = $deviceType3ds;
    }

    /**
     * @return string
     */
    public function getJavaEnabled()
    {
        return $this->javaEnabled;
    }

    /**
     * @param string $javaEnabled
     */
    public function setJavaEnabled($javaEnabled)
    {
        $this->javaEnabled = boolval($javaEnabled);
    }

    /**
     * @return string
     */
    public function getLanguage()
    {
        return $this->language;
    }

    /**
     * @param string $language
     */
    public function setLanguage($language)
    {
        $this->language = $language;
    }

    /**
     * @return int
     */
    public function getScreenHeight()
    {
        return $this->screenHeight;
    }

    /**
     * @param int $screenHeight
     */
    public function setScreenHeight($screenHeight)
    {
        $this->screenHeight = $screenHeight;
    }

    /**
     * @return int
     */
    public function getScreenWidth()
    {
        return $this->screenWidth;
    }

    /**
     * @param int $screenWidth
     */
    public function setScreenWidth($screenWidth)
    {
        $this->screenWidth = $screenWidth;
    }

    /**
     * @return int
     */
    public function getTimeZoneOffset()
    {
        return $this->timeZoneOffset;
    }

    /**
     * @param int $timeZoneOffset
     */
    public function setTimeZoneOffset($timeZoneOffset)
    {
        $this->timeZoneOffset = $timeZoneOffset;
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