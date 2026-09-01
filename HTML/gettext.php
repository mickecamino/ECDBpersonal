<?php
// Quick check if gettext is installed
if (function_exists('gettext')) {
    echo "Gettext is installed! You're good to go.";
} else {
    echo "Gettext is NOT installed. You'll need to enable it first.";
}

