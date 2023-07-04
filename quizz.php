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
    <meta name="viewport" content="width=, initial-scale=1.0">
    <title>GéoQuiz</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="container mt-5">
        <div class="d-flex justify-content-center row">
            <div class="col-md-10 col-lg-10">
                <div class="question p-3">
                    <div class="header d-flex flex-row justify-content-between align-items-center">
                        <h4>TP Quiz</h4>
                        <span>(5 of 20)</span>
                    </div>
                </div>
                <div class="question p-3">
                    <div class="d-flex flex-row align-items-center question-title">
                        <h3 class="text-danger">Q. </h3>
                        <h5 class="mt-1 ml-2">Quel est le plus grand pays du monde en termes de superficie ?</h5>
                    </div>
                    <div class="reponses ml-2 d-flex justify-content-center">
                        <label class="radio">
                            <input type="radio" name="brazil" value="brazil">
                            <span>Canada</span>
                        </label>
                    </div>

                    <div class="reponses ml-2 d-flex justify-content-center">
                        <label class="radio">
                            <input type="radio" name="Germany" value="Germany">
                            <span>Russie</span>
                        </label>
                    </div>
                    <div class="reponses ml-2 d-flex justify-content-center">
                        <label class="radio">
                            <input type="radio" name="Indonesia" value="Indonesia">
                            <span>États-Unis</span>
                        </label>
                    </div>
                    <div class="reponses ml-2 d-flex justify-content-center">
                        <label class="radio">
                            <input type="radio" name="Russia" value="Russia">
                            <span>Chine</span>
                        </label>
                    </div>
                </div>
                <div class="d-flex flex-row justify-content-between align-items-center p-3">
                    <button class="btn d-flex align-items-center" type="button">
                        <i class="fa fa-angle-left mt-1 mr-1"></i>&nbsp;previous
                    </button>
                    <button class="btn" type="button">
                        Next<i class="fa fa-angle-right ml-2"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
