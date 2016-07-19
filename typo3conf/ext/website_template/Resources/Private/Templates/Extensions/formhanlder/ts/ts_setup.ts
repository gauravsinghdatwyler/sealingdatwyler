

		plugin.Tx_Formhandler.settings.predef.formhandler-loa-request-form{

			name = Formhandler loa request form
			debug = 0
			addErrorAnchors = 1
			formID = loa-request-form
			formValuesPrefix = loa-request

			langFile.1 = TEXT
			langFile.1.value = typo3conf/ext/website_template/Resources/Private/Templates/Extensions/formhanlder/lang/lang.xml
		
			templateFile = typo3conf/ext/website_template/Resources/Private/Templates/Extensions/formhanlder/html/form.html		
	
			masterTemplateFile = TEXT
	masterTemplateFile.value =typo3conf/ext/website_template/Resources/Private/Templates/Extensions/formhanlder/html/mastertemplate.html

		
			# In case an error occurred, all markers ###is_error_[fieldname]### are filled with the configured value of the setting 		"default".
			isErrorMarker {
				default = error
			}
	
			# These wraps define how an error message looks like. The message itself is set in the lang file.
			singleErrorTemplate {
				totalWrap = <div class="text_error"><ul><li>|</li></ul></div>
			}

			# The error checks for the first step
				1.validators {
					1.class = Validator_Default
					1.config.fieldConf {
						zip.errorCheck.2 = integer
						telephone.errorCheck.2 = integer
						email.errorCheck.2 = email	
						contactemail.errorCheck.2 = email	
					}	
				}

			# The error checks for the second step
				2.validators {
					1.class = Validator_Default
					1.config.fieldConf {	
			
						loarequestno.errorCheck.2 = integer
					}
				}

			finishers {
				# Finisher_Redirect will redirect the user to another page after the form was submitted successfully.
				1.class = Finisher_Redirect
				1.config {
					redirectPage = 6
				}
			}
	
	
	
	
	}


