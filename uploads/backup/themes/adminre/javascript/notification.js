/**
* Notification chat
**/
//var other_image = "http://test.venturepact.com/uploads/client/small/avatar.png";
var ajaxcalled=0;
var resource;
var top_mess;
var last="";
var trk=1;
var oth;
if (window.location.hostname == 'localhost' || window.location.hostname == 'test.venturepact.com')
{
    resource = "https://incandescent-fire-5373.firebaseio.com/chat";// local api
}
else
{
    resource = "https://venturepact.firebaseio.com/chat"; //server api
}
//console.log("resource:",resource);
notification_objects = {};
var chat_ref = new Firebase(resource);
var chat = new Firechat(chat_ref);

total_unread_count = 0; /*holds total unread messages*/

/*relative path to default image */
DEFAULT_IMAGE = 'uploads/client/small/avatar.png';
$(document).ready(function ()
{
  init();
});

/*toggler ref*/
var title_toggle_inverval;

/*
* Function : notification
* ----------------------
* Purpose
*
* ------------------------
* Parameters:
* u : holds data of current login user
*/

var USER_ONLINE_TIME=new Date().getTime();
function offlineNotificationCount(u)
{
    //console.log('offline notification , user');

    /*
        grab the current user's room
        firebase data location of user's room is : users/[userid]/rooms
    */
    chat_ref.child('users').child(u.auth.id).child('rooms').once('value', function (s)
    {
        rooms = s.val();
        //console.log(s.val());
        /*
          user may not has any room
          if user has then proceed
        */
        if (rooms)
        {
            /*for each room */
            for (room in rooms)
            {
                ////console.log('room ', room);
                /*
                    grab the offline time of user in each room
                    offline_time : rooms-users/[roomid]/userid/
                */
                if(room==$('#chat-box').data('room'))
                {
                    continue;
                }
                else
                {
                    chat_ref.child("room-users")
                        .child(room)
                        .child(u.auth.id)
                        .once('value', (function (room)
                        {
                            /*
                                js : closure
                                refs:
                                http://learn.jquery.com/javascript-101/closures/
                            */
                            return function (s)
                            {
                                ////console.log(s.val());
                                ot = s.val().offline_time;

                                /*
                                    isUserActiveInRoom = s.val().active;
                                    because of ajax call at supplier pages :(
                                */

                                //ot=new Date(79,5,24).getTime();
                                //ot = 1400912193762;

                                if (ot)
                                {

                                    chat._messageRef.child(room)
                                                    .startAt(ot)
                                                    .endAt(USER_ONLINE_TIME)
                                                    .once('value',function(s){
                                                        var active_room=$('#chat-box').data('room');
                                                        ////console.log('active room : ',active_room);
                                                        ////console.log('room',room);
                                                        if(active_room!=room)
                                                        {
                                                            var url;
                                                            var total_offline_messages_in_room=s.numChildren();
                                                            var last_message;
                                                            for(m in s.val())
                                                            {
                                                                last_message=s.val()[m];
                                                            }
                                                            if(total_offline_messages_in_room)
                                                            {
                                                                    //console.log('last : ',total_offline_messages_in_room,last_message);
                                                                    //other={id:1,pic:DEFAULT_IMAGE};

                                                                    chat_ref.child('room-metadata').child(room).once('value', function (s)
                                                                    {
                                                                        //console.log('room-meta', room); // k
                                                                        /*for supplier*/
                                                                        var project_data = s.val().name.split('-'); /*holds project name*/
                                                                        if (window.location.href.indexOf('r=supplier') != -1)
                                                                        {
                                                                            oth=project_data[3];
                                                                            $stat = $('#p_'+project_data[1]).parent().parent().data('status');
                                                                            url='?r=supplier/rfp&render=full&projectid=' + project_data[1] + '&stat=' + $stat;
                                                                            //console.log('url ',url);
                                                                        }
                                                                        else
                                                                        {
                                                                            oth=s.val().createdByUserId;
                                                                            chat_ref.child('users/'+oth+'/rooms/'+room)
                                                                            url='?r=client/pitch&id='+project_data[1]+'&pid='+project_data[5];
                                                                            //console.log('url ',url)
                                                                        }

                                                                        chat_ref.child('users/' + oth).once('value', function (s1)
                                                                        {
                                                                            //notificationUI(p, r, s1.val(), m);
                                                                            oth=s1.val();
                                                                            //console.log('other id', project_data);
                                                                            if (window.notification_objects[room])
                                                                            {
                                                                                var number = window.notification_objects[room].find('.label');
                                                                                number.html(parseInt(number.html()) + total_offline_messages_in_room);
                                                                                //console.log("online precedes offline");
                                                                            }
                                                                            else
                                                                            {
                                                                             window.notification_objects[room] = $($.parseHTML('<a class="media border-dotted" href="'+url+'" id="minfo' + room + '">'
                                                                                                         + '<span class="pull-left">'
                                                                                                         + '<img alt="'+oth.name+'" class="media-object img-circle" src="'+(oth.pic?oth.pic:DEFAULT_IMAGE)+'">'
                                                                                                         + '</span>'
                                                                                                         + '<span class="media-body">'
                                                                                                         + '<span class="media-heading">'
                                                                                                         + 'Project : ' + project_data[2]
                                                                                                         + '<span class="label label-info pull-right" data-original-title="1 unread message" data-toggle="tooltip" data-placement="right" >'+total_offline_messages_in_room+'</span>'
                                                                                                         + '</span>'
                                                                                                         + '<span class="media-text ellipsis nm recent-mesg">' + last_message.message + '</span>'
                                                                                                         + '</span>'
                                                                                                         + '<span class ="message-time media-meta pull-right">' + new Date(last_message.timestamp).toLocaleString() + '</span>'
                                                                                                         + '</a>', document, false));
                                                                                                        //console.log("ofline block");
                                                                                                        $('#chatmessages').prepend(window.notification_objects[room]).fadeIn();
                                                                            }
                                                                                                        /*to hide alert box*/
                                                                                                        $('#chatmessages > div').hide();

                                                                                                        total_unread_count+=total_offline_messages_in_room;
                                                                                                        leftNotificationCounter(room,total_offline_messages_in_room);
                                                                                                        projectNotificationCounter(room,total_offline_messages_in_room);
                                                                                                        if (total_unread_count > 0)
                                                                                                        {
                                                                                                            $icon = $('#chatmessages').parents('.dropdown-menu').siblings('a').find('span').eq(0);
                                                                                                            $icon.append('<span class="label label-info">' + total_unread_count + '</span>');
                                                                                                        }

                                                                        });//end of chat ref

                                                                    });//end of chat ref outer

                                                            }
                                                        }//end of if active room
                                    });//end of chat message ref

                                } //end of if ot
                            }

                        })(room));
                }

            }/*for end*/
        }
    });
}

