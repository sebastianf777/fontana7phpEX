let registrar_input = document.querySelector(".registrar_input_text");

registrar_input.oninput = function() {
  registrar_input.style.height = "";
  /* textarea.style.height = Math.min(textarea.scrollHeight, 300) + "px"; */
registrar_input.style.height = registrar_input.scrollHeight + "px"
};