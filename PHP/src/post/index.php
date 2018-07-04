
<?php 
echo '<pre>';
var_dump($_POST);
echo '</pre>';


?>
<form method="post">
    <div>
        <label>Titre</label>
        <input type="text" name="titre">
    </div>
    <div>
        <label>description</label>
        <textarea name="description"></textarea>
    </div>
    <div>
        <button type="submit">OK</button>
    </div>

</form>