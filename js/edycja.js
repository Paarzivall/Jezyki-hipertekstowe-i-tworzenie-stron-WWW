function pobieranieDanych()
{
	$.ajax({
		method:"POST",
		url:"skryptyPHP/pobierzWpis.php",
		data:{
			Id:document.getElementById('edit').value
		},
		success:function(response)
		{
			var dane=JSON.parse(response);
			$("#IdEdit").val(dane.Id);
			$("#TytulEdit").val(dane.Tytul);
			$("#TrescEdit").val(dane.Tresc);
			$('#modalEdytor').modal();
		}
	});
}
window.addEventListener("load", function()
{
	$("#edytuj").on("click",pobieranieDanych);
},false);