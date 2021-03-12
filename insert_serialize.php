



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class="container">
        <h3>jQUERY Post Form Data Using Ajax Serialize () method</h3>
        <form action="" id="submit_form">
            <label for="">Name</label>
            <input type="text" name="name" class="form-control" id="name">
            <br>
            <label for="">Message</label>
            <textarea name="message" id="message" class="form-control"></textarea>
            <br>
            <input type="button" name="submit" id="submit" class="btn btn-info" value="submit">
        </form>
        <div id="response"></div>
    </div>


<script
  src="https://code.jquery.com/jquery-3.5.1.min.js"
  integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="
  crossorigin="anonymous"></script>
<script>
    $(function(){
        $('#submit').click(function(){
            var name=$('#name').val();
            var message=$('#message').val();
            if(name ==''&& message ==''){
                $('#response').html('<span class="text-danger">All Fields are required</span>');
            }else{
                $.ajax({
                    url:'serialize.php',
                    method:'POST',
                    data:$('#submit_form').serialize(),
                    beforeSend:function(){
                        $('#response').html('<span class="text-info">Loading Response...</span>')
                    },
                    success:function(data){
                        $('form').trigger("reset");
                        $('#response').fadeIn().html(data);
                                            }
                })
            }
        })
    })
</script>
</body>
</html>