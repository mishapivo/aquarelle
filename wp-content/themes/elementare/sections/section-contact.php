<?php $showContact = elementare_options('_onepage_section_contact', ''); ?>
<?php if ($showContact == 1) : ?>
	<?php
		$contactSectionID = elementare_options('_onepage_id_contact', 'contact');
		$contactTitle = elementare_options('_onepage_title_contact', __('Contact Us', 'elementare'));
		$contactSubTitle = elementare_options('_onepage_subtitle_contact', __('Get in touch', 'elementare'));
		$contactAddText = elementare_options('_onepage_additionaltext_contact', '');
		$contactCompanyName = elementare_options('_onepage_companyname_contact', '');
		$contactCompanyAddress1 = elementare_options('_onepage_companyaddress1_contact', '');
		$contactCompanyAddress2 = elementare_options('_onepage_companyaddress2_contact', '');
		$contactCompanyAddress3 = elementare_options('_onepage_companyaddress3_contact', '');
		$contactCompanyPhone = elementare_options('_onepage_companyphone_contact', '');
		$contactCompanyFax = elementare_options('_onepage_companyfax_contact', '');
		$contactCompanyEmail = elementare_options('_onepage_companyemail_contact', '');
		$contactShortcode = elementare_options('_onepage_shortcode_contact', '');
		$contactIcon = elementare_options('_onepage_icon_contact', 'fa fa-envelope');
		$contactCompanyPhoneLink = elementare_options('_onepage_companyphone_contact_link', '');
		$contactCompanyEmailLink = elementare_options('_onepage_companyemail_contact_link', '');
		$contactShowTitleBack = elementare_options('_onepage_showtitle_contact', '');
	?>
<section class="elementare_onepage_section elementare_contact <?php echo $contactShortcode ? 'withForm' : 'noForm' ?>" id="<?php echo esc_attr($contactSectionID); ?>">
	<div class="elementare_contact_color"></div>
	<div class="elementare_action_contact">
		<?php if($contactTitle || is_customize_preview()): ?>
			<?php if($contactShowTitleBack): ?>
				<div class="title-absolute"><?php echo esc_html($contactTitle); ?></div>
			<?php endif; ?>
			<h2 class="elementare_main_text"><?php echo esc_html($contactTitle); ?></h2>
			<div class="elemMask"></div>
		<?php endif; ?>
		<?php if($contactSubTitle || is_customize_preview()): ?>
			<p class="elementare_subtitle"><?php echo esc_html($contactSubTitle); ?></p>
		<?php endif; ?>
		<div class="contact_columns">
			<?php if($contactShortcode): ?>
			<div class="elementareContactForm">
				<?php echo do_shortcode(wp_kses_post($contactShortcode)); ?>
			</div>
			<?php endif; ?>
			<div class="elementareContactField">
				<?php if($contactAddText || is_customize_preview()): ?>
					<div class="elementareAdditionalText"><p><?php echo wp_kses($contactAddText, elementare_allowed_html()); ?></p></div>
				<?php endif; ?>
				<?php if($contactCompanyName || is_customize_preview()): ?>
					<div class="elementareCompanyName"><h3><?php echo esc_html($contactCompanyName); ?></h3></div>
				<?php endif; ?>
				<?php if($contactCompanyAddress1 || is_customize_preview()): ?>
					<div class="elementareCompanyAddress1"><div class="elementareCompanyAddress1Icon"><i class="fa fa-map-marker" aria-hidden="true"></i></div><p><?php echo esc_html($contactCompanyAddress1); ?></p></div>
				<?php endif; ?>
				<?php if($contactCompanyAddress2 || is_customize_preview()): ?>
					<div class="elementareCompanyAddress2"><p><?php echo esc_html($contactCompanyAddress2); ?></p></div>
				<?php endif; ?>
				<?php if($contactCompanyAddress3 || is_customize_preview()): ?>
					<div class="elementareCompanyAddress3"><p><?php echo esc_html($contactCompanyAddress3); ?></p></div>
				<?php endif; ?>
				<?php if($contactCompanyPhone || is_customize_preview()): ?>
					<?php if($contactCompanyPhoneLink) : ?>
						<?php $numberLink = filter_var($contactCompanyPhone, FILTER_SANITIZE_NUMBER_INT); ?>
						<div class="elementareCompanyPhone"><div class="elementareCompanyPhoneIcon"><i class="fa fa-phone" aria-hidden="true"></i></div><p><a href="tel:<?php echo esc_attr($numberLink); ?>"><?php echo esc_html($contactCompanyPhone); ?></a></p></div>
					<?php else : ?>
						<div class="elementareCompanyPhone"><div class="elementareCompanyPhoneIcon"><i class="fa fa-phone" aria-hidden="true"></i></div><p><?php echo esc_html($contactCompanyPhone); ?></p></div>
					<?php endif; ?>
				<?php endif; ?>
				<?php if($contactCompanyFax || is_customize_preview()): ?>
					<div class="elementareCompanyFax"><div class="elementareCompanyFaxIcon"><i class="fa fa-fax" aria-hidden="true"></i></div><p><?php echo esc_html($contactCompanyFax); ?></p></div>
				<?php endif; ?>
				<?php if(is_email($contactCompanyEmail) || is_customize_preview()): ?>
					<?php if($contactCompanyEmailLink) : ?>
						<div class="elementareCompanyEmail"><div class="elementareCompanyEmailIcon"><i class="fa fa-envelope" aria-hidden="true"></i></div><p><a href="mailto:<?php echo esc_html(antispambot($contactCompanyEmail)); ?>"><?php echo esc_html(antispambot($contactCompanyEmail)); ?></a></p></div>
					<?php else : ?>
						<div class="elementareCompanyEmail"><div class="elementareCompanyEmailIcon"><i class="fa fa-envelope" aria-hidden="true"></i></div><p><?php echo esc_html(antispambot($contactCompanyEmail)); ?></p></div>
					<?php endif; ?>
				<?php endif; ?>
			</div>
			<?php if($contactIcon): ?>
				<div class="elementareContactIcon"><i class="<?php echo esc_attr($contactIcon); ?>" aria-hidden="true"></i></div>
			<?php endif; ?>
		</div>
	</div>
</section>
<?php endif; ?>