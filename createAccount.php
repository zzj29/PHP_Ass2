<?php 
session_start()
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Zhijun Zhang 12.06.2023 ICTPRG302 Project Assessment (Ass#2)">
    <title>Gelos Enterprises</title>
    <link href="style.css" rel="stylesheet">
</head>
<body>
    <header>
        <div id="headerContent">
            <nav>
                <ul>
                    <li class="menu">
                        <a href="index.php">
                            <img src="images/GE-icon.png" alt="Gelos Enterprises" width="47" height="55">
                        </a>
                    </li>
                    <li class="menu"><a href="login.php">LOGIN</a></li>
                    <li class="menu"><a href="register.php">REGISTER</a></li>
                    <li class="menu"><a href="marks.php">MARKS</a></li>
                </ul>
            </nav>
        </div>
    </header>
    <section id="banner">
        <img src="images/GE-stacked-logo-reverse.png" alt="" width="200" height="106">
    </section>
    <main>
        <h1>Create account</h1>
        <?php
        $NewUser = "";
        $usernameOK = True;
        function redirect($URL)
        {
            $_SESSION["error"]="<div style='color:red;'>Please supply valid username and password.</div>"; //NOT WORKING ?????????
            header("Location: " .$URL);
            exit();
        }


        if(isset($_POST["register"]))
        {
            //check the username is provided & valid
            if(!empty($_POST["username"]))
            {
                $Name = strtolower(trim($_POST["username"])); //remove the white space & change to lowercase
                // valid username should only include letters or digit 
                if (ctype_alnum($Name)) 
                {
                    // valid username should be 4-40 characters 
                    if (strlen($Name) >= 4 && strlen($Name) <= 40)
                    {
                        // if the username is already exist, not able to register
                        $fileArray = file("accounts.txt", FILE_IGNORE_NEW_LINES);
                        foreach($fileArray as $line)
                        {
                            list($storedUsername) = explode(' ', $line);
                            if ($Name === $storedUsername) 
                            {
                                $usernameOK = False;
                                break;
                            }
                        }
                        if ($usernameOK)
                        {
                            $NewUser .= "$Name";
                        }
                        else
                        {
                            redirect("register.php");
                        }
                    }
                    else
                    {
                        redirect("register.php");
                    }
                }
                else
                {
                    redirect("register.php");
                }
            }
            else{
                redirect("register.php");
            }

            //check the password is provided & valid
            if(empty($_POST["password"]))
            {
                //if the password in blank, generate a random password with 10 characters
                $characters = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890!@#$%^&*"; 
                $random = str_shuffle($characters);
                $password = substr($random, 0, 10);
                $NewUser .= " $password\n";
                echo "<p> You are registed. Please record your username is: " . $Name . " and your password is: ". $password . ".</P>"; //show the password to the user to record it
                // append the new username and password to accounts.txt
                file_put_contents("accounts.txt", $NewUser, FILE_APPEND);
            }
            //if password is provided, validate the password (case sensitive)
            else
            {   
                $password=trim($_POST["password"]); // remove the white space
                // valid password should only include: numbers (0-9), symbols (!=@#$%&*_()) and letters (a-z,A-Z))
                if (preg_match("/^[a-zA-Z0-9!=@#$%&*_()]+$/", $password))
                {
                    // valid password should be 8-20 characters
                    if (strlen($password) >= 8 && strlen($password) <= 20)
                    {
                        $NewUser .= " $password\n";
                        echo "<p> You are registed. Please record your username is: " . $Name . " and your password is: ". $password . ".</P>"; //show the password to the user to record it
                        // append the new username and password to accounts.txt
                        file_put_contents("accounts.txt", $NewUser, FILE_APPEND);
                    }  
                    else
                    {
                        redirect("register.php");
                    }
                }
                else
                {
                    redirect("register.php");
                }
            }
        }
        ?>
    </main>
    <footer>
        <p>Contact us</p>
        <p>A: 111 Business Avenue, TULITZA NSW 9460<br>
        P: 02 0000 0000<br>
        E: contactus@gelosmail.com.au</p>
    
        <p>Gelos Enterprises would like to pay our respect and acknowledge Aboriginal and Torres Strait Islander Peoples as the Traditional Custodians of the land, rivers and sea. We acknowledge and pay our respect to the Elders, both past and present of all Nations.</p>				
        <p>This site has been developed by TAFE NSW &copy TAFE NSW <?php echo date("Y") ?></p>
        <p >Please note this is a fictitious organisation and has been created purely for educational purposes only.</p>
    </footer>

</body>
</html>
