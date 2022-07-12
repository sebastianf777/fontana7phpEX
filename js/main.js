// DOM Elements
const header = document.getElementById('header');
const body = document.body;
const change_button = document.getElementById('change');
const img_change = document.getElementById('img_change')
// const darkButton = document.getElementById('dark');
// const lightButton = document.getElementById('light');
// const solarButton = document.getElementById('solar');


// // Apply the cached theme on reload

let theme = localStorage.getItem('theme');
let darkmode = true;
// const isSolar = localStorage.getItem('isSolar');

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
// change_button.onclick = () => {
//   body.classList.replace('dark', 'light');

//   localStorage.setItem('theme', 'light');
// };
// darkButton.onclick = () => {
//   body.classList.replace('light', 'dark');
//   localStorage.setItem('theme', 'dark');
// };

// lightButton.onclick = () => {
//   header.classList.replace('dark', 'light');

//   localStorage.setItem('theme', 'light');
// };

// solarButton.onclick = () => {

//   if (header.classList.contains('solar')) {
    
//     header.classList.remove('solar');
//     solarButton.style.cssText = `
//       --bg-solar: var(--yellow);
//     `

//     solarButton.innerText = 'solarize';

//     localStorage.removeItem('isSolar');

//   } else {

//     solarButton.style.cssText = `
//       --bg-solar: white;
//     `

//     header.classList.add('solar');
//     solarButton.innerText = 'normalize';

//     localStorage.setItem('isSolar', true);
//   }
// };