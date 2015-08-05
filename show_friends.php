<?php 
$full_file = file_get_contents('mylistoffriends.txt');
$friend_array = explode(',', $full_file);
print_r($friend_array);
echo "<pre>";
foreach($friend_array as $friend){
    echo $friend . " is my friend \n";
}
echo "</pre>";
?>