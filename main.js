let another_modal = document.querySelector(".another-modal");
let more_btn = document.querySelector("#more");
// let modal_body = document.querySelector(".model-body");
let modal_body = document.querySelector(".copy");


more_btn.addEventListener("click", () => {
    another_modal.append(modal_body.cloneNode(true));
});




