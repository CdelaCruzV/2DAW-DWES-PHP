<?php
    interface Model {
        public function findAll();
        public function findById($id);
        public function save();
        public function update();
        public function delete($id);
    }
?>