<?php
    include('config/db_connect.php');

    $email = $title = $ingredients = '';
    $errors = array('email'=>'', 'title'=>'', 'ingredients'=>'');
    // check data after click submit btn
    if(isset($_POST['submit'])) {
        // check email 
        if(empty($_POST['email'])) {
            $errors['email'] = 'An email is required <br />';
        } else {
            $email = $_POST['email'];
            if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $errors['email'] = 'Email must be a valid email address';
            }
        }
        // check title
        if(empty($_POST['title'])) {
            $errors['title'] = 'Title is required <br/>';
        } else {
            $title = $_POST['title'];
            if(!preg_match('/^[a-zA-Z\s]+$/', $title)) {
                $errors['title'] = 'Title must be letters and spaces only';
            }
        }
        // check ingredients
        if(empty($_POST['ingredients'])) {
            $errors['ingredients'] = 'Ingredients is required <br/>';
        } else {
            $ingredients = $_POST['ingredients'];
            if(!preg_match('/^([a-zA-Z\s]+)(,\s*[a-zA-Z\s]*)*$/',$ingredients)) {
                $errors['ingredients'] = 'Ingredients must be a comma seperated list';
            }
        }

        // Checking for errors and Redirecting
        if(array_filter($errors)) {       
           
        } else {
            $email = mysqli_real_escape_string($conn, $_POST['email']);
            $title = mysqli_real_escape_string($conn, $_POST['title']);
            $ingredients = mysqli_real_escape_string($conn, $_POST['ingredients']);

            // create sql
            $sql = "INSERT INTO pizzas(title, email, ingredients) VALUES('$title', '$email', '$ingredients')";

            // save to db and check
            if(mysqli_query($conn, $sql)) {
                //success
                header('Location: index.php');
            } else {
                //error
                echo 'query error: '. mysqli_error($conn);
            } 
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
    <!-- HEADER -->
    <?php include('template/header.php'); ?>

    <!-- CONTENT -->
    <section class="container grey-text">
        <h4 class="center">Add a pizza</h4>
        <form class="white" action="add.php" method="POST">
            <label for="">Your Email:</label>
            <input type="text" name="email" id="" value="<?php echo $email; ?>">
            <div class="red-text"><?php echo htmlspecialchars($errors['email']); ?></div>

            <label for="">Pizza Title:</label>
            <input type="text" name="title" id="" value="<?php echo $title; ?>">
            <div class="red-text"><?php echo htmlspecialchars($errors['title']); ?></div>

            <label for="">Ingredients (comma separated):</label>
            <input type="text" name="ingredients" id="" value="<?php echo htmlspecialchars($ingredients); ?>">
            <div class="red-text"><?php echo $errors['ingredients']; ?></div>

            <div class="center">
                <input type="submit" name="submit" value="submit" class="btn brand z-depth-0">
            </div>
        </form>
    </section>

    <!-- FOOTER -->
    <?php include('template/footer.php'); ?>

</html>