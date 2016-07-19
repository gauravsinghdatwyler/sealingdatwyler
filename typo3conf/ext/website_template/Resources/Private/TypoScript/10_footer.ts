<!--##### Footer User LOGIN MENU START #####-->

lib.footerloginTitle = TEXT
lib.footerloginTitle.value = <h6>{$footerlogin_title}</h6>

lib.loginMenu = HMENU
lib.loginMenu {
	special = directory
	special.value = 114
	1 = TMENU
	1 {
		wrap = |
		expAll = 1
		NO {
			wrapItemAndSub  = |
			ATagParams = class="button"
			stdWrap.htmlSpecialChars = 1
		}
	}
}

[loginUser = *]
lib.loginMenu = COA
lib.loginMenu {
	 10 = COA
	 10{
		wrap = |

		10 = TEXT
		10.value = {$logout_text}
		10.wrap = |
		10.typolink {
			parameter=1
			additionalParams = &logintype=logout
			ATagParams = class="button"
		}

		20 = HMENU
		20.special = directory
		20.special.value = 114
		20.excludeUidList = 115
		20.1 = TMENU
		20.1 {
			wrap = |
			expAll = 1
			NO {
				wrapItemAndSub  = |
				ATagParams = class="button"
				stdWrap.htmlSpecialChars = 1
			}
		}
	}
}
[end]

<!--##### Footer User LOGIN MENU END #####-->



lib.footermenuTitleFirst = TEXT
lib.footermenuTitleFirst.data = DB:pages:66:title
lib.footermenuTitleFirst.wrap = <h4>|</h4>

<!--##### META NAVIGATION START #####-->

lib.footermenuFirst = HMENU
lib.footermenuFirst.special = directory
lib.footermenuFirst.special.value = 66
lib.footermenuFirst{
	1 = TMENU
	1 {
		wrap = <ul>|</ul>
		expAll = 1
		NO {
			wrapItemAndSub  = <li>|</li>
			stdWrap.htmlSpecialChars = 1
		}
	    ACT = 1
	    ACT {
			wrapItemAndSub  = <li class="active">|</li>
			stdWrap.htmlSpecialChars = 1
		}
	}
	2 = TMENU
	2 {
		wrap = <ul>|</ul>
		expAll = 1
		NO {
			wrapItemAndSub  =  <li class="indent">|</li>
			stdWrap.htmlSpecialChars = 1
		}
		ACT = 1
		ACT {
			wrapItemAndSub  =  <li class="indent">|</li>
			stdWrap.htmlSpecialChars = 1
		}

	}
}

<!--##### META NAVIGATION END #####-->

lib.footermenuTitleSecond = TEXT
lib.footermenuTitleSecond.data = DB:pages:75:title
lib.footermenuTitleSecond.wrap = <h4>|</h4>

<!--##### FOOTER MENU BOTTOM START #####-->

lib.footermenuSecond = HMENU
lib.footermenuSecond.special = directory
lib.footermenuSecond.special.value = 75
lib.footermenuSecond{
	1 = TMENU
	1 {
		wrap = |
		expAll = 1
		NO {
			wrapItemAndSub  = <p><br />|</p>
			stdWrap.wrap = <b>|</b>
			stdWrap.htmlSpecialChars = 1
		}
	}
}


<!--##### FOOTER MENU BOTTOM END #####-->

lib.footeremail = TEXT
lib.footeremail.value = <a href="mailto:{$footer_email}" id="contact-email">{$footer_email}</a>

lib.footertext = TEXT
lib.footertext.value = <span>no matter what</span><br /><span><strong>the future</strong> holds</span>

<!--##### FOOTER LOGO START #####-->

lib.footerlogo = TEXT
lib.footerlogo.value = <img src="typo3conf/ext/website_template/Resources/Public/images/datwyler-logo-footer.png" alt="Datwyler" title="Datwyler" width="400" height="160" />

<!--##### FOOTER LOGO END #####-->

<!--##### FOOTER COPYRIGHT START #####-->

lib.footerCopyright = COA
lib.footerCopyright {
  10 = TEXT
  10.value= Copyright &copy;
  20 = TEXT
    20 {
      data = date:U
      strftime =%Y
      wrap= | . All Rights Reserved
    }
}

<!--##### FOOTER COPYRIGHT END #####-->
