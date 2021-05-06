function searchMovie() {
    $('#list').html('')

    $.ajax({
        url: 'https://omdbapi.com',
        type: 'get',
        dataType: 'json',
        data: {
            'apikey' : 'dca61bcc',
            's' : $('#input').val()
        },
        success: function (result) {
            if (result.Response == "True"){
                console.log(result)
                let movies = result.Search
                $.each(movies, function (i, data) {
                    $('#list').append(`
                    <div class="col-sm-3">
                        <div class="card bg-transparent text-dark">
                            <img src="`+ data.Poster+`" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">`+ data.Title +`</h5>
                                <p class="card-text">Year : `+ data.Year +`</p>
                                <p class="card-text">Type : `+ data.Type +`</p>    
                            </div>
                        </div>
                    </div>
                    `)
                })
            }
            else{
                $('#list').html('<h2 class="text-center">Movie not found...</h2>')
            }
        }

    });
}

$('#button-search').on('click',function () {
    searchMovie();
});

$('#input').on('keyup', function (enter) {
    if(enter.keyCode === 13){
        searchMovie();
    }
})