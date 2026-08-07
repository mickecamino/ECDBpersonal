<!-- FILE: FOOTER.PHP - CSS from STYLES.CSS -->

<div id="copyText">
    <div class="leftBox">
        <div>© 2010 - <?php echo date('Y'); ?> ecDB - Created by Nils Fredriksson revised by Pete Willard and modified by Mikael Karlsson</div>
<?php
    if(isset($owner)) {
        echo '<div class="stats">';
        $components = mysqli_num_rows(mysqli_query($connection,"SELECT id FROM data"));
        echo $components;
        echo '<span class="boldText"> components </span>and ';
        $projects = mysqli_num_rows(mysqli_query($connection,"SELECT project_id FROM projects"));
        echo $projects;
        if($projects < 2 ) {
            echo '<span class="boldText"> project</span>.';
        } else {
            echo '<span class="boldText"> projects</span>.';
        }
        echo '</div>';
    }
?>
    </div>
</div>