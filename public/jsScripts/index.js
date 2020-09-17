
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

