<?php
// File: footer.php
// Function: Show footer with copyright
// Revision date: 2026-08-31
// Revised by: Mikael Karlsson
// This file is distributed under the license:
// Creative Commons Attribution-NonCommercial-ShareAlike 3.0 Unported License.
//
    if(isset($_COOKIE["language"])) { // for localization
    $language = $_COOKIE["language"];
    }
    else { // Not set, set to en_US.utf8
        $language = "en_US.utf8";
    }
	SetLanguage($language);
echo '<div id="copyText">';
echo '<div class="leftBox">';
echo '<div>© 2010 - ' . date('Y') . _(" ecDB - Created by Nils Fredriksson. ecDBpersonal created by Pete Willard, modified by Mikael Karlsson") . '</div>';
echo '</div></div>';
?>
