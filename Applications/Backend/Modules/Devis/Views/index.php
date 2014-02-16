<p style="text-align: center"><a href="/admin/devis-insert.html">Ajouter d'un devis</a></p>
<input type="text" id="ref">
    <button id="action">Afficher</button><br />
    <div id="r">Entrez un nombre compris entre 1 et 10 pour afficher un proverbe chinois</div>

    <script src="../script/jquery.js"></script>
    <script>
      $(function() {
        $('#action').click(function() {
          $('#r').html('<img src="http://www.mediaforma.com/sdz/jquery/ajax-loader.gif">');
          var param = $('#ref').val();
          $('#r').load('/admin/devis-test-'+param);
        });  
      });
      </script>
