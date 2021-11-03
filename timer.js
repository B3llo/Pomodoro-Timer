function timer() {
  let sec = document.querySelector("new_cicle");
  let seconds = 7;

  sec.addEventListener("click", () => {
    setInterval(() => {
      seconds++;
      sec.innerHTML = seconds;
    }, 1000);
  });
}
