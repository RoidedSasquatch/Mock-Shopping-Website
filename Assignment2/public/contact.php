<?php
/*
    Dan Blais, Imed Eddine Cherabi, Prince Apau
    CST8285
    Assignment 2
    Due Apr 07, 2024
*/
/*
    contact.php
    This php file contains php and html code that will create the contact page of the website.
    This page can be accessed regardless of whether a user is logged in contains information about 
    contacting the site owners, as well as mailto: urls containing their emails.
*/
?>

<?php view('header', ['title' => 'Contact WebProgramazon']) ?>

<div id="spacer"></div>
<div id="contact">
    <h3 id="contact-header">Contact</h3>
    <p id="contact-paragraph">If you need to get in contact with WebProgramazon you can find the information
        needed on this page. Here, you can find our mailing address, as well as the phone
        number to our customer service hotline. Finally, you can also find the emails of
        the site admins for any further inquiry.
    </p>
    <span class="contact-subheaders">Mailing Address</span>
    <span class="mailing-address"> <i>121 Fakename Avenue</i></span>
    <span class="mailing-address"><i>Ottawa, On K1R5P9</i></span>
    <span class="contact-subheaders">Phone Number</span>
    <span id="phone-number">Toll Free 1-800-655-2345</span>
    <span class="contact-subheaders">Emails</span>
    <div id="email-div">
        <a href="mailto:blai0327@algonquinlive.com" class="contact-emails">Contact Dan</a>
        <a href="mailto:cher0156@algonquinlive.com" class="contact-emails">Contact Imed</a>
        <a href="mailto:apau0001@algonquinlive.com" class="contact-emails">Contact Prince</a>
    </div>
</div>

<?php view('footer') ?>