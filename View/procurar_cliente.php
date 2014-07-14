<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>Scoa</title>
    <meta http-equiv="content-type" content="text/html;charset=iso-8859-1" />
    <meta name="description" content="Scoa Sistema de controle Allink" />
    <meta name="author" content="Allink Transportes Internacionais Ltda" />
    <meta name="robots" content="noindex,nofollow" />
    <meta name="robots" content="noarchive" />
    <link href="/Estilos/scoa.css" rel="stylesheet" type="text/css" />
    <link href="/Libs/jquery-ui-1.10.4/css/redmond/jquery-ui-1.10.4.custom.css" rel="stylesheet" type="text/css" />
    <script type="text/javascript" src="/Libs/jquery-ui-1.10.4/js/jquery-1.10.2.js"></script>
    <script type="text/javascript" src="/Libs/jquery-ui-1.10.4/js/jquery-ui-1.10.4.custom.js"></script>
    <script type="text/javascript" src="js/procurar_cliente.js"></script>
</head>
<body>
<form action="/Clientes/gerenciar_tarifario_cliente/index.php/salvar" method="post">
    <div class="principal">
        <p class="titulo">GERENCIAR TARIFÁRIO DO CLIENTE</p>
        <div class="container_elemento">
            <label class="label">Cliente</label>
            <input type="text" id="cliente" name="cliente" value="" size="" />
            <input type="hidden" id="id_cliente" name="id_cliente" value=""/>
            <div id="cliente_selecionado"></div>
        </div>
        <div class="container_elemento">
            <label class="label">País</label>
            <input type="text" id="pais" name="pais" value="" />            
        </div>
        <div class="container_elemento">
            <label class="label">Países Selecionados</label>
            <select multiple="multiple" name="paises_selecionados[]" id="paises_selecionados" size="10" ></select>
            <input type="button" name="remover_pais" id="remover_pais" value="Remover" />
        </div>
        
        <div class="botoes">
            <label class="label">&nbsp;</label>
            <input type="button" id="salvar" name="salvar" value="Salvar" />
            <input type="button" value="Voltar" />
            <input type="button" value="Consultar" />
        </div>
    </div>
</form>
</body>
</html>