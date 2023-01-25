const buttonEditPetugas = document.querySelectorAll("#buttonEditPetugas");

let idPetugas = document.querySelector("#idPetugas");
let namaPetugas = document.querySelector("#namaPetugas");
let username = document.querySelector("#username");
let telp = document.querySelector("#telp");
let level = document.querySelector("#level");

buttonEditPetugas.forEach(edit => {
    edit.addEventListener("click", () => {
        idPetugas.setAttribute("value", edit.getAttribute("data-id"));
        namaPetugas.setAttribute("value", edit.getAttribute("data-nama-petugas"));
        username.setAttribute("value", edit.getAttribute("data-username"));
        telp.setAttribute("value", edit.getAttribute("data-telp"));
        level.setAttribute("value", edit.getAttribute("data-level"));
    });
});