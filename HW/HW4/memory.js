let images = []; // Will be filled with image paths
let timer, gameTime;
let firstCard = null;
let secondCard = null;
let matches = 0;
let totalPairs = 0;
let lockBoard = false;

const startBtn = document.getElementById("startGame");
const gameBoard = document.getElementById("gameBoard");
const timerDisplay = document.getElementById("timer");
const correctSound = new Audio("sounds/correct.mp3");
const restartBtn = document.getElementById("restartBtn");
const award = document.getElementById("award");

startBtn.addEventListener("click", setupGame);
restartBtn.addEventListener("click", () => location.reload());

function setupGame() {
  const pairCount = parseInt(document.getElementById("pairCount").value);
  const memorizeTime = parseInt(document.getElementById("memorizeTime").value);

  totalPairs = pairCount;
  gameTime = pairCount === 8 ? 120 : pairCount === 10 ? 150 : 180;

  // Load image pairs (e.g., img1.jpg, img2.jpg, ...)
  images = [];
  for (let i = 1; i <= pairCount; i++) {
    images.push(`images/img${i}.jpg`);
    images.push(`images/img${i}.jpg`);
  }

  shuffle(images);

  // Clear and build game board
  gameBoard.innerHTML = "";
  images.forEach(src => {
    const card = document.createElement("img");
    card.src = src;
    card.classList.add("card");
    card.dataset.src = src;
    card.onclick = handleCardClick;
    gameBoard.appendChild(card);
  });

  startBtn.style.display = "none";

  // Show cards temporarily to memorize
  setTimeout(() => {
    document.querySelectorAll(".card").forEach(card => card.src = "images/back.jpg");
    startTimer();
  }, memorizeTime * 1000);
}

function handleCardClick(e) {
  if (lockBoard) return;

  const card = e.target;
  if (card.src.includes("back.jpg")) {
    card.src = card.dataset.src;

    if (!firstCard) {
      firstCard = card;
    } else if (!secondCard && card !== firstCard) {
      secondCard = card;
      lockBoard = true;

      if (firstCard.dataset.src === secondCard.dataset.src) {
        correctSound.play();
        matches++;
        resetCards();
        if (matches === totalPairs) endGame(true);
      } else {
        setTimeout(() => {
          firstCard.src = "images/back.jpg";
          secondCard.src = "images/back.jpg";
          resetCards();
        }, 1000);
      }
    }
  }
}

function resetCards() {
  firstCard = null;
  secondCard = null;
  lockBoard = false;
}

function shuffle(array) {
  for (let i = array.length - 1; i > 0; i--) {
    const j = Math.floor(Math.random() * (i + 1));
    [array[i], array[j]] = [array[j], array[i]];
  }
}

function startTimer() {
  let timeLeft = gameTime;
  timerDisplay.textContent = `Time left: ${timeLeft}s`;

  timer = setInterval(() => {
    timeLeft--;
    timerDisplay.textContent = `Time left: ${timeLeft}s`;
    if (timeLeft === 0) {
      clearInterval(timer);
      endGame(false);
    }
  }, 1000);
}

function endGame(won) {
  clearInterval(timer);
  if (won) {
    award.style.display = "block";
    award.style.animation = "pop 1s ease-in-out";
  } else {
    timerDisplay.textContent = "⏱️ Time's up! Try again!";
  }
  restartBtn.style.display = "inline-block";
}