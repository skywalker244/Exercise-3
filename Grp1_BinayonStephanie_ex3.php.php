<?php

// a. file_get_contents
$html_file = 'index2.html';
$html_content = file_get_contents($html_file);
echo "Content of $html_file: $html_content";

// b. file_put_contents
$contentToAppend = "This is the content to be appended.";
file_put_contents('index2.html', $contentToAppend, FILE_APPEND);
echo "Content appended successfully!";

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
