<div>

    <h2>Shannon's Google Drive Files</h2>

    <?

// echo $data;
    foreach($data as $file) {
        // var_dump($file['mimeType']);
        if($file['mimeType'] == "application/vnd.google-apps.document") {
            echo '<p>Doc: <a href="https://docs.google.com/document/d/'.$file['id'].'">'.$file['name'].'</a></p>';
        } else if ($file['mimeType'] == 'application/vnd.google-apps.spreadsheet') {
            echo '<p>Spreadsheet: <a href="https://docs.google.com/spreadsheets/d/'.$file['id'].'">'.$file['name'].'</a></p>';
        } else if ($file['mimeType'] == 'application/vnd.google-apps.drawing') {
            echo '<p>Drawing: <a href="https://docs.google.com/drawings/d/'.$file['id'].'">'.$file['name'].'</a></p>';
        } else if ($file['mimeType'] == 'application/vnd.google-apps.presentation') {
            echo '<p>Presentation: <a href="https://docs.google.com/presentation/d/'.$file['id'].'">'.$file['name'].'</a></p>';
        }
        echo '<br>';
    }

?>


</div>