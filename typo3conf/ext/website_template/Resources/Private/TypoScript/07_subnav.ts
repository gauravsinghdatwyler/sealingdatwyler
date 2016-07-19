<!--##### SUBNAVIGATION START #####-->
lib.tempsubnavMenu = HMENU
lib.tempsubnavMenu {

	entryLevel = -1
	
	1 = TMENU
	1 {
		wrap = <ul class="tabs primary-nav">|</ul>
		#expAll = 1
		NO {
			wrapItemAndSub  = <li class="tabs__item">|</li>
			stdWrap.wrap = <span>|</span>
			stdWrap.htmlSpecialChars = 1
		}	 
	    ACT = 1
	    ACT {
			wrapItemAndSub  = <li class="on tabs__item">|</li>
			stdWrap.wrap = <strong><span>|</span></strong>
			doNotLinkIt = 1
			stdWrap.htmlSpecialChars = 1
		}
	}
}

lib.subnavMenu < lib.tempsubnavMenu
lib.subnavMenu {
  stdWrap.ifEmpty.cObject < lib.tempsubnavMenu
  stdWrap.ifEmpty.cObject.entryLevel = -2
}

<!--##### SUBNAVIGATION END #####--> 
lib.prev_page = HMENU
lib.prev_page {
    special = browse
    special {
        items = prev
    }
    1 = TMENU
    1.NO {
        linkWrap = |
    }
}


lib.next_page = HMENU
lib.next_page {
    special = browse
    special {
        items = next
    }
    1 = TMENU
    1.NO {
        linkWrap = |
    }
}

lib.back_to_page = HMENU
lib.back_to_page {
    special = browse
    special {
        items = up
        up.fields.title = {$backtopage}
    }
    1 = TMENU
    1.NO {
        linkWrap = |
    }
}

