

let loadingSpin = () => {
    let mySpin = document.querySelectorAll(".my-spin");
    mySpin.forEach(spin => {
        spin.style.display = "block";
    })
}

// Image Upload Function

document.getElementById("file").addEventListener("change", (event) => {
    let image = document.getElementById("output");
    image.src = URL.createObjectURL(event.target.files[0]);
} )
// var loadFile = (event) => {
//     let image = document.getElementById("output");
//     image.src = URL.createObjectURL(event.target.files[0]);
// }