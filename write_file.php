<?php
// simplified method for writing files
$file = 'A_Big_Test.txt';
$my_new_text = 'This is some amazing new text.  I really love it.';
file_put_contents($file, $my_new_text, FILE_APPEND);

$new_file = file_get_contents('A_Big_Test.txt');
$msg = 'There was an error';
if($new_file){
    $msg = $new_file;
}

?>
<!DOCTYPE html>
<html>
    <head>
        <title>Write files</title>
    </head>
    <body><div>
        <?php echo $msg; ?>
    </div>
    </<body>
        
    </body>
</html>