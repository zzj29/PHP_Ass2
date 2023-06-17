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
        
        <?php

        $username = trim($_POST["username"]);
        $password = $_POST["password"];
        $loginOK = False;

        // Read the accounts.txt file
        $fileArray = file("accounts.txt", FILE_IGNORE_NEW_LINES); //remove the newline character \n from each line

        // Loop through each line and check for a matching username and password
        foreach($fileArray as $line)
        {
            list($storedUsername, $storedPassword) = explode(' ', $line);
            if ($username === $storedUsername && $password === $storedPassword) 
            {
                $loginOK = True;
                break;
            }
        }

        //successfully logged in, the user should be able to view the accounts
        if ($loginOK)
        {
            echo "<h1>Admin</h1>";
            foreach($fileArray as $line)
            {
                echo "<p>$line</p>";
            }
        }

        //otherwise, informing the username or password is incorrect
        else
        {
            echo "<h1>Invalid</h1> <p>Invalid username or password. Please try again.</p>";
            ?>
                <a href="login.php">Return to Login Form</a>
            <?php
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
