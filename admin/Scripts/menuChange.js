$(document).ready(function () {
        $('ul.menu-vertical > li ').click(function () {
           
            $('ul.menu-vertical > li').removeClass('active');
            $(this).addClass('active');                
        });  
        // e.preventDefault();          
    });


//$(document).ready(changeActive);
