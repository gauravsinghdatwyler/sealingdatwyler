<!--##### LANGUAGE MENU TOP #####-->

lib.language_title = TEXT
lib.language_title.value = {$lan1}

[globalVar = GP:L = 1]
lib.language_title = TEXT
lib.language_title.value = {$lan2}
[global]


lib.language = HMENU
lib.language{
     special = language
     special.value = 0,1
     protectLvar = 1
     special.normalWhenNoLanguage = 0
     wrap = <ul>|</ul>
     1 = TMENU
     1 {
       NO = 1
       NO {
         linkWrap = <li>|</li>
         stdWrap.override = {$lan1} || {$lan2}
         doNotLinkIt = 1
         stdWrap.typolink.parameter.data = page:uid
         stdWrap.typolink.additionalParams = {$lanID}
         stdWrap.typolink.addQueryString = 1
         stdWrap.typolink.addQueryString.exclude = id,cHash,no_cache
         stdWrap.typolink.addQueryString.method = GET
         stdWrap.typolink.useCacheHash = 0
         stdWrap.typolink.no_cache = 0
         stdWrap.htmlSpecialChars = 0
         # normalWhenNoLanguage = 0
       }
       ACT = 1
       ACT < .NO
       ACT.linkWrap = <li class="active">|</li>
       ACT.stdWrap.htmlSpecialChars = 0

    }
}

<!--##### LANGUAGE MENU TOP #####-->

<!--##### LANGUAGE MENU FOOTER #####-->

lib.languagebox = COA
lib.languagebox {
	10 = TEXT
	10 {
		typolink.parameter.data = page:uid
		typolink.addQueryString = 1
		typolink.addQueryString.method = GET
		typolink.addQueryString.exclude = cHash,L
		typolink.additionalParams.cObject = COA
		typolink.additionalParams.cObject {
			10 = TEXT
			10.wrap = |&L=0
		}
		typolink.returnLast = url
		dataWrap = <option value="{$config.baseURL}|">{$lan1}</option>
	}

	20 < .10
	20.typolink.additionalParams.cObject.10.wrap = |&L=1
	20.dataWrap = <option value="{$config.baseURL}|">{$lan2}</option>

	wrap = <select onChange="javascript:window.location.href=''+this.value;">|</select>
}

[globalVar = GP:L=0]
lib.languagebox.10.dataWrap = <option value="|" selected="selected">{$lan1}</option>
[global]

[globalVar = GP:L = 1]
lib.languagebox.20.dataWrap = <option value="|" selected="selected">{$lan2}</option>
[global]



<!--##### LANGUAGE MENU FOOTER #####-->
