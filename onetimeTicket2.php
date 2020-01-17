<?php

//完了画面
//ワンタイムチケットのチェックと破棄

if(isset($_POST['token'], $_SESSION['token']) && ($_POST['token'] === $_SESSION['token'])) {
	unset($_SESSION['token']);
	echo "正しいアクセスです。";
} else {
	exit("不正なアクセスです。");
}
?>