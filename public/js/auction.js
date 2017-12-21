$(function() {
    var socket = io("http://103.253.147.75:3000/");
    socket.on('auction-' + aid.toString(), function(msg) {
        alert_bs("info", "价格已更新。");
        $('#cur-bid').html(msg.bid);
        $("#cur-bid-uname").html(msg.uname);
        $("#cur-bid-time").html(msg.time);
        cur_bid = parseInt(msg.bid);
        if (admin) {
            $("#history-pricing").prepend('<li class="list-group-item"> <span class="lead">$' + msg.bid + ' </span>  ' + msg.uname + ' 于 ' + msg.time + '  </li>');
        }
    });
});