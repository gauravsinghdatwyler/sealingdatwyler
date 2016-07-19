config {
	simulateStaticDocuments = 0
	index_enable = 1
	index_externals = 1
	linkVars = L
	sys_language_mode = content_fallback
	sys_language_overlay = 1
	doctype = xhtml_trans
	xhtml_cleaning = all
	doctype = html5
	xmlprologue = none
	renderCharset = utf-8
	no_cache = 0
	locale_all = en_EN
	sys_language_uid = 0
	htmlTag_langKey = en-EN
	language = en
	#metaCharset = utf-8
}
[globalVar = GP:L = 1]
	config.sys_language_uid = 1
	config.language = de
	config.locale_all = de_DE
	config.htmlTag_langKey = de-DE
[global]


[browser = msie]
	config.doctypeSwitch = 1
[global]

page.meta.Content-Type = text/html; charset=utf-8
page.meta.Content-Type.httpEquivalent = 1

page.meta.Cache-Control = no-cache, no-store, must-revalidate
page.meta.Cache-Control.httpEquivalent = 1

page.meta.Pragma = no-cache
page.meta.Pragma.httpEquivalent = 1

page.meta.Expires = 0
page.meta.Expires.httpEquivalent = 1

page.meta.viewport = width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0;
page.meta.format-detection = telephone=no
page.meta.description = {page:description}
page.meta.description.insertData = 1
page.meta.keywords = {page:keywords}
page.meta.keywords.insertData = 1


page = PAGE
page.shortcutIcon = EXT:website_template/Resources/Public/images/favicon.ico

page = PAGE
page{
	headerData{
		1 = TEXT
		1.value(
			<script>
				(function(d) {
					var config = {
						kitId: 'alq5vkj',
						scriptTimeout: 3000,
						async: true
					},
					h=d.documentElement,t=setTimeout(function(){h.className=h.className.replace(/\bwf-loading\b/g,"")+" wf-inactive";},config.scriptTimeout),tk=d.createElement("script"),f=false,s=d.getElementsByTagName("script")[0],a;h.className+=" wf-loading";tk.src='https://use.typekit.net/'+config.kitId+'.js';tk.async=true;tk.onload=tk.onreadystatechange=function(){a=this.readyState;if(f||a&&a!="complete"&&a!="loaded")return;f=true;clearTimeout(t);try{Typekit.load(config)}catch(e){}};s.parentNode.insertBefore(tk,s)
				})(document);
			</script>
			<link rel="stylesheet" type="text/css" href="typo3conf/ext/website_template/Resources/Public/css/main.css" media="all">
			<link rel="stylesheet" type="text/css" href="typo3conf/ext/website_template/Resources/Public/css/slick-theme.css" media="all">
			<link rel="stylesheet" type="text/css" href="typo3conf/ext/website_template/Resources/Public/css/style.css" media="all">
			<link rel="stylesheet" type="text/css" href="typo3conf/ext/website_template/Resources/Public/css/responsive.css" media="all">
			<link rel="stylesheet" type="text/css" href="typo3conf/ext/website_template/Resources/Public/css/font-awesome.css" media="all">

			<script src="typo3conf/ext/website_template/Resources/Public/js/lib/modernizr.js" type="text/javascript"></script>
			<script src="typo3conf/ext/website_template/Resources/Public/js/lib/selectivizr.js" type="text/javascript"></script>
			<script src="typo3conf/ext/website_template/Resources/Public/js/min/module.min.js" type="text/javascript"></script>
			<script src="typo3conf/ext/website_template/Resources/Public/js/loa_form.js" type="text/javascript"></script>
			<script src="typo3conf/ext/website_template/Resources/Public/js/accordeon.js" type="text/javascript"></script>
			<script src="typo3conf/ext/website_template/Resources/Public/js/bootstrap.min.js" type="text/javascript"></script>
			<script src="typo3conf/ext/website_template/Resources/Public/js/slick.js" type="text/javascript"></script>
			<script src="typo3conf/ext/website_template/Resources/Public/js/custom.js" type="text/javascript"></script>
			<script src="typo3conf/ext/website_template/Resources/Public/resources/js/js-webshim/minified/polyfiller.js" type="text/javascript"></script>

			<script type="text/javascript">
			webshim.setOptions('forms', {
				lazyCustomMessages: true,
				replaceValidationUI: true,
				customDatalist: true
			});
			webshim.polyfill('forms');
			// load the forms polyfill
			</script>

			<!--[if IE]>
			<meta http-equiv="X-UA-Compatible" content="IE=Edge,chrome=IE7" />
			<![endif]-->
			<meta name="author" content="" />
			<meta name="robots" content="all" />
		)
		2 = TEXT
		2.value(
			<script type="text/javascript">
				(function(i, s, o, g, r, a, m) {
					i['GoogleAnalyticsObject'] = r;
					i[r] = i[r] || function() {
						(i[r].q = i[r].q || []).push(arguments)
					}, i[r].l = 1 * new Date();
					a = s.createElement(o),
						m = s.getElementsByTagName(o)[0];
					a.async = 1;
					a.src = g;
					m.parentNode.insertBefore(a, m)
				})(window, document, 'script', '//www.google-analytics.com/analytics.js', 'ga');

				ga('create', 'UA-54398252-1', 'auto');
				ga('send', 'pageview');
			</script>
		)
	}
	footerData{
		# Remove the default ag_custom.js file of newsletter extension
		1298 >

		#1299 = TEXT
		#1299.value(
		#	<script src="typo3conf/ext/website_template/Resources/Public/js/ag_custom.js" type="text/javascript"></script>
		#)
	}
}

