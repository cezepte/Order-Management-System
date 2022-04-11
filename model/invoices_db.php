<?php
    class Invoices{
        public function insert_invoice_in($client_id, $invoiceQuantity, $invoiceItem, $invoicePriceNetto, $invoiceVat, $invoicePriceBrutto){
            global $db;
            $query = "INSERT INTO invoices_in(items,quantity,netto_value,vat,brutto_value,contractor_id) VALUES (:items,:quantity,:netto_value,:vat,:brutto_value,:contractor_id)";
            $statement = $db->prepare($query);
            $statement->bindValue(':items', $invoiceItem, PDO::PARAM_STR);
            $statement->bindValue(':quantity', $invoiceQuantity, PDO::PARAM_INT);
            $statement->bindValue(':netto_value', $invoicePriceNetto, PDO::PARAM_INT);
            $statement->bindValue(':vat', $invoiceVat, PDO::PARAM_INT);
            $statement->bindValue(':brutto_value', $invoicePriceBrutto, PDO::PARAM_INT);
            $statement->bindValue(':contractor_id', $client_id, PDO::PARAM_INT);
            $statement->execute();
            $statement->closeCursor();
        }
        public function select_incoming_invoices(){
            global $db;
            $query = "SELECT * FROM invoices_in";
            $statement = $db->prepare($query);
            $statement->execute();
            $results_all_incoming_invoices = $statement->fetchAll;
            return $results_all_incoming_invoices;
        }
        
    }

?>