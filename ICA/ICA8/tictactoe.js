let playerTurn = true;
let computerMoveTimeout = 0;
const gameStatus = {
MORE_MOVES_LEFT: 1,
HUMAN_WINS: 2,
COMPUTER_WINS: 3,
DRAW_GAME: 4
};
window.addEventListener("DOMContentLoaded", domLoaded);
function domLoaded() {
// Setup the click event for the "New game" button
const newBtn = document.getElementById("newGameButton");
newBtn.addEventListener("click", newGame);
// Create click-event handlers for each game board button
const buttons = getGameBoardButtons();
for (let button of buttons) {
button.addEventListener("click", function ()
{ boardButtonClicked(button); });
}
// Clear the board
newGame();
}
// Returns an array of 9 <button> elements that make up the game board. The first 3
// elements are the top row, the next 3 the middle row, and the last 3 the
// bottom row.
function getGameBoardButtons() {
return document.querySelectorAll("#gameBoard > button");
}
function checkForWinner() {
const buttons = getGameBoardButtons();
// Ways to win
const possibilities = [
[0, 1, 2], [3, 4, 5], [6, 7, 8], // rows
[0, 3, 6], [1, 4, 7], [2, 5, 8], // columns
[0, 4, 8], [2, 4, 6] // diagonals
];
// Check for a winner first
for (let indices of possibilities) {
if (buttons[indices[0]].innerHTML !== "" &&
buttons[indices[0]].innerHTML ===
buttons[indices[1]].innerHTML &&
buttons[indices[1]].innerHTML ===
buttons[indices[2]].innerHTML) {
// Found a winner
if (buttons[indices[0]].innerHTML === "X") {
return gameStatus.HUMAN_WINS;
}
else {
return gameStatus.COMPUTER_WINS;
}
}
}
// See if any more moves are left
for (let button of buttons) {
    if (button.innerHTML !== "X" && button.innerHTML !== "O") {
        return gameStatus.MORE_MOVES_LEFT;
        }
        }
        // If no winner and no moves left, then it's a draw
        return gameStatus.DRAW_GAME;
        }

        function newGame() {
        // TODO: Complete the function
            // Clear computer move timeout
            clearTimeout(computerMoveTimeout);
            computerMoveTimeout = 0;
        
            // Get game board buttons
            const buttons = getGameBoardButtons();
        
            // Reset the game board
            for (let button of buttons) {
                button.innerHTML = "";   // Clear button text
                button.className = "";   // Remove any applied classes
                button.removeAttribute("disabled"); // Enable all buttons
            }
        
            // Set playerTurn to true
            playerTurn = true;
        
            // Update the turn information
            document.getElementById("turnInfo").textContent = "Your turn";        
        }

        function boardButtonClicked(button) {
        // TODO: Complete the function
        if (playerTurn) {
            // Set the button's text to "X"
            button.innerHTML = "X";
    
            // Add the "x" class
            button.classList.add("x");
    
            // Disable the button to prevent further clicks
            button.setAttribute("disabled", true);
    
            // Switch turn to the computer
            switchTurn();
        }
        }
        

        function switchTurn() {
        // TODO: Complete the function
        // Check the current game status
        let status = checkForWinner();

        if (status === gameStatus.MORE_MOVES_LEFT) {
            // If it's the player's turn, switch to the computer
            if (playerTurn) {
                playerTurn = false; // Switch to computer's turn
                document.getElementById("turnInfo").textContent = "Computer's turn";
                computerMoveTimeout = setTimeout(makeComputerMove, 1000);
            } else {
                // If it's the computer's turn, switch to the player
                playerTurn = true;
                document.getElementById("turnInfo").textContent = "Your turn";
            }
        } else {
            // Win or a draw
            playerTurn = false;

            if (status === gameStatus.HUMAN_WINS) {
                document.getElementById("turnInfo").textContent = "You win!";
            } else if (status === gameStatus.COMPUTER_WINS) {
                document.getElementById("turnInfo").textContent = "Computer wins!";
            } else if (status === gameStatus.DRAW_GAME) {
                document.getElementById("turnInfo").textContent = "Draw game";
            }
        }
        }

        function makeComputerMove() {
        // TODO: Complete the function
        const buttons = getGameBoardButtons();
        const emptyButtons = Array.from(buttons).filter(btn => !btn.textContent);
        // 1. Check for a winning move (O wins)
        for (let btn of emptyButtons) {
            btn.textContent = "O";
            if (checkForWinner() === gameStatus.COMPUTER_WINS) {
            btn.classList.add("o");
            btn.disabled = true;
            switchTurn();
            return;
            }
            btn.textContent = ""; // Reset if not a win
        }
        // 2. Block player's winning move (X wins)
        for (let btn of emptyButtons) {
            btn.textContent = "X";
            if (checkForWinner() === gameStatus.HUMAN_WINS) {
            btn.textContent = "O"; // Block by placing O
            btn.classList.add("o");
            btn.disabled = true;
            switchTurn();
            return;
            }
            btn.textContent = ""; // Reset
            }
            // 3. Prioritize center or corners
        const strategicIndices = [4, 0, 2, 6, 8]; // Center first, then corners
        for (let i of strategicIndices) {
        if (buttons[i].textContent === "") {
        buttons[i].textContent = "O";
        buttons[i].classList.add("o");
        buttons[i].disabled = true;
        switchTurn();
        return;
        }
        }
        // 4. Fallback: Random move
        const randomIndex = Math.floor(Math.random() * emptyButtons.length);
        const btn = emptyButtons[randomIndex];
        btn.textContent = "O";
        btn.classList.add("o");
        btn.disabled = true;
        switchTurn();
}