function leftNotificationCounter(room,count)
{
    //console.log('left side :', count);
    chat_ref.child('room-metadata').child(room).once('value', function (s)
    {
        var project_data = s.val().name.split('-'); /*index[1] : id , index[2]: name*/
        //console.log(s.val(), project_data);


        /*supplier side*/
        $counter = $('.submenu a[data-target=#p_' + project_data[1] + ']').find('.projectmessagecount');
        //console.log($counter);
        if ($counter.length)
        {
            if(count>0)
            {
                $counter.show();
                $counter.html(count);
                $counter.attr('data-original-title',count + ' unread messages(s)');
            }
            else
            {
                $counter.hide();
                $counter.html('');
                $counter.attr('data-original-title','no unread messages(s)');
            }
        }
        /*client-side*/
        $c = $('.projectmessagecount[data-pid=' + project_data[1] + ']');
        if ($c.length)
        {
            if(count>0)
            {
                $c.show();
                $c.html(count);
                $c.attr('data-original-title',count + ' unread messages(s)');
            }
            else
            {
                $c.hide();
                $c.html('');
                $c.attr('data-original-title','no unread messages(s)');
            }
        }

    });

}

function projectNotificationCounter(room,count)
{
    //console.log('in project : ',room);
    /*there is project class*/
    if ($('.project').length)
    {
        /*three posibility may be there*/
        /*either it's client's index page or compare page or supplier index page*/

        /*for supplier's index page and client's compare page */

        var $counter = $('.project[data-room=' + room + ']').find('.msg2');

        if ($counter.length)
        {
            ////console.log($counter);
            //console.log('Either supplier index page or client compare page');
            $counter.html(count);

        }

        if ($('#number' + room).length)
        {
            /*client index page*/
            //console.log('client index page');
            var $count = $('#number' + room);
            $count.val(count);
            sum = 0;
            var $project = $count.parents('.project');
            $project.find('.counter').each(function ()
            {
                sum += parseInt($(this).val());
            });

            var $counter = $project.find('.mes1');
            //$counter.html(parseInt($counter.html()) + 1);
            $counter.html(sum);
        }
    }
}



function notification(u)
{
    //console.log('in notification , user', u);

    /*
		grab the current user's room
		firebase data location of user's room is : users/[userid]/rooms
	*/
    chat_ref.child('users').child(u.auth.id).child('rooms').once('value', function (s)
    {
        rooms = s.val();
        /*
		  user may not has any room
		  if user has then proceed
		*/
        if (rooms)
        {
            /*for each room */
            for (room in rooms)
            {

               /*message listener for each room*/
	            chat._messageRef.child(room)
    							.startAt(USER_ONLINE_TIME)
    							.on('child_added', notificationHandler(u, room));

            }/*for end*/
        }
    });
}

