<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Zhijun Zhang 12.06.2023 ICTPRG302 Project Assessment (Ass#2)">
    <title>Marks</title>
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
        <h1>Calculation of your marks</h1>
        <?php

            $marks = [];
            // displyError function to display error message when the input is invalid or empty
            function displayError($markNumber) {
            echo "<p>Please supply a valid value for mark $markNumber (between 1 and 100)</p>";
            }

            // read the 5 marks into an array
            if(empty($_POST["mark1"])) {
                displayError(1);
            } 
            else {
                $mark1 = (int)$_POST["mark1"];
                $marks[] = $mark1;
                // must ensure that the marks are between 1 and 100 
                if ($mark1 < 1 || $mark1 > 100) {
                    displayError(1);
                }
            }

            if(empty($_POST["mark2"])) {
                displayError(2);
            } 
            else {
                $mark2 = (int)$_POST["mark2"];
                $marks[] = $mark2;
                // must ensure that the marks are between 1 and 100 
                if ($mark2 < 1 || $mark2 > 100) {
                    displayError(2);
                }
            }

            if(empty($_POST["mark3"])) {
                displayError(3);
            } 
            else {
                $mark3 = (int)$_POST["mark3"];
                $marks[] = $mark3;
                // must ensure that the marks are between 1 and 100 
                if ($mark3 < 1 || $mark3 > 100) {
                    displayError(3);
                } 
            }

            if(empty($_POST["mark4"])) {
                displayError(4);
            } 
            else {
                $mark4 = (int)$_POST["mark4"];
                $marks[] = $mark4;
                // must ensure that the marks are between 1 and 100
                if ($mark4 < 1 || $mark4 > 100) {
                    displayError(4);
                }
            }

            if(empty($_POST["mark5"])) {
                displayError(5);
            } 
            else {
                $mark5 = (int)$_POST["mark5"];
                $marks[] = $mark5;
                // must ensure that the marks are between 1 and 100
                if ($mark5 < 1 || $mark5 > 100) {
                    displayError(5);
                } 
            }

            // Calculate the sum of marks
            $total = array_sum($marks);
            $count = count($marks);

            // Calculate the average
            if ($count > 0) {
                $average = $total / $count;
            } else {
                $average = 0;
            }

            // Display the marks
            foreach($marks as $mark) {
                echo "<p>$mark</p>";
            }

            //display sum and average
            echo "<p>The sum of your marks is: $total</p>";
            echo "<p>The average of your marks is: $average</p>";

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
