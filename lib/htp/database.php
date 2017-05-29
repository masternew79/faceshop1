<?php
class HTP_Database{
    private $table;
    private $conn;
    private $sql;
    public $maps;
    public function __construct($table = null)
    {
        $this->connect();
        $this->maps = $this->maps();
        $this->table = $table;
    }
    
    public function connect(){
        try{
            $this->conn = new PDO(
                HTP::$config['db']['connectionString'],
                HTP::$config['db']['username'],
                HTP::$config['db']['password']
            );
            $this->conn->setAttribute(
                PDO::ATTR_ERRMODE,
                PDO::ERRMODE_EXCEPTION
            );
            $this->conn->exec("SET character_set_results=utf8");
            $this->conn->query('SET NAMES utf8'); 
        }catch (PDOException $e) {
            header('location:' . HTP::$homeUrl .'/error/nodatabase');
            //throw new Exception('No connect to database!');
        }
        return $this->conn;
    }
    
    public function findAll($condition = null, $param = null){
        try{
            if($this->table){
                $sql = 'select * from ' . $this->table;
                if($condition){
                    $sql .= ' where ' . $condition;
                }
                $sth = $this->conn->prepare($sql);
                $sth->execute($param);
                return $sth->fetchAll(PDO::FETCH_OBJ);
            }else{
                throw new Exception('Table not found!');
            }
        }catch(PDOException $e){
            throw new Exception('Wrong sql!');
        }
    }
     
    public function find($condition = null, $param = null){
        try{
            if($this->table){
                $sql = 'select * from ' . $this->table;
                if($condition){
                    $sql .= ' where ' . $condition;
                }
                $sth = $this->conn->prepare($sql);
                $sth->execute($param);
                return $sth->fetch(PDO::FETCH_OBJ);
            }else{
                throw new Exception('Table not found!');
                return false;
            }
        }catch(PDOException $e){
            throw new Exception('Wrong sql!');
            return false;
        }
    }
     
    public function findAllWithColumn($column = '*', $condition = null, $param = null){
        try{
            if($this->table){
                $sql = 'select ' . $column . ' from '.$this->table;
                if($condition){
                    $sql .= ' where ' . $condition;
                }
                $sth = $this->conn->prepare($sql);
                $sth->execute($param);
                return $sth->fetchAll(PDO::FETCH_OBJ);
            }else{
                throw new Exception('Table not found!');
                return false;
            }
        }catch(PDOException $e){
            throw new Exception('Wrong sql!');
            return false;
        }
    }
     
    public function findWithColumn($column = '*', $condition = null, $param = null){
        try{
            if($this->table){
                $sql = 'select ' . $column . ' from '.$this->table;
                if($condition){
                    $sql .= ' where ' . $condition;
                }
                $sth = $this->conn->prepare($sql);
                $sth->execute($param);
                return $sth->fetch(PDO::FETCH_OBJ);
            }else{
                throw new Exception('Table not found!');
                return false;
            }
        }catch(PDOException $e){
            throw new Exception('Wrong sql!');
            return false;
        }
    }
     
    public function findAllBySql($sql, $param = null){
        $sth = $this->conn->prepare($sql);
        $sth->execute($param);
        return $sth->fetchAll(PDO::FETCH_OBJ);
    }
     
    public function findBySql($sql, $param = null){
        $sth = $this->conn->prepare($sql);
        $sth->execute($param);
        return $sth->fetch(PDO::FETCH_OBJ);
    }
     
    public function getCount($column = '*', $condition = null, $param = null){
        try{
            if($this->table){
                $sql = 'select count(' . $column . ') from ' . $this->table . ' ' . $this->tableAlias;
                if($condition && $condition != ''){
                    $sql .= ' where ' . $condition;
                }
                $sth = $this->conn->prepare($sql);
                $sth->execute($param);
                return $sth->fetchColumn();
            }else{
                throw new Exception('Table not found!');
                return false;
            }
        }catch(PDOException $e){
            throw new Exception($e);
            return false;
        }
    }
     
    public function __destruct(){
        $this->conn = null;
    }
     
