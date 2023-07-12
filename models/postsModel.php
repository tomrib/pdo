<?php
class posts extends database
{
    public int $id = 0;
    public string $title = '';
    public string $content = '';
    public string $puclicationDta = '1970-01-01';
    public string $updateDate = '1970-01-01';
    public string $image = '';
    public int $id_users = 0;
    public int $id_postsCategories = 0;
    public int $debut = 0;
    public int $countPostsPage = 0;


    public function __construct()
    {
        parent::__construct();
    }
    //todo on ajoute un article
    public function createPosts()
    {
        $query = 'INSERT INTO `' . $this->prefix . 'posts`(`title`,`content`,`publicationDate`,`updateDate`,`image`,`id_users`,`id_postsCategories`) 
    VALUES (:title,:content,NOW(),NOW(),:image,:id_users,:id_postsCategories);';
        $request = $this->db->prepare($query);
        $request->bindValue(':title', $this->title, PDO::PARAM_STR);
        $request->bindValue(':content', $this->content, PDO::PARAM_STR);
        $request->bindValue(':image', $this->image, PDO::PARAM_STR);
        $request->bindValue(':id_users', $this->id_users, PDO::PARAM_INT);
        $request->bindValue(':id_postsCategories', $this->id_postsCategories, PDO::PARAM_INT);
        return $request->execute();
    }

    //todo on lire les article
    public function createItem()
    {
        $query = 'SELECT
pab7o_posts.id,title,`content`,`publicationDate`,`updateDate`,`image`,
pab7o_users.username,
pab7o_postscategories.id AS idCategories,name
FROM
pab7o_posts
INNER JOIN pab7o_users ON pab7o_posts.id_users = pab7o_users.id
INNER JOIN pab7o_postscategories ON pab7o_posts.id_postsCategories = pab7o_postscategories.id
WHERE pab7o_posts.id = :id;';
        $request = $this->db->prepare($query);
        $request->bindValue(':id', $this->id, PDO::PARAM_INT);
        $request->execute();
        return $request->fetchAll(PDO::FETCH_OBJ);
    }

    // lire les posts par son type
    public function getPostsByCategorie()
    {
        $query = 'SELECT
        pab7o_posts.id,title,content,publicationDate,updateDate,image,id_postsCategories,
        pab7o_users.username,
        pab7o_postscategories.id AS categoryId, name
        FROM
        pab7o_posts
        INNER JOIN pab7o_users ON pab7o_posts.id_users = pab7o_users.id
        INNER JOIN pab7o_postscategories ON pab7o_posts.id_postsCategories = pab7o_postscategories.id
        WHERE
        pab7o_posts.id_users = :id_users
        AND
        pab7o_posts.id_postsCategories = :id_postsCategories;';
        $request = $this->db->prepare($query);
        $request->bindValue(':id_users', $this->id_users, PDO::PARAM_INT);
        $request->bindValue(':id_postsCategories', $this->id_postsCategories, PDO::PARAM_INT);
        $request->execute();
        return $request->fetchAll(PDO::FETCH_OBJ);
    }
    //todo lire 5 article sur le compt de l utilisateur
    public function ItemProfile()
    {
        $query = 'SELECT pab7o_users.username,
    pab7o_posts.publicationDate,content,title,image
    FROM
    pab7o_posts
    INNER JOIN pab7o_users ON pab7o_posts.id_users = pab7o_users.id
    WHERE
    pab7o_users.id = :id_users
    GROUP BY pab7o_posts.id DESC
    LIMIT 5;';
        $request = $this->db->prepare($query);
        $request->bindValue(':id_users', $this->id_users, PDO::PARAM_INT);
        $request->execute();
        return $request->fetchAll(PDO::FETCH_OBJ);
    }

