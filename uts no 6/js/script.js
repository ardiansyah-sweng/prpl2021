$('#search-button').on('click',function()
{
	$.ajax({
		url: 'http://omdbapi.com',
		type: 'get',
		dataType: 'json',
		data: {
			'apikey' : '86bdc16a',
			's': $('#search-input').val()
		},
		success: function(result)
		{
			if(result.Response == "True")
			{
				let movies = result.Search; 
				$.each(movies, function(i, data)
				{
$('#movie-list').append(`
<div class="col-md-4">
	<div class="card">
  	<img src="`+data.Poster+`" class="card-img-top" alt="...">
  	<div class="card-body">
    <h5 class="card-title">`+data.Title+`</h5>
    <h6 class="card-subtitle mb-2 text-muted">`+data.Year+`</h6>
    

    
  </div>
</div>
</div>
						`);

				});
		 	}
			else
			{
				$('#movie-list').html('<h1>Movie Not Found!</h1>')
			}
		}
	});

});