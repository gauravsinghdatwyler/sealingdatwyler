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
 * ContactPerson
 */
class ContactPerson extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity
{

    /**
     * name
     *
     * @var string
     */
    protected $name = '';
    
    /**
     * email
     *
     * @var string
     */
    protected $email = '';
    
    /**
     * contact
     *
     * @var string
     */
    protected $contact = '';
    
    /**
     * officeId
     *
     * @var \Datwyler\OfficeExt\Domain\Model\BranchOffice
     */
    protected $officeId = null;
    
    /**
     * countryId
     *
     * @var \Datwyler\OfficeExt\Domain\Model\Country
     */
    protected $countryId = null;
    
    /**
     * contactType
     *
     * @var \Datwyler\OfficeExt\Domain\Model\ContactType
     */
    protected $contactType = null;

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
     * Returns the email
     *
     * @return string $email
     */
    public function getEmail()
    {
        return $this->email;
    }
    
    /**
     * Sets the email
     *
     * @param string $email
     * @return void
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }
    
    /**
     * Returns the contact
     *
     * @return string $contact
     */
    public function getContact()
    {
        return $this->contact;
    }
    
    /**
     * Sets the contact
     *
     * @param string $contact
     * @return void
     */
    public function setContact($contact)
    {
        $this->contact = $contact;
    }
    
    /**
     * Returns the officeId
     *
     * @return \Datwyler\OfficeExt\Domain\Model\BranchOffice $officeId
     */
    public function getOfficeId()
    {
        return $this->officeId;
    }
    
    /**
     * Sets the officeId
     *
     * @param \Datwyler\OfficeExt\Domain\Model\BranchOffice $officeId
     * @return void
     */
    public function setOfficeId(\Datwyler\OfficeExt\Domain\Model\BranchOffice $officeId)
    {
        $this->officeId = $officeId;
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
     * Returns the contactType
     *
     * @return \Datwyler\OfficeExt\Domain\Model\ContactType $contactType
     */
    public function getContactType()
    {
        return $this->contactType;
    }
    
    /**
     * Sets the contactType
     *
     * @param \Datwyler\OfficeExt\Domain\Model\ContactType $contactType
     * @return void
     */
    public function setContactType(\Datwyler\OfficeExt\Domain\Model\ContactType $contactType)
    {
        $this->contactType = $contactType;
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