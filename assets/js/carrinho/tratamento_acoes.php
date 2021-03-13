<?php
//TRATAMENTO DE NOMES DAS SITUACOES
switch($situacao){
case "0":
$situacao_nome='Aguardando pagamento.';
break;
case "1":
$situacao_nome='Aguardando pagamento.';
break;
case "2":
$situacao_nome='Em análise.';
break;
case "3":
$situacao_nome='Paga.';
break;
case "4":
$situacao_nome='Disponível.';
break;
case "5":
$situacao_nome='Em disputa.';
break;
case "6":
$situacao_nome='Devolvida.';
break;
case "7":
$situacao_nome='Cancelada.';
break;

default:$situacao_nome='Situação não inserida.';
}
//TRATAMENTI DE NOMES DOS METODOS DE PAGAMENTO
switch($metodo){
case "1":
$metodo_nome='Cartão de crédito.';
break;
case "2":
$metodo_nome='Boleto.';
break;
case "3":
$metodo_nome='Débito online (TEF).';
break;
case "4":
$metodo_nome='Saldo PagSeguro.';
break;
case "5":
$metodo_nome='Oi Paggo.';
break;
default:$metodo_nome='Ainda não inserido.';
}
//TRATAMENTO DE NOMES DE MEIOS DE PAGAMENTOS
switch($meio_de_pagamento){
case "101":
$meio_de_pagamento_nome='Cartão de crédito Visa.';
break;
case "102":
$meio_de_pagamento_nome='Cartão de crédito MasterCard.';
break;
case "103":
$meio_de_pagamento_nome='Cartão de crédito American Express.';
break;
case "104":
$meio_de_pagamento_nome='Cartão de crédito Diners.';
break;
case "105":
$meio_de_pagamento_nome='Cartão de crédito Hipercard.';
break;
case "106":
$meio_de_pagamento_nome='Cartão de crédito Aura.';
break;
$meio_de_pagamento_nome='Cartão de crédito Elo.';
break;
case "108":
$meio_de_pagamento_nome='Cartão de crédito PLENOCard.';
break;
case "109":
$meio_de_pagamento_nome='Cartão de crédito PersonalCard.';
break;
case "110":
$meio_de_pagamento_nome='Cartão de crédito JCB.';
break;
case "111":
$meio_de_pagamento_nome='Cartão de crédito Discover.';
break;
case "112":
$meio_de_pagamento_nome='Cartão de crédito BrasilCard.';
break;
case "113":
$meio_de_pagamento_nome='Cartão de crédito FORTBRASIL.';
break;
case "114":
$meio_de_pagamento_nome='Cartão de crédito CARDBAN.';
break;
case "115":
$meio_de_pagamento_nome='Cartão de crédito VALECARD';
break;
case "116":
$meio_de_pagamento_nome='Cartão de crédito Cabal';
break;
case "117":
$meio_de_pagamento_nome='Cartão de crédito Mais!.';
break;
case "118":
$meio_de_pagamento_nome='Cartão de crédito Avista.';
break;
case "201":
$meio_de_pagamento_nome='Boleto Bradesco.';
break;
case "202":
$meio_de_pagamento_nome='Boleto Santander.';
break;
case "301":
$meio_de_pagamento_nome='Débito online Bradesco.';
break;
case "302":
$meio_de_pagamento_nome='Débito online Itaú.';
break;
case "303":
$meio_de_pagamento_nome='Débito online Unibanco.';
break;
case "304":
$meio_de_pagamento_nome='Débito online Banco do Brasil.';
break;
case "305":
$meio_de_pagamento_nome='Débito online Banco Real.';
break;
case "306":
$meio_de_pagamento_nome='Débito online Banrisul.';
break;
case "307":
$meio_de_pagamento_nome='Débito online HSBC.';
break;
case "401":
$meio_de_pagamento_nome='Saldo PagSeguro.';
break;
case "501":
$meio_de_pagamento_nome='Oi Paggo.';
break;
default:$meio_de_pagamento_nome="Ainda não inserido";
}
?>