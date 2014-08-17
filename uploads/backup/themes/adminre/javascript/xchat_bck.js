/*
* xchat.js : Supplier Chating Script
*/

/* code to connect firebase */
var resource;
if(window.location.hostname=='localhost')
{
    resource="https://incandescent-fire-5373.firebaseio.com/chat";// local api
}
else
{
    resource="https://venturepact.firebaseio.com/chat"; //server api
}

var chat_ref=new Firebase(resource);
var chat=new Firechat(chat_ref);

/*images*/
var user_image  =  $("#header").find(".avatar img").attr("src");
var other_image = "http://test.venturepact.com/uploads/client/small/avatar.png"

/* setinveral reference*/
var title_toggle_inverval;

/*function  : isWindowHidden()
* Purpose
* check whether current tab is active or not;
* Return : boolean value
* true on not active tab
* false on active tab
*/

function isWindowHidden()
{
    return document.hidden || document.webkitHidden ||  document.mozHidden || document.msHidden || false;
}


/*Dectect visibilty change event name */
/*References :
* https://developer.mozilla.org/en-US/docs/Web/Guide/User_experience/Using_the_Page_Visibility_API
* http://www.w3.org/TR/page-visibility/
*/
var PAGE_TITLE=document.title;
var VISIBILITY_CHANGE_EVENT
if (typeof document.hidden == "undefined")
{
    extension=['ms','webkit','moz','o']
    for(i in extension )
    {
        if(typeof document[extension[i]+'Hidden'] !== "undefined")
        {

            VISIBILITY_CHANGE_EVENT=extension[i]+'visibilitychange';
            //console.log(VISIBILITY_CHANGE_EVENT);
            break;
        }
    }
}
else
{
    VISIBILITY_CHANGE_EVENT='visibilitychange';
}

document.addEventListener(VISIBILITY_CHANGE_EVENT,function()
{
    /*if tab goes active*/

    if(!isWindowHidden())
    {
        console.log('tab is active');
        if(title_toggle_inverval)
        {
            clearInterval(title_toggle_inverval);
        }
        document.title=PAGE_TITLE;
    }
});

/*Function: chat_init
* -----------------------
* Parameter:
* 1. token : a alphanumeric string : to authenticate current user to firebase system
* 2. other : object(id,name) : person whom supplier going to talk
* 3. roomurl : url : where to query about room information
* 4. purposalId :
* Purpose :Initiate chat functionlity
* Action:
* This is main function which authenticates user
* and makes him online and loads rest all functionality
*/

function chat_init(token,other,roomurl,proposalId)
{
    console.log("chat_init");
    other.name=other.name.toLowerCase();

    /*authenticate user*/
    chat_ref.auth(token,function(e,u)
    {
        if(e) /*if something went wrong*/
        {
            console.log(e);
        }
        else /*successful login*/
        {

            console.log(u);
            /*if room is there */
            if($('#chat-box').data('room'))
            {
                console.log('normal mode');

                $('.jumbotron').delegate('#btnsubmitproject','click',function(){
                    console.log("#submit project clicked in seek clarification");
                    console.log(u);
                    var el= $(this);
                    var boottext= "Are you sure you want to submit this pitch?";
                    bootbox.confirm(boottext, function (result) {
                    if(result){
                        console.log("ye chla ");
                        window.location.href=$('#btnsubmitproject').attr('href');
                        return false;
                    }
                            // callback
                     });
                    return false;
                    event.preventDefault();

                });
                chat.setUser(u.auth.id,u.auth.name,u.auth.pic,function()
                {
                    var room=$('#chat-box').data('room');

                    console.log(room);

                    /*on disconnect : offline time storage  */
                    chat._userRef.onDisconnect().update({'offline_time':Firebase.ServerValue.TIMESTAMP});
                    chat_ref.child("room-users").child(room).child(chat._userId).onDisconnect().update({"offline_time":Firebase.ServerValue.TIMESTAMP});

                    console.log('entering room');
                    /*entering room*/
                    chat.enterRoom(room);

                    /*start functionality*/
                    setWritingFunctionality();
                    console.log("Done writing");
                    setReadingFunctionality();

                    /*offline messages*/
                    offlineMessagesCount();

                    /*track other user*/
                    track(other);


                    /*offline time record event*/

                });
            }
            else
            {
                console.log("disabled mode");
                $('.jumbotron').delegate('.clarification','click',function()
                {
                    console.log("#clarification clicked");
                    console.log(u);
                    var boottext = "Are you sure you want to Seek clarification for this project?";
                    bootbox.confirm(boottext, function (result) {
                        if(result){
                            chat.setUser(u.auth.id,u.auth.name,u.auth.type,function(){
                            //offline time record event
                            chat._userRef.onDisconnect().update({
                                'offline_time':Firebase.ServerValue.TIMESTAMP
                            });

                            $('#chat-box .info').hide();
                            createRoom(other,roomurl,proposalId);

                            $('#chat-box').show();



                            $('.clarification').prop('disabled','true');

                            });

                        }//end result
                    });

                    return false;
                });
                $('.jumbotron').delegate('#btnsubmitproject','click',function(){
                    console.log("#submit project clicked");
                    console.log(u);
                    var el= $(this);
                    bootbox.confirm("Are you sure you want to submit this pitch?", function (result) {
                    if(result){
                     console.log("ye chla ");
                     chat.setUser(u.auth.id,u.auth.name,u.auth.type,function(){
                        $('#chat-box .info').hide();
                        console.log(createRoom(other,roomurl,proposalId));
                     });
                    return false;
                         }
                            // callback
                     });
                    return false;
                    event.preventDefault();

                });
            }
        }
    });
}

