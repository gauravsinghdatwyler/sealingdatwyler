! function($) {		
	
	var mobileBreakPoint = 600;
		
		/**
		/* IE 8 detection
		*/
		
		function getInternetExplorerVersion() {
			var rv = -1; // Return value assumes failure.
			if (navigator.appName == 'Microsoft Internet Explorer') {
				var ua = navigator.userAgent;
				var re = new RegExp("MSIE ([0-9]{1,}[\.0-9]{0,})");
				if (re.exec(ua) != null)
				rv = parseFloat(RegExp.$1);
			}
			return rv;
		}
		
		function checkVersion() {
			var ver = getInternetExplorerVersion();
			if (ver > -1 && ver <= 8.0){
				$('html').addClass('ie8');
				$('#wrapper').addClass('ie8');
			} else {
				$('html').addClass('not-ie8');
				$('#wrapper').addClass('not-ie8');
			}
		}
		
		checkVersion();
		
		/**
		 /* single, two-, three-lines subnav lis
		 */
		 
			 
		var calcSubnavElValign = function() {
			
			var $subNavElems = $('#sub-nav').find('li > a > span, li > strong > span');
			$subNavElems.each(function(index, element){
				var thatHeight = $(this).outerHeight();
				var thatLi = $(this).closest('li');
				
				if(thatHeight < 26) {
					thatLi.addClass('one-line')
					.removeClass('two-lines')
					.removeClass('three-lines');
				}
				else if(thatHeight > 45) {
					thatLi.addClass('three-lines')
					.removeClass('one-line')
					.removeClass('two-lines');
				}
				else {
					thatLi.addClass('two-lines')
					.removeClass('one-line')
					.removeClass('three-lines');
				}
				
			})
			$subNavElems.css("visibility", "visible");
		};
		
		
		var calcSubnavElWidth = function () {

			var subnav = $('#sub-nav');
			var subnavItemList = subnav.find('ul');
			var subnavItems = subnav.find('li');
			var subnavItemsLength = subnavItems.length;
					
			var subnavItemWidthCss = "";
			var subnavWidth = subnav.outerWidth();
			var commonMargin = parseFloat(subnavItems.first().css("margin-right"));
			var subnavItemWidth = subnavWidth / subnavItemsLength;
			
			if($(window).width() > mobileBreakPoint) {
				subnavItemWidthCss = (subnavItemWidth - commonMargin) + "px";				
			} else {
				subnavItemWidthCss = "100%";
			}
			subnavItems.css("width", subnavItemWidthCss);
			
		}

		/**
		 /* queue the calc of the subnav lis
		 */	
		 
		var calcSubnavLiWidth = function () {
			
			var queueTheseAndRun = [
				calcSubnavElWidth,
				calcSubnavElValign
			];
			for (var i = 0; i < queueTheseAndRun.length; i++) {
				queueTheseAndRun[i]();
			}
			
		};
		
		

		/**
		 /* calculate gray tabs width
		 */	
		 
		var calcGrayTabsLiWidth = function() {
			var grayTabs = $('.gray-tabs');
			
            grayTabs.each(function(){
				
				var grayTabsItemList = $(this).find('ul.nav-tabs');
				var grayTabsItems = grayTabsItemList.find('li');
				var grayTabsItemsLength = grayTabsItems.length;
				if (grayTabsItemsLength > 2) {
					grayTabsItemList.addClass('multiple-tabs');
				} else {
					grayTabsItemList.removeClass('multiple-tabs');	
				}
			
				var grayTabsItemWidthCss = "";
				var grayTabsWidth = grayTabsItemList.outerWidth() - parseFloat(grayTabsItemList.css("padding-left")) - parseFloat(grayTabsItemList.css("padding-right"));	
				
				
				if($(window).width() > mobileBreakPoint) {
					if(grayTabsItemList.hasClass('nav-tabs')) {
						var commonMarginSpace = parseFloat(grayTabsItems.first().css("margin-left")) + parseFloat(grayTabsItems.first().css("margin-right"));
						var grayTabsItemWidth = (grayTabsWidth - ((grayTabsItemsLength+1) * commonMarginSpace)) / grayTabsItemsLength;
						grayTabsItemWidthCss = grayTabsItemWidth + "px";
						grayTabsItems.css("width", grayTabsItemWidthCss);
					}
					else {	
						grayTabsItems.css("width", "auto");
					}
				}
				else {
					/* 6px divider between tabs, 2 tabs per row */
					var grayTabsItemWidthMobile = (grayTabsWidth - 6) / 2;
					grayTabsItemWidthCss = grayTabsItemWidthMobile + "px";
					grayTabsItems.css("width", grayTabsItemWidthCss);
				}
			});
				
		};


        /**
         /* Two-lines box
         */

        var calcTwoLinesBox = function() {
			var grayTabsItems = $('.gray-tabs').find('li');

            grayTabsItems.each(function(){
                var item = $(this).find('a');
                var itemText = item.find('span');
                var itemOuterHeight = item.outerHeight();

                if(itemText.innerHeight() > itemOuterHeight) {
                    itemText.addClass('two-lines');
                } else {
                    /* itemText.removeClass('two-lines'); */
                }

                if(itemText.innerHeight() > itemOuterHeight) {
                    itemText.addClass('three-lines');
                } else {
                    /* itemText.removeClass('three-lines'); */
                }
            });

            var $buttonLinkListItem = $('.button-link-list-item');
            $buttonLinkListItem.each(function(index, element) {
                if($(this).find('a').outerHeight() > $(this).outerHeight()) {
                    $(this).addClass('two-lines');
                } else {
                    /* $(this).removeClass('two-lines'); */
                }
            });

            var $buttonLabels = $('.floated-teaser-group .image-button .button-label');
            $buttonLabels.each(function(index, element) {
                if($(this).find('h2').outerHeight() > $(this).outerHeight()) {
                    $(this).addClass('two-lines');
                } else {
                    /* $(this).removeClass('two-lines'); */
                }
            });

        };
		
		var handleSingleCarouselSlide = function() {
			
		/* Hide arrows and indicators for single slide */
		
			$('.tw-paging').each(function(){
				var rackTeasers = $(this).find('.rack-teaser');
				if (rackTeasers.length < 2) {
					$(this).find('.pagination, .pager').hide();
				} else {
					$(this).find('.pager .prev').css("opacity", 0);
					$(this).find('.pagination, .pager').show();
				}
			});
		}
		
		
		var handleBarTeaser = function() {
			
		/* Hide arrows and indicators for single slide */
		
			$('.bar-teaser').each(function(){
				var button = $(this).find('.button');
				if (button.find('a').height() > button.height()) {
					button.addClass('two-lines');
				}
			});
		}
		
		
	$(document).ready(function(){
		
		calcGrayTabsLiWidth();
       calcTwoLinesBox();
		calcSubnavLiWidth();
		handleSingleCarouselSlide();
		handleBarTeaser();
		
		$('.button-link-list-area').find('.content').each(function(){
			$(this).find('.button-link-list-item').filter(':nth-child(3n+3)').css({ "margin-right": 0 });
		});
		
		$('#stage').each(function(){
			if ($(this).find('.stage-box').length == 0) {
				$(this).css({"height":"auto", "padding-bottom":"0px"});				
			};
		});
		
		$('.rack-teaser').filter('.no-img').css({"height":"auto","min-height":"100px"});
		
		
		/* forms */
		$('#contact').closest('body').addClass('contact');
		
		$('#registrationForm').closest('body').addClass('registrationForm');
		$('#event-application-form').closest('body').addClass('event-application-form');
		/* $('body.form').find('.preselect-info').clone().appendTo($('#page-intro > h1')); */

        var $fileInputs = $('input[type="file"]');

        if ($fileInputs.length > 0) {

            $fileInputs.each(function(){
                var originalFileInput = $(this);
                originalFileInput.parent().addClass("file-input-area");

                originalFileInput.wrap('<span class="file-input-container"></span>');
                var containerFileInput = originalFileInput.parent();

                var buttonFileInput = $('<input type="button" class="file-input-button" value="Upload">');
                buttonFileInput.insertAfter(originalFileInput);

                var valueFileInput = $('<span class="file-input-value"></span>');
                valueFileInput.html(originalFileInput.val());
                valueFileInput.insertAfter(buttonFileInput);

                var fileInputReset = $('<span class="file-input-reset">X</span>');
                fileInputReset.insertAfter(valueFileInput);
				
				  var originalFileInputValue = "No attachment.";

                var resetFile = function() {
                    valueFileInput.html(originalFileInputValue);
                    originalFileInput.val("");
                    originalFileInput.trigger("reset");
                    fileInputReset.hide();
                }

                resetFile();

                buttonFileInput.one("click", function() {
                    setInterval(function(){
                        if(originalFileInput.val() == "" || originalFileInput.val() == undefined){
                            valueFileInput.html(originalFileInputValue);
                            fileInputReset.hide();
                        } else if (originalFileInput.val() != valueFileInput.text() && originalFileInput.val() != undefined) {
                            valueFileInput.html(originalFileInput.val());
                            fileInputReset.show();
                        }
                    }, 500);
                });

                fileInputReset.on("click", function() {
                    resetFile();
                });

                buttonFileInput.on("click", function() {
						originalFileInput.trigger("click");
						valueFileInput.html(originalFileInput.val());
				});

			});
		}

		/**
		/* Ellipsis of the text
		*/
		
		function shorten(text, maxLength) {
			var ret = text;
			if (ret.length > maxLength) {
				ret = ret.substr(0,maxLength-3);
				ret = ret.substr(0, ret.lastIndexOf(" ")) + "...";
			}
			return ret;
		}
		
		/* shorten event-entries in base */
		
		var $newsEventTitles = $('.news-event .content').find('ul li > a .title');
		
		$newsEventTitles.each(function() {
			/*
			var date = $(this).find('.date');
			date.detach(); */
			var title = $(this).text();
			$(this).text(shorten(title, 28));
			/* $(this).prepend(date); */
		});
		
		
		/* shorten double-teaser text for mobile */
		
		if($('html').hasClass('touch') && $(window).outerWidth() < 600) {
			var $doubleTeaserText = $('.double').find('.bottom > p');
			
			$doubleTeaserText.each(function() {
				var paragraphText = $(this).text();
				
				if(paragraphText != "") {
					$(this).text(shorten(paragraphText, 50));
				}
			});
		}
		
		/* to prevent if the position of the copyright has not been corrected */
			
		var copyright = $('#site-info-box-right #copyright');
		copyright.appendTo('#site-info .top');
		
		
		$('.application-type').filter('.filter').find('option[value="none"]').text("Select an application"); /* important to change */
		
		$successStoryNav = $('.success-story-nav');
		$successStoryNav.first().addClass('top');
		$successStoryNav.last().addClass('bottom');
		
		$successStoryNav.each(function() {
			
			$successStoryNavLi = $(this).find('li');
			$successStoryNavLi.first().addClass('previous');
			$successStoryNavLi.last().addClass('next');
			$successStoryNavLi.each(function() {
					if($(this).find('a').length == 0) {
						$(this).addClass('disabled');
					}
			});
					
		});
		
		
		$('.gray-tabs').removeClass('tabbed-box');
		
		if($('#breadcrumb').prev().is('#page-intro')) {
			$('#breadcrumb').remove().insertBefore('#page-intro');
		}
		
		var mainContent = $('#main-content');
		
		if (mainContent.find('.form-row #message').length > 0) {
			mainContent.addClass('contactresults-provisory');
		}
		
		/* product group */
		$('#product-group').find('#main-content > .downloads, #main-content > .specific-products').insertAfter('#main');
		
		$('body#job').find('#main').css({'height':'auto','min-height':'0'});
		
/**
/* float teaser, same row, same height
*/
		var $floatedTeaserGroups = $('.floated-teaser-group');
		
		$floatedTeaserGroups.each(function() {
			/* console.log("floated-teaser-group"); */
			if ($(this).find('.quote').length > 0) {
				$(this).addClass('quote-container');
			}
			else if ($(this).find('.story').length > 0) {
				$(this).addClass('story-container');
			}
			else if ($(this).find('.image-button').length > 0) {
				$(this).addClass('image-button-container');
				/* console.log("image-button-container"); */
			}
			
			var $imageButtons = $(this).find('.image-button');
			
			$imageButtons.filter(':nth-child(2n+2)').css({ "margin-right": 0 });
		
			var $floatedTeaserGroupTeasers = $(this).find('.teaser, .three-col').not('.image-button, .story-big').addClass('heightnewdefined');
			
			var maxHeight = 0;	
			
			$floatedTeaserGroupTeasers.each(function(){
				var currentHeight = $(this).outerHeight();	
				
				if (currentHeight > maxHeight) {
					maxHeight = currentHeight;
				}				
			});
			
			$floatedTeaserGroupTeasers.each(function(){
				$(this).css("height", maxHeight);			
			});
			
		});
	
/**
/* Three col teaser, .text-only first children all the same height in desktop modus
*/	
		var $threeColsGroup = $('.no-touch .three-col-teaser-group');
		
		$threeColsGroup.each(function() {
			
			var $rowFirstChildren = $(this).find('.row-1, .row-2, .row-3').find('.teaser:first-child');			
			
			var allSameClass = true;
			
			$rowFirstChildren.each(function(){
				if ($(this).hasClass('.text-only')) {
					allSameClass = false;	
				}
			});
			
			
			if (allSameClass == true) {
				
				var maxHeight = 0;	
				
				$rowFirstChildren.each(function(){
					var currentHeight = $(this).height();	
					
					if (currentHeight > maxHeight) {
						maxHeight = currentHeight;
					}				
				});
				
				$rowFirstChildren.each(function(){
					$(this).css("min-height", maxHeight);			
				});
			
			}
			
			
			var $standardTeaser = $(this).find('.standard').not('.text-only');		
			
			if ($standardTeaser.length > 0) {
				
				var maxStandardTeaserHeight = 0;	
				var standardTeaserPadding = 45; /* padding-top 25px, padding-bottom: 20px */

				$standardTeaser.each(function(){
					var currentHeight = $(this).children('a').outerHeight();	
					
					if (currentHeight > maxHeight) {
						maxStandardTeaserHeight = currentHeight;
					}
				});
				
				maxStandardTeaserHeight = maxStandardTeaserHeight + standardTeaserPadding;
				
				$standardTeaser.css("height", maxStandardTeaserHeight);
			
			}
			
		});
		
/**
/* Three col tablet + mobile
*/
		
		var $threeColsGroupTouch = $('.touch .three-col-teaser-group');

        $threeColsGroupTouch.each(function() {

            var $rows = $(this).find('.row-1, .row-2, .row-3');
            var $textOnlyFix = $('<div class="teaser text-only-fix no-img"></div>');

			$rows.each(function(){
				var $teaserTextOnly = $(this).find('.text-only');
                $teaserTextOnly.each(function(){
                    $textOnlyFix.clone().insertAfter($(this));
                });

                var $rowTeaserTypes = $(this).find('.teaser');

                var onlyQuoteRow = true;
                var onlyStoryRow = true;
                if (!$rowTeaserTypes.hasClass('quote')) { onlyQuoteRow = false; }
                if (!$rowTeaserTypes.hasClass('story')) { onlyStoryRow = false; }
                if(onlyQuoteRow == true) { $(this).addClass('only-quote-row'); }
                if(onlyQuoteRow == true) { $(this).addClass('only-story-row'); }
				
				/* to preserve floating on tablet */
                var $rowTeaserStandard = $(this).find('.standard');
					var StandardTeaserMaxHeight = 0;	
					
					$rowTeaserStandard.each(function(){
						var currentStandardHeight = $(this).height();	
						
						if (currentStandardHeight > StandardTeaserMaxHeight) {
							StandardTeaserMaxHeight = currentStandardHeight;
						}				
					});
					
					$rowTeaserStandard.each(function(){
						$(this).css("height", StandardTeaserMaxHeight+20);			
					});
				/* end of floating */
				
			});
		});
		
/**
/* Form validation
*/

		$('input[type="submit"]').on('mouseup', function() {
			window.setTimeout(function(){
				$('.user-error').closest('.form-row').addClass('invalid-form-row');
			}, 1000);
		});
				
		/**
		/* Main Nav styling
		*/
		
		/* > Robert
		var mainNavLis = $('#main-nav').find('li');
		mainNavLis.removeClass('open').filter('.on').parents('li').andSelf().addClass('open');
		*/
		var subnav = $('#sub-nav');
		var subnavItemList = subnav.find('ul');
		var subnavItems = subnav.find('li').removeClass('open');
		
		var myPath = document.location.pathname;
		var indexSlash = myPath.lastIndexOf("/");
		var pageName = myPath.substring(indexSlash+1);
		
		/*
		subnavItems.each(function(){
			if($(this).find('> a').attr('href').toLowerCase().indexOf(pageName.toLowerCase()) > -1) {
				$(this).addClass('on');
				console.log("link "+ $(this).find('> a').attr('href'));			
			}
		});
		*/
		
		
		/* Add subnav title */
		if ($(window).width() < mobileBreakPoint) {
			
			var subPageLi = $('#breadcrumb').find('li');
			var currentSubPageLi = subPageLi.has('strong');
			var currentSubPageName = currentSubPageLi.find('strong').text();
			
			if(subPageLi.length > 1) {
				currentSubPageLi.prev('li').addClass('current-subpage-ancestor'); /* to display only ancestor in mobile */
			} else {
				currentSubPageLi.addClass('only-current-subpage'); /* to display only ancestor in mobile */
			}
			
			var subnavItemsLength = $('#sub-nav').find('li').length;
			
			if (subnavItemsLength > 0) {
				/* console.log(subnavItemsLength); */
				var subnavPullBtn = $('<h3></h3>');
				subnavPullBtn.html(currentSubPageName).prependTo(subnav);
				
				subnavPullBtn.on("click", function() {
					subnav.toggleClass('open');
				});
			}
		}


/**
/* cleaner
*/

		$baseElementsParagraphs = $('.teaser, .text-box-section, .text-box-section-text, .teaser-accordeon').find('p');
		$baseElementsParagraphs.each(function(){
			if ($(this).html() == "") {
				$(this).remove();
			}
		});
		
		var $baseLiMgnlFix = $('#base .teaser').find('li:last-child');
		$baseLiMgnlFix.each(function(){
			if ($(this).html() == "") {
				$(this).css("border-bottom", "0");
			}
		});
		
		$('.rack-teaser').find('p > br').remove();
		
		$linkListImageMore = $('.button-link-list-item-with-image').find('.more');
		$linkListImageMore.each(function(){
			if ($(this).html() == "") {
				$(this).remove();
			}
		});
		
		
		/**
		/* Redefine FontSize for Download links
		*/

		function redefineFontSize(title, maxWidth) {
			
			for (var i = 0; i < 3; i++) {
				
				var fontSize = parseInt(title.css("font-size"));
				
				if(title.width() > maxWidth && fontSize > 10) {
					var newFontSize = fontSize - 2;
					title.css("font-size", newFontSize);
				}
			}
		}

		var $downloads = $('.public, .private').find('.download .text');
		var $downloadLinks = $downloads.find('.link');
		
		$downloadLinks.each(function(){
			redefineFontSize($(this), $(this).closest('.download').width() - 120);
		});

		/* Class addition */
		
		var $footerLinks = $('#site-info-box-left').find('li');
		$footerLinks.each(function(){
			var linkLabel = $(this).find('a').text();
			if (linkLabel.indexOf("- ") == 0) {
				$(this).addClass('indent');
				$(this).find('a').text(linkLabel.replace("- ",""));
			}
		});
		
		$textSectionStandard = $('.text-section').filter('.standard');
		
		$textSectionStandard.each(function(index, element) {
			var $image = $(this).find('dl.media');
			
			if ($image.length > 0) {
				if ($image.hasClass('large')) { $(this).addClass('above-img'); }
				else if ($image.hasClass('pos-2')) { $(this).addClass('right-img'); }
				else { $(this).addClass('left-img'); }
			} else {
				$(this).addClass('no-img');	
			}
		});
	
		$metaNavigation = $('#nav-meta').find('ul li');
		
		$metaNavigation.each(function(index, element) {
			
			var metaContent = $(this).find('a').first().text();
			
			if (metaContent != undefined) {
			className = generateClassName(metaContent);
			$(this).addClass(className);
			}
			
		});
		
		function generateClassName(string) {
			
			var reg = new RegExp(" ", "g");
			string = string.replace(reg,"");
			className = string.toLowerCase();
			
			className = "meta-" + className;
			
			return className;	 
		};
		

	}); /* End of docuemnt.ready */
	

	$(window).on("load", function() {
		/*calcSubnavLiWidth();*/
		/*$('#sub-nav').find('ul').css("visibility","visible");*/
		calcGrayTabsLiWidth();
       calcTwoLinesBox();
	   handleSingleCarouselSlide();
	   
		/**
		 * Mobile refactoring footer
		 */
		if ($(window).width() < mobileBreakPoint) {
		  var $siteInfoTop = $('footer').find('.top');
			var siteInfoBoxLeft = $('#site-info-box-left');

			var socialMenuLinks = siteInfoBoxLeft.find('.social-media');
			var aboutBox = siteInfoBoxLeft.find('#about');
			
			socialMenuLinks.appendTo(aboutBox);
			aboutBox.prependTo(siteInfoBoxLeft);

			$siteInfoTop.css("visibility","visible");
		}
		
	
		if ($('html').hasClass('touch')) {
			window.addEventListener('orientationchange', function() {
				calcSubnavLiWidth();
				calcGrayTabsLiWidth();
				calcTwoLinesBox();
			}, false);
		}
	
	});

		
	$(window).on("resize", function(){
		calcSubnavLiWidth();
		calcGrayTabsLiWidth();
		calcTwoLinesBox();
	});
	
	





	
}(window.jQuery);


