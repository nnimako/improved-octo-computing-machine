<?php
$phpSelf = htmlentities($_SERVER['PHP_SELF'], ENT_QUOTES, "UTF-8");

$path_parts = pathinfo($phpSelf);
?>

<?php
$debug = false;
if (isset($_GET["debug"])) {
    $debug = true;
}
$domain = '//';

$server = htmlentities($_SERVER['SERVER_NAME'], ENT_QUOTES, 'UTF-8');


$domain .= $server;


if ($debug) {

    print '<p>php Self: ' . $phpSelf;
    print '<p>Path Parts<pre>';
    print_r($path_parts);
    print'</pre></p>';
}
print PHP_EOL . '<!-- include libraries -->' . PHP_EOL;

require_once ('lib/security.php');
if ($path_parts['filename'] == "join") {
    print PHP_EOL . '<!-- include form libraries -->' . PHP_EOL;
    include "lib/validation-functions.php";
    include 'lib/mail-message.php';
}

print PHP_EOL . '<!-- finished including libraries -->' . PHP_EOL;
?>
<footer class="footer">

    <?php
    if ($debug) { // later you can uncomment the if statement
        print '<p>Post Array:</p><pre>';
        print_r($_POST);
        print '</pre>';
    }

    $thisURL = $domain . $phpSelf;

    $email = "";

    $emailERROR = false;

    $errorMsg = array();

    $dataRecord = array();

    $mailed = false;

    if (isset($_POST["btnSubmit"])) {

        if (!securityCheck($thisURL)) {
            $msg = '<p>Sorry you cannot access this page. ';
            $msg.= 'Security breach detected and reported.</p>';
            die($msg);
        }

        $email = filter_var($_POST["txtEmail"], FILTER_SANITIZE_EMAIL);
        $dataRecord[] = $email;

        if ($email == "") {
            $errorMsg[] = 'Please enter your email address';
            $emailERROR = true;
        } elseif (!verifyEmail($email)) {
            $errorMsg[] = 'Your email address appears to be incorrect';
            $emailERROR = true;
        }

        if (!$errorMsg) {
            if ($debug)
                print PHP_EOL . '<p>Form is valid</P>';

            $myFolder = 'data/';

            $myFileName = 'registration';

            $fileExt = '.csv';

            $filename = $myFolder . $myFileName . $fileExt;
            if ($debug)
                print PHP_EOL . '<p>filename is ' . $filename;

            $file = fopen($filename, 'a');

            fputcsv($file, $dataRecord);

            fclose($file);
            ?>
            <article>

                <?php
                if ($errorMsg) {
                    print '<div id="errors">' . PHP_EOL;
                    print '<h2>Your email seems to be incorrect.</h2>' . PHP_EOL;
                    print '<ol>' . PHP_EOL;

                    foreach ($errorMsg as $err) {
                        print '<li>' . $err . '</li>' . PHP_EOL;
                    }

                    print '</ol>' . PHP_EOL;
                    print '</div>' . PHP_EOL;
                }
            }
            ?>

            <form action="<?php print $phpSelf; ?>"
                  id="frmRegister"
                  method="post">
                <p>
                    <label class ="required text-field" for="txtEmail">Email: </label>
                    <input autofocus
                        <?php if ($emailERROR) print 'class="mistake problem"'; ?>
                           id="txtEmail"
                           maxlength="45"
                           name="txtEmail"
                           onfocus="this.select()"
                           placeholder="Enter a valid email address"
                           tabindex="140"
                           type="text"
                           value="<?php print $email; ?>"
                           >
                </p>
            </form>
            <?php
        } //end body submit
        ?>
    </article>
    <div>
<div class="footer-icons">
    <a href="https://www.facebook.com/nana.nimako.56" <i id="fag" class="fa fa-facebook"></i></a>
            <a href="https://twitter.com/nnimako4"><i id="fag" class="fa fa-twitter"></i></a>
            <a href="https://www.instagram.com/ko_nimako/" target="blank"><i id="fag" class="fa fa-instagram"></i></a>
            <br>
        </div>
    
    <nav class="footer_nav">
        <ul>
            <li><a href="index.php">Home</a></li>
            <li><a href="testimonies.php">Testimonies</a></li>
            <li><a href="about.php">About</a></li>
            <li><a href="contact.php">Contact</a></li>
            <li><a href="apply.php">Apply Now</a></li>
            <li><a href="refer.php">Refer a Friend</a></li>
        </ul>
    </nav>
    
        <article class="numbers">
            <a href="apply.php">
            <button type="button" class="button"></a>
        Apply Today!
    </button>
            <p class="call">
        Call Us Toll free 1(917) 436-7829
        <br>
    Contact 
        <a href="mailto:ohenebnimako@yahoo.com"> Human Resources </a>
    </p>
        </article>
    
        </div>
</footer>