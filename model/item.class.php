<?php 

try {
    $caminho = __DIR__;
    require_once($caminho . '\..\recursos\lib_fpdf\fpdf.php');
}  catch (Exception $e) {
    echo "Erro genérico... <pre>" . $e;
}

class Item {
    public function cadastrar_item($nome, $estado,$modelo,$marca,$tombamento,$id_ambiente, $id_responsavel) {
        try {
            $pdo = new PDO("mysql:host=localhost; dbname=sis_tombamento","root","");
            $consulta = "insert into itens values(null,:nome,:estado,:modelo,:marca,:tombamento,:id_ambiente,:adm_responsavel)";
            $consulta_feita=$pdo->prepare($consulta);
            $consulta_feita->bindValue(":nome",$nome);
            $consulta_feita->bindValue(":estado",$estado);
            $consulta_feita->bindValue(":modelo",$modelo);
            $consulta_feita->bindValue(":marca",$marca);
            $consulta_feita->bindValue(":tombamento",$tombamento);
            $consulta_feita->bindValue(":id_ambiente",$id_ambiente);
            $consulta_feita->bindValue(":adm_responsavel",$id_responsavel);
            $consulta_feita->execute();
            session_start();
            $_SESSION['item-cadastrado'] = 'sim';
            header('location: ../view/cadastrar/item/index.php');
        } catch (PDOException $e) {
            echo "Erro com a conexão <pre>" . $e;
        } catch (Exception $e) {
            echo "Erro genérico... " . $e;
        }
    }
    public function listar_nomes_itens() {
        try {
            $pdo = new pdo("mysql:host=localhost; dbname=sis_tombamento", "root", "");
            $consulta = "SELECT nome from itens group by nome";
            $consulta_feita = $pdo->prepare($consulta);
            $consulta_feita->execute();
            if ($consulta_feita->rowCount() > 0) {
                foreach ($consulta_feita as $nome_item) {
                    echo "<option>$nome_item[nome]</option>";
                }

            } else {
                echo '<option>Não exstem itens cadastrados</option>';
            }
        } catch (PDOException $e) {
            echo "Erro com a conexão <pre>" . $e;
        } catch (Exception $e) {
            echo "Erro genérico... <pre>" . $e;
        }
    }
    public function listar_ambientes_itens() {
        try {
            $pdo = new pdo("mysql:host=localhost; dbname=sis_tombamento", "root", "");
            $consulta = "select ambientes.id, ambientes.nome, ambientes.complemento from itens inner join ambientes on itens.id_ambiente = ambientes.id group by ambientes.complemento;";
            $consulta_feita = $pdo->prepare($consulta);
            $consulta_feita->execute();
            if ($consulta_feita->rowCount() > 0) {
                foreach ($consulta_feita as $nome_item) {
                    echo "<option value=$nome_item[id]>$nome_item[nome] ($nome_item[complemento])</option>";
                }
            } else {
                echo '<option>Não exstem itens cadastrados</option>';
            }
        } catch (PDOException $e) {
            echo "Erro com a conexão <pre>" . $e;
        } catch (Exception $e) {
            echo "Erro genérico... <pre>" . $e;
        }
    }
    public function listar_adms_itens() {
        try {
            $pdo = new pdo("mysql:host=localhost; dbname=sis_tombamento", "root", "");
            $consulta = "select administrador.id, administrador.nome from itens inner join administrador on itens.adm_responsavel = administrador.id group by administrador.nome;";
            $consulta_feita = $pdo->prepare($consulta);
            $consulta_feita->execute();
            if ($consulta_feita->rowCount() > 0) {
                foreach ($consulta_feita as $nome_adm) {
                    echo "<option value=$nome_adm[id]>$nome_adm[nome]</option>";
                }
            } else {
                echo '<option>Não exstem itens cadastrados</option>';
            }
        } catch (PDOException $e) {
            echo "Erro com a conexão <pre>" . $e;
        } catch (Exception $e) {
            echo "Erro genérico... <pre>" . $e;
        }
    }
    public function pesquisar_nome_ambiente($id) {
        try {
            $pdo = new pdo("mysql:host=localhost; dbname=sis_tombamento", "root", "");
            $consulta = "select ambientes.nome, ambientes.complemento from itens inner join ambientes on itens.id_ambiente = :id group by ambientes.nome;";
            $consulta_feita = $pdo->prepare($consulta);
            $consulta_feita->bindValue(':id', $id);
            $consulta_feita->execute();
            foreach ($consulta_feita as $nome_ambiente_item) {
                return "$nome_ambiente_item[nome] ($nome_ambiente_item[complemento])";
            }
        } catch (PDOException $e) {
            echo "Erro com a conexão <pre>" . $e;
        } catch (Exception $e) {
            echo "Erro genérico... <pre>" . $e;
        }
    }
    public function pesquisar_nome_adm($id) {
        try {
            $pdo = new pdo("mysql:host=localhost; dbname=sis_tombamento", "root", "");
            $consulta = "select administrador.nome from itens inner join administrador on administrador.id = :id group by administrador.nome;";
            $consulta_feita = $pdo->prepare($consulta);
            $consulta_feita->bindValue(':id', $id);
            $consulta_feita->execute();
            foreach ($consulta_feita as $nome_adm_item) {
                return $nome_adm_item['nome'];
            }
        } catch (PDOException $e) {
            echo "Erro com a conexão <pre>" . $e;
        } catch (Exception $e) {
            echo "Erro genérico... <pre>" . $e;
        }
    }
    public function listar_itens($nome, $id_ambiente, $id_adm) {
        try {
            $pdo = new pdo("mysql:host=localhost; dbname=sis_tombamento", "root", "");
            $consulta = "select itens.id, itens.modelo, itens.marca, itens.estado, itens.tombamento from itens where id_ambiente = :id_ambiente and adm_responsavel = :id_adm and nome = :nome;";
            $consulta_feita = $pdo->prepare($consulta);
            $consulta_feita->bindValue(':nome', $nome);
            $consulta_feita->bindValue(':id_ambiente', $id_ambiente);
            $consulta_feita->bindValue(':id_adm', $id_adm);
            $consulta_feita->execute();
            if ($consulta_feita->rowCount()) {
                echo '<table><thead><tr><th scope="col"></th><th scope="col">Marca</th><th scope="col">Modelo</th><th scope="col">Estado</th><th scope="col">Tombamento</th></tr></thead>';
            } else {
                echo '<div class="campo"><div class="linha-form"><p>Não existem itens cadastrados nos parâmetros passados.</p></div></div>';
            }
            foreach ($consulta_feita as $item) {
                if ($consulta_feita->rowCount() > 0) {
                    echo "<tr><td><input type=\"radio\" name=\"item\" value=\"$item[id]\" required></td><td>$item[marca]</td><td>$item[modelo]</td><td>$item[estado]</td><td>$item[tombamento]</td></tr>";
                }
            }
        } catch (PDOException $e) {
            echo "Erro com a conexão <pre>" . $e;
        } catch (Exception $e) {
            echo "Erro genérico... <pre>" . $e;
        }
    }
    public function listar_itens_v2($id_ambiente) {
        try {
            $pdo = new pdo("mysql:host=localhost; dbname=sis_tombamento", "root", "");
            $consulta = "select itens.id, itens.modelo, itens.marca, itens.estado, itens.tombamento from itens where id_ambiente = :id_ambiente";
            $consulta_feita = $pdo->prepare($consulta);
            $consulta_feita->bindValue(':id_ambiente', $id_ambiente);
            $consulta_feita->execute();
            if ($consulta_feita->rowCount()) {
                echo '<div class="container-tabela"><table>';
                echo '<thead><tr>';
                echo '<th scope="col"></th>';
                echo '<th scope="col">Marca</th>';
                echo '<th scope="col">Modelo</th>';
                echo '<th scope="col">Estado</th>';
                echo '<th scope="col">Tombamento</th>';
                echo '</tr></thead><tbody>';
                foreach ($consulta_feita as $item) {
                        echo "<tr><td><input type=\"radio\" name=\"item\" value=\"$item[id]\" required></td><td>$item[marca]</td><td>$item[modelo]</td><td>$item[estado]</td><td>$item[tombamento]</td></tr>";
                }
                echo '</tbody></table></div>';
            } else {
                echo '<div class="campo"><div class="linha-form"><p>Não existem itens cadastrados nos parâmetros passados.</p></div></div>';
            }
        } catch (PDOException $e) {
            echo "Erro com a conexão <pre>" . $e;
        } catch (Exception $e) {
            echo "Erro genérico... <pre>" . $e;
        }
    }
    public function apagar_item($id, $id_amb, $nome_amb, $compl) {
        try {
            // echo '<pre>' . print_r($id);
            $pdo = new pdo("mysql:host=localhost; dbname=sis_tombamento", "root", "");
            $consulta = "DELETE FROM `itens` WHERE id = :id;";
            $consulta_feita = $pdo->prepare($consulta);
            $consulta_feita->bindValue(':id', $id);
            $consulta_feita->execute();
            $_SESSION['item-apagado'] = 'sim';
            header("location: ../view/ambiente-info/index.php?id=$id_amb&nome=$nome_amb&compl=$compl");

        } catch (PDOException $e) {
            echo "Erro com a conexão <pre>" . $e;
        } catch (Exception $e) {
            echo "Erro genérico... <pre>" . $e;
        }
    }
    public function relatar_itens() {
        try {
            $pdo = new pdo("mysql:host=localhost; dbname=sis_tombamento", "root", "");
            $consulta = "SELECT itens.id, itens.nome,itens.estado, itens.modelo, itens.marca, itens.tombamento, ambientes.nome, administrador.nome FROM `itens` inner join administrador on itens.adm_responsavel = administrador.id inner join ambientes on itens.id_ambiente = ambientes.id;";
            $consulta_feita = $pdo->prepare($consulta);
            $consulta_feita->execute();

            $pdf = new FPDF();
            $pdf->AddPage();
            $pdf->SetFOnt('arial', 'B', 12);
            $pdf->SetLeftMargin(4);
            
            $pdf->Cell(0, 5, mb_convert_encoding("Relatório de Itens Cadastrados",'ISO-8859-1', 'UTF-8'), 0, 1, 'C');
            $pdf->Ln();
            $pdf->Cell(15, 5, 'ID', 1, 0, 'C');
            $pdf->Cell(35, 5, 'Nome', 1, 0, 'L');
            $pdf->Cell(20, 5, 'Modelo', 1, 0, 'C');
            $pdf->Cell(20, 5, 'Marca', 1, 0, 'C');
            $pdf->Cell(40, 5, 'Tombamento', 1, 0, 'C');
            $pdf->Cell(30, 5, mb_convert_encoding('Locação','ISO-8859-1', 'UTF-8'), 1, 0, 'C');
            $pdf->Cell(40, 5, 'ADM', 1, 1, 'C');
            $pdf->SetFont('arial', '', 12);
            
            foreach ($consulta_feita as $valor) {
                // echo '<pre>';
                // print_r($valor);
                // echo '</pre>';
                $pdf->Cell(15, 5, mb_convert_encoding($valor['id'],'ISO-8859-1', 'UTF-8'), 1, 0, 'C');
                $pdf->Cell(35, 5, mb_convert_encoding($valor[1],'ISO-8859-1', 'UTF-8'), 1, 0, 'L');
                $pdf->Cell(20, 5, mb_convert_encoding($valor['modelo'],'ISO-8859-1', 'UTF-8'), 1, 0, 'C');
                $pdf->Cell(20, 5, mb_convert_encoding($valor['marca'],'ISO-8859-1', 'UTF-8'), 1, 0, 'C');
                $pdf->Cell(40, 5, mb_convert_encoding($valor['tombamento'],'ISO-8859-1', 'UTF-8'), 1, 0, 'C');
                $pdf->Cell(30, 5, mb_convert_encoding($valor['6'],'ISO-8859-1', 'UTF-8'), 1, 0, 'C');
                $pdf->Cell(40, 5, mb_convert_encoding($valor[7],'ISO-8859-1', 'UTF-8'), 1, 1, 'C');
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