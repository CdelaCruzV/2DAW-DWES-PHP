<?php
    interface Model {
        public function getAll();
        public function findById();
        public function save();
        public function update();
        public function delete();
    }
?>