<?php
session_start();
$usersFile = 'users.txt';

// 1. ユーザー登録処理
function registerUser($username, $password) {
    global $usersFile;
    $users = file_exists($usersFile) ? unserialize(file_get_contents($usersFile)) : [];
    if (isset($users[$username])) {
        return "このユーザー名は既に存在しています。";
    }
    $users[$username] = password_hash($password, PASSWORD_DEFAULT);
    file_put_contents($usersFile, serialize($users));
    return "登録が完了しました。";
}

// 2. ユーザーログイン処理
function loginUser($username, $password) {
    global $usersFile;
    $users = file_exists($usersFile) ? unserialize(file_get_contents($usersFile)) : [];
    if (isset($users[$username]) && password_verify($password, $users[$username])) {
        $_SESSION['username'] = $username;
        header('Location: index.php');
        exit();
    }
    return "ユーザー名またはパスワードが間違っています。";
}

// 3. 管理者ログイン処理
function loginAdmin($username, $password) {
    $adminUsername = 'admin';
    $adminPassword = 'adminpass'; // 固定の管理者情報
    if ($username === $adminUsername && $password === $adminPassword) {
        $_SESSION['admin'] = true;
        header('Location: index.php');
        exit();
    }
    return "管理者名またはパスワードが間違っています。";
}

// 4. ログアウト処理
if (isset($_GET['logout'])) {
    session_unset();
    session_destroy();
    header('Location: index.php');
    exit();
}

// POSTリクエスト処理
$loginError = $registerMessage = $adminLoginError = "";
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['register'])) {
        $registerMessage = registerUser($_POST['username'], $_POST['password']);
    } elseif (isset($_POST['login'])) {
        $loginError = loginUser($_POST['username'], $_POST['password']);
    } elseif (isset($_POST['admin_login'])) {
        $adminLoginError = loginAdmin($_POST['username'], $_POST['password']);
    }
}
?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ユーザー登録とログイン</title>
</head>
<body>

<?php if (isset($_SESSION['admin'])): ?>
    <h1>管理者ページ</h1>
    <p>管理者としてログインしています。</p>
    <a href="index.php?logout=true">ログアウト</a>

<?php elseif (isset($_SESSION['username'])): ?>
    <h1>ようこそ、<?php echo htmlspecialchars($_SESSION['username']); ?>さん</h1>
    <p>通常のユーザーとしてログインしています。</p>
    <a href="index.php?logout=true">ログアウト</a>

<?php else: ?>
    <h1>ログイン画面</h1>
    <form method="post">
        <label>ユーザー名: <input type="text" name="username" required></label><br>
        <label>パスワード: <input type="password" name="password" required></label><br>
        <button type="submit" name="login">ログイン</button>
        <p style="color: red;"><?php echo $loginError; ?></p>
    </form>

    <h2>新規登録はこちら</h2>
    <form method="post">
        <label>ユーザー名: <input type="text" name="username" required></label><br>
        <label>パスワード: <input type="password" name="password" required></label><br>
        <button type="submit" name="register">登録</button>
        <p style="color: green;"><?php echo $registerMessage; ?></p>
    </form>

    <h2>管理者ログイン</h2>
    <form method="post">
        <label>管理者名: <input type="text" name="username" required></label><br>
        <label>パスワード: <input type="password" name="password" required></label><br>
        <button type="submit" name="admin_login">管理者ログイン</button>
        <p style="color: red;"><?php echo $adminLoginError; ?></p>
    </form>
<?php endif; ?>

</body>
</html>
