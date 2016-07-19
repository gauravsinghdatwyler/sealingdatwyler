page = PAGE
page {
	# Page template
	10 = FLUIDTEMPLATE
	10 {
		file.stdWrap.cObject = TEXT
		file.stdWrap.cObject {
			data = levelfield:-2,backend_layout_next_level,slide
			override.field = backend_layout
			split {
				token = file__
				1.current = 1
				1.wrap = |
			}
			ifEmpty = 1col
			wrap = EXT:website_template/Resources/Private/Templates/Pages/|.html
		}
		layoutRootPath = EXT:website_template/Resources/Private/Layouts/
		variables {

		}
	}

	bodyTagCObject = COA
	bodyTagCObject   {
		stdWrap.wrap = <body class="col-subcol logout section  en corporate" id="section">
	}
}

[globalVar=TSFE:page|layout=1]
page.bodyTagCObject = TEXT
page.bodyTagCObject.wrap = <body id="success-story" class="col-subcol logout success-story  en corporate">
[global]

[globalVar=TSFE:page|layout=2]
page.bodyTagCObject = TEXT
page.bodyTagCObject.wrap = <body id="global-collaboration" class="col-subcol logout en corporate">
[global]

[globalVar=TSFE:page|layout=3]
page.bodyTagCObject = TEXT
page.bodyTagCObject.wrap = <body id="product" class="col-subcol logout product  en corporate">
[global]

[globalVar=TSFE:page|layout=4]
page.bodyTagCObject = TEXT
page.bodyTagCObject.wrap = <body id="job" class="col-subcol logout job  en corporate">
[global]

[globalVar=TSFE:page|layout=5]
page.bodyTagCObject = TEXT
page.bodyTagCObject.wrap = <body id="search-results" class="col-subcol logout none  en corporate">
[global]

[globalVar=TSFE:page|layout=6]
page.bodyTagCObject = TEXT
page.bodyTagCObject.wrap = <body id="event" class="col-subcol logout event  en corporate">
[global]

[globalVar=TSFE:page|layout=7]
page.bodyTagCObject = TEXT
page.bodyTagCObject.wrap = <body id="article" class="col-subcol logout article  en corporate">
[global]


