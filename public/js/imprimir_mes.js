let meses = [];

class mes{
	constructor(numero_mes,mes){
		this.numero_mes = numero_mes;
		this.mes = mes;
	}
}

let option = new mes('','Selecionar opção');
let mes_janeiro = new mes('1','Janeiro');
let mes_fevereiro = new mes('2','Fevereiro'); 
let mes_marco = new mes('3','Março');
let mes_abril = new mes('4','Abril');
let mes_maio= new mes('5','Maio');
let mes_junho = new mes('6','Junho');
let mes_julho = new mes('7','Julho');
let mes_agosto = new mes('8','Agosto');
let mes_setembro = new mes('9','Setembro');
let mes_outubro = new mes('10','Outubro');
let mes_novembro = new mes('11','Novembro');
let mes_dezembro = new mes('12','Dezembro');

meses.push(option,mes_janeiro,mes_fevereiro,mes_marco,mes_abril,mes_maio,mes_junho,mes_julho,mes_agosto,mes_setembro,mes_outubro,mes_novembro,mes_dezembro);


try{
	if(document.querySelector('#mes') == null) throw 'Recurso não suportado';
	meses.forEach(function(dados) {
		let option = document.createElement('option');
		let option_text =  document.createTextNode(dados.numero_mes);

		option.setAttribute('value',dados.numero_mes);
		option.appendChild(option_text);
			
		document.querySelector('#mes').appendChild(option);
		document.querySelector('#mes').addEventListener('change', function(evt){
			for (var i = 0; i < meses.length; i++) {
				if(meses[i].numero_mes == evt.target.value){
					document.querySelector('#nome_mes').value = meses[i].mes ;
				}
			}
		 	
		})
	});
}
catch(err) {
	console.log(err);
}
