$(document).ready(function(){
    $('#update-notification').on('click', function(e){
        e.preventDefault();
        const redirectTo = $(this).attr('href');
        console.log('clicked', $(this).data('id'));
        $.ajax({
            url: '/api/notification/update/'+$(this).data('id'),
            method: 'POST'
        }).then(function(){
            console.log('success');
            window.location = redirectTo;
        }).catch(function (error){
            console.log(error)
        });
    });
});
