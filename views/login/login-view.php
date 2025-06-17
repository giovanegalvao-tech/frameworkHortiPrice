<?php if ( ! defined('ABSPATH')) exit; ?>

<div>
<?php
if ( $this->logged_in ) {
	echo '<p class="alert">Logado</p>';
	
	$login_uri  = HOME_URI . '/home/';
    echo '<meta http-equiv="Refresh" content="0; url=' . $login_uri . '">';
	echo '<script type="text/javascript">window.location.href = "' . $login_uri . '";</script>';
}

?>
 <div class="section"></div>
  <main>
    <center>
      <!--<img class="responsive-img" style="width: 250px;" src="https://i.imgur.com/ax0NCsK.gif" />-->
      <div class="section"></div>

      <h5 >Por Favor, faça o login para acessar o sistema.</h5>
      <p><a href="<?php echo HOME_URI . '/ajuda-login';?>" class="green-text text-darken-4">Ajuda?</a></p>
      <div class="section"></div>

      <div class="container">
        <div class="z-depth-1 grey lighten-4 row" style="display: inline-block; padding: 32px 48px 0px 48px; border: 1px solid #EEE;">

          <form class="col s12" method="post">
            <div class='row'>
              <div class='col s12'>
              </div>
            </div>

            <div class='row'>
              <div class='input-field col s12'>
                <input name="userdata[user]" id="inputUser" class='validate' type='text' />
                <label for='usuario'>Entre com seu usuário</label>
              </div>
            </div>

            <div class='row'>
              <div class='input-field col s12'>
                <input  name="userdata[user_password]" id="inputPassword" class='validate' type='password'  />
                <label for='password'>Entre com sua senha</label>
              </div>
              <label style='float: right;'>
								<a class='green-text text-darken-4' href="<?php echo HOME_URI . '/esqueceu-senha';?>"><b>Esqueceu a Senha?</b></a>
							</label>
            </div>

            <br />
            <center>
              <div class='row'>
              	<?php
				if ( $this->login_error ) {
					echo '<tr><td colspan="2"><div class="z-depth-3 scale-transition" style="border-color: #d32f2f;
  background-color: #ef5350; color: white;">' . $this->login_error . '</div></td></tr>';
				}
	?>

	<br />
                <button type='submit' name='btn_login' class='col s12 btn btn-large waves-effect waves-green green darken-4 '>Entrar</button>

              </div>
            </center>
          </form>
        </div>
      </div>
      <a href="<?php echo HOME_URI . '/registro-usuario';?>" class="green-text text-darken-4">Crie uma nova conta</a>
    </center>

    <div class="section"></div>
    <div class="section"></div>

    

  </main>

  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.1/jquery.min.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.5/js/materialize.min.js"></script>
			
			