<?php
class database
{
    //todo connexion a la base de donne
    protected $db;
    protected string $prefix = 'pab7o_';

    public function __construct()
    {
        try {
            $this->db = new PDO('mysql:host=localhost;dbname=laManuPost;charset=utf8mb4', 'pAb7o_admin', 'azerty');
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }
}
