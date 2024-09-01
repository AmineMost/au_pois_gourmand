<?php
session_start();

if (!isset($_SESSION['users'])) {
    $_SESSION['users'] = [];
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $email = $_POST['email'];

    // Pour vérifier si l'utilisateur existe car sinon quick
    foreach ($_SESSION['users'] as $user) {
        if ($user['username'] == $username) {
            echo "Nom d'utilisateur déjà pris.";
            exit();
        }
    }

    // Ajouter l'utilisateur au tableau
    $_SESSION['users'][] = [
        'username' => $username,
        'password' => password_hash($password, PASSWORD_BCRYPT),
        'email' => $email
    ];

    echo "Whaou ! Tu t'es inscrit rhmale allez clique ici ou jte rafale <a href='login.php'>vous connecter</a>.";
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription</title>
</head>
<body>
    <h2>Page d'inscription</h2>
    <form action="register.php" method="post">
        <label for="username">Ton nom pour te draguer :</label>
        <input type="text" id="username" name="username" required><br><br>
        
        <label for="email">Drop ton MAIL :</label>
        <input type="email" id="email" name="email" required><br><br>
        
        <label for="password"> Donne ton mdp ou jte tue :</label>
        <input type="password" id="password" name="password" required><br><br>
        
        <button type="submit">S'inscrire</button>
    </form>
</body>
</html>
    