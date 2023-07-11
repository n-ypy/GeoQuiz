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
        let questionNumber = document.querySelector("#questionNumber");
        let enunciate = document.querySelector("#enunciate");
        let responseOne = document.querySelector("#responseOne");
        let responseTwo = document.querySelector("#responseTwo");
        let responseThree = document.querySelector("#responseThree");
        let responseFour = document.querySelector("#responseFour");
        let submitButton = document.querySelector(".btn");
        let selectTimer = document.querySelector("#timer");
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
            let getRandomEnunciate = getRandomInt(31);
            if (!answeredQuestions.includes(`${getRandomEnunciate}`)) {
                questionNumber.innerHTML = `(${q} of 30)`;
                enunciate.innerHTML = questions[getRandomEnunciate]["enunciate"];
                responseOne.innerHTML = `
                    <input type="radio" name="response" value="${questions[getRandomEnunciate]['option1']}" required>
                    <span>${questions[getRandomEnunciate]['option1']}</span>`;
                responseTwo.innerHTML = `
                    <input type="radio" name="response" value="${questions[getRandomEnunciate]['option2']}" required>
                    <span>${questions[getRandomEnunciate]['option2']}</span>`;
                responseThree.innerHTML = `
                    <input type="radio" name="response" value="${questions[getRandomEnunciate]['option3']}"required>
                    <span>${questions[getRandomEnunciate]['option3']}</span>`;
                responseFour.innerHTML = `
                    <input type="radio" name="response" value="${questions[getRandomEnunciate]['option4']}"required>
                    <span>${questions[getRandomEnunciate]['option4']}</span>`;
                answeredQuestions.push(`${getRandomEnunciate}`);
                lastQuestion = `${getRandomEnunciate}`;
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
                let answer = formData.get("response");
                let compareAnswer = formData.get("response") === questions[lastQuestion]["response"];

                if (compareAnswer) {
                    score++;
                }

                if (
                    (answer === questions[lastQuestion]["option1"] && compareAnswer) ||
                    (answer !== questions[lastQuestion]["option1"] && questions[lastQuestion]["response"] === questions[lastQuestion]["option1"])
                ) {
                    responseOne.innerHTML = `
                        <input type="radio" name="response" value="${questions[lastQuestion]['option1']}" disabled>
                        <span><img src="img/true_lt.png" alt="Bonne réponse">  ${questions[lastQuestion]['option1']}</span>`;
                } else if (answer === questions[lastQuestion]["option1"]) {
                    responseOne.innerHTML = `
                        <input type="radio" name="response" value="${questions[lastQuestion]['option1']}" disabled>
                        <span><img src="img/false_lt.png" alt="Mauvaise réponse">  ${questions[lastQuestion]['option1']}</span>`;
                } else {
                    responseOne.innerHTML = `
                        <input type="radio" name="response" value="${questions[lastQuestion]['option1']}" disabled>
                        <span>${questions[lastQuestion]['option1']}</span>`;
                }

                if (
                    (answer === questions[lastQuestion]["option2"] && compareAnswer) ||
                    (answer !== questions[lastQuestion]["option2"] && questions[lastQuestion]["response"] === questions[lastQuestion]["option2"])
                ) {
                    responseTwo.innerHTML = `
                        <input type="radio" id="true" name="response" value="${questions[lastQuestion]['option2']}" disabled>
                        <span><img src="img/true_lt.png" alt="Bonne réponse">  ${questions[lastQuestion]['option2']}</span>`;
                } else if (answer === questions[lastQuestion]["option2"]) {
                    responseTwo.innerHTML = `
                        <input type="radio" id="false" name="response" value="${questions[lastQuestion]['option2']}" disabled>
                        <span><img src="img/false_lt.png" alt="Mauvaise réponse">  ${questions[lastQuestion]['option2']}</span>`;
                } else {
                    responseTwo.innerHTML = `
                        <input type="radio" name="response" value="${questions[lastQuestion]['option2']}" disabled>
                        <span>${questions[lastQuestion]['option2']}</span>`;
                }

                if (
                    (answer === questions[lastQuestion]["option3"] && compareAnswer) ||
                    (answer !== questions[lastQuestion]["option3"] && questions[lastQuestion]["response"] === questions[lastQuestion]["option3"])
                ) {
                    responseThree.innerHTML = `
                        <input type="radio" name="response" value="${questions[lastQuestion]['option3']}" disabled>
                        <span><img src="img/true_lt.png" alt="Bonne réponse">  ${questions[lastQuestion]['option3']}</span>`;
                } else if (answer === questions[lastQuestion]["option3"]) {
                    responseThree.innerHTML = `
                        <input type="radio" name="response" value="${questions[lastQuestion]['option3']}" disabled>
                        <span><img src="img/false_lt.png" alt="Mauvaise réponse">  ${questions[lastQuestion]['option3']}</span>`;
                } else {
                    responseThree.innerHTML = `
                        <input type="radio" name="response" value="${questions[lastQuestion]['option3']}" disabled>
                        <span>${questions[lastQuestion]['option3']}</span>`;
                }

                if (
                    (answer === questions[lastQuestion]["option4"] && compareAnswer) ||
                    (answer !== questions[lastQuestion]["option4"] && questions[lastQuestion]["response"] === questions[lastQuestion]["option4"])
                ) {
                    responseFour.innerHTML = `
                        <input type="radio" name="response" value="${questions[lastQuestion]['option4']}" disabled>
                        <span><img src="img/true_lt.png" alt="Bonne réponse">  ${questions[lastQuestion]['option4']}</span>`;
                } else if (answer === questions[lastQuestion]["option4"]) {
                    responseFour.innerHTML = `
                        <input type="radio" name="response" value="${questions[lastQuestion]['option4']}" disabled>
                        <span><img src="img/false_lt.png" alt="Mauvaise réponse">  ${questions[lastQuestion]['option4']}</span>`;
                } else {
                    responseFour.innerHTML = `
                        <input type="radio" name="response" value="${questions[lastQuestion]['option4']}" disabled>
                        <span>${questions[lastQuestion]['option4']}</span>`;
                }

            } else if (i >= 60) {
                submitScore(score)
                    .then((response) => {
                        if (response) {
                            window.location.href = "leaderboard.php";
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
