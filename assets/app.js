/*
 * Welcome to your app's main JavaScript file!
 *
 * We recommend including the built version of this JavaScript file
 * (and its CSS file) in your base layout (base.html.twig).
 */

// any CSS you import will output into a single css file (app.css in this case)
import './styles/app.scss';
const searchIcon = document.getElementById('search-icon');
const searchInput = document.getElementById('search-input');
const searchIconPhone = document.getElementById('search-icon-phone');
const searchInputPhone = document.getElementById('search-input-phone');

searchIcon.addEventListener('click', () => {
  searchInput.classList.toggle('show');
  searchInput.focus();
});
searchIconPhone.addEventListener('click', () => {
    searchInputPhone.classList.toggle('show');
    searchInputPhone.focus();
  });


