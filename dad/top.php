<?php
$phpSelf = htmlentities($_SERVER['PHP_SELF'], ENT_QUOTES, "UTF-8");

$path_parts = pathinfo($phpSelf);
?>

<!Doctype html>
<html lang="en-us">
    <head>
        <title>Blue Scrub</title>
        <meta charset="utf-8">
        <meta name="author" content="Nana Nimako.">
        <meta name="description" content= "Turn to Blue Scrub; time to take on 
             if you're a newly graduated or old graduate looking for job as a
             nurse." 
        <link rel="icon" href="images/logo.png">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="css/nurse.css" type="text/css" media="screen">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

      

        <?php
        $debug = false;

        //This statement allows us in thhe  classroom to see what our variables
        //are. This NEVER done on a live site
        if (isset($_GET["debug"])) {
            $debug = true;
        }
        //%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%
//
// PATH SETUP
//


        $domain = '//';

        $server = htmlentities($_SERVER['SERVER_NAME'], ENT_QUOTES, 'UTF-8');


        $domain .= $server;


        if ($debug) {

            print '<p>php Self: ' . $phpSelf;
            print '<p>Path Parts<pre>';
            print_r($path_parts);
            print'</pre></p>';
        }

// %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%
//
// include all libraries.
//
//common mistakes: not have the lib folder with these files.
//Google the difference between require and include
//

        print PHP_EOL . '<!-- include libraries -->' . PHP_EOL;

        require_once ('lib/security.php');

        //notice this if statement only includes the functions if it is 
        // form page. A common mistake is to take the form and call the page
        // join.php which means you need to change it below (or delete the if)
        if ($path_parts['filename'] == "join") {
            print PHP_EOL . '<!-- include form libraries -->' . PHP_EOL;
            include "lib/validation-functions.php";
            include 'lib/mail-message.php';
        }

        print PHP_EOL . '<!-- finished including libraries -->' . PHP_EOL;
        ?>

    </head>
    <!-- ########################## body section ############################ -->  
<?php
print '<body id="' . $path_parts['filename'] . '">';

include ('header.php');


if ($debug) {
    print '<p> DEBUG MODE IS ON!</p>';
}
?>