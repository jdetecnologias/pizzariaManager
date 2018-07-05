$(document).ready(function(){
$(document).on("click","#menu_opt",function(){
		var menu = $(this).next();
		
		if(menu.is(":hidden")){
				menu.slideDown();
				
				}
			else{
				menu.slideUp();
				
				}	
		
		
	
	
	
	
	
});	
$(document).on("blur",".qtd_carac",function(){
		if($(this).val()== ""){}
		
		else{
		var minimo = $(this).attr("qtd_carac_min");
		var maximo = $(this).attr("qtd_carac_max");
		validar_qtd_caracteres(".qtd_carac",minimo,maximo);
		
		alert(msn);
		}
	});	
	
	
	
	
$(document).on("click","#cadastro p a",function(){
		identificador = $("#cadastro #form_cadastro");
		
			if(identificador.is(":hidden")){
				identificador.slideDown();
				
				}
			else{
				identificador.slideUp();
				
				}	
		
				
	
	});	
	
	
$(document).on("click","#form_cadastro #cadastrar",function(){
		
		//validar_dados("#form_cadastro");
		salvar_cadastro("#form_cadastro");
	});
	
$(document).on("blur","#rpt_senha",function(){
		
		//validar_dados("#form_cadastro");
		
		id_form = $(this).parent().attr("id");
		id_form = "#"+id_form;
		
		validar_senha(id_form);
	});	
	
	
	
	
$(document).on("blur",".int",function(){
	
	validar_tipo("int",$(this).parent().attr("id"),$(this).val());
	
	});	
	
$(document).on("blur","input[type='email']",function(){

	var este_cmp = $(this);
	if(este_cmp.val() == ""){}
	else{
	validar_email(este_cmp);
	}
	});		
	
	});
	
	
	