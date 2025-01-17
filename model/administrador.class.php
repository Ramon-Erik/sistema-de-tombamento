<?php 
class Administrador {
    public $pdo;
    public function __construct() {
        $this->pdo = new PDO("mysql:host=localhost; dbname=sis_tombamento","root","");
    }

    public function listar_adms () {
        try {
            $consulta = "select nome from administrador";
            $consulta_feita = $this->pdo->prepare($consulta);
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
            $consulta = 'select * from administrador where nome = :usr and senha = :senha';
            $consultar = $this->pdo->prepare($consulta);
            $consultar->bindValue(":usr", $usr);
            $consultar->bindValue(":senha", $senha);
            $consultar->execute();
            $resultado = $consultar->fetch(PDO::FETCH_ASSOC);
            session_start();
            if ($consultar->rowCount()) {
                $_SESSION['adm'] = $resultado['id'];
                $_SESSION['item-cadastrado'] = 'indefinido';
                $_SESSION['ambiente-cadastrado'] = 'indefinido';
                $_SESSION['item-apagado'] = 'indefinido';
                $_SESSION['ambiente-apagado'] = 'indefinido';
                // echo $resultado['nome'];
                // echo $_SESSION['adm'];
                header("location:../view/menu-principal/index.php");
            } else  {
                $_SESSION['adm'] = 'erro-senha';
                header("location:../view/sign-in/index.php");
            }
        } catch (PDOException $e) {
            echo "Erro com a conexão " . $e;
        } catch (Exception $e) {
            echo "Erro genérico... " . $e;
        }
    }
}
?>