<!DOCTYPE html>
<html>
<head>
    <title>Car Specifications</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h1>Car Specifications</h1>
        <div class="row">
            <div class="col-md-6">
                <h2>Car List</h2>
                <ul id="car-list" class="list-group">
                    <?php
                    require_once 'dbconfig.php';

                    $query = "SELECT id, model, specs FROM products";
                    $result = $mysqli->query($query);

                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo '<li class="list-group-item" data-car-id="' . $row['id'] . '">' . $row['model'] . '</li>';
                        }
                    } else {
                        echo '<li class="list-group-item">No cars found.</li>';
                    }

                    $mysqli->close();
                    ?>
                </ul>
            </div>
            <div class="col-md-6">
                <h2>Car Specifications</h2>
                <div id="car-specs">
                    <!-- Car specifications will be displayed here using JavaScript -->
                </div>
            </div>
        </div>
    </div>
    <?php
require_once 'dbconfig.php';

if (isset($_GET['id'])) {
    $carId = $_GET['id'];

    $query = "SELECT specs FROM products WHERE id = $carId";
    $result = $mysqli->query($query);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $specs = json_decode($row['specs'], true);
        echo json_encode($specs);
    } else {
        echo json_encode(['error' => 'Car not found']);
    }
}


?>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const carList = document.getElementById('car-list');
            const carSpecs = document.getElementById('car-specs');

            carList.addEventListener('click', function(event) {
                const carId = event.target.getAttribute('data-car-id');

                if (carId) {
                    // Fetch car specs using AJAX
                    fetch('get_specs.php?id=' + carId)
                        .then(response => response.json())
                        .then(data => {
                            carSpecs.innerHTML = '';
                            for (const key in data) {
                                carSpecs.innerHTML += '<p><strong>' + key + ':</strong> ' + data[key] + '</p>';
                            }
                        })
                        .catch(error => console.error('Error:', error));
                }
            });
        });
    </script>
</body>
</html>
