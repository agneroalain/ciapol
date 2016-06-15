
function selecteur(){
      var select1 = document.getElementById('select1');
      var selectValue2 = new Array;
      var li = new Array;
      switch(select1.value){
          case 'Employe': 
            selectValue2 = ['Nom','Prenom','Age','Fonction'];
          break;
          case 'Service': 
            selectValue2 = ['Nom du service','Direction du service'];
          break;
          default:
          break;
      }
      var select2 = document.createElement('select');
      for(i=0; i<= selectValue2.length; i++){
          li[i] = document.createElement('li');
      }
        select2.appendChild(li);
        var rech = document.getElementById('rech');
        rech.appendChild(select2);
}
