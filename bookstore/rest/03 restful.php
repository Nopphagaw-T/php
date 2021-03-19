<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body onload="loadDoc()" >
    <h3>Input ID&Name</h3>
    <input type="input" id="u_id"> <input type="input" id="u_name">
    <button onclick="add_new()">add new</button><hr>
    <div id="out"></div>
    <script>
    function loadDoc(){
        let xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function(){
            console.log(this.readyState);
            if(this.readyState==4 && this.status==200){
                console.log(this.responseText);
                my = JSON.parse(this.responseText);
                create_table(my);
            }
        }
        xhttp.open("GET","02 rest.php",true);
        xhttp.send();
    }

    function add_new(){
        let xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function(){
            if(this.readyState==4 && this.status ==200){
                //alert(this.responseText);
                text = JSON.parse(this.responseText);
                create_table(text);
            }
        }
        xhttp.open("POST","02 rest.php",true);
        xhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
        u_id   = document.getElementById("u_id");
        u_name = document.getElementById("u_name");
        xhttp.send("u_id="+u_id.value+"&u_name="+u_name.value);
    }

    function create_table(text){
        m = document.getElementById("out");
        m.innerHTML = "";
        text="<table border='1'>";
        for(i=0;i<my.length;i++){
            text += "<tr>";
            for(key in my[i]){
                text += "<td>"+my[i][key]+"</td>";
            }
            text += "</tr>";
        }
        text += "</table>"; 
        m.innerHTML = text;
    }
    </script>
</body>
</html>