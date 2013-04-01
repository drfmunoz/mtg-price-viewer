$(function () {
	$('#searchCard').focus();
	
	
    var urlMaps = {
        'feedback':'/Message/feedback/{key}',
        'store':'/Message/store/{key}',
        'subscribe':'/Message/subscribe/{key}'
    }

    $('#addStore-form').dialog({
        autoOpen:false,
        height:250,
        width:350,
        modal:true,
        dialogClass:'dialogFormOver',
        show:{effect:'fade', duration:200},
        close:function () {

        }
    });
    $('#addFeedback-form').dialog({
        autoOpen:false,
        height:520,
        width:350,
        modal:true,
        dialogClass:'dialogFormOver',
        show:{effect:'fade', duration:200},
        close:function () {

        }
    });
    $('#subscribe-form').dialog({
        autoOpen:false,
        height:350,
        width:390,
        modal:true,
        dialogClass:'dialogFormOver',
        show:{effect:'fade', duration:200},
        close:function () {

        }
    });
    $('#thankDialog').dialog({autoOpen:false, dialogClass:'dialogFormOver'});

    $('#searchCard').autocomplete({
        source:'/Card/names',
        minLength:3
    });
    $('#searchCard').bind('keypress', function (e) {
        var code = (e.keyCode ? e.keyCode : e.which);
        if (code == 13) {
            $('#searchForm').submit();
        }
    })
    $('#searchButton').click(function () {
        $('#searchForm').submit();
        return false;
    });
    $('#addStore').click(function () {
        $('#addStore-form').dialog('open');
        $('#storeError').html('');
        return false;
    });
    $('#addFeedback').click(function () {
        $('#addFeedback-form').dialog('open');

        return false;
    });
    $('#cardNotification').click(function () {
        $('#subscribe-form').dialog('open');
        return false;
    });
    $('#cancelAddStore').click(function () {
        $('#addStore-form').dialog('close');
        return false;
    });
    $('#cancelFeedback').click(function () {
        $('#addFeedback-form').dialog('close');
        return false;
    });
    $('#cancelSubscribe').click(function () {
        $('#subscribe-form').dialog('close');
        return false;
    });
    /**
     *
     */
    var userKey = $('#keyId').val();
    for (var p in urlMaps) {
        urlMaps[p]=urlMaps[p].replace('{key}', userKey);
    }

    var emailTest = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    var req = {
        timeout : 30000,
        sync: false,
        type: "POST",
        dataType: 'json',
        headers: { "Content-Type": "application/json"}
    };

    $('#addStoreAction').click(function () {
        //submit

        //storeUrl
        var storeUrl = $('#storeUrl').val();
        var urlRegex = /(ftp|http|https):\/\/(\w+:{0,1}\w*@)?(\S+)(:[0-9]+)?(\/|\/([\w#!:.?+=&%@!\-\/]))?/;

        if (urlRegex.test(storeUrl)) {
            //do somehting
            req.url=urlMaps['store'];
            req.data=JSON.stringify({'storeUrl':storeUrl});

            $.ajax(req);

            $('#addStore-form').dialog('close');
            $('#thankDialog').dialog('open');
        }
        else {
            $('#storeError').html($('#storeErrorMessage').html());
        }

        return false;

    });
    $('#sendFeedbackAction').click(function () {
        //submit
        var email = $('#email').val();
        var message= $('#message').val();
        if(emailTest.test(email)){
            $('#feedbackError').html('');
            if(message.length>3){
                req.url=urlMaps['feedback'];
                req.data=JSON.stringify({'email':email,'message':message});
                $.ajax(req);
                /***
                 * send message
                 */

                $('#addFeedback-form').dialog('close');
                $('#thankDialog').dialog('open');
            }
            else{
                $('#feedbackError').html($('#feedbackMessageError').html());
            }
        }else{
            $('#feedbackError').html($('#mailErrorMessage').html());
        }

        return false;
    });

    $('#subscribe').click(function () {
        //submit
        var name=$('#uname').val();
        var email = $('#uemail').val();
        var cardKey=$('#cardKey').val();
        if(name.length>3){
            if(emailTest.test(email)){
                /**
                 * send subscribe message
                 */
                req.url=urlMaps['subscribe'];
                req.data=JSON.stringify({'name':name,'email':email,'cardKey':cardKey});
                $.ajax(req);

                $('#subscribe-form').dialog('close');
                $('#thankDialog').dialog('open');
            }
            else{
                $('#subscribeError').html($('#mailErrorMessage').html());
            }
        }
        else{
            $('#subscribeError').html($('#nameError').html());
        }
        return false;

    });

    if($('.currencyExchange'))$('.currencyExchange').tooltip();
});