/*
* Function : notificationHandler
* -------------------------------
* it increases the counter at various places
* (
*   1. left panel (client,supplier),
*   2. proposal panel(client's index page + compare page,supplier index page)
* )
* whenever a new message is recieved. and also generates notification on top
*/
function notificationHandler(user, room)
{
    return function (s)
    {
        /*grab message*/
        var message = s.val();
        message.id = s.name();
        //console.log('message-added:', s.val());

        /*grab user's state in same room from which message is recieved*/
        chat_ref.child('room-users/' + room + '/' + user.auth.id).once('value', (function(room)
        {
            return function (s1)
            {
                //console.log('user active handler', user, room);
                isUserActiveInRoom = s1.val().active;
                //console.log('user active : ', isUserActiveInRoom);
                /*if */
                if (!isUserActiveInRoom && message.userId != user.auth.id)
                {
                    /*increase unread counter*/
                    total_unread_count += 1;

                    /*generate notification*/
                    topMessageNotification(room, message);

                    /*increase counter*/
                    leftSideMessageCounter(room, message);
                    projectMessageCounter(room, message);
                }
                else
                {
                    //console.log('user is active in room');
                }
            }
        })(room));
     }
}

function leftSideMessageCounter(room, message)
{
    //console.log('left side');
    chat_ref.child('room-metadata').child(room).once('value', function (s)
    {
        var project_data = s.val().name.split('-'); /*index[1] : id , index[2]: name*/
        //console.log(s.val(), project_data);


        /*supplier side*/
        $counter = $('.submenu a[data-target=#p_' + project_data[1] + ']').find('.projectmessagecount');
        //console.log($counter);
        if ($counter.length)
        {
            if($counter.html()=='')
            {
                $counter.show();
                $counter.html('1');
                $counter.attr('data-original-title',parseInt($counter.html()) + ' unread messages(s)');
            }
            else
            {
                $counter.show();
                $counter.html(parseInt($counter.html())+1);
                $counter.attr('data-original-title',$counter.html()+' unread messages(s)');
            }
        }
        /*client-side*/
        $c = $('.projectmessagecount[data-pid=' + project_data[1] + ']');
        if ($c.length)
        {
            if($c.html()=='')
            {
                $c.show();
                $c.html('1');
                $c.attr('data-original-title',parseInt($c.html()) + ' unread messages(s)');
            }
            else
            {
                $c.show();
                $c.html(parseInt($c.html()) + 1);
                $c.attr('data-original-title',parseInt($c.html()) + ' unread messages(s)');
            }
        }
    });
}
function projectMessageCounter(room, message)
{
    //console.log('in project : ',room);
    /*there is project class*/
    if ($('.project').length)
    {
        /*three posibility may be there*/
        /*either it's client's index page or compare page or supplier index page*/

        /*for supplier's index page and client's compare page */

        var $counter = $('.project[data-room=' + room + ']').find('.msg2');

        if ($counter.length)
        {
            //console.log($counter);
            //console.log('Either supplier index page or client compare page');
            $counter.html(parseInt($counter.html()) + 1);
        }

        if ($('#number' + room).length)
        {
            /*client index page*/
            //console.log('client index page');
            var $count = $('#number' + room);
            $count.val(parseInt($count.val()) + 1);
            sum = 0;
            var $project = $count.parents('.project');
            $project.find('.counter').each(function ()
            {
                sum += parseInt($(this).val());
            });
            var $counter = $project.find('.mes1');
            //$counter.html(parseInt($counter.html()) + 1);
            $counter.html(sum);
        }
    }
}

//function UserMessages()
//{
//    this.Room;
//    this.MessageCount;
//    this.Message;
//    this.Description;
//}

//var roomarray = new Array();
//var myarray = new Array();



