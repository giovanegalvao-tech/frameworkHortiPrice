<?php if ( ! defined('ABSPATH')) exit; ?>


<div class="row">
      <div class="col s6">
        <div style="padding: 35px;" align="center" class="card">
          <div class="row">
            <div class="left card-title">
              <b>Relatórios</b>
            </div>
          </div>

          <div class="row">
            <a href="<?php echo HOME_URI;?>/relatorio-totais-custo/">
              <div style="padding: 30px;" class="grey lighten-3 col s12 waves-effect">
                <i class="green-text text-darken-4 large material-icons">insert_chart</i>
                <span class="green-text text-darken-4"><h5>Totais por Custo</h5></span>
              </div>
            </a>

            <div class="col s1">&nbsp;</div>
            <div class="col s1">&nbsp;</div>

            <a href="<?php echo HOME_URI;?>/relatorio-custo-unitario/">
              <div style="padding: 30px;" class="grey lighten-3 col s12 waves-effect">
                <i class="green-text text-darken-4 large material-icons">assessment</i>
                <span class="green-text text-darken-4"><h5>Custo Unitário</h5></span>
              </div>
            </a>
          </div>
        </div>
      </div>

      <div class="col s6">
        <div style="padding: 35px;" align="center" class="card">
          <div class="row">
            <div class="left card-title">
              <b>Simulações</b>
            </div>
          </div>
          <div class="row">
            <a href="<?php echo HOME_URI;?>/custo-abc/">
              <div style="padding: 30px;" class="grey lighten-3 col s12 waves-effect">
                <i class="green-text text-darken-4 large material-icons">card_giftcard</i>
                <span class="green-text text-darken-4"><h5>ABC</h5></span>
              </div>
            </a>
            <div class="col s1">&nbsp;</div>
            <div class="col s1">&nbsp;</div>

            <a href="<?php echo HOME_URI;?>/custo-absorcao/">
              <div style="padding: 30px;" class="grey lighten-3 col s12 waves-effect">
                <i class="green-text text-darken-4 large material-icons">card_membership</i>
                <span class="truncate green-text text-darken-4"><h5>Absorção</h5></span>
              </div>
            </a>
          </div>
        </div>
      </div>
    </div>

