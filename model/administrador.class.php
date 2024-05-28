<?php 
class Administrador {
    public function listar_adms () {
        try {
            $pdo = new pdo("mysql:host=localhost; dbname=sis_tombamento", "root", "");
            $consulta = "select nome from administrador";
            $consulta_feita = $pdo->prepare($consulta);
            $consulta_feita->execute();

            $cursos = [];
            foreach ($consulta_feita as $value) {
                $nomeCurso = $value['nome'];
                $partes = explode(' ', $nomeCurso);
                $grupo = $partes[0];
                if ($partes[0] == "Meio") {
                    $grupo = $grupo . ' ' . $partes[1];
                }

                
                if (!isset($cursos[$grupo])) {
                    $cursos[$grupo] = [];
                }
                $cursos[$grupo][] = $nomeCurso;
            }

            foreach ($cursos as $grupo => $opcoes) {
                echo "<optgroup label=\"$grupo\">";
                foreach ($opcoes as $opcao) {
                    echo "<option>$opcao</option>";
                }
                echo "</optgroup>";
            }
        } catch (PDOException $e) {
            echo "Erro com a conexão " . $e;
        } catch (Exception $e) {
            echo "Erro genérico... " . $e;
        }
    }
    public function login($usr,$senha) {
        try {
            $pdo = new pdo("mysql:host=localhost; dbname=sis_tombamento", "root", "");
            $consulta = 'select * from administrador where nome = :usr and senha = :senha';
            
            $consultar = $pdo->prepare($consulta);
            $consultar->bindValue(":usr", $usr);
            $consultar->bindValue(":senha", $senha);
            $consultar->execute();
            $resultado = $consultar->fetch(PDO::FETCH_ASSOC);
            if ($resultado['senha'] == $senha) {
                session_start();
                $_SESSION['adm'] = $resultado['id'];
                // echo $resultado['nome'];
                // echo $_SESSION['adm'];
                header("location:../view/menu-principal/index.php");
            } else  {
                var_dump($resultado);
                echo "<p>erro ao verificar senha. nome $usr senha $senha </p><pre>". print_r($resultado).'</pre>';
            }

        } catch (PDOException $e) {
            echo "Erro com a conexão " . $e;
        } catch (Exception $e) {
            echo "Erro genérico... " . $e;
        }
    }
}
?>