function validateUsername(str) {
    if (str == "") {
        document.getElementById("txtError").innerHTML = "";
        return;
    } else { 
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("txtError").innerHTML = xmlhttp.responseText;
            }
        };
        xmlhttp.open("GET","validateUser.php?txtUserName="+str,true);
        xmlhttp.send();
    }
}