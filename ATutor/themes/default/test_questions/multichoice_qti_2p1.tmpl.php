<<?php echo '?'; ?>xml version="1.0" encoding="<?php echo $this->encoding; ?>"<?php echo '?'; ?>>
<!-- single answer multiple choice question -->
<assessmentItem 
	xmlns="http://www.imsglobal.org/xsd/imsqti_v2p1" 
	xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" 
	xsi:schemaLocation="http://www.imsglobal.org/xsd/imsqti_v2p1 imsqti_v2p1.xsd" 
	identifier="ATUTOR-<?php echo $this->row['question_id']; ?>" 
	title="<?php echo $this->row['question']; ?>" 
	adaptive="false" 
	timeDependent="false"
	toolname="ATutor - atutor.ca"
	toolversion="<?php echo VERSION; ?>"
>
	<responseDeclaration identifier="RESPONSE" cardinality="single" baseType="identifier">
	  <correctResponse>
		<?php for ($i=0; $i < $this->num_choices; $i++): ?>
			<?php if ($this->row['answer_'.$i]): ?>
				<value>Choice<?php echo $i; ?></value>
			<?php endif; ?>
		<?php endfor; ?>
	  </correctResponse>
	  <?php if ($this->row['feedback']): ?>
		  <outcomeDeclaration identifier="FEEDBACK" cardinality="single" baseType="identifier"/>
	  <?php endif; ?>
	</responseDeclaration>

	<itemBody>
		<choiceInteraction responseIdentifier="RESPONSE" shuffle="false" maxChoices="1">
			<prompt><?php echo $this->row['question']; ?></prompt>
			<?php for ($i=0; $i < $this->num_choices; $i++): ?>
				<simpleChoice identifier="Choice<?php echo $i; ?>" fixed="false"><?php echo $this->row['choice_'.$i]; ?></simpleChoice> 
			<?php endfor; ?>
	  </choiceInteraction>
	</itemBody>

	<?php if ($this->row['feedback']): ?>
		<modalFeedback outcomeIdentifier="FEEDBACK" identifier="FEEDBACK" showHide="hide"><?php echo $this->row['feedback']; ?></modalFeedback> 
	<?php endif; ?>
</assessmentItem>