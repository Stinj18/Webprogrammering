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
    </div>

    <!-- dette er stjålet fra table templaten under user, da vi også skal have noget med at vise alle billeder. 
    <?php foreach ($viewbag['images'] as $result) : ?>
    
    <tr>
        <?php foreach ($result as $value) : ?>
            <td><?=$value?></td>
        <?php endforeach; ?>
    </tr>

    <?php endforeach; ?> -->

    <hr> 