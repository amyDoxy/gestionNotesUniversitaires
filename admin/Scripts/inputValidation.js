//code d'Alex Filipovici posté le 2 Juin 2013 Accessible sur: http://stackoverflow.com/questions/16886428/how-to-change-default-please-fill-out-this-field-in-two-field
$(document).ready(function () {
    var elements = document.getElementsByTagName("INPUT");
    for (var i = 0; i < elements.length; i++) {
        elements[i].oninvalid = function (e) {
            e.target.setCustomValidity("");
            if (!e.target.validity.valid) {
                switch (e.target.id) {
                    case "username": 
                        e.target.setCustomValidity("Vous n'avez pas entré un nom d'utilisateur!");
                        break;
                    case "motDePasse":
                        e.target.setCustomValidity("Veuillez inserer un mot de passe!");
                        break;
                }
            }
        };
        elements[i].oninput = function (e) {
            e.target.setCustomValidity("");
        };
    }
})