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
    $carte = explode(',', $_POST["carte"]);
    $posizioni = explode(',', $_POST["posizioni"]);
    $carteSX = explode(',', $_POST["carteSX"]);
    $carteSxGirate = explode(',', $_POST["carteSxTurn"]);
    $carta_girata = null;
    $scelta = "";

    // se ho già scelto il seme giro la carta, entro negli else if se sono al primo giro 
    if(isset($_POST['seme'])){
        $scelta=$_POST['seme'];
        giraCarta();
    }
    else if (isset($_POST['scelta_c']))
        $scelta="c";
    else if (isset($_POST['scelta_d'])) 
        $scelta="d";
    else if (isset($_POST['scelta_h'])) 
        $scelta="h";
    else if (isset($_POST['scelta_s'])) 
        $scelta="s";
    else
        echo "Qualcosa è andato storto";
    
    function tuttiMaggiori(){
        global $posizioni;
        global $carteSxGirate;
        $num = min($posizioni);
        if($num != 0){
            for($k=0; $k<$num; $k++)
                if($carteSxGirate[$k] == '0'){
                    $carteSxGirate[$k] = '1';
                    giraCartaSX($k);
                } 
        }
    }

    function giraCarta(){
        global $carta_girata;
        global $carte;
        global $posizioni;
        $carta_girata = $carte[0];
        array_shift($carte);
        switch($carta_girata[3]){
            case 'c': $posizioni[0]++; controllaVittoria(0, 'c'); break;
            case 'd': $posizioni[1]++; controllaVittoria(1, 'd'); break;
            case 'h': $posizioni[2]++; controllaVittoria(2, 'h'); break;
            case 's': $posizioni[3]++; controllaVittoria(3, 's'); break;
        }
        
        tuttiMaggiori();
    }

    function giraCartaSX($pos){
        global $carteSX;
        global $posizioni;
        $carta_girata = $carteSX[5-$pos];
        switch($carta_girata[3]){
            case 'c': $posizioni[0]++; controllaVittoria(0, 'c'); break;
            case 'd': $posizioni[1]++; controllaVittoria(1, 'd'); break;
            case 'h': $posizioni[2]++; controllaVittoria(2, 'h'); break;
            case 's': $posizioni[3]++; controllaVittoria(3, 's'); break;
        }
        tuttiMaggiori();
    }

    function controllaVittoria($i, $seme){
        global $posizioni;
        global $scelta;
    
        if($posizioni[$i] > 5) {
            $bodyClass = $seme == $scelta ? 'winning' : 'losing';
    
            echo "<body class='$bodyClass'>";
            echo "<div class='fine'>
                    <h1>" . ($seme == $scelta ? "Il cavallo su cui hai scommesso è arrivato primo!!!" : "Il cavallo su cui hai scommesso ha perso, ma non perdere mai la fiducia!!") . "</h1>
                    <button id='esci'>CONTINUA</button>
                  </div>";
            echo "</body>";
            return;
        }
    }
    
    ?>

   <main>
    <?php
        for($i=0; $i<5;$i++){
            echo "<div>";
            for($j=0; $j<6; $j++){
                if($i == 0){
                    if($carteSxGirate[5-$j] == '0')
                        echo "<div class='card'><img src='../IMG/dorso.JPG'></div>";
                    else
                        echo "<div class='card'><img src='../IMG/". $carteSX[$j] . "'></div>";
                }
                else{
                    if($posizioni[$i - 1] == 5 - $j)
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
        echo "<form action='./gioco.php' method='post'>";

        if($carta_girata != null)
            echo "<div class='card'><img src='../IMG/". $carta_girata ."'></div>";
        
        echo "  <button name='scelta' class='card'><img src='../IMG/dorso.JPG'></button>
                <input type='hidden' id='carte' name='carte' value=". implode(",", $carte) .">
                <input type='hidden' id='posizioni' name='posizioni' value=". implode(",", $posizioni) .">
                <input type='hidden' id='seme' name='seme' value=". $scelta .">
                <input type='hidden' id='carteSX' name='carteSX' value=". implode(",", $carteSX) .">
                <input type='hidden' id='carteSxTurn' name='carteSxTurn' value=". implode(",", $carteSxGirate) .">
            </form>";
    ?>
   </main> 

</body>

</html>