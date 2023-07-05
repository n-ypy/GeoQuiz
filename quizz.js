
async function getQuestions() {
    const response = await fetch("actions/get-questions.php", {
        method: "POST",
        headers: {
            "Content-type": "application/json",
        },
        body: JSON.stringify(getRandomInt(5)),
    });
    return response.json();
}

getQuestions()
    .then((questions) => {
        let i = 0;
        let questionNumber = document.querySelector("#questionNumber");
        let enunciate = document.querySelector("#enunciate");
        let responseOne = document.querySelector("#responseOne");
        let responseTwo = document.querySelector("#responseTwo");
        let responseThree = document.querySelector("#responseThree");
        let responseFour = document.querySelector("#responseFour");
        let submitButton = document.querySelector(".btn");

        function submitResponse(questions) {
            let getRandomEnunciate = getRandomInt(30);
            questionNumber.innerHTML = `(${i} sur 30)`;
            enunciate.innerHTML = `${questions[getRandomEnunciate]['enunciate']}`;
            responseOne.innerHTML = `${questions[getRandomEnunciate]['option1']}`;
            responseTwo.innerHTML = `${questions[getRandomEnunciate]['option2']}`;
            responseThree.innerHTML = `${questions[getRandomEnunciate]['option3']}`;
            responseFour.innerHTML = `${questions[getRandomEnunciate]['option4']}`;
        }

        submitButton.addEventListener("click", (event) => {
            submitResponse(questions), 
            i++
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