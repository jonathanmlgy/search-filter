<?php
class Stock extends CI_Model {
    function get_all_stocks()
    {
        return $this->db->query("SELECT *FROM stocks")->result_array();
    }

    function filter_stocks($search_name, $price_min, $price_max, $orderby)
    { 
        if ($search_name !== '') {
            return $this->db->query("SELECT *FROM stocks WHERE item_name = ?", array($search_name))->result_array();
        }

        if ($price_min == NULL && $price_max !== NULL) {
            return $this->db->query("SELECT *FROM stocks WHERE price <= ? ORDER BY price $orderby", array($price_max))->result_array();
        } else if ($price_max == NULL && $price_min !== NULL) {
            return $this->db->query("SELECT *FROM stocks WHERE price >= ? ORDER BY price $orderby", array($price_min))->result_array();
        } else if ($price_min == NULL && $price_max == NULL) {
            return $this->db->query("SELECT *FROM stocks")->result_array();
        } else {
        return $this->db->query("SELECT *FROM stocks WHERE price BETWEEN ? AND ? ORDER BY price $orderby", array($price_min, $price_max))->result_array();
        }
    }
}
?>