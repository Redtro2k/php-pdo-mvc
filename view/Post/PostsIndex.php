<?php  
    require('../model/PostModel.php');
    $post = new PostModel($pdo);
    $title = $_REQUEST['title'] ?? null;
    $content = $_REQUEST['content'] ?? null;
    $post_id = $_REQUEST['post_id'] ?? null;
    if(isset($_POST['add'])){
        if(!empty($title) && !empty($content)){
            $post->addPost($_SESSION['user_id'], $title, $content);
        }else{
            echo 'please fill all fields';
        }
    }
    if(isset($_POST['delete'])){
        $post->deletePost($post_id);
    }
?>
<form method="post">
    <span>Title</span>
    <input type="text" name="title">
    <br>
    <br>
    <span>Content</span>
    <br>
    <textarea name="content" id="" cols="20" rows="10"></textarea>
    <br>
    <button type="submit" name="add">Submit</button>
</form>
<ul>
    <?php foreach($post->getPosts($_SESSION['user_id']) as $post): ?>
    <li>
        <span><?php echo $post['title'] ?></span>
        <br>
        <p><?php echo $post['content'] ?></p>
        <form method="post">
            <input type="hidden" name="post_id" value="<?php echo $post['id'] ?>">
            <button type="submit" name="delete">Delete</button>
        </form>
    </li>
    <?php endforeach; ?>
</ul>