function track(other)
{
    /*wait for client to enter room*/
    var room=$('#chat-box').data('room');

    chat._firebase.child("room-users").child(room).on('value',function(s)
    {
        console.log(s.val());
        var id;
        for(k in s.val())
        {
            console.log(k);
            if(k==other.id)
            {
                otherUserStatusTracking(other);
                trackTyping(other);
                chat._firebase.child("room-users").child(room).off('value');
                break;
            }
        }
    });

}
/*function createRoom
* ---------------------
* Parameter:
* other : a object(id,name) :  to whom current user will talk
* this function create private chat room and puts current login user & "other" user in created chat-box
*/
function createRoom(other,roomurl,proposalId,statusId)
{
    chat.createRoom("vp-"+proposalId,"private",function(room)
    {
        console.log(roomurl);
        var stat= 0;
        if(typeof $("#btnsubmitproject").data('status') !== 'undefined')
        {
            stat=1;
        }
        //set room
        $.ajax(
        {
            url:roomurl,
            type:'post',
            dataType:"json",
            data:"room="+room+"&proposalId="+proposalId+"&action=setroom&stat="+stat,
            success:function(d)
            {
                console.log("set room : "+ JSON.stringify(d));
                if(!d.iserror)
                {
                    if(d.success)
                    {
                        console.log('database updated');

                        chat_ref.child("room-users").child(room).child(other.id).update({'offline_time':Firebase.ServerValue.TIMESTAMP});
                        chat_ref.child("room-users").child(room).child(chat._userId).onDisconnect().update({"offline_time":Firebase.ServerValue.TIMESTAMP});

                        /*put current user in this room*/
                        chat.enterRoom(room);
                        if(stat)
                        {
                            window.location.href=$('#btnsubmitproject').attr('href');
                        }
                        else
                        {
                            console.log("new url");
                            var newurl = window.location.pathname + "?r=supplier/rfp&render=full&projectid="+proposalId+"&stat=1";
                            window.location.href = newurl ;

                        }

                    }
                }
                else
                {
                    /*Error Handler*/
                    /*Message: unable to create room Error*/
                    console.log("Server error ");
                    return false;
                }
            }
        });
    });
}

/*
    Function:setWritingFuncnality :
    this enables the
*/
function setWritingFunctionality()
{
    console.log("Inside writing ");
    /* send button functionality */
    $('#chat-box').delegate(".send","click",function(e)
    {
        e.preventDefault();
        /*grab content of message*/
        var $mb=$(this).parent().siblings();
        console.log("send clicked :" + $mb.val())
        if($mb.val()!=='')  /*if message is not empty*/
        {

            roomid=$('#chat-box').data("room");
            console.log("Room Id found " + roomid);
            chat.sendMessage(roomid,$mb.val());
            $mb.val('');
            chat._firebase.child("room-users").child(roomid).child(chat._user.id).update({'_typing':false});
        }

    });

    /*to handle chat-box functionality*/
    $('#chat-box').delegate(".message","keypress",function(e)
    {

        var roomid=$('#chat-box').data("room");
        if(e.keyCode==13) /*if enter is pressed*/
        {
            //take content & send it
            if($(this).val()!=='')
            {

                 chat.sendMessage(roomid,$(this).val());
                 $(this).val('');
                 chat._firebase.child("room-users").child(roomid).child(chat._user.id).update({'_typing':false});
            }
        }
        else
        {
            chat._firebase.child("room-users").child(roomid).child(chat._user.id).update({'_typing':true});
        }
    });
}


/*
* Function trackTyping
* --------------------
* Parameters
* 1. room : a alphanumeric string
* 2. client : a object(id,name)
* Purpose:
* To track whether client is typing or not
*/

function trackTyping(other)
{
    console.log(other);
    console.log("type tracking");
    /*track typing status*/
    var room=$('#chat-box').data('room');
    chat._firebase.child("room-users").child(room).child(other.id).on('child_changed',function(s)
    {
        if( typeof s.val() == "boolean")
        {
            if(s.val())
            {
                $('#chat-box .status>i').html(other.name + ' is typing..');
            }
            else
            {
                $('#chat-box .status>i').html('');
            }
        }

    });
}

