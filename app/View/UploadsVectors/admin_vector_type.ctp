<?php 
// File: app/View/UploadsVectors/admin_vector_type.ctp


// content
$th = array(
	'Vector.vector' => array('content' => __('Vector'), 'options' => array('sort' => 'Vector.vector')),
	'Vector.type' => array('content' => __('Vector Type'), 'options' => array('sort' => 'Vector.type')),
	'dns_auto_lookup' => array('content' => __('DNS Tracking')),
	'whois_auto_lookup' => array('content' => __('WHOIS Tracking')),
	'VectorDetail.vt_lookup' => array('content' => __('VT Tracking')),
	'Upload.filename' => array('content' => __('File'), 'options' => array('sort' => 'Upload.filename')),
	//	'Vector.modified' => array('content' => __('Modified'), 'options' => array('sort' => 'Vector.modified')),
	'UploadsVector.created' => array('content' => __('Added'), 'options' => array('sort' => 'UploadsVector.created')),
	'Vector.created' => array('content' => __('Created'), 'options' => array('sort' => 'Vector.created')),
	'actions' => array('content' => __('Actions'), 'options' => array('class' => 'actions')),
	'multiselect' => true,
);

$td = array();
foreach ($uploads_vectors as $i => $uploads_vector)
{
	$actions = $this->Html->link(__('View'), array('controller' => 'vectors', 'action' => 'view', $uploads_vector['Vector']['id']));
	
	$dns_auto_lookup = '&nbsp;';
	$whois_auto_lookup = '&nbsp;';
	if(isset($uploads_vector['Ipaddress']['id']))
	{
		$dns_auto_lookup = $this->Wrap->dnsAutoLookupLevel($uploads_vector['Ipaddress']['dns_auto_lookup'], true);
		$whois_auto_lookup = $this->Wrap->whoisAutoLookupLevel($uploads_vector['Ipaddress']['whois_auto_lookup'], true);
	}
	if(isset($uploads_vector['Hostname']['id']))
	{
		$dns_auto_lookup = $this->Wrap->dnsAutoLookupLevel($uploads_vector['Hostname']['dns_auto_lookup'], true);
		$whois_auto_lookup = $this->Wrap->whoisAutoLookupLevel($uploads_vector['Hostname']['whois_auto_lookup'], true);
	}
	
	$td[$i] = array(
		$this->Html->link($uploads_vector['Vector']['vector'], array('controller' => 'vectors', 'action' => 'view', $uploads_vector['Vector']['id'])),
		$this->Html->link($this->Wrap->niceWord($uploads_vector['Vector']['type']), array('admin' => false, 'controller' => 'vectors', 'action' => 'type', $uploads_vector['Vector']['type'])),
		$dns_auto_lookup,
		$whois_auto_lookup,
		$this->Wrap->vtAutoLookupLevel($uploads_vector['VectorDetail']['vt_lookup'], true),
		$this->Html->link($uploads_vector['Upload']['filename'], array('controller' => 'uploads', 'action' => 'view', $uploads_vector['Upload']['id'])),
//		$this->Wrap->niceTime($uploads_vector['Vector']['modified']),
		$this->Wrap->niceTime($uploads_vector['UploadsVector']['created']),
		$this->Wrap->niceTime($uploads_vector['Vector']['created']),
		array(
			$actions,
			array('class' => 'actions'),
		),
	);
}

echo $this->element('Utilities.page_index', array(
	'page_title' => __('File Vectors'),
	'th' => $th,
	'td' => $td,
));
?>