const fecha = document.getElementById('calendar_4');
const month = document.getElementById('element_4_1');
const date = document.getElementById('element_4_2');
const year = document.getElementById('element_4_3');
const numero = document.getElementById('element_1');
const sin_numero = document.getElementById('sin_numero');
const mostrar_numero = document.querySelector('.registrar_mostrar');
const vendedor_opciones = document.getElementById('vendedor_opciones');
const materiales_textarea = document.getElementById("element_2");
const agregar_item = document.querySelectorAll(".agregar_mat");
const mat_li = document.querySelector(".mat_li");
const fer_li = document.querySelector(".fer_li");
let mat_new = mat_li.cloneNode(true);
let mat_fer = fer_li.cloneNode(true);

let ferreteria_textarea = document.getElementById("element_6");
let pedidos_textarea = document.getElementById("element_9");
let cliente_textarea = document.getElementById("element_11");
let registrar_submit = document.getElementById("registrar_submit");

let vendedor_brian = document.getElementById("element_3_1");
let vendedor_sebastian = document.getElementById("element_3_2");
let vendedor_opcion = localStorage.getItem("vendedor");

//Función mostrar Número 

mostrar_numero.addEventListener('click', function () {
  if (sin_numero.checked) {
    numero.required = false
  } else {
    numero.required = true
  }
}
)

//Función poner fecha de hoy

const todayNew = new Date();
let today;
let todayFiltered;
let registrar_input = document.querySelectorAll(".registrar_input_text");

registrar_input.forEach(element => {
  element.oninput = function () {
    element.style.height = "";
    element.style.height = element.scrollHeight + "px"
  };
})

function formatDate(date, format) {
  const map = {
    mm: date.getMonth() + 1,
    dd: date.getDate(),
    yy: date.getFullYear().toString(),
    yyyy: date.getFullYear()
  }

  return format.replace(/mm|dd|yy|yyy/gi, matched => map[matched])
}
function ponerFecha() {
  month.value = formatDate(todayNew, 'mm');
  date.value = formatDate(todayNew, 'dd');
  year.value = formatDate(todayNew, 'yy');
}
fecha.addEventListener("click", ponerFecha())

//Guardar última opción vendedor

vendedor_opciones.addEventListener("click", function () {
  if (vendedor_sebastian.checked === true) {
    localStorage.setItem("vendedor", "sebastian");

  } else {
    localStorage.setItem("vendedor", "brian");
  }
})

function ponerOpcionVendedor() {
  if (vendedor_opcion == "sebastian") {
    vendedor_brian.checked = false;
    vendedor_sebastian.checked = true;
  }
}

//Deshabilitar submit después de darle click

registrar_submit.onclick = function () {
  //disable
  if (materiales_textarea.value != '' || ferreteria_textarea.value != ''
    || pedidos_textarea.value != '' || cliente_textarea.value != '') {
    if (numero.required != true || numero.value != '') {
      // registrar_submit.disabled = true;
      registrar_submit.style.display = "none";

    }
  }
}

//Agregar item
const agregarFuncionMat = () => {
mat_new = mat_li.cloneNode(true);
  mat_li.parentNode.insertBefore(mat_new, mat_li.nextSibling);
mat_new.classList.remove('mat_li');
}
const agregarFuncionFer = () => {
  fer_new = fer_li.cloneNode(true);
    fer_li.parentNode.insertBefore(fer_new, fer_li.nextSibling);
  fer_new.classList.remove('fer_li');
  }
  

//Usar funciones al iniciar

window.onload = function () {
  ponerFecha();
  ponerOpcionVendedor();
}

