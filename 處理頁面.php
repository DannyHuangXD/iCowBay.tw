<!DOCTYPE html>
<html>
<body>
    <?php
    $id = $_POST['id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $posttime = $_POST['posttime'];
    $content = $_POST['content'];
    if ( $name == "" ){
        echo "大名的部份請勿留白,請填入您的名字";
        header("refresh:1 url=/play/index.html");
        exit;
    }
    if ( $email == "" ){
        echo "請留下您的MAIL,好讓我能與您聯絡";
        header("refresh:1 url=index.html");
        exit;
    }
    if ( $content == "" ){
        echo "您不是要留言嗎?不用客氣!盡管留言吧!";
        header("refresh:1 url=index.html");
        exit;
    }
    $posttime = date ('Y-m-d H:i:s');
    if (!get_magic_quotes_gpc()){
        $id = addslashes($id);
        $name = addslashes($name);
        $email = addslashes($email);
        $posttime = addslashes($posttime);
        $content = addslashes($content);
    }
    @ $db = new mysqli('localhost', 'piusr', 'raspi', 'article');

    if (mysqli_connect_errno()){
        echo '錯誤:您所連的資料庫正在大號中,請稍後再連!';
        header("refresh:1 url=index.html");
        exit;
    }
    else{
        $query = "insert into post values
        ('".$id."', '".$name."', '".$email."','".$posttime."', '".$content."')";
        $result = $db->query($query);
        if ($result)
        echo " 您的留言已經送出,謝謝您的留言!</br> ";
        header("refresh:1 url=list.php");
        exit;
    }
    ?>
</body>
</html>
