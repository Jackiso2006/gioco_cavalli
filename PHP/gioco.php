<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
    session_start();
    if (!isset($_SESSION['carte'])) { // se ho appena aperto la pagina allora creo il vettore con i numeri
        session_destroy();
        session_start();
        $_SESSION['carte'] = array();

        $tmp;
        for($i = 0; $i<4; $i++){
            $aus = "";
            switch ($i){
                case 0: $aus = "c"; break;
                case 1: $aus = "d"; break;
                case 2: $aus = "h"; break;
                case 3: $aus = "s"; break;
            }
            for($j = 1; $j<13; $j++){ // va fino a 13 perchè i re li uso come cavalli
                $tmp = "bg_".$aus.$j;
                $_SESSION['carte'][] = $tmp;
            }
        }
        shuffle($_SESSION['carte']);
    }
    echo implode(',', $_SESSION['carte']);
    ?>

   <main>
    <?php
        
    ?>
   </main> 

</body>

</html>