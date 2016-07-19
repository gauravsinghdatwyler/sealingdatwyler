page.includeJSlibs {
jqueryJs = EXT:website_template/Resources/Public/js/lib/jquery-1.10.2.js
#modernizrJs = EXT:website_template/Resources/Public/js/lib/modernizr.js
#selectivizrJs = EXT:website_template/Resources/Public/js/lib/selectivizr.js
functionJs = EXT:website_template/Resources/Public/js/min/function.min.js
#moduleJs = EXT:website_template/Resources/Public/js/min/module.min.js
#loaformJs = EXT:website_template/Resources/Public/js/loa_form.js
#accordeonJs = EXT:website_template/Resources/Public/js/accordeon.js
#bootstrapJS = EXT:website_template/Resources/Public/js/bootstrap.min.js	
#slickJS = EXT:website_template/Resources/Public/js/slick.js
#customJs = EXT:website_template/Resources/Public/js/custom.js
}

page.includeJSFooterlibs {
}

page.footerData.40 = TEXT
page.footerData.40.value (
<script type="text/javascript">
$(document).ready(function() {
var loadMoreButton = $("a#loadmore-button");
if (loadMoreButton != null) {
loadMoreButton.html('Load more');
}
});
</script>
)
[globalVar = GP:L = 1]
page.footerData.40 = TEXT
page.footerData.40.value (
<script type="text/javascript">
$(document).ready(function() {
var loadMoreButton = $("a#loadmore-button");
if (loadMoreButton != null) {
loadMoreButton.html('Mehr laden');
}
});
</script>
)
[global]
