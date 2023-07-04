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
                        <span id="questionNumber">(1 of 20)</span> <!--attention à id="questionNumber"-->
                    </div>
                </div>
                <form action="" type="POST">
                    <div class="question">
                        <div class="question-title">
                            <h3 class="text-danger">Q. </h3>
                             <h5 id="enunciate">Quel est le plus grand pays du monde en termes de superficie ?</h5> <!--attention à id="enunciate"-->
                        </div>
                        <div class="reponses">
                            <label class="radio">
                                <input type="radio" name="reponse" value="Canada">
                                <span id="responseOne">Canada</span> <!--attention à id="responseOne"-->
                            </label>
                        </div>
                        <div class="reponses">
                            <label class="radio">
                                <input type="radio" name="reponse" value="Russie">
                                <span id="responseTwo">Russie</span> <!--attention à id="responseTwo"-->
                            </label>
                        </div>
                        <div class="reponses">
                            <label class="radio">
                                <input type="radio" name="reponse" value="États-Unis">
                                <span id="responseThree">États-Unis</span> <!--attention à id="responseThree"-->
                            </label>
                        </div>
                        <div class="reponses">
                            <label class="radio">
                                <input type="radio" name="reponse" value="Chine">
                                <span id="responseFour">Chine</span> <!--attention à id="responseFour"-->
                            </label>
                        </div>
                        <div class="buttons">
                            <button class="btn" type="submit">
                                Valider la réponse
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>