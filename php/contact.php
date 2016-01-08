<?php
if (isset($_POST['EMAIL'])){
    
    //Here is the email to information
    $email_to = "candela5@msu.edu";
    $email_subject ="This is from your website contact form";
    $email_from = "Monk";
    
    //error code
    function died($error){
        
        echo "We are sorry, but there were error(s) found with the form you submitted";
        echo "These errors appear below<br/><br/>";
        echo $error. "<br/><br/>";
        echo "Please go back and fex these errors. <br/><br/>";
        die();
    }
    
    //validation
    
    if (!isset($_POST['name'])|| 
       !isset($_POST['email'])||
        !isset($_POST['comments'])){
            died('Wea are sorry but theres a problem');
    }
       
    $name = $_POST  ['name'];
    $email = $_POST  ['email'];
    $comments = $_POST  ['comments'];
    
    $error_message = "";
    $email_exp = '/^[A-ZA-z09._%-] + @[A-ZA-z09._%-]=\.[A-ZA-z]{2,4}$/';
    if (!preg_match($email_exp,$email)){
        $error_message .= 'The email address you entered does not appear to be valid';
        
    }
 //candela5@msu.edu

    $string_exp = "/^[A-Za-z.'-]+$/";
    if (!preg_match($string_exp, $name)){$error_message.='The name you entered does not appear to be valid.<br/>';}
    if(strlen($comments)< 2 ){'The comment you entered does not appear to be valid.<br/>';}
    if(strlen($error_message) > 0){died($error_message);}
    $email_message="Form Details below.\n\n";
    
    function clean_string($string){$bad = array("content-type","bcc:", "to:", "cc:","href");
                                  
                                  return str_replace($bad,"", $string);
                                  }
    $email_message .="Name:" .clean_string($name) ."\n";
    $email_message .="Email:" .clean_string($email) ."\n";
    $email_message .="Comments:" .clean_string($comments) ."\n";
    
    // create email headers
    $headers = 'From:'.$email_From . "\r\n". 'Reply-To:'.
        $email. "\r\n" . 
        'X-Mailer: PHP/' . phpversion();
    @mail($email_to, $email_subject, $email_message, $headers);
    
?>
<!--sucess meassage -->
Thank you for contacting me. I will be in touch with you shortly. <br/>
Pease click <a href="form.html">here</a> to go back to the form.
    
<?php
    
}


?>