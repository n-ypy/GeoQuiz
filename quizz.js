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
                questionNumber.innerHTML = `(${i} of 30)`;
                enunciate.innerHTML = `${questions[getRandomEnunciate]['enunciate']}`;
                responseOne.innerHTML = `
                <input type="radio" name="reponse" value="${questions[getRandomEnunciate]['option1']}">
                <span>${questions[getRandomEnunciate]['option1']}</span>`;
                responseTwo.innerHTML = `
                <input type="radio" name="reponse" value="${questions[getRandomEnunciate]['option2']}">
                <span>${questions[getRandomEnunciate]['option2']}</span>`;
                responseThree.innerHTML = `
                <input type="radio" name="reponse" value="${questions[getRandomEnunciate]['option3']}">
                <span>${questions[getRandomEnunciate]['option3']}</span>`;
                responseFour.innerHTML = `
                <input type="radio" name="reponse" value="${questions[getRandomEnunciate]['option4']}">
                <span>${questions[getRandomEnunciate]['option4']}</span>`;
                answeredQuestions.push(`${getRandomEnunciate}`)
            } else {
                submitResponse(questions);
            }
        }
        submitResponse(questions)
        submitButton.addEventListener("click", (event) => {
            const form = event.target.closest("form");
            const formData = new FormData(form);
            console.log(formData)
            if (i <= 30) {
                submitResponse(questions)
                i++
            }
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