
let myNavLink = document.querySelectorAll(".my-nav-link");


let activeLink = (e) => {
    myNavLink.forEach(link => {
        link.classList.remove("active");
    })
    e.target.classList.add("active");
}

myNavLink.forEach(link => {
    link.addEventListener("click", activeLink)
})



let alertSuccess = () => {
    // alert("Your Message has been sent successfully")
    document.getElementById("message-sent").style.display = "flex"
    return true
}
