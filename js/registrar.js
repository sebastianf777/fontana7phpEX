const fecha = document.getElementById('calendar_4');
const month = document.getElementById('element_4_1');
const date = document.getElementById('element_4_2');
const year = document.getElementById('element_4_3');
const numero = document.getElementById('element_1');
const sin_numero = document.getElementById('sin_numero');
const mostrar_numero = document.querySelector('.registrar_mostrar'); 
const vendedor_opciones = document.getElementById('vendedor_opciones');
let vendedor_brian = document.getElementById("element_3_1");
let vendedor_sebastian = document.getElementById("element_3_2");
let vendedor_opcion = localStorage.getItem("vendedor");

//Función mostrar Número 

mostrar_numero.addEventListener('click', function () {
  if(sin_numero.checked){
    numero.required = false 
  }else{
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
    console.log("hi")
  }else{
    localStorage.setItem("vendedor", "brian");
  }
})

function ponerOpcionVendedor() {
  if (vendedor_opcion == "sebastian") {
    vendedor_brian.checked = false;
    vendedor_sebastian.checked = true;
  }
}

//Usar funciones al iniciar

window.onload = function () {
  ponerFecha();
  ponerOpcionVendedor();
}