(function($){"use strict"
var input=$('#single-input').clockpicker({placement:'bottom',align:'left',autoclose:true,'default':'now'});$('.clockpicker').clockpicker({donetext:'Done',}).find('input').change(function(){console.log(this.value);});$('#check-minutes').on("click",function(e){e.stopPropagation();input.clockpicker('show').clockpicker('toggleView','minutes');});})(jQuery)