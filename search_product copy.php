<!DOCTYPE html>
<html>
<head>
    <title></title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <script type="text/javascript">
        var subcategory = {
            Brand: ["BMW", "MARCEDES","TOYOTA","NISSAN","AUDI","FORD","BUGATI","POURCHE"],
            Model: ["M5", "S500", "CAMRY","GTR","R8","MUSTANG GT500","DIVO","911 GTS"]
        }

        function makeSubmenu(value) {
            if (value.length == 0) document.getElementById("categorySelect").innerHTML = "<option></option>";
            else {
                var citiesOptions = "";
                for (categoryId in subcategory[value]) {
                    citiesOptions += "<option>" + subcategory[value][categoryId] + "</option>";
                }
                document.getElementById("categorySelect").innerHTML = citiesOptions;
            }
        }

        function displaySelected() {
            var country = document.getElementById("category").value;
            var city = document.getElementById("categorySelect").value;
            alert(country + "\n" + city);
        }

        function resetSelection() {
            document.getElementById("category").selectedIndex = 0;
            document.getElementById("categorySelect").selectedIndex = 0;
        }
    </script>
</head>
<body onload="resetSelection()">
    <select id="category" size="1" onchange="makeSubmenu(this.value)">
<option value="" disabled selected>Choose Category</option>
<option>Brand</option>
<option>Model</option>
</select>
    <select id="categorySelect" size="1">
<option value="" disabled selected>Choose Subcategory</option>
<option></option>
</select>
    <button onclick="displaySelected()">show selected</button>
</body>
</html>