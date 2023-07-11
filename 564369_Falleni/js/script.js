function myFunction() { //menu mobile
  var x = document.getElementById("myTopnav");
  if (x.className === "main-invisible") {
    x.className += " responsive";
  } else { 
    x.className = "main-invisible";
  }
}





function aziendaPop(){//switch form login azienda user
  document.getElementById('azzbox').style.display='block';

var popup = document.getElementById('logbox');
popup.style.display = "none";

}


var popup = document.getElementById('azzbox');

window.onclick = function(event) { //Con un click scompare
    if (event.target == popup) {
        popup.style.display = "none";
    }
}











function myFunctionn() { //Visualizzazione password, cambio tipo da password a text
  var x = document.getElementById("pass");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
} 