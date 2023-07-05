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

            let getRandomEnunciate = getRandomInt(30);
            if (!answeredQuestions.includes(`${getRandomEnunciate}`)) {
                questionNumber.innerHTML = `(${i} of 30)`;
                enunciate.innerHTML = `${questions[getRandomEnunciate]['enunciate']}`;
                responseOne.innerHTML = `${questions[getRandomEnunciate]['option1']}`;
                responseTwo.innerHTML = `${questions[getRandomEnunciate]['option2']}`;
                responseThree.innerHTML = `${questions[getRandomEnunciate]['option3']}`;
                responseFour.innerHTML = `${questions[getRandomEnunciate]['option4']}`;
                answeredQuestions.push(`${getRandomEnunciate}`)
            } else {
                submitResponse(questions);
            }
        }
        submitResponse(questions)
        submitButton.addEventListener("click", (event) => {
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