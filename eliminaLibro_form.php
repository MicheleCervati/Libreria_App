<?php

require '../LIBRERIA_APP/templates/header.php';

?>

<?php

// Connessione al database
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
    $autore = $_POST['autore'];
    if (!empty($titolo) && !empty($autore)) {
        try {
            $query = "DELETE FROM libreria.listalibri WHERE titolo = :titolo AND autore = :autore";
            $stm = $db->prepare($query);
            $stm->bindParam(':titolo', $titolo);
            $stm->bindParam(':autore', $autore);

            $stm->execute();
            echo "<script>alert('libro eliminato con successo!');</script>";

        } catch (Exception $e) {
            echo "<script>alert('Errore: " . $e->getMessage() . "');</script>";
        }
    } else {
        echo "<script>alert('Errore nei dati:');</script>";
    }
}



?>



    <div class="container mt-5">
        <h2>Inserisci i dati del libro</h2>
        <form action="eliminaLibro_form.php" method="post">
            <div class="mb-3">
                <label for="titolo" class="form-label">Titolo del libro</label>
                <input type="text" class="form-control" id="titolo" name="titolo" required>
            </div>
            <div class="mb-3">
                <label for="autore" class="form-label">Autore</label>
                <input type="text" class="form-control" id="autore" name="autore" required>
            </div>
            <button type="submit" class="btn btn-danger">Elimina</button>
        </form>
    </div>




<?php

require '../LIBRERIA_APP/templates/footer.php';

?>