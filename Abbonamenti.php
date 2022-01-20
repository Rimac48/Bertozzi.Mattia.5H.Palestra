<!DOCTYPE html>
<!-- Created By CodingLab - www.codinglabweb.com -->
<html lang="en" dir="ltr">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Index di Registrazione</title>

    <link rel="stylesheet" href="Css/styleRegistrazione.css">
    <script src="Script/scriptSottoscrivi.js"> </script>

</head>
<body>
  <div class="container">
    <div class="title">Crea il TUO abbonamento!</div>
    <div class="content">
      <form id="FormDati" name="FormDati" method="POST" action="SottoscriviAbb.php">

            <div class="user-details">
                <div class="input-box">
                    <span class="details">Data di Inizio</span>
                    <input type="text" name="DataInizio" class="" placeholder="gg/mm/aaaa" required>
                </div>
                <div class="input-box">
                    <span class="details">Data di Fine</span>
                    <input type="text" name="DataFine" class="" placeholder="gg/mm/aaaa" required>
                </div>

                <div class="input-box">
                    <div class="Sesso-details">

                        <input type="checkbox" name="Servizi[]" value="Spa">
                        <label for="Maschio">Spa + €50</label><br>
                        <input type="checkbox" name="Servizi[]" value="Sala Pesi">
                        <label for="Maschio">Sala Pesi + €19</label><br>
                        <input type="checkbox" name="Servizi[]" value="Box">
                        <label for="Maschio">Box + €25</label><br>
                        <input type="checkbox" name="Servizi[]" value="Corso Spinning">
                        <label for="Maschio">Corso Spinning + €35</label><br>
                        
                    </div>
                </div>

            </div>

        <div class="button">
          <input value="Iscriviti" onclick="Sottoscrivi()">
        </div>

      </form>
    </div>
  </div>

</body>
</html>

