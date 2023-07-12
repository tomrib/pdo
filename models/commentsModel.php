<?php
class comments extends database
{
    public int $id = 0;
    public string $content = '';
    public string $publicationDate = '';
    public int $id_posts = 0;
    public int $id_user = 0;

    public function __construct()
    {
        parent::__construct();
    }
    //todo on ajoute un commentaire
    public function 
    createComments()
    {
        $query = 'INSERT INTO `' . $this->prefix . 'comments`(`content`,`publicationDate`,`id_posts`,`id_users`)
        VALUE (:content, NOW(),:id_posts,:id_user);';
        $request = $this->db->prepare($query);
        $request->bindValue(':content', $this->content, PDO::PARAM_STR);
        $request->bindValue(':id_posts', $this->id_posts, PDO::PARAM_INT);
        $request->bindValue(':id_user', $this->id_user, PDO::PARAM_INT);
        return $request->execute();
    }
    //todo on lire les commentaires
    public function readComments()
    {
        $query = 'SELECT
        pab7o_comments.content,publicationDate,
        pab7o_users.username
    FROM
        pab7o_comments
    INNER JOIN pab7o_users ON pab7o_comments.id_users = pab7o_users.id
    WHERE
    pab7o_comments.id_posts = :id_posts
    ORDER BY
        pab7o_comments.publicationDate
    DESC;';
        $request = $this->db->prepare($query);
        $request->bindValue(':id_posts', $this->id_posts, PDO::PARAM_INT);
        $request->execute();
        return $request->fetchAll(PDO::FETCH_OBJ);
    }

    //todo on affiche dans le profile de l utilisateur
    public function commentsProfile()
    {
        $query = 'SELECT pab7o_users.username,
        pab7o_comments.content,publicationDate
        FROM
        pab7o_comments
        INNER JOIN pab7o_users ON pab7o_comments.id_users = pab7o_users.id
        WHERE
        pab7o_users.id = :id_user
        GROUP BY pab7o_comments.id DESC
        LIMIT 5;';
        $request = $this->db->prepare($query);
        $request->bindValue(':id_user', $this->id_user, PDO::PARAM_INT);
        $request->execute();
        return $request->fetchAll(PDO::FETCH_OBJ);
    }
}
