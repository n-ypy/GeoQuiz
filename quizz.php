<?php
session_start();
if (isset($_SESSION['lastErrMsg'])) {
    echo $_SESSION['lastErrMsg'];
}
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <title>GéoQuiz</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-10 col-lg-10">
                <div class="question">
                    <div class="header">
                        <h1>GéoQuiz !</h1>
                        <span>(1 of 20)</span>
                    </div>
                </div>
                <div class="question">
                    <div class="question-title">
                        <h3 class="text-danger">Q. </h3>
                        <h5>Quel est le plus grand pays du monde en termes de superficie ?</h5>
                    </div>
                    <div class="reponses">
                        <label class="radio">
                            <input type="radio" name="reponse" value="Canada">
                            <span>Canada</span>
                        </label>
                    </div>
                    <div class="reponses">
                        <label class="radio">
                            <input type="radio" name="reponse" value="Russie">
                            <span>Russie</span>
                        </label>
                    </div>
                    <div class="reponses">
                        <label class="radio">
                            <input type="radio" name="reponse" value="États-Unis">
                            <span>États-Unis</span>
                        </label>
                    </div>
                    <div class="reponses">
                        <label class="radio">
                            <input type="radio" name="reponse" value="Chine">
                            <span>Chine</span>
                        </label>
                    </div>
                </div>
                <div class="buttons">
                    <button class="btn" type="button">
                        Valider la réponse
                    </button>
                </div>
            </div>
        </div>
    </div>
</body>

</html>