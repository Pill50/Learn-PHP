# Use materialize UI for CSS

isset($_POST['submit]): check all datas if $_POST() is a empty array;

empty($_POST['email']): check if $_POST['email] is a empty array;

filter_var($email, FILTER_VALIDATE_EMAIL): Built-in function to validate email

if(!preg_match('/^[a-zA-Z\s]+$/', $title)): check title using regular expression

array_filter($errors)

explode(',', $pizzas[0]['ingredients']): spit string into array by same character

# Step to get data from database using mysqli:
Step 1: connect to database and check connection 
        $conn = mysqli_connect('localhost', 'user_name', 'user_password', 'database_name');
        if(!conn) {
            echo 'connect error!!';
        }
Step 2: write query 
        $sql = 'SELECT "data" FROM "table_name" ORDER BY "sth"';
Step 3: make query and get result
        $result = mysqli_query($conn, $sql);
Step 4: fetch data 
        $pizza = mysqli_fetch_all($result, MYSQLI_ASSOC);
Step 5: free data from memory and close connect
        mysqli_free_result($result);
        mysqli_close($conn);
=============================================


CREATE -> READ -> UPDATE -> DELETE

$conn = mysqli_connect(loccalhost, $username, $pw, $db_name);
if(!$conn) {
        echo "error;
} 

$sql = "SELECT * FROM table_name WHERE "condition"";
$sql = "INSERT INTO table_name(xyz) VALUE(xyz);
#sql = "DELETE FROM table_name WHERE sth";

$result = mysqli_query($conn, $sql);

$array = mysqli_fetch_all($result, MYSQLI_ASSOC);
$array1 = mysqli_fetch_assoc($result);

mysqli_free_result($result);
mysqli_close($conn);