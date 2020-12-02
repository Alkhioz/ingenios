    window.onload = function() {

        var rbtn1 = document.getElementById('rbtn1');
        var rbtn2 = document.getElementById('rbtn2');

        rbtn1.onclick = estudianteFnc;
        rbtn2.onclick = docenteFnc;

    }

    function docenteFnc() {
    document.getElementById("estudiante").style.display= "none";
    }
    function estudianteFnc() {
    document.getElementById("estudiante").style.display= "inline";
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