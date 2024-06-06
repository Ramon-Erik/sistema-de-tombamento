<?php 
$caminho = __DIR__;
require_once($caminho . '\..\recursos\lib_fpdf\fpdf.php');
class Ambiente {
    public $pdo;

    public function __construct() {
        $this->pdo = new PDO("mysql:host=localhost; dbname=sis_tombamento","root","");
    }

    public function cadastrar_ambientes($nome, $complemento, $adm_responsavel) {
        try {
            $consulta = "insert into ambientes values(null, :nome, :complemento, :adm_responsavel)";
            $consulta_feita = $this->pdo->prepare($consulta);
            $consulta_feita->bindValue(':nome', $nome);
            $consulta_feita->bindValue(':complemento', $complemento);
            $consulta_feita->bindValue(':adm_responsavel', $adm_responsavel);
            $consulta_feita->execute();
            $ultimo_id = $this->pdo->lastInsertId();
            echo $ultimo_id;
            header("location: ../view/menu-principal/index.php?id=$ultimo_id&nome=$nome&compl=$complemento");
            session_start();
            $_SESSION['ambiente-cadastrado'] = 'sim';
        } catch (PDOException $e) {
                echo "Erro com a conexão <pre>" . $e;
        } catch (Exception $e) {
            echo "Erro genérico... " . $e;
        }
    }
    
    public function listar_ambientes($modo) {
        try {
            $consulta = "SELECT ambientes.id, ambientes.nome, ambientes.complemento, COUNT(itens.id) as total_itens from ambientes left join itens on ambientes.id = itens.id_ambiente GROUP by ambientes.id, ambientes.nome, ambientes.complemento;";
            $consulta_feita = $this->pdo->prepare($consulta);
            $consulta_feita->execute();
            if ($consulta_feita->rowCount()) {
                foreach ($consulta_feita as $ambiente) {
                    switch ($modo) {
                        case 'opt': 
                            echo '<option value="'. $ambiente['id'] . '">'. $ambiente['nome'] . ' ' . $ambiente['complemento'] . '</option>';
                            break;
                        case 'a': 
                            echo '<div class="linha-form"><div class="radio-ambiente">';
                            echo "<input type=\"radio\" name=\"ambientes\" value=\"$ambiente[id]\"></div>";
                            echo '<div class="btn-ambiente">';
                            echo "<a href=\"../ambiente-info/index.php?id=$ambiente[id]&nome=$ambiente[nome]&compl=$ambiente[complemento]\">";
                            echo "<span>$ambiente[nome] $ambiente[complemento]</span>";
                            echo "<span>itens: $ambiente[total_itens]</span>";
                            echo "</a></div></div>";
                            break;
                    }
                }
            } else {
                echo '<p>Parece que não existem ambientes cadastrados ainda...';
            }
        } catch (PDOException $e) {
                echo "Erro com a conexão " . $e;
        } catch (Exception $e) {
            echo "Erro genérico... " . $e;
        }
    }
    public function apagar_ambiente($id) {
        try {
            // echo '<pre>' . print_r($id);
            $consulta = "DELETE FROM `ambientes` WHERE id = :id;";
            $consulta_feita = $this->pdo->prepare($consulta);
            $consulta_feita->bindValue(':id', $id);
            $consulta_feita->execute();
            session_start();
            $_SESSION['ambiente-apagado'] = 'sim';
            header('location: ../view/menu-principal/index.php');
        } catch (PDOException $e) {
            // echo "Erro com a conexão <pre>" . $e;
            switch (explode(' ', $e)[1]) {
                case 'SQLSTATE[23000]:':
                    $_SESSION['ambiente-apagado'] = 'não';
                    $_SESSION['ambiente-apagado-msg'] = '<script>alert("Você não pode excluir esse ambiente, pois há um item armazenado nele.")</script>';
                    break;
                default:
                    $_SESSION['ambiente-apagado'] = 'não';
                    $_SESSION['ambiente-apagado-msg'] = '<script>alert("Algo de inesperado aconteceu!")</script>';
                    break;
                }
                // echo explode(' ', $e)[1]. $_SESSION['ambiente-apagado'];
                echo $_SESSION['ambiente-apagado-msg'];
                echo '<script>window.location.href="../view/menu-principal/index.php"</script>';
        } catch (Exception $e) {
            echo "Erro genérico... <pre>" . $e;
        }
    }
    public function relatorio_ambientes() {
        try {
            $consulta = "SELECT ambientes.id, ambientes.nome,ambientes.complemento, administrador.nome FROM `ambientes` inner join administrador on ambientes.adm_responsavel = administrador.id;";
            $consulta_feita = $this->pdo->prepare($consulta);
            $consulta_feita->execute();

            $pdf = new FPDF();
            $pdf->AddPage();
            $pdf->SetFOnt('arial', 'B', 12);

            $pdf->Cell(0, 5, mb_convert_encoding("Relatório de Ambientes Cadastrados",'ISO-8859-1', 'UTF-8'), 0, 1, 'C');
            $pdf->Cell(15, 5, 'ID', 1, 0, 'C');
            $pdf->Cell(55, 5, 'Nome', 1, 0, 'L');
            $pdf->Cell(40, 5, 'Complemento', 1, 0, 'C');
            $pdf->Cell(80, 5, 'Quem cadastrou', 1, 1, 'C');
            $pdf->SetFont('arial', '', 12);
            
            foreach ($consulta_feita as $valor) {
                // echo '<pre>';
                // print_r($valor);
                // echo '</pre>';
                $pdf->Cell(15, 5, mb_convert_encoding($valor['id'],'ISO-8859-1', 'UTF-8'), 1, 0, 'C');
                $pdf->Cell(55, 5, mb_convert_encoding($valor[1],'ISO-8859-1', 'UTF-8'), 1, 0, 'L');
                $pdf->Cell(40, 5, mb_convert_encoding($valor['complemento'],'ISO-8859-1', 'UTF-8'), 1, 0, 'L');
                $pdf->Cell(80, 5, mb_convert_encoding($valor[3],'ISO-8859-1', 'UTF-8'), 1, 1, 'C');
                // $pdf->Cell(25, 5, mb_convert_encoding($valor['data'],'ISO-8859-1', 'UTF-8'), 1, 0, 'C');
                $pdf->SetFont('arial', '', 12);
            }
            $pdf->Output();
        } catch (PDOException $e) {
            echo "Erro com a conexão " . $e;
        } catch (Exception $e) {
            echo "Erro genérico... " . $e;
        }
    }
}
?>