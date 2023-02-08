$(document).ready(function() {
  $(".box").click(function() {
    console.clear;
    var $clickedBox = $(this);
    console.log("clicked: "+$clickedBox);
    var artistId = $clickedBox.data('id');
    console.log("id: "+artistId);
    var artistName = $clickedBox.find('.artist-name').text();
    console.log("artistName: "+artistName);
    var artistTitle = $clickedBox.find('.title').text();
    console.log("artistTitle: "+artistTitle);
    
    if (artistName) {
      // Do something with the artist data
    } else {
      console.error('Error: Artist name not found.');
    }
    

    $.ajax({
      url: "artist-data-modal.php",
      method: "GET",
      data: { id: artistId },
      success: function(data) {
        var artistData = JSON.parse(data);
        var artistName = artistData.artist_name;
        var artistTitle = artistData.title;
        var artistLink = artistData.link;
        var artistVote = artistData.vote;
        var artistId = artistData.id;
        var artistCategory = artistData.category;
        var artistComment = artistData.comment;
        

        $("#artistName").text(artistName);
        $("#artistCategory").text(artistCategory);
        $("#artistTitle").text(artistTitle);
        $("#artistLink").text(artistLink);
        $("#voteValue").val(artistVote);
        $("#voteValueDisplay").text(artistVote);
        document.getElementById("voteModal").setAttribute("data-id",artistId);
        document.getElementById("artistComment").setAttribute("value",artistComment);
        

        

        $("#voteModal").modal("show");
        var artistId=0;
        console.log("artistIdGet: "+artistId)

      }
    });


  });
  $("#saveVote").click(function() {
    
    var vote = $("#voteValue").val();
    var artist_Id = 0;
    var artist_Id = document.getElementById("voteModal").getAttribute("data-id");
    var currentValue = document.getElementById("artistComment").value;
    document.getElementById("artistComment").addEventListener("change", function() {
      // Update the current value to the new value
      currentValue = document.getElementById("artistComment").value;
      console.log(currentValue);
    });
    




    console.log("currentValue"+currentValue);
    $.ajax({
      url: "register_vote.php",
      method: "POST",
      data: { id: artist_Id, vote: vote, comment: currentValue },
      success: function(data) {
        console.log("/////////////////");
        console.log("artistID: "+artist_Id);
        console.log("artistVote: "+vote);
        console.log("currentValue2: "+currentValue);
        $("#voteModal").modal("hide");

        var box = $(".box[data-id='" + artist_Id + "']");
        box.find(".vote").text(vote);
        box.addClass( "voted" );
        box.find(".vote").removeClass("vote-zero");
        if(vote==0){
          box.removeClass( "voted" );
          box.find(".vote").addClass("vote-zero");
        }
        document.getElementById("voteModal").removeAttribute("data-id");
        delete artist_Id;
        console.log("artistIddelete: "+artist_Id)
        
      }
    });
  });

  $("#voteValue").on("input", function() {
    $("#voteValueDisplay").text($(this).val());
  });

  $("#voteValue").change(function() {
    var vote = $(this).val();
    $("#voteValue").text(vote);
  });


   

});


