
var list = document.createElement ('select');
var valTab = ['Employe','Direction','Service'];
 var option = new Array;
        for(i=0; i < valTab.length; i++){
            option[i] = document.createElement('option');
            option[i].innerHTML = valTab[i];
            list.appendChild(option[i]);
        }
var rech = document.getElementById('rech');
rech.appendChild(list);

list.addEventListener('change', function() {
    // On affiche le contenu de l'élément <option> ciblé par la propriété selectedIndex
        var element = list.options[list.selectedIndex].innerHTML;
        var last = document.getElementById('rech').lastChild.innerHTML;
        
        switch (element) {
            case 'Service':
                 var valTab = ['Nom du service','Numero du service'];
                break;
            case 'Direction':
                 var valTab = ['Nom de de la direction','Numero de la direction'];
                break;
            case 'Employe':
                    var valTab = ['Matricule de l\'employé','nom de l\'employé','Fonction de l\'employé' ];
                break;
        
            default:
                break;
        }
        
        var liste2 = document.createElement('select');
        var option = new Array;
        for(i=0; i <= valTab.length; i++){
            option[i] = document.createElement('option');
            option[i].innerHTML = valTab[i];
            liste2.appendChild(option[i]);
        }
        rech.appendChild(liste2);
}, true);
