<?php
namespace Datwyler\OfficeExt\Domain\Model;

/***************************************************************
 *
 *  Copyright notice
 *
 *  (c) 2016
 *
 *  All rights reserved
 *
 *  This script is part of the TYPO3 project. The TYPO3 project is
 *  free software; you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation; either version 3 of the License, or
 *  (at your option) any later version.
 *
 *  The GNU General Public License can be found at
 *  http://www.gnu.org/copyleft/gpl.html.
 *
 *  This script is distributed in the hope that it will be useful,
 *  but WITHOUT ANY WARRANTY; without even the implied warranty of
 *  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *  GNU General Public License for more details.
 *
 *  This copyright notice MUST APPEAR in all copies of the script!
 ***************************************************************/

/**
 * BranchOffice
 */
class BranchOffice extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity
{

    /**
     * name
     *
     * @var string
     */
    protected $name = '';
    
    /**
     * address
     *
     * @var string
     */
    protected $address = '';
    
    /**
     * city
     *
     * @var string
     */
    protected $city = '';

    /**
     * cityInfo
     *
     * @var string
     */
    protected $cityInfo = '';
    
    /**
     * zip
     *
     * @var string
     */
    protected $zip = '';
    
    /**
     * siteUrl
     *
     * @var string
     */
    protected $siteUrl = '';
    
    /**
     * image
     *
     * @var \TYPO3\CMS\Extbase\Domain\Model\FileReference
     */
    protected $image = null;
    
    /**
     * latitude
     *
     * @var float
     */
    protected $latitude = 0.0;
    
    /**
     * longitude
     *
     * @var float
     */
    protected $longitude = 0.0;
    
    /**
     * countryId
     *
     * @var \Datwyler\OfficeExt\Domain\Model\Country
     */
    protected $countryId = null;
    
    /**
     * industryId
     *
     * @var \Datwyler\OfficeExt\Domain\Model\Industry
     */
    protected $industryId = null;
    
    /**
     * Returns the name
     *
     * @return string $name
     */
    public function getName()
    {
        return $this->name;
    }
    
    /**
     * Sets the name
     *
     * @param string $name
     * @return void
     */
    public function setName($name)
    {
        $this->name = $name;
    }
    
    /**
     * Returns the address
     *
     * @return string $address
     */
    public function getAddress()
    {
        return $this->address;
    }
    
    /**
     * Sets the address
     *
     * @param string $address
     * @return void
     */
    public function setAddress($address)
    {
        $this->address = $address;
    }
    
    /**
     * Returns the city
     *
     * @return string $city
     */
    public function getCity()
    {
        return $this->city;
    }
    
    /**
     * Sets the city
     *
     * @param string $city
     * @return void
     */
    public function setCity($city)
    {
        $this->city = $city;
    }
    
     /**
     * Returns the cityInfo
     *
     * @return string $cityInfo
     */
    public function getCityInfo()
    {
        return $this->cityInfo;
    }
    
    /**
     * Sets the cityInfo
     *
     * @param string $cityInfo
     * @return void
     */
    public function setCityInfo($cityInfo)
    {
        $this->cityInfo = $cityInfo;
    }

    /**
     * Returns the zip
     *
     * @return string $zip
     */
    public function getZip()
    {
        return $this->zip;
    }
    
    /**
     * Sets the zip
     *
     * @param string $zip
     * @return void
     */
    public function setZip($zip)
    {
        $this->zip = $zip;
    }
    
    /**
     * Returns the siteUrl
     *
     * @return string $siteUrl
     */
    public function getSiteUrl()
    {
        return $this->siteUrl;
    }
    
    /**
     * Sets the siteUrl
     *
     * @param string $siteUrl
     * @return void
     */
    public function setSiteUrl($siteUrl)
    {
        $this->siteUrl = $siteUrl;
    }
    
    /**
     * Returns the image
     *
     * @return \TYPO3\CMS\Extbase\Domain\Model\FileReference $image
     */
    public function getImage()
    {
        return $this->image;
    }
    
    /**
     * Sets the image
     *
     * @param \TYPO3\CMS\Extbase\Domain\Model\FileReference $image
     * @return void
     */
    public function setImage(\TYPO3\CMS\Extbase\Domain\Model\FileReference $image)
    {
        $this->image = $image;
    }
    
    /**
     * Returns the latitude
     *
     * @return float $latitude
     */
    public function getLatitude()
    {
        return $this->latitude;
    }
    
    /**
     * Sets the latitude
     *
     * @param float $latitude
     * @return void
     */
    public function setLatitude($latitude)
    {
        $this->latitude = $latitude;
    }
    
    /**
     * Returns the longitude
     *
     * @return float $longitude
     */
    public function getLongitude()
    {
        return $this->longitude;
    }
    
    /**
     * Sets the longitude
     *
     * @param float $longitude
     * @return void
     */
    public function setLongitude($longitude)
    {
        $this->longitude = $longitude;
    }
    
    /**
     * Returns the countryId
     *
     * @return \Datwyler\OfficeExt\Domain\Model\Country $countryId
     */
    public function getCountryId()
    {
        return $this->countryId;
    }
    
    /**
     * Sets the countryId
     *
     * @param \Datwyler\OfficeExt\Domain\Model\Country $countryId
     * @return void
     */
    public function setCountryId(\Datwyler\OfficeExt\Domain\Model\Country $countryId)
    {
        $this->countryId = $countryId;
    }
    
    /**
     * Returns the industryId
     *
     * @return \Datwyler\OfficeExt\Domain\Model\Industry $industryId
     */
    public function getIndustryId()
    {
        return $this->industryId;
    }
    
    /**
     * Sets the industryId
     *
     * @param \Datwyler\OfficeExt\Domain\Model\Industry $industryId
     * @return void
     */
    public function setIndustryId(\Datwyler\OfficeExt\Domain\Model\Industry $industryId)
    {
        $this->industryId = $industryId;
    }

}