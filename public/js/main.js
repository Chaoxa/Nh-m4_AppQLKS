const loginBtn = document.getElementById("login-btn");
const loginForm = document.getElementById("login-form");

loginBtn.addEventListener("click", function () {
  if (loginForm.style.display === "none") {
    loginForm.style.display = "block";
  } else {
    loginForm.style.display = "none";
  }
});

window.addEventListener("scroll", function () {
  loginForm.style.display = "none";
});
