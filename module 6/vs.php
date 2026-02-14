<?php

// Open the file "ds.txt" in write mode
$my_file = fopen("ds.txt", "w");

// The text we want to write
$text = "Digital School";

// Write text to the file
fwrite($my_file, $text);

// Close the file after writing
fclose($my_file);

// Re-open the file in read mode
$my_file = fopen("ds.txt", "r");

// Read and output each line until the end
while (!feof($my_file)) {
    echo fgets($my_file) . "<br>";
}

fclose($my_file);

?>
