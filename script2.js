$(document).ready(function() {
    // Show modal when box is clicked
    var modal = document.getElementById("voteModal");
    $(".box").click(function() {
      var artistId = $(this).data("id");
      $("#voteModal").modal("show");
  
      // Retrieve artist data from database through AJAX call
      $.ajax({
        url: "get-artist-data.php",
        type: "POST",
        data: { artistId: artistId },
        success: function(data) {
            var artist = JSON.parse(data);
          console.log(artist.name);
          console.log(artist.title);
          $("#artistName").text(dartist.name);
          $("#workTitle").text(artist.title);
          $("#workLink").text(artist.link);
        }
      });
    });
  
    // Get selected vote from linear scale
    $("#voteValue").on("input", function() {
      $("#VoteValeDisplay").text($(this).val());
    });
  
    // Register vote when confirm button is clicked in modal
    $("#saveVote").click(function() {
      var artistId = $(".box.selected").data("id");
      var vote = $("#voteValue").val();
  
      // Send vote to database through AJAX call
      $.ajax({
        url: "register_vote.php",
        type: "POST",
        data: { artistId: artistId, vote: vote },
        success: function(data) {
          $("#voteModal").modal("hide");
          var updatedArtistBox = $(".box[data-id='" + artistId + "']");
          updatedArtistBox.find(".vote").text(vote);
        }
      });
    });
  });
  