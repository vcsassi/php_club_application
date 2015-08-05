<?php
$file = file_get_contents('nerdfile.csv');
$mydata = str_getcsv($file, "\n");
$tcg = [];
$boardgames = [];
$vids = [];
foreach($mydata as $row){
    $row_arr = str_getcsv($row, ',');
    $tcg[] = $row_arr[0];
    $boardgames[] = $row_arr[1];
    $vids[] = $row_arr[2];

    
}
echo "tcg <br>\n";
print_r($tcg);
echo "boardgames \n";
print_r($boardgames);
echo "video games \n";
print_r($vids);

?>