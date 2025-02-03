<?php

require '../LIBRERIA_APP/templates/header.php';

try {
    // Connessione al database con PDO
    $db = new PDO(
        'mysql:host=localhost;dbname=libreria',
        'root',
        '',
        [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ]
    );

    // Query per ottenere i libri con il genere associato
    $query = 'SELECT l.titolo, l.autore, g.nome_genere, l.prezzo, l.anno_pubblicazione 
              FROM libreria.listalibri l 
              JOIN libreria.generi g ON l.id_genere = g.id_genere';

    $stm = $db->prepare($query);
    $stm->execute();
} catch (Exception $e) {
    die('Errore di connessione al database: ' . $e->getMessage());
}

?>

    <!DOCTYPE html>
    <html lang="it">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Elenco Libri</title>
        <style>
            table {
                width: 100%;
                border-collapse: collapse;
            }
            th, td {
                border: 1px solid black;
                padding: 8px;
                text-align: left;
            }
            th {
                background-color: #f2f2f2;
            }
        </style>
    </head>
    <body>
    <h2>Elenco dei Libri</h2>
    <table>
        <thead>
        <tr>
            <th>Titolo</th>
            <th>Autore</th>
            <th>Genere</th>
            <th>Prezzo</th>
            <th>Anno di Pubblicazione</th>
        </tr>
        </thead>
        <tbody>
<?php while ($libro = $stm->fetch()) { ?>
    <tr>
        <td><?php echo $libro->titolo; ?></td>
        <td><?php echo $libro->autore; ?></td>
        <td><?php echo $libro->nome_genere; ?></td>
        <td>&euro; <?php echo number_format($libro->prezzo, 2, ',', '.'); ?></td>
        <td><?php echo $libro->anno_pubblicazione; ?></td>
    </tr>
    <?php } ?>
        </tbody>
    </table>
    </body>
    </html>

<?php require '../LIBRERIA_APP/templates/footer.php'; ?>