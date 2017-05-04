function rafraichirOuPas(joueur){
    $.ajax({
    type:"GET",
    url:"./interrogeEtat.php",
    data:"joueur="+joueur,
    success: function(server_response){
        if( server_response.trim() == '0' ){
	   //$("#infoRefresh").append("<p>Rafraichir</p>").show();
            window.location.reload();
        }else{
            //$("#infoRefresh").append("<p>Ne pas rafraichir</p>").show();
        }
}
});


}

