(function() {
    "use strict";
    window.addEventListener(
        "load",
        function() {
            // Fetch all the forms we want to apply custom Bootstrap validation styles to
            var forms = document.getElementsByClassName("needs-validation");
            // Loop over them and prevent submission
            var validation = Array.prototype.filter.call(forms, function(form) {
                form.addEventListener(
                    "submit",
                    function(event) {
                        if (form.checkValidity() === false) {
                            event.preventDefault();
                            event.stopPropagation();
                        }
                        form.classList.add("was-validated");
                    },
                    false
                );
            });
        },
        false
    );
})();

function Comma(Num) { //function to add commas to textboxes
    Num += '';
    Num = Num.replace(',', '');
    Num = Num.replace(',', '');
    Num = Num.replace(',', '');
    Num = Num.replace(',', '');
    Num = Num.replace(',', '');
    Num = Num.replace(',', '');
    x = Num.split('.');
    x1 = x[0];
    x2 = x.length > 1 ? '.' + x[1] : '';
    var rgx = /(\d+)(\d{3})/;
    while (rgx.test(x1))
        x1 = x1.replace(rgx, '$1' + ',' + '$2');
    return x1 + x2;
}

function addtocart(id) {
    $.get("views/addtocart.php?sp=" + id, function(data, status) {
        document.getElementById("demo").style.background = "red";
        document.getElementById("demo").innerHTML = data;
    });
}

// $(function() {
//
//
//
//
//   "use strict";
//
//   var nav_offset_top = $('header').height() + 50;
//     /*-------------------------------------------------------------------------------
// 	  Navbar
// 	-------------------------------------------------------------------------------*/
//
// 	//* Navbar Fixed
//     function navbarFixed(){
//         if ( $('.header_area').length ){
//             $(window).scroll(function() {
//                 var scroll = $(window).scrollTop();
//                 if (scroll >= nav_offset_top ) {
//                     $(".header_area").addClass("navbar_fixed");
//                 } else {
//                     $(".header_area").removeClass("navbar_fixed");
//                 }
//             });
//         };
//     };
//     navbarFixed();
//
//     //------- Parallax -------//
//   skrollr.init({
//     forceHeight: false
//   });
//
//
//
//   //------- mailchimp --------//
// 	function mailChimp() {
// 		$('#mc_embed_signup').find('form').ajaxChimp();
// 	}
//   mailChimp();
//
//
//   $('select').niceSelect();
//
//     /*-------------------------------------------------------------------------------
// 	  testimonial slider
// 	-------------------------------------------------------------------------------*/
//     if ($('.testimonial').length) {
//         $('.testimonial').owlCarousel({
//             loop: true,
//             margin: 30,
//             items: 5,
//             nav: false,
//             dots: true,
//             responsiveClass: true,
//             slideSpeed: 300,
//             paginationSpeed: 500,
//             responsive: {
//                 0: {
//                     items: 1
//                 }
//             }
//         })
//     }

// });