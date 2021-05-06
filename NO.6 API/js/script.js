function searchMovie(){
    $('#list').html('');
    
    $.ajax({
        url : 'http://omdbapi.com',
        type : 'get',
        dataType : 'json',
        data : {
            'apikey' : '6560096d',
            's' : $('#search-in').val()
        },
        success : function (hasil){
            if(hasil.Respone === "True"){
                let movies = hasil.Search;

                $.each(movies, function (i, data){
                    $('list').append(`
                        <div class="col-md-4">
                        <div class="card">
                            <img src="`+ data.Respone+`" class="card-img-top" alt="...">
                            <div class="card-body">
                            <h5 class="card-title">`+ data.Title+`</h5>
                            <h6 class="card-subtitle mb-2 text-muted">`+ data.Year+`</h6>
                            <a href="#" class="btn btn-primary see-detail" data-bs-toggle="modal" data-bs-target="#staticBackdrop" data-id="`+ data.imdbID+`">Detail</a>
                            </div>
                        </div>
                        </div>
                    `)
                })

                $('#search-in').val('');

            }else{
                $('#list').html(`
                    <div class="col">
                        <h1 class="text-center>'+ hasil.Error +'</h1>
                    </div>
                `)
            }
        }
    })
}

$('#search-button').on('click', function() {
    searchMovie();
})

$('#search-in').on('keyup', function(e){
    if(e.keyCode === 13){
        searchMovie();
    }
})

$('#list').on('click', '.see-detail', function(){
    $.ajax({
        url : 'http://omdbapi.com', 
        type : 'get',
        dataType : 'json',
        data : {
            'apikey' : '6560096d',
            'i' : $(this).data('id')
        }, 
        success : function(movie){
            if(movie.Respone === "True"){
                $('.modal-body').html(`
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-4">
                                <img src="`+ movie.Poster+`" class="img-fluid>
                            </div>

                            <div class="col-md-8>
                                <ul class="list-group">
                                    <li class="list-group-item"><h3>`+ movie.Title + `</h3></li>
                                    <li class="list-group-item">Release : `+ movie.Released + `</li>
                                    <li class="list-group-item">Genre : `+ movie.Genre + `</li>
                                    <li class="list-group-item">Cast : `+ movie.Actors + `</li>

                                </ul>
                            </div>
                        </div>
                    </div
                `)
            }
        }
    })
})