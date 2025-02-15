function makePass(length) {
  let result = "";
  const characters =
    "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";
  const charactersLength = characters.length;
  let counter = 0;
  while (counter < length) {
    result += characters.charAt(Math.floor(Math.random() * charactersLength));
    counter += 1;
  }
  let passInput = document.getElementById("passInput");
  let passInput2 = document.getElementById("passInput2");

  passInput.value = result;
  passInput2.value = result;
}

let gBtn = document.getElementById("gBtn");
gBtn.addEventListener("click", function (e) {
  e.preventDefault();
  makePass(6);
});
