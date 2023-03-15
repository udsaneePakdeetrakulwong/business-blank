<html> <head>
<title> Display Selected Customer Information 65</title>
</head>
<body>

<?php
    if (isset($_GET["CustomerID"])) 
    {
        $strCustomerID = $_GET["CustomerID"];
    }
    echo $strCustomerID;

    require "connectMid.php";
    $sql = "SELECT * FROM customer,country WHERE customer.countrycode = country.countrycode AND CustomerID = ?";
    $params = array($strCustomerID);
    $stmt = $dbHandler->prepare($sql);
    $stmt->execute($params);
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
?>
<table width="300" border="1">
  <tr>
    <th width="325">รหัสลูกค้าสมาชิก</th>
    <td width="240"><?php echo $result["CustomerID"]; ?></td>
  </tr>

  <tr>
    <th width="130">ชื่อ</th>
    <td><?php echo $result["Name"]; ?></td>
  </tr>
  <tr>
    <th width="130">BirthDate</th>
    <td><?php echo $result["Birthdate"]; ?></td>
  </tr>

  <tr>
    <th width="130">Email</th>
    <td><?php echo $result["Email"]; ?></td>
  </tr>

  <tr>
    <th width="130">Country</th>
    <td><?php echo $result["CountryName"]; ?></td>
  </tr>
  
  <tr>
    <th width="130">OutstandingDebt</th>
    <td><?php echo $result["OutstandingDebt"]; ?></td>
    </tr>
  </table>
<?php
$dbHandler = null;
?>
</body>
</html>
