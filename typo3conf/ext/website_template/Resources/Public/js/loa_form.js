$(document).ready(function() {
	LoAController.init();
});

/**
 *
 * LoAController - handles LoA Form
 *
 * @year 2014
 * @author rei
 *
 */
var LoAController = (function($, _this) {
	var VALUE_NEW_PRODUCT_REGISTRATION = "new-product-registration";
	var VALUE_UPDATE_LOA_CHANGE = "update-loa-change";
	var CLASS_EXISTING_PRODUCT = "existing-product";
	var CLASS_NEXT_STEP = "next-step";
	var CLASS_NEW_PRODUCT = "step-new-prod";
	var CLASS_NEW_OR_EXISTING_PRODUCT = "radio-new-or-existing";
	var STEP_1 = 2;
	var STEP_2 = 6;
	var STEP_EXISTING_PRODUCT = 4;
	var STEP_NEW_PRODUCT = STEP_2;
	var KEY_SUBMIT_AND_NEXT_STEP_BUTTON = 7;
	var ANIMATION_TIME = "500";

	var loaForm = null;
	var fieldsets = null;
	var isEdit = false;
	var browserCanValidateForms = false; /** currently disabled **/
	var nextStepButton = null;
	var backButton = null;
	var submitButton = null;

	_this.init = function() {
		loaForm = $('#loa-request-form');
		isEdit = $("body").hasClass("edit");
		browserCanValidateForms = $("html").hasClass("formvalidation");

		if (typeof loaForm != "undefined" && loaForm != null && !isEdit) {
			fieldsets = loaForm.find('> fieldset');

			// sets classes and prepare default
			prepareForm();

			// then handle the form (listener)
			handleForm();
		}
	};

	/**
	 *
	 * FUNCTION prepareForm()
	 *
	 * prepares the form, sets classes and visibility
	 *
	 */
	var prepareForm = function() {

		// add class to nested select fieldset`s
		var formRows = $(".form-row");
		$.each(formRows, function(key, row){
			var currRow = $(row);
			var fieldset = currRow.find("fieldset");
			fieldset.addClass("select-container");
		});

		// handle "normal" fieldset`s
		$.each(fieldsets, function(key, fieldset) {
			var fieldset = $(this);
			var h2 = fieldset.find("h2");

			fieldset.addClass("fieldset-" + key);

			// the first fieldset`s are step 1
			if (key <= STEP_1) {
				fieldset.addClass("step-1");
			}
			// the next ones are step 2
			else if (key <= STEP_2) {
				fieldset.hide();
				fieldset.addClass("step-2");

				// radio select for new or existing product
				if (key < STEP_EXISTING_PRODUCT) {
					fieldset.addClass(CLASS_NEW_OR_EXISTING_PRODUCT);
				}
				// existing product form
				if (key == STEP_EXISTING_PRODUCT) {
					fieldset.addClass(CLASS_EXISTING_PRODUCT);
				}
				// new product form
				else if (key > STEP_EXISTING_PRODUCT && key <= STEP_NEW_PRODUCT) {
					fieldset.hide();
					fieldset.addClass("step-2");
					fieldset.addClass(CLASS_NEW_PRODUCT);
				}
			}
			else if (key == KEY_SUBMIT_AND_NEXT_STEP_BUTTON) {
				fieldset.addClass("submit");
				fieldset.addClass(CLASS_NEXT_STEP);
				backButton = $(fieldset.find('input[type="submit"]')[0]);
				nextStepButton = $(fieldset.find('input[type="submit"]')[1]);
				submitButton = $(fieldset.find('input[type="submit"]')[2]);
				submitButton.hide();
				backButton.hide();
				backButton.attr("onclick", "");
				fieldset.find("script").remove();

				backButton.addClass("back-button");
				nextStepButton.addClass("next-step-button");
				submitButton.addClass("submit-button");
				backButton.parent().addClass("back-button-wrapper");
				nextStepButton.parent().addClass("next-step-wrapper");
				submitButton.parent().addClass("submit-button-wrapper");
			}

			if (h2.text() == " ") {
				h2.remove();
			}
		});

		// set hidden notes
		var note1 = $("#note-information");
		var val1 = note1.val();
		var note1Wrapper = note1.parent();
		note1Wrapper.html(val1);
		note1Wrapper.addClass("info small");

		var note2 = $("#note-no-product-code");
		var note2Wrapper = note2.parent();
		var val2 = note2.val();
		note2Wrapper.html(val2);
		note2Wrapper.addClass("info normal");
	};

	var handleForm = function() {
		var newOrExistingProductCheckboxes = loaForm.find('fieldset.' + CLASS_NEW_OR_EXISTING_PRODUCT).find("input[type='radio']");
		var stepOneFieldsets = loaForm.find("fieldset.step-1");
		var stepTwoFieldsets = loaForm.find("fieldset.step-2");
		var existingProductFieldsets = loaForm.find("fieldset." + CLASS_EXISTING_PRODUCT);
		var newProductFieldsets = loaForm.find("fieldset." + CLASS_NEW_PRODUCT);

		/**
		 *
		 * FUNCTION handleProductCheckboxes()
		 *
		 * handles radios for switching between
		 * "new product registration" and "existing product"
		 *
		 */
		var handleProductCheckboxes = function() {
			if (newOrExistingProductCheckboxes != null) {
				newOrExistingProductCheckboxes.on("change", function() {
					setProductCheckboxes($(this));
				});
			}
		};

		/**
		 *
		 * FUNCTION setProductCheckboxes()
		 *
		 * actual animation for the product part of the form
		 *
		 */
		var setProductCheckboxes = function(newActiveCheckbox) {
			var activeVal = newActiveCheckbox.val();

			if (activeVal == VALUE_NEW_PRODUCT_REGISTRATION) {
				existingProductFieldsets.fadeOut(0, function() {
					newProductFieldsets.slideDown(ANIMATION_TIME);
				});
			}
			else {
				newProductFieldsets.fadeOut(0, function() {
					existingProductFieldsets.slideDown(ANIMATION_TIME);
				});
			}
		};

		/**
		 *
		 * FUNCTION handleStepNavigation()
		 *
		 * handles steps and animates them
		 *
		 */
		var handleStepNavigation = function() {

			// show step 1
			if (backButton != null) {
				backButton.click(function(e) {
					e.preventDefault();
					submitButton.hide();
					backButton.hide();
					nextStepButton.show();
					showHideStepOne();
				});
			}

			// show step 2
			if (nextStepButton != null) {

				nextStepButton.click(function(e) {
					e.preventDefault();

					var formIsValid = isFormValid("step-1");

					if (formIsValid) {
						submitButton.show();
						backButton.show();
						nextStepButton.hide();
						showHideStepOne();
					}
				});
			}

			// prepare submit before sending the form - then send it
			if (submitButton != null) {
				submitButton.click(function(e) {
					e.preventDefault();

					var activeCheckbox = newOrExistingProductCheckboxes.filter(':checked');
					var activeValue = activeCheckbox.val();
					var emptyRequiredFields = null;
					var notEmptyRequiredFields = null;

					if (activeValue == VALUE_NEW_PRODUCT_REGISTRATION) {
						emptyRequiredFields = existingProductFieldsets.find("[required=required]");
						notEmptyRequiredFields = newProductFieldsets.find("[required=required]");
					}

					if (activeValue == VALUE_UPDATE_LOA_CHANGE) {
						emptyRequiredFields = newProductFieldsets.find("[required=required]");
						notEmptyRequiredFields = existingProductFieldsets.find("[required=required]");
					}

					$.each(emptyRequiredFields, function() {
						var currField = $(this);
						currField.val("  ");
					});

					$.each(notEmptyRequiredFields, function() {
						var currField = $(this);
						if (currField.val() == "  " || currField.val() == " ") {
							currField.val("");
						}
					});

					var formIsValid = isFormValid("step-2");

					if (formIsValid) {
						// remove search form
						var searchForm = $("#search-box").find("form");
						console.log("searchForm ", searchForm);
						$("#search-box").find("form").remove();
						// then send form
						$('#loa-request-form').submit();
					}
				});
			}

			// shows or hides step one or step two alternately
			var showHideStepOne = function() {
				if (nextStepButton.hasClass("active")) {
					nextStepButton.removeClass("active");
					stepTwoFieldsets.fadeOut(0, function() {
						stepOneFieldsets.fadeIn(0);
					});
				}
				else {
					nextStepButton.addClass("active");
					stepOneFieldsets.fadeOut(0, function() {
						stepTwoFieldsets.fadeIn(0, function() {
							setProductCheckboxes(newOrExistingProductCheckboxes.filter(':checked'));
						});
					});
				}
			};
		};

		// set handlers
		handleProductCheckboxes();
		handleStepNavigation();
	};

	/**
	 *
	 * FUNCTION isFormValid()
	 *
	 * checks validation before going to another step
	 *
	 * @return boolean - if form is valid or not
	 *
	 */
	var isFormValid = function(step) {
		var isFormValid = true;
		var requiredFields = $("." + step).find("[required=required]");

		$.each(requiredFields, function(key, _field) {
			var field = $(_field);

			if (true == false && browserCanValidateForms) { //(browserCanValidateForms) {
				var valid = field.checkValidity();

				if (!valid) {
					isFormValid = false;
				}
			}
			else {
				var currFieldValue = field.val();

				if (currFieldValue == " " || currFieldValue == "") {
					isFormValid = false;
					field.addClass("user-error form-ui-invalid");
				}
				else {
					field.removeClass("user-error");
					field.removeClass("form-ui-invalid");
				}
			}
		});

		return isFormValid;
	};

	return _this;

}(jQuery, {}));