//VARIABLES

// const fecha = document.getElementById('calendar_4');
const month = document.querySelectorAll('.element_4_1');
const date = document.querySelectorAll('.element_4_2');
const year = document.querySelectorAll('.element_4_3');

const numero = document.getElementById('element_1');
const sin_numero = document.getElementById('sin_numero');
const mostrar_numero = document.querySelector('.registrar_mostrar');
const vendedor_opciones = document.querySelectorAll('.vendedor_opciones');

const materiales_textarea = document.getElementById("element_2");
// const agregar_item = document.querySelectorAll(".agregar_mat");
const mat_li = document.querySelector(".mat_li");
const fer_li = document.querySelector(".fer_li");
// const mat_first = document.querySelector(".mat_first");
// const fer_first = document.querySelector(".fer_first");
let mat_first;
let fer_first;
let agregar_item_mat;
let agregar_item_fer;
// let mat_new = mat_li.cloneNode(true);
// let mat_fer = fer_li.cloneNode(true);
let mat_new;
let mat_fer;

let ferreteria_textarea = document.getElementById("element_6");
let pedidos_textarea = document.getElementById("element_9");
let cliente_textarea = document.getElementById("element_11");
let registrar_submit = document.getElementById("registrar_submit");

// let vendedor_brian = document.getElementById("element_3_1");
// let vendedor_sebastian = document.getElementById("element_3_2");
// let vendedor_opcion = localStorage.getItem("vendedor");

let vendedor_brian = document.querySelectorAll(".vendedor_brian");
let vendedor_sebastian = document.querySelectorAll(".vendedor_sebastian");
let vendedor_opcion = localStorage.getItem("vendedor");

let textarea_manual = document.querySelector('#element_2');
let select_auto = document.querySelector('#select_element_2');
let modo_manual = true;
let boton_modo_mat = document.querySelectorAll('.modo_mat');;
let boton_modo_fer = document.querySelectorAll('.modo_fer');;
let sibling;

let precio_multiplicado = document.querySelectorAll('.precio_multiplicado');

let cantidad = document.querySelectorAll('.cantidad');
let cada_uno = document.querySelectorAll('.cada_uno');
let cantidad_cifra;
let cada_uno_cifra;
let total_multiplicado;
let sum = 0;

let select_materiales = document.querySelectorAll('.select_materiales');
let select_ferreteria = document.querySelectorAll('.select_ferreteria');

let eliminar_boton = document.querySelectorAll('.eliminar_boton');
let delete_item;
let sum2 = 0;
let preciosAMultiplicar;
// let total_suma;
// BOTON CAMBIAR TIPO REGISTRO
const cambiar_tipo_registro = document.querySelectorAll(".cambiar_tipo_registro");
const registrar_venta_form = document.querySelector(".registrar_venta");
const registrar_pedido_form = document.querySelector(".registrar_pedido");
const forms_padre = document.querySelector(".registrar_forms");
// BOTON IMPRIMIR
const boton_imprimir = document.getElementById("imprimir_boton");
// BOTON DUPLICAR
const boton_duplicar = document.getElementById("duplicar_boton");
// DESCUENTO AUTOMATICO
const descuento = document.querySelector(".descuento_valor");


//Función checkeo registro

function checkeoRegistro() {

  typeof registro_exitoso === 'undefined' ? '' : alert("REGISTRO DE DATOS EXITOSO");

}

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
  month.forEach(element => {
    element.value = formatDate(todayNew, 'mm');

  });
  date.forEach(element => {
    element.value = formatDate(todayNew, 'dd');

  });
  year.forEach(element => {
    element.value = formatDate(todayNew, 'yy');

  });
}
// fecha.addEventListener("click", ponerFecha())

//Guardar última opción vendedor



