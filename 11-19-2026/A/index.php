<?php include "rates.php";

// details
$name = "Juan Dela Cruz";
$coloredPrinting = "Colored Printing";
$monochromePrinting = "Black and White Printing";
$customerType = "student";
$printType = "colored";
$pagesCopy = 5;
$copies = 3;
$paymentMethod = "cash";

$total = 0.00;
$paidAmount = 150;
$discount = 0;


$pricePerPage = match ($printType) {
    "blackWhite" => $blackWhiteRate,
    "colored" => $coloredRate,
    "photo" => $photoRate,
    default => 0
};

if ($customerType = "student") {
    $discount = 0.10;
    $discountVal = "10%";
}
elseif ($customerType = "faculty") {
    $discount = 0.05;
    $discountVal = "5%";
}
else {
    $discount = 0;
    $discountVal = "None";
}

switch ($paymentMethod) {
    case "cash": $paymentLabel = "Cash Payment"; break;
    case "gcash": $paymentLabel = "GCash Payment"; break;
    default: $paymentLabel = "Unknown Payment Method";
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Campus Printing Service</title>
</head>
<body>
    <h1>Campus Printing Service</h1>
    <fieldset>
        <label for="customername">CUSTOMER</label><input type="text" id="customername" value="<?= $name; ?>"></input><br>
        <label for="servicetype">SERVICE</label>
        <select id="servicetype" name="servicetype">
            <option value="Colored Printing"><?= $coloredPrinting ?></option>
            <option value="Black and White"><?= $monochromePrinting ?></option>
        </select><br>
        <label for="pagescopy">PAGES/COPY</label><input type="number" id="pagescopy" value="<?= $pagesCopy ?>"></input><br>
        <label for="copies">COPIES</label><input type="number" id="copies" value="<?= $copies ?>"></input><br>
        <label for="discount">DISCOUNT</label><input type="text" id="discount" value="<?php echo $discountVal ?>" disabled></input><br>
    </fieldset>

    <h2>Printing Breakdown</h2>   
    <?php for ($x = 1; $x <= $copies; $x++) {
        echo "Item ", $x,": Php ", $calc = $pagesCopy * $pricePerPage, "<br>";
        $total += $calc;}
        $totalWDiscount = $total - ($total * $discount);
        echo "Total: Php ", $totalWDiscount;
    ?>
</body>
</html>