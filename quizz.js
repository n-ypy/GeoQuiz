let data = {
    key: 1,
};


async function getQuestions() {
    const response = await fetch("actions/get-questions.php", {
        method: "POST",
        headers: {
            "Content-type": "application/json",
        },
        body: JSON.stringify(data),
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
        let answeredQuestions = [];



        function submitResponse(questions) {

            let getRandomEnunciate = getRandomInt((31));
            if (!answeredQuestions.includes(`${getRandomEnunciate}`)) {
                questionNumber.innerHTML = `(${q} of 30)`;
                enunciate.innerHTML = `${questions[getRandomEnunciate]['enunciate']}`;
                responseOne.innerHTML = `
                <input type="radio" name="response" value="${questions[getRandomEnunciate]['option1']}">
                <span>${questions[getRandomEnunciate]['option1']}</span>`;
                responseTwo.innerHTML = `
                <input type="radio" name="response" value="${questions[getRandomEnunciate]['option2']}">
                <span>${questions[getRandomEnunciate]['option2']}</span>`;
                responseThree.innerHTML = `
                <input type="radio" name="response" value="${questions[getRandomEnunciate]['option3']}">
                <span>${questions[getRandomEnunciate]['option3']}</span>`;
                responseFour.innerHTML = `
                <input type="radio" name="response" value="${questions[getRandomEnunciate]['option4']}">
                <span>${questions[getRandomEnunciate]['option4']}</span>`;
                answeredQuestions.push(`${getRandomEnunciate}`)
                lastQuestion = `${getRandomEnunciate}`;
            } else {
                submitResponse(questions);
            }
        }

        submitResponse(questions)

        submitButton.addEventListener("click", (event) => {
            if (i <= 60 && i % 2 === 0) {
                q++
                event.target.innerHTML = "Valider la réponse"
                submitResponse(questions)
            } else if (i <= 60 && i % 2 === 1) {

                event.target.innerHTML = "Question suivante"
                const form = event.target.closest("form");
                const formData = new FormData(form);
                console.log(formData.get('response'))
                let answer = formData.get('response');
                let compareAnswer = formData.get('response') === questions[lastQuestion]['response'];

                if (compareAnswer) {
                    score++
                }
                console.log(score)

                if (answer === questions[lastQuestion]['option1'] && compareAnswer || answer !== questions[lastQuestion]['option1'] && questions[lastQuestion]['response'] === questions[lastQuestion]['option1']) {
                    responseOne.innerHTML = `
                <input type="radio" name="response" value="${questions[lastQuestion]['option1']}" disabled>
                <span>${questions[lastQuestion]['option1']} (Bonne réponse)</span>`;
                } else if (answer === questions[lastQuestion]['option1']) {
                    responseOne.innerHTML = `
                <input type="radio" name="response" value="${questions[lastQuestion]['option1']}" disabled>
                <span>${questions[lastQuestion]['option1']} (Mauvaise réponse)</span>`;
                } else {
                    responseOne.innerHTML = `
                <input type="radio" name="response" value="${questions[lastQuestion]['option1']}" disabled>
                <span>${questions[lastQuestion]['option1']}</span>`;
                }


                if (answer === questions[lastQuestion]['option2'] && compareAnswer || answer !== questions[lastQuestion]['option2'] && questions[lastQuestion]['response'] === questions[lastQuestion]['option2']) {
                    responseTwo.innerHTML = `
                <input type="radio" name="response" value="${questions[lastQuestion]['option2']}" disabled>
                <span>${questions[lastQuestion]['option2']} (Bonne réponse)</span>`;
                } else if (answer === questions[lastQuestion]['option2']) {
                    responseTwo.innerHTML = `
                <input type="radio" name="response" value="${questions[lastQuestion]['option2']}" disabled>
                <span>${questions[lastQuestion]['option2']} (Mauvaise réponse)</span>`;
                } else {
                    responseTwo.innerHTML = `
                <input type="radio" name="response" value="${questions[lastQuestion]['option2']}" disabled>
                <span>${questions[lastQuestion]['option2']}</span>`;
                }

                if (answer === questions[lastQuestion]['option3'] && compareAnswer || answer !== questions[lastQuestion]['option3'] && questions[lastQuestion]['response'] === questions[lastQuestion]['option3']) {
                    responseThree.innerHTML = `
                <input type="radio" name="response" value="${questions[lastQuestion]['option3']}" disabled>
                <span>${questions[lastQuestion]['option3']} (Bonne réponse)</span>`;
                } else if (answer === questions[lastQuestion]['option3']) {
                    responseThree.innerHTML = `
                <input type="radio" name="response" value="${questions[lastQuestion]['option3']}" disabled>
                <span>${questions[lastQuestion]['option3']} (Mauvaise réponse)</span>`;
                } else {
                    responseThree.innerHTML = `
                <input type="radio" name="response" value="${questions[lastQuestion]['option3']}" disabled>
                <span>${questions[lastQuestion]['option3']}</span>`;
                }


                if (answer === questions[lastQuestion]['option4'] && compareAnswer || answer !== questions[lastQuestion]['option4'] && questions[lastQuestion]['response'] === questions[lastQuestion]['option4']) {
                    responseFour.innerHTML = `
                <input type="radio" name="response" value="${questions[lastQuestion]['option4']}" disabled>
                <span>${questions[lastQuestion]['option4']} (Bonne réponse)</span>`;
                } else if (answer === questions[lastQuestion]['option4']) {
                    responseFour.innerHTML = `
                <input type="radio" name="response" value="${questions[lastQuestion]['option4']}" disabled>
                <span>${questions[lastQuestion]['option4']} (Mauvaise réponse)</span>`;
                } else {
                    responseFour.innerHTML = `
                <input type="radio" name="response" value="${questions[lastQuestion]['option4']}" disabled>
                <span>${questions[lastQuestion]['option4']}</span>`;
                }

            }
            i++
            console.log(event.target.innerHTML)
            event.preventDefault()

        })

        console.log(questions);
    })
    .catch((error) => {
        console.error(error);
    });

function getRandomInt(max) {
    return Math.floor(Math.random() * max);
}