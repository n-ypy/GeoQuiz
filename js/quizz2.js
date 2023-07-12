async function getQuestions() {
    const response = await fetch("actions/get-questions.php", {
        method: "POST",
        headers: {
            "Content-type": "application/json",
        },
        body: JSON.stringify({ key: 1 }),
    });
    return response.json();
}

async function submitScore(data) {
    const response = await fetch("actions/submit-score.php", {
        method: "POST",
        headers: {
            "Content-type": "application/json",
        },
        body: JSON.stringify({ score: data }),
    });
    return response.json();
}

let q = 1;
let score = 0;
let lastQuestion = null;
let answeredQuestions = [];
let response = 0;
let time = 10;
let questionNumber = document.querySelector("#questionNumber");
let enunciate = document.querySelector("#enunciate");
let option1Btn = document.querySelector("#option1 button");
let option2Btn = document.querySelector("#option2 button");
let option3Btn = document.querySelector("#option3 button");
let option4Btn = document.querySelector("#option4 button");
let nextQuestionButton = document.querySelector("#nextQuestion button");
let selectTimer = document.querySelector("#timer");
let displayUserScore = document.querySelector("#userScore");



function timer() {
    selectTimer.innerHTML = time;
    if (time > 0) {
        time--;
    } else {
        verifyResponse();
        time = 10;
    }
}


function getRandomInt(max) {
    return Math.floor(Math.random() * max);
}


function verifyResponse(answered = 0) {

    selectTimer.hidden = true;
    nextQuestionButton.hidden = false;
    clearInterval(interval);

    option1Btn.disabled = true;
    option2Btn.disabled = true;
    option3Btn.disabled = true;
    option4Btn.disabled = true;

    switch (questions[lastQuestion].response) {
        case questions[lastQuestion].option1:
            option1Btn.innerHTML = `<img src="img/true_lt.png" alt="Bonne réponse">  ${questions[lastQuestion].option1}`;
            option1Btn.classList.add('true-button');
            break;

        case questions[lastQuestion].option2:
            option2Btn.innerHTML = `<img src="img/true_lt.png" alt="Bonne réponse">  ${questions[lastQuestion].option2}`;
            option2Btn.classList.add('true-button');
            break;

        case questions[lastQuestion].option3:
            option3Btn.innerHTML = `<img src="img/true_lt.png" alt="Bonne réponse">  ${questions[lastQuestion].option3}`;
            option3Btn.classList.add('true-button');
            break;

        case questions[lastQuestion].option4:
            option4Btn.innerHTML = `<img src="img/true_lt.png" alt="Bonne réponse">  ${questions[lastQuestion].option4}`;
            option4Btn.classList.add('true-button');
            break;

        default:
            break;
    }

    if (answered !== 0) {
        let selectAnswer = document.querySelector(`#${answered} button`);
        let verifyResponse = questions[lastQuestion][answered] === questions[lastQuestion]['response'];
        if (!verifyResponse) {
            selectAnswer.innerHTML = `<img src="img/false_lt.png" alt="Mauvaise réponse"> ${questions[lastQuestion][answered]}`;
        } else {
            score += 1 + time;
            displayUserScore.innerHTML = `${score} points`
        }
    }

    if (q > 30) {
        nextQuestionButton.innerHTML = 'Fin';
    }
}


function nextQuestion() {

    nextQuestionButton.hidden = true;
    selectTimer.hidden = false;


    let getRandomEnunciate = getRandomInt(31);

    if (q > 30) {
        submitScore(score)
            .then((response) => {
                if (response) {
                    window.location.href = "leaderboard.php";
                } else {
                    throw new Error("Erreur lors de l'envoi des données vers le leaderboard");
                }
            });
    } else if (!answeredQuestions.includes(getRandomEnunciate)) {
        questionNumber.innerHTML = `(${q} of 30)`;
        enunciate.innerHTML = questions[getRandomEnunciate].enunciate;
        option1Btn.innerHTML = questions[getRandomEnunciate].option1;
        option1Btn.disabled = false;
        option1Btn.classList.remove('true-button');
        option1Btn.classList.remove('false-button');
        option2Btn.innerHTML = questions[getRandomEnunciate].option2;
        option2Btn.disabled = false;
        option2Btn.classList.remove('true-button');
        option2Btn.classList.remove('false-button');
        option3Btn.innerHTML = questions[getRandomEnunciate].option3;
        option3Btn.disabled = false;
        option3Btn.classList.remove('true-button');
        option3Btn.classList.remove('false-button');
        option4Btn.innerHTML = questions[getRandomEnunciate].option4;
        option4Btn.disabled = false;
        option4Btn.classList.remove('true-button');
        option4Btn.classList.remove('false-button');
        answeredQuestions.push(getRandomEnunciate);
        lastQuestion = getRandomEnunciate;
        time = 10;
        timer();
        interval = setInterval(timer, 1000);
        q++;
    } else {
        nextQuestion();
    }
}



getQuestions()
    .then((questions) => {
        window.questions = questions;
        nextQuestion();
    })
    .catch((error) => {
        console.error(error);
    });