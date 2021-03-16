<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
   <?php
    $jsonfile = file_get_contents("movies.json");
   ?> 
   <div>
        Year:<br>
        <select id="year" onchange="create_list_title()">
          <option value="N/A">N/A</option>
        </select><br>
        movie Name:<br>
        <select id="movie" onchange="create_movie_detail()">
          <option value="N/A">N/A</option>
        </select><br>
   </div>
   <div id="output"></div>
   <script>
       // load json file
       var jsonEx = <?php echo $jsonfile ?>;
       // create doc for shortname call
       var doc = document.getElementById("year");
       // create set of year
       var ref_year = new Set();
       for(i=0; i<jsonEx.length;i++){
            ref_year.add(jsonEx[i].year);
       }
       alert("Total year = "+ ref_year.size);
       // create year select option
        const val = ref_year.values();
        for(i=0; i<ref_year.size;i++){
           var option = document.createElement("option");
           option.text = val.next().value;
           doc.add(option);
       }
       function create_list_title(){
           var doc = document.getElementById("movie");
           alert("Create List Start");
           var option = document.createElement("option");
           option.text = "Test";
           doc.add(option);
       }

       function create_movie_detail(){
        var doc = document.getElementById("output");
        var txt = document.createElement("input");
        txt.value = "Title";
        doc.appendChild(txt);
        var txt = document.createElement("input");
        txt.value = "Year";
        doc.appendChild(txt);      
        var txt = document.createElement("TextArea");
        txt.value = "Acter& Actess List\n";
        doc.appendChild(txt);
        var txt = document.createElement("input");
        txt.value = "Genres";
        doc.appendChild(txt);

       }
   </script>
   
</body>
</html>