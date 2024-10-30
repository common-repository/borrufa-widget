﻿<?php

class borrufa_widget_class extends WP_Widget
{
	public function __construct()
	{ 
		$defaults = array
		(
			"classname" => "lbclases",
			"description" => __( 'Notícies de La borrufa | Pirineu Comarques' ),
		);
		$this->WP_Widget('borrufa_id','Borrufa Widget',$defaults);
	}
	
	public function form($instance)
	{
		$defaults = array
		(
			"titol" => __( 'Notícies La borrufa' ),
			"lb_widget_au" => false,
			"lb_widget_ar" => false,
			"lb_widget_pj" => false,
			"lb_widget_ps" => false,
			"lb_widget_va" => false,
			"lb_widget_esp" => false,
			"lb_widget_nat" => false,
			"lb_widget_mis" => false,
			"lb_num" => 1,
			"lb_data" => false,
			"lb_widget_target" => 1,
			"lb_color" => "#000000",
		);
		$instance = wp_parse_args((array)$instance,$defaults);
		$titol = esc_attr($instance["titol"]);
		$lb_widget_au = isset( $instance['lb_widget_au'] ) ? (bool) $instance['lb_widget_au'] : false;
		$lb_widget_ar = isset( $instance['lb_widget_ar'] ) ? (bool) $instance['lb_widget_ar'] : false;
		$lb_widget_pj = isset( $instance['lb_widget_pj'] ) ? (bool) $instance['lb_widget_pj'] : false;
		$lb_widget_ps = isset( $instance['lb_widget_ps'] ) ? (bool) $instance['lb_widget_ps'] : false;
		$lb_widget_va = isset( $instance['lb_widget_va'] ) ? (bool) $instance['lb_widget_va'] : false;
		$lb_widget_esp = isset( $instance['lb_widget_esp'] ) ? (bool) $instance['lb_widget_esp'] : false;
		$lb_widget_nat = isset( $instance['lb_widget_nat'] ) ? (bool) $instance['lb_widget_nat'] : false;
		$lb_widget_mis = isset( $instance['lb_widget_mis'] ) ? (bool) $instance['lb_widget_mis'] : false;
		$lb_num    = isset( $instance['lb_num'] ) ? absint( $instance['lb_num'] ) : 1;
		$lb_data = isset( $instance['lb_data'] ) ? (bool) $instance['lb_data'] : false;
		$lb_widget_target = isset( $instance['lb_widget_target'] ) ? $instance['lb_widget_target'] : 1;
		$lb_color = isset( $instance['lb_color'] ) ? $instance['lb_color'] : "#000000";
		?>
		<p>Títol : <input type="text" name="<?php echo $this->get_field_name("titol")?>" value="<?php echo $titol; ?>" class="widefat" /></p>

		<p><?php _e( 'Selecciona les comarques o categories que siguin del teu interès, per enllaçar amb les darreres notícies publicades a La borrufa.' ); ?></p>

		<p><input class="checkbox" type="checkbox"<?php checked( $lb_widget_au ); ?> id="<?php echo $this->get_field_id( 'lb_widget_au' ); ?>" name="<?php echo $this->get_field_name( 'lb_widget_au' ); ?>" />
		<label for="<?php echo $this->get_field_id( 'lb_widget_au' ); ?>"><?php _e( 'Alt Urgell' ); ?></label></p>

		<p><input class="checkbox" type="checkbox"<?php checked( $lb_widget_ar ); ?> id="<?php echo $this->get_field_id( 'lb_widget_ar' ); ?>" name="<?php echo $this->get_field_name( 'lb_widget_ar' ); ?>" />
		<label for="<?php echo $this->get_field_id( 'lb_widget_ar' ); ?>"><?php _e( 'Alta Ribagorça' ); ?></label></p>

		<p><input class="checkbox" type="checkbox"<?php checked( $lb_widget_pj ); ?> id="<?php echo $this->get_field_id( 'lb_widget_pj' ); ?>" name="<?php echo $this->get_field_name( 'lb_widget_pj' ); ?>" />
		<label for="<?php echo $this->get_field_id( 'lb_widget_pj' ); ?>"><?php _e( 'Pallars Jussà' ); ?></label></p>

		<p><input class="checkbox" type="checkbox"<?php checked( $lb_widget_ps ); ?> id="<?php echo $this->get_field_id( 'lb_widget_ps' ); ?>" name="<?php echo $this->get_field_name( 'lb_widget_ps' ); ?>" />
		<label for="<?php echo $this->get_field_id( 'lb_widget_ps' ); ?>"><?php _e( 'Pallars Sobirà' ); ?></label></p>
		
		<p><input class="checkbox" type="checkbox"<?php checked( $lb_widget_va ); ?> id="<?php echo $this->get_field_id( 'lb_widget_va' ); ?>" name="<?php echo $this->get_field_name( 'lb_widget_va' ); ?>" />
		<label for="<?php echo $this->get_field_id( 'lb_widget_va' ); ?>"><?php _e( 'Val d\'Aran' ); ?></label></p>
				
		<p><input class="checkbox" type="checkbox"<?php checked( $lb_widget_esp ); ?> id="<?php echo $this->get_field_id( 'lb_widget_esp' ); ?>" name="<?php echo $this->get_field_name( 'lb_widget_esp' ); ?>" />
		<label for="<?php echo $this->get_field_id( 'lb_widget_esp' ); ?>"><?php _e( 'Esports' ); ?></label></p>
		
				<p><input class="checkbox" type="checkbox"<?php checked( $lb_widget_nat ); ?> id="<?php echo $this->get_field_id( 'lb_widget_nat' ); ?>" name="<?php echo $this->get_field_name( 'lb_widget_nat' ); ?>" />
		<label for="<?php echo $this->get_field_id( 'lb_widget_nat' ); ?>"><?php _e( 'Natura' ); ?></label></p>
		
		<p><input class="checkbox" type="checkbox"<?php checked( $lb_widget_mis ); ?> id="<?php echo $this->get_field_id( 'lb_widget_mis' ); ?>" name="<?php echo $this->get_field_name( 'lb_widget_mis' ); ?>" />
		<label for="<?php echo $this->get_field_id( 'lb_widget_mis' ); ?>"><?php _e( 'Miscel·lani' ); ?></label></p>
				<p><?php _e( 'Totes les notícies s\'actualitzen automàticament.' ); ?></p>
		
		<hr style="background: #ccc; border: 0; height: 1px; margin: 20px 0;" />
		
		<p><label for="<?php echo $this->get_field_id( 'lb_num' ); ?>"><?php _e( 'Nombre de notícies que cal mostrar :' ); ?></label>
		<input class="tiny-text" id="<?php echo $this->get_field_id( 'lb_num' ); ?>" name="<?php echo $this->get_field_name( 'lb_num' ); ?>" type="number" step="1" min="1" max= "8" value="<?php echo $lb_num; ?>" size="3" /></p>
		
		<p><input class="checkbox" type="checkbox"<?php checked( $lb_data ); ?> id="<?php echo $this->get_field_id( 'lb_data' ); ?>" name="<?php echo $this->get_field_name( 'lb_data' ); ?>" />
		<label for="<?php echo $this->get_field_id( 'lb_data' ); ?>"><?php _e( 'Mostrar la data de les notícies' ); ?></label>
		
		<p><label for="<?php echo $this->get_field_id( 'lb_widget_target' ); ?>"><?php _e( 'Obrir les notícies en una finestra nova ?' ); ?></label>
			<select name="<?php echo $this->get_field_name( 'lb_widget_target' ); ?>" id="<?php echo $this->get_field_id( 'lb_widget_target' ); ?>" class="tiny-text">
				<?php
				$target_options = array( 'Si' => '1', 'No' => '2' );
				foreach ( $target_options as $target_value => $target_code ) {
					echo '<option value="' . $target_code . '" id="' . $target_code . '"', $lb_widget_target == $target_code ? ' selected="selected"' : '', '>', $target_value, '</option>';
					
				} ?>    </select>
		</p>
		
		<p><label for="<?php echo $this->get_field_id( 'lb_color' ); ?>"><?php _e( 'Color títol de comarques :' ); ?></label>
					<input type="text" class="colorPickerBorrufa" name="<?php echo $this->get_field_name( 'lb_color' ); ?>"  id="<?php echo $this->get_field_id( 'lb_color' ); ?>" value="<?php echo $lb_color; ?>" data-default-color="#000000"/>
		</p>
		<script type="text/javascript">
		  jQuery(document).ready(function() {
			//jQuery('.colorPickerBorrufa').wpColorPicker();
			jQuery('.colorPickerBorrufa').wpColorPicker({
				change: function(e, ui) {
					jQuery( e.target ).val( ui.color.toString() );
					jQuery( e.target ).trigger('change'); // enable widget "Save" button
				}
			});
		   }); 
   		</script>
		<hr style="background: #ccc; border: 0; height: 1px; margin: 20px 0;" />
		
		<p><strong>Per Suport: <a href="https://laborrufa.com/informacio-de-contacte-de-la-borrufa/" target="_blank">Clicar aquí</a></strong></p>
		<p><strong><?php _e( 'Gràcies per confiar en La borrufa' ); ?></strong></p>	
		
	<?php
	}
	public function update($new_instance,$old_instance)
	{
		$instance = $old_instance;
		$instance["titol"]=strip_tags($new_instance["titol"]);
		$instance['lb_widget_au'] = isset( $new_instance['lb_widget_au'] ) ? (bool) $new_instance['lb_widget_au'] : false;
		$instance['lb_widget_ar'] = isset( $new_instance['lb_widget_ar'] ) ? (bool) $new_instance['lb_widget_ar'] : false;
		$instance['lb_widget_pj'] = isset( $new_instance['lb_widget_pj'] ) ? (bool) $new_instance['lb_widget_pj'] : false;
		$instance['lb_widget_ps'] = isset( $new_instance['lb_widget_ps'] ) ? (bool) $new_instance['lb_widget_ps'] : false;
		$instance['lb_widget_va'] = isset( $new_instance['lb_widget_va'] ) ? (bool) $new_instance['lb_widget_va'] : false;
		$instance['lb_widget_esp'] = isset( $new_instance['lb_widget_esp'] ) ? (bool) $new_instance['lb_widget_esp'] : false;
		$instance['lb_widget_nat'] = isset( $new_instance['lb_widget_nat'] ) ? (bool) $new_instance['lb_widget_nat'] : false;
		$instance['lb_widget_mis'] = isset( $new_instance['lb_widget_mis'] ) ? (bool) $new_instance['lb_widget_mis'] : false;
		$instance['lb_num'] = (int) $new_instance['lb_num'];
		$instance['lb_data'] = isset( $new_instance['lb_data'] ) ? (bool) $new_instance['lb_data'] : false;
		$instance[ 'lb_widget_target' ] = $new_instance[ 'lb_widget_target' ];
		$instance['lb_color'] = isset( $new_instance['lb_color'] ) ? $new_instance['lb_color'] : "#000000";
		return $instance;
	}

