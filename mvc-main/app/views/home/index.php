<h1>Home Controller Index Method</h1>

<?php
    /**
     * Anything included in the $viewbag, passed from the controller
     * is available here.
     * Den laver denne side, er hovedsagligt HTML kode der skal være i view og home filer. 
     */
?>
<p>First parameter accessed directly: <?=$viewbag['passed'][0] ?? '' ?> </p> <!-- Alle parametre finder den i viewbaggen -->
<p>Passed parameters looped:
    <?php foreach ($viewbag['passed'] as $param) : ?>
        <?=$param ?? '' ?> 
    <?php endforeach;
    /**
     * Notice that a maximum of 2 parameters are printed out,
     * because the home/index method only works with 2 parameters.
     * All remaining parameters are ignored.
     */
    ?>
</p>

<pre>
    <?php 
    print_r($viewbag); /* Vi kan tilgå viewbaggen fra view */
    ?>
</pre>

<!-- <img src="/public/assets/fish.jpg" alt="it's a fish"/> <!-- Viser hvordan vi kan assets et billede fra public folderen -->