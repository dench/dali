<?php

use app\helpers\ImageHelper;

/* @var $this yii\web\View */
/* @var $images app\models\Image[] */

$js = <<<JS
function getUrlParam( paramName ) {
    var reParam = new RegExp('(?:[\?&]|&)' + paramName + '=([^&]+)', 'i');
    var match = window.location.search.match(reParam);
    return (match && match.length > 1) ? match[1] : null;
}

$('.image-item').click(function(){
    var obj = $(this);
    var funcNum = getUrlParam('CKEditorFuncNum');
    var fileUrl = obj.attr('data-normal');
    window.opener.CKEDITOR.tools.callFunction(funcNum, fileUrl, function(){
        
        var dialog = this.getDialog();
        
        dialog.getContentElement('info', 'txtAlt').setValue(obj.attr('data-alt'));
    } );
    window.close();
});
JS;

$this->registerJs($js);

?>

<div class="row">
    <?php foreach ($images as $image) : ?>
        <div class="col-sm-4">
            <div class="thumbnail">
                <img src="<?= ImageHelper::small($image->id); ?>" data-alt="<?= $image->alt ?>" data-normal="<?= ImageHelper::normal($image->id) ?>" data-big="<?= ImageHelper::big($image->id) ?>" alt="<?= $image->name ?>" class="image-item">
            </div>
        </div>
    <?php endforeach; ?>
</div>