	public function widget($args,$instance)
	{
		extract($args);
		$titol = apply_filters('widget title',$instance['titol']);
		$lb_widget_au = isset( $instance['lb_widget_au'] ) ? $instance['lb_widget_au'] : false;
		$lb_widget_ar = isset( $instance['lb_widget_ar'] ) ? $instance['lb_widget_ar'] : false;
		$lb_widget_pj = isset( $instance['lb_widget_pj'] ) ? $instance['lb_widget_pj'] : false;
		$lb_widget_ps = isset( $instance['lb_widget_ps'] ) ? $instance['lb_widget_ps'] : false;
		$lb_widget_va = isset( $instance['lb_widget_va'] ) ? $instance['lb_widget_va'] : false;
		$lb_widget_esp = isset( $instance['lb_widget_esp'] ) ? $instance['lb_widget_esp'] : false;
		$lb_widget_nat = isset( $instance['lb_widget_nat'] ) ? $instance['lb_widget_nat'] : false;
		$lb_widget_mis = isset( $instance['lb_widget_mis'] ) ? $instance['lb_widget_mis'] : false;
		$lb_num = ( ! empty( $instance['lb_num'] ) ) ? absint( $instance['lb_num'] ) : 1;
		if ( ! $lb_num )
			$lb_num = 1;
		$lb_data = isset( $instance['lb_data'] ) ? $instance['lb_data'] : false;
		$lb_widget_target  = empty( $instance['lb_widget_target'] ) ? '&nbsp;' : $instance['lb_widget_target'];
		$lb_color = $instance['lb_color'];
		echo $before_widget;
		echo $before_title.$titol.$after_title;
		?>

	<?php if ( $lb_widget_au) {
	include_once(ABSPATH . WPINC . '/rss.php');  
	$rss = fetch_rss('https://laborrufa.com/noticies/alt-urgell/feed/');
	$items = $lb_num;
	$items = array_slice($rss->items, 0, $lb_num);
	?>
	<?php if (!empty($items)) { ?>
		<br />
		<span style="color:<?php echo $lb_color; ?>"><b>Alt Urgell</b></span>
	<?php
	foreach ( $items as $item ) : ?>  
	<div>
	<br />
       <a href='<?php echo $item['link']; ?>' title='<?php echo $item['title']; ?>'<?php if ( $lb_widget_target == 1 ) { ?> target="_blank" <?php } ?>><?php echo $item['title']; ?></a>&nbsp;<span style="color:<?php echo $lb_color; ?>"><?php if ($lb_data){ echo date( 'd/m/Y', strtotime($item['pubdate'])); } ?>&nbsp;<?php _e( '[La borrufa | Pirineu comarques]' ); ?></span>
	</div>
	<?php endforeach; } } ?>

	<?php if ( $lb_widget_ar) {
	include_once(ABSPATH . WPINC . '/rss.php');  
	$rss = fetch_rss('https://laborrufa.com/noticies/alta-ribagorca/feed/');
	$items = $lb_num;
	$items = array_slice($rss->items, 0, $lb_num);
	?>
	<?php if (!empty($items)) { ?>
		<br />
		<span style="color:<?php echo $lb_color; ?>"><b>Alta Ribagorça</b></span>
	<?php
	foreach ( $items as $item ) : ?>  
	<div>
	<br />
       <a href='<?php echo $item['link']; ?>' title='<?php echo $item['title']; ?>'<?php if ( $lb_widget_target == 1 ) { ?> target="_blank" <?php } ?>><?php echo $item['title']; ?></a>&nbsp;<span style="color:<?php echo $lb_color; ?>"><?php if ($lb_data){ echo date( 'd/m/Y', strtotime($item['pubdate'])); } ?>&nbsp;<?php _e( '[La borrufa | Pirineu comarques]' ); ?></span>
	</div>
	<?php endforeach; } } ?>

	<?php if ( $lb_widget_pj ) {
	include_once(ABSPATH . WPINC . '/rss.php');  
	$rss = fetch_rss('https://laborrufa.com/noticies/pallars-jussa/feed/');
	$items = $lb_num;
	$items = array_slice($rss->items, 0, $lb_num);
	?>
	<?php if (!empty($items)) { ?>
		<br />
		<span style="color:<?php echo $lb_color; ?>"><b>Pallars Jussà</b></span>
	<?php
	foreach ( $items as $item ) : ?>  
	<div>
	<br />
       <a href='<?php echo $item['link']; ?>' title='<?php echo $item['title']; ?>'<?php if ( $lb_widget_target == 1 ) { ?> target="_blank" <?php } ?>><?php echo $item['title']; ?></a>&nbsp;<span style="color:<?php echo $lb_color; ?>"><?php if ($lb_data){ echo date( 'd/m/Y', strtotime($item['pubdate'])); } ?>&nbsp;<?php _e( '[La borrufa | Pirineu comarques]' ); ?></span>
	</div>
	<?php endforeach; } } ?>

	<?php if ( $lb_widget_ps ) {
	include_once(ABSPATH . WPINC . '/rss.php');  
	$rss = fetch_rss('https://laborrufa.com/noticies/pallars-sobira/feed/');
	$items = $lb_num;
	$items = array_slice($rss->items, 0, $lb_num);
	?>
	<?php if (!empty($items)) { ?>
		<br />
		<span style="color:<?php echo $lb_color; ?>"><b>Pallars Sobirà</b></span>
	<?php
	foreach ( $items as $item ) : ?>  
	<div>
	<br />
       <a href='<?php echo $item['link']; ?>' title='<?php echo $item['title']; ?>'<?php if ( $lb_widget_target == 1 ) { ?> target="_blank" <?php } ?>><?php echo $item['title']; ?></a>&nbsp;<span style="color:<?php echo $lb_color; ?>"><?php if ($lb_data){ echo date( 'd/m/Y', strtotime($item['pubdate'])); } ?>&nbsp;<?php _e( '[La borrufa | Pirineu comarques]' ); ?></span>
	</div>
	<?php endforeach; } } ?>
	  
	<?php if ( $lb_widget_va ) {
	include_once(ABSPATH . WPINC . '/rss.php');  
	$rss = fetch_rss('https://laborrufa.com/noticies/val-daran/feed/');
	$items = $lb_num;
	if (is_array($rss->items)) {
	$items = array_slice($rss->items, 0, $lb_num);
	} else { var_dump($rss->items); }
	?> 
	<?php if (!empty($items)) { ?>
		<br />
		<span style="color:<?php echo $lb_color; ?>"><b>Val d'Aran</b></span>
	<?php
	foreach ( $items as $item ) : ?>
	<div>
	<br />
       <a href='<?php echo $item['link']; ?>' title='<?php echo $item['title']; ?>'<?php if ( $lb_widget_target == 1 ) { ?> target="_blank" <?php } ?>><?php echo $item['title']; ?></a>&nbsp;<span style="color:<?php echo $lb_color; ?>"><?php if ($lb_data){ echo date( 'd/m/Y', strtotime($item['pubdate'])); } ?>&nbsp;<?php _e( '[La borrufa | Pirineu comarques]' ); ?></span>
	</div>
	<?php endforeach; } } ?>

	<?php if ( $lb_widget_esp) {
	include_once(ABSPATH . WPINC . '/rss.php');  
	$rss = fetch_rss('https://laborrufa.com/natura-i-esports/esports/feed/');
	$items = $lb_num;
	$items = array_slice($rss->items, 0, $lb_num);
	?>
	<?php if (!empty($items)) { ?>
		<br />
		<span style="color:<?php echo $lb_color; ?>"><b>Esports</b></span>
	<?php
	foreach ( $items as $item ) : ?>
	<div>
	<br />
       <a href='<?php echo $item['link']; ?>' title='<?php echo $item['title']; ?>'<?php if ( $lb_widget_target == 1 ) { ?> target="_blank" <?php } ?>><?php echo $item['title']; ?></a>&nbsp;<span style="color:<?php echo $lb_color; ?>"><?php if ($lb_data){ echo date( 'd/m/Y', strtotime($item['pubdate'])); } ?>&nbsp;<?php _e( '[La borrufa | Pirineu comarques]' ); ?></span>
	</div>
	<?php endforeach; } } ?>
	
		<?php if ( $lb_widget_nat) {
	include_once(ABSPATH . WPINC . '/rss.php');  
	$rss = fetch_rss('https://laborrufa.com/natura-i-esports/natura/feed/');
	$items = $lb_num;
	$items = array_slice($rss->items, 0, $lb_num);
	?>
	<?php if (!empty($items)) { ?>
		<br />
		<span style="color:<?php echo $lb_color; ?>"><b>Natura</b></span>
	<?php
	foreach ( $items as $item ) : ?>
	<div>
	<br />
       <a href='<?php echo $item['link']; ?>' title='<?php echo $item['title']; ?>'<?php if ( $lb_widget_target == 1 ) { ?> target="_blank" <?php } ?>><?php echo $item['title']; ?></a>&nbsp;<span style="color:<?php echo $lb_color; ?>"><?php if ($lb_data){ echo date( 'd/m/Y', strtotime($item['pubdate'])); } ?>&nbsp;<?php _e( '[La borrufa | Pirineu comarques]' ); ?></span>
	</div>
	<?php endforeach; } } ?>

	<?php if ( $lb_widget_mis) {
	include_once(ABSPATH . WPINC . '/rss.php');  
	$rss = fetch_rss('https://laborrufa.com/noticies/miscellani/feed/');
	$items = $lb_num;
	$items = array_slice($rss->items, 0, $lb_num);
	?>
	<?php if (!empty($items)) { ?>
		<br />
		<span style="color:<?php echo $lb_color; ?>"><b>Miscel·lani</b></span>
	<?php
	foreach ( $items as $item ) : ?>
	<div>
	<br />
       <a href='<?php echo $item['link']; ?>' title='<?php echo $item['title']; ?>'<?php if ( $lb_widget_target == 1 ) { ?> target="_blank" <?php } ?>><?php echo $item['title']; ?></a>&nbsp;<span style="color:<?php echo $lb_color; ?>"><?php if ($lb_data){ echo date( 'd/m/Y', strtotime($item['pubdate'])); } ?>&nbsp;<?php _e( '[La borrufa | Pirineu comarques]' ); ?></span>
	</div>

	<?php endforeach; } } ?>
	<?php }
	}

	echo $after_widget;
?>