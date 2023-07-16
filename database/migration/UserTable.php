<?php
class UserTable{
    public static function create($pdo){
        try{
            $query = "CREATE TABLE IF NOT EXISTS `user` (
                `id` INT NOT NULL AUTO_INCREMENT , 
                `name` VARCHAR(50) NOT NULL , 
                `phone` INT(11) NOT NULL , 
                `status` VARCHAR(10) NOT NULL , 
                `username` VARCHAR(50) NOT NULL,
                `password` VARCHAR(25) NOT NULL,
                `date_created` DATETIME NULL DEFAULT CURRENT_TIMESTAMP , 
                `date_updated` DATETIME NULL DEFAULT CURRENT_TIMESTAMP , 
                PRIMARY KEY (`id`)) ENGINE = InnoDB;";
            $stmt = $pdo->prepare($query);
            $stmt->execute();
        }catch(PDOException $e){
            die('error '. $e->getMessage());
        }
    }
}