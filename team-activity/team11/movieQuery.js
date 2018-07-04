$(document).ready(function (){
    


$('#movieName').change(function() {
 var name = $("#movieName").val();
 console.log(name);
 $.ajax({                       
     url: "http://www.omdbapi.com/?apikey=86436781&s=" + name,              
     type: "get",
      success: function (res) {
        console.log(res);
        var titles = "";
        var $target = $("body").find('#outputMovies');
        $("#outputMovies").empty(); // empty previous search results
        
        for (var i = 0; i < res.Search.length; i++) {
          console.log(res.Search[i].Title);
          titles = titles + "<span>" + res.Search[i].Title + "</span>" + "<button class='details' id='" + res.Search[i].imdbID + "'>Details</button><br>";
        }
        $target.append(titles); 

        },
        complete: function () {
           // alert("complete");
        },
        fail: function(xhr, textStatus, errorThrown){
       alert('request failed: ' + errorThrown);
       }           
   });
})


});



$(document).on('click', ".details", function(){
    alert($(this).attr('id'));
 
});

