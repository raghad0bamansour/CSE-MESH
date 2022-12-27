<!DOCTYPE html>
<html>
<head>
<title>Help Center</title>
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<script src="https://kit.fontawesome.com/a076d05399.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<link rel="stylesheet" href="css/policy10.css">
<link rel="stylesheet" href="css/bot.css">
</head>
<body>

<?php include "bar2.php"; ?>

<img class="policy" src="img/helpcenter.png" alt="">
<div class="container-fluid div1">
<div class="wrapper">
<div class="row">
<div class="col">
        <div class="title">CSE MESH Chatbot</div>
        <div class="form">
            <div class="bot-inbox inbox">
                <div class="icon">
                    <i class="fas fa-user"></i>
                </div>
                <div class="msg-header">
                    <p><b>Hello there, choose one so I can help you:</b><br><br>
                        1- sis Link<br>2- Black Board Link<br>3- Contact us Email<br>
                        4- Programming Center Registration Link<br>5- Head of CSE Department<br>6- CSE Department COOP Advisor</p>
                </div>
            </div>
        </div>
         </div>
          </div>
        <div class="row">
        <div class="col">
        <div class="typing-field">
            <div class="input-data">
                <input id="data" type="text" placeholder="Type something here.." required>
                <button id="send-btn">Send</button>
            </div>
        </div>
        </div>
    </div>
</div>
</div>

    <script>
        $(document).ready(function(){
            $("#send-btn").on("click", function(){
                $value = $("#data").val();
                $msg = '<div class="user-inbox inbox"><div class="msg-header"><p>'+ $value +'</p></div></div>';
                $(".form").append($msg);
                $("#data").val('');

                // start ajax code
                $.ajax({
                    url: 'message.php',
                    type: 'POST',
                    data: 'text='+$value,
                    success: function(result){
                        $replay = '<div class="bot-inbox inbox"><div class="icon"><i class="fas fa-user"></i></div><div class="msg-header"><p>'+ result +'</p></div></div>';
                        $(".form").append($replay);
                        // when chat goes down the scroll bar automatically comes to the bottom
                        $(".form").scrollTop($(".form")[0].scrollHeight);
                    }
                });
            });
        });
    </script>

<?php include "footer.php"; ?> 
</body>
</html>
