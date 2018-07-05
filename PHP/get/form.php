<?php 

var_dump($_GET);

if(!empty($_GET)){// si il y a des informations dans la query string.
    echo $_GET['titre'] . '<br/>' ;
    echo nl2br($_GET['description']); // nl2br transfommre les retours chariots en <br/>
};
?>
<form>

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