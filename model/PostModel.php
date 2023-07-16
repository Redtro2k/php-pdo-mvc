<?php 
class PostModel{
    private $pdo;
    public function __construct($pdo){
        $this->pdo = $pdo;
    }
    public function getPosts($id){
        $query = "SELECT * FROM `post` WHERE user_id=:id";
        $stmt = $this->pdo->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }
    public function addPost($user_id, $title, $content){
        $query = "INSERT INTO `post`(user_id, title, content) VALUES(:user_id, :title, :content)";
        $stmt = $this->pdo->prepare($query);
        $stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
        $stmt->bindParam(':title', $title);
        $stmt->bindParam(':content', $content);
        $stmt->execute();
    }
    public function deletePost($id){
        $query = "DELETE FROM `post` WHERE id=:id";
        $stmt = $this->pdo->prepare($query);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
    }
}
?>