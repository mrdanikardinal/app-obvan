<!-- app/Views/product/search.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Search</title>
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script>
        $(function() {
            $("#search-input").autocomplete({
                source: function(request, response) {
                    $.ajax({
                        url: "<?= site_url('product/search') ?>",
                        dataType: "json",
                        data: {
                            keyword: request.term
                        },
                        success: function(data) {
                            response($.map(data, function(item) {
                                return {
                                    label: item.nama_barang,
                                    value: item.merk,
                                    data: item.merk // Menambahkan data item ke objek untuk digunakan di fungsi select
                                };
                            }));
                        }
                    });
                },
                minLength: 2,
                select: function(event, ui) {
                    console.log("Selected: " + ui.item.data.nama_barang);
                }
            });
        });
    </script>
</head>
<body>
    <h2>Product Search</h2>
    <label for="search-input">Search:</label>
    <input type="text" id="search-input">
</body>
</html>
