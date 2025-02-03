<?php

require '../LIBRERIA_APP/templates/header.php';

?>

<?php
try {
    $db = new PDO('mysql:host=localhost;dbname=libreria', 'root', '', [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ
    ]);
} catch (Exception $e) {
    die("Errore di connessione al database: " . $e->getMessage());
}



if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $titolo = $_POST['titolo'];
    $prezzo = $_POST['prezzo'];
    if (!empty($titolo) && !empty($prezzo)) {
        try {
            $query = "UPDATE libreria.listalibri SET prezzo = :prezzo WHERE titolo = :titolo";
            $stm = $db->prepare($query);
            $stm->bindParam(':titolo', $titolo);
            $stm->bindParam(':prezzo', $prezzo);

            $stm->execute();
            echo "<script>alert('prezzo del libro aggiornato con successo!');</script>";

        } catch (Exception $e) {
            echo "<script>alert('Errore: " . $e->getMessage() . "');</script>";
        }
    } else {
        echo "<script>alert('Errore nei dati:');</script>";
    }
}

?>


    <div class="container mt-5">
        <h2>Aggiorna il Prezzo di un Libro</h2>
        <form action="aggiornaPrezzo_form.php" method="post">
            <div class="mb-3">
                <label for="bookName" class="form-label">Nome del Libro</label>
                <input type="text" class="form-control" id="titolo" name="titolo" placeholder="Inserisci il nome del libro" required>
            </div>
            <div class="mb-3">
                <label for="newPrice" class="form-label">Nuovo Prezzo</label>
                <input type="number" class="form-control" id="newPrice" name="prezzo" placeholder="Inserisci il nuovo prezzo" required>
            </div>
            <button type="submit" class="btn btn-success">Aggiorna Prezzo</button>
        </form>
    </div>

<?php

require '../LIBRERIA_APP/templates/footer.php';

?>