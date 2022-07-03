const fecha = document.getElementById('calendar_4')
const month = document.getElementById('element_4_1')
const date = document.getElementById('element_4_2')
const year = document.getElementById('element_4_3')
const todayNew = new Date();
let today;
let todayFiltered;
let registrar_input = document.querySelectorAll(".registrar_input_text");

registrar_input.forEach(element => {
  element.oninput = function () {
    element.style.height = "";
    /* textarea.style.height = Math.min(textarea.scrollHeight, 300) + "px"; */
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
function clickThis() {
    month.value = formatDate(todayNew, 'mm');
    date.value = formatDate(todayNew, 'dd');
    year.value = formatDate(todayNew, 'yy');
}

fecha.onclick = clickThis;

fecha.addEventListener('click', function () {
 

    setTimeout(() => {
        today = [...document.querySelectorAll('.today')];
        todayFiltered = today.filter(a => a.textContent.includes("Today"))
        for (let i = 0; i < todayFiltered.length; i++) {
            todayFiltered[i].onclick = clickThis;
          }
    }, 1000);
})
