function Base() 
{
    
    this.trimString = function(str) { 
        if( str != null && str != undefined ){
            return str.replace(/^[\s\u3000]+|[\s\u3000]+$/g, '');
        }
        return '';
    }
    
    this.checkValidate = function(el) { 
        var inputValue = this.trimString(el.value);
        if(inputValue != ''){
            if (el.type != 'radio') {
                $(el).removeClass('pink');
            } else {
                var p = el.parentNode.parentNode;
                $(p).removeClass('pink');
            }
        }else{
            //Remove space 2byte
            $(el).val(inputValue);
            if (el.type != 'radio') {
                $(el).addClass('pink');
            } else {
                var p = el.parentNode.parentNode;
                $(p).addClass('pink');
            }
        }
    }
  
    
    this.addOptionSelect = function(el, value, text, isSelected){ 
        var optn = document.createElement("OPTION");
        optn.text = text;
        optn.value = value;
        if(isSelected == true){
            optn.selected = 'selected';
        }
        el.options.add(optn);
    }
    
    this.removeOptionSelect = function(el){ 
        for (i = el.length - 1; i>=0; i--) {
            el.remove(i);
        }

    }   
    
    /* 
     * @author: nghiat
     * @desc: 
     *  - listId: danh sach id truyen vao phan cach nhau boi dau phay (vd: '#id1,#id2')
     *   - type: kieu dinh dang chi cho phep nhap vao id nay (vd: chi cho nhat so tu 0-9 thi se truyen vao 'int')
     */
    this.yamFormat = function(listId,type) {
        (function(b){b.fn.yamFormat=function(e){var d={type:"int",auto:false},f=function(a){a=a.which?a.which:event.keyCode;return a>31&&(a<48||a>57)?false:true},h=function(a,g){var c,b;if(window.event)c=window.event.keyCode;else if(g)c=g.which;else return true;b=String.fromCharCode(c);return c==null||c==0||c==8||c==9||c==13||c==27?true:a.val().indexOf(".")>-1?"0123456789".indexOf(b)>-1?true:false:"0123456789.".indexOf(b)>-1?true:false};return this.each(function(){var a=b(this);e&&b.extend(d,e);if(d.auto)a.find("input[int]").each(function(){b(this).keypress(function(a){return f(a)})}),
        a.find("input[float]").each(function(){b(this).keypress(function(a){return h(b(this),a)})});else switch(d.type){case "float":a.keypress(function(a){return h(b(this),a)});break;default:a.keypress(function(a){return f(a)})}})}})(jQuery);
        $(listId).yamFormat({type : type}); 
        
        jQuery(listId).change(function(){ // fixbug truong hop su dung ctrl+v
            if(parseInt($(this).val()) != $(this).val() && type === 'int')
                $(this).val('');
        });
    }
    
    this.dateValid = function(strValue){ /* nghiat: check validator date */

        var objRegExp  =  /^\d{4}\/\d{2}\/\d{2}$/;
        if(!objRegExp.test(strValue))return false;
        datebits = strValue.split('/');
        year = parseInt(datebits[0],10);
        month = parseInt(datebits[1],10);
        day = parseInt(datebits[2],10);

        if ((month<1) || (month>12) || (day<1) ||
            ((month==2) && (day>28+(!(year%4))-(!(year%100))+(!(year%400)))) ||
            (day>30+((month>7)^(month&1)))) return false; // date out of range
    
        return true;

    }
    
    this.datepicker = function(id){    /*  id co the dang chuoi phan cach nhau boi dau ',' (vd: '#id1,#id2,#id3')*/
        typeof id === 'string' ? $(id).datepicker({
            defaultDate: null,
            changeMonth: true,
            changeYear: true,
            showOtherMonths: true,
            selectOtherMonths: true,
            dateFormat: 'yy/mm/dd',
            numberOfMonths: 1,
            hideIfNoPrevNext: true,
            beforeShowDay:function(date){
                
                var text = date.getFullYear()+'';
                if(date.getMonth()<9)text += '0';
                text+=(date.getMonth()+1)+'';
                if(date.getDate()<10)text += '0';
                text+=date.getDate();

                return [true, '', ''];
            }
        }) : null;

    }

}
var Base = new  Base();


