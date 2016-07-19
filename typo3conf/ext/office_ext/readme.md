-- Development Readme file

This Extension contain three plugin 

1) Brnachfilter
	 - Functionality - Display Branch Listing with filtering and Detail view 

2) Contactfilter
	 - Functionality - Diplay Contact Listing with filtering

3) SingleContact
	 - Functionality - Display Detail view of Contact 


-- Branchfilter 

This Plugin's functionalities are in Continent Controller.

typo3conf/ext/office_ext/Classes/Controller/ContinentController.php

To display list of Branch with filter use LIST action.

Detail view of Branch is in SHOW action.

All Multilanguage configurations in - 
	typo3conf/ext/office_ext/Resources/Private/Language/locallang_db.xlf (Default / English)
and
	typo3conf/ext/office_ext/Resources/Private/Language/de.locallang_db.xlf (German)


-- ContactFilter, singleContact

This Plugin's functionalities are in ContactPerson Controller.

typo3conf/ext/office_ext/Classes/Controller/ContactPersonController.php

To display list of Contacts with filter use LIST action.

Detail view of Contact is in SHOW action.

Default View of Contact is showsingleContact action(Flexform).

All Multilanguage configurations in - 
	typo3conf/ext/office_ext/Resources/Private/Language/locallang_db.xlf (Default / English)
and
	typo3conf/ext/office_ext/Resources/Private/Language/de.locallang_db.xlf (German)

