<?php
    require 'MysqlAdapter.php';
    require 'databaseConfigData.php';

    class Table extends MysqlAdapter{
        
        private $table;

        public function __construct($table){
            $this->table = $table;

            // add from configration data file
            global $config;
            // call parent constructor
            parent::__construct($config);
        }

        public function getAllThings(){
            $this->select($this->table);
            return $this->fetchAll();
        }

        public function getThing($where){
            $this->select($this->table, $where);
            return $this->fetch();
        }

        public function addThing($thing_data){
            return $this->insert($this->table, $thing_data);
        }

        public function updateThing($thing_data, $thing_id){
            return $this->update($this->table, $thing_data, 'number=' . $thing_id);
        }

        public function deleteThing($thing_id){
            return $this->delete($this->table, 'number=' . $thing_id);
        }

        public function searchThings($keyword){
            $this->select($this->table, "name LIKE '%$keyword%' OR id LIKE '%$keyword%'");
            return $this->fetchAll();
        }

    }