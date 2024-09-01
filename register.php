<?php
session_start();
$error = '';

if (isset($_POST['register'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    if ($password !== $confirm_password) {
        $error = "Les mots de passe ne correspondent pas.";
    } else {
        $file = 'users.txt';
        $user_data = $username . ':' . $password . "\n";
        file_put_contents($file, $user_data, FILE_APPEND | LOCK_EX);

        header("Location: login.php");
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription - Au Pois Gourmand</title>
    <link href="https://fonts.googleapis.com/css2?family=Srisakdi:wght@700&family=Montserrat:wght@500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
    <style>
        body {
            font-family: 'Srisakdi', cursive;
            background-color: #a9f0d1;
            margin: 0;
            padding: 0;
            height: 100vh;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }
        .register-container {
            background-color: white;
            border-radius: 8px;
            padding: 20px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
            width: 100%;
            max-width: 400px;
        }
        .header-title {
            font-family: 'Srisakdi', cursive;
            font-size: 2em;
            font-weight: bold;
            color: #3e3e3e;
            text-align: center;
            margin-bottom: 20px;
        }
        .header-title .fa-kiwi-bird {
            color: #6B9986;
            margin-right: 10px;
        }
        .form-group label {
            font-family: 'Montserrat', sans-serif;
            font-size: 1.1em;
            color: #3e3e3e;
        }
        .btn-register {
            background-color: #007bff;
            color: white;
            border-radius: 20px;
            padding: 10px 20px;
            font-family: 'Montserrat', sans-serif;
            text-transform: uppercase;
            border: none;
            width: 100%;
        }
        .btn-register:hover {
            background-color: #0056b3;
        }
        .error-message {
            color: red;
            margin-bottom: 10px;
            font-family: 'Montserrat', sans-serif;
        }
        .login-link {
            font-family: 'Montserrat', sans-serif;
            display: block;
            text-align: center;
            margin-top: 20px;
        }
    </style>
</head>
<body>

<div class="register-container">
    <div class="header-title">
        <i class="fa-solid fa-kiwi-bird"></i>
        <span>Au Pois Gourmand</span>
    </div>

    <!-- Message d'erreur, si ça ne marche pas -->
    <?php if (!empty($error)) : ?>
        <p class="error-message"><?php echo $error; ?></p>
    <?php endif; ?>

    <!-- Formulaire d'inscription -->
    <form method="post" action="">
        <div class="form-group">
            <label for="username">Ton pseudo futur qui se fera hacker</label>
            <input type="text" class="form-control" name="username" id="username" required>
        </div>

        <div class="form-group">
            <label for="password">Mets un mdp sinon tu es nul</label>
            <input type="password" class="form-control" name="password" id="password" required>
        </div>

        <div class="form-group">
            <label for="confirm_password">Reconfirme gugus</label>
            <input type="password" class="form-control" name="confirm_password" id="confirm_password" required>
        </div>

        <button type="submit" class="btn-register" name="register">S'inscrire</button>
    </form>

    <p class="login-link">Déjà un compte ? <a href="login.php">Alors ramène toi ou je te prend en otage !</a></p>
</div>

</body>
</html>

<!--
 * Notes
 *
 * 1. Gestion de la Session et Message d'Erreur
 * -------------------------------------------
 * Le script commence par "session_start()" pour gérer les sessions utilisateur. Il initialise une variable
 * d'erreur pour afficher les messages si les mots de passe ne correspondent pas.
 *
 * 2. Traitement du Formulaire d'Inscription
 * -----------------------------------------
 * Lors de la soumission du formulaire, les informations sont récupérées via $_POST. Les mots de passe sont 
 * vérifiés pour correspondre. Si tout est correct, les données utilisateur sont ajoutées au fichier "users.txt".
 * Après l'inscription, l'utilisateur est redirigé vers "login.php".
 *
 * 3. HTML et Style
 * ----------------
 * Le formulaire est stylisé avec CSS intégré pour une présentation resssemblant à la page d'accueil par défaut.
 */
-->
