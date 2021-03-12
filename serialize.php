
        <?php
    $connect=new PDO("mysql:host=localhost;dbname=test","root","");
    
    if(isset($_POST['name'])){
        $name=$_POST['name'];
        $message=$_POST['message'];
        $query=$connect->prepare('INSERT INTO testing (user_name,message) VALUES (?,?)');
        if($query->execute(array($name,$message))){
            echo '<p>Vous avez entré</p>';
            echo '<p>Name: '.$name.'</p>';
            echo '<p>Message: '.$message.'</p>';
        }


    }

?>