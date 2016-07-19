<?php

/***************************************************************
 * Extension Manager/Repository config file for ext "news".
 *
 * Auto generated 07-04-2016 15:59
 *
 * Manual updates:
 * Only the data in the array - everything else is removed by next
 * writing. "version" and "dependencies" must not be touched!
 ***************************************************************/

$EM_CONF[$_EXTKEY] = array (
  'title' => 'News system',
  'description' => 'Versatile news extension, based on extbase & fluid. Editor friendly, default integration of social sharing and many other features',
  'category' => 'fe',
  'author' => 'Georg Ringer',
  'author_email' => 'typo3@ringerge.org',
  'state' => 'stable',
  'uploadfolder' => true,
  'clearCacheOnLoad' => 1,
  'author_company' => '',
  'version' => '4.2.1',
  'constraints' => 
  array (
    'depends' => 
    array (
      'typo3' => '7.6.0-7.99.99',
    ),
    'conflicts' => 
    array (
    ),
    'suggests' => 
    array (
      'dd_googlesitemap' => '2.0.5-2.99.99',
      'rx_shariff' => '7.0.0-7.99.99',
    ),
  ),
  'createDirs' => NULL,
  'clearcacheonload' => true,
);

