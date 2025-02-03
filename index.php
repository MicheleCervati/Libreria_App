<?php

require '../LIBRERIA_APP/templates/header.php';

?>





<div style="margin-top: 5%" class="container bg-white p-4 rounded shadow-lg">
    <h1 class="text-center mb-4">Gestione Libreria</h1>

    <div class="row g-4">
        <div class="col-md-6">
            <div class="card text-center">
                <div class="card-body">
                    <a href="createLibro_form.php" class="btn btn-primary w-100">Aggiungi Nuovo Libro</a>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="card text-center">
                <div class="card-body">
                    <a href="aggiornaPrezzo_form.php" class="btn btn-warning w-100">Aggiorna Prezzo Libro</a>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="card text-center">
                <div class="card-body">
                    <a href="eliminaLibro_form.php" class="btn btn-danger w-100">Elimina Libro</a>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="card text-center">
                <div class="card-body">
                    <a href="visualizzaLibri.php" class="btn btn-info w-100">Visualizza Tabella Libri</a>
                </div>
            </div>
        </div>
    </div>
</div>


<?php

require '../LIBRERIA_APP/templates/footer.php';

?>