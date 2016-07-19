<!--##### TOP MENU START #####-->
lib.topmenu = HMENU
lib.topmenu {
	special = directory
	special.value = 56
	1 = TMENU
	1 {
		wrap = <ul>|</ul>
		expAll = 1
		NO {
			wrapItemAndSub  = <li class="meta-login">|</li> |*| <li class="meta-jobs">|</li> |*| <li class="meta-contact">|</li>
			stdWrap.htmlSpecialChars = 1
		}	 
	    ACT = 1
	    ACT {
			wrapItemAndSub  = <li class="meta-login">|</li> |*| <li class="meta-jobs">|</li> |*| <li class="meta-contact">|</li>
			stdWrap.htmlSpecialChars = 1
		}
	
	}
}

[loginUser = *]
lib.topmenu >
lib.topmenu = COA_INT
lib.topmenu {
	 #10 = COA
	 #10{
		wrap = <ul>|</ul>
		 
		#10 = TEXT
		#10.value = {$logout_text}
		#10.wrap = <li class="meta-login">|</li>
		#10.typolink {
		#	parameter=1
		#	additionalParams = &logintype=logout
		#}

		10 = TEXT
		10.value(
			<li class="meta-login"><a href="?logintype=logout">Logout</a></li>
		)
		#10.value = {$logout_text}
		#10.wrap = <li class="meta-login">|</li>
		#10.typolink {
		#	parameter=1
		#	additionalParams = &logintype=logout
		#}
		
		20 = HMENU
		20.special = directory
		20.special.value = 56
		20.excludeUidList = 57
		20.1 = TMENU
		20.1 {
			wrap = |
			expAll = 1
			NO {
				wrapItemAndSub  = <li class="meta-jobs">|</li> |*| <li class="meta-contact">|</li>
				stdWrap.htmlSpecialChars = 1
			} 
			ACT = 1	
			ACT < .NO
		}
	#}
}
[global]
<!--##### TOP MENU END #####--> 
