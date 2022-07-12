// DOM Elements

const darkButton = document.getElementById('dark');
const lightButton = document.getElementById('light');
const solarButton = document.getElementById('solar');
const body = document.body;
const header = document.getElementById('header');


// // Apply the cached theme on reload

const theme = localStorage.getItem('theme');
const isSolar = localStorage.getItem('isSolar');

if (theme) {
  header.classList.add(theme);
  isSolar && header.classList.add('solar');
}

// Button Event Handlers

darkButton.onclick = () => {
  header.classList.replace('light', 'dark');
  localStorage.setItem('theme', 'dark');
};

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