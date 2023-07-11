function controlDate(){
      var today = new Date();
      var dd = today.getDate();
      var mm = today.getMonth()+1;
      var yyyy = today.getFullYear();
       if(dd<10){
              dd='0'+dd; //esempio: fosse 7, deve essere 07. Stesso discorso per i mesi
          } 
          if(mm<10){
              mm='0'+mm;
          } 

      today = yyyy+'-'+mm+'-'+dd; //giorno minimo, oggi
      var x = document.getElementById("consegna").min = today;
}