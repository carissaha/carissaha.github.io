let timerId = null;

window.addEventListener("DOMContentLoaded", function() {
  document.addEventListener("click", startAnimation);
});

function startAnimation(e) {
  // Get mouse coordinates
  let clickX = e.clientX;
  let clickY = e.clientY;

  // Stop the existing animation if it's running
  if (timerId !== null) {
    clearInterval(timerId);
  }

  // Start a new animation
  timerId = setInterval(function() {
    moveImage(clickX, clickY);
  }, 10);
}

function moveImage(x, y) {
  const img = document.querySelector("img");

  // Determine the location of the image
  let imgX = parseInt(img.style.left);
  let imgY = parseInt(img.style.top);

  // Determine the (x, y) coordinates that center the image around the clicked (x, y) coords
  const centerX = Math.round(x - (img.width / 2));
  const centerY = Math.round(y - (img.height / 2));

  // Move 1 pixel in both directions toward the click
  if (imgX < centerX) {
    imgX++;
  } else if (imgX > centerX) {
    imgX--;
  }
  if (imgY < centerY) {
    imgY++;
  } else if (imgY > centerY) {
    imgY--;
  }

  // Check if the image has reached the destination, and stop the timer if so
  if (imgX === centerX && imgY === centerY) {
    clearInterval(timerId);
    timerId = null; // Reset the timerId
  }

  // Update the image position
  img.style.left = imgX + "px";
  img.style.top = imgY + "px";
}