function topMessageNotification(room, message)
{

    /*var m = new UserMessages();
    m.Room = room;
    m.MessageCount = 1;
    m.Message = message;
    myarray.push(m);

    */

    ////console.log('top message notification', room, message); //room variation K
    ////console.log('#minfo' + room)
    //////console.log(JSON.stringify(info));
    ////console.log(info + '  with length ' + info.length + ' ' + $('#minfo' + room).length);

    if (window.notification_objects[room])
    {
        var number = window.notification_objects[room].find('.label');
        number.html(parseInt(number.html()) + 1);
        window.notification_objects[room].find('.recent-mesg').html(message.message);
        window.notification_objects[room].find('.message-time').html(new Date(message.timestamp).toLocaleString());
        console.log("online after offline");

            console.log(window.notification_objects[room]);
        $('#minfo'+room).hide().prependTo('#chatmessages').fadeIn();
    }
    else
    {
        //roomarray.push(room);

        /*grab room data in other to */
        chat_ref.child('room-metadata').child(room).once('value', function (s)
        {
            console.log('room-meta', room, message); // k
            /*for supplier*/
            var project_data = s.val().name.split('-'); /*holds project name*/
            if (window.location.href.indexOf('r=supplier') != -1)
            {
                oth=project_data[3];

            }
            else
            {
                oth=s.val().createdByUserId;
            }

            chat_ref.child('users/' + oth).once('value', (function (p, r, m)
            {
                return function (s1)
                {
                    notificationUI(p, r, s1.val(), m);
                }
            })(project_data[2], room, message));

        });


        /*to hide alert box*/
        $('#chatmessages > div').hide();
    }

    /*to update badge*/
    if (total_unread_count > 0)
    {
        $icon = $('#chatmessages').parents('.dropdown-menu').siblings('a').find('span').eq(0);
        if($icon.find('.label').html())
        {
            $icon.find('.label').html(total_unread_count);
        }
        else
        {
            $icon.append('<span class="label label-info">' + total_unread_count + '</span>');
        }
    }

}
function notificationUI(project,room,o,message)
{
    chat_ref.child('room-metadata').child(room).once('value', function (s)
    {
        var url;
        var project_data = s.val().name.split('-'); /*holds project name*/
        if (window.location.href.indexOf('r=supplier') != -1)
        {
            oth=project_data[3];
            $stat = $('#p_'+project_data[1]).parent().parent().data('status');
            url='?r=supplier/rfp&render=full&projectid=' + project_data[1] + '&stat=' + parseInt($stat);
            console.log('url ',url);
        }
        else
        {
            oth=s.val().createdByUserId;
            chat_ref.child('users/'+oth+'/rooms/'+room)
            url='?r=client/pitch&id='+project_data[1]+'&pid='+project_data[5];
            console.log('url ',url)
        }
        //console.log('this is message',message);
        if(!window.notification_objects[room])
        {
        window.notification_objects[room] = $($.parseHTML('<a class="media border-dotted" href="' + url +'" id="minfo' + room + '">'
                                                         + '<span class="pull-left">'
                                                         + '<img alt="'+oth.name+'" class="media-object img-circle" src="'+(oth.pic?oth.pic:DEFAULT_IMAGE)+'">'
                                                         + '</span>'
                                                         + '<span class="media-body">'
                                                         + '<span class="media-heading">'
                                                         + 'Project : ' + project
                                                         + '<span class="label label-info pull-right" data-original-title="1 unread message" data-toggle="tooltip" data-placement="right" >1</span>'
                                                         + '</span>'
                                                         + '<span class="media-text ellipsis nm recent-mesg">' + message.message + '</span>'
                                                         + '</span>'
                                                         + '<span class ="message-time media-meta pull-right">' + new Date(message.timestamp).toLocaleString() + '</span>'
                                                         + '</a>', document, false));

        ////console.log('element :',ele, ele.get());
        ////console.log('in ui', window.notification_objects);
        //var unreadMesages=$('#chatmessages').html();
        ////console.log('these are unread',unreadMesages);
        //$('#chatmessages').html('');
        
            $('#chatmessages').prepend(window.notification_objects[room]).fadeIn();
            console.log("offline not found");
        }
        else
        {
            var number = window.notification_objects[room].find('.label');
            number.html(parseInt(number.html()) + 1);
            window.notification_objects[room].find('.recent-mesg').html(message.message);
            window.notification_objects[room].find('.message-time').html(new Date(message.timestamp).toLocaleString());
            console.log("online after offline");
        }
        ////console.log('new added');
        //$('#chatmessages').append(unreadMesages);
        ////console.log('old added');
    });
}

