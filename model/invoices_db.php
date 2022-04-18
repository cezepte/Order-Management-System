<?php
    class Invoices{
        public function insert_invoice($invoiceType,$contractor_id, $invoiceQuantity, $invoiceItem, $invoicePriceNetto, $invoiceVat, $invoicePriceBrutto){
            global $db;
            $query = "INSERT INTO invoices_in(contractor_id, type) VALUES (:contractor_id, :type)";
            $query1 = "SELECT id FROM invoices_in ORDER BY id DESC LIMIT 1";
            $query2 = "INSERT INTO invoices_in_items VALUES (:invoice_id, :quantity, :item, :item_price_netto, :item_vat, :item_price_brutto)";
            $statement = $db->prepare($query);
            $statement->bindValue(':contractor_id', $contractor_id, PDO::PARAM_INT);
            $statement->bindValue(":type", $invoiceType);
            $statement->execute();
            $statement->closeCursor();
            $statement1 = $db->prepare($query1);
            $statement1->execute();
            $invoice = $statement1->fetchAll();
            foreach($invoice as $invoiceData){
                $invoiceId = intval($invoiceData['id']);
            }
            for($i = 0; $i < count($invoiceItem); $i++){
                $item = $invoiceItem[$i];
                $quantity = $invoiceQuantity[$i];
                $priceNetto = $invoicePriceNetto[$i];
                $vat = $invoiceVat[$i];
                $priceBrutto = $invoicePriceBrutto[$i];
                $statement2 = $db->prepare($query2);
                $statement2->bindValue(":invoice_id", $invoiceId);
                $statement2->bindValue(":quantity", $quantity);
                $statement2->bindValue(":item", $item);
                $statement2->bindValue(":item_price_netto", $priceNetto);
                $statement2->bindValue(":item_vat", $vat);
                $statement2->bindValue(":item_price_brutto", $priceBrutto);
                $statement2->execute();
            }
        }
        public function select_all_invoices(){
            global $db;
            $query = "SELECT * FROM invoices_in INNER JOIN clients ON invoices_in.contractor_id = clients.client_id";
            $statement = $db->prepare($query);
            $statement->execute();
            $results_all_incoming_invoices = $statement->fetchAll();
            return $results_all_incoming_invoices;
        }
        public function select_all_items(){
            global $db;
            $query = "SELECT invoices_in_items.*,clients.company FROM invoices_in_items INNER JOIN invoices_in ON invoices_in_items.invoice_in_id = invoices_in.id INNER JOIN clients ON invoices_in.contractor_id = clients.client_id;";
            $statement = $db->prepare($query);
            $statement->execute();
            $results_all_items = $statement->fetchAll();
            return $results_all_items;
        }
        
    }

?>