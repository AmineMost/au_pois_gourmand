<?php
session_start();

if (!isset($_SESSION['logged_in']) || !$_SESSION['logged_in']) {
    header("Location: login.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Au Pois Gourmand</title>
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
            justify-content: space-between;
        }
        .container {
            background-image: url('bg.jpg');
            padding: 20px;
            border-radius: 8px;
            position: relative;
            flex-grow: 1;
        }
        .header-title {
            font-family: 'Srisakdi', cursive;
            font-size: 2em;
            font-weight: bold;
            color: #3e3e3e;
            text-align: left;
            display: flex;
            align-items: center;
            margin-bottom: 20px;
        }
        .header-title .fa-kiwi-bird {
            color: #6B9986;
            margin-right: 10px;
        }
        ul {
            font-family: 'Montserrat', sans-serif;
            font-size: 1.1em;
            color: #3e3e3e;
            padding-left: 20px;
        }
        ul li {
            margin-bottom: 5px;
        }
        .btn-rome, .btn-ny, .btn-delhi, .btn-hanoi {
            font-family: 'Montserrat', sans-serif;
            border-radius: 20px;
            padding: 10px 20px;
            font-size: 18px;
            text-transform: uppercase;
            border: none;
            width: 100%;
        }
        .btn-rome {
            background-color: #17a2b8;
            color: white;
        }
        .btn-ny {
            background-color: #dc3545;
            color: white;
        }
        .btn-delhi {
            background-color: #ffc107;
            color: white;
        }
        .btn-hanoi {
            background-color: #007bff;
            color: white;
        }
        footer {
            position: absolute;
            bottom: 10px;
            right: 10px;
            font-size: 14px;
            color: #6c9986;
            text-align: right;
        }
        .profile-button {
            position: absolute;
            top: 10px;
            right: 10px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 50%;
            padding: 10px;
            font-size: 16px;
            cursor: pointer;
            text-align: center;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
        }
        .profile-button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container">
        <!-- Bouton Profil -->
        <button class="profile-button" onclick="window.location.href='users.php'">
            <i class="fa-solid fa-user"></i>
        </button>

        <div class="header-title">
            <i class="fa-solid fa-kiwi-bird"></i>
            <span>Au Pois Gourmand</span>
        </div>

        <?php
        if (isset($_GET['menu'])) {
            $menu = $_GET['menu'];
            $menu_name = '';
            $image = '';
            $price = 25; // Prix fixe

            switch ($menu) {
                case 'rome':
                    $menu_name = 'Formule Rome';
                    $image = 'rome.jpg';
                    break;
                case 'nyork':
                    $menu_name = 'Formule New-York';
                    $image = 'nyork.jpg';
                    break;
                case 'delhi':
                    $menu_name = 'Formule Delhi';
                    $image = 'delhi.jpg';
                    break;
                case 'hanoi':
                    $menu_name = 'Formule Hanoï';
                    $image = 'hanoi.jpg';
                    break;
            }
            ?>

            <div class="confirmation-message">
                <h2>Merci pour votre commande !</h2>
                <p>Votre formule <strong><?php echo $menu_name; ?></strong> arrive dans quelques instants...</p>
                <img src="<?php echo $image; ?>" class="confirmation-image" alt="<?php echo $menu_name; ?>">
                <p>Nous vous souhaitons une bonne dégustation.<br>Votre facture sera de <?php echo $price; ?> €.</p>
                <a href="atelier1.php" class="btn btn-success">Choisir un autre menu</a>
            </div>

            <?php
        } else {
            ?>
            <div class="row">
                <div class="col-md-6">
                    <div class="card mb-4">
                        <img src="rome.jpg" class="card-img-top" alt="Formule Rome">
                        <div class="card-body">
                            <h5 class="card-title">Formule Rome</h5>
                            <ul>
                                <li>Tomates buratina</li>
                                <li>Rizotto aux asperges</li>
                                <li>Panna cotta</li>
                            </ul>
                            <a href="?menu=rome" class="btn btn-rome">Choisir</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card mb-4">
                        <img src="nyork.jpg" class="card-img-top" alt="Formule New-York">
                        <div class="card-body">
                            <h5 class="card-title">Formule New-York</h5>
                            <ul>
                                <li>César salade</li>
                                <li>Cheese burger</li>
                                <li>Cheesecake</li>
                            </ul>
                            <a href="atelier1.php?menu=nyork" class="btn btn-ny">Choisir</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="card mb-4">
                        <img src="delhi.jpg" class="card-img-top" alt="Formule Delhi">
                        <div class="card-body">
                            <h5 class="card-title">Formule Delhi</h5>
                            <ul>
                                <li>Poppadoms</li>
                                <li>Agneau byriani</li>
                                <li>Lassi mangue</li>
                            </ul>
                            <a href="atelier1.php?menu=delhi" class="btn btn-delhi">Choisir</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card mb-4">
                        <img src="hanoi.jpg" class="card-img-top" alt="Formule Hanoï">
                        <div class="card-body">
                            <h5 class="card-title">Formule Hanoï</h5>
                            <ul>
                                <li>Nems aux crevettes</li>
                                <li>Poulet saté</li>
                                <li>Perles de coco</li>
                            </ul>
                            <a href="atelier1.php?menu=hanoi" class="btn btn-hanoi">Choisir</a>
                        </div>
                    </div>
                </div>
            </div>
        <?php
        }
        ?>
        <footer>
            Au Pois Gourmand
        </footer>
    </div>
</body>
</html>
