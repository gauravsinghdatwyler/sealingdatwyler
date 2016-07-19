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
 * Query
 */
class Query extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity
{

    /**
     * fullName
     *
     * @var string
     */
    protected $fullName = '';
    
    /**
     * email
     *
     * @var string
     */
    protected $email = '';
    
    /**
     * country
     *
     * @var string
     */
    protected $country = '';
    
    /**
     * company
     *
     * @var string
     */
    protected $company = '';
    
    /**
     * message
     *
     * @var string
     */
    protected $message = '';
    
   /**
     * officeId
     *
     * @var \Datwyler\OfficeExt\Domain\Model\BranchOffice
     */
    protected $officeId = null;

   /**
     * contactPerson
     *
     * @var \Datwyler\OfficeExt\Domain\Model\ContactPerson
     */
    protected $contactPerson = null;

    /**
     * Returns the fullName
     *
     * @return string $fullName
     */
    public function getFullName()
    {
        return $this->fullName;
    }
    
    /**
     * Sets the fullName
     *
     * @param string $fullName
     * @return void
     */
    public function setFullName($fullName)
    {
        $this->fullName = $fullName;
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
     * Returns the country
     *
     * @return string $country
     */
    public function getCountry()
    {
        return $this->country;
    }
    
    /**
     * Sets the country
     *
     * @param string $country
     * @return void
     */
    public function setCountry($country)
    {
        $this->country = $country;
    }
    
    /**
     * Returns the company
     *
     * @return string $company
     */
    public function getCompany()
    {
        return $this->company;
    }
    
    /**
     * Sets the company
     *
     * @param string $company
     * @return void
     */
    public function setCompany($company)
    {
        $this->company = $company;
    }
    
    /**
     * Returns the message
     *
     * @return string $message
     */
    public function getMessage()
    {
        return $this->message;
    }
    
    /**
     * Sets the message
     *
     * @param string $message
     * @return void
     */
    public function setMessage($message)
    {
        $this->message = $message;
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
     * Returns the contactPerson
     *
     * @return \Datwyler\OfficeExt\Domain\Model\ContactPerson $contactPerson
     */
    public function getContactPerson()
    {
        return $this->contactPerson;
    }
    
    /**
     * Sets the contactPerson
     *
     * @param \Datwyler\OfficeExt\Domain\Model\ContactPerson $contactPerson
     * @return void
     */
    public function setContactPerson(\Datwyler\OfficeExt\Domain\Model\ContactPerson $contactPerson)
    {
        $this->contactPerson = $contactPerson;
    }

}