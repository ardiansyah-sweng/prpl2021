$(document).ready(function(){
    function film(){
        $("#search").click(function () {
            $.ajax({
              url: "http://www.omdbapi.com",
              type: "GET",
              dataType: "json",
              data: {
                apiKey: "5c33b940",
                s: $("#keyword").val(),
              },
              success: function (result) {
                // console.log(result);
                if (result.Response == "True") {
                    let movies = result.Search
        
                    $.each(movie, function(index, data){
                        $("#list-movie").append('<div class="col-sm-3 text-center mt-2"><div class="card"> <div class="card-header"> ${data.title}</div>  <div class="card-body"><img src="${data.poster}" alt="" width="200"   <p><strong class="badge badge-warning"><h5>$data.Type</h5></strong></p><p class="card-text"> ${data.year}</p> <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#detailMovie" data-id="$(data.imbID">See detail</a> </div> </div> </div>')
                })
                    $('#keyword').val(' ')
                } else {
                    $("#list-movie").html();
                    <div class="col-sm-12"> <p class="alert alert-danger">$(result.Eror)</p></div>
            
                }
              }
            });
        },

    $('#search').click(function(){
            film()
        }),
    $('#keyboard').on('keyup',function(e){
            if(e.witch === 13){
                film()
            }
        }),
    $('#list-movie').on('click','.detail-movie', function(){
            console.log($(this).data('id'))

            $.ajax({
                url: "http://www.omdbapi.com",
                type: "GET",
                dataType: "json",
                data: {
                  apiKey: "5c33b940",
                  i: movieId
                },
                success: function(movie){
                    if( movie.Response === 'True'){
                        $('.modal-body').html ('<div class="row"><div class="col-sm-5"> <img scr="${movie.Poster}" alt="${movie.Title}" /> </div></div>')
                    }
               }
        })
    })
})
