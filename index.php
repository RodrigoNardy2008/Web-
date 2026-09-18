<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <div id="form">
       <form action="" method="POST">

            <h2 class="title">Cadastrar</h2>

            <label>Nome</label>
            <input class="input" id="username" name="username" placeholder="Username" type="text">

            <label>Email</label>
            <input class="input" id="email" name="email" placeholder="email" type="text">

            <label>Telefone</label>
            <input class="input" id="telefone" name="telefone" placeholder="telefone" type="text">

            <div id="btn">
                <button type="submit">Cadastrar</button>
            </div>

        </form>

        <?php 
        $mensagem = ""; 
        $nome = ""; 
        $email = ""; 
        $telefone = ""; 
        
        if ($_SERVER["REQUEST_METHOD"] === "POST") { 

            $nome = $_POST["username"] ?? ""; 

            $email = $_POST["email"] ?? ""; 

            $telefone = $_POST["telefone"] ?? ""; 
            
            $nome = htmlspecialchars($nome, ENT_QUOTES, "UTF-8"); 
            
            $email = htmlspecialchars($email, ENT_QUOTES, "UTF-8"); 
            
            $telefone = htmlspecialchars($telefone, ENT_QUOTES, "UTF-8"); 
            
                if (!empty($nome) || !empty($email) || !empty($telefone)) {
                    $mensagem = "Cadastro realizado com sucesso! Nome: " . $nome . "; 
                    Email: ". $email. "; 
                    Telefone: ". $telefone;
                } 
                
                else { $mensagem = "Preencha pelo menos um dos campos."; }
        
            $databaseUrl = getenv("DATABASE_URL");
            $conexao = pg_connect($databaseUrl);

            pg_query_params(
                $conexao,
                "INSERT INTO ususarios (email) VALUES ($1)",
                array($email)
            );
        } 

                echo $mensagem;
            ?>
    </div>

</body>
</html>
