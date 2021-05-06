$('#search-button').on('click', function(){
    $.ajax({
        url: 'http://omdbapi.com',
        type: 'get',
        dataType: 'json',
        data: {
            'apikey': 'cbcf5c53',
            's': $('#search-input'.val()    
            )},
        success: function (result) {
            if (result.Response == "True") {
                let movies = result.Search;

                $.each(movies, function(i, data){
                    $('#movie-list').append(`
                        <div class="card" style="width: 18rem;">
                            <img src="`+ data.Poster+`" class="card-img-top" alt="...">
                            <div class="card-body">
                            <h5 class="card-title">`+data.Title+`</h5>
                            <h6 class="card-subtitle">`+data.Year+`</h6>
                            <a href="#" class="btn btn-primary">lihat detail</a>
                        </div>
                  </div>
                    `);
                })
            } else {
                $('#movie-list').html(`
                    <div class="col">
                        <h1 class ="text center>` + result.Error + `</h1>
                    </div>    
                `)                
            }
        }        
    });
}); 