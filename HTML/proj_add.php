<?php
// File: proj_add.php
// Function: Add project
// Revision date: 2026-09-01
// Revised by: Mikael Karlsson
// This file is distributed under the license:
// Creative Commons Attribution-NonCommercial-ShareAlike 3.0 Unported License.
//
    require_once('include/login/auth.php');
    require_once('include/debug.php');
// Custom Page Titles
    $pageTitle = _("Add Project");
    include "include/head.php";  
    
    echo '<body><div id="wrapper">';
// Header
    include "include/header.php";
// END
// Main menu
    include "include/menu.php";
// END
// Main content
    echo '<div id="content"><h1>' . _("Add Project") . '</h1>';
// start table
    echo '<table class="viewComponent" cellpadding="0" cellspacing="0">';
// start form and start row one
    echo '<form action="" method="post"><tr>';
// start and end first column
    echo '<td class="what">' . _("Name") . '</td>';
// start and end second column
    echo '<td><input name="name" id="name" type="text" class="textfield"" /></td>';
// end row one and start row two
    echo '</tr><tr>';
// start and end column one
    echo '<td class="what"></td>';
// start and end column 2
    echo '<td></td>';
    echo '</tr><tr>';
    echo '<td class="what"></td>';
    echo '<td><input type="submit" name="submit" class="submit" value="" /></td>';
    echo '</tr><tr>';
    echo '<td class="what"></td>';
    echo '<td>';
    include("include/include_proj_add.php");

    $AddProj = new Proj;
    $AddProj->AddProj();
    echo "</td></tr></form></table>";
    echo '</div>';
// END
// Text outside the main content
    include 'include/footer.php';
// END
    echo "</div></body></html>";
?>