    public function readPostsProfile()
    {
        $query = 'SELECT pab7o_users.username,
        pab7o_posts.id,publicationDate,updateDate,content,title,image,
        pab7o_postscategories.id AS idCategories,name
        FROM
        pab7o_posts
        INNER JOIN pab7o_users ON pab7o_posts.id_users = pab7o_users.id
        INNER JOIN pab7o_postscategories ON pab7o_posts.id_postsCategories = pab7o_postscategories.id
        WHERE
        pab7o_posts.id = :id;';
        $request = $this->db->prepare($query);
        $request->bindValue(':id', $this->id, PDO::PARAM_INT);
        $request->execute();
        return $request->fetchAll(PDO::FETCH_OBJ);
    }

    //supprime les article et commentaire
    public function deletePosts()
    {
        $query = 'DELETE FROM `pab7o_posts` 
        WHERE pab7o_posts.id = :id;';
        $request = $this->db->prepare($query);
        $request->bindValue(':id', $this->id, PDO::PARAM_INT);
        return $request->execute();
    }

    // on check que l id du posts soit dans la basse
    public function checkPostsById()
    {
        $query = 'SELECT COUNT(id)
        FROM pab7o_posts
        WHERE id = :id;';
        $request = $this->db->prepare($query);
        $request->bindValue(':id', $this->id, PDO::PARAM_INT);
        $request->execute();
        return $request->fetch(PDO::FETCH_COLUMN);
    }
    /**
     * on modifier le contenu des colone dans le posts
     * @param string $title change avec le newTitle
     */
    public function updatePostsUser()
    {
        $query = 'UPDATE
       `pab7o_posts`
       SET
       `title` = :title,
       `content` = :content,
       `updateDate` = NOW(),
       `image` = :image,
       `id_postsCategories` = :id_postsCategories
   WHERE
       pab7o_posts.id = :id;';
        $request = $this->db->prepare($query);
        $request->bindValue(':id', $this->id, PDO::PARAM_INT);
        $request->bindValue(':title', $this->title, PDO::PARAM_STR);
        $request->bindValue(':content', $this->content, PDO::PARAM_STR);
        $request->bindValue(':image', $this->image, PDO::PARAM_STR);
        $request->bindValue(':id_postsCategories', $this->id_postsCategories, PDO::PARAM_INT);
        return $request->execute();
    }

    public function researchPosts()
    {
        $query = 'SELECT pab7o_posts.title,content,publicationDate,updateDate,image,id_users,id_postsCategories,
        pab7o_postscategories.name
        FROM pab7o_posts
        INNER JOIN pab7o_postscategories ON pab7o_posts.id_postsCategories = pab7o_postscategories.id
        WHERE pab7o_posts.title  LIKE :title ORDER BY pab7o_posts.id DESC;';
        $request = $this->db->prepare($query);
        $request->bindValue(':title', '%' . $this->title . '%', PDO::PARAM_STR);
        $request->execute();
        return $request->fetchAll(PDO::FETCH_OBJ);
    }
    
    //todo on affiche les articles
    
    public function countPosts()
    {
        $query = 'SELECT COUNT(id) AS countIdPosts
        FROM pab7o_posts;';
        $request = $this->db->query($query);
        return $request->fetch(PDO::FETCH_COLUMN);
    }
    public function getPosts()
    {
        $query = 'SELECT
        pab7o_posts.id,title,content,publicationDate,updateDate,image,
        pab7o_users.username,
        pab7o_postscategories.name
        FROM
        pab7o_posts
        INNER JOIN pab7o_users ON pab7o_posts.id_users = pab7o_users.id
        INNER JOIN pab7o_postscategories ON pab7o_posts.id_postsCategories = pab7o_postscategories.id
        ORDER BY pab7o_posts.id LIMIT :debut,:countPostsPage;';
        $request = $this->db->prepare($query);
        $request->bindValue(':debut', $this->debut, PDO::PARAM_INT);
        $request->bindValue(':countPostsPage', $this->countPostsPage, PDO::PARAM_INT);
        $request->execute();
        return $request->fetchAll(PDO::FETCH_OBJ);
    }
}