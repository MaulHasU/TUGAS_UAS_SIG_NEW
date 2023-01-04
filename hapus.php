<?php 
include "db_conn.php"; 

# fungsi hapus
$sql = "DELETE FROM KECA_SOLO WHERE ID = '".$_GET["id"]."' ";  
$result = oci_parse($conn, $sql);  
$execute = oci_execute($result, OCI_DEFAULT);  
if($execute)  
{  
oci_commit($conn);
echo "Record Berhasil Dihapus.";  
}  
else  
{  
oci_rollback($conn);  
$e = oci_error($result);  
echo "Error Delete [".$e['message']."]";  
}  
oci_close($conn);  
?>  