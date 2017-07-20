<?php 
// File: app/View/Vectors/admin_multiselect_multiwhoistracking.ctp

// content
$th = array(
	'Vector.vector' => array('content' => __('Vector'), 'options' => array('sort' => 'Vector.vector')),
	'whois_auto_lookup_select' => array('content' => __('Select WHOIS Tracking Level'), 'options' => array('class' => 'actions')),
	'whois_auto_lookup' => array('content' => __('WHOIS Tracking')),
);

$td = array();
foreach ($vectors as $i => $vector)
{
	$actions = '';
	$whois_auto_lookup = '';
	if(isset($vector['Ipaddress']['id']))
	{
		$whois_auto_lookup = $this->Wrap->whoisAutoLookupLevel($vector['Ipaddress']['whois_auto_lookup'], true);
		$actions = $this->Form->input('Ipaddress.'.$i.'.id', array('type' => 'hidden', 'value' => $vector['Ipaddress']['id']));
		$actions .= $this->Form->input('Ipaddress.'.$i.'.whois_auto_lookup', array(
			'div' => false,
			'label' => false,
			'options' => $this->Wrap->whoisAutoLookupLevelOptions(false),
			'selected' => $vector['Ipaddress']['whois_auto_lookup'],
		));
	}
	if(isset($vector['Hostname']['id']))
	{
		$whois_auto_lookup = $this->Wrap->whoisAutoLookupLevel($vector['Hostname']['whois_auto_lookup'], true);
		$actions = $this->Form->input('Hostname.'.$i.'.id', array('type' => 'hidden', 'value' => $vector['Hostname']['id']));
		$actions .= $this->Form->input('Hostname.'.$i.'.whois_auto_lookup', array(
			'div' => false,
			'label' => false,
			'options' => $this->Wrap->whoisAutoLookupLevelOptions(false),
			'selected' => $vector['Hostname']['whois_auto_lookup'],
		));
	}

	$td[$i] = array(
		$vector['Vector']['vector'],
		array(
			$actions,
			array('class' => 'actions'),
		),
		$whois_auto_lookup,
	);
}

$before_table = false;
$after_table = false;

if($td)
{
	$before_table = $this->Form->create('Vector', array('url' => array('action' => 'multiselect_multiwhoistracking')));
	$after_table = $this->Form->end(__('Save'));
}

echo $this->element('Utilities.page_index', array(
	'page_title' => __('Select WHOIS Tracking for these Vectors'),
	'use_search' => false,
	'th' => $th,
	'td' => $td,
	'before_table' => $before_table,
	'after_table' => $after_table,
	));
?>