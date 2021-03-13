//Script grafipel

/*------ VERIFICAR TOKEN DO REGISTRO ---------*/

function verifica_token(){
	
	token 	= document.getElementById('token_usuario').value;
	acao 	= "verifica_token";
	
	$.ajax({
		type:"POST",
		data: "token="+token+"&acao="+acao,
		url:"includes/controller/UsuariosController.php",
		success: function(msg){
			
			if(msg == 0){
				
				$('#mensagem_resposta_finaliza_cadastro').html("<p class='bg-danger' style='padding:10px;'>Erro. Este código é inválido ou o e-mail já foi confirmado.</p>");
				
			}else{
				
				location.href="login.php?msg=Email confirmado com sucesso. Faça login para comprar nossos produtos online!";
				
			}
			
		}
		
	});
		
}

/*--------- BUSCA DE CEP AUTOMATICO ----------*/

function findCEP() {
    if($.trim($("#cep").val()) != ""){
        $.getScript("http://cep.republicavirtual.com.br/web_cep.php?formato=javascript&cep="+$("#cep").val().replace("-", ""), function(){
            if(resultadoCEP["resultado"] == 1){
                $("input[name='rua']").val(unescape(resultadoCEP["tipo_logradouro"])+" "+unescape(resultadoCEP["logradouro"]));
                
                $("input[name='bairro']").val(unescape(resultadoCEP["bairro"]));
				$("input[name='cidade']").val(unescape(resultadoCEP["cidade"]));
				$("input[name='estado']").val(unescape(resultadoCEP["uf"]));
            }else{
                alert("Endereço nao encontrado.");
            }
        });
    }
}

/*--------- ALTERAR MINHA CONTA ----------*/


function altera_minha_conta(categoria){
	
	$('#minha_conta_direita').hide();
	
	$.ajax({
		type:"POST",
		url:"ajax/"+categoria+".php",
		success: function(msg){
			$('#minha_conta_direita').html(msg);
			$('#minha_conta_direita').fadeIn();
			
		}
	
	});
	
}

/*--------- ALTERAR SENHA MINHA CONTA ----------*/

function alterar_senha_enviar(){
	
	senha = document.getElementById('senha_enviar').value;
	
	$('#mensagem_resposta_senha').hide();
	
	$.ajax({
		type:"POST",
		data:"senha="+senha,
		url:"ajax/verificar_senha.php",
		success: function(msg){
			
			
			if(msg == 1){
				
				$('#alterar_campos_senha').hide();
				
				$.ajax({
					type:"POST",
					url:"ajax/formulario_alterar_senha.php",
					success: function(msg){
						
						$('#alterar_campos_senha').html(msg);
						$('#alterar_campos_senha').fadeIn();
						
					}
				
				});
				
				
					
			}else{
				
				$('#mensagem_resposta_senha').html("<p class='bg-danger' style='padding:10px;'>Erro. Sua senha está incorreta!.</p>");
				
				$('#mensagem_resposta_senha').fadeIn();
				
			}
			
		}
	
	});
	
}

/*--------- ALTERAR SENHA ----------*/

function alterar_senha(){
	
	senha 	= document.getElementById('senha_enviar_alterar').value;
	repetir = document.getElementById('repetir_senha_alterar').value;
	
	if(senha == ""){
		
		$('#mensagem_senha_branco').html("<span class='error_registro'>O campos senha não pode estar em branco!</div>");
		return false;
	}
	
	if(senha != repetir){
		
		$('#mensagem_senhas_diferentes').html("<span class='error_registro'>As senhas devem ser iguais!</div>");	
		return false;
	}
	
	$.ajax({
		type:"POST",
		data:"senha="+senha,
		url:"ajax/alterar_senha_final.php",
		success: function(msg){
			
			if(msg == 0){
				
				location.href="mensagem_editar.php?msg=Erro! Sua senha não pode estar em branco!"
				
			}else{
			
				location.href="mensagem_editar.php?msg=Senha alterada com sucesso!"
			
			}
		},
	});
}


/*--------- ENVIAR NEWSLETTER ----------*/

