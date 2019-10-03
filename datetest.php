<?php

echo "Testing date.<br />";
//$expires = new DateTime();
try {
    $date = new DateTime('2000-01-01');
    echo "expires value :: $date .";
} catch (Exception $e) {
    echo $e->getMessage();
    exit(1);
}
//echo "expires value :: $expires .";
echo "<br />..the end";

?>