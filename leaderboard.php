<?php
session_start();
if (!isset($_SESSION['id'])) {
    header("Location: index.php?err=userNotLoggedIn");
    exit();
}
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="initial-scale=1.0">
    <title>Classement</title>
    <link rel="stylesheet" href="css/style.css">
    <style>
        .container {
            padding: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .leaderboard-title {
            color: #FFFFFF;
            text-transform: uppercase;
            font-size: 24px;
            text-align: center;
            margin-bottom: 20px;
        }

        .leaderboard-item {
            background-color: #ffffff90;
            padding: 10px;
            margin: 10px 0;
            border-radius: 4px;
            border: #a5fd39 2px;
            display: flex;
            flex-direction: column;
            align-items: center;
            text-align: center;
        }

        .username {
            color: #ff0015;
            font-weight: bold;
            padding: 10px;
            text-transform: uppercase;
        }

        .score {
            color: #555555;
            font-weight: bold;
        }

        .score-bar {
            width: 100%;
            height: 10px;
            background-color: #15c400;
            position: relative;
            align-self: flex-start;
        }

        .score-bar-container {
            width: 100%;
            background-color: #908d8d59;
            margin-top: 10px;
        }
    </style>
</head>

<body>

    <nav id="topnav" style="justify-content: end;">
        <input type="button" value="Déconnexion" onclick="location.href='actions/disconnect.php'">
    </nav>
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="leaderboard">
                    <div class="leaderboard-header">
                        <h2 class="leaderboard-title">Classement</h2>
                    </div>
                    <div id="leaderboard-content" class="leaderboard-content">
                        <?php
                        require 'actions/get-bestscore.php';

                        if (isset($_GET["score"]) && isset($_SESSION["username"])) {
                            $scorePercent = 0;

                            if($_GET["score"] != 0){
                                $scorePercent = $_GET["score"] / $overallBestScore * 100;
                            }

                            echo '<div class="leaderboard-item">';
                            echo '<div class="player-info">';
                            echo '<span class="score">Votre Score: ' . $_GET["score"] . '</span>';
                            echo '</div>';
                            echo '<div class="score-bar-container">';
                            echo '<div class="score-bar" style="width: ' . ($scorePercent) . '%"></div>';
                            echo '</div>';
                            echo '</div>';
                        }

                        foreach ($fetchedUser as $user) {
                            if ($user["best_score"] !== NULL) {
                                echo '<div class="leaderboard-item">';
                                echo '<div class="player-info">';
                                echo '<span class="username">' . htmlspecialchars($user['username']) . '</span>';
                                echo '<span class="score">Meilleur Score: ' . htmlspecialchars($user['best_score']) . '</span>';
                                echo '</div>';
                                echo '<div class="score-bar-container">';
                                echo '<div class="score-bar" style="width: ' . ($user['best_score'] / $overallBestScore * 100) . '%"></div>';
                                echo '</div>';
                                echo '</div>';
                            }
                        }
                        ?>
                        <button class="btn" style="margin: 10px; text-decoration: none;;" onclick="window.location.href='index.php';">Rejouer !</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</body>

</html>