<?php 

/*function from W3Schools for input validation with edited variable names to make more sense for my portfolio*/ 
function validin($input) {
  $input = trim($input);
  $input = stripslashes($input);
  $input = htmlspecialchars($input);
  return $input;
}

if (isset($_POST['submit'])) {
    if (empty($_POST['fname'])) {
        $fnameErr = "First Name is required";
    } else {
        $fname = validin($_POST['fname']);
        if (!preg_match("/^[a-zA-Z ]*$/", $fname)) {
            $fnameErr = "Only letters and white space allowed in First name";
        }
    } 
    
    $lname = validin($_POST['lname']);
    if (!preg_match("/^[a-zA-Z ]*$/", $lname)) {
        $lnameErr = "Only letters and white space allowed in Last Name";
    }
    
    if (empty($_POST['email'])) {
        $emailErr = "Email is required";
    } else {
        $email = validin($_POST['email']);
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailErr = "Invalid email address";
        }
    }
    
    if (empty($_POST['city'])) {
        $cityErr = "City is required";
    } else {
        $city = validin($_POST['city']);
    }
    
    $occupation = validin($_POST{'occupation'});
    
    if (empty($_POST['hiring'])) {
        $hiringErr = "You must select whether or not this is a potential job offer";
    } else {
        $hiring = ($_POST['hiring']);
    }
    
    if (empty($_POST['subject'])) {
        $subjectErr = "Email Subject is required";
    } else {
        $subject = validin($_POST['subject']);
    }
    
    $message = validin($_POST['message']);
    if (empty($message)) {
        $messageErr = "Email message should not be blank";
    }
}

$to = 'johnpitzy@gmail.com';
$headers = 'From: ' . $email;
$emessage = 'Name: ' . $fname . ' ' . $lname . "\n";
$emessage .= 'Email: ' . $email . "\n";
$emessage .= 'Location: ' . $city . ', ' . $_POST['state'] . "\n";
$emessage .= 'Occupation: ' . $occupation . "\n";
$emessage .= 'Job Offer?: ' . $hiring . "\n";
$emessage .= 'Message: ' . $message;

if (isset($_POST['submit']) && !isset($fnameErr) &&  !isset($lnameErr) && !isset($emailErr) && !isset($cityErr) && !isset($hiringErr) && !isset($subjectErr) && !isset($messageErr)) {
    mail($to, $subject, $emessage, $headers);
    $msgSent = "Your email has been sent! <br><br>";
} 
    
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <title>John Pitzeruse Portfolio</title>
    <meta charset="UTF-8" /> 
    <link rel="stylesheet" type="text/css" href="css/style.css" />
</head>
<body id="contact">
    <div id="container">
        <header>
            <h1>John Pitzeruse Jr's Work Portfolio</h1>
        </header>
        
        <nav>
            <a href="index.html">Home</a>
            <a href="projects.html">Projects</a>
            <a href="graphics.html">Graphics</a>
            <a href="contact.php">Contact Me</a>
        </nav>
        
        <div id="wrapper">
            <aside>
                <a href="https://www.linkedin.com/in/john-pitzeruse-jr/">LinkedIn</a>
                <a href="https://github.com/TheJohnnyPitz">Github</a>
            </aside>

            <div class="content">
                <h2>Contact Me</h2>

                <p>
                    For professional inquiries please email me at johnpitzy@gmail.com or fill out the form below. I do not wish to post my phone number on here in order to avoid fake job offers and scam calls as much as possible. If you would like to speak with me on the phone please ask for my number through email.
                </p>
                <p>
                    If you just want to talk tech, would like some help, or wish to help me, you may fill out the form below or email me as well. 
                </p>
                <p>
                    If you fill out the form below and are with a hiring company, please choose the city and state of the job opportunity, not the location you live in (unless it is the same as the job opportunity). This is important because it lets me know how far I will need to travel to work and whether or not I need to relocate for that position. 
                </p>
                <?php echo $msgSent; ?>
                <span class="error">* denotes a required field</span>
                <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                    <div class="blockLabel">
                        <label for="fname">First Name
                            <input type="text" name="fname"/>
                        </label>
                        <span class="error">* <?php echo $fnameErr;?></span>
                    </div>
                    <div class="blockLabel">
                        <label for="lname">Last Name
                            <input type="text" name="lname" />
                        </label>
                        <span class="error"><?php echo $lnameErr;?></span>
                    </div>
                    <div class="blockLabel">
                        <label for="email">Email
                            <input type="email" name="email" />
                        </label>
                        <span class="error">* <?php echo $emailErr; ?></span>
                    </div>
                    <div class="blockLabel">
                        <label for="city">City
                            <input type="text" name="city" />
                        </label>
                        <span class="error">* <?php echo $cityErr; ?></span>
                    </div>
                    <div class="blockLabel">
                        <label for="state">State
                            <select name="state" id="state">
                                <option>AK</option>
                                <option>AL</option>
                                <option>AR</option>
                                <option>AZ</option>
                                <option>CA</option>
                                <option>CO</option>
                                <option>CT</option>
                                <option>DE</option>
                                <option>FL</option>
                                <option>GA</option>
                                <option>HI</option>
                                <option>IA</option>
                                <option>ID</option>
                                <option>IL</option>
                                <option>IN</option>
                                <option>KS</option>
                                <option>KY</option>
                                <option>LA</option>
                                <option>MA</option>
                                <option>MD</option>
                                <option>ME</option>
                                <option>MI</option>
                                <option>MN</option>
                                <option>MO</option>
                                <option>MS</option>
                                <option>MT</option>
                                <option>NC</option>
                                <option>ND</option>
                                <option>NE</option>
                                <option>NH</option>
                                <option>NJ</option>
                                <option>NM</option>
                                <option>NV</option>
                                <option>NY</option>
                                <option>OH</option>
                                <option>OK</option>
                                <option>OR</option>
                                <option>PA</option>
                                <option>RI</option>
                                <option>SC</option>
                                <option>SD</option>
                                <option>TN</option>
                                <option>TX</option>
                                <option>UT</option>
                                <option>VA</option>
                                <option>VT</option>
                                <option>WA</option>
                                <option>WI</option>
                                <option>WV</option>
                                <option>WY</option>
                            </select>
                        </label>
                    </div>
                    <div class="blockLabel">
                        <label for="occupation">Occupation
                            <input type="text" name="occupation"/>
                        </label>
                    </div>
                    <span class="offer">Potential Job Offer?</span>
                    <input type="radio" id="yes" name="hiring" value="yes" />
                    <label for="yes">Yes</label>
                    <input type="radio" id="no" name="hiring" value="no" />
                    <label for="no">No</label>
                    <span class="error">* <?php echo $hiringErr; ?></span>
                    <div class="blockLabel">
                        <label for="subject">Email Subject
                            <input type="text" name="subject" />
                        </label>
                        <span class="error">* <?php echo $subjectErr; ?></span>
                    </div>
                    
                    <div class="comments">
                        <label for="message">Email Message</label>
                        <textarea id="message" name="message" cols="50" rows="10"></textarea>
                        <span class="error">* <?php echo $messageErr; ?></span>
                    </div>
                    
                    <div class="button">
                        <input type="submit" name="submit" id="submit" value="submit" />
                        <input type="reset" name="clear" id="clear" value="clear"/>
                    </div>
                </form> 
            </div> <!--end content div-->
        </div> <!--end wraper div -->
        
        <footer>
            <p>&copy2020 John Pitzeruse Jr</p>
        </footer>
    </div> <!--end container div-->
</body>
</html>