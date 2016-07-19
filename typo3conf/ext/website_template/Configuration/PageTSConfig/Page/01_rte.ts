RTE.classesAnchor {
	internalLink.titleText = Deze link opent in dit venster
	externalLink.titleText = Deze link gaat naar een andere site
	download.titleText = Download dit bestand
	mail.titleText = Deze link opent uw e-mailprogramma
	internalLink.image >
	externalLink.image >
	download.image >
	mail.image >
}

RTE.default {
	# Clean up HTML code
	enableWordClean = 1
	removeTrailingBR = 1
	removeComments = 1
	removeTags = center, font, o:p, sdfield
	removeTagsAndContents = link, meta, script, style, title

	# Link classes
	buttons.link.properties.class.allowedClasses = internal-link, external-link, download, mail, readmore-link
	buttons.link.page.properties.class.default = internal-link
	buttons.link.url.properties.class.default = external-link
	buttons.link.file.properties.class.default = download
	buttons.link.mail.properties.class.default = mail
	buttons.link.url.properties.class.default = readmore-link

	# Allow img tags
	proc.entryHTMLparser_db.tags.img >

	# Keep ratio of images
	proc.plainImageMode = 1
	proc.plainImageMode.lockRatio = 1

	# Allow style attribute
	proc.entryHTMLparser_db.tags {
		p.allowedAttribs := addToList(style)
		span.fixAttrib.style.unset >
	}

	# Toolbar options
	showButtons (
		formatblock, fontsize, underline, strikethrough, bold, italic, subscript, superscript, textcolor,
		orderedlist, unorderedlist, left, center, right, justifyfull, outdent, indent, textindicator,
		insertcharacter, link, line, table, findreplace, chMode, removeformat, copy, cut, paste, undo, redo,
		toggleborders, tableproperties,
		rowproperties, rowinsertabove, rowinsertunder, rowdelete, rowsplit,
		columninsertbefore, columninsertafter, columndelete, columnsplit,
		cellproperties, cellinsertbefore, cellinsertafter, celldelete, cellsplit, cellmerge
	)

	# More toolbar options (htmlArea RTE only)
	keepButtonGroupTogether = 1

	# Enable status bar (htmlArea RTE only)
	showStatusBar =  1

	# Allowed classes
	proc.allowedClasses (
		align-left, align-center, align-right, align-justify, indent
	)

	# HTML parser
	proc.exitHTMLparser_db {
		tags.b.remap = strong
		tags.i.remap = em
	}

	# CSS File
	contentCSS = typo3conf/ext/website_template/Resources/Public/Css/rte.css
}
