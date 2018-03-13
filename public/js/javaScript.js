 
  
  window.onload = function () {
    window.setInterval("killerSession()", 3600000);
 
     
   }

 function killerSession() {
   
  var x = getCookie("username3");
  var d = new Date();
  var fecha1 = d.setTime(d.getTime());
  var fecha2 = x;
   
   var clave = getCookie("username3");
     if (clave != ""){
      if (fecha1 >= fecha2) {
        //setTimeout(function () {
          alert("se cerrara la sesion...");
      // }, 10000);
      delete_cookie('username3');
      window.open('core/bin/cerrarsesion.php','_top');
      }
    }
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

 var delete_cookie = function (name) {
   document.cookie = name + '=;expires=Thu, 01 Jan 1970 00:00:01 GMT;';
 };
 
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
