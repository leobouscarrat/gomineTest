<div class="container-fluid">
    <div class="row">
        <?= $this->element('AdminMenu'); ?>
        <div class="col-lg-6">
            <h1><?= __('Editer la catégorie') ?></h1>
            <?= $this->Form->create($dLCategory) ?>
            <div class="input-group">
                <span class="input-group-addon addon-size-fixed">Nom</span>
                <?php
                echo $this->Form->input('name', ['label' => false, 'div' => false, 'class' => 'input-size-fixed form-control title']);
                ?>
            </div><br>
            <span class="input-group-addon">Dossier</span> <input
				type="hidden" name="start" id="start" value="1" />
			<div id="field"	>
				<?php foreach ($dLCategory->folders as $key=>$folder):?>
				<div class="input-group" id="field<?php echo $key?>">
					<input autocomplete="off" class="form-control" 
						name="folders[]" id="folder<?php echo $key?>" type="text" placeholder="Path vers le dossier <?php echo $key+1;?>" value="<?php echo $folder->path;?>" /> 
					<span
						style="display: table-cell; width: 1%; white-space: nowrap; vertical-align: middle;">
						<button id="remove<?php echo $key;?>" class="btn btn-danger remove-me" type="button">-</button>
					</span>
				</div>
				<?php endforeach;
				if (isset($key)):
				?>
				<div class="input-group" id="field<?php echo $key+1;?>">
					<input autocomplete="off" class="form-control" 
						name="folders[]" id="folder<?php echo $key+1;?>" type="text" placeholder="Path vers le dossier <?php echo $key+2;?>" /> 
					<span
						id="b1"
						style="display: table-cell; width: 1%; white-space: nowrap; vertical-align: middle;">
						<button  class="btn add-more" type="button">+</button>
					</span>
				</div>
				<?php endif;?>
			</div>
			<br>
            <div class="input-group">
                <span class="input-group-addon addon-size-fixed">Couleur</span>
                <?php
                echo $this->Form->input('color', ['label' => false, 'div' => false, 'class' => 'input-size-fixed form-control code']);
                ?>
            </div><br>
            <div class="input-group">
                <span class="input-group-addon addon-size-fixed">Lien vers l'icone</span>
                <?php
                echo $this->Form->input('icon', ['label' => false, 'div' => false, 'class' => 'form-control input-size-fixed']);
                ?>
            </div><br>
            <?= $this->Form->button(__('Enregistrer'), ['class' => 'btn btn-primary']) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
<?=$this->start ( 'footerscript' );?>
<script type="text/javascript">

    var next = <?php echo $key+1; ?>;
    $(".add-more").click(function(e){
        e.preventDefault();
        var addto = "#field" + next;
        var addRemove = "#folder"+next;

        next = next + 1;
        
        var newIn = '<div class="input-group" id="field' + next + '"><input autocomplete="off" class="input form-control" id="folder' + next + '" name="folders[]" type="text" "\
		name="prof1" type="text" placeholder="Path vers le dossier '+next+'">';
        var newInput = $(newIn);
        var removeBtn = '<span\
    		class=""\
    		style="display: table-cell; width: 1%; white-space: nowrap; vertical-align: middle;"><button id="remove' + (next - 1) + '" class="btn btn-danger remove-me1" >-</button></span></div>';
        var removeButton = $(removeBtn);
        
        $(addto).after(newInput); //ajoute l'input après le div du n-1 input
        $(addRemove).after(removeButton); //ajoute après le n-1 input
        $("#b1").appendTo("#field"+next);
        $("#field" + next).attr('data-source',$(addto).attr('data-source'));
        $("#start").val(next);  
   		
        
            $('.remove-me1').click(function(e){
                e.preventDefault();
                var fieldNum = this.id.charAt(this.id.length-1);
                console.log(fieldNum);
                var fieldID = "#field" + fieldNum;
                $(this).remove();
                $(fieldID).remove();
            });
    });

    	$('.remove-me').click(function(e){
            e.preventDefault();
            console.log(this.id);
            var fieldNum = this.id.charAt(this.id.length-1);
            console.log(fieldNum);
            var fieldID = "#field" + fieldNum;
            $(this).remove();
            $(fieldID).remove();
        });


</script>
<?php $this->end();?>