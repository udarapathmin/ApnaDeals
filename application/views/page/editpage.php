<div class="container">
	<div class="row">
		<div class="col-md-12">
			<h3><i class="fa fa-file"></i> Edit Page - <?php echo $pageinfo['html_title'] ?></h3><hr>
		</div>
	</div>
    <div class="row">
        <div class="col-md-12">
           <?php if (validation_errors()) { ?>
                <div class="alert alert-danger alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <?php echo validation_errors(); ?>
                </div>
            <?php } ?>
            <?php if (isset($succ_message)) { ?>
                <div class="alert alert-success alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <?php echo $succ_message; ?>
                </div>
            <?php } ?>
            <?php if (isset($error_message)) { ?>
                <div class="alert alert-danger alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <?php echo $error_message; ?>
                </div>
            <?php } ?>
        </div>
    </div>
	<div class="row">
		<div class="col-md-12">
            <script type="text/javascript" src="<?php echo base_url("assets/js/tinymce/tinymce.min.js"); ?>"></script>
<script type="text/javascript">
tinyMCE.init({
    // General options
    mode : "textareas",
    height: 800,
    theme : "modern",
    plugins : "spellchecker,pagebreak,layer,table,save,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,template",
 
    // Theme options
    theme_advanced_buttons1 : "save,newdocument,|,bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,|,styleselect,formatselect,fontselect,fontsizeselect",
    theme_advanced_buttons2 : "cut,copy,paste,pastetext,pasteword,|,search,replace,|,bullist,numlist,|,outdent,indent,blockquote,|,undo,redo,|,link,unlink,anchor,image,cleanup,help,code,|,insertdate,inserttime,preview,|,forecolor,backcolor",
    theme_advanced_buttons3 : "tablecontrols,|,hr,removeformat,visualaid,|,sub,sup,|,charmap,emotions,iespell,media,advhr,|,print,|,ltr,rtl,|,fullscreen",
    theme_advanced_buttons4 : "insertlayer,moveforward,movebackward,absolute,|,styleprops,spellchecker,|,cite,abbr,acronym,del,ins,attribs,|,visualchars,nonbreaking,template,blockquote,pagebreak,|,insertfile,insertimage",
    theme_advanced_toolbar_location : "top",
    theme_advanced_toolbar_align : "left",
    theme_advanced_statusbar_location : "bottom",
    theme_advanced_resizing : true
});
</script>

    <?php echo form_open('page/EditPage/'.$pid); ?>
        <div class="form-group">
            <textarea name="content" style="width:100%">
                <?php echo $pageinfo['content'] ?>
            </textarea>

        </div>
        <button type="submit" class="btn btn-success">Save</button>
    <?php echo form_close(); ?>


		</div>
    </div>
</div>