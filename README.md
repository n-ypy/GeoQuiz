# Wellcome to GéoQuiz 🌎
GeoQuiz is a student project made by [@ebusy9](https://github.com/ebusy9) and [@Akadid](https://github.com/Akadid).
</br>
The project's goal was to create a quiz game using native JavaScript and PHP.
</br>
</br>
Link to the project website : http://evgenii-geoquiz.projets.garage404.com/
</br>
## Project requirements
This project had to meet the following requirements.
#### Design
* In all screen formats, the application should work without a horizontal scrollbar.
* The application optimally utilizes the entire screen on all devices.
* The design is clean, modern, simple, and intuitive.

#### Account
* As an unregistered user, I can log in by entering only my username. No password is required. If the username is not found in the database, a new user is created, and I am logged into my profile. If the username is already in the database, I am logged in and redirected to the quiz.
  
#### List of users and scores
* As a logged-in user, I can access a list of all users and their best scores.

#### Quiz
* As a logged-in user, I answer randomly selected quiz questions.
* As a logged-in user, I cannot edit my chosen answers.
* As a logged-in user, my response changes to green or red upon selection, and the "next" button becomes active.
* As a logged-in user, I have a time limit to answer questions.
* As a logged-in user, I view the results in a table of scores and a bar graph.

## The Project
### Login
To log in, just enter your name and click on "Play!" Afterward, click on "Quiz". If you'd like to explore the older version, simply click on "Old version".
</br>
![geoquiz-login](https://i.imgur.com/xMMjL9T.png)

### The game
You need to respond to 30 questions, and for each correct answer, you'll earn some points. The quicker you respond, the higher your point total will be.
</br>
You can keep track of your overall score, which is displayed at the top of the screen.
</br>
![geoquiz-thegame](https://i.imgur.com/qYMpa3f.png)


### Leaderboard
Once you've completed your latest game, your score will be displayed on the leaderboard.
</br>
The leaderboard also features the top 4 users, ranked according to their scores.
</br>
![geoquiz-leaderboard](https://i.imgur.com/UgAZUiL.png)

  
## New version
![geoquiz-new-version-preview](https://i.imgur.com/wolqcXK.gif)
</br>
In the first version, we used `<input type="radio">`, requiring users to click three times to answer a question and move to the next one.
</br>
We decided to create a new version with `<button>` elements, enabling users to answer a question and move to the next one in a single click, along with some other improvements
</br>
### New version features:
* Enhanced scoring system
* Dynamic animated timer
* One-click question responses
* Randomized display of answer options
