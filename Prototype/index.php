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
            $resultat = "Addition: " . $res;

         } elseif ($op == "-") {
            $res = $n1 - $n2;
            $resultat = "Soustraction: " . $res;

         }elseif ($op == "*") {
            $res = $n1 * $n2;
            $resultat = "Multiplication: " . $res;
            
         }elseif ($op == "/") {
            if ($n2 != 0) {
               $res = $n1 / $n2;
               $resultat = "Division: " . $res;

            }else {
               $erreur = "Erreur: Impossible de diviser par zéro !";
            }
         }

      } else {
         $erreur = "S'il vous plaît, entrez des nombres valides.";
      }




      if ($erreur != "") {
         echo "<p style='color: red;'>$erreur</p>";
      }


      if ($resultat != ""){
         echo "<label>Résulrat :</label>";
         echo "<input type='text' value='$resultat' readonly>";
      }

} 


?>




<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Calculatrice PHP Simple</title>
</head>
<body>
   <h1>Ma Calculatrice PHP</h1>

   <form  method="POST"  action="">
      <input type="number" name="n1" placeholder="Nombre 1" required>

      <select name="operation">
         <option value="+">+</option>
         <option value="-">-</option>
         <option value="*">*</option>
         <option value="/">/</option>
      </select>

      <input type="number" name="n2" placeholder="Numbre 2" required>

      <button type="submit">Calculer</button>
   </form>

   <br>


   
</body>
</html>