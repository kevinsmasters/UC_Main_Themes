<?php
function kiosk_form_alter(&$form, &$form_state, $form_id) {
    
  if ($form['#id'] == 'views-exposed-form-search-page-page-4') {
  //drupal_set_message($form_id);  // print form ID to messages
  //drupal_set_message(print_r($form, TRUE));  // print array to messages
  $form['field_first_name']['#attributes']['placeholder'][] = t('First Name');	
	$form['field_mi']['#attributes']['placeholder'][] = t('MI');	
	$form['title']['#attributes']['placeholder'][] = t('Last Name');
	$form['field_last_name']['#attributes']['placeholder'][] = t('Last Name');
	$form['submit']['#value'] =t('Tap Here To Search');
  }
}