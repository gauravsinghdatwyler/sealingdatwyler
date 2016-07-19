<?php

/***************************************************************
 * Extension Manager/Repository config file for ext "powermail".
 *
 * Auto generated 11-03-2016 14:32
 *
 * Manual updates:
 * Only the data in the array - everything else is removed by next
 * writing. "version" and "dependencies" must not be touched!
 ***************************************************************/

$EM_CONF[$_EXTKEY] = array (
  'title' => 'powermail',
  'description' => 'Powermail is a well-known, editor-friendly, powerful
        and easy to use mailform extension with a lots of features
        (spam prevention, marketing information, optin, ajax submit, diagram analysis, etc...)',
  'category' => 'plugin',
  'version' => '2.24.0',
  'state' => 'stable',
  'uploadfolder' => false,
  'createDirs' => 'uploads/tx_powermail,typo3temp/tx_powermail',
  'clearcacheonload' => true,
  'author' => 'Powermail Development Team',
  'author_email' => 'alexander.kellner@in2code.de',
  'author_company' => 'in2code.de',
  'constraints' => 
  array (
    'depends' => 
    array (
      'typo3' => '6.2.7-7.99.99',
      'extbase' => '6.2.0-7.99.99',
      'fluid' => '6.2.0-7.99.99',
      'php' => '5.5.0-0.0.0',
    ),
    'conflicts' => 
    array (
    ),
    'suggests' => 
    array (
    ),
  ),
  '_md5_values_when_last_written' => '',
);

