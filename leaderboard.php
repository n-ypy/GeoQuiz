<?php
session_start();
if(isset($_SESSION['lastErrMsg'])){
    echo $_SESSION['lastErrMsg'];
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Leaderboard</title>
    <link rel="stylesheet" href="style.css">
    <style>

        .leaderboard {
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .leaderboard-header {
            background-color: #ff5e6c;
            color: #fff;
            padding: 20px;
            border-top-left-radius: 10px;
            border-top-right-radius: 10px;
        }

        .leaderboard-title {
            font-size: 24px;
            margin: 0;
        }

        .leaderboard-list {
            color: #f82838;
            list-style-type: none;
            padding: 0;
            margin: 0;
        }

        .leaderboard-item {
            display: flex;
            align-items: center;
            padding: 15px;
            border-bottom: 1px solid #f0f0f0;
        }

        .leaderboard-item:last-child {
            border-bottom: none;
        }

        .leaderboard-rank {
            font-size: 20px;
            font-weight: bold;
            color: #ff5e6c;
            width: 40px;
            text-align: center;
        }

        .leaderboard-avatar {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            margin-right: 15px;
        }

        .leaderboard-username {
            font-size: 16px;
            font-weight: bold;
            margin: 0;
        }

        .leaderboard-score {
            font-size: 18px;
            margin: 0;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="leaderboard">
            <div class="leaderboard-header">
                <h2 class="leaderboard-title">Classement</h2>
            </div>
            <ul class="leaderboard-list">
                <li class="leaderboard-item">
                    <div class="leaderboard-rank">1</div>
                    <img class="leaderboard-avatar" src="avatar1.jpg" alt="Avatar">
                    <div>
                        <h3 class="leaderboard-username">John Doe</h3>
                        <p class="leaderboard-score">Score: 1000</p>
                    </div>
                </li>
                <li class="leaderboard-item">
                    <div class="leaderboard-rank">2</div>
                    <img class="leaderboard-avatar" src="avatar2.jpg" alt="Avatar">
                    <div>
                        <h3 class="leaderboard-username">Jane Smith</h3>
                        <p class="leaderboard-score">Score: 950</p>
                    </div>
                </li>
                <li class="leaderboard-item">
                    <div class="leaderboard-rank">3</div>
                    <img class="leaderboard-avatar" src="avatar3.jpg" alt="Avatar">
                    <div>
                        <h3 class="leaderboard-username">Mike Johnson</h3>
                        <p class="leaderboard-score">Score: 900</p>
                    </div>
                </li>
                <!-- Ajoutez d'autres éléments de leaderboard ici -->
            </ul>
        </div>
    </div>
</body>
</html>
