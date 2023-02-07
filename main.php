<html>
  <head>
    <meta charset="utf-8">
    <title>Sistema di votazione</title>
    <!-- Aggiungi qui il tuo CSS e Bootstrap per rendere la griglia più bella -->
    <!-- Include the jQuery library -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js" integrity="sha512-STof4xm1wgkfm7heWqFJVn58Hm3EtS31XFaagaa8VMReCXAkQnJZ+jEy8PCC/iT18dFy95WcExNHFTqLyp72eQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fdaciuk-ajax/3.0.4/ajax.min.js" integrity="sha512-AqbTkTQdemdNwjOwKcVUbddaYmLSh8AAG3InFrUkLkJy2oUEIyICfZfUm6RfNCBIn2Ac5ruSV273IkddcSpi6Q==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<!-- Include the Ajax library -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-ajax/3.1.1/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>     
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>    
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"/>
    <link rel="stylesheet" href="style.css">
  </head>
  <body>
    <div class="container">
      <h1>Elenco delle opere musicali</h1>
      <div class="row">
        <!-- Inizio del ciclo che mostra un box per ogni artista -->
        <?php
          include 'get-artist-data.php';
            ?>
      </div>
    </div>
    <!-- Modal HTML -->
      <div id="voteModal" class="modal fade">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Vota l'opera</h4>
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <div class="modal-body">
              <p id="artistName"></p>
              <p id="workTitle"></p>
              <a id="workLink" target="_blank"></a>
              <input type="range" min="1" max="10" id="voteValue">
              <p id="voteValueDisplay"></p>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Torna indietro</button>
              <button type="button" class="btn btn-primary" id="saveVote">Conferma</button>
            </div>
          </div>
        </div>
      </div>
    <script src=script2.js></script>
  </body>
</html>