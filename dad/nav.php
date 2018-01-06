<nav class="navigation">
    <ul>
        <?php
        print '<li class = "';
        if ($path_parts['filename'] == "index") {
            print 'activePage';
        }
        print '">';
        print'<a href="index.php">Home</a>';
        print '</li>';

        print '<li class = "';
        if ($path_parts['filename'] == "testimonies") {
            print 'activePage';
        }
        print '">';
        print'<a href="testimonies.php">Testimonies</a>';
        print '</li>';

        print '<li class = "';
        if ($path_parts['filename'] == "about") {
            print 'activePage';
        }
        print '">';
        print'<a href="about.php">About</a>';
        print '</li>';

        print '<li class = "';
        if ($path_parts['filename'] == "contact") {
            print 'activePage';
        }
        print '">';
        print'<a href="contact.php">Contact</a>';
        print '</li>';

        print '<li class = "';
        if ($path_parts['filename'] == "apply") {
            print 'activePage';
        }
        print '">';
        print'<a href="apply.php">Apply Now</a>';
        print '</li>';
        
        print '<li class = "';
        if ($path_parts['filename'] == "refer") {
            print 'activePage';
        }
        print '">';
        print'<a href="refer.php">Refer a Friend</a>';
        print '</li>';
        
        
        ?>
        </ul>
        </nav>