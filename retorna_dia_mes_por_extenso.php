<?php

/* Created By: Kelvyn Carbone
* All Rights Reserved
* crie uma classe qualquer, eu gosto de chamar de util e inclua essa função você escolhe o que quer trazer por extenso
* e pode modificar como quiser, mantenha os créditos, Obrigado!
*/

public static function dataPorExtenso($data=null, $tipo=null)
            {
                $valor = explode("-", $data);
                $mes = array(
                    '01'=>'Janeiro',
                    '02'=>'Fevereiro',
                    '03'=>'Março',
                    '04'=>'Abril',
                    '05'=>'Maio',
                    '06'=>'Junho',
                    '07'=>'Julho',
                    '08'=>'Agosto',
                    '09'=>'Setembro',
                    '10'=>'Outubro',
                    '11'=>'Novembro',
                    '12'=>'Dezembro'
                );

                $dia = array(
                    'sun'=>'Domingo',
                    'mon'=>'Segunda-feira',
                    'tue'=>'Terça-feira',
                    'wed'=>'Quarta-feira',
                    'thu'=>'Quinta-feira',
                    'fri'=>'Sexta-feira',
                    'sat'=>'Sábado'
                );

                if($tipo==="mes")
                    return $mes[$valor[1]];
                else if($tipo==="dia")
                    {
                    $valor = mb_strtolower(date('D',strtotime($data)));
                    return $dia[$valor];
                    }
            }
            
// Mode de usar
echo NomeDaSuaClasse::dataPorExtenso($data, "mes"); //ou dia como desejar

?>
