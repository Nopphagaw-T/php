<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<button onclick="load_data()">Load Data</button><br>
year:<br>
<select id="sel_year" onchange="load_title()">
  <option value="">N\A</option>
</select><br>
movie title:<br>
<select id="Movie_Title" onchange="load_movie_content()">
  <option value="">N\A</option>
</select><br>
<div id="out" style="width:50px;"></div>
<script>
    let jSonEx;
    function load_data(){
        jSonEx = <?= file_get_contents("movies.json") ?>;
        var movie_year = new Set();
        var doc = document.getElementById("sel_year");
        for(i = 0;i<jSonEx.length; i++) movie_year.add(jSonEx[i].year);
        const ref_year = movie_year.values(); 
        for(y=0; y<movie_year.size;y++){
            var option = document.createElement("option");
            option.text = ref_year.next().value;
            doc.add(option);
        }
        return jSonEx;
    }
    function load_title(){
        var doc = document.getElementById("Movie_Title");
        var y   = document.getElementById("sel_year");
        doc.innerHTML = "";
        for(i = 0;i<jSonEx.length; i++){
            if(jSonEx[i].year==y.value){
                var option = document.createElement("option");
                option.text = jSonEx[i].title;
                doc.add(option);
            }
        }
    }
    function load_movie_content(){
        var doc = document.getElementById("out");
        var txt = document.createElement("input");
        txt.value = "Movie Title";
        doc.appendChild(txt);
        var txt = document.createElement("TextArea");
        txt.value = "Movie Title";
        doc.appendChild(txt);
    }
</script>

</body>
</html>