const signUpButton = document.getElementById('signUp');
const signInButton = document.getElementById('signIn');
const container = document.getElementById('container');

signUpButton.addEventListener('click', () => {
	container.classList.add("right-panel-active");
});

signInButton.addEventListener('click', () => {
	container.classList.remove("right-panel-active");
});

const checkPassword = () => {
    const password = document.getElementById("password").value;
    const cPassword = document.getElementById("cPassword").value;

    const regexCheck = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@#$%^&*!])[A-Za-z\d@#$%^&*!]{8,}$/;

    if (password !== cPassword) {
        alert("Passwords don't match. Please check and try again.");
        return false;
    } else if (!regexCheck.test(password)) {
        alert("Password must be atleast 8 characters and must contain special sign.");
        return false;
    }

    return true;
}

