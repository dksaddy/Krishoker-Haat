

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment History</title>
    <link rel="stylesheet" href="css/order-history.css">
    <link rel="stylesheet" href="css/footer.css">

    
</head>
<body>
<?php include('header.php') ?>

    <div class="container">
        <h1>Payment History</h1>
        <table>
            <tr>
                <th>Date</th>
                <th>Amount</th>
                <th>Product</th>
                <th>Buyer</th>
                <th>Seller</th>
            </tr>

            <?php
        
            // Query to fetch payment history
            $sql = "SELECT o.timestamp, o.quantity * p.price AS amount, p.p_name, b.name AS buyer, s.name AS seller
                    FROM `order_table` o
                    INNER JOIN product p ON o.product_id = p.product_id
                    INNER JOIN user b ON o.buyer_id = $user_id
                    INNER JOIN user s ON o.seller_id = s.user_id
                    ORDER BY o.timestamp DESC";

            $result = mysqli_query($conn, $sql);

            if (mysqli_num_rows($result) > 0) {
                // Output data of each row
                while($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>
                            <td>" . $row["timestamp"] . "</td>
                            <td>$" . number_format($row["amount"], 2) . "</td>
                            <td>" . $row["p_name"] . "</td>
                            <td>" . $row["buyer"] . "</td>
                            <td>" . $row["seller"] . "</td>
                          </tr>";
                }
            } else {
                echo "<tr><td colspan='5'>No payment history found</td></tr>";
            }

            // Close connection
            mysqli_close($conn);
            ?>
        </table>
    </div>
<!-- Code injected by live-server -->
<script>
	// <![CDATA[  <-- For SVG support
	if ('WebSocket' in window) {
		(function () {
			function refreshCSS() {
				var sheets = [].slice.call(document.getElementsByTagName("link"));
				var head = document.getElementsByTagName("head")[0];
				for (var i = 0; i < sheets.length; ++i) {
					var elem = sheets[i];
					var parent = elem.parentElement || head;
					parent.removeChild(elem);
					var rel = elem.rel;
					if (elem.href && typeof rel != "string" || rel.length == 0 || rel.toLowerCase() == "stylesheet") {
						var url = elem.href.replace(/(&|\?)_cacheOverride=\d+/, '');
						elem.href = url + (url.indexOf('?') >= 0 ? '&' : '?') + '_cacheOverride=' + (new Date().valueOf());
					}
					parent.appendChild(elem);
				}
			}
			var protocol = window.location.protocol === 'http:' ? 'ws://' : 'wss://';
			var address = protocol + window.location.host + window.location.pathname + '/ws';
			var socket = new WebSocket(address);
			socket.onmessage = function (msg) {
				if (msg.data == 'reload') window.location.reload();
				else if (msg.data == 'refreshcss') refreshCSS();
			};
			if (sessionStorage && !sessionStorage.getItem('IsThisFirstTime_Log_From_LiveServer')) {
				console.log('Live reload enabled.');
				sessionStorage.setItem('IsThisFirstTime_Log_From_LiveServer', true);
			}
		})();
	}
	else {
		console.error('Upgrade your browser. This Browser is NOT supported WebSocket for Live-Reloading.');
	}
	// ]]>
</script>
</body>
</html>
<?php include('footer.php') ?>
