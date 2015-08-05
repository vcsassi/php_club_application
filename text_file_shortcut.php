<?php
    //shortcut for getting file contents
    $myfile = file_get_contents('misc.txt');
    
?>
<!DOCTYPE html>
<html>
<head>
    <title></title>
</head>
<body>
    <section>
        <h1>Short cut for getting text file</h1>
        <div><pre><?php echo $myfile; ?></pre></div>
    </section>
</body>
</html>