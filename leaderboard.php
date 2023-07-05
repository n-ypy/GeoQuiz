<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Leaderboard</title>
    <link rel="stylesheet" href="style.css">
    <!-- Vos autres styles et liens -->
</head>
<body>
    <!-- Votre contenu HTML -->

    <div class="container">
        <div class="leaderboard">
            <div class="leaderboard-header">
                <h2 class="leaderboard-title">Classement</h2>
            </div>
            <ul id="leaderboard-list" class="leaderboard-list">
                <!-- Les données du leaderboard seront ajoutées ici dynamiquement -->
            </ul>
        </div>
    </div>

    <!-- Vos autres balises HTML -->

    <script>
        // Utilisation d'AJAX pour récupérer les données du fichier get-bestscore.php
        var xhr = new XMLHttpRequest();
        xhr.open('GET', 'actions/get-bestscore.php', true);
        xhr.onload = function() {
            if (xhr.status === 200) {
                var leaderboardData = JSON.parse(xhr.responseText);
                var leaderboardList = document.getElementById('leaderboard-list');

                // Parcourir les données et ajouter des éléments au leaderboard
                leaderboardData.forEach(function(user) {
                    var listItem = document.createElement('li');
                    listItem.className = 'leaderboard-item';

                    var rankDiv = document.createElement('div');
                    rankDiv.className = 'leaderboard-rank';
                    rankDiv.textContent = user.rank;
                    listItem.appendChild(rankDiv);

                    var avatarImg = document.createElement('img');
                    avatarImg.className = 'leaderboard-avatar';
                    avatarImg.src = user.avatar;
                    avatarImg.alt = 'Avatar';
                    listItem.appendChild(avatarImg);

                    var userDetailsDiv = document.createElement('div');
                    var usernameHeading = document.createElement('h3');
                    usernameHeading.className = 'leaderboard-username';
                    usernameHeading.textContent = user.username;
                    userDetailsDiv.appendChild(usernameHeading);

                    var scoreParagraph = document.createElement('p');
                    scoreParagraph.className = 'leaderboard-score';
                    scoreParagraph.textContent = 'Score: ' + user.best_score;
                    userDetailsDiv.appendChild(scoreParagraph);

                    listItem.appendChild(userDetailsDiv);
                    leaderboardList.appendChild(listItem);
                });
            }
        };
        xhr.send();
    </script>
</body>
</html>
