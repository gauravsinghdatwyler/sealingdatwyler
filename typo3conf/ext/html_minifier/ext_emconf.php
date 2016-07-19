<?php

/***************************************************************
 * Extension Manager/Repository config file for ext "html_minifier".
 *
 * Auto generated 01-04-2016 15:57
 *
 * Manual updates:
 * Only the data in the array - everything else is removed by next
 * writing. "version" and "dependencies" must not be touched!
 ***************************************************************/

$EM_CONF[$_EXTKEY] = array (
  'title' => 'HTML Minifier',
  'description' => 'This extension minifies the output of TYPO3 generated pages. It is based on https://code.google.com/p/minify/',
  'category' => 'fe',
  'version' => '1.0.2',
  'state' => 'stable',
  'uploadfolder' => false,
  'createDirs' => '',
  'clearcacheonload' => false,
  'author' => 'Dominik Weber',
  'author_email' => 'info@dominikweber.net',
  'author_company' => 'www.dominikweber.net',
  'constraints' => 
  array (
    'depends' => 
    array (
      'cms' => '',
      'version' => '',
      'php' => '5.3.0-0.0.0',
      'typo3' => '6.0.0-6.2.99',
    ),
    'conflicts' => 
    array (
    ),
    'suggests' => 
    array (
    ),
  ),
);

