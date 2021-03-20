<?php
session_start();

//Including the database and connecting to it
$servername = "localhost";
$username = "id16424753_root";
$dbname = "id16424753_mydb";
$dbpassword = "-5@4AyfNJ{a|E_5t";
$conn = new mysqli($servername,$username,$dbpassword,$dbname);
$host  = $_SERVER['HTTP_HOST'];
$uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
$extra = '';

if($_SERVER["REQUEST_METHOD"] == "POST"){
    //Delete the profile from the database
    if(!empty($_POST["delete"])){
        $sql = "DELETE FROM Interns WHERE id=".$_SESSION["id"].";";
        if($conn->query($sql) === TRUE){
            $_SESSION["id"] = "";
            $extra = 'index.php';
            header("refresh:3,url=http://$host$uri/$extra");
            echo "<strong>Done</strong>";
            echo "<br>You will be redirected soon";
        }else{
            $extra = 'index.php';
            header("refresh:3,url=http://$host$uri/$extra");
            echo "<strong>Failed</strong>";
            echo "<br>You will be redirected soon";
        }
    }
    //Update the intern details in the database
    else{
        $fname = $_POST["fname"];
        $lname = $_POST["lname"];
        $phone = $_POST["phone"];
        $track = $_POST["track"];
        $pwd = $_POST["userpass"];
        $sql = "UPDATE Interns SET fname='$fname',lname='$lname',phone='$phone',track='$track',password='$pwd' WHERE id=".$_SESSION["id"].";";
        if($conn->query($sql) === TRUE){
            $extra = 'profile.php';
            header("refresh:3,url=http://$host$uri/$extra");
            echo "<strong>Successful</strong>";
            echo "<br>You will be redirected soon";
            
        }else{
            $extra = 'profile.php';
            header("refresh:3,url=http://$host$uri/$extra");
            echo "<strong>An error occurred</strong>";
            echo "<br>You will be redirected soon";
        }
    }
}else{
    //Find the user from the database using their unique id and display from for editing
$sql = "SELECT * FROM Interns WHERE id=".$_SESSION["id"].";";
$result = $conn->query($sql);
if($result->num_rows):
    $row = $result->fetch_assoc();
    $fname = $row["fname"];
    $lname = $row["lname"];
    $phone = $row["phone"];
    $track = $row["track"];
    $pwd = $row["password"]; ?>
<form action=<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?> method="post">
    First Name: <input type="text" name="fname" pattern="^[a-zA-Z-']*$" title="Only letters, dashes and apostrophes allowed" value="<?php echo $fname;?>" required><br><br>

    Last Name: <input type="text" name="lname" pattern="^[a-zA-Z-']*$" title="Only letters, dashes and apostrophes allowed" value="<?php echo $lname;?>" required><br><br>

    Password: <input type="password" name="userpass" pattern=".{6,12}" title="min 6 max 12" value="<?php echo $pwd;?>" required><br><br>

    Phone Number: <input type="tel" name="phone" pattern="0{1}[0-9]{10}" title="11 digit phone number" value="<?php echo $phone;?>" required><br><br>

    Choose your desired track: <br>

    <input type="radio" name="track" value="Frontend Web Development" <?php if(isset($track) && $track == "Frontend Web Development")echo "checked";?>>Frontend Web Development<br><br>

    <input type="radio" name="track" value="Backend Web Development" <?php if(isset($track) && $track == "Backend Web Development")echo "checked";?>>Backend Web Development<br><br>

    <input type="radio" name="track" value="Cloud Application Development" <?php if(isset($track) && $track == "Cloud Application Development")echo "checked";?>>Cloud Application Development<br><br>

    <input type="radio" name="track" value="Mobile Application Development" <?php if(isset($track) && $track == "Mobile Application Development")echo "checked";?>>Mobile Application Development<br><br>

    <input type="submit" value=" Edit "> <a href="./profile.php">Cancel</a><br><br> </form>
    <form action=<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?> method="post"><input style="color:red;"type="submit" value="DELETE PROFILE" name="delete" ></form>
<?php
else:
    $extra = 'profile.php';
    header("refresh:5,url=http://$host$uri/$extra");
    echo "Unable to retrieve details";
    echo "<br>You will be redirected soon";
endif;

}
?>