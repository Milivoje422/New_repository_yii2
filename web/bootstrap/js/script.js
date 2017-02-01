$(document).ready(function() {
   window.setInterval('centerPreviewImages()',300);
});

function centerPreviewImages() {
   var wrapHeight = 125;
   $('.tooltipster').each(function() {
      hgh = $(this).height();
      if (hgh > wrapHeight) {
         mTop = '-' + ((hgh - wrapHeight) / 2) + 'px';
         $(this).css('margin-top', mTop);        
      }
   });
}

function changeLanguage(lang,langurl){
   $.ajax({
            url: langurl,
            type: "post",
            data: "lang=" + lang,
            success: function() {
               location.reload();
            },
            error: function() {
            }
         });
}
