<?php
session_start();
$error = '';

if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $file = 'users.txt';
    if (file_exists($file)) {
        // Lire le contenu du fichier
        $file_contents = file_get_contents($file);
        $users = explode("\n", trim($file_contents));

        $user_found = false;

        foreach ($users as $user) {
            list($stored_username, $stored_password) = explode(":", $user);

            if ($username === trim($stored_username) && $password === trim($stored_password)) {
                // Enregistrer dans la session
                $_SESSION['username'] = $username;
                $_SESSION['logged_in'] = true;
                header("Location: atelier1.php");
                exit();
            }
        }

        $error = "Tu est nul, tu t tromper";
    } else {
        $error = "Le fichier de données des utilisateurs est manquant.";
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion - Au Pois Gourmand</title>
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
        .login-container {
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
        .form-control {
            font-family: 'Montserrat', sans-serif;
            font-size: 1em;
            color: #3e3e3e;
        }
        .btn-login {
            background-color: #007bff;
            color: white;
            border-radius: 20px;
            padding: 10px 20px;
            font-family: 'Montserrat', sans-serif;
            text-transform: uppercase;
            border: none;
            width: 100%;
        }
        .btn-login:hover {
            background-color: #0056b3;
        }
        .error-message {
            color: red;
            margin-bottom: 10px;
            font-family: 'Montserrat', sans-serif;
        }
        .register-link {
            font-family: 'Montserrat', sans-serif;
            display: block;
            text-align: center;
            margin-top: 20px;
        }
    </style>
</head>
<body>

<div class="login-container">
    <div class="header-title">
        <i class="fa-solid fa-kiwi-bird"></i>
        <span>Au Pois Gourmand</span>
    </div>

    <!-- Message d'erreur -->
    <?php if (!empty($error)) : ?>
        <p class="error-message"><?php echo $error; ?></p>
    <?php endif; ?>

    <!-- Formulaire -->
    <form method="post" action="">
        <div class="form-group">
            <label for="username">Jveux ton nom ctout</label>
            <input type="text" class="form-control" name="username" id="username" required>
        </div>

        <div class="form-group">
            <label for="password">Donne ton mdp jvais te hacker</label>
            <input type="password" class="form-control" name="password" id="password" required>
        </div>

        <button type="submit" class="btn-login" name="login">Se connecter</button>
    </form>

    <p class="register-link">Pas encore de compte mon gugus ? <a href="register.php">alors inscrit toi ou je te donne des donuts</a></p>
</div>

</body>
</html>

<!--
 * Notes 
 *
 * 1. Gestion de la Session et Message d'Erreur
 * -------------------------------------------
 * Le script commence par "session_start()" pour gérer les sessions utilisateur. Une variable d'erreur est
 * initialisée pour afficher les messages si les informations de connexion sont incorrectes ou si le fichier 
 * des utilisateurs est manquant.
 *
 * 2. Traitement du Formulaire de Connexion
 * ----------------------------------------
 * Lors de la soumission du formulaire, les informations sont récupérées via $_POST. Le script vérifie les 
 * données en les comparant aux entrées dans "users.txt". Si les informations sont correctes, l'utilisateur est 
 * connecté et redirigé vers "atelier1.php". Sinon, un message d'erreur est affiché.
 *
 * 3. HTML et Style
 * ----------------
 * La page de connexion utilise une mise en page similaire à celle de l'inscription pour maintenir une cohérence 
 * visuelle.
 */
-->
