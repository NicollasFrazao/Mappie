@extends('layouts.master')

@section('title', 'App')

@section('description', 'Come que a fome some!')

@section('content')

	@include('load-screen')
	
	<?php 

		$timeNotRepeat = '?'.date('Ymdhis');

		if(Session::get('CD_USUARIO')){
	
	?>	

	@include('top-bar')

	

	<?php

		}
	
	?>

	<div class="owl-carousel owl-theme">
	  <div class="item">
	  	<img src="image/brocolis.png" alt="">
		<h3>Esfiha</h3>
	  </div>
	  
	  <div class="item">
	  	<img src="image/goiabada.png" alt="">
		<h3>Esfiha Doce</h3>
	  </div>
	</div>

	<!-- ADICIONAR TODAS AS VIEWS QUE SERÃO UTILIZADAS NO MAPPIE -->

	@include('login')
	@include('home')
  @include('loja')
	@include('qr')
	@include('categoria')
	@include('cardapio')
	@include('comanda')
	@include('observacao')
	@include('avaliacao')
	@include('configuracao')
  @include('sobre')
  @include('tamanho')
  @include('finalizar')

	<?php 
	
		if(Session::get('CD_USUARIO')){
	
	?>	

		@include('mappie-bar')

	<?php

		}
		//Só enquanto não funciona com o login do facegoogle no dev
	
	?>

@endsection

@section('links')
	<link href="css/owl.carousel.min.css" type="text/css" rel="stylesheet">
	<link href="css/owl.theme.default.min.css" type="text/css" rel="stylesheet">
	<link href="css/index.css<?php echo $timeNotRepeat; ?>" type="text/css" rel="stylesheet">
	<link href="css/top-bar.css<?php echo $timeNotRepeat; ?>" type="text/css" rel="stylesheet">
	<link href="css/mappie-bar.css<?php echo $timeNotRepeat; ?>" type="text/css" rel="stylesheet">
	<link href="css/footer.css<?php echo $timeNotRepeat; ?>" type="text/css" rel="stylesheet">

	<link href="css/login.css<?php echo $timeNotRepeat; ?>" type="text/css" rel="stylesheet">
	<link href="css/pedido.css<?php echo $timeNotRepeat; ?>" type="text/css" rel="stylesheet">
	<link href="css/home.css<?php echo $timeNotRepeat; ?>" type="text/css" rel="stylesheet">
	<link href="css/qr.css<?php echo $timeNotRepeat; ?>" type="text/css" rel="stylesheet">
	<link href="css/configuracao.css<?php echo $timeNotRepeat; ?>" type="text/css" rel="stylesheet">
	<link href="css/categoria.css<?php echo $timeNotRepeat; ?>" type="text/css" rel="stylesheet">
	<link href="css/cardapio.css<?php echo $timeNotRepeat; ?>" type="text/css" rel="stylesheet">
	<link href="css/pedido.css<?php echo $timeNotRepeat; ?>" type="text/css" rel="stylesheet">
	<link href="css/observacao.css<?php echo $timeNotRepeat; ?>" type="text/css" rel="stylesheet">
	<link href="css/avaliacao.css<?php echo $timeNotRepeat; ?>" type="text/css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css<?php echo $timeNotRepeat; ?>"/>




@endsection

@section('scripts')
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="js/instascan.js<?php echo $timeNotRepeat; ?>"></script>
	<script src="js/zxing.js<?php echo $timeNotRepeat; ?>"></script>
	<script src="js/mappieAjax.js<?php echo $timeNotRepeat; ?>"></script>
	<script src="js/mappieScript.js<?php echo $timeNotRepeat; ?>"></script>
	<script src="js/mappieQR.js<?php echo $timeNotRepeat; ?>"></script> 
  <script src="js/bootbox.all.min.js<?php echo $timeNotRepeat; ?>"></script>

<script src="https://code.jquery.com/jquery-1.11.0.min.js<?php echo $timeNotRepeat; ?>"></script>
<script src="https://code.jquery.com/jquery-migrate-1.2.1.min.js<?php echo $timeNotRepeat; ?>"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.7.1/slick.js<?php echo $timeNotRepeat; ?>"></script>

@endsection

@section('scriptsOnPage')

	$.ajaxSetup({

		beforeSend: function(xhr){
		     
		  xhr.setRequestHeader('X-CSRF-TOKEN', $('meta[name="csrf-token"]').attr('content'));
		     
		}

	}); 

  	window.onload = function(){

		startSession();

    

	}


	function startSession(){

		<?php 

			if(Session::get('CD_USUARIO')){

		?>	

			mppAjaxVar = {

				url: '/ajax/ajaxGetSession'

			}

			ajaxMappieRequest(mppAjaxVar, function(mpp){
				
				mappieSession = JSON.parse(mpp);

        mppConfiguracaFotoUsuario.src = mappieSession['nm_foto'];
        mppConfiguracaoNomeUsuario.innerHTML = mappieSession['nm_usuario'];
        mppConfiguracaoEmailUsuario.innerHTML = mappieSession['nm_email'];

				if(mappieSession['cd_comanda'] == ''){
          mppSearch = '';
					buscaListarLojas(mppSearch);
				}
				else{

					atualizarValorComanda();

					$("#mppBarQR").addClass("mppHide");
					$("#mppBarPedido").removeClass("mppHide");

          $("#mppBarCardapio").removeClass("mppHide");
          $("#mppBarFinalizar").removeClass("mppHide"); 
        

					mppTextObservacao.value = mappieSession['ds_comanda'];

					mppLogoLoja.src = 'image/lojas/'+mappieSession['nm_loja_logo'];
            		mppNomeLoja.innerHTML = mappieSession['nm_loja'];
            		mppDescLoja.innerHTML = mappieSession['ds_loja'];
					
					buscaDadosComanda();
					buscaCategoriasCardapio();
					screenShow("mpps_categoria");
							
				}
			
			});

		<?php

			}
			else{

		?>

			screenShow("mpps_login");

		<?php

			}
		
		?>
		

	}

@endsection