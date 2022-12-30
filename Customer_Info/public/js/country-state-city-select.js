$(document).ready(function() {
    $.ajaxSetup({
        headers: {
           'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
     });
    $('#country-dd').change(function(event) {
        var idCountry = this.value;
        $('#state-dd').html('');


        $.ajax({
            url: "api/fetch-state",
            type : 'POST',
            dataType: 'json',
            data: {country_id: idCountry,_token:"{{ csrf_token() }}"},
            success:function(response){
                console.log(response);
            }
        })
    })
});
