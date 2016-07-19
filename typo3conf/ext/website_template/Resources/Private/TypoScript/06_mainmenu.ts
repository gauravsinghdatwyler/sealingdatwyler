<!--##### MAIN MENU START #####-->
lib.mainmenu = HMENU
lib.mainmenu.entryLevel = 0
lib.mainmenu{
	1 = TMENU
	1 {
		wrap = <ul>|</ul>
		expAll = 1
		NO {
			wrapItemAndSub  = <li>|</li>
			stdWrap.wrap = <span>|</span>
			stdWrap.htmlSpecialChars = 1
		}
	    ACT = 1
	    ACT {
			wrapItemAndSub  = <li class="open on">|</li>
			stdWrap.wrap = <span>|</span>
			stdWrap.htmlSpecialChars = 1
		}
		IFSUB = 1
		IFSUB {
			wrapItemAndSub  = <li class="submenu">|</li>
			stdWrap.wrap = <span>|</span>
			stdWrap.htmlSpecialChars = 1
		}
		ACTIFSUB = 1
		ACTIFSUB {
			wrapItemAndSub  = <li class="submenu open">|</li>
			stdWrap.wrap = <span>|</span>
			stdWrap.htmlSpecialChars = 1
		}

	}
	2 = TMENU
	2 {
		wrap = <ul>|</ul>
		expAll = 1
		NO {
			wrapItemAndSub  = <li>|</li>
			stdWrap.wrap = <span>|</span>
			stdWrap.htmlSpecialChars = 1
		} 
		ACT = 1
		ACT {
			wrapItemAndSub  = <li class="open">|</li>
			stdWrap.wrap = <span>|</span>
			stdWrap.htmlSpecialChars = 1
		}
	}

}
<!--##### MAIN MENU END #####-->




