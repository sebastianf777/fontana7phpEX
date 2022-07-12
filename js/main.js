// DOM Elements
const body = document.body;
const change_button = document.getElementById('change');
const img_change = document.getElementById('img_change')

// // Apply the cached theme on reload

let theme = localStorage.getItem('theme');
let darkmode = true;

if (theme) {
  if (theme == 'light') {
  body.classList.replace('dark', 'light');
  darkmode = false;
  img_change.src = 'img/night_mode.png';
  img_change.alt = 'modo nocturno logo';
  }else{
  darkmode = true;
  }
}

// Button Event Handlers
change_button.addEventListener('click', function () {
  if (darkmode == true) {
    body.classList.replace('dark', 'light');
    localStorage.setItem('theme', 'light');
    darkmode = false;
    img_change.src = 'img/night_mode.png';
    img_change.alt = 'modo nocturno logo';
    
    }else {
    body.classList.replace('light', 'dark');
    localStorage.setItem('theme', 'dark');
    darkmode = true;
    img_change.src = 'img/sunny_mode.png';
    img_change.alt = 'modo diurno logo';
    }
})
