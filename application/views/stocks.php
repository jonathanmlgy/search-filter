<!DOCTYPE html>
<html>
<head>
    <title>All Assignments</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>
         $(document).ready(function()
            {
                $.get('/stocks/index_html', function(res) 
                {
                    $('.wrapper').html(res);
                });

                $(document).on('change', 'form', function()
                {
                    var form = $(this);
                    $.post(form.attr('action'), form.serialize(), function(res) 
                    {
                        $('.wrapper').html(res);
                    });
                    return false;
                });
            });
    </script>
</head>
<body>
    <form method="post" action="/stocks/filter">
            <input type="search" name="search" placeholder="Search by name">
            <input type="number" name="price_min" placeholder="$min">
            <input type="number" name="price_max" placeholder="$max">
            <label>Track:</label>
            <select id="orderby" name="orderby">
                <option value="ASC">Low to high price</option>
                <option value="DESC">High to low price</option>
            </select>
    </form>
    <div class='wrapper'>
    </div>
</body>
</html>