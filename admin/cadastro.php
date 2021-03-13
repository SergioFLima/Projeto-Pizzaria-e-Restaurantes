<?php 
$titulo = "Pizza";
$pagina = "Cadastro";
$arquivo = explode(DIRECTORY_SEPARATOR, __FILE__);
require "header.php"; 
?>
<section id="full-layout">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-content">
                    <div class="card-header">
                        <h4 class="card-title">Cadastro</h4>
                        <h6 class="card-subtitle text-muted">Finalize o cadastro para continuar</h6>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <form class="form form-horizontal" action="req/finalizar_cadastro.php" method="POST">
                                <div class="form-body">
                                    <h4 class="form-section"><i class="ft-user"></i> Informações da Empresa</h4>
                                    <div class="form-group row">
                                        <label class="col-md-3 label-control" for="projectinput1">Nome: </label>
                                        <div class="col-md-9">
                                            <input type="text" id="projectinput1" class="form-control" name="nome">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-3 label-control" for="projectinput2">CNPJ: </label>
                                        <div class="col-md-9">
                                            <input type="text" id="projectinput2" class="form-control cnpj" name="cnpj">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-md-3 label-control" for="projectinput4">Telefone: </label>
                                        <div class="col-md-9">
                                            <input type="tel" id="projectinput4" class="form-control telefone" name="telefone">
                                        </div>
                                    </div>
                                    
                                    <div class="form-group row">
                                        <label class="col-md-3 label-control" for="projectinput4">Endereço: </label>
                                        <div class="col-md-9">
                                            <input type="text" id="projectinput4" class="form-control" name="endereco">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-md-3 label-control" for="projectinput10">CEP: </label>
                                        <div class="col-md-9">
                                            <input type="text" id="projectinput10" class="form-control cep" name="cep">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-md-3 label-control" for="projectinput9">Sobre a Empresa: </label>
                                        <div class="col-md-9">
                                            <textarea id="sobre" rows="5" class="form-control" name="sobre"></textarea>
                                        </div>
                                    </div>

                                    <h4 class="form-section"><i class="ft-file-text"></i> Informações Para Página</h4>

                                    <div class="form-group row">
                                        <label class="col-md-3 label-control" for="projectinput3">Nome para URL: </label>
                                        <div class="col-md-9">
                                            <input type="text" id="projectinput3" class="form-control" name="url">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-md-3 label-control">Logo: </label>
                                        <div class="col-md-9">
                                            <label id="projectinput8" class="file ">
                                                <input type="file" id="logo" name="logo">
                                                <span class="file-custom"></span>
                                            </label>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-md-3 label-control">Plano de Fundo: </label>
                                        <div class="col-md-9">
                                            <label id="projectinput8" class="file ">
                                                <input type="file" id="fundo" name="fundo">
                                                <span class="file-custom"></span>
                                            </label>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-md-3 label-control" for="projectinput3">Facebook: </label>
                                        <div class="col-md-9">
                                            <input type="text" id="projectinput3" class="form-control" name="facebook">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-md-3 label-control" for="projectinput3">Instagram: </label>
                                        <div class="col-md-9">
                                            <input type="text" id="projectinput3" class="form-control" name="instagram">
                                        </div>
                                    </div>


                                </div>

                                <div class="form-actions">
                                    <button type="submit" class="btn btn-raised btn-primary">
                                        <i class="fa fa-check-square-o"></i> Salvar
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php require "footer.php"; ?>
<script>
    $(document).ready(function(){
        $('.cnpj').mask('00.000.000/0000-00');
        $('.telefone').mask('(00) 00000-0000');
        $('.cep').mask('00000-000');
    });
</script>