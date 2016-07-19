<!--##### FLUID STYLE CONTENT START #####-->

<INCLUDE_TYPOSCRIPT: source="FILE:typo3/sysext/fluid_styled_content/Configuration/TypoScript/Static/Setup/lib.fluidContent.ts">

tt_content = CASE
tt_content {
  key {
    field = CType
  }

  header =< lib.fluidContent
  header {
    templateName = Header
    stdWrap {
      # Setup the edit icon for content element "header"
      editIcons = tt_content: header [header_layout|header_link], subheader, date
      editIcons {
        beforeLastTag = 1
        iconTitle.data = LLL:EXT:fluid_styled_content/Resources/Private/Language/FrontendEditing.xlf:editIcon.header
      }
    }
  }
  
  textmedia =< lib.fluidContent
  textmedia {
    templateName = Textmedia
    dataProcessing {
      10 = TYPO3\CMS\Frontend\DataProcessing\FilesProcessor
      10 {
        references.fieldName = assets
      }
      20 = TYPO3\CMS\Frontend\DataProcessing\GalleryProcessor
      20 {
        maxGalleryWidth = {$styles.content.textmedia.maxW}
        maxGalleryWidthInText = {$styles.content.textmedia.maxWInText}
        columnSpacing = {$styles.content.textmedia.columnSpacing}
        borderWidth = {$styles.content.textmedia.borderWidth}
        borderPadding = {$styles.content.textmedia.borderPadding}
      }
    }
    stdWrap {
      # Setup the edit icon for content element "textmedia"
      editIcons = tt_content: header [header_layout], bodytext, assets [imageorient|imagewidth|imageheight], [imagecols|imageborder], image_zoom
      editIcons {
        iconTitle.data = LLL:EXT:fluid_styled_content/Resources/Private/Language/FrontendEditing.xlf:editIcon.textmedia
      }
    }
  }

  # The "default" content element, which will be called when no rendering definition can be found
  #default =< lib.fluidContent
}

<!--##### FLUID STYLE CONTENT END #####--> 


