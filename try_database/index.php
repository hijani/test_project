<?php include "include/db.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="index.css">
    <title>Database Try</title>
</head>
<body>

    <h1>Database Try</h1>
    <div class="all-pc">
        <?php 
            
            $query = 'select * from computer';
            $select_all_from_computer = mysqli_query($connection, $query);
            while ($row = mysqli_fetch_assoc($select_all_from_computer)) {
                $index = $row['index'];
                $mouse = $row['mouse'];
                $keyboard = $row['keyboard'];
                $led = $row['led'];
                $cpu = $row['cpu'];
        
        ?>
        
        
        <div class="computer">
            <span class="index"><?php echo $index; ?></span>
            <div class="mouse">
                <h2>mouse</h2>
                <h3 class="brand"><?php echo $mouse; ?></h3>
            </div>
            <div class="keyboard">
                <h2>keyboad</h2>
                <h3 class="brand"><?php echo $keyboard; ?></h3>
            </div>
            <div class="led">
                <h2>led</h2>
                <h3 class="brand"><?php echo $led; ?></h3>
            </div>
            <div class="cpu">
                <h2>cpu</h2>
                <h3 class="brand"><?php echo $cpu; ?></h3>
            </div>
        </div>
        <!-- <br/>
        <hr/>
        <br/> -->


        <?php } ?>
    </div>
    
</body>
</html>