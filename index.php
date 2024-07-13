<?php
    //nahrajeme data z formu
    $username = $_POST["username"];
    $password = $_POST["password"];

    //vytvorime profil usera
    $user = [
        "username" => $username,
        "password" => $password
    ];

    //definujeme soubor
    $file = "index.json";

    //ziskame vsechny usery v souboru
    $decoded_users = json_decode(file_get_contents($file),true);

    //pridame noveho usera ke stavajicim
    array_push($decoded_users,$user);

    //pote celou array nahrajeme do jsonu
    file_put_contents($file,json_encode($decoded_users));

    $users = json_decode(file_get_contents($file),true);

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title></title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="style.css" rel="stylesheet">
    </head>
    <body>
    <main>
        <header>
            <nav>
                <ul>
                    <li><a href="formik.php">back to form</a></li>
                    <li><a href="https://www.instagram.com/">contact me</a></li>
                    <li> <a href="https://fel.cvut.cz/cs">ctu fee</a></li>
                </ul>
                <ul>
                    <li>Filip</li>
                </ul>
            </nav>
        </header>
        <section class="main">
            <!-- loopneme pres vsechno a vypisujeme -->
            <?php foreach($users as $user): ?>
                <div class="container">
                    <div class="card">
                        <?php echo "username: ".$user["username"]; ?>
            
                        <br>
                        <?php echo "password: ".$user["password"]; ?>
                    </div>
                </div>
            <?php endforeach; ?> <!-- musime endnout foreach, jinak to vyhodi error -->
        </section>
    </main>
    <footer>
        <p class="footer">password and username list by Filip 2024</p>
    </footer>
    </body>
</html>