lib.search = COA
lib.search {
	10 = TEXT
	10.wrap = <div id="search-box"><h6>{$search_title}</h6>

	20 = USER_INT
	20 {
		userFunc = TYPO3\CMS\Extbase\Core\Bootstrap->run
		extensionName = IndexedSearch
		vendorName = TYPO3\CMS
		controller = Search
		pluginName = Pi2
		action = form
		view.templateRootPaths {
			1 = EXT:website_template/Resources/Private/Templates/Extensions/header_indexed_search/Templates/
		}

		view.partialRootPaths {
			1 = EXT:website_template/Resources/Private/Templates/Extensions/header_indexed_search/Partials/
		}
		
		persistence < plugin.tx_indexedsearch.persistence
		settings =< plugin.tx_indexedsearch.settings
	}
 
	30 = TEXT
	30.wrap = </div>
}

[globalVar = TSFE:id = 54]
lib.search >
[global]

lib.targetPid = TEXT
lib.targetPid.value = 54