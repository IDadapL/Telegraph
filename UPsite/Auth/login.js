const loginHeader = document.getElementById("authHeader");
const regSwitcher = document.getElementById("registration-switch");
const logSwitcher = document.getElementById("login-switch");

const logButton = document.getElementById("authButton");

const login = "Вход";
const registration = "Регистрация";
const registration2 = "Зарегистрироваться";

regSwitcher.addEventListener("click", () => ChangeForm("Registration"));
logSwitcher.addEventListener("click", () => ChangeForm("Login"));

const currentMode = document.getElementById("mode");

function ChangeForm(logToggle){
    if(logToggle == "Registration")
    {
        currentMode.value = "register";
        loginHeader.textContent = registration;
        logButton.textContent = registration2;
    }
    else if(logToggle == "Login"){
        currentMode.value = "login";
        loginHeader.textContent = login;
        logButton.textContent = login;
    }
}