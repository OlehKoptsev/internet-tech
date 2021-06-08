<?php

declare(strict_types=1);

require_once __DIR__ . '/connection.php';

$publisher = $_GET['publisher'];
$literatures = $db->literature->find(['publisher' => $publisher]);

foreach ($literatures as $literature) {
    $textResult = "Name: {$literature['name']}. ";
    if (count($literature['author']) > 0) {
        $textResult .= 'Author(s): ';
    }
    foreach ($literature['author'] as $author) {
        $textResult .= $author . '</br>';
    }
    if (isset($literature['year'])) $textResult .= "Year: ".$literature['year'].'</br>';
    if (isset($literature['publisher'])) $textResult .= "Publisher ".$literature['publisher'].'</br>';
    if (isset($literature['date'])) $textResult .= "Date: ".$literature['date']->toDateTime()->format('Y-m-d').'</br>';
    if (isset($literature['quantity'])) $textResult .= "Pages: ".$literature['quantity'].'</br>';
    if (isset($literature['number'])) $textResult .= "Number: ".$literature['number'].'</br>';
    if (isset($literature['ISBN'])) $textResult .= "ISBN: ".$literature['ISBN'].'</br>';
    $textResult .= "Type: {$literature['literate']} </br>";
    if (isset($literature['Resourse'])) {
        if (is_object($literature['Resourse'])) {
            $textResult .= "Resources: ".'</br>';
            foreach ($literature['Resourse'] as $Res) {
                $out .= '&nbsp;&nbsp;&nbsp;&nbsp;'."\tResource ".$Res.'</br>';
            }
        }
        else $out .= "Additional. resource: ".$literature['Resourse'].'</br>';
    }
    echo $textResult . '</br>';
}