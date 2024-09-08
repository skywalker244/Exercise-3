<?php

// a. file_get_contents
$html_file = 'index2.html';
$html_content = file_get_contents($html_file);
echo "Content of $html_file: $html_content";

// b. file_put_contents
$new_file = 'new_file.html';
$new_content = '<h1>This is a new file!</h1>';
file_put_contents($new_file, $new_content);
echo "Wrote '$new_content' to $new_file";

// c. file_exists
$check_file = 'index2.html';
if (file_exists($check_file)) {
    echo "File $check_file exists";
} else {
    echo "File $check_file does not exist";
}

// d. file
$lines_file = 'index2.html';
$lines = file($lines_file, FILE_IGNORE_NEW_LINES);
foreach ($lines as $line) {
    echo "$line\n";
}

?>