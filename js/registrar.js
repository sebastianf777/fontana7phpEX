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
let modo_manual = true;
let boton_modo_mat = document.querySelectorAll('.modo_mat');;
let boton_modo_fer = document.querySelectorAll('.modo_fer');;
let sibling;

let precio_multiplicado = document.querySelectorAll('precio_multiplicado');
let cantidad = document.querySelectorAll('.cantidad');
let cada_uno = document.querySelectorAll('.cada_uno');
let cantidad_cifra;
let cada_uno_cifra;
let total_multiplicado;
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
  boton_modo_mat = document.querySelectorAll('.modo_mat');
  funcionModoMat();
}
const agregarFuncionFer = () => {
  fer_new = fer_li.cloneNode(true);
  fer_first.parentNode.insertBefore(fer_new, fer_first.nextSibling);
  fer_new.classList.remove('fer_li');
  boton_modo_fer = document.querySelectorAll('.modo_fer');
  funcionModoFer();
}


//Conseguir Sibling

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


//Multiplicar cantidad x unidad


function funcionMultiplicar() {
  cada_uno.forEach(element => {
    if (element.parentElement.parentElement.classList.contains('mat_li') == false && element.classList.contains('tiene_funcion_multiplicar') == false) {

      element.classList.add('tiene_funcion_multiplicar');
      element.addEventListener('focusout', function (e) {
        e.preventDefault();
        cada_uno = this.value;
        console.log(cantidad_cifra);
        cantidad_cifra = e.target.closest('li').querySelector('.cantidad input').value;
        console.log(cantidad_cifra);
        total_multiplicado = e.target.closest('li').querySelector('.precio_multiplicado').value = (cantidad_cifra * cada_uno);
        console.log(total_multiplicado);


      })

    }
    
  });
  cantidad.forEach(element => {
    if (element.parentElement.parentElement.classList.contains('mat_li') == false && element.classList.contains('tiene_funcion_multiplicar') == false) {
      element.classList.add('tiene_funcion_multiplicar');
      element.addEventListener('focusout', function (e) {
        e.preventDefault();
      })

  
      }
  });
}

//Cambiar modo



function funcionModoMat() {
  boton_modo_mat.forEach(element => {

    if (element.parentElement.parentElement.classList.contains('mat_li') == false && element.classList.contains('tiene_funcion_modo') == false) {
      element.classList.add('tiene_funcion_modo');
      element.addEventListener('click', function (e) {
        e.preventDefault();

        conseguirSibling(e.target, '#element_2');
        console.log(sibling.getAttribute('name'));
        if (sibling.getAttribute('name') == '') {
          sibling.setAttribute('name', 'element_2[]')
          sibling.classList.toggle('ocultar_modo')
        } else {
          console.log(sibling.getAttribute('name'));
          sibling.classList.add('ocultar_modo')
          sibling.setAttribute('name', '')
        }
        conseguirSibling(e.target, '#select_element_2')
        if (sibling.getAttribute('name') == '') {
          sibling.setAttribute('name', 'element_2[]')
          sibling.classList.toggle('ocultar_modo')
          
        } else {
          sibling.setAttribute('name', '');
          sibling.classList.add('ocultar_modo')

        }

      })
    }

  });
}

function funcionModoFer() {
  boton_modo_fer.forEach(element => {

    if (element.parentElement.parentElement.classList.contains('fer_li') == false && element.classList.contains('tiene_funcion_modo') == false) {
      element.classList.add('tiene_funcion_modo');
      element.addEventListener('click', function (e) {
        e.preventDefault();

        conseguirSibling(e.target, '#element_6');
        console.log(sibling.getAttribute('name'));
        if (sibling.getAttribute('name') == '') {
          sibling.setAttribute('name', 'element_6[]')
          sibling.classList.toggle('ocultar_modo')

        } else {
          console.log(sibling.getAttribute('name'));
          sibling.setAttribute('name', '')
          sibling.classList.add('ocultar_modo')

        }
        conseguirSibling(e.target, '#select_element_6')
        if (sibling.getAttribute('name') == '') {
          sibling.setAttribute('name', 'element_6[]')
          sibling.classList.toggle('ocultar_modo')

        } else {
          sibling.setAttribute('name', '')
          sibling.classList.add('ocultar_modo')

        }

      })
    }

  });
}





//Usar funciones al iniciar

window.onload = function () {
  ponerFecha();
  ponerOpcionVendedor();
  funcionModoMat();
  funcionModoFer();
  funcionMultiplicar();
}

