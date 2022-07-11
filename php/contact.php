<?php
    //　- 確認画面 -
    if ($_SERVER["REQUEST_METHOD"] == "POST"){
    //$name = $_POST['name'];
    //$email= $_POST['mail'];
    //$message= $_POST['message'];
    $name = htmlspecialchars($_POST['name'],ENT_QUOTES, "UTF-8");
    $email = htmlspecialchars($_POST['mail'],ENT_QUOTES, "UTF-8");
    $message = htmlspecialchars($_POST['message'],ENT_QUOTES, "UTF-8");
    }
    if(isset($_POST['submit'])){
        //メールを送信する
        $to = "info@terada-hiroaki-officialsite.com";
        $subject = "お問い合わせが届きました";
        $header = "From: noreply@terada-hiroaki-officialsite.com";
        $body = <<<EOF
以下の内容が送信されました。

===================================================
【 お名前 】
 {$name}

【 メール 】
 {$email}

【 内容 】
 {$message}
===================================================
EOF;

        mail($to, $subject, $body, $header);
        header("Location: https://terada-hiroaki-officialsite.com");
        exit;
    }
?>


<!DOCTYPE html>
<html lang="ja">
    <head>
       <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Confirm Page</title>

        <!------style.css ------------------->
        <link rel="stylesheet" href="../css/style.css">

        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;600;700&display=swap" rel="stylesheet">

        <!------ font awesome ------------------->
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
        <form action="contact.php" method="post">
        <input type="hidden" name="name" value="<?php echo $name; ?>">
        <input type="hidden" name="email" value="<?php echo $email; ?>">
        <input type="hidden" name="message" value="<?php echo $message; ?>"> 
        <h1>お問い合わせ 内容確認</h1>
        <p>お問い合わせ内容はこちらで宜しいでしょうか？<br>よろしければ「送信する」ボタンを押して下さい。</p>
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
                    <td><?= nl2br($message) ?></td>
                </tr>
            </tbody>
        </table>
        <input type="button" value="内容を修正する" onclick="history.back(-1)">
        <button type="submit" name="submit">送信する</button>
        </form>
        </div>
    </div>
    </section>

    </body>


</html>
