$('#search').on('keyup', function() {
    var query = $(this).val();

    $.ajax({
        url: "/searchBook",
        type: "GET",
        data: { query: query },
        success: function(results) {
            // Clear previous results
            $('#myTable tbody').empty();
            // Populate table with search results
            $('#myTable tbody').html(results);
            
        }
    });
});

$('#category-filter').on('change', function() {
    var selectedCategory = $(this).val();

    $.ajax({
        url: "/filterByCategory",
        type: "GET",
        data: { query: selectedCategory },
        success: function(results) {
            // Clear previous results
            $('#myTable tbody').empty();
            console.log(results);
            // Populate table with filtered books
            $.each(results, function(index, book) {
                $('#myTable tbody').append('<tr>' +
                    '<td class="text-center">' + book.id + '</td>' +
                    '<td class="text-center">' + book.title + '</td>' +
                    '<td class="text-center">' + book.author + '</td>' +
                    '<td class="text-center">' + book.pages + '</td>' +
                    '<td class="text-center">' + book.category + '</td>' +
                    '<td class="text-center">' + book.book_status + '</td>' +
                    '<td class="text-center">' + book.observation + '</td>' +
                    '<td class="text-center">' + book.status + '</td>' +
                    '</tr>');
            });
        }
    });
});