    public function select($column = '*'){
        $this->sql = 'select ' . $column;
        return $this;
    }
     
    public function from($table){
        $this->sql .= ' from ' . $table;
        return $this;
    }
     
    public function join($table, $on){
        $this->sql .= ' join ' . $table . ' on ' . $on;  
        return $this;
    }
     
    public function where($condition){
        $this->sql .= $condition != '' ? (' where ' . $condition) : '';
        return $this;
    }
     
    public function searchCondition(){
        $condition = array(
            'condition' => '',
            'param' => array()
        );
        foreach($this->maps as $attr => $detail){
            if($this->$attr != null && trim($this->$attr) != ''){
                if($condition['condition'] != ''){
                    $condition['condition'] .= (isset($detail['operator']) ? $detail['operator'] : ' and ') . $this->tableAlias . '.' . $attr;
                }else{
                    $condition['condition'] .= $this->tableAlias . '.' . $attr;
                }
                if(isset($detail['match']) && $detail['match']){
                    $condition['condition'] .= ' = :s_' . $attr;
                    $condition['param'][':s_' . $attr] = $this->$attr;
                }else{
                    $condition['condition'] .= ' like :s_' . $attr;
                    $condition['param'][':s_' . $attr] = '%' . $this->$attr . '%';
                }
            }
        }
        return $condition;
    }
     
    public function groupBy($group){
        $this->sql .= ' group by ' . $group;
        return $this;
    }
     
    public function having($having){
        $this->sql .= ' having ' . $having;
        return $this;
    }
     
    public function orderBy($order){
        $this->sql .= ' order by ' . $order;
        return $this;
    }
     
    public function limit($offset, $count){
        $this->sql .= ' limit ' . $offset . ', ' . $count;
        return $this;
    }
     
    public function execute($param = null){
        try{
            $this->sth = $this->conn->prepare($this->sql);
            $this->sth->execute($param);
            return $this;
        }catch(PDOException $e){
            throw new Exception($e);
            return null;
        }
    }
     
    public function fetch($fetchMode = PDO::FETCH_OBJ){
        return $this->sth->fetch($fetchMode);
    }
     
    public function fetchAll($fetchMode = PDO::FETCH_OBJ){
        return $this->sth->fetchAll($fetchMode);
    }
     
    public function insert(){
        $this->beforeInsert();
        $sql = 'insert into '.$this->table.'(';
        $param = array();
        $values = '';
        foreach($this->maps as $key => $value){
            $sql .= $value[0] . ',';
            $values .= ':' . $value[0] . ',';
            $param[':' . $value[0]] = $this->$key;
        }
        $sql = substr($sql, 0, strlen($sql) - 1);
        $values = substr($values, 0, strlen($values) - 1);
        $sql .= ')values(' . $values . ')';
        $sth = $this->conn->prepare($sql);
        return $sth->execute($param);
    }
     
    public function update($condition = null, $param = array()){
        $this->beforeUpdate();
        $fields = '';
        $values = '';
        $sql = 'update ' . $this->table . ' set ';
        foreach($this->maps as $key => $value){
            if($this->$key !== null){
                $sql .= $value[0] . '=:_' . $value[0] . ',';
                $param[':_' . $value[0]] = $this->$key;
            }
        }
        $sql = substr($sql, 0, strlen($sql) - 1);
        if($condition){
            $sql .= ' where ' . $condition;
        }
        $sth = $this->conn->prepare($sql);
        return $sth->execute($param);
    }
     
    public function updateByColumns($columns, $condition = null, $param = array()){
        $sql = 'update ' . $this->table . ' set ' . $columns;
        if($condition){
            $sql .= ' where ' . $condition;
        }
        $sth = $this->conn->prepare($sql);
        return $sth->execute($param);
    }
     
    public function delete($condition = null, $param = array()){
        $sql = 'delete from '.$this->table;
        if($condition){
            $sql .= ' where ' . $condition;
        }
        $sth = $this->conn->prepare($sql);
        return $sth->execute($param);
    }
     
     
}