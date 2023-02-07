$(document).ready(function() {
  // Mostra la modal quando viene cliccato una box
  var modal = document.getElementById("voteModal");
  $('.box').click(function() {
    // Recupera i dati dell'artista dal database tramite una chiamata AJAX
    var artistId = $(this).data('id');
    $.ajax({
      url: 'artist-data-modal.php',
      data: {id: artistId},
      type: 'POST',
      success: function(data) {
        // Popola la modal con i dettagli dell'artista
        $('#artistName').text(data.name);
        $('#workTitle').text(data.title);
        $('#artistImage').attr('src', data.link);
        // Mostra la modal
        $('#voteModal').modal('show');
      }
    });
  });

  // Registra il voto quando viene cliccato il pulsante di conferma nella modal
  $('#confirmVoteBtn').click(function() {
    // Recupera il voto selezionato dalla scala lineare
    var vote = $('input[name=vote]:checked').val();
    // Invia il voto al database tramite una chiamata AJAX
    $.ajax({
      url: 'register_vote.php',
      data: {vote: vote, id: artistId},
      type: 'POST',
      success: function(data) {
        // Nasconde la modal
        $('#voteModal').modal('hide');
        // Aggiorna la box con il nuovo voto
        $('#artist-' + artistId + ' .vote-count').text(data.new_vote_count);
      }
    });
  });
});
