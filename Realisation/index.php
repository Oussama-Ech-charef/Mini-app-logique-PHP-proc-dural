<?php
$file = "reviews.txt";
$error = "";
$success = "";

if (isset($_POST['submit_review'])) {
    if (!empty($_POST['name']) && !empty($_POST['mail']) && !empty($_POST['comment'])) {
        $name = htmlspecialchars($_POST['name']);
        $mail = htmlspecialchars($_POST['mail']);
        $comment = htmlspecialchars($_POST['comment']);
        $date = date("d/m/y H:i:s");

        $new_line = "<<$name|$mail|$date|$comment>>" . PHP_EOL;
        
        file_put_contents($file, $new_line, FILE_APPEND);
        $success = "Review saved successfully!";
    } else {
        $error = "Please fill in all fields before submitting.";
    }
}

$reviews_to_show = [];
if (isset($_POST['show_reviews'])) {
    if (file_exists($file)) {
        $lines = file($file, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
        $lines = array_reverse($lines);
        $reviews_to_show = array_slice($lines, 0, 5); 
    } else {
        $error = "No reviews found yet.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Guestbook - PHP 8</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="form_container">
    <?php if($error) echo "<p class='msg' style='color:red;'>$error</p>"; ?>
    <?php if($success) echo "<p class='msg' style='color:green;'>$success</p>"; ?>

    <form action="index.php" method="POST">
        <fieldset>
            <legend>Give us your review on PHP 8!</legend>

            <label>Name :</label>
            <input type="text" name="name"><br>

            <label>Email :</label>
            <input type="email" name="mail"><br>

            <label >Your comments on the site :</label><br>
            <textarea name="comment"></textarea>

            <div class="buttons">
                <button type="submit" name="submit_review">Submit</button>
                <button type="submit" name="show_reviews" formnovalidate>Show Reviews</button>
            </div>
        </fieldset>
    </form>



<?php if (!empty($reviews_to_show)): ?>
<div class="reviews_list">
    <h3>Latest Reviews</h3>
    <?php foreach ($reviews_to_show as $index => $line): 

        $clean_line = str_replace(['<<', '>>'], '', $line);
        $data = explode('|', $clean_line);
        
        if (count($data) >= 4):
    ?>
        <table class="review_table">
            <tr class="review_header">
                <td><?php echo ($index + 1) . " : by " . $data[0] . " (" . $data[1] . ")"; ?></td>
                <td style="text-align: right;">on: <?php echo $data[2]; ?></td>
            </tr>
            <tr class="review_body">
                <td colspan="2"><?php echo $data[3]; ?></td>
            </tr>
        </table>
    <?php endif; endforeach; ?>
</div>
<?php endif; ?>


</div>

</body>
</html>