<?php
namespace TYPO3\Jobs\Domain\Model;

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
 * Jobs
 */
class Jobs extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity
{

    /**
     * title
     *
     * @var string
     */
    protected $title = '';
    
    /**
     * description
     *
     * @var string
     */
    protected $description = '';
    
    /**
     * jobfield
     *
     * @var \TYPO3\Jobs\Domain\Model\JobField
     */
    protected $jobfield = null;
    
    /**
     * town
     *
     * @var \TYPO3\Jobs\Domain\Model\Town
     */
    protected $town = null;
    
     /**
     * email
     *
     * @var string
     */
    protected $email = '';
    
    /**
     * Returns the title
     *
     * @return string $title
     */
    public function getTitle()
    {
        return $this->title;
    }
    
    /**
     * Sets the title
     *
     * @param string $title
     * @return void
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }
    
    /**
     * Returns the description
     *
     * @return string $description
     */
    public function getDescription()
    {
        return $this->description;
    }
    
    /**
     * Sets the description
     *
     * @param string $description
     * @return void
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }
    
    /**
     * Returns the jobfield
     *
     * @return \TYPO3\Jobs\Domain\Model\JobField jobfield
     */
    public function getJobfield()
    {
        return $this->jobfield;
    }
    
    /**
     * Sets the jobfield
     *
     * @param \TYPO3\Jobs\Domain\Model\JobField $jobfield
     * @return void
     */
    public function setJobfield(\TYPO3\Jobs\Domain\Model\JobField $jobfield)
    {
        $this->jobfield = $jobfield;
    }
    
    /**
     * Returns the town
     *
     * @return \TYPO3\Jobs\Domain\Model\Town town
     */
    public function getTown()
    {
        return $this->town;
    }
    
    /**
     * Sets the town
     *
     * @param \TYPO3\Jobs\Domain\Model\Town $town
     * @return void
     */
    public function setTown(\TYPO3\Jobs\Domain\Model\Town $town)
    {
        $this->town = $town;
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

}
