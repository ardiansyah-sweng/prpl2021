function Search()
{
    $('#movie-list').html(``);
    $.ajax({
        url: 'http://omdbapi.com',
        type: 'get',
        dataType: 'json',
        data: {
            'apikey' : 'd1eb7716',
            's' : $('#search-input').val()
        },
        success: function(result)
        {
            if(result.Response == "True")
            {
                let movies = result.Search;
                console.log(result);
                $.each(movies, function(i, data){
                    $('#movie-list').append(`
                        <div class="col-md-3">
                            <div class="card mb-4">
                                <img src="`+ data.Poster +`" class="card-img-top" alt="...">
                                <div class="card-body">
                                <h5 class="card-title">`+ data.Title +`</h5>
                                <h6 class="card-subtitle mb-2 text-muted">`+ data.Year +`</h6>
                                <a href="#" class="btn btn-primary">See More</a>
                                </div>
                            </div>
                        </div>
                    `)
                });
                $('#search-input').val(); 
            }
            else
            {
                $('#movie-list').html(`
                    <div class="col">
                        <h1 class="text-center">404 Not Found</h1>
                    </div>
                `);
            }
        }
    });
}

$('#search-button').on('click', function()
{
    Search();
});

$('#search-input').on('keyup', function(e)
{
    if(e.keyCode === 13)
    {
        Search();
    }
});