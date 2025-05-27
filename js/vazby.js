$(document).ready(function() {
for (let i = 0; i < obsah.length; i++) {
    if ( i % 3 === 0 ) { 
      $('main').append('<div class="row"></div>');

    }
    var polozka = [
      '<div class="col">',
      '  <div class="card mb-5" style="width:350px; margin:auto">',
	  '  <a href="img/' + obsah[i].foto + '.jpg" target="_blank">',
      '    <img class="card-img-top" src="img/' + obsah[i].foto + '.jpg" alt="" style="max-height:262px; object-fit: contain;"></a>',
      '    <div class="card-body">',
//      '      <p class="card-title"><b>' + obsah[i].popis + '</b></p>',
      '      <p class="card-title">' + obsah[i].popis + '</p>',
      `${obsah[i].cena === '' ? "" : `<p class="card-text nowrap">Cena: ${obsah[i].cena}</p>`}`,
      '    </div>',
      '  </div>',
      '</div>'
    ].join("\n");
    $('main div.row:last').append(polozka);
  }
});

// to the top button 
document.addEventListener('DOMContentLoaded', function() {
  let backupthepage = document.getElementById("backupthepage");

  // When the user scrolls down 20px from the top of the document, show the button
    window.onscroll = function() {scrollFunction()};  

    function scrollFunction() {
      if ((document.body.scrollTop > 250) || (document.documentElement.scrollTop > 250)) {
        backupthepage.style.display = "block";
      } else {
        backupthepage.style.display = "none";
      }
    }
  });
  // When the user clicks on the button, scroll to the top of the document
  function topFunction() {
    document.body.scrollTop = 0; // For Safari
    document.documentElement.scrollTop = 0; // For Chrome, Firefox, IE and Opera
  } 