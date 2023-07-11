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


function option1() {
    answered = 'option1';
    verifyResponse(answered);
}


function option2() {
    answered = 'option2';
    verifyResponse(answered);
}


function option3() {
    answered = 'option3';
    verifyResponse(answered);
}


function option4() {
    answered = 'option4';
    verifyResponse(answered);
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
            option1Btn.innerHTML = `${questions[lastQuestion].option1} true`;
            break;

        case questions[lastQuestion].option2:
            option2Btn.innerHTML = `${questions[lastQuestion].option2} true`;
            break;

        case questions[lastQuestion].option3:
            option3Btn.innerHTML = `${questions[lastQuestion].option3} true`;
            break;

        case questions[lastQuestion].option4:
            option4Btn.innerHTML = `${questions[lastQuestion].option4} true`;
            break;

        default:
            break;
    }

    if (answered !== 0) {
        let selectAnswer = document.querySelector(`#${answered} button`);
        let verifyResponse = questions[lastQuestion][answered] === questions[lastQuestion]['response'];
        if (!verifyResponse) {
            selectAnswer.innerHTML = `${questions[lastQuestion][answered]} wrong`;
        } else {
            score += 1 + time;
            console.log(score);
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
        option2Btn.innerHTML = questions[getRandomEnunciate].option2;
        option2Btn.disabled = false;
        option3Btn.innerHTML = questions[getRandomEnunciate].option3;
        option3Btn.disabled = false;
        option4Btn.innerHTML = questions[getRandomEnunciate].option4;
        option4Btn.disabled = false;
        answeredQuestions.push(getRandomEnunciate);
        lastQuestion = getRandomEnunciate;
        interval = setInterval(timer, 1000);
        time = 10;
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