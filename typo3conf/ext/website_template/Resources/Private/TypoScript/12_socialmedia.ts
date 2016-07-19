<!--##### FOOTER SOCIAL MEDIA START #####-->

lib.socialmedia = HMENU
lib.socialmedia.special = directory
lib.socialmedia.special.value = 78
lib.socialmedia.1 = TMENU
lib.socialmedia.1 {
	wrap = <ul>|</ul>
	expAll = 1
	NO {
		ATagParams = target = "_blank"
		wrapItemAndSub  = <li>|</li>
		stdWrap.wrap = <span>&#x48;</span><span style="display:none">|</span>
		stdWrap.htmlSpecialChars = 1
	} 
	ACT = 1	
    ACT < .NO
}

<!--##### FOOTER SOCIAL MEDIA END ######-->

