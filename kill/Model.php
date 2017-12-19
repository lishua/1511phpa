<?php

class Model{
    private static $obj;//存储当前类的对象
    private $db;//存储pdo数据库链接的对象
    private $table;
    private $field = '*';
    private $limit = '';
    private $order = '';
    private $where = '';
    
    private function __construct($table) {
        //防止直接new关键字实例化
        $dsn = 'mysql:host=127.0.0.1;dbname=test;charset=utf8';
        $this->db = new PDO($dsn, 'root', 'lishu');
        $this->table = $table;
    }
    private function __clone(){
        //防止通过clone方法克隆对象
    }
    public static function getDB($table=''){
        //获取当前类的实例化对象的方法
        if(self::$obj instanceof Model){//判断$obj是否是当前类的实例化对象
            self::$obj->table = $table;
            return self::$obj;
        }
        return self::$obj = new self($table);
    }
    
    public function select(){
        $sql = "select {$this->field} from {$this->table} {$this->order} {$this->limit}";
        $data = $this->db->query($sql)->fetchAll(PDO::FETCH_ASSOC);
        $this->init_param();
        return $data;
    }
    
    public function insert($data){
        $key = array_keys($data);
        $sql  = "insert into {$this->table}(".'`'.implode('`,`', $key).'`'.") value("."'".implode("','", $data)."'".")";
        $res = $this->db->exec($sql);
        $this->init_param();
        if(!$res){
            //手动的抛出一个异常
            throw new Exception($this->db->errorInfo()[2], $this->db->errorInfo()[1]);
        }
        return $this->db->lastInsertId();
    }
    
    public function getField($field = '*'){
        $sql = "select {$field} from {$this->table} {$this->where} {$this->order} limit 1";
        $res = $this->db->query($sql);
        $data = $res->fetch(PDO::FETCH_ASSOC);
        $this->init_param();
        return $data[$field];
    }
    
    public function find(){
        $sql = "select {$this->field} from {$this->table} {$this->where} {$this->order} limit 1";
        // echo $sql;die;
        $data = $this->db->query($sql)->fetch(PDO::FETCH_ASSOC);
        $this->init_param();
        return $data;
    }
    
    public function update($data){
        $update_data = '';
        if(is_array($data)){
            foreach($data as $key => &$val){
                $val = "`$key`='$val'";
            }
            $update_data = implode(',', $data);
        }else{
            $update_data = $data;
        }
        $sql = "update {$this->table} set $update_data {$this->where}";
        $res = $this->db->exec($sql);
        $this->init_param();
        return $res;
    }
    
    public function where($where){
        if(is_array($where)){
            foreach($where as $key => &$value){
                $value = "$key='$value'";
            }
            $this->where = 'where ' . implode(' and ', $where);
        }else{
            $this->where = 'where ' . $where;
        }
        return $this;
    }
    
    public function field($field = '*'){
        $this->field = $field;
        return $this;
    }
    
    public function limit($offset, $limit){
        $this->limit = 'limit' . " {$offset},{$limit}";
        return $this;
    }
    
    public function order($order_str = ''){
        $this->order = 'order by ' . $order_str;
        return $this;
    }
    
    private function init_param(){
        $this->field = '*';
    }
    
    public function beginTransaction(){
        $this->db->beginTransaction();
    }
    
    public function commit(){
        $this->db->commit();
    }
    
    public function rollback(){
        $this->db->rollback();
    }
}

