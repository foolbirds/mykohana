<table class="border">
<tr><td colspan="2"><?=$_SERVER["SERVER_SIGNATURE"]?></td></tr>
<tr><td><b>DOCUMENT_ROOT </b></td><td><?=$_SERVER["DOCUMENT_ROOT"]?></td></tr>
<tr><td><b>SERVER_SOFTWARE </b></td><td><?=$_SERVER["SERVER_SOFTWARE"]?></td></tr>
<tr><td><b>SERVER_ADDR </b></td><td><?=$_SERVER["SERVER_ADDR"]?></td></tr>
<tr><td><b>REMOTE_ADDR</b></td><td><?=$_SERVER["REMOTE_ADDR"]?></td></tr>
<tr><td><b>SERVER PORT </b></td><td><?=$_SERVER["SERVER_PORT"]?></td></tr>
</table>


<style type="text/css">
#phpinfo pre {margin: 0px; font-family: monospace;}
#phpinfo a:link {color: #000099; text-decoration: none; background-color: #ffffff;}
#phpinfo a:hover {text-decoration: underline;}
#phpinfo table {border-collapse: collapse; width:100%}
#phpinfo .center {text-align: center;}
#phpinfo .center table { margin-left: auto; margin-right: auto; text-align: left;}
#phpinfo .center th { text-align: center !important; }
#phpinfo td, th { border: 1px solid #000000; font-size: 100%; vertical-align: baseline;}
#phpinfo h1 {font-size: 150%;}
#phpinfo h2 {font-size: 125%;}
#phpinfo .p {text-align: left;}
#phpinfo .e {background-color: #ccccff; font-weight: bold; color: #000000;}
#phpinfo .h {background-color: #9999cc; font-weight: bold; color: #000000;}
#phpinfo .v {background-color: #cccccc; color: #000000;}
#phpinfo .vr {background-color: #cccccc; text-align: right; color: #000000;}
#phpinfo img {float: right; border: 0px;}
#phpinfo hr {width: 800px; background-color: #cccccc; border: 0px; height: 1px; color: #000000;} 
</style>

<div id="phpinfo">
<?php

ob_start () ;
phpinfo (INFO_VARIABLES) ;
$pinfo = ob_get_contents () ;
ob_end_clean () ;

// the name attribute "module_Zend Optimizer" of an anker-tag is not xhtml valide, so replace it with "module_Zend_Optimizer"
echo ( str_replace ( "module_Zend Optimizer", "module_Zend_Optimizer", preg_replace ( '%^.*<body>(.*)</body>.*$%ms', '$1', $pinfo ) ) ) ;

?>
</div>