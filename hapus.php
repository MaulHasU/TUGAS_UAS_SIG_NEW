<?php 
$objConnect = oci_connect("mvdemo","mvdemo","localhost/XE");  
$strSQL = "DELETE FROM SOLO WHERE ID = '".$_GET["id"]."' ";  
$objParse = oci_parse($objConnect, $strSQL);  
$objExecute = oci_execute($objParse, OCI_DEFAULT);  
if($objExecute)  
{  
oci_commit($objConnect);
echo "Record Berhasil Dihapus.";  
}  
else  
{  
oci_rollback($objConnect);  
$e = oci_error($objParse);  
echo "Error Delete [".$e['message']."]";  
}  
oci_close($objConnect);  
?>  