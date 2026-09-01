<?php
// File: index.php
// Function: Default page when accessing ecDB
// Revision date: 2026-08-31
// Revised by: Mikael Karlsson
// This file is distributed under the license:
// Creative Commons Attribution-NonCommercial-ShareAlike 3.0 Unported License.
//
    require_once "include/login/auth.php";
    require_once "include/debug.php";
// Localize
    require_once "include/localize.php";
    if(isset($_COOKIE["language"])) { // for localization
    $language = $_COOKIE["language"];
    }
    else { // Not set, set to en_US.utf8
        $language = "en_US.utf8";
    }
    SetLanguage($language);
// END
// Custom Page Titles
    $pageTitle = _("Home");
// Hidden Search title for search dialogue
// pageTitle did not work when localized, see header.php
    $searchTitle = "Home";

    include "include/head.php";

    echo '<body><div id="wrapper">';
// Header
    include "include/header.php";
//  END
// Main menu
    include "include/menu.php";
// END
// Main content
    echo '<div id="content">';
    echo '<div class="subMenu">';
    echo "<ul>";
    include "include/include_category_head.php";
    $Head = new NameHead;
    $Head->Head();
    echo "</ul>";
    include "include/statistics.php";
    echo "</div></div>";
// END
// Text outside the main content
    include "include/footer.php";
// END
    echo "</div></body></html>";
?>
