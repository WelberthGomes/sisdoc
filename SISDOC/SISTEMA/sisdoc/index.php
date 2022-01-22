 <?php if(!isset($_SESSION)){ session_start(); } ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <title>..:: SisDoc ::..</title>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />        
    <link rel="stylesheet" href="css/style.css" type="text/css"/>
    <script type="text/javascript" src="admin/js/library.js"></script>
    <script type="text/javascript" src="admin/js/jquery.validate.js"></script>
    <script type="text/javascript" src="admin/js/jquery-latest.min.js"></script>
</head>

    
<body>
    
    <div id="wrapper">

        <div id="header">
                <?php require_once 'topo.php'; ?>
        </div>

        <div id="menu">
            <?php require_once 'menu.php'; ?>

        </div>

        <div id="conteudo">

            <?php                
            if(!isset($_GET['p'])){
                header("location: index.php?p=login");                     
            }
            else if (file_exists("{$_GET['p']}.php")){
                require_once "{$_GET['p']}.php";
            }
            else
                header("location: index.php?p=notfound");          
            ?>
        </div>

    </div>

        <div id="footer">
            <?php require_once 'rodape.php'; ?>
        </div>
</body>
    
    
</html>