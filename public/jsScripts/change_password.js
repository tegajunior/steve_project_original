


let loadingSpin = () => {
    let mySpin = document.querySelectorAll(".my-spin");
    mySpin.forEach(spin => {
        spin.style.display = "block";
    })
}



let changePassword = () => {
    let newPassword = document.getElementById("new-pwd").value;
    // let passwordTwo = document.getElementById("password-two").value;
    if (newPassword.toString().length >= 8) {
        loadingSpin()
        return true
    } else if(newPassword.toString().length < 8) {
        // loadingSpin();
        alert("password is not upto 8 characters")
        return false
    }
}



let showPassword = () => {
    myPassword = document.querySelectorAll(".password");
    myPassword.forEach( input => {
        if(input.type == "password"){
            input.type = "text"
        } else {
            input.type = "password"
        }
    })
}

document.querySelectorAll(".show-password").forEach( inputPassword => {
    inputPassword.addEventListener("click", showPassword)
})