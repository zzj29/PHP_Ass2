<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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

        //check the username is provided & valid 
        //1. if the username is already exist, not able to register
        //2. valiadation (note case sensitive, 4-40 characters, no space)

        if(isset($_POST["login"]))
        {
            if(isset($_POST["username"]))
            {
                $Name = trim($_POST["username"]); //remove the white space from the username entered
                if (strlen($Name) < 2)
                {
                    echo "<p>Please supply valid username </p>";
                }
            }
            if(!empty($POST["password"]))
            {
                $letters=strlen($POST_["password"]);  
            }
        }
        

        //if the password in blank, generate a random password with 10 characters
        $characters = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890!@#$%^&*"; 
        $random = str_shuffle($characters);
        $password = substr($random, 0, 10);
        echo "<p>$password</p>"; //show the password to the user to record it


        //if password is provided, validate the password (case sensitive, 8-20 characters, no space, allow: numbers (0-9), symbols (!=@#$%&*_()) and letters (a-z,A-Z))




        //add the new username and password should be saved to a text file accounts.txt


        //inform the user the registration is success


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