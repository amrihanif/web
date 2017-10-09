$('.message a').click(function(){
   $('form').animate({height: "toggle", opacity: "toggle"}, "slow");
});
function validasi(){
	var username = document.getElementById("username").value;
	var password = document.getElementById("password").value;
	if(username != "" && password !=""){
		//header("location:login.php");
		return true;
	}else{
		alert('Silahkan isi username dan password !');
		
		return false;
		header("location:index.html");
	}
};