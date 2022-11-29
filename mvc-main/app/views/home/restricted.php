<?php
    /**
     * This view is a proof of concept site that is only available when logged in
     */
?>
<div class="imagefeed">
        <div id="navn">
            <?php echo $_SESSION['username']; ?> <br>
        </div>

        <div id="image">
            <p> imageheader </p>
            <?php ?>
            <img src="Jordbaertaerte.jpg" alt="En jordbærtærte" title="Jordbærtærte"/>

            <p> description </p> 
        </div>

        <div id="image">
            <p> imageheader </p>
            <img src="Jordbaertaerte.jpg" alt="En jordbærtærte" title="Jordbærtærte"/>

            <p> description </p> 
        </div>
    </div>

    <hr> 