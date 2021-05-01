<?php
try {
	$pdo = new PDO("mysql:dbname=projeto_ordenar;host=localhost", "root", "");
} catch(PDOException $e) {
	echo "ERRO: ".$e->getMessage();
	exit;
}
?>
<p>Selecione abaixo como deseja ordenar a tabela :</p>
<form method="GET">
    <select name="ordem" onchange = "this.form.submit()">

        <option></option>
        <option value="nome">Pelo nome</option>
        <option value="idade">Pela idade</option>

    </select>
</form>
<table border="1" width="400">
	<tr>
		<th>Nome</th>
		<th>Idade</th>
	</tr>
	<?php
        if(isset($_GET['ordem']) && !empty($_GET['ordem'])){
            $ordem = addslashes($_GET['ordem']);
            $sql = "SELECT * FROM usuarios ORDER BY ".$ordem;
        }else{
            $sql = "SELECT * FROM usuarios ";

        }       
        
        $sql = $pdo->query($sql);
        if($sql->rowCount() > 0) {

            foreach($sql->fetchAll() as $usuario):
                ?>

                <tr>
                    <td><?php echo $usuario['nome']; ?></td>
                    <td><?php echo $usuario['idade']; ?></td>
                </tr>

                <?php
            endforeach;

        }
	?>
</table>