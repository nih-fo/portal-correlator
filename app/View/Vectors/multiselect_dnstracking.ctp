<?php ?>
<!-- File: app/View/Vectors/multiselect_dnstracking.ctp -->
<div class="top">
	<h1><?php echo __('Assign DNS Tracking to Vectors'); ?></h1>
</div>
<div class="center">
	<div class="posts form">
	<?php echo $this->Form->create('Vector', array('url' => array('action' => 'multiselect_dnstracking')));?>
	    <fieldset>
	        <legend><?php echo __('Assign DNS Tracking to Vectors'); ?></legend>
	    	<?php
				echo $this->Form->input('dns_auto_lookup', array(
					'label' => __('DNS Tracking Level'),
					'options' => $this->Wrap->dnsAutoLookupLevelOptions(false, true),
				));
	    	?>
	    </fieldset>
	<?php echo $this->Form->end(__('Save')); ?>
	</div>
<?php
if(isset($selected_vectors) and $selected_vectors)
{
	$details = array();
	foreach($selected_vectors as $selected_vector)
	{
		$details[] = array('name' => __('Vector: '), 'value' => $selected_vector);
	}
	echo $this->element('Utilities.details', array(
			'title' => __('Selected Vectors. Count: %s', count($selected_vectors)),
			'details' => $details,
		));
}
?>
</div>
