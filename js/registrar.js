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
const mat_first = document.querySelector(".mat_first");
const fer_first = document.querySelector(".fer_first");



let mat_new = mat_li.cloneNode(true);
let mat_fer = fer_li.cloneNode(true);

let ferreteria_textarea = document.getElementById("element_6");
let pedidos_textarea = document.getElementById("element_9");
let cliente_textarea = document.getElementById("element_11");
let registrar_submit = document.getElementById("registrar_submit");

let vendedor_brian = document.getElementById("element_3_1");
let vendedor_sebastian = document.getElementById("element_3_2");
let vendedor_opcion = localStorage.getItem("vendedor");

let textarea_manual = document.querySelector('#element_2');
let select_auto = document.querySelector('#select_element_2');
let cantidad = document.querySelector('.cantidad');
let modo_manual = true;
let boton_modo = document.querySelectorAll('.modo');;
let sibling;
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
  mat_first.parentNode.insertBefore(mat_new, mat_first.nextSibling);
  mat_new.classList.remove('mat_li');
  boton_modo = document.querySelectorAll('.modo');
  funcionModo();
}
const agregarFuncionFer = () => {
  fer_new = fer_li.cloneNode(true);
  fer_first.parentNode.insertBefore(fer_new, fer_first.nextSibling);
  fer_new.classList.remove('fer_li');

}

//Cambiar modo

function conseguirSibling(elem, selector) {

  // Get the next sibling element
  sibling = elem.nextElementSibling;

  // If the sibling matches our selector, use it
  // If not, jump to the next sibling and continue the loop
  while (sibling) {
    if (sibling.matches(selector)) {


      return sibling

    };
    sibling = sibling.nextElementSibling;

  }

};
function funcionModo() {
  boton_modo.forEach(element => {
    
    if (element.parentElement.parentElement.classList.contains('mat_li') == false && element.classList.contains('tiene_funcion_modo') == false) {
      element.classList.add('tiene_funcion_modo');
      element.addEventListener('click', function (e) {
        e.preventDefault();
       // if (modo_manual == true) {
       //   modo_manual = false;
       //   console.log(e.target);
       conseguirSibling(e.target, '#element_2');
       console.log(sibling.getAttribute('name'));
       if (sibling.getAttribute('name') == '') {
         sibling.setAttribute('name', 'element_2[]')
       } else {
         console.log(sibling.getAttribute('name'));
 
         sibling.setAttribute('name', '')
       }
       conseguirSibling(e.target, '#select_element_2')
       if (sibling.getAttribute('name') == '') {
         sibling.setAttribute('name', 'element_2[]')
       } else {
         sibling.setAttribute('name', '')
       }
       // sibling.setAttribute('name', '')
       // sibling.setAttribute('name', 'element_2[]')
 
       // textarea_manual.nextElementSibling.setAttribute('name', '')
       // select_auto.nextElementSibling.setAttribute('name', 'element_2[]')
       // }else{
       // modo_manual = true;
       // conseguirSibling(e.target, '#select_element_2')
       // sibling.setAttribute('name', '')
       // conseguirSibling(e.target, '#element_2')
       // sibling.setAttribute('name', 'element_2[]')
       // select_auto.setAttribute('name', '')
       // textarea_manual.nextElementSibling.setAttribute('name', 'element_2[]')
       // }
 
     })
    }
    
  });
}





//Usar funciones al iniciar

window.onload = function () {
  ponerFecha();
  ponerOpcionVendedor();
 funcionModo();
}

