<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gioco cavalli</title>
    <link rel="stylesheet" href="../CSS/gioco.css">
    <script src="../JS/gioco.js"></script>
</head>

<body>
    <?php
    $scelta = "";
    if (isset($_POST['scelta_c']))
        $scelta="c";
    else if (isset($_POST['scelta_d'])) 
        $scelta="d";
    else if (isset($_POST['scelta_h'])) 
        $scelta="h";
    else if (isset($_POST['scelta_s'])) 
        $scelta="s";
    else if(isset($_POST['seme']))
        $scelta=$_POST['seme'];
    else
        echo "Qualcosa è andato storto";
    

    $carte = explode(',', $_POST["carte"]);
    $posizioni = explode(',', $_POST["posizioni"]);


    function tuttiMaggiori($arr, $num){
        foreach ($arr as $pos) 
            if ($pos <= $num) 
                return false;
        return true;
    }
    
    ?>

   <main>
    <?php
        for($i=0; $i<5;$i++){
            echo "<div>";
            for($j=0; $j<6; $j++){
                if($i == 0){
                    if(!tuttiMaggiori($posizioni , $j)) // controllo per girare le carte a sinistra
                        echo "<div class='card'><img src='../IMG/dorso.JPG'></div>";
                    // else ...
                }
                else{
                    if($posizioni[$i - 1]== 5 - $j)
                        switch($i){
                            case 1: echo "<div class='card'><img src='../IMG/bg_c13.gif'></div>"; break;
                            case 2: echo "<div class='card'><img src='../IMG/bg_d13.gif'></div>"; break;
                            case 3: echo "<div class='card'><img src='../IMG/bg_h13.gif'></div>"; break;
                            case 4: echo "<div class='card'><img src='../IMG/bg_s13.gif'></div>"; break;
                        }
                    else
                        echo "<div class='card'></div>";
                }
            }
            echo "</div>";
        }
        // stampo il mazzo
        echo "<form action='./gioco.php' method='post'>
                <button name='scelta_c'><img src='../IMG/dorso.JPG'></button>
                <input type='hidden' id='carte' name='carte' value=". implode(", ", $carte) .">
                <input type='hidden' id='posizioni' name='posizioni' value=". implode(", ", $posizioni) .">
                <input type='hidden' id='seme' name='seme' value=". $scelta .">
            </form>";
    ?>
   </main> 

</body>

</html>