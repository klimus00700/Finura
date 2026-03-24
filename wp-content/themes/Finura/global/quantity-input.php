<?php

/**
 * Product quantity inputs
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/global/quantity-input.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 10.1.0
 *
 * @var bool   $readonly If the input should be set to readonly mode.
 * @var string $type     The input type attribute.
 */

defined('ABSPATH') || exit;

/* translators: %s: Quantity. */
$label = ! empty($args['product_name']) ? sprintf(esc_html__('%s quantity', 'woocommerce'), wp_strip_all_tags($args['product_name'])) : esc_html__('Quantity', 'woocommerce');
$classes[] = 'form-control';
$classes[] = 'input-number';


?>
<div class="quantity">
	<?php
	/**
	 * Hook to output something before the quantity input field.
	 *
	 * @since 7.2.0
	 */
	do_action('woocommerce_before_quantity_input_field');
	?>

	<div class="input-group col-md-6 d-flex mb-3">
		<?php if (!is_page_template('template-cart.php')) { ?>
			<span class="input-group-btn mr-2">
				<button type="button" class="quantity-left-minus btn" data-type="minus" data-field="">
					<i class="ion-ios-remove">-</i>
				</button>
			</span>
		<?php	} ?>



		<input
			type="<?php echo esc_attr($type); ?>"
			<?php echo $readonly ? 'readonly="readonly"' : ''; ?>
			id="<?php echo esc_attr($input_id); ?>"
			class="<?php echo esc_attr(join(' ', (array) $classes)); ?>"
			name="<?php echo esc_attr($input_name); ?>"
			value="<?php echo esc_attr($input_value); ?>"
			aria-label="<?php esc_attr_e('Product quantity', 'woocommerce'); ?>"
			<?php if (in_array($type, array('text', 'search', 'tel', 'url', 'email', 'password'), true)) : ?>
			size="4"
			<?php endif; ?>
			min="<?php echo esc_attr($min_value); ?>"
			<?php if (0 < $max_value) : ?>
			max="<?php echo esc_attr($max_value); ?>"
			<?php endif; ?>
			step="<?php echo esc_attr($step); ?>"
			placeholder="<?php echo esc_attr($placeholder); ?>"
			inputmode="<?php echo esc_attr($inputmode); ?>"
			autocomplete="<?php echo esc_attr(isset($autocomplete) ? $autocomplete : 'on'); ?>" />
		<?php if (!is_page_template('template-cart.php')) { ?>
			<span class="input-group-btn ml-2">
				<button type="button" class="quantity-right-plus btn" data-type="plus" data-field="">
					<i class="ion-ios-add">+</i>
				</button>
			</span>

		<?php	} ?>
		<label class="screen-reader-text" for="<?php echo esc_attr($input_id); ?>"><?php echo esc_attr($label); ?></label>


		<?php
		/**
		 * Hook to output something after quantity input field
		 *
		 * @since 3.6.0
		 */
		do_action('woocommerce_after_quantity_input_field');
		?>
	</div>
</div>