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
                        <span id="questionNumber"></span> <!--attention à id="questionNumber"-->
                    </div>
                </div>
                <form action="" type="POST">
                    <div class="question">
                        <div class="question-title">
                            <h3 class="text-danger">Q. <br></h3>
                            <h5 id="enunciate"></h5> <!--attention à id="enunciate"-->
                        </div>
                        <div class="reponses">
                            <label class="radio" id="responseOne">
                                <input type="radio" name="reponse" value="Canada">
                                <span></span> <!--attention à id="responseOne"-->
                            </label>
                        </div>
                        <br>
                        <div class="reponses">
                            <label class="radio" id="responseTwo">
                                <input type="radio" name="reponse" value="Russie">
                                <span></span> <!--attention à id="responseTwo"-->
                            </label>
                        </div>
                        <br>
                        <div class="reponses">
                            <label class="radio" id="responseThree">
                                <input type="radio" name="reponse" value="États-Unis">
                                <span></span> <!--attention à id="responseThree"-->
                            </label>
                        </div>
                        <br>
                        <div class="reponses">
                            <label class="radio" id="responseFour">
                                <input type="radio" name="reponse" value="Chine">
                                <span></span> <!--attention à id="responseFour"-->
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
<script src="quizz.js"></script>

</html>