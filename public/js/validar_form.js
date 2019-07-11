
var status_function =  false;


function inputs_name_validar(...names){

	let campos =  new Array();

	if(!status_function){
		status_function = true;
		names.forEach(function(inputs){
			if(document.forms['form'][inputs].value == false){
				for (let i = 0; i < inputs.length; i++) {
					if(inputs.indexOf('id_') > -1){
						inputs = inputs.replace("id_", "_");
					}else{
						inputs = inputs.replace("_", " ");
					}
				}
				let transformar_minusculo = inputs.toLowerCase();
				campos.push({'Campos':transformar_minusculo, msg:'Preencha o campo '+ transformar_minusculo + '.' });
				return;
			}
		});
		if (campos.length > 0) {
			campos.forEach(function(validar){
				let paragrafo  =  document.createTextNode(validar.msg);
				let p = document.createElement('p');
				p.appendChild(paragrafo);
				document.querySelector('#msg').appendChild(p);
			});
			campos = new Array(0);
		}else{
			document.forms["form"].submit();
			document.forms['form']['button'].disabled = true;

		}
		let intervalo = window.setInterval(function(){
			status_function = false;
			document.querySelector('#msg').innerHTML = null ;
		},4000);
	}
};
