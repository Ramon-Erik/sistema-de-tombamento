<?php 
$caminho = __DIR__;
require_once($caminho . '\..\recursos\lib_fpdf\fpdf.php');
class Ambiente {
    public function cadastrar_ambientes($nome, $complemento, $adm_responsavel) {
        try {
            $pdo = new pdo("mysql:host=localhost; dbname=sis_tombamento", "root", "");
            $consulta = "insert into ambientes values(null, :nome, :complemento, :adm_responsavel)";
            $consulta_feita = $pdo->prepare($consulta);
            $consulta_feita->bindValue(':nome', $nome);
            $consulta_feita->bindValue(':complemento', $complemento);
            $consulta_feita->bindValue(':adm_responsavel', $adm_responsavel);
            $consulta_feita->execute();
            header('location: ../view/cadastrar/ambiente/index.php');
            
        } catch (PDOException $e) {
                echo "Erro com a conexão <pre>" . $e;
        } catch (Exception $e) {
            echo "Erro genérico... " . $e;
        }
    }
    
    public function listar_ambientes() {
        try {
            $pdo = new pdo("mysql:host=localhost; dbname=sis_tombamento", "root", "");
            $consulta = "select * from ambientes";
            $consulta_feita = $pdo->prepare($consulta);
            $consulta_feita->execute();
            foreach ($consulta_feita as $ambiente) {
                echo '<option value="'. $ambiente['id'] . '">'. $ambiente['nome'] . ' ' . $ambiente['complemento'] . '</option>';
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
            $pdo = new pdo("mysql:host=localhost; dbname=sis_tombamento", "root", "");
            $consulta = "DELETE FROM `ambientes` WHERE id = :id;";
            $consulta_feita = $pdo->prepare($consulta);
            $consulta_feita->bindValue(':id', $id);
            $consulta_feita->execute();
            header('location: ../view/excluir/ambiente/index.php');
        } catch (PDOException $e) {
            echo "Erro com a conexão <pre>" . $e;
        } catch (Exception $e) {
            echo "Erro genérico... <pre>" . $e;
        }
    }
    public function relatorio_ambientes() {
        try {
            $pdo = new pdo("mysql:host=localhost; dbname=sis_tombamento", "root", "");
            $consulta = "SELECT ambientes.id, ambientes.nome,ambientes.complemento, administrador.nome FROM `ambientes` inner join administrador on ambientes.adm_responsavel = administrador.id;";
            $consulta_feita = $pdo->prepare($consulta);
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