function enviar_newsletter(){
	
	email = document.getElementById('email_newsletter').value;
	
	
	var filter = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;
	if(filter.test(email)){
	 	
		$('#email_bottom_container').hide();
				
		$.ajax({
			type:"POST",
			data:"email="+email,
			url:"ajax/cadastrar_newsletter.php",
			success: function(msg){
				
				
				$('#email_bottom_container').html(msg);
				$('#email_bottom_container').fadeIn(msg);
				
			},
		});
	
	}else{
	  document.getElementById('email_newsletter').value="E-mail inválido";
	  
	  document.getElementById('email_newsletter').style.borderColor = "red";
	  
	  return false;
	}
	
}


/*--------- ADICIONAR PRODUTOS AO CARRINHO ----------*/

var qitens = 0;
function adicionar_produto_carinho(id, titulo, valor, categoria, itens){
	qitens = parseInt(itens);
        /*Adiciona o produto principal*/
        qitens++;
	$.ajax({
		type:"POST",
		data:"id="+id+"&titulo="+titulo+"&valor="+valor+"&categoria="+categoria+"&acao=adicionar_produto",
		url:"includes/controller/CarrinhoController.php",
		success: function(msg){
			$('#alterar_valores_topo').html(msg);							
                        $('#carrinho_topo_texto_numero').html(qitens);
                        window.location = "carrinho.php"; 
                        console.log(msg);
		}
	});
        
        //Adiciona os produtos complementares
        $("#subprodutos_campo > option").each( function(index, value) {
            if($(this).is(':selected')){
                produto = JSON.parse($(this).val());
                qitens++;
                $.ajax({
                    type:"POST",
                    data:"id="+produto.id+"&titulo="+produto.titulo+"&valor="+produto.valor+"&categoria="+produto.categoria+"&acao=adicionar_produto",
                    url:"includes/controller/CarrinhoController.php",
                    success: function(msg){
                        $('#alterar_valores_topo').html(msg);							
                        $('#carrinho_topo_texto_numero').html(qitens);
                        window.location.reload(); 
                    }
                });
            }
        });
}

var qitens = 0;


/*--------- TIRAR PRODUTOS DO CARRINHO ----------*/


function tirar_produto_carinho(id, valor){

	$.ajax({
		type:"POST",
		data:"id="+id+"&valor="+valor+"&acao=excluir_produto",
		url:"includes/controller/CarrinhoController.php",
		success: function(msg){
			
			window.location.reload(); 
			
		}
		
	});

}

/*--------- TIRAR PRODUTOS DO CARRINHO ----------*/

function atualizar_produto_carinho(id, valor){
	
	quantidade = document.getElementById("quantidade_produto_"+id).value;
	
		
	$.ajax({
		type:"POST",
		data:"id="+id+"&valor="+valor+"&quantidade="+quantidade+"&acao=atualizar_produto",
		url:"includes/controller/CarrinhoController.php",
		success: function(msg){
			
			window.location.reload(); 
			
		}
		
	});
	
	
}


/*--------- CALCULAR FRETE ----------*/

function calcular_frete_carrinho(){
	
	sCepOrigem = "89107-000";
	sCepDestino = document.getElementById('campo_cep_carrinho').value;
	nVlPeso = "1.000";
	nVlComprimento = "20";
	nVlAltura = "20";
	nVlLargura = "20";
	nCdServico = document.getElementById('codigo_servico_cep_carrinho').value;

	$.ajax({
		type:"POST",
		data:"sCepOrigem="+sCepOrigem+"&sCepDestino="+sCepDestino+"&nVlPeso="+nVlPeso+"&nVlComprimento="+nVlComprimento+"&nVlAltura="+nVlAltura+"&nVlLargura="+nVlLargura+"&nCdServico="+nCdServico+"&acao=calcular_frete",
		url:"includes/controller/CarrinhoController.php",
		success: function(msg){
            var val;
			
			$('#resposta_cep_carrinho').html(msg);

            if( valor_total_frete_hidden == 'retirar' ) {
                val = '0.00';
            } else {
                val = valor_total_frete_hidden;
            }
            document.getElementById('valor_frete').value = val;
            document.getElementById('frete_calculado').value = 1;

		}
		
	});
	
}

