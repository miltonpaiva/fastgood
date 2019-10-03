<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, shrink-to-fit=no, initial-scale=1">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>fastfood v1 - Start</title>

    <!-- Bootstrap Core CSS -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">    
        <div id="loginbox" style="margin-top:84px;" class="mainbox col-md-5 col-md-offset-3 col-sm-offset-5">                    
            <div class="panel panel-info" style="border: 1px solid rgb(225, 232, 237); border-radius: 4px;" >
                <div class="panel-heading" style="background:#337AB7;">
                    <div class="panel-title" style="color:white;">FastGood</div>
                    <div style="float:right;font-size:80%;position:relative;top:-10px;"><a href="#" style="color:white;">© 2019 Tedio's Company, Inc.</a></div>
                </div>     

                <div style="padding-top:30px" class="panel-body" >

                    <?php
                        if (isset($_GET['msg'])) {
                        $msg = $_GET['msg'];
                        switch ($msg) {
                            case 1:
                    ?>
                                <div class="message">
                                    <div class="alert alert-danger">
                                        <a href="index.php" class="close" data-dismiss="ater">&times;</a>
                                        <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
                                        <span class="sr-only">Error:</span>
                                        Usuário ou senha incorreta.
                                    </div>
                                </div>
                    <?php
                            }
                        }
                    ?>   
                    <?php
                        if (isset($_GET['msg'])) {
                        $msg = $_GET['msg'];
                        switch ($msg) {
                            case 2:
                    ?>
                                <div class="message">
                                    <div class="alert alert-success">
                                        <a href="index.php" class="close" data-dismiss="ater">&times;</a>
                                        <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
                                        <span class="sr-only">Error:</span>
                                        Você foi deslogado com sucesso!.
                                    </div>
                                </div>
                    <?php
                            }
                        }
                    ?>                            
                    <form id="loginform" class="form-horizontal" role="form" style="background:white;" action="includes/logado.php" method="post">
                                
                        <div style="margin-bottom:25px" class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                            <input type="text" class="form-control" name="login" placeholder="nome de usuário">                                        
                        </div>
                            
                        <div style="margin-bottom: 25px" class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                            <input type="password" class="form-control" name="senha" placeholder="senha" >
                        </div>
                                
                        <div style="margin-top:10px" class="form-group">
                            <!-- Button -->
                            <div class="col-sm-12 controls">
                              <input type="submit" value="Entrar" class="btn btn-success" style="width:415px;"/>

                            </div>
                        </div>  
                    </form>     
                </div>                     
            </div>  
        </div>
    </div>
</body>
</html>