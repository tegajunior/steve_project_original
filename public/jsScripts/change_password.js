


let loadingSpin = () => {
    let mySpin = document.querySelectorAll(".my-spin");
    mySpin.forEach(spin => {
        spin.style.display = "block";
    })
}



let changePassword = () => {
    let newPassword = document.getElementById("new-pwd").value;
    let comfirmPassword = document.getElementById("confirm-pwd").value;
    if (comfirmPassword == newPassword && comfirmPassword.toString().length >= 8) {
        loadingSpin()
        return true
    } else if(comfirmPassword.toString().length < 8 && comfirmPassword !== newPassword) {
        alert("password did not match and password is not upto 8 characters")
        return false
    } else if (comfirmPassword !== newPassword) {
        alert("password did not match")
        return false
    } else {
        alert("password is less than 8 characters")
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