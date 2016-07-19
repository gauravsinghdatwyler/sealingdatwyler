
lib.teaser_slider_readmore = TEXT
lib.teaser_slider_readmore.value = {$teaserslider_readmore}

lib.storyteaser_readmore = TEXT
lib.storyteaser_readmore.value = {$storyteaser_readmore}

lib.secure_downlaod = TEXT
lib.secure_downlaod.value = {$secure_download}

lib.productgroup_more = TEXT
lib.productgroup_more.value = {$productgroup_more}

lib.publication_download = TEXT
lib.publication_download.value = {$publication_download}


<!--####### Content Frame -- Start ########-->

tt_content.stdWrap.innerWrap.cObject = CASE
tt_content.stdWrap.innerWrap.cObject {
key.field = section_frame
  100 < .default
  100.wrap = <div class="gray-tabs">|</div>
  
  200 < .default
  200.wrap = <div class="text-section download">|</div>
  
  300 < .default
  300.wrap = <div id="page-intro"><div class="content">|</div></div>
  
  400 < .default
  400.wrap = <div class="text-section quote"><div class="quote-text">|</div></div>
  
  500 < .default
  500.wrap = <div class="text-section">|</div>
  
  600 < .default
  600.wrap = <div class="news-event teaser">|</div>
  
  700 < .default
  700.wrap = <div class="teaser-accordeon">|</div>

  800 < .default
  800.wrap = <div class="application-form">|</div>
  
  900 < .default
  900.wrap = <div class="product-findertab">|</div>
  
  950 < .default
  950.wrap = <div class="text-section media-contact">|</div>
  

}

<!--####### Content Frame -- End ########-->


