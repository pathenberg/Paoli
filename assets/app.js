/*
 * Welcome to your app's main JavaScript file!
 *
 * We recommend including the built version of this JavaScript file
 * (and its CSS file) in your base layout (base.html.twig).
 */

// any CSS you import will output into a single css file (app.css in this case)
import './styles/app.scss';

var $ = require("jquery");

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


    $(document).ready(function() {
        // Cibler le bouton du menu burger
        var $menuToggleButton = $("#menu-toggle-button");

        // Cibler la barre de navigation du menu burger
        var $menuNav = $("#navbarNav");

        // Ajouter un gestionnaire d'événements de clic au bouton du menu burger
        $menuToggleButton.click(function() {
            // Basculez la classe "show" pour afficher ou masquer le menu burger
            $menuNav.toggleClass("show");
        });
    });

    $("#search-content").on('keydown', function(e) {
      if(e.key === "Enter" || e.keyCode === 13) {
          e.preventDefault();// j'empêche le formulaire de se soumettre
  
          $.ajax({
              url:'/search',
              data: {
                  "search": $("#search-content").val()
              },
              dataType: 'json',
              success: function (data) // obj json => un array d'objet
              {
                  let contentHtml = "";
  
                  contentHtml += "<h1 class='mb-5'> Nos produits liés à la recherche ' " + $("#search-content").val() + " ' </h1>";
  
                  for(let i = 0; i < data.length; i++) {
                      contentHtml += "<div class='d-flex my-3'>"+
                              "<a class='d-flex text-decoration-none text-reset' href='/produit/" + data[i].id + "'>"+
                                  "<img src='/images/produits" + data[i].picture + "'>"+
                                  "<div class='d-flex flex-column ps-2'>"+   
                                      "<h2>" + data[i].titre  + "</h2>"+
                                      "<p>" + data[i].description  + " </p>"+
                                  "</div>"+
                              "</a>"+
                          "</div>";
                  }
                  
                  // dans la classe inner-content
                  // met le contenu
                  $(".inner-content").html(contentHtml);
                  
  
              }
          });
      }
  });
    




