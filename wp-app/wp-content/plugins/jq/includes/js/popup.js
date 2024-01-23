$(document).ready(function () {
    const body = $("body");
    const popup = $("<div class='popup'></div>").text(popup_obj.common_text);
    body.append(popup)

    const popupMdl = $(".popup");
    popupMdl.append("<form id='support-form' method='post' action='jq_add_support_request'></form>");

    const emailInput = $("<input type='email' id='email' name='email' placeholder='example@mail.com' required>");
    $("#support-form").append(emailInput).append(`<input type='submit' class='btn-sent' value=${popup_obj.btn_text} />`);

    popup.append("<div class='hide' id='result'></div>");
});

$(document).ready(function () {
    const form = $('#support-form');
    form.submit(function (e) {

        e.preventDefault();

        const resultDiv = $("#result");
        const popup = $(".popup");

        $.post(popup_obj.ajax_url,
            {
                action: form.attr('action'),
                email: $('#email').val(),
                jq_nonce: popup_obj.jq_nonce
            },
            function (response) {
                switch (response.status) {
                    case 'added':
                        resultDiv.text(popup_obj.added_msg).removeClass().addClass('show notice');
                        popup.fadeOut(3500);
                        break;
                    case 'existed':
                        resultDiv.text(popup_obj.existed_msg).removeClass().addClass('show repeat');
                        popup.fadeOut(3500);
                        break;
                    default:
                        resultDiv.text(popup_obj.warning_msg).removeClass().addClass('show warn');
                        resultDiv.fadeOut();
                        $('#email').val('');
                        resultDiv.fadeIn();
                        break;
                }
            }
        );
    });
});
