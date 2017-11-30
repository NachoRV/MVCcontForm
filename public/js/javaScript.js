 function validacion(){

  var petMontaje = document.getElementById('petMontaje').value;
  

if(petMontaje !=""){

  if(petMontaje!=0){

      if(petMontaje.length != 7){

      document.getElementById('altpetMontaje').innerHTML = "Introduce el numero de la peticion de Montaje o deja lo en blanco";
      return false;

      }
    }
}


}
