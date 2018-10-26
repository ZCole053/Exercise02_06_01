<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Guest Book</title>
    <script src="modernizr.custom.65897.js"></script>
</head>
<body>
    <h2>Guest Book</h2>
    <?php
    $filehandle = fopen("Guest.txt", "rb" );
    //success
    if(file_exists("Guest.txt")){
        $displayArray = file("Guest.txt");
        echo "<table style=\"background-color:lightgrey\" border=\"1\" width=\"100%\">\n"; 
        $count = count($displayArray); 
        for ($i=0; $i < $count; $i++) {  
            $currMsg = explode(";",$displayArray[$i]); 
            echo "<tr>\n"; 
            echo "<td width=\"10%\" style=\"text-align:center\">". ($i +1). "</td>\n";
            echo "<td width=\"90%\"><span>First Name:</span>".htmlentities($currMsg[0]). "<br>\n"; 
            echo "<span>Last Name: </span>" . htmlentities($currMsg[1]) . "<br>\n"; 
            echo "<span>E-mail: </span>" . htmlentities($currMsg[2]) . "</td>\n"; 
            echo "</tr>\n"; 
        }
        echo "</table>\n"; 
    //fail  
    }else{
        echo "Error: File doesn't exist";
    }
    fclose($filehandle);
    ?>

    <p>
    
    <a href="PostGuest.php"><button href="PostGuest.php">Back to Sign up</button></a>
    </p>
</body>
</html>