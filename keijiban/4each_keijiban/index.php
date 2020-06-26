<!doctype html>
<html lang="ja">
    
    <head>
        <meta charset = "utf-8">
        <title>【PHP演習課題】掲示板</title>
        <link rel="stylesheet" type="text/css" href="style.css">
    </head>
    
    <body>

         
        <?php
        
        mb_internal_encoding("utf8");
        
        $pdo = new PDO("mysql:dbname=aizawa; host=localhost;", "root", "");
        
        $stmt = $pdo->query("select * from 4each_keijiban");
        
        ?>
        
        <header>
            
            <div class = "headPic">
                <img src = "http://localhost/4each_keijiban/4eachblog_logo.jpg">
            </div>
            
            <div class= "blackBox" >
                
                <ul>
                    <li>トップ</li>
                    <li>プロフィール</li>
                    <li>4eachについて</li>
                    <li>登録フォーム</li>
                    <li>問い合わせ</li>
                    <li>その他</li>
                </ul>
            
            </div>
            
        </header>
        
        <main>
            
            <div class="mainContent">
                
                <h1>プログラミングに役立つ掲示板</h1>
                
                <div class="inPutBox">
                    
                    <h2 class="inPutH2">入力フォーム</h2>
                    
                    <form method="post" action="insert.php">
                        
                        <div class="formBox">
                            ハンドルネーム<br>
                            <input type="text" name="handlename" size="30">  
                        </div>
                        
                        <div class="formBox">
                            タイトル<br>
                            <input type="text" name="title" size="30">
                        </div>
                        
                        <div class="formBox">
                            コメント<br>
                            <textarea name="comments" rows="7" cols="60"></textarea>
                        </div >
                        
                        <div class="submit">
                            <input type="submit" value="投稿する">
                        </div>
                    
                    </form>
                    
                
                </div>
                
                <?php
                
                    while($row = $stmt->fetch()){
            
                        echo "<div class='outPutBox'>";
                    
                            echo '<h2 class="outPutH2">'.$row["title"].'</h2>';
                            
                            echo '<div class="comments">';
                        
                                echo $row['comments'];    
                                echo '<div class="handlename">posted by '.$row["handlename"].'</div>';
                        
                            echo "</div>";
                        
                        echo "</div>";
                
                    }
                
                ?>
            
            </div>
            
            <div class="sideBar">
                
                <h2 class="sideH2">人気の記事</h2>
                
                <ul>
                <li>PHPオススメ本</li>
                <li>PHP MyAdminの使い方</li>
                <li>今人気のエディタ Top5</li>
                 <li>HTMLの基礎</li>
            </ul>
                
            <h2 class="sideH2">オススメリンク</h2>
                
            <ul>
                <li>インターノウス株式会社</li>
                <li>XAMPPのダウンロード</li>
                <li>Eclipseのダウンロード</li>
                <li>Bracketsのダウンロード</li>
            </ul>
                
            <h2 class="sideH2">カテゴリ</h2>
                
            <ul>
                <li>HTML</li>
                <li>PHP</li>
                <li>MySQL</li>
                <li>JavaScript</li>
            </ul>
            
            </div>
        
        </main>
        
        <footer>
            
            <p>copyright © internous | 4each blog the which provides A to Z about programming.</p>
        
        </footer>
         

    </body>

</html>