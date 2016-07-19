##################################################
# Click enlarge text with image in lightbox
##################################################
tt_content.image.20.1.imageLinkWrap {
	bodyTag = <body style="margin: 0; padding: 0;">
	wrap >
	width >
	height >
	JSwindow = 0
	JSwindow >
	typolink {
	parameter.listNum.stdWrap.if {
		value.field = image_zoom
		equals = 1
		negate = 1
	}
	parameter.ifEmpty = 1
	parameter.ifEmpty.cObject = IMG_RESOURCE
	parameter.ifEmpty.cObject.file.import.data = TSFE:lastImageInfo|origFile
	parameter.ifEmpty.cObject.file.maxW = 800
	parameter.ifEmpty.cObject.file.maxH = 600
	ATagParams = class="lightbox-inline"
		ATagParams.if {
			value.field = image_zoom
			equals = 1
		}
	}
}
