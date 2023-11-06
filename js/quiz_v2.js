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
const questionNumber = document.querySelector("#question-number");
const enunciate = document.querySelector("#question");
const optionOneBtn = document.querySelector("#option_one button");
const optionTwoBtn = document.querySelector("#option_two button");
const optionThreeBtn = document.querySelector("#option_three button");
const optionFourBtn = document.querySelector("#option_four button");
const optionOneContainer = document.querySelector("#option_one");
const optionTwoContainer = document.querySelector("#option_two");
const optionThreeContainer = document.querySelector("#option_three");
const optionFourContainer = document.querySelector("#option_four");
const selectTimer = document.querySelector("#timer");
const displayUserScore = document.querySelector("#user-score");
const timerCircle = document.querySelector("circle")



function timer() {
    selectTimer.innerHTML = time;
    if (time > 0) {
        time--;
    } else {
        verifyAnswer();
        time = 10;
    }
}


function getRandomInt(max) {
    return Math.floor(Math.random() * max);
}


function verifyAnswer(answered = 0) {

    clearInterval(interval);

    optionOneBtn.disabled = true;
    optionTwoBtn.disabled = true;
    optionThreeBtn.disabled = true;
    optionFourBtn.disabled = true;

    switch (questions[lastQuestion].answer) {
        case questions[lastQuestion].option_one:
            optionOneBtn.innerHTML = `<img src="img/true_lt.png" alt="Bonne réponse">  ${questions[lastQuestion].option_one}`;
            optionOneBtn.classList.add('true-button');
            break;

        case questions[lastQuestion].option_two:
            optionTwoBtn.innerHTML = `<img src="img/true_lt.png" alt="Bonne réponse">  ${questions[lastQuestion].option_two}`;
            optionTwoBtn.classList.add('true-button');
            break;

        case questions[lastQuestion].option_three:
            optionThreeBtn.innerHTML = `<img src="img/true_lt.png" alt="Bonne réponse">  ${questions[lastQuestion].option_three}`;
            optionThreeBtn.classList.add('true-button');
            break;

        case questions[lastQuestion].option_four:
            optionFourBtn.innerHTML = `<img src="img/true_lt.png" alt="Bonne réponse">  ${questions[lastQuestion].option_four}`;
            optionFourBtn.classList.add('true-button');
            break;

        default:
            break;
    }

    if (answered !== 0) {
        let selectAnswer = document.querySelector(`#${answered} button`);
        let verifyAnswer = questions[lastQuestion][answered] === questions[lastQuestion]['answer'];
        if (!verifyAnswer) {
            selectAnswer.innerHTML = `<img src="img/false_lt.png" alt="Mauvaise réponse"> ${questions[lastQuestion][answered]}`;
        } else {
            score += 1 + time;
            displayUserScore.innerHTML = `${score} points`
        }
    }

    timerCircle.classList.remove("animate-circle");
    setTimeout(() => {
        nextQuestion()
    }, 1600);

}


function nextQuestion() {

    let getRandomQuestion = getRandomInt(31);

    if (q > 30) {
        submitScore(score)
            .then((response) => {
                if (response) {
                    window.location.href = `leaderboard.php?score=${score}`;
                } else {
                    throw new Error("Erreur lors de l'envoi des données vers le leaderboard");
                }
            });
    } else if (!answeredQuestions.includes(getRandomQuestion)) {
        questionNumber.innerHTML = `(${q} of 30)`;
        enunciate.innerHTML = questions[getRandomQuestion].question;

        resetButtons(getRandomQuestion)

        answeredQuestions.push(getRandomQuestion);
        lastQuestion = getRandomQuestion;
        time = 10;
        timer();
        interval = setInterval(timer, 1000);
        requestAnimationFrame(() => {
            timerCircle.classList.add("animate-circle");
        })
        q++;
    } else {
        nextQuestion();
    }
}

function resetButtons(getRandomQuestion) {
    let order = [1, 2, 3, 4];
    order.sort(() => Math.random()- 0.5);
    optionOneContainer.style.order = order[0];
    optionTwoContainer.style.order = order[1];
    optionThreeContainer.style.order = order[2];
    optionFourContainer.style.order = order[3];
    optionOneBtn.innerHTML = questions[getRandomQuestion].option_one;
    optionOneBtn.disabled = false;
    optionOneBtn.classList.remove('true-button');
    optionOneBtn.classList.remove('false-button');
    optionTwoBtn.innerHTML = questions[getRandomQuestion].option_two;
    optionTwoBtn.disabled = false;
    optionTwoBtn.classList.remove('true-button');
    optionTwoBtn.classList.remove('false-button');
    optionThreeBtn.innerHTML = questions[getRandomQuestion].option_three;
    optionThreeBtn.disabled = false;
    optionThreeBtn.classList.remove('true-button');
    optionThreeBtn.classList.remove('false-button');
    optionFourBtn.innerHTML = questions[getRandomQuestion].option_four;
    optionFourBtn.disabled = false;
    optionFourBtn.classList.remove('true-button');
    optionFourBtn.classList.remove('false-button');
}

getQuestions()
    .then((questions) => {
        window.questions = questions;
        nextQuestion();
    })
    .catch((error) => {
        console.error(error);
    });