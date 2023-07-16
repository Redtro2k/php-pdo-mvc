<?php
class PostTable{
    public static function create($pdo){
        try{
            $query = "CREATE TABLE IF NOT EXISTS `post` (
                `id` INT NOT NULL AUTO_INCREMENT , 
                `user_id` INT NOT  NULL,
                `title` VARCHAR(200) NOT NULL , 
                `content` TEXT NOT NULL , 
                `date_created` DATETIME NULL DEFAULT CURRENT_TIMESTAMP , 
                `date_updated` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP , 
                PRIMARY KEY (`id`)) ENGINE = InnoDB;";
            $stmt = $pdo->prepare($query);
            $stmt->execute();
            //check if table post is not exists
            self::addForeignkeyToUser($pdo);
        }catch(PDOException $e){
            die('error '. $e);
        }
    }
    public static function addForeignkeyToUser($pdo){
        $query = "ALTER TABLE `post` 
        ADD CONSTRAINT `by_user` FOREIGN KEY IF NOT EXISTS (`user_id`) REFERENCES `user`(`id`) ON DELETE CASCADE ON UPDATE CASCADE;";
         $stmt = $pdo->prepare($query);
         $stmt->execute();
    }
}
?>