/*
* to authenticate user with firebase :
* token : holds user data  in encrypted form
*/
var ROOM;
//$('#chat-box .media').load(function()
//{
//$('#chat-box .np .loadchat').hide();
//});
function init()
{
    try
    {
        //console.log('init called');
        chat_ref.auth(token, function (e, u)
        {

            if (e) /*if something went wrong*/
            {
                /*put */
                //console.log('error');
                //console.log(e);
            }
            else /*successful authenticated*/
            {
                //console.log('authenticated', u);
                u.auth.pic = u.auth.pic ? u.auth.pic : DEFAULT_IMAGE;
                /*to make user online*/

                chat.setUser(u.auth.id, u.auth.name, u.auth.pic, function ()
                {
                    //console.log('user is online',u);
                    
                    offlineNotificationCount(u);
                    /*real-time notification count*/
                    notification(u);

                    /*
                        as soon as ajax request get completed
                        check is there chat-box ?
                        if there load chat
                    */

                    /*
                        for client side chat (pitch) page
                        client side chat page is loaded normally

                    */
                    if ($('#chat-box').length)
                    {
                        //console.log('chatbox is here : calling chat');
                        //console.log('first');
                        chatInit(u);

                        $('#chat-box .np .loadchat').hide();
                        //console.log("loadchat removed");
                    }// end of chat box detect

                    /*
                        for supplier side chat (rfp,pitch) pages
                        supplier chat side pages are loaded via ajax
                    */
                    //console.log('ajax complete initialize');
                    $(document).ajaxComplete(function ()
                    {

                        //console.log('ajax complete triggered');
                        /*if there is chat box  */
                        if(ajaxcalled!=0)

                        {
                            ajaxcalled=0;
                        }
                        else
                        {
                            if ($('#chat-box').length)
                            {
                                //console.log('page loaded via ajax');
                                //console.log('chatbox is here : calling chat');
                                //console.log('chat users : ', other, u);
                                var active_room=$('#chat-box').data('room');
                                //console.log("label: ",window.notification_objects[active_room].find('.label').html());
                                //console.log('active room : ',active_room);
                                if(active_room)
                                {
                                    chat_ref.child('room-metadata').child(active_room).once('value', function (s)
                                    {
                                        var project_data = s.val().name.split('-'); /*holds project name*/
                                        /*resetting counter*/
                                        $counter = $('.submenu a[data-target=#p_' + project_data[1] + ']').find('.projectmessagecount');
                                        var count=0;
                                        if ($counter.length)
                                        {
                                             count=parseInt($counter.html());
                                        //      if(count>0)
                                        //     {
                                        //         $counter.show();
                                        //         $counter.html(count);
                                        //         $counter.attr('data-original-title', count +' unread messages(s)');
                                        //     }
                                        //     else
                                        //     {
                                        //         $counter.hide();
                                                $counter.html('');
                                                $counter.hide();
                                                $counter.attr('data-original-title','no unread message(s)');
                                            // }

                                        }

                                        /*client-side*/
                                        $c = $('.projectmessagecount[data-pid=' + project_data[1] + ']');
                                        if ($c.length)
                                        {
                                            count=parseInt($c.html());
                                            // if(count>0)
                                            // {
                                            //     $c.show();
                                            //     $c.html(count);
                                            //     $c.attr('data-original-title',count + ' unread messages(s)');
                                            // }
                                            // else
                                            // {
                                                $c.hide();

                                                $c.attr('data-original-title','no unread messages(s)');
                                            // }
                                        }

                                        /*removing notification*/
                                        if(window.notification_objects[active_room])
                                            window.notification_objects[active_room].remove();
                                        $('#minfo'+active_room).remove();
                                        //console.log('active_room',active_room);

                                        //console.log('active_room',room);
                                        /*redefining red ball on icon*/
                                        $icon = $('#chatmessages').parents('.dropdown-menu').siblings('a').find('span').eq(0);
                                        console.log("initial label :",$icon.find('.label').html());
                                        var diff=parseInt($icon.find('.label').html())-count;
                                        console.log("count :",count);
                                        console.log("diff :",diff);
                                        total_unread_count-=count;
                                        if(diff>0)
                                        {
                                            $icon.find('.label').html(diff);
                                            console.log("reduced label :",$icon.find('.label').html());
                                        }
                                        else
                                        {
                                            $icon.find('.label').remove();
                                        }

                                    });// end of chat_ref

                                    if(ROOM && active_room!=ROOM)
                                    {
                                        chat_ref.child('users').child(u.auth.id).update({ 'offline_time': Firebase.ServerValue.TIMESTAMP });
                                        chat_ref.child("room-users").child(ROOM).child(u.auth.id).update({ 'offline_time': Firebase.ServerValue.TIMESTAMP });
                                        chat_ref.child("room-users").child(ROOM).child(u.auth.id).update({ "active": false });

                                    }
                                    ROOM=active_room;
                                }//end of of active room
                                //console.log('second');
                                chatInit(u);
                                $('#chat-box .np .loadchat').hide();
                                //console.log("loadchat removed");
                                //console.log('out of if');
                            }//end of chat box detect
                        }
                    });//end of ajaxcomplete
                });
            }//end of successful authentication
        });
    }
    catch(e)
    {
        //console.log("an error occured. Refer log for details");
    }
}
/*initialize script*/

//init();





/*
* Function : isWindowHidden()
* ---------------------------
* Purpose
* It checks whether window is active
* or not. If active returns false else true
* ----------------------------
* Returns
* boolean value
*/

function isWindowHidden()
{
    return document.hidden || document.webkitHidden || document.mozHidden || document.msHidden || false;
}

/*Dectect visibilty change event name
* Refs :
* https://developer.mozilla.org/en-US/docs/Web/Guide/User_experience/Using_the_Page_Visibility_API
* http://www.w3.org/TR/page-visibility/
*/
var PAGE_TITLE = document.title;
// var VISIBILITY_CHANGE_EVENT
// var paramDelay;


// if (typeof document.hidden == "undefined")
// {
//     extension = ['ms', 'webkit', 'moz', 'o']
//     for (i in extension)
//     {
//         if (typeof document[extension[i] + 'Hidden'] !== "undefined")
//         {

//             VISIBILITY_CHANGE_EVENT = extension[i] + 'visibilitychange';
////             //console.log(VISIBILITY_CHANGE_EVENT);
//             break;
//         }
//     }
// }
// else
// {
//     VISIBILITY_CHANGE_EVENT = 'visibilitychange';
// }

// document.addEventListener(VISIBILITY_CHANGE_EVENT, function ()
// {
//     /*if tab goes active*/
////     console.log('visibilitychanged');
//     if (!isWindowHidden())
//     {
////         console.log('tab is active');
//         /*remove toggler*/
//         if (title_toggle_inverval)
//         {
////             console.log('clearing toggle interval :',title_toggle_inverval);
//             clearInterval(title_toggle_inverval);


