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

getQuestions()
    .then((questions) => {
        let i = 1;
        let q = 1;
        let score = 0;
        let lastQuestion = null;
        let questionNumber = document.querySelector("#question-number");
        let question = document.querySelector("#question");
        let optionOne = document.querySelector("#option-one");
        let optionTwo = document.querySelector("#option-two");
        let optionThree = document.querySelector("#option-three");
        let optionFour = document.querySelector("#option-four");
        let submitButton = document.querySelector("#btn-next-question");
        let selectTimer = document.querySelector("#timer");
        let displayUserScore = document.querySelector("#user-score");
        let time = 10;
        let answeredQuestions = [];

        function timer() {
            selectTimer.innerHTML = time;
            if (time > 0) {
                time--;
            } else {
                submitButton.click();
                time = 10;
            }
        }
        timer();
        let interval = setInterval(timer, 1000);

        function submitResponse(questions) {
            let getRandomQuestion = getRandomInt(31);
            if (!answeredQuestions.includes(`${getRandomQuestion}`)) {
                questionNumber.innerHTML = `(${q} of 30)`;
                question.innerHTML = questions[getRandomQuestion]["question"];
                optionOne.innerHTML = `
                    <input type="radio" name="option" value="${questions[getRandomQuestion]['option_one']}" required>
                    <span>${questions[getRandomQuestion]['option_one']}</span>`;
                optionTwo.innerHTML = `
                    <input type="radio" name="option" value="${questions[getRandomQuestion]['option_two']}" required>
                    <span>${questions[getRandomQuestion]['option_two']}</span>`;
                optionThree.innerHTML = `
                    <input type="radio" name="option" value="${questions[getRandomQuestion]['option_three']}"required>
                    <span>${questions[getRandomQuestion]['option_three']}</span>`;
                optionFour.innerHTML = `
                    <input type="radio" name="option" value="${questions[getRandomQuestion]['option_four']}"required>
                    <span>${questions[getRandomQuestion]['option_four']}</span>`;
                answeredQuestions.push(`${getRandomQuestion}`);
                lastQuestion = `${getRandomQuestion}`;
            } else {
                submitResponse(questions);
            }
        }

        submitResponse(questions);

        submitButton.addEventListener("click", (event) => {
            if (i < 60 && i % 2 === 0) {
                interval = setInterval(timer, 1000);
                q++;
                event.target.innerHTML = "Valider la réponse";
                submitResponse(questions);
            } else if (i < 60 && i % 2 === 1) {
                clearInterval(interval);
                time = 10;
                if (i === 59) {
                    event.target.innerHTML = "Scores";
                } else {
                    event.target.innerHTML = "Question suivante";
                }
                const form = event.target.closest("form");
                const formData = new FormData(form);
                let answer = formData.get("option");
                let compareAnswer = formData.get("option") === questions[lastQuestion]["answer"];

                if (compareAnswer) {
                    score++;
                    displayUserScore.innerHTML = `${score} points`;
                }

                if (
                    (answer === questions[lastQuestion]["option_one"] && compareAnswer) ||
                    (answer !== questions[lastQuestion]["option_one"] && questions[lastQuestion]["answer"] === questions[lastQuestion]["option_one"])
                ) {
                    optionOne.innerHTML = `
                        <input type="radio" name="option" value="${questions[lastQuestion]['option_one']}" disabled>
                        <span><img src="img/true_lt.png" alt="Bonne réponse">  ${questions[lastQuestion]['option_one']}</span>`;
                } else if (answer === questions[lastQuestion]["option_one"]) {
                    optionOne.innerHTML = `
                        <input type="radio" name="option" value="${questions[lastQuestion]['option_one']}" disabled>
                        <span><img src="img/false_lt.png" alt="Mauvaise réponse">  ${questions[lastQuestion]['option_one']}</span>`;
                } else {
                    optionOne.innerHTML = `
                        <input type="radio" name="option" value="${questions[lastQuestion]['option_one']}" disabled>
                        <span>${questions[lastQuestion]['option_one']}</span>`;
                }

                if (
                    (answer === questions[lastQuestion]["option_two"] && compareAnswer) ||
                    (answer !== questions[lastQuestion]["option_two"] && questions[lastQuestion]["answer"] === questions[lastQuestion]["option_two"])
                ) {
                    optionTwo.innerHTML = `
                        <input type="radio" id="true" name="option" value="${questions[lastQuestion]['option_two']}" disabled>
                        <span><img src="img/true_lt.png" alt="Bonne réponse">  ${questions[lastQuestion]['option_two']}</span>`;
                } else if (answer === questions[lastQuestion]["option_two"]) {
                    optionTwo.innerHTML = `
                        <input type="radio" id="false" name="option" value="${questions[lastQuestion]['option_two']}" disabled>
                        <span><img src="img/false_lt.png" alt="Mauvaise réponse">  ${questions[lastQuestion]['option_two']}</span>`;
                } else {
                    optionTwo.innerHTML = `
                        <input type="radio" name="option" value="${questions[lastQuestion]['option_two']}" disabled>
                        <span>${questions[lastQuestion]['option_two']}</span>`;
                }

                if (
                    (answer === questions[lastQuestion]["option_three"] && compareAnswer) ||
                    (answer !== questions[lastQuestion]["option_three"] && questions[lastQuestion]["answer"] === questions[lastQuestion]["option_three"])
                ) {
                    optionThree.innerHTML = `
                        <input type="radio" name="option" value="${questions[lastQuestion]['option_three']}" disabled>
                        <span><img src="img/true_lt.png" alt="Bonne réponse">  ${questions[lastQuestion]['option_three']}</span>`;
                } else if (answer === questions[lastQuestion]["option_three"]) {
                    optionThree.innerHTML = `
                        <input type="radio" name="option" value="${questions[lastQuestion]['option_three']}" disabled>
                        <span><img src="img/false_lt.png" alt="Mauvaise réponse">  ${questions[lastQuestion]['option_three']}</span>`;
                } else {
                    optionThree.innerHTML = `
                        <input type="radio" name="option" value="${questions[lastQuestion]['option_three']}" disabled>
                        <span>${questions[lastQuestion]['option_three']}</span>`;
                }

                if (
                    (answer === questions[lastQuestion]["option_four"] && compareAnswer) ||
                    (answer !== questions[lastQuestion]["option_four"] && questions[lastQuestion]["answer"] === questions[lastQuestion]["option_four"])
                ) {
                    optionFour.innerHTML = `
                        <input type="radio" name="option" value="${questions[lastQuestion]['option_four']}" disabled>
                        <span><img src="img/true_lt.png" alt="Bonne réponse">  ${questions[lastQuestion]['option_four']}</span>`;
                } else if (answer === questions[lastQuestion]["option_four"]) {
                    optionFour.innerHTML = `
                        <input type="radio" name="option" value="${questions[lastQuestion]['option_four']}" disabled>
                        <span><img src="img/false_lt.png" alt="Mauvaise réponse">  ${questions[lastQuestion]['option_four']}</span>`;
                } else {
                    optionFour.innerHTML = `
                        <input type="radio" name="option" value="${questions[lastQuestion]['option_four']}" disabled>
                        <span>${questions[lastQuestion]['option_four']}</span>`;
                }

            } else if (i >= 60) {
                submitScore(score)
                    .then((response) => {
                        if (response) {
                            window.location.href = `leaderboard.php?score=${score}`;
                        } else {
                            throw new Error("Erreur lors de l'envoi des données vers le leaderboard");
                        }
                    });
            }
            i++;
            event.preventDefault();
        });
    })
    .catch((error) => {
        console.error(error);
    });

function getRandomInt(max) {
    return Math.floor(Math.random() * max);
}
