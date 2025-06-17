<?php
 
// Evita acesso direto a este arquivo
if ( ! defined('ABSPATH')) exit;
?>
 <div style="padding: 35px;" class="card">

 	<div align="center">
		<img src="<?php echo HOME_URI;?>/imagens/logo.png" class="responsive-img" ></img>
	</div>
	<div>
		<b>Para ter acesso ao framework é necessário possuir um login e senha. Para isso, basta realizar o cadastro na página inicial do site na funcionalidade "Criar uma nova conta".</b>
	</div>
	<div>
		<p>O framework HORTIPRICE é um ferramenta disponível gratuitamente que tem como objetivo
		realizar a formação de preço de venda de produtos hortícolas de forma automática. Para que seja possível realizar as simulações é necessário informar os seguintes dados no sistema (Aba Cadastros): </p>
		<li>CATEGORIA: descrição da modalidade do cultivo (ex.: Horticultura).</li>
		<li>SUBCATEGORIA: descrição da(s) divisão(s) da categoria informada anteriormente (ex.: Floricultura, Olericultura, Fruticultura, etc.).</li>
		<li>CUSTO: descrição dos grupos de custeio (ex.: Despesas de Custeio da Lavoura, Despesas Financeiras, Despesas Pós-colheita, etc.).</li>
		<li>TIPO: nome da cultura (ex.: Alho Irrigado, Morango, Rosa, etc.).</li>
		<li>UNIDADE: descrição das unidades de medidas que serão utilizadas na inserção dos componentes de custo (ex.: kg/ha, R$/ha, h/m, etc.).</li>
		<li>COMPONENTE: descrição das informações relacionadas aos custos envolvidos no processo produtivo de determinado cultivo (ex.: Custo do Veículo, Mão de obra, Fertilizantes, etc.).</li>
		<li>PRODUTIVIDADE: descrição das informações relacionadas ao rendimento mensal de determinado cultivo.</li>
		<p>Após a inserção desses dados é possível realizar a simulação nos três métodos de custeio: Custeio ABC, Custeio por Absorção e Custeio Variável.</p>
	</div>

	<br>

	<div>
		<h5>CUSTEIO ABC</h5>
		<p>O Custeio Baseado em Atividades (ABC) é uma técnica de controle e alocação de custos que permite a identificação dos processos e atividades existentes. O princípio do ABC se baseia em que os produtos não consomem recursos, mas sim atividades. Ao mostrar as relações entre atividades específicas e custos indiretos, o Custeio Baseado em Atividades (ABC) permite um cálculo preciso dos custos e alocação de custos indiretos.</p>
		<p>O primeiro passo para a simulação é realizar o cadastro das ATIVIDADES e seus respectivos DIRECIONADORES (Aba Cadastros).</p>
		<p>Em seguida, basta acessar a funcionalidade Custeio ABC na aba SIMULAÇÕES e informar o TIPO, PRODUTIVIDADE e a MARGEM DE CONTRIBUIÇÃO.</p>
	</div>

	<br>

	<div>
		<h5>O QUE É MARGEM DE CONTRIBUIÇÃO?</h5>
		<p>A margem de contribuição é a mais recomendada técnica para a formação de preço de venda. Ela determinada o quanto "sobra" dentro do custo de venda, após serem retirados os custos e despesas variáveis. Portanto, é o lucro real de uma venda.</p>
	</div>

	<br>

	<div>
		<h5>CUSTEIO POR ABSORÇÃO</h5>
		<p>O método de Custeio por Absorção considera a apropriação de todos os custos de produção de um determinado produto, assim como os demais gastos relativos ao esforço aplicado na produção. Para realizar a simulação desse método é necessário informar os custos diretos, indiretos, fixos e variáveis.</p>
		<p>Na aba SIMULAÇÕES, a funcionalidade CUSTEIO POR ABSORÇÃO permite realizar a formação de preço de venda de uma determinada cultura, para isto, basta informar o TIPO, PRODUTIVIDADE e a MARGEM DE CONTRIBUIÇÃO.</p>
	</div>

	<br>

	<div>
		<h5>CUSTEIO VARIÁVEL</h5>
		<p>O método Custeio Variável utiliza-se apenas os custos envolvidos com a quantidade de volume produzido, assim, pode-se ser apurado qual é a margem de contribuição, considerando os custos variáveis e também a receita líquida de um tempo estabelecido. Para realizar a simulação desse método é necessário informar os custos variáveis, diretos e indiretos.</p>
		<p>Na aba SIMULAÇÕES, a funcionalidade CUSTEIO VARIÁVEL permite realizar a formação de preço de venda de uma determinada cultura, para isto, basta informar o TIPO, PRODUTIVIDADE e a MARGEM DE CONTRIBUIÇÃO.</p>
	</div>

	<br>

	<div>
		<p>Observações:</p>
		<li>É possível realizar diferentes simulações para o mesmo cultivo utilizando o mesmo método de custeio.</li>
		<li>Para realizar simulações para a mesma cultura em diferentes métodos de custeio é necessário verificar se foram cadastradas todas as categorias de custo exigidas por cada uma das metodologias de custo.</li>
	</div>
</div>