/*--------- VERIFICAR LOGIN CARRINHO ----------*/

function verifica_login_carrinho(id){
        
	if(id == false){
            not2();
	}
	else{
	location.href="grv_carrinho.php";		
	}	
}

/*--------- VER PRODUTO NO CARRINHO ----------*/

function ver_produto_carrinho(id, categoria){
	
	$.ajax({
		type:"POST",
		data:"id="+id+"&categoria="+categoria,
		url:"ajax/abrir_produto_modal.php",
		success: function(msg){
			
			$('#conteudo_ver_imovel_carrinho').html(msg);
			
		}
	});
	
	document.getElementById('abrir_info_imoveis_carrinho').click();
		
}

/*--------- MÁSCARA DE DINHEIRO ----------*/


function MascaraMoeda(objTextBox, SeparadorMilesimo, SeparadorDecimal, e){
    var sep = 0;
    var key = '';
    var i = j = 0;
    var len = len2 = 0;
    var strCheck = '0123456789';
    var aux = aux2 = '';
    var whichCode = (window.Event) ? e.which : e.keyCode;
    if (whichCode == 13) return true;
    key = String.fromCharCode(whichCode); // Valor para o código da Chave
    if (strCheck.indexOf(key) == -1) return false; // Chave inválida
    len = objTextBox.value.length;
    for(i = 0; i < len; i++)
        if ((objTextBox.value.charAt(i) != '0') && (objTextBox.value.charAt(i) != SeparadorDecimal)) break;
    aux = '';
    for(; i < len; i++)
        if (strCheck.indexOf(objTextBox.value.charAt(i))!=-1) aux += objTextBox.value.charAt(i);
    aux += key;
    len = aux.length;
    if (len == 0) objTextBox.value = '';
    if (len == 1) objTextBox.value = '0'+ SeparadorDecimal + '0' + aux;
    if (len == 2) objTextBox.value = '0'+ SeparadorDecimal + aux;
    if (len > 2) {
        aux2 = '';
        for (j = 0, i = len - 3; i >= 0; i--) {
            if (j == 3) {
                aux2 += SeparadorMilesimo;
                j = 0;
            }
            aux2 += aux.charAt(i);
            j++;
        }
        objTextBox.value = '';
        len2 = aux2.length;
        for (i = len2 - 1; i >= 0; i--)
        objTextBox.value += aux2.charAt(i);
        objTextBox.value += SeparadorDecimal + aux.substr(len - 2, len);
    }
    return false;
}


/*--------- FILTRO DE ACORDO COM CATEGORIA ----------*/


function altera_categoria_filtro(categoria){
	
	$('#conteudo_busca_alterar').hide();
	
	$.ajax({
		type:"POST",
		data:"categoria="+categoria,
		url:"ajax/alterar_conteudo_busca.php",
		success: function(msg){
			
			$('#conteudo_busca_alterar').html(msg);
			$('#conteudo_busca_alterar').fadeIn(msg);
			
		}
	});
		
	
}

/*--------- MODAL DE COMPRAS ----------*/


function alterar_modal_compras(id){
	
	
	$('#alterar_modal_compras').hide();
	
	$.ajax({
		type:"POST",
		data:"id="+id,
		url:"ajax/alterar_informacoes_compras_modal.php",
		success: function(msg){
			$('#alterar_modal_compras').html(msg);
			$('#alterar_modal_compras').fadeIn();
			
			document.getElementById('abrir_modal_info_compra').click();
		}
		
	});
	
	
	
}


/*--------- ENVIAR E-MAIL DE TOKEN ----------*/


function envia_email_token(){
	
	email = document.getElementById('email_enviar_token').value;
	
	$('#resposta_enviar_email').hide();
	
	$.ajax({
		type:"POST",
		data:"email="+email,
		url:"ajax/enviar_email_token_verificacao.php",
		success: function(msg){
			
			$('#resposta_enviar_email').html(msg);
			$('#resposta_enviar_email').fadeIn();
			
			email = document.getElementById('email_enviar_token').value = "";
		}
		
	});
		
}