function ponerOpcionVendedor() {
  const vendedor_opciones_venta = vendedor_opciones[0];
  const vendedor_opciones_pedido = vendedor_opciones[1];
  const vendedor_sebastian_venta = vendedor_sebastian[0];
  const vendedor_sebastian_pedido = vendedor_sebastian[1];
  const vendedor_brian_venta = vendedor_brian[0];
  const vendedor_brian_pedido = vendedor_brian[1];
  vendedor_opciones_venta.addEventListener("click", function () {

    if (vendedor_sebastian_venta.checked === true) {
      localStorage.setItem("vendedor", "sebastian");
      vendedor_sebastian_pedido.checked = true;
      // console.log("guardado seb")
    } else {
      localStorage.setItem("vendedor", "brian");
      vendedor_brian_pedido.checked = true;

      // console.log("guardado b")

    }
  })
  vendedor_opciones_pedido.addEventListener("click", function () {
    
    if (vendedor_sebastian_pedido.checked === true) {
      localStorage.setItem("vendedor", "sebastian");
      vendedor_sebastian_venta.checked = true;
      // console.log("guardado seb")
    } else {
      localStorage.setItem("vendedor", "brian");
      vendedor_brian_venta.checked = true;

      // console.log("guardado b")

    }
  })

  if (vendedor_opcion == "sebastian") {
    vendedor_brian.forEach(element => {
      element.checked = false;
    });
    vendedor_sebastian.forEach(element => {
      element.checked = true;
    });
    // vendedor_brian.checked = false;
    // vendedor_sebastian.checked = true;
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
// const agregarFuncionMat = () => {
//   mat_new = mat_li.cloneNode(true);
//   mat_first.parentNode.insertBefore(mat_new, mat_first.nextSibling);
//   mat_new.classList.remove('mat_li');
//   boton_modo_mat = document.querySelectorAll('.modo_mat');
//   cantidad = document.querySelectorAll('.cantidad');
//   cada_uno = document.querySelectorAll('.cada_uno');
//   precio_multiplicado = document.querySelectorAll('.precio_multiplicado');
//   select_materiales = document.querySelectorAll('.select_materiales');

//   funcionModoMat();
//   funcionMultiplicar();
//   funcionSumar();
//   precioAuto();
//   eliminarItem();
// }
const agregarFuncionMat = () => {
  agregar_item_mat = document.querySelectorAll('.agregar_mat');
  agregar_item_mat.forEach(element => {
    if (element.parentElement.parentElement.classList.contains('mat_li') == false && element.classList.contains('tiene_funcion_AgregarItem') == false) {
      element.classList.add('tiene_funcion_AgregarItem');
      element.addEventListener('click', function (e) {
        mat_new = mat_li.cloneNode(true);
        mat_first = e.target.parentElement.parentElement;
        mat_first.parentNode.insertBefore(mat_new, mat_first.nextSibling);
        mat_new.classList.remove('mat_li');
        funcionCambiarHeight();
        funcionModoMat();
        funcionMultiplicar();
        funcionSumar();
        precioAuto();
        eliminarItem();
      })

    }
  });

}
const agregarFuncionFer = () => {
  agregar_item_fer = document.querySelectorAll('.agregar_fer');
  agregar_item_fer.forEach(element => {
    if (element.parentElement.parentElement.classList.contains('fer_li') == false && element.classList.contains('tiene_funcion_AgregarItem') == false) {
      element.classList.add('tiene_funcion_AgregarItem');
      element.addEventListener('click', function (e) {
        fer_new = fer_li.cloneNode(true);
        fer_first = e.target.parentElement.parentElement;
        fer_first.parentNode.insertBefore(fer_new, fer_first.nextSibling);
        fer_new.classList.remove('fer_li');
        // cantidad = document.querySelectorAll('.cantidad');
        // cada_uno = document.querySelectorAll('.cada_uno');
        funcionCambiarHeight();
        funcionModoFer();
        funcionMultiplicar();
        funcionSumar();
        eliminarItem();
      })
    };
  })

}

//Eliminar Item

const eliminarItem = () => {
  eliminar_boton = document.querySelectorAll('.eliminar_boton');

  eliminar_boton.forEach(element => {
    if (((element.parentElement.parentElement.classList.contains('.mat_li') == false) || (element.parentElement.parentElement.classList.contains('.fer_li') == false)) && element.classList.contains('.tiene_funcion_eliminarItem') == false) {

      element.classList.add('tiene_funcion_eliminarItem');
      element.addEventListener('click', function (e) {

        e.preventDefault();
        e.target.closest('li').classList.add("eliminar_item");
        delete_item = document.querySelector(".eliminar_item");
        if (delete_item != null) {
          total_multiplicado = e.target.closest('li').querySelector('.precio_multiplicado').value = 0;
          sumarTotal();
          delete_item.parentElement.removeChild(delete_item);
        }
        funcionCambiarHeight();

      })

    }

  });
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


//Precio automático

function precioAuto() {
  select_materiales = document.querySelectorAll('.select_materiales');
  select_ferreteria = document.querySelectorAll('.select_ferreteria');

  select_materiales.forEach(element => {
    if (((element.parentElement.parentElement.classList.contains('mat_li') == false) || (element.parentElement.parentElement.classList.contains('fer_li'))) && element.classList.contains('..tiene_funcion_precio_auto') == false) {
      element.classList.add('.tiene_funcion_precio_auto');
      element.addEventListener('change', function (e) {
        const [option] = e.target.selectedOptions;
        const textarea_pedido = e.target.closest('li').querySelector('textarea')
        const li_pedido = e.target.closest('li');

        if (li_pedido.classList.contains('materiales-ferreteria') == true) {
          const modo_pedido_boton = e.target.closest('li').querySelector('.tiene_funcion_modo')
          textarea_pedido.textContent = option.value;
          modo_pedido_boton.click();
          textarea_pedido.focus();

        }
        // const option_clone = option_base.cloneNode(true);
        // option_base.parentNode.insertBefore(option_clone, option_base.nextSibling);
        (option.dataset.precio != undefined) ? cada_uno = e.target.closest('li').querySelector('.registrar_importe .cada_uno').value = option.dataset.precio : '';
      }
      )
    }
  });
  select_ferreteria.forEach(element => {
    if (((element.parentElement.parentElement.classList.contains('mat_li') == false) || (element.parentElement.parentElement.classList.contains('fer_li'))) && element.classList.contains('..tiene_funcion_precio_auto') == false) {
      element.classList.add('.tiene_funcion_precio_auto');
      element.addEventListener('change', function (e) {
        const [option] = e.target.selectedOptions;
        const textarea_pedido = e.target.closest('li').querySelector('textarea')
        const li_pedido = e.target.closest('li');

        if (li_pedido.classList.contains('materiales-ferreteria') == true) {
          const modo_pedido_boton = e.target.closest('li').querySelector('.tiene_funcion_modo')
          textarea_pedido.textContent = option.value;

          modo_pedido_boton.click();
          textarea_pedido.focus();

        }
        // const option_clone = option_base.cloneNode(true);
        // option_base.parentNode.insertBefore(option_clone, option_base.nextSibling);
        (option.dataset.precio != undefined) ? cada_uno = e.target.closest('li').querySelector('.registrar_importe .cada_uno').value = option.dataset.precio : '';
      }
      )
    }
  });
}


//Sumar Total y funcion Sumar


function funcionSumar() {
  precio_multiplicado = document.querySelectorAll('.precio_multiplicado');

  precio_multiplicado.forEach(element => {
    if (((element.parentElement.parentElement.classList.contains('mat_li') == false) || (element.parentElement.parentElement.classList.contains('fer_li')) && element.classList.contains('.tiene_funcion_sumar') == false)) {
      element.classList.add('tiene_funcion_sumar');
      element.addEventListener('focusout', function () {
        sumarTotal();
      })
    }
  });
}
function sumarTotal(e) {
  const descuento_valor = document.querySelector(".descuento_valor").value;
  if (e != undefined) {
    preciosAMultiplicar = e.target.closest('form').querySelectorAll('.precio_multiplicado');
    let total_suma = e.target.closest('form').querySelector('.total_suma');
    let li_padre = e.target.closest('li');
    sum = 0;
    for (let i = 0; i < preciosAMultiplicar.length; i++) {
      sum += Number(preciosAMultiplicar[i].value);
    }
    sum -= descuento_valor;
    total_suma.value = sum;
    total_suma.value != 0 ? li_padre.classList.remove('no-imprimir') : li_padre.classList.add('no-imprimir');
  } else {
    let total_suma = document.querySelectorAll(".total_suma")[1];
    let calculo = sum - descuento_valor;
    total_suma.value = calculo;
  }
}

//Multiplicar cantidad x unidad

function funcionMultiplicar() {
  cada_uno = document.querySelectorAll('.cada_uno');
  cantidad = document.querySelectorAll('.cantidad');

  cada_uno.forEach(element => {
    if (((element.parentElement.parentElement.classList.contains('mat_li') == false) || (element.parentElement.parentElement.classList.contains('fer_li')) && element.classList.contains('.tiene_funcion_multiplicar') == false)) {
      element.classList.add('tiene_funcion_multiplicar');

      ['focusout', 'keyup'].forEach(evt =>
        element.addEventListener(evt, function (e) {
          e.preventDefault();
          cada_uno = e.target.value;
          cantidad_cifra = e.target.closest('li').querySelector('.cantidad input').value;
          total_multiplicado = e.target.closest('li').querySelector('.precio_multiplicado');
          cantidad_cifra == "" || cantidad_cifra == 0 ? total_multiplicado.value = cada_uno : total_multiplicado.value = (cantidad_cifra * cada_uno);

          sumarTotal(e);

        }, false)
      );

    }

  });
  cantidad.forEach(element => {
    if (((element.parentElement.parentElement.classList.contains('mat_li') == false) || (element.parentElement.parentElement.classList.contains('fer_li')) && element.classList.contains('.tiene_funcion_multiplicar') == false)) {
      element.classList.add('tiene_funcion_multiplicar');
      element.addEventListener('keyup', function (e) {
        e.preventDefault();
        cantidad_cifra = e.target.value;
        cada_uno = e.target.closest('li').querySelector('.registrar_importe .cada_uno').value;
        e.target.closest('li').querySelector('.precio_multiplicado').value = (cantidad_cifra * cada_uno);;

        sumarTotal(e);

      })


    }
  });
}

//Descuento automático

funcionDescuentoAuto = () => {
  descuento.addEventListener('keyup', function () {
    // let total_suma = document.querySelector('.total_suma');
    sumarTotal();
  })

}


//Cambiar modo

function funcionModoMat() {
  boton_modo_mat = document.querySelectorAll('.modo_mat');
  boton_modo_mat.forEach(element => {

    if (element.parentElement.parentElement.classList.contains('mat_li') == false && element.classList.contains('tiene_funcion_modo') == false) {
      element.classList.add('tiene_funcion_modo');
      element.addEventListener('click', function (e) {
        e.preventDefault();

        conseguirSibling(e.target, '#element_2');

        if (sibling.getAttribute('name') == '') {
          sibling.setAttribute('name', 'element_2[]')
          sibling.classList.toggle('ocultar_modo')
        } else {
          sibling.classList.add('ocultar_modo')
          sibling.setAttribute('name', '')
        }
        conseguirSibling(e.target, '#select_element_2')
        if (sibling.getAttribute('name') == '') {
          sibling.setAttribute('name', 'element_2[]')
          sibling.classList.toggle('ocultar_modo')
          let boton_modo = e.target.closest('li').querySelector('.tiene_funcion_modo')
          boton_modo.textContent = 'M';
          boton_modo.classList.toggle('modo_auto');
        } else {
          sibling.setAttribute('name', '');
          sibling.classList.add('ocultar_modo')
          let boton_modo = e.target.closest('li').querySelector('.tiene_funcion_modo')
          boton_modo.textContent = 'A';
          boton_modo.classList.toggle('modo_auto');
        }

      })
    }

  });
}

function funcionModoFer() {
  boton_modo_fer = document.querySelectorAll('.modo_fer');

  boton_modo_fer.forEach(element => {

    if (element.parentElement.parentElement.classList.contains('fer_li') == false && element.classList.contains('tiene_funcion_modo') == false) {
      element.classList.add('tiene_funcion_modo');
      element.addEventListener('click', function (e) {
        e.preventDefault();

        conseguirSibling(e.target, '#element_6');

        if (sibling.getAttribute('name') == '') {
          sibling.setAttribute('name', 'element_6[]')
          sibling.classList.toggle('ocultar_modo')

        } else {
          sibling.setAttribute('name', '')
          sibling.classList.add('ocultar_modo')

        }
        conseguirSibling(e.target, '#select_element_6')
        if (sibling.getAttribute('name') == '') {
          sibling.setAttribute('name', 'element_6[]')
          sibling.classList.toggle('ocultar_modo')
          let boton_modo = e.target.closest('li').querySelector('.tiene_funcion_modo')
          boton_modo.textContent = 'M';
          boton_modo.classList.toggle('modo_auto');

        } else {
          sibling.setAttribute('name', '')
          sibling.classList.add('ocultar_modo')
          let boton_modo = e.target.closest('li').querySelector('.tiene_funcion_modo')
          boton_modo.textContent = 'A';
          boton_modo.classList.toggle('modo_auto');

        }

      })
    }

  });
}

//Cambiar tipo de registro

function cambiarTipoRegistro() {
  cambiar_tipo_registro.forEach(element => {
    element.addEventListener("click", (e) => {
      e.preventDefault;
      // forms_padre.style.height="1200px";
      let pedidos__form = document.querySelectorAll('.registrar_pedido');
      let duplicado_form = pedidos__form[1];
      if (duplicado_form != undefined) {
        duplicado_form.remove();
      }
      forms_padre.classList.toggle('registrar_forms-pedido');
      registrar_pedido_form.classList.toggle('pedido_config');
      registrar_pedido_form.classList.toggle('ocultar_modo');
      registrar_venta_form.classList.toggle('ocultar_modo');

    })
  });
}

//Cambiar tipo de hoja

const ul_height = document.querySelector('.ul_pedidos')

const funcionCambiarHeight = () => {
  const ul_height = document.querySelector('.ul_pedidos')

  if (ul_height.offsetHeight <= '676') {
    registrar_pedido_form.style.height = '700px'
  } else {
    registrar_pedido_form.style.height = '1450px'

  }
}

//Imprimir

const funcionImprimir = () => {
  boton_imprimir.addEventListener("click", (e) => {
    e.preventDefault;
    window.print();
  })

}

//Duplicar

const funcionDuplicar = () => {
  boton_duplicar.addEventListener("click", (e) => {
    e.preventDefault;
    const form_pedidos = document.querySelectorAll('.registrar_pedido');
    const form_pedidos_original = form_pedidos[0];
    const form_pedidos_replicado = form_pedidos[1];
    form_pedidos_replicado != undefined ? form_pedidos_replicado.remove() : "";

    const replicar = form_pedidos_original.cloneNode(true);
    replicar.querySelector(".registrar_numero-mostrar").remove();
    replicar.querySelector(".registrar_submit").remove();
    replicar.querySelector(".pedido_form_li_vendedor").remove();
    form_pedidos_original.parentNode.insertBefore(replicar, form_pedidos_original.nextSibling)
  })

}

//Usar funciones al iniciar

window.onload = function () {
  ponerFecha();
  ponerOpcionVendedor();
  funcionModoMat();
  funcionModoFer();
  funcionMultiplicar();
  funcionSumar();
  checkeoRegistro();
  precioAuto();
  eliminarItem();
  cambiarTipoRegistro();
  funcionImprimir();
  agregarFuncionMat();
  agregarFuncionFer();
  funcionDuplicar();
  funcionDescuentoAuto();
}

