plugin.Tx_Formhandler.settings.predef.formhandler-german
{
		name = Formhandler-german
		debug = 0
		addErrorAnchors = 1
		formID = loa-request-form2
		formValuesPrefix = loa-request2

		langFile.1 = TEXT
		langFile.1.value = typo3conf/ext/website_template/Resources/Private/Language/lang_formhandler.xml
		
		templateFile = typo3conf/ext/website_template/Resources/Private/Templates/Extensions/formhanlder/form.html		
	
		masterTemplateFile = TEXT
masterTemplateFile.value =typo3conf/ext/website_template/Resources/Private/Templates/Extensions/formhanlder/mastertemplate.html

		
		# In case an error occurred, all markers ###is_error_[fieldname]### are filled with the configured value of the setting 		"default".
		isErrorMarker {
			default = error
		}
	
		# These wraps define how an error message looks like. The message itself is set in the lang file.
		singleErrorTemplate {
			totalWrap = <div class="error">|</div>
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

		markers.form1_subheader1 = TEXT
		markers.form1_subheader1.value = Step 1 of 
		markers.form1_subheader2 = TEXT
		markers.form1_subheader2.value = Information on company for whom LoA is being issued (if different from above): 
		markers.form1_subheader3 = TEXT
		markers.form1_subheader3.value = Company contact information
		markers.form2_subheader1 = TEXT				
		markers.form2_subheader1.value = Step 2 of 2
		markers.form2_subheader2 = TEXT				
		markers.form2_subheader2.value = Datwyler Pharma Product Details
		markers.form2_subheader3 = TEXT				
		markers.form2_subheader3.value = If you do not have our product code, please fill out the following fields:
		
		[globalVar = GP:complain|receive-copy = 1]
		plugin.Tx_Formhandler.settings.predef.complain {
		  finishers {
		    1.config {
		      user {
		        templateFile = TEXT
		        templateFile.value = {$formhandler.multistep-forms.appointment.rootPath}/email-user.html
		        sender_email = TEXT
		        sender_email.value = noreply@oursite.com
		        to_email = mail
		        subject = TEXT
		        subject.data = Your complain notice
		      }
		    }
		  }
		}
	[global]
}


