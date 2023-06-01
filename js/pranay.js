$(document).on('click','input[name="master-options"]',function (){ 
    var dis =$(this).closest("tr");
    // var status = $('.master-options').get(0).checked;
    if($(this).prop("checked") == true){
        dis.find('td .mcheck').removeAttr('disabled');
    }
    else if($(this).prop("checked") == false){
        dis.find('td .mcheck').prop("checked",false);
        dis.find('td .mcheck').attr('disabled','disabled');
    }
});   
$(document).on('click','#selectalloptions',function (){ 
    if(this.checked) {
    // Iterate each checkbox
        $(':checkbox').each(function() {
            $('.mcheck').removeAttr('disabled');
            this.checked = true;      
        });
    } else {
        $(':checkbox').each(function() {
            $('.mcheck').attr('disabled','disabled');
            this.checked = false;                       
        });
    }
});
//apiKey: "AIzaSyAzfHe-pCjhXNZkUV3g2sl6StKNypihThY"
$(document).ready(function() {
    var segments = window.location.pathname.split( '/' );
	var reloadPages = segments.pop() || segments.pop();
	if(reloadPages == '' || reloadPages == 'login')
	{
        var config = {
                apiKey: "AIzaSyATKICKkAPfoB-3c7EdHaGBAToAfuFICLQ",
                authDomain: "notifications-1bdfc.firebaseapp.com",
                databaseURL: "https://notifications-1bdfc.firebaseio.com",
                storageBucket: "notifications-1bdfc.appspot.com",
                messagingSenderId: "35118039506",
            };
        firebase.initializeApp(config);
        const messaging = firebase.messaging();
        messaging
            .requestPermission()
            .then(function () {
                console.log("Notification permission granted.");
                return messaging.getToken()
            })
            .then(function(token) {
                var encodedToken = encodeURIComponent(token);
                $('#token').val(encodedToken);
            })
            .catch(function (err) {
                console.log("Unable to get permission to notify.", err);
            });
            messaging.onMessage(function(payload) {
                var notification = new Notification(payload.notification.title, payload.notification);
                var url = payload.notification.click_action;
                var action = url.replace("'","");
                notification.onclick = function () {
                    window.open(action.replace("'",""));
                };
                setTimeout(notification.close.bind(notification), 10000);
            });
	}
});
$(document).on("click", ".print", function() {
    var mode = 'iframe'; // popup
	var close = mode == "popup";
	var options = { mode : mode, popClose : close};
	$("#printarea").printArea( options );
});
$(document).on("click", "#datetimepicker", function() {
    var dis = $(this);
    dis.closest('.modal-body').find('.bootstrap-select').each(function() { $(this).remove() });
    dis.closest('.modal-body').find('.team').each(function() { $(this).html('Add');$(this).css('display','inline-block');$(this).removeAttr('disabled'); });
});
$(document).on("change", "#maintenance", function() {
    var maintenance = $(this).val();
    if(maintenance == '1')
    { 
        $(".ipaddress").show();
        $(".ipaddress").removeClass('hidden');
        $("#ipaddress").show();
        $("#ipaddress").removeClass('hidden');
        $("#ipaddress").attr('required','required');
    }
    else
    {
        $(".ipaddress").addClass('hidden');   
        $(".ipaddress").hide();
        $("#ipaddress").addClass('hidden'); 
        $("#ipaddress").hide();
        $("#ipaddress").removeAttr('required');
    }
});
$(document).on('change','#cttype',function (){ 
    var type = $(this).val();
    if(type == 'custom')
    {
        $('.iscustom').hide();
    }
    else if(type == 'cms')
    {
        $('.iscustom').show();
    }
});
$(document).ready(function() {
    var type = $('#cttype').val(); 
    if(type == 'custom')
    {
        $('.iscustom').hide();
    }
    else if(type == 'cms')
    {
        $('.iscustom').show();
    }
});
$(document).on('submit','#loginform',function(e){
    e.preventDefault();
    var baseUrl = $("#BaseUri").data('url');
    var action = $(this).data('action');
    var formData = $(this).serialize();
    $.ajax({
        type:'POST',
        url: action,  
        data:formData,
        beforeSend: function() {
            $("#login-submit").attr('disabled','disabled');
            $("#login-submit").html('<i class="fa fa-spinner fa-spin"></i>');
        },
        success: function(res){
            if(res == '1')  
                window.location.href = baseUrl + "home";
            else
                $('.log-error').html(res);
            $('#login-submit').removeAttr('disabled');
            $('#login-submit').html('Log In');
        },
        error: function(error,s) {
            console.log(error.responseText);
            $('#login-submit').removeAttr('disabled');
            $('#login-submit').html('Log In');        
        }
    });
});
$(document).ready(function() {
    var segments = window.location.pathname.split( '/' );
	var reloadPages = segments.pop() || segments.pop();
});
$(document).on('submit','#eventform',function(e){
    e.preventDefault();
    var thisId = $(this);
    var btn = thisId.find("#event-submit");
    var submit = btn.html();
    btn.html('<i class="fa fa-spinner fa-spin"></i>');
    var baseUrl = $("#BaseUri").data('url');
    var action = $(this).attr('action');
    var formData = new FormData(thisId[0]);
    $.ajax({
        type:'POST',
        url: action,  
        dataType : 'JSON',
        data: formData,
        async: false,
        cache: false,
        contentType: false,
        processData: false,
        beforeSend: function() {
            btn.html('<i class="fa fa-spinner fa-spin"></i>');
            btn.attr('disabled','disabled');
        },
        success: function(res){
            thisId.find('.form-group').removeClass('has-danger');
            thisId.find('.form-control').removeClass('form-control-danger');
            thisId.find('.form-text').text('');
            if(!res[0].alert)
            {
                var errorCount = 1;
                $.each(res, function(i, item) {
                    if(res[i].error != '')
                    {
                        thisId.find('.' + res[i].class).closest('.form-group').addClass('has-danger');
                        thisId.find('.' + res[i].class).closest('.form-group').find('.form-control').addClass('form-control-danger');
                        thisId.find('.' + res[i].class).html(res[i].error);
                        if(errorCount === 1)
                            thisId.find('#' + res[i].class).focus();
                        errorCount++;
                    }
                    else
                    {
                        thisId.find('.' + res[i].class).closest('.form-group').removeClass('has-danger');
                        thisId.find('.' + res[i].class).closest('.form-group').find('.form-control').removeClass('form-control-danger');
                        thisId.find('.' + res[i].class).html('');
                    }
                });
            }
            else
            { 
                if(res[0].alert == 'success')
                {
                    if(res[0].redirect)
                        window.location.href = baseUrl + res[0].redirect;
                    if(res[0].reset && res[0].reset == 'yes')
                        thisId[0].reset();
                }
                swal({
                    icon: res[0].alert,
                    title: res[0].heading,
                    text: res[0].msg,
                    showCancelButton: false,
                    closeOnConfirm: false,
                    closeOnCancel: false,
                    timer: 2000
                });
            }
            btn.removeAttr('disabled');
            btn.html(submit);
        },
        error: function(error,s) {
            console.log(error.responseText);
            btn.removeAttr('disabled');
            btn.html(submit);        
        }
    });
});
$(document).on('click','#print',function (){ 
    var baseUrl = $("#BaseUri").data('url');
    var divContents = $(".printableArea").html();
    var printWindow = window.open('', '', 'height=400,width=800');
    printWindow.document.write('<html><head><title>Invoice</title>');
    printWindow.document.write('<link href="' + baseUrl + 'bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">');
    printWindow.document.write('<link href="' + baseUrl + 'css/style.css" rel="stylesheet">');
    printWindow.document.write('<link href="' + baseUrl + 'css/pranay.css" rel="stylesheet">');
    printWindow.document.write('<link href="' + baseUrl + 'css/print.css" rel="stylesheet">');
    printWindow.document.write('</head><body >');
    printWindow.document.write(divContents);
    printWindow.document.write('</body></html>');
    printWindow.document.close();
    printWindow.print();
    return true;
    //$(".printableArea").print();
});