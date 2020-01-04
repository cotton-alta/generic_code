<?php

//ログインする側の処理
$user = 'ms2sato';
$password = 'mypassword';

$salt = createSalt();
$encrypted_password = crypt($password, $salt);

$insertSql = "insert into user(user_id, encrypted_password, salt) values (?, ?, ?)";
$stmt = $dbh->prepare($insertSql);
$stmt->excute(array($user, $encrypted_password, $salt));

?>

<?php

//ログインを認証する側の処理
$user = 'ms2sato';
$password = 'mypassword'; //postされてきたデータ

$selectSql = "select * from user where user_id = ?";
$stmt = $dbh->prepare($selectSql);
$stmt->excute(array($user));

while ($data = $stmt->fetch(PDO::FETCH_ASSOC)) {
    $salt = $data['salt'];
    $encrypted_password = crypt($password, $salt);

    if ($data['encrypted_password'] == $encrypted_password) {
        echo 'ようこそ';
    } else {
        echo '不正なログインです';
    }
}

?>