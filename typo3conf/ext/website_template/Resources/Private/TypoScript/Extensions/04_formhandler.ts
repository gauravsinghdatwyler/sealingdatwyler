plugin.Tx_Formhandler.settings.predef.formhandler-loa-request-form {

	# This is the title of the predefined form shown in the dropdown box in the plugin options.
	name = Formhandler loa request form
	debug = 0
	
	# All form fields are prefixed with this values (e.g. loa-request[name])
	formValuesPrefix = loa-request

	langFile.1 = TEXT
	langFile.1.value = typo3conf/ext/website_template/Resources/Private/Language/lang_formhandler.xml

	templateFile = TEXT
	templateFile.value = typo3conf/ext/website_template/Resources/Private/Templates/Extensions/formhanlder/form.html

	# The master template is a file containing the markup for specific field types or other sub templates (e.g. for emails). You can use these predefined markups in your HTML template for a specific form.
	masterTemplateFile = TEXT
	masterTemplateFile.value = typo3conf/ext/website_template/Resources/Private/Templates/Extensions/formhanlder/mastertemplate.html
	
	
	# In case an error occurred, all markers ###is_error_[fieldname]### are filled with the configured value of the setting "default".
	isErrorMarker {
			default = user-error
	}

	# These wraps define how an error messages looks like. The message itself is set in the lang file.
	singleErrorTemplate {
			totalWrap = <div class="user-error">|</div>
		}

	# This block defines the error checks performed when the user hits submit.
		
			1.validators {
				1.class = Validator_Default
				1.config.fieldConf {
					firstname.errorCheck.1 = required
					lastname.errorCheck.1 = required
					title.errorCheck.1 = required
					company.errorCheck.1 = required
					address1.errorCheck.1 = required
					city.errorCheck.1 = required
					state.errorCheck.1 = required
					zip.errorCheck.1 = required
					country.errorCheck.1 = required
					telephone.errorCheck.1 = required
					email.errorCheck.1 = required
					contactfirstname.errorCheck.1 = required
					contactlastname.errorCheck.1 = required
					contacttitle.errorCheck.1 = required
					contactemail.errorCheck.1 = required
					zip.errorCheck.2 = integer
					telephone.errorCheck.2 = integer
					email.errorCheck.2 = email
					contactemail.errorCheck.2 = email
				}	
			}
			# The error checks for the second step
			2.validators.1.class = Validator_Default
	    	 2.validators.1.config{
	        	disableErrorCheckFields =  drugproductname,productcode,accountmanager,dateloarequest
	        	fieldConf {
	        			loarequestno{
	        				errorCheck.1 = required
	        				}
	       		 }
	        }
			# The error checks for the second step
	         if {
				1 {
			        conditions {
			            OR1.AND1 = requesttype = New product registration
			        }
			        isTrue {
			        	2.validators.1.class = Validator_Default
			            2.validators.1.config{
			       disableErrorCheckFields = loarequestno
			            	fieldConf {
				                drugproductname.errorCheck.1 = required
								productcode.errorCheck.1 = required
								accountmanager.errorCheck.1 = required
								dateloarequest.errorCheck.1 = required
			          	 	 }
			            }
			        }
			        
				}
				2 {
			        conditions {
			            OR1.AND1 = requesttype = Neue Produktregistrierung
			        }
			        isTrue {
			        	2.validators.1.class = Validator_Default
			            2.validators.1.config{
			       disableErrorCheckFields = loarequestno
			            	fieldConf {
				                drugproductname.errorCheck.1 = required
								productcode.errorCheck.1 = required
								accountmanager.errorCheck.1 = required
								dateloarequest.errorCheck.1 = required
			          	 	 }
			            }
			        }
			        
				}
				
			}  
               
				
	# Finishers are called after the form was submitted successfully (without errors).
	
	finishers.1 {
		class = Finisher\Mail
		config {
		    #admin {
		    #		  templateFile = TEXT
			#		  templateFile.value = typo3conf/ext/website_template/Resources/Private/Templates/Extensions/formhanlder/email-admin.html
			#	      to_email = jignesh.prajapati@drcsystems.com
			#	      to_name = name
			#	      subject = LoA request data
			#	      sender_email = contactform@mysite.com
		    #	}
		    user {
		    		templateFile = TEXT
					templateFile.value = typo3conf/ext/website_template/Resources/Private/Templates/Extensions/formhanlder/email-user.html
			      	to_email = email
			      	to_name = Datwyler sealing solutions
			      	subject = Your LoA request data
			      	sender_email = info@datwyler.ch
		    	}
 		}
	}
	finishers.2 {
	  class = Finisher\Redirect
	  config {
	    redirectPage = 10
	  	}
	}
}


