var channel_update_option = pusher.subscribe('update-option');
var channel_user_prediction = pusher.subscribe('user-prediction');
var channel_change_match = pusher.subscribe('change-match');
var channel_text = pusher.subscribe('change-text');

channel_change_match.bind('App\\Events\\ChangeMatch', function(data) {
    console.log(data);
    var match = $(`.match_${data.match_id}`)
    if (match != undefined){
        $(match).find('.live-match').removeClass('live');
        if (data.status == 1){
            $(match).find('.live-match').addClass('live');
        }
        $(match).find('.text').text(data.text);
    }
});

channel_update_option.bind('App\\Events\\UpdateOption', function(data) {
    var option = $(`.bet_option_${data.option.id}`)
    $(option).find('a').data('team-name', data.option.option_name);
    $(option).find('a').data('confrontation', data.match.name);
    $(option).find('a').data('id', data.option.id);
    $(option).find('a').data('minamo', data.option.min_amo);
    $(option).find('a').data('macthid', data.match.id);
    $(option).find('a').data('ratioone', data.option.ratio1);
    $(option).find('a').data('ratiotwo', data.option.ratio2);
    $(option).find('a').data('betlimit', data.option.bet_limit);
    $(option).find('a').data('questionid', data.option.ratio1 + " : " + data.option.ratio2);
    $(option).find('a').data('wager-count', data.option.option_name);
    $(option).find('a').data('option_name', data.option.option_name);
    $(option).find('.option-name').text(data.option.option_name);
    $(option).find('.sport-table-wager-button-count').text(data.option.ratio1 + " : " + data.option.ratio2);
    // $(option).find('.progress-bar').text(percent(data.totalInvestByOption, data.totalInvest) + "%");
});

function percent(num_amount, num_total) {
    if (num_total > 0) {
        return Math.round(num_amount * 100 / num_total);
    } else {
        return 0; // or whatever you want
    }
}

$(document).ready(function(){
    $('.total-question').click(function(){
        $(this).parent().parent().parent().find('.all-item').show();
        $(this).text('');
    });
});