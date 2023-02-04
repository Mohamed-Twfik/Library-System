<?php
    class MysqlAdapter{
        protected $config = array();
        protected $connect;
        protected $result;

        public function __construct(array $config){
            if(count($config) != 4):
                throw new InvalidArgumentException('Invalid Number Of Connection Parameters.');
            endif;
            $this->config = $config;
        }

        public function connection(){
            if($this->connect === null):
                list($host, $user, $pass, $database) = $this->config;
                if(!$this->connect = @mysqli_connect($host, $user, $pass, $database)):
                    throw new RuntimeException('Error Connection To Server : ' . mysqli_connect_error());
                endif;
                unset($host, $user, $pass, $database);
            endif;
            return $this->connect;
        }

        public function query($query){
            if(!is_string($query) || empty($query)):
                throw new InvalidArgumentException('The Specified Query Not Valid .');
            endif;
            $this->connection();
            if(!$this->result = mysqli_query($this->connect, $query)):
                throw new RuntimeException('Error Execution the Specified query ' . $query . mysqli_error($this->connect));
            endif;
            return $this->result;
        }

        public function select($table, $where = '', $fields = '*', $order = '', $limit = null , $offset = null){
            $query = "SELECT " . $fields . " FROM " . $table . 
            (($where) ? " WHERE " . $where : '') . 
            (($limit)? " LIMIT " . $where : '') . 
            (($offset && $limit)? " OFFSET " . $offset : '') . 
            (($order)? " ORDER BY " . $order : '');
            $this->query($query);
            return $this->countRows();
        }

        public function insert($table, array $data){
            $fields = implode(',', array_keys($data));
            $values = implode(',', array_map(array($this, 'quoteValue'), array_values($data)));
            $query = "INSERT INTO " . $table . " (" . $fields . ") " . "VALUES (" . $values . ")";
            $this->query($query);
            return $this->getInsertId();
        }

        public function update($table, array $data, $where = ''){
            $set = array();
            foreach($data as $field => $value):
                $set[] = $field . '=' . $this->quoteValue($value);
            endforeach;
            $set = implode(',', $set);
            $query = "UPDATE " . $table . " SET " . $set . (($where) ? " WHERE " . $where : '' );
            $this->query($query);
            return $this->getAffectedRows();
        }

        public function delete($table, $where = ''){
            $query = "DELETE FROM " . $table . (($where) ? " WHERE " . $where : '');
            $this->query($query);
            return $this->getAffectedRows();
        }

        public function quoteValue($value){
            $this->connection();
            if($value === null):
                $value = 'NULL';
            elseif(!is_numeric($value)):
                $value = "'" . mysqli_real_escape_string($this->connect, $value) . "'";
            endif;
            return $value;
        }

        public function fetch(){
            if($this->result !== null):
                if(($row = mysqli_fetch_array($this->result, MYSQLI_ASSOC)) === false):
                    $this->freeResult();
                endif;
                return $row;
            endif;
            return false;
        }

        public function fetchAll(){
            if($this->result !== null):
                if(($all = mysqli_fetch_all($this->result, MYSQLI_ASSOC)) === false):
                    $this->freeResult();
                endif;
                return $all;
            endif;
            return false;
        }

        public function getInsertId(){
            return (($this->connect !== null) ? mysqli_insert_id($this->connect) : null );
        }

        public function countRows(){
            return (($this->result !== null) ? mysqli_num_rows($this->result) : 0);
        }

        public function getAffectedRows(){
            return (($this->connect !== null) ? mysqli_affected_rows($this->connect) : 0);
        }

        public function freeResult(){
            if($this->result === null):
                return false;
            endif;
            mysqli_free_result($this->result);
            return true;
        }

        public function disconnection(){
            if($this->connect === null):
                return false;
            endif;
            mysqli_close($this->connect);
            $this->connect = null;
            return true;
        }

        public function __destruct(){
            $this->disconnection();
        }
    }