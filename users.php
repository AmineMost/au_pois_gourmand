<?php
session_start();

// Vérifiez si l'utilisateur est connecté
if (!isset($_SESSION['username']) || !$_SESSION['logged_in']) {
    header("Location: login.php");
    exit();
}

// Déconnexion
if (isset($_POST['logout'])) {
    session_unset();
    session_destroy();
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil - Au Pois Gourmand</title>
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
        .profile-container {
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
        .username-display {
            font-family: 'Montserrat', sans-serif;
            font-size: 1.5em;
            font-weight: normal;
            color: #3e3e3e;
            text-align: center;
            margin-bottom: 20px;
        }
        .btn-profile, .btn-logout, .btn-return {
            background-color: #007bff;
            color: white;
            border-radius: 20px;
            padding: 10px 20px;
            font-family: 'Montserrat', sans-serif;
            text-transform: uppercase;
            border: none;
            width: 100%;
            margin-top: 10px;
        }
        .btn-profile:hover, .btn-logout:hover, .btn-return:hover {
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

<div class="profile-container">
    <div class="header-title">
        <i class="fa-solid fa-kiwi-bird"></i>
        <span>Bienvenue !</span>
    </div>

    <!-- Affichage du pseudo de l'utilisateur -->
    <div class="username-display">
        <?php echo htmlspecialchars($_SESSION['username']); ?>
    </div>

    <!-- Formulaire pour se déconnecter -->
    <form method="post" action="">
        <button type="submit" class="btn-logout" name="logout">Se déconnecter</button>
    </form>
    
    <!-- Nouveau bouton pour retourner sur atelier1.php -->
    <form method="post" action="atelier1.php">
        <button type="submit" class="btn-return">Retourner sur Atelier1</button>
    </form>
</div>

</body>
</html>
