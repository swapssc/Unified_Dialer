
myFunction = function()
{
    const email = document.getElementById('email').value;
    const password = document.getElementByID('password').value;
    const Firstname = document.getElementByID('fname').value;
    
localStorage.setItem("email", email);
localStorage.setItem("password", password);
localStorage.setItem("Firstname", fname);

localStorage.getItem("email", email);

}



