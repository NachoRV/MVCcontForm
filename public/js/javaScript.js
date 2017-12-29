 

   window.onload = function () {
     killerSession();   
     var x = getCookie("username3");
     alert(x);
   }

 function killerSession() {

   setTimeout(function () {
     alert("se cerrara la sesion...");
   }, 30000);
   setTimeout("window.open('core/bin/cerrarsesion.php','_top');", 30000);

 }

 function getCookie(cname) {
   var name = cname + "=";
   var ca = document.cookie.split(';');
   for (var i = 0; i < ca.length; i++) {
     var c = ca[i];
     while (c.charAt(0) == ' ') {
       c = c.substring(1);
     }
     if (c.indexOf(name) == 0) {
       return c.substring(name.length, c.length);
     }
   }
   return "";
 }

 
 
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
