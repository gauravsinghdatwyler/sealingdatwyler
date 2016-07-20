page = PAGE
page.typeNum=0
page{   
  debug = 1    
  templateFile = fileadmin/contactform/1-contactform.html 
  formValuesPrefix = formhandler    
  finishers {     
    1 {       
      class = Finisher\Mail     
    }     
    2 {       
      class = Finisher\SubmittedOK       
      config.returns = 1     
    }   
  } 
}
