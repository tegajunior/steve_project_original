

let loadingSpin = () => {
    let mySpin = document.querySelectorAll(".my-spin");
    mySpin.forEach(spin => {
        spin.style.display = "block";
    })
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

console.log("good")