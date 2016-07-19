# CONTENT: Main content
lib.content.main = COA
lib.content.main {
	stdWrap.innerWrap = <!--TYPO3SEARCH_begin-->|<!--TYPO3SEARCH_end-->
	10 < styles.content.get
}
lib.content.0 < lib.content.main

# CONTENT: Sidebar
lib.content.left = COA
lib.content.left {
	stdWrap.innerWrap = <!--TYPO3SEARCH_begin-->|<!--TYPO3SEARCH_end-->
	10 < styles.content.getLeft
}
lib.content.1 < lib.content.left

# CONTENT: Sidebar
lib.content.right = COA
lib.content.right {
	stdWrap.innerWrap = <!--TYPO3SEARCH_begin-->|<!--TYPO3SEARCH_end-->
	10 < styles.content.getRight
}
lib.content.2 < lib.content.right


# CONTENT: Empty page
lib.content.border = COA
lib.content.border { 
    stdWrap.innerWrap = <!--TYPO3SEARCH_begin-->|<!--TYPO3SEARCH_end-->
	10 < styles.content.getBorder
}
lib.content.3 < lib.content.border
