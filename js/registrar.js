let registrar_input = document.querySelectorAll(".registrar_input_text");

registrar_input.forEach(element => {
  element.oninput = function () {
    element.style.height = "";
    /* textarea.style.height = Math.min(textarea.scrollHeight, 300) + "px"; */
    element.style.height = element.scrollHeight + "px"
  };
})

