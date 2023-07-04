async function getQuestions() {
    const response = await fetch("actions/get-questions.php", {
        method: "POST",
        headers: {
            "Content-type": "application/json",
        },
        body: JSON.stringify(Math.random())
    });
    return response.json();
}


getQuestions()
    .then(questions => {
        
        console.log(questions);
    })
    .catch(error => {
        
        console.error(error);
    });
