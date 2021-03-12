<?php
        $connect=new PDO("mysql:host=localhost;dbname=test","root","");
    
        if(isset($_POST['user_name'])){
            $query=$connect->prepare("SELECT user_name FROM testing WHERE user_name=?");
            $query->execute(array($_POST['user_name']));
            $row=$query->rowCount();
            $output='';
            if($row>0){
                $output='oui';
                
    
            }else{
                $output='non';
                echo $output;
            }
    
        }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class="container-box">
        <div class="form-group">
            <label for="">Entrez le nom</label>
            <input type="text" name="username" id="username" class="form-control">
            <span id="availability"></span>
        </div>
    </div>

    
    <script
  src="https://code.jquery.com/jquery-3.5.1.min.js"
  integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="
  crossorigin="anonymous"></script>
  <script>
    $(function(){

            $('#username').keyup(function(){           
                var username=$(this).val();
                $.ajax({
                    url:'index.php',
                    method:"POST",
                    data:{user_name:username},
                    dataType:"text",
                    success:function(data){
                        $('#availability').html(data);

                        
                    }
                })
            })
    })
  </script>
</body>
</html>