<<<<<<< HEAD
function salvar_cadastro(id_form){
	array_cadastro = [];
	counter = 0;
	$(id_form).children().each(function(){
			var this_cmp = $(this).attr("type");
			if(this_cmp == "submit" || this_cmp == "reset"){}else if(this_cmp == "text"){		
					
					var valor = $(this).val();
					var nome = $(this).attr("name");
					
				array_cadastro[counter] = {nome_campo:nome,valor_campo:valor}	
			
					counter++;
			}
					});//each
	
	$.post("./sys/salvar_cadastro.php",{cadastro:array_cadastro},function(ret){
		
		alert(ret);
		
		
		});
	
	
=======
function salvar_cadastro(id_form){
	array_cadastro = [];
	counter = 0;
	$(id_form).children().each(function(){
			var this_cmp = $(this).attr("type");
			if(this_cmp == "submit" || this_cmp == "reset"){}else if(this_cmp == "text"){		
					
					var valor = $(this).val();
					var nome = $(this).attr("name");
					
				array_cadastro[counter] = {nome_campo:nome,valor_campo:valor}	
			
					counter++;
			}
					});//each
	
	$.post("./sys/salvar_cadastro.php",{cadastro:array_cadastro},function(ret){
		
		alert(ret);
		
		
		});
	
	
>>>>>>> 40c7b17021a79e7047c19cf431f3ffb2401544fc
	}//function