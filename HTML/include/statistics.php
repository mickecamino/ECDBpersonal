<?php
 require_once('include/localize.php');
// Get the current script
//    $domain = basename($_SERVER["REQUEST_URI"], ".php");
//echo "DEBUG: domain is: " . $domain;
    $domain = 'statistics';
    SetLanguage('sv_SE.utf8', $domain );

    require_once('login/auth.php');
    include('mysql_connect.php');
    $owner = $_SESSION['SESS_MEMBER_ID'];
// Get the number of components from the data table
    $DataCount = mysqli_num_rows(mysqli_query($connection,"SELECT `id` FROM `data`"));
    echo '<h1>' . _("There are ") . $DataCount . _(" components, ");
// Get the number of categories from the category_head table
    $CategoryCount = mysqli_num_rows(mysqli_query($connection,"SELECT `id` FROM `category_head`"));
    echo $CategoryCount . _(" categories and ");
// Get the number of project from the projects table
    $ProjectCount = mysqli_num_rows(mysqli_query($connection,"SELECT `project_id` FROM `projects`"));
    echo $ProjectCount . _(" project(s)s in the database") . '</h1>';
// Get all categories in the category head table
    $Categories = mysqli_fetch_all(mysqli_Query($connection,"SELECT `id`, `name` FROM `category_head` ORDER BY `name`"), MYSQLI_ASSOC);
    echo '<h1>' . _("You have the following component count in the database") . '</h1>';
// Build a table
    echo '<table class="globalTables" cellpadding="0" cellspacing="0">';
    echo '<thead><tr>';
    echo '<th>' . _("Category") . '</th><th>' . _("Component count") . '</th>';
    echo '<tbody>';
// Loop through all categories
    foreach ($Categories as $Category) {
        $cat = (int)$Category["id"]; // get the id number
        $subcatfrom = $cat*100;      // multiply with 100 to get the sub category
        $subcatto = $subcatfrom+99;  // and add 99 to get the last sub category
// Get the component count from each head category
        $ComponentCount = mysqli_num_rows(mysqli_query($connection,"SELECT `id` FROM `data` WHERE `category` BETWEEN " . $subcatfrom . " AND " . $subcatto . " AND owner = " . $owner . ""));
        printf("<tr><th>%s</th><th>%s</th></tr>", $Category["name"], $ComponentCount);
    }
    echo '</tbody></table>'; // end the table
?>
