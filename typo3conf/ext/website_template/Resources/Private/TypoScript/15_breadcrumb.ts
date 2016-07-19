<!--##### BREADCRUMB START #####-->

lib.breadcrumb = COA
lib.breadcrumb {
	10 = HMENU
	10 {
		special = rootline
		special.range = 1 |-1
		entrylevel = 1
		includeNotInMenu = 1
		1 = TMENU
		1 {
			noBlur = 1

			wrap = <ol> | </ol>
			NO {
				stdWrap.field = title
				ATagTitle.field = nav_title // title
				linkWrap = <li>|</li>
			}
			CUR = 1
			CUR {
				linkWrap = <li>|</li>
				stdWrap.wrap = <strong>|</strong>
				doNotLinkIt = 1
			}
		}
	}
}

<!--##### BREADCRUMB START #####-->
