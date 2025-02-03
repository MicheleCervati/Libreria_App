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

// Se il form è stato inviato
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $titolo = $_POST['titolo'];
    $autore = $_POST['autore'];
    $id_genere = intval($_POST['id_genere']);
    $prezzo = floatval($_POST['prezzo']);
    $anno_pubblicazione = intval($_POST['anno_pubblicazione']);

    // Validazione di base
    if (!empty($titolo) && !empty($autore) && $id_genere > 0 && $prezzo > 0 && is_int($anno_pubblicazione)) {
        try {
            $query = "INSERT INTO libreria.listalibri (titolo, autore, id_genere, prezzo, anno_pubblicazione) VALUES (:titolo, :autore, :id_genere, :prezzo, :anno_pubblicazione)";
            $stm = $db->prepare($query);
            $stm->bindParam(':titolo', $titolo);
            $stm->bindParam(':autore', $autore);
            $stm->bindParam(':id_genere', $id_genere);
            $stm->bindParam(':prezzo', $prezzo);
            $stm->bindParam(':anno_pubblicazione', $anno_pubblicazione);

            $stm->execute();
            echo "<script>alert('libro aggiunto con successo!');</script>";

        } catch (Exception $e) {
            echo "<script>alert('Errore: " . $e->getMessage() . "');</script>";
        }
    } else {
        echo "<script>alert('Errore nei dati:');</script>";
    }
}

// Recupero dei generi
$query2 = 'SELECT * FROM libreria.generi';
$stm2 = $db->prepare($query2);
$stm2->execute();
$generi = $stm2->fetchAll();
?>

<?php require '../LIBRERIA_APP/templates/header.php'; ?>

<form action="" method="post" class="container mt-4 p-4 border rounded bg-light shadow">
    <h2 class="mb-4 text-center">Inserisci un Libro</h2>

    <div class="mb-3">
        <label for="titolo" class="form-label">Titolo:</label>
        <input type="text" name="titolo" id="titolo" class="form-control" maxlength="300" required>
    </div>

    <div class="mb-3">
        <label for="autore" class="form-label">Autore:</label>
        <input type="text" name="autore" id="autore" class="form-control" maxlength="300" required>
    </div>

    <div class="mb-3">
        <label for="id_genere" class="form-label">Genere:</label>
        <select name="id_genere" id="id_genere" class="form-select" required>
            <option value="">SELEZIONA UN GENERE</option>
            <?php foreach ($generi as $genere){
                echo '<option value="' . $genere->id_genere . '">' . $genere->nome_genere  . '</option>';
            } ?>
        </select>
    </div>

    <div class="mb-3">
        <label for="prezzo" class="form-label">Prezzo (€):</label>
        <input type="number" name="prezzo" id="prezzo" class="form-control" step="0.01" min="0.01" required>
    </div>

    <div class="mb-3">
        <label for="anno_pubblicazione" class="form-label">Anno di pubblicazione:</label>
        <input type="number" name="anno_pubblicazione" id="anno_pubblicazione" class="form-control" required>
    </div>

    <div class="text-center">
        <button type="submit" class="btn btn-primary">Inserisci Libro</button>
    </div>
</form>

<?php require '../LIBRERIA_APP/templates/footer.php'; ?>
