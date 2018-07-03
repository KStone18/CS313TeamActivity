$(document).ready(function (){
    
//    $('#movieName').on('change', function() {
// 	var name = $("#movieName").text(); // or val()?
// 	$.ajax({    	                 
//       	url: "http://www.omdbapi.com/?apikey=86436781&t=" + name,              
//   		type: "get",
//       success: function (res) {
//           $('#outputMovies').text(res.title);
//         },
//         complete: function () {
//         	// alert("complete");
//         },
//         fail: function(xhr, textStatus, errorThrown){
//        alert('request failed: ' + errorThrown);
//        }           
//    });
// })

$(":button").click(function() {
            console.log("clicked");
        });  

$('#movieName').change(function() {
 var name = $("#movieName").val(); // or val()?
 console.log(name);
 $.ajax({                       
     url: "http://www.omdbapi.com/?apikey=86436781&s=" + name,              
     type: "get",
      success: function (res) {
        console.log(res);
        var titles = "";
        for (var i = 0; i < res.Search.length; i++) {
          console.log(res.Search[i].Title);
          titles = titles + res.Search[i].Title + "\n";
          $('#outputMovies').append("<span>" + res.Search[i].Title + "</span>" + "<button class='details' id=" + res.Search[i].imdbID + ">Details</button><br>");

        }
        // console.log(res.title)
          // $('#outputMovies').append("<p>" + );
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