//         }
////         console.log("chnge page title: ",title_toggle_inverval);
//         document.title = PAGE_TITLE;
//         paramDelay=0;
//     }
// });
$(window).bind("focus", function(e) {
    if( e.target === window ) {
        //console.log('interval :',title_toggle_inverval);
        if (title_toggle_inverval)
        {
            //console.log('clearing toggle interval');
            clearInterval(title_toggle_inverval);
            title_toggle_inverval="";
        }
        //console.log("chnge page title");
        document.title = document.title != PAGE_TITLE ? PAGE_TITLE : PAGE_TITLE;

        paramDelay=0;
    }
});


/*
* Function: track(other)
* ----------------------
* Purpose
* It tracks the other user status as soon as it join  the room
* ----------------------
* Parameter
* other : a object(id,name) : to whom current login user is talking
*/

function track(oth)
{
    var room = $('#chat-box').data('room');
    //console.log("track:",room);
    /*wait for client to enter room*/
    chat._firebase.child("room-users").child(room).on('value', function (s)
    {
        //console.log(s.val());
        var id;
        for (k in s.val())
        {
            if (k == oth.id)
            {
                otherUserStatusTracking(oth);
                trackTyping(oth);
                chat._firebase.child("room-users").child(room).off('value');
                break;
            }
        }
        trk=1;
    });
}

function sleep(milliseconds) 
{
  var start = new Date().getTime();
  for (var i = 0; i < 1e7; i++) 
  {
    if ((new Date().getTime() - start) > milliseconds)
    {
      break;
    }
  }
}
/*
* Function offlineMessageCount
* --------------------
* Purpose
* To count how many messages current user
* has recieved for a particuler chat (room) during
* his or her offline time period
*/

function offlineMessagesCount(user)
{
    var room = $('#chat-box').data('room');
    var ot;
    /*grab user offline time */
    chat_ref.child("room-users")
            .child(room)
            .child(user.auth.id)
            .once('value', function (s)
            {
                ot = s.val().offline_time;
                if (ot)
                {
                    chat._messageRef.child(room)
                                    .startAt(ot)
                                    .endAt(new Date().getTime())
                                    .once('value', function (s)
                                    {
                                        if (s.numChildren() == 0)
                                        {
                                            $('#chat-box .badge').html('');
                                        }
                                        else
                                        {
                                            $('#chat-box .badge').html(s.numChildren());

                                            /*to pop out bubble after few secs*/
                                            setTimeout(function () { $('#chat-box .badge').html(''); }, 5000);
                                        }

                                    });
                }
            });
}