/*--------- ENVIAR E-MAIL DE TOKEN ----------*/

function autentica_vale_presente(){
	
	$('#resposta_codigo_vale_presente').hide();
	
	codigo = document.getElementById('vale_presente_campo').value;
	
	$.ajax({
		type:"POST",
		data:"codigo="+codigo+"&acao=verificar_codigo_vale",
		url:"includes/controller/CarrinhoController.php",
		success: function(msg){
			
			if(msg == 1){
				
				$('#valor_total_vale_carrinho').hide();
				
				$.ajax({
					type:"POST",
					data:"acao=atualizar_valores_carrinho",
					url:"includes/controller/CarrinhoController.php",
					success: function(msg){
						
						$('#valor_total_vale_carrinho').html(msg);
						$('#valor_total_vale_carrinho').fadeIn();
					}
				});
				
				$('#fechar_modal_codigo').click();
			
			}else{
				
				$('#resposta_codigo_vale_presente').html("O código digitado não é válido ou já foi utilizado!");
				$('#resposta_codigo_vale_presente').fadeIn();
				
			}
			
		}
		
	});
	
}

/*---------- ALTERAR CAMPO DO CEP DO CARRINHO ---------------*/

function altera_campo_cep(selecionado){
	
	if(selecionado == 'retirar'){
		
		$('#campo_cep_esconder').hide();
		$('#botao_calcular_frete').hide();
		calcular_frete_carrinho();

		$('#tipo_frete').val('3');
	}
	
	if(selecionado == '41106'){
	
		$('#campo_cep_esconder').show();
		$('#botao_calcular_frete').show();
		$('#tipo_frete').val('1');
		
	}
	
	if(selecionado == '40010'){
	
		$('#campo_cep_esconder').show();
		$('#botao_calcular_frete').show();
        $('#tipo_frete').val('2');
		
	}
	

	
	
}

/*---------- ATUALIZAR  ---------------*/

function atualiza_rating(id_usuario, id_produto, valor_ranking){
	
	if(id_usuario == false){
	
		not2();
	
	}else{
		
		$.ajax({
			type: 'POST',
			data:'id_usuario='+id_usuario+'&id_produto='+id_produto+'&valor_ranking='+valor_ranking+'&acao=atualizar_ranking_produto',
			url:"includes/controller/CarrinhoController.php",
			success: function(){
				
				$('#valor_avaliacao').html('Obrigado pela sua avaliação! Você avaliou este produto como '+valor_ranking+' / 5. Acima está a média geral deste produto!');
				
				$('#altera_rating_campo').hide();	
				
				$('#loading_rating').show();
				
				$.ajax({
					type: 'POST',
					data:'id_produto='+id_produto+'&acao=exibe_ranking_produto',
					url:"ajax/exibe_ranking_produto.php",
					success: function(msg){
						$('#altera_rating_campo').html(msg);	
						$('#loading_rating').hide();
						$('#altera_rating_campo').fadeIn();	
					}
				});
				
			}
			
		});
		
	}
	
}

/*---------- ATUALIZAR  ---------------*/

function calculo_frete_produto_interna(){
	
	
	
	
	sCepOrigem = "89251-680";
	sCepDestino = document.getElementById('campo_frete_produto_interna').value;
	nVlPeso = "0.300";
	nVlComprimento = "20";
	nVlAltura = "3";
	nVlLargura = "13";
	nCdServico = '41106';
	
	
	$('#abrir_modal_calculo_frete').click();
	
	
	$.ajax({
		type:'POST',
		data:"sCepOrigem="+sCepOrigem+"&sCepDestino="+sCepDestino+"&nVlPeso="+nVlPeso+"&nVlComprimento="+nVlComprimento+"&nVlAltura="+nVlAltura+"&nVlLargura="+nVlLargura+"&nCdServico="+nCdServico+"&acao=calcular_frete_produto",
		url:"includes/controller/CarrinhoController.php",
		success: function(msg){
			
			$('#alterar_conteudo_calculo_frete').hide();
			$('#alterar_conteudo_calculo_frete').html(msg);
			$('#alterar_conteudo_calculo_frete').show();
				
		}
	});
	
}



