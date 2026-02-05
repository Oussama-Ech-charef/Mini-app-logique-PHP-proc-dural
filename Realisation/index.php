<?php
$file = "reviews.txt";
$error = "";
$success = "";
$reviews_to_show = [];

if (isset($_POST['submit_review'])) {

    $name    = htmlspecialchars(trim($_POST['name'] ?? ''));
    $mail    = htmlspecialchars(trim($_POST['mail'] ?? ''));
    $comment = htmlspecialchars(trim($_POST['comment'] ?? ''));
    $date    = date("d/m/y H:i:s");

    if (!empty($name) && !empty($mail) && !empty($comment)) {

        $line_to_save = "<<$name|$mail|$date|$comment>>" . PHP_EOL;
        
        file_put_contents($file, $line_to_save, FILE_APPEND | LOCK_EX);
        $success = "Review saved successfully!";
    } else {
        $error = "Please fill in all fields before submitting.";
    }
}


if (isset($_POST['show_reviews'])) {
    if (file_exists($file)) {
       
        $all_lines = file($file, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
        
        $reviews_to_show = array_slice(array_reverse($all_lines), 0, 5);
    } else {
        $error = "No reviews found yet.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Guestbook - Simplified</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="form_container">
    <?php 
        if($error) echo "<p style='color:red;text-align:center;'>$error</p>";
        if($success) echo "<p style='color:green;text-align:center;'>$success</p>"; 
    ?>

    <form action="index.php" method="POST">
        <fieldset>
            <legend>Give us your review!</legend>
            <input type="text" name="name" placeholder="Name..."><br>
            <input type="email" name="mail" placeholder="Email..."><br>
            <textarea name="comment" placeholder="Your comments..."></textarea>
            <div class="buttons">
                <button type="submit" name="submit_review">Submit</button>
                <button type="submit" name="show_reviews" formnovalidate>Show Reviews</button>
            </div>
        </fieldset>
    </form>

    <?php
    if (!empty($reviews_to_show)) {
        echo '<div class="reviews_list"><h3>Latest Reviews:</h3>';
        
        foreach ($reviews_to_show as $index => $line) {
            
            $clean_line = str_replace(['<<', '>>'], '', $line);
            $parts = explode('|', $clean_line);

            if (count($parts) === 4) {
                list($name, $email, $date, $comment) = $parts;
                $number = $index + 1; 

                echo "
                <table class='review_table' >
                    <tr class='review_header' >
                        <td><strong>#$number</strong> : by $name ($email)</td>
                        <td>on: $date</td>
                    </tr>
                    <tr class='review_body'>
                        <td colspan='2'>$comment</td>
                    </tr>
                </table>";
            }
        }
        echo '</div>';
    }
    ?>
</div>

</body>
</html>