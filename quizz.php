<?php
session_start();
if(isset($_SESSION['lastErrMsg'])){
    echo $_SESSION['lastErrMsg'];
}
?>
<!DOCTYPE html>
<html>
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <div class="container mt-5">
        <div class="d-flex justify-content-center row">
            <div class="col-md-10 col-lg-10">
                <div class="border">
                    <div class="question bg-white p-3 border-bottom">
                        <div class="d-flex flex-row justify-content-between align-items-center mcq">
                            <h4>MCQ Quiz</h4><span>(5 of 20)</span>
                        </div>
                    </div>
                    <div class="question bg-white align-items-center p-3 border-bottom">
                        <div class="d-flex flex-row align-items-center question-title">
                            <h3 class="text-danger">Q.</h3>
                            <h5 class="mt-1 ml-2 ">Which of the following country has the largest population?</h5>
                        </div>
                        <div class="ans ml-2 align-items-center d-flex justify-content-center">
                            <label class="radio">
                            <input type="radio" name="brazil" value="brazil">
                            <span class="text-center">1 / Brazil</span>
                            </label>
                        </div>

                        <div class="ans ml-2 align-items-center d-flex justify-content-center">
                            <label class="radio">
                                <input type="radio" name="Germany" value="Germany">
                                <span>Germany</span>
                            </label>
                        </div>
                        <div class="ans ml-2 align-items-center d-flex justify-content-center">
                            <label class="radio">
                                <input type="radio" name="Indonesia" value="Indonesia">
                                <span>Indonesia</span>
                            </label>
                        </div>
                        <div class="ans ml-2 align-items-center d-flex justify-content-center">
                            <label class="radio">
                                <input type="radio" name="Russia" value="Russia">
                                <span>Russia</span>
                            </label>
                        </div>
                    </div>
                    <div class="d-flex flex-row justify-content-between align-items-center p-3 bg-white">
                        <button class="btn btn-primary d-flex align-items-center btn-danger" type="button">
                            <i class="fa fa-angle-left mt-1 mr-1"></i>&nbsp;previous
                        </button>
                        <button class="btn btn-primary border-success align-items-center btn-success" type="button">
                            Next<i class="fa fa-angle-right ml-2"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
