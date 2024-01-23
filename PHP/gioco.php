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
    if (isset($_POST['scelta_c'])) {
        $scelta="c";
    } else if (isset($_POST['scelta_d'])) {
        $scelta="d";
    } else if (isset($_POST['scelta_h'])) {
        $scelta="h";
    } else if (isset($_POST['scelta_s'])) {
        $scelta="s";
    }

    $carte = explode(',', $_POST["carte"]);
    $posizioni = explode(',', $_POST["posizioni"]);


    // tuttiMaggiori($num){
    //     // se tutte le posizioni sono maggiori di 
    // }
    
    ?>

   <main>
    <?php
        for($i=0; $i<5;$i++){
            echo "<div>";
            for($j=0; $j<6; $j++){
                /* if c'è la carta in questa posizione -> stampo la carta (switch tra i semi) */
                /* else stampo div vuoto (occuperà spazio perchè glielo dico col css) */
                if($i == 0){
                    // if(tuttiMaggiori(6-$j))
                    echo "<div class='card'><img src='../IMG/dorso.JPG'></div>";

                }
                else
                    echo "<div class='card'>carta</div>";
            }
            echo "</div>";
        }
        // qua stampo il mazzo
    ?>
   </main> 

</body>

</html>