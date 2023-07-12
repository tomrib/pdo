<?php
class postscategories extends database
{
    public int $id = 0;
    public string $name = '';

    public function __construct()
    {
        parent::__construct();
    }

    public function getPostscategories()
    {
        $query = 'SELECT id, name
        FROM `pab7o_postscategories`;';
        $request = $this->db->query($query);
        return $request->fetchAll(PDO::FETCH_OBJ);
    }

    public function checkPosts()
    {
        $query = 'SELECT COUNT(id)
FROM ' . $this->prefix . 'postscategories WHERE id = :id;';
        $request = $this->db->prepare($query);
        $request->bindValue(':id', $this->id ,PDO::PARAM_INT);
        $request->execute();
        return $request->fetch(PDO::FETCH_COLUMN);
    }

    public function addNewCategories(){
        $query = 'INSERT INTO `pab7o_postscategories`(`name`) VALUES (:name);';
        $request = $this->db->prepare($query);
        $request->bindValue(':name', $this->name ,PDO::PARAM_STR);
        return $request->execute();
    }
}