/*
* Function : setReadingFunctionality()
* ------------------------------------
* Purpose
* It displays message
*
*/
function setReadingFunctionality(user)
{

    //console.log("inside reading");
    var room = $('#chat-box').data('room');

    /*do not put var before it*/
    last_message_id = '1';
    top_mess=["","0"];
    chat._messageRef.child(room).on('child_added', function (s,p)
    {
        //console.log("child added");
        if(top_mess[1]=="0")
        {
            top_mess[0]=s.name();
            top_mess[1]="1";
            //console.log("new top mess",top_mess);
        }
        /*to avoid duplicate messages*/
        if (last_message_id != s.name())
        {
            var message_object = s.val();
            //console.log('last-message : ', last_message_id);
            //console.log('message-added : ', s.name());
            //console.log('message-added after :',p);
            //console.log(message_object);
            timestamp = new Date(message_object.timestamp);
            /*if it it current user*/
            var n_mess;
            if (user.auth.id == message_object.userId)
            {
                if(message_object.message.split(':')[0]=="http" || message_object.message.split(':')[0]=="https")
                {
                    n_mess = ('<li class="media media-right" id="'+ s.name() +'">'
                            + '<a href="javascript:void(0);" class="media-object">'
                            + '  <img src="' + chat._userPic + '" class="img-circle" alt="">'
                            + '</a>'
                            + '<div class="media-body">'
                            + '  <p class="media-text" style="word-wrap:break-word;max-width:100%" title="' + timestamp.toTimeString() + '">' 
                            + '      <a style="text-decoration:none;color:white" target="_blank" class="media-link" href="' + message_object.message + '">' + message_object.message + '</a>' 
                            + '  </p>'
                            + '  <span class="clearfix"></span>'
                            + '  <p class="media-meta" style="clear:both">' + timestamp.toDateString() + '</p>'
                            + '</div>'
                            + '</li>');
                
                }
                else
                {
                    n_mess = ('<li class="media media-right" id="'+ s.name() +'">'
                            + '<a href="javascript:void(0);" class="media-object">'
                            + '  <img src="' + chat._userPic + '" class="img-circle" alt="">'
                            + '</a>'
                            + '<div class="media-body">'
                            + '  <p class="media-text" style="word-wrap:break-word;max-width:100%" title="' + timestamp.toTimeString() + '">' + message_object.message + '</p>'
                            + '  <span class="clearfix"></span>'
                            + '  <p class="media-meta" style="clear:both">' + timestamp.toDateString() + '</p>'
                            + '</div>'
                            + '</li>');
                }
            }
            else
            {
                if(message_object.message.split(':')[0]=="http" || message_object.message.split(':')[0]=="https")
                {
                    n_mess = ('<li class="media" id="'+ s.name() +'">'
                            + '<a href="javascript:void(0);" class="media-object">'
                            + '  <img src="' + (other_image?other_image:DEFAULT_IMAGE) + '" class="img-circle" alt="">'
                            + '</a>'
                            + '<div class="media-body">'
                            + '  <p class="media-text" style="word-wrap:break-word;max-width:100%" title="' + timestamp.toTimeString() + '">' 
                            + '      <a style="text-decoration:none;color:black" target="_blank" class="media-link" href="' + message_object.message + '">' + message_object.message + '</a>' 
                            + '  </p>'
                            + '  <span class="clearfix"></span>'
                            + '  <p class="media-meta" style="clear:both">' + timestamp.toDateString() + '</p>'
                            + '</div>'
                            + '</li>');
                }
                else
                {
                    n_mess = ('<li class="media" id="'+ s.name() +'">'
                           + '<a href="javascript:void(0);" class="media-object">'
                           + '  <img src="' + (other_image?other_image:DEFAULT_IMAGE) + '" class="img-circle" alt="">'
                           + '</a>'
                           + '<div class="media-body" >'
                           + '  <p class="media-text" style="word-wrap:break-word;max-width:100%" title="' + timestamp.toTimeString() + '">' + message_object.message + '</p>'
                           + '  <span class="clearfix"></span>'
                           + '  <p class="media-meta" style="clear:both;">' + timestamp.toDateString() + '</p>'
                           + '</div>'
                    + '</li>');
                }
                //console.log(other);
                playSound();
                //console.log("toggle called");
                toggleTitleOnMessage(message_object.name);
            }
            /*scroll down*/
            if(top_mess[0]>s.name())
            {
                var path = '#chat-box .media-list #'+ top_mess[0];
                //console.log("path :",path);
                $(path).before(n_mess);

            }
            else if(room == $('#chat-box').data('room'))
            {
                $('#chat-box .media-list').append(n_mess);
            }
            $('#chat-box .media-list').eq(0).scrollTop($('#chat-box .media-list')[0].scrollHeight);
            //console.log("scroll height " + $('#chat-box .media-list')[0].scrollHeight);

        }

        last_message_id = s.name();
        //console.log('lmi',last_message_id);
    });
}


function setWritingFunctionality(user)
{
    /* send button functionality */
    $('#chat-box').delegate(".send", "click", function (e)
    {
        /*grab content of message*/
        var $mb = $(this).parent().siblings();
        if ($mb.val() !== '')  /*if message is not empty*/
        {

            roomid = $('#chat-box').data("room");
            chat.sendMessage(roomid, $mb.val());
            var mess = $mb.val();
            $mb.val('');
            chat._firebase.child("room-users").child(roomid).child(user.auth.id).update({ '_typing': false });
            
            //console.log("mail to : " + other_notification);
            //console.log("roomid",roomid);
            chat_ref.child('room-users').child(roomid).child(other_notification.id).once('value',function(s)
            {
                //console.log(s.val());
                if(!s.val().active)
                {
                    chat_ref.child('room-metadata').child(roomid).once('value', function (s)
                    {
                        var project_data = s.val().name.split('-'); /*holds project name*/
                        //console.log("pid: ",project_data[1]);
                        //console.log("send mail;",other);
                    ajaxcalled=1;
                    sendmail(other_notification.id,project_data[1],mess);
                    });

                }
                else
                {
                    //console.log("mail stacked");
                }
            });
        }

    });

    /*to handle chat-box functionality*/
    $('#chat-box').delegate(".message", "keypress", function (e)
    {
        //console.log("key press");
        var roomid = $('#chat-box').data("room");
        if (e.keyCode == 13) /*if enter is pressed*/
        {
            //take content & send it
            if ($(this).val() !== '')
            {

                chat.sendMessage(roomid, $(this).val());
                var mess = $(this).val();
                $(this).val('');
                chat._firebase.child("room-users").child(roomid).child(user.auth.id).update({ '_typing': false });
                //console.log("mail");
                chat_ref.child('room-users').child(roomid).child(other_notification.id).once('value',function(s)
                {
                    //console.log("roomid",roomid);
                    //console.log(s.val());
                    if(!s.val().active)
                    {
                        chat_ref.child('room-metadata').child(roomid).once('value', function (s)
                    {
                        var project_data = s.val().name.split('-'); /*holds project name*/

                        //console.log("pid: ",project_data[1]);
                        //console.log("send mail;",other_notification);
                        ajaxcalled=1;
                        sendmail(other_notification.id,project_data[1],mess);
                    });
                    }
                    else
                    {
                        //console.log("mail stacked");
                    }
                });
            }
        }
        else
        {
            //console.log("checking typing");
            if ($(this).val() !== '')
            {
                //console.log('typing true');
                chat._firebase.child("room-users").child(roomid).child(user.auth.id).update({ '_typing': true });
            }
            else
            {
                chat._firebase.child("room-users").child(roomid).child(user.auth.id).update({ '_typing': false });
                //console.log('type flse');
            }
        }
    });
    $('#chat-box').delegate(".message", "blur", function (e)
    {
        var roomid = $('#chat-box').data("room");
        //console.log("chat lost focus");
        chat._firebase.child("room-users").child(roomid).child(user.auth.id).update({ '_typing': false });
    });
    

}

