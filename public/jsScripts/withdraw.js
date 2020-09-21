

let loadingSpin = () => {
    let mySpin = document.querySelectorAll(".my-spin");
    mySpin.forEach(spin => {
        spin.style.display = "block";
    })
}


let compareWithdrawAmount = () => {
    let myAmount = Number(document.getElementById("amount").value);
    let currentAmount = Number(document.getElementById("current-balance").innerHTML);
    if(myAmount <= currentAmount){
        loadingSpin()
        return true
    } else {
        alert("insufficient fund, Try Again");
        // loadingSpin()
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