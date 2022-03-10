<?php
    if(isset($_GET['orderAdded'])){
        ?>
        <script>
            $(document).ready( function() {
                $('.content').load('currentOrders.php');
            });
        </script>
    <?php
    }else if(isset($_GET['orderId'])){
        $order = $_GET['orderId'];
        ?>
        <script>
            $(document).ready( function() {
                $('.content').load('orderPreview.php');
            });
        </script>
        <?php
    }
?>