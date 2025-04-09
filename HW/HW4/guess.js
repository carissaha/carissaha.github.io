let secretNumber;
let maxGuesses = 10;
let remainingGuesses = maxGuesses;
let clock = 0;
let clockInterval;

const guessInput = document.getElementById("guessInput");
const guessBtn = document.getElementById("guessBtn");
const feedback = document.getElementById("feedback");
const guessCount = document.getElementById("guessCount");
const clockDisplay = document.getElementById("clock");
const correctSound = document.getElementById("correctSound");
const wrongSound = document.getElementById("wrongSound");
const loseSound = document.getElementById("loseSound");

function startNewGame() {
  secretNumber = Math.floor(Math.random() * 100) + 1;
  remainingGuesses = maxGuesses;
  clock = 0;
  feedback.textContent = "New game started! I'm thinking of a number between 1 and 100.";
  updateGuessCount();
  guessInput.value = "";
  clearInterval(clockInterval);
  clockInterval = setInterval(() => {
    clock++;
    clockDisplay.textContent = `Time: ${clock}s`;
  }, 1000);
}

function updateGuessCount() {
  guessCount.textContent = `Guesses remaining: ${remainingGuesses}`;
}

guessBtn.addEventListener("click", () => {
  const guess = Number(guessInput.value);
  if (!guess || guess < 1 || guess > 100) {
    feedback.textContent = "Please enter a number between 1 and 100.";
    return;
  }

  remainingGuesses--;
  updateGuessCount();

  if (guess === secretNumber) {
    feedback.textContent = `🎉 Congratulations! You guessed it right — the number was ${secretNumber}. Starting a new game...`;
    correctSound.play();
    setTimeout(startNewGame, 3000);
  } else if (remainingGuesses === 0) {
    feedback.textContent = `💀 You've used all your guesses. The number was ${secretNumber}. Try again!`;
    loseSound.play();
    setTimeout(startNewGame, 4000);
  } else {
    feedback.textContent = guess > secretNumber ? "Too high! Try again." : "Too low! Try again.";
    wrongSound.play();
  }

  guessInput.value = "";
});

window.addEventListener("DOMContentLoaded", startNewGame);