/*
* Function trackTyping
* --------------------
* Parameters
* other : a object(id,name)
* Purpose:
* To track whether other person is typing or not
*/
var typetrk;
function trackTyping(oth)
{
    //console.log("new type tracking");
    /*track typing status*/
    var $dot = $('#chat-box .panel-title>i');

    var r = $('#chat-box').data('room');
    typetrk = function (s)
    {
        if(r == $('#chat-box').data('room') && other.name.toLowerCase() == $('#chat-box .name').html().trim().toLowerCase())
        {
            //console.log("in " + r + "with" + other.name);
            if(s.val()._typing)
            {
                //console.log()
                $('#chat-box .status>i').html(oth.name + ' is typing..');
            }
            else
            {
                $('#chat-box .status>i').html('');
                if ($dot.hasClass('text-default'))
                    $('#chat-box .status>i').html(oth.name + ' is offline');
            }
        }
    };

    chat._firebase.child('room-users/'+r+'/'+oth.id).on('value', typetrk);
}

var otrtrk =0;
function otherUserStatusTracking(oth)
{
    /* track supplier status : online or offline */
    var trkother = function (s)
    {
        var r = $('#chat-box').data('room');
        //start loader say connecting
        if (s.val() == null)// if suppplier went offline
        {
            /*set status*/
            
            if(trk)
            {
                //console.log("found a previous typing tracker",last," ",oth.id);
                chat._firebase.child('room-users/'+r+'/'+last).off('value');
                trk=0;
            }
            /*set grey dot*/
            var $dot = $('#chat-box .panel-title>i');
            last =oth.id;
            if ($dot.hasClass('text-success'))
            {
                $dot.removeClass('text-success');
            }
            $dot.addClass('text-default');
            $('#chat-box .status>i').html(oth.name + ' is offline');
            //console.log("delay end");
        }
        else /* if user went online*/
        {
            // hide loader say connected

            /*status*/
            $('#chat-box .status>i').html('');
            
            if(!trk)
            {
                track(oth);
                trk=1;
            }
            /*set green dot*/
            $('#chat-box .panel-title>i').removeClass('text-default')
                                           .addClass('text-success');
        }
    };
    if(otrtrk)
    {
        //console.log("found a previous tracker",last," ",oth.id);
        chat._usersOnlineRef.child(last).off('value');
    }
    last =oth.id;
    chat._usersOnlineRef.child(oth.id).on('value', trkother);
    otrtrk=1;
}

/*
* Function : toggleTitleOnMessage(name)
* ------------------------------------
* Purpose
* It toggles title on message recived
* for every 2 seconds.
*/

function toggleTitleOnMessage(name)
{
    if(!title_toggle_inverval)
    {
        clearInterval(title_toggle_inverval);
        //console.log("in toggle");
        /*if tab is inactive*/
        var isActive = window.document.hasFocus();
        //console.log('isactive :',isActive);
        if(!isActive)
        {
            //console.log("window sstate  false");
            title_toggle_inverval = setInterval(function ()
            {

                /*toggle message*/
                document.title = document.title == PAGE_TITLE ? name + " messaged you" : PAGE_TITLE;
            }, 2000);

        }
    }
}


/*
* Function : playSound()
* --------------------
* Purpose
* to play pop sound on message recieved.
*/
function playSound()
{
    /*
    * Source of pop sound
    * https://www.freesound.org/people/tmokonen/sounds/102740/
    */

    if (isWindowHidden())
    {
        $('#pop')[0].play(); /*html5 sound api*/
    }
}

function sendmail(to,from,message)
{
    //console.log("http://" + window.location.hostname + "/index.php?r=site/sendChatMessage&to=" + to + "&from="+ from +"&message=" + message)
     $.ajax({
        type: "POST",
        //url: "http://" + window.location.hostname + "/index.php?r=site/sendChatMessage&to=" + id,
        url: "http://" + window.location.hostname + "/index.php?r=site/sendChatMessage&to=" + to + "&from="+ from +"&message=" + message,
        success: function(respose){      
        }
    });
    $("#ajaxLoadingDiv").hide();
}
var submitmodalcount=0;
$(window).unload(function(){
    chat.usernameSessionRef.on('value',function(s){
        //console.log("unload",s.val().id);
        if(s.val() !=null)
        {
            //console.log(s.val());
        }
    });
    //console.log("session", vp_sess);
    sleep(10000);
});