function otherUserStatusTracking(other)
{
    /* track supplier status : online or offline */
    chat._usersOnlineRef.child(other.id).on('value',function(s)
    {
        //start loader say connecting
        if(s.val()==null)// if suppplier went offline
        {
            /*set status*/
            $('#chat-box .status>i').html(other.name+' is offline');

            /*set grey dot*/
            var $dot=$('#chat-box .panel-title>i')

            if($dot.hasClass('text-success'))
            {
                $dot.removeClass('text-success');
            }

            $dot.addClass('text-default');
        }
        else /* if user went online*/
        {
            // hide loader say connected

             /*status*/
             $('#chat-box .status>i').html('');

             /*set green dot*/
             $('#chat-box .panel-title>i').removeClass('text-default')
                                            .addClass('text-success');
        }
    });
}


function setReadingFunctionality()
{
    console.log("inside reading");
    var last_message_object={};

    //for very first message
    last_message_object.timestamp=-1;
    console.log("Last message : " + JSON.stringify(last_message_object));
    var room=$('#chat-box').data('room');

    chat._messageRef.child(room).on('child_added',function(s)
    {


        var message_object=s.val();
        console.log('message-added : ' +s);
        console.log(message_object);

        /*to avoid duplicate messages*/
        if(last_message_object.timestamp!=message_object.timestamp)
        {

            //console.log(message_object);
            timestamp=new Date(message_object.timestamp);
            /*if it it current user*/
            if(chat._user.id==message_object.userId)
            {

                $('#chat-box .media-list').append('<li class="media media-right">'
                                                    +'<a href="javascript:void(0);" class="media-object">'
                                                    +'  <img src="'+user_image+'" class="img-circle" alt="">'
                                                    +'</a>'
                                                    +'<div class="media-body">'
                                                    +'  <p class="media-text" title="'+timestamp.toTimeString()+'">'+message_object.message+'</p>'
                                                    +'  <span class="clearfix"></span>'
                                                    +'  <p class="media-meta">'+timestamp.toDateString()+'</p>'
                                                    +'<div>'
                                                   +'</li>')
            }
            else
            {

                 $('#chat-box .media-list').append('<li class="media">'
                                                    +'<a href="javascript:void(0);" class="media-object">'
                                                    +'  <img src="'+other_image+'" class="img-circle" alt="">'
                                                    +'</a>'
                                                    +'<div class="media-body">'
                                                    +'  <p class="media-text" title="'+timestamp.toTimeString()+'">'+message_object.message+'</p>'
                                                    +'  <span class="clearfix"></span>'
                                                    +'  <p class="media-meta">'+timestamp.toDateString()+'</p>'
                                                    +'<div>'
                                                   +'</li>')
                playSound();
                toggleTitleOnMessage(message_object.name);
            }
            /*scroll down*/
            $('#chat-box .media-list').eq(0).scrollTop($('#chat-box .media-list')[0].scrollHeight);
            console.log("scroll height "+$('#chat-box .media-list')[0].scrollHeight);
        }
        last_message_object=message_object;
    });
}

/*
* Function offlineMessageCount
* --------------------
* Purpose:
* To count how many messages current user
* has recieved for a particuler chat (room) during
* his or her offline time period
*/

function offlineMessagesCount()
{
    var room=$('#chat-box').data('room');
    var ot;
    /*grab user offline time */
    chat_ref.child("room-users")
            .child(room)
            .child(chat._userId)
            .once('value',function(s)
            {
                ot=s.val().offline_time;
                if(ot)
                {
                    chat._messageRef.child(room)
                                    .startAt(ot)
                                    .endAt(new Date().getTime())
                                    .once('value',function(s)
                                    {
                                        if(s.numChildren()==0)
                                        {
                                            $('#chat-box .badge').html('');
                                        }
                                        else
                                        {
                                            $('#chat-box .badge').html(s.numChildren());

                                            /*to pop out bubble after few secs*/
                                            setTimeout(function(){$('#chat-box .badge').html('');},5000);
                                        }

                                    });
                }
            });
}
/*
*/

function toggleTitleOnMessage(name)
{

    console.log("in toggle");


    if(isWindowHidden())
    {
        title_toggle_inverval=setInterval(function()
        {
            if(document.title==PAGE_TITLE)
            {
                document.title=name + " messaged you";
            }
            else
            {
                document.title=PAGE_TITLE;
            }

        },2000);

    }
}

function playSound()
{
    if(isWindowHidden())
    {
        $('#pop')[0].play();
    }
    /*https://www.freesound.org/people/tmokonen/sounds/102740/*/
}
