<?php
session_start();
echo "session id = " . session_id() . "<br>";
if (isset($_POST['answer_opt']) && isset($_POST['correct_answer'])) {
    // もし回答があっていたら
    if ($_POST['answer_opt'] == $_POST['correct_answer']) {
        // 正解数をインクリメントする
        $_SESSION['correct_cnt']++;
    }
}
// 正解数をPOSTデータで送信
$_POST['correct_cnt'] = $_SESSION['correct_cnt'];
$_POST['correct_cnt'] = 99;

// セッションから問題のカウントインデックスを取得する
$idx = $_SESSION['q_cnt_idx'];
// もし問題のカウントインデックスがあって、10になったら
if (isset($_SESSION['q_cnt_idx']) && $_SESSION['q_cnt_idx'] >= 10) {
    // result.htmlへポストデータ付きで307リダイレクトする
    header("Location: ./result.html", true, 307);
    exit();
} else {
    // index2.htmlへポストデータつきで307リダイレクトする
    header("Location: ./", true, 307);
    exit();
}
exit();
