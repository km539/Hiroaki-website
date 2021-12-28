<?php 
    //$name = $_POST['name'];
    //$email= $_POST['mail'];
    //$message= $_POST['message'];
    $name = htmlspecialchars($_POST['name'],ENT_QUOTES);
    $email = htmlspecialchars($_POST['mail'],ENT_QUOTES);
    $message = htmlspecialchars($_POST['message'],ENT_QUOTES);
    //$mail_body = "";

    if(isset($_POST['button'])) {
        echo "This Button is selected";
　　　// メールを送信する
    mb_language("Japanese");
    mb_internal_encoding("UTF-8");　　　
    $mail_body = "以下の内容が送信されました."."\n"."\n".
            "【お名前】"."\n".
            $name."\n"."\n".
            "【メールアドレス】"."\n".
            $email."\n"."\n".
            "【内容】"."\n".
            $message."\n"."\n".;

    $to = 'kyoji.gunners@gmail.com';
    $from = $email;
    $subject = 'お問い合わせが届きました';
 
    mb_send_mail($to, $subject, $mail_body, "From: {$from}");

    }
?>


<!DOCTYPE html>
<html lang="jp">
    <head>
       <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Confirm Page</title>

        <!------style.css ------------------->
        <link rel="stylesheet" href="../css/style.css">

        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;600;700&display=swap" rel="stylesheet">

        <!------font awesome ------------------->
        <script src="https://kit.fontawesome.com/1325c2723b.js" crossorigin="anonymous"></script>

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    </head>

    <body>
    <section id="confirm">
    <div class="container p-3 mb-2 bg-light text-dark confirm-form">
        <div class="confirm-box">
        <h1>以下の内容で送信してよろしですか？</h1>
        <table class="table">
            <tbody>
                <tr>
                    <th>お名前：</th>
                    <td><?= $name ?></td>
                </tr>
                <tr>
                    <th>メールアドレス：</th>
                    <td><?= $email ?></td>
                </tr>
                <tr>
                    <th>ご用件：</th>
                    <td><?= $message ?></td>
                </tr>
            </tbody>
        </table>
        <form method="post">
        <input type="button" value="内容を修正する" onclick="history.back(-1)">
          
        <input type="submit" name="button"
                value="送信する"/>
        </form>
        <a href="../index.html">戻る</a>
        <button type="submit" id="clicked">送信する</button>
        </div>
    </div>
    </section>

    <script>
        const myfunc = document.getElementById("clicked");
        myfunc.addEventListener("click", function() {
            console.log("clicked button");
        });
    </script>
    </body>


</html>
