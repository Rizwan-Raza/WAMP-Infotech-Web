
<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
    crossorigin="anonymous"></script>
<!-- Compiled and minified JavaScript -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js" integrity="sha384-ZOED+d9HxogEQwD+jFvux96iGQR9TxfJO+mPF2ZS0TuKH6eWrmvPsDpO6I0OWdiX" crossorigin="anonymous"></script>
    
<!-- <script src="layouts/services.js"></script> -->
<script src="ui-scripts/common.js"></script>
<?php
    if (!isset($_SESSION)) {
        session_start();
    }
    if (isset($_SESSION['active']) and $_SESSION['active'] == 0) {
?>
        <script>M.toast({displayLength: Infinity, html: 'Verify your email for further access.'});</script>
<?php
    } 
?>
