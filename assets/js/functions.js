   window.onload = function() {
           
           
         /*  if(location.hash.substr(1) == 'P'){
           proyectoFnc();
           }else if(location.hash.substr(1) == 'G'){
           grupoFnc();
           }else if(location.hash.substr(1) == 'C'){
           configuracionFnc();
           }
           
           var btnP = document.getElementById('btnP');
           var btnG = document.getElementById('btnG');
           var btnC = document.getElementById('btnC');
   
           btnP.onclick = proyectoFnc;
           btnG.onclick = grupoFnc;
           btnC.onclick = configuracionFnc;*/

    }
    
    /*function proyectoFnc() {
       document.getElementById("proyectos").style.display= "inline";
       document.getElementById("grupos").style.display= "none";
       document.getElementById("configuraciones").style.display= "none"; 
       w3_close();
    }
    function configuracionFnc() {
       document.getElementById("proyectos").style.display= "none";
       document.getElementById("grupos").style.display= "none";
       document.getElementById("configuraciones").style.display= "inline"; 
       w3_close();
    }
    function grupoFnc() {
       document.getElementById("proyectos").style.display= "none";
       document.getElementById("grupos").style.display= "inline";
       document.getElementById("configuraciones").style.display= "none"; 
       w3_close();
    } */
   // Get the Sidebar
   var mySidebar = document.getElementById("mySidebar");
   
   // Get the DIV with overlay effect
   var overlayBg = document.getElementById("myOverlay");
   
   // Toggle between showing and hiding the sidebar, and add overlay effect
   function w3_open() {
       if (mySidebar.style.display === 'block') {
           mySidebar.style.display = 'none';
           overlayBg.style.display = "none";
       } else {
           mySidebar.style.display = 'block';
           overlayBg.style.display = "block";
       }
   }
   
function enableElement() {
  document.getElementById('uploadbtn').disabled = false;
}
    function claveview() {
        var x = document.getElementById("pass");
        if (x.type === "password") {
            x.type = "text";
        } else {
            x.type = "password";
        }
        var y = document.getElementById("passconf");
        if (y.type === "password") {
            y.type = "text";
        } else {
            y.type = "password";
        }
    }
   function filtrar() {
   // Declare variables 
   var input, filter, table, tr, td, i;
   input = document.getElementById("myInput");
   filter = input.value.toUpperCase();
   table = document.getElementById("myTable");
   tr = table.getElementsByTagName("tr");
   
   // Loop through all table rows, and hide those who don't match the search query
   for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[1];
    if (td) {
      if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    } 
   }
   }
   function filtrar2() {
   // Declare variables 
   var input, filter, table, tr, td, i;
   input = document.getElementById("myInput2");
   filter = input.value.toUpperCase();
   table = document.getElementById("myTable2");
   tr = table.getElementsByTagName("tr");
   
   // Loop through all table rows, and hide those who don't match the search query
   for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[0];
    if (td) {
      if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    } 
   }
   }
   // Close the sidebar with the close button
   function w3_close() {
       mySidebar.style.display = "none";
       overlayBg.style.display = "none";
   }