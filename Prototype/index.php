<?php 

$resultat = "";
$erreur = "";


if ($_SERVER["REQUEST_METHOD"] == "POST") {
   $n1 = $_POST['n1'];
   $n2 = $_POST['n2'];
   $op = $_POST['operation'];




      if (is_numeric($n1) && is_numeric($n2)) {

         if ($op == "+") {
            $res = $n1 + $n2;
            $resultat = $res;

         } elseif ($op == "-") {
            $res = $n1 - $n2;
            $resultat =  $res;

         }elseif ($op == "*") {
            $res = $n1 * $n2;
            $resultat =  $res;

         }elseif ($op == "/") {
            if ($n2 != 0) {
               $res = $n1 / $n2;
               $resultat =  $res;

            }else {
               $erreur = "Erreur: Division par zéro!";
            }

         }

      } else {
         $erreur = "Veuillez saisir des nombres.";
      }





}

?>





<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Calculatrice PHP Simple</title>
   <link rel="stylesheet" href="style.css">
</head>
<body>

   <div class="content">

   <h2>Ma Calculatrice PHP</h2>

   <form  method="POST"  action="">

      <input type="number" name="n1" placeholder="Nombre 1" >

      <select name="operation">
         <option value="+">Addition (+)</option>
         <option value="-">Soustraction (-)</option>
         <option value="*">Multiplication (*)</option>
         <option value="/">Division (/)</option>
      </select>

      <input type="number" name="n2" placeholder="Numbre 2">

      <button type="submit">Calculer</button>

      <br><br>

        <input class="resultat" type="text" value="<?php echo $resultat; ?>" placeholder="Resultat... " readonly>
        
        <p><?php echo $erreur; ?></p>
        
   </form>

</div>

   
</body>
</html>