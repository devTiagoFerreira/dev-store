function subtrair() {
    let numero = parseInt(document.getElementById('numero').innerHTML);
    let valor = document.getElementById('valor').innerHTML.replace(',', '.');
    parseFloat(valor);
    if (numero > 1) {
        valor = valor / numero;
        numero -= 1;
        valor *= numero;
        document.getElementById('numero').innerHTML = numero;
		document.getElementById('qtd').value = numero;
        document.getElementById('valor').innerHTML = valor.toFixed(2).toString().replace('.', ',');
    }
}

function adicionar() {
    let numero = parseInt(document.getElementById('numero').innerHTML);
    let valor = document.getElementById('valor').innerHTML.replace(',', '.');
    parseFloat(valor);
    valor = valor / numero;
    numero += 1;
    valor *= numero;
    document.getElementById('numero').innerHTML = numero;
	document.getElementById('qtd').value = numero;
    document.getElementById('valor').innerHTML = valor.toFixed(2).toString().replace('.', ',');
}
