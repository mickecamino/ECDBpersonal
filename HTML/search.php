<?php
// File: search.php
// Function: Search the database
// Revision date: 2026-09-01
// Revised by: Mikael Karlsson
// This file is distributed under the license:
// Creative Commons Attribution-NonCommercial-ShareAlike 3.0 Unported License.
//
    require_once "include/login/auth.php";
    require_once "include/debug.php";
    echo "<!DOCTYPE HTML>";
// Localization
    if(isset($_COOKIE["language"])) { // for localization
    $language = $_COOKIE["language"];
    }
    else { // Not set, set to en_US.utf8
        $language = "en_US.utf8";
    }
    require_once "include/localize.php";
    SetLanguage($language, "ecdb");
// end localization
    // Custom Page Titles
    $pageTitle = _("Search");
// Hidden Search title for search dialogue
// pageTitle did not work when localized, see header.php
    $searchTitle = "Search";

    include "include/head.php";

    echo '<body><div id="wrapper">';
// Header
    include "include/header.php";
// END
// Main menu
    include "include/menu.php";
// END
// Main content
    echo '<div id="content">';
    echo "<h1>" . _("Search results") . "</h1>";
// Start table, start first row
    echo '<table class="globalTables" cellpadding="0" cellspacing="0"><thead><tr>';
// First column
    echo "<th></th>";
// Second column
    echo '<th><a href="?q=' . $_GET['q'] . '&by=name&order=';
    if(isset($_GET['order'])){
            $order = $_GET['order'];
            if ($order == 'asc'){
                echo 'desc';
                }
            else {
                echo 'asc';
                }
        } // end if isset
        else {
            echo 'desc';
            }
        echo '">' . _("Name") . '</a></th>';
// end first column, start second column
    echo '<th><a href="?q=' . $_GET['q'] . '&by=category&order=';
    if(isset($_GET['order'])){
        $order = $_GET['order'];
        if ($order == 'asc'){
            echo 'desc';
            }
        else {
            echo 'asc';
            }
        } // end if isset
    else {
        echo 'asc';
        }
    echo '">' . _("Category") . '</a></th>';
// end second column, start third column
    echo '<th><a href="?q=' . $_GET['q'] . '&by=manufacturer&order=';
    if(isset($_GET['order'])){
        $order = $_GET['order'];
        if ($order == 'asc'){
            echo 'desc';
            }
        else {
            echo 'asc';
            }
        } // end if esset
    else {
        echo 'asc';
        }
    echo '">' . _("Manufacturer") . '</a></th>';
// end third column, start fourth column
    echo '<th><a href="?q=' . $_GET['q'] . '&by=package&order=';
    if(isset($_GET['order'])){
        $order = $_GET['order'];
        if ($order == 'asc'){
            echo 'desc';
            }
        else {
            echo 'asc';
            }
    } // end if isset
    else {
        echo 'asc';
        }
    echo '">' . _("Package") . '</a></th>';
// end fourth column, start fifth column
    echo '<th><a href="?q=' . $_GET['q'] . '&by=pins&order=';
    if(isset($_GET['order'])){
        $order = $_GET['order'];
        if ($order == 'asc'){
            echo 'desc';
            }
        else {
            echo 'asc';
        }
    } // end if isset
    else {
        echo 'asc';
        }
    echo '">' . _("Pins") . '</a></th>';
// end fifth column, start and end sixth column
    echo "<th>" . _("Image") . "</th>";
// end sixth column, start and end seventh column
    echo "<th>" . _("Datasheet") . "</th>";
// end seventh column, start eight column
    echo '<th><a href="?q=' . $_GET['q'] . '&by=location&order=';
    if(isset($_GET['order'])){
        if ($order == 'asc'){
            echo 'desc';
            }
        else {
            echo 'asc';
            }
    } // end if isset
    else {
        echo 'asc';
        }
    echo '">' . _("Location") . '</a></th>';
// end eight column, start ninth column
    echo '<th><a href="?q=' . $_GET['q'] . '&by=quantity&order=';
    if(isset($_GET['order'])){
        $order = $_GET['order'];
        if ($order == 'asc'){
            echo 'desc';
            }
            else {
                echo 'asc';
            }
        } // end if isset
        else {
            echo 'asc';
            }
        echo '">' . _("Quantity") . '</a></th>';
// end ninth column, start and end tenth column
    echo "<th>" . _("Comment") . "</th>";
// end first row, end thead, start tbody
    echo "</tr></thead><tbody>";

    include "include/include.php";
    $index = new ShowComponents;
    $index->Search();
// end tbody, end table
    echo "</tbody></table></div>";
//END
// Text outside the main content
    include "include/footer.php";
// END
    echo "</div></body